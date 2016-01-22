<?php

/*
 * Author: Khang Le
 *
 *
 */

function mwp_dropdownList($list, $options = array(), $selected = 0, $kv = FALSE, $empty = array()) {
    //
    $str_options = '';
    foreach ($options as $k => $v) {
        $str_options .= $k . '="' . $v . '" ';
    }
    //
    $select = '<select ' . $str_options . ' >';
    $i = 0;
    foreach ($list as $key => $value) {
        $checked = ($selected == $value) ? 'selected' : '';
        if ($kv == TRUE) {
            $select .= '<option value="' . $key . '" ' . $checked . '>' . $value . '</option>';
        } else {
            if (!is_null($empty) && is_array($empty)) {
                if (isset($empty[$i]) && $key == $empty[$i]) {
                    $select .= '<option value="" ' . $checked . '>' . $value . '</option>';
                } else {
                    $select .= '<option value="' . $value . '" ' . $checked . '>' . $value . '</option>';
                }
            }
            $i++;
        }
    }
    $select .= '</select>';

    return $select;
}

/**
 *
 * @global type $wp_query
 * @return type
 *
 * Function from Genesis Framework
 *
 */
function wpbeginner_numeric_posts_nav() {

    if (is_singular())
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;

    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);

    /**     Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;

    /**     Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if (( $paged + 2 ) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<nav class="navigation"><ul class="pagination">' . "\n";

    /**     Previous Post Link */
    if (get_previous_posts_link())
        printf('<li class="prev">%s</li>' . "\n", get_previous_posts_link('Prev'));

    /**     Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

        if (!in_array(2, $links))
            echo '<li><span>…</span></li>';
    }

    /**     Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array) $links as $link) {
        $class = $paged == $link ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }

    /**     Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links))
            echo '<li><span>…</span></li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }

    /**     Next Post Link */
    if (get_next_posts_link())
        printf('<li class="next">%s</li>' . "\n", get_next_posts_link('Next'));

    echo '</ul></nav>' . "\n";
}

// Breadcrumbs
function custom_breadcrumbs($custom_taxonomy)
{
    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumb-cp hidden-sm hidden-xs';
    $home_title         = 'HOME';

    // Get the query & post information
    global $post,$wp_query;

    // Do not display on the homepage
    if (!is_front_page()) {
        // Build the breadcrums
        echo '<div class="container">';
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';

        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title(NULL, false) . '</strong></li>';
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

            // If post is a custom post type
            $post_type = get_post_type();
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
            }

            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
        } else if ( is_single() ) {
            // If post is a custom post type
            $post_type = get_post_type();
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
            }

            // Get post category info
            $category = get_the_category();

            if (!empty($category)) {
                // Get last category post is in
                $last_category = end(array_values($category));
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
            }

            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if (empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
            }

            // Check if the post is in a category
            if (!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
            } else {
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
            }

        } else if (is_category()) {
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
        } else if (is_page()) {
            // Standard page
            if( $post->post_parent ){
                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );
                // Get parents in the right order
                $anc = array_reverse($anc);
                // Parent page loop
                $parents = '';
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                // Display parent pages
                echo $parents;
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
            } else {
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
            }
        } else if ( is_tag() ) {
            // Tag page
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;

            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
        } elseif ( is_day() ) {
            // Day archive
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
        } else if ( is_month() ) {
            // Month Archive
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
        } else if ( is_year() ) {
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
        } else if ( is_author() ) {
            // Auhor archive
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
        } else if ( get_query_var('paged') ) {
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
        } else if ( is_search() ) {
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
        } elseif ( is_404() ) {
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
        echo '</ul>';
        echo '</div>';
    }
}

/**
 * Get posts data or summary of posts in post archives, grouped by post type
 * @param  string   $post_type    Defined post type, ex: post, news, recommend,... Default is 'post'
 * @param  integer  $year         Filtered by year
 * @param  integer  $month        Filtered by month
 * @return void     Print out content as HTML
 */
function getArchivesByPostType($post_type = 'post', $year = null, $month = null)
{
    global $wpdb;
    $limit = 0;
    $year_prev = null;
    $sql = "SELECT DISTINCT
          MONTH(`post_date`) AS `month`,
          YEAR(`post_date`) AS `year`,
          COUNT(id) AS `post_count`
        FROM
          $wpdb->posts
        WHERE `post_status` = 'publish'";

    $sql .= $year ? " AND YEAR(`post_date`) = '$year'" : "";
    $sql .= $month ? " AND MONTH(`post_date`) = '$month'" : "";
    $sql .= " AND `post_date` <= NOW()
          AND `post_type` = '$post_type'
        GROUP BY `month`, `year`
        ORDER BY `post_date` DESC";
    $months = $wpdb->get_results($sql);

    foreach($months as $month) {
        $year_current = $month->year;
        if ($year_current != $year_prev) {
            if ($year_prev == null) {
                echo '<li class="archive-year"><a href="' . get_bloginfo('url') . '/' . $month->year . '/">' . $month->year . '</a><ul>';
            } else {
                echo '</ul></li><li class="archive-year"><a href="' . get_bloginfo('url') . '/' . $month->year . '/">' . $month->year . '</a><ul>';
            }
        }
        echo '<li><a href="' . get_bloginfo('url') . '/' . $month->year . '/' . date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) . '"><span class="archive-month">' . date_i18n("F", mktime(0, 0, 0, $month->month, 1, $month->year)) . '</span></a>&nbsp;(' . $month->post_count . ')</li>';
        $year_prev = $year_current;
        if(++$limit >= 18) {
            break;
        }
    }
}

function get_taxonomy_info($post_id) {
    global $evacorp_settings;

    $term = get_the_terms($post_id, 'company-tax');
    $t_id = $term[0]->term_id;
    $tax_info = array();

    foreach ($evacorp_settings as $field => $data) {
        $key = $data['id'];
        $tax_id = $key . '-' . $t_id;
        $tax_meta = 'evacorp_' . $tax_id;
        //
        $info = get_option($tax_meta);
        $tax_info[$key] = stripcslashes($info[$tax_id]);
    }

    return $tax_info['google-map'] ? $tax_info['google-map'] : '';
}

function onw_header_template(){

    global $wp_query;

    $query = $wp_query->query;

    if (isset($query['year']) && isset($query['monthnum'])){
        wp_redirect(home_url('page-attributes'));
    }
}

add_action('template_redirect', 'onw_header_template');

