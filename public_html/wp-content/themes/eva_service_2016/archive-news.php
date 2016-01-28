<?php
/*
 * Author: Truong Ly
 * Template Name: Arichive-News
 *
 */
get_header();
$post_type = get_post_type_object('news');
$default_img = get_template_directory_uri() . '/img/default-img.jpg';
?>
<div id="news">
    <div class="container-fluid">
        <div class="head-banner-wrap no-background row">
            <h2><?php echo $post_type->label; ?></h2>
        </div>
    </div>
    <div class="row-gap-medium"></div>
    <div class="container-fluid bg-silver">
        <?php custom_breadcrumbs('news'); ?>
    </div>
    <div class="container center bpo-1">
        <div class="row-gap-medium"></div>
            <div class="content col-md-12">
                <div class="row grid-news">
                    <?php
                        $all_bg_color = array('pink', 'sky-blue', 'yellow');
                        $bg_color = array();
                        $i = 0;
                        $terms = get_terms('news-type', 'hide_empty=0');
                        foreach ($terms as $term) {
                            $all_terms[] = $term->name;
                            $bg_color[$i] = $all_bg_color[$i % 3];
                            $i++;
                        }
                        $class_category = array_combine($all_terms, $bg_color);

                        $wp_query = new WP_Query();
                        $param = array(
                            'post_type' => 'news',
                            'orderby' => array('date' => 'DESC'),
                            'paged' => $paged,
                        );
                        $wp_query->query($param);
                    ?>
                    <?php
                        if ($wp_query->have_posts()) {
                            while ($wp_query->have_posts()) {
                                $wp_query->the_post();
                                $postId = get_the_ID();
                                $terms = get_the_terms($postId, 'news-type');
                                $categories = array();
                                if (is_array($terms) && count($terms) > 0) {
                                    foreach ($terms as $term) {
                                        $categories[] = $term->name;
                                    }
                                }
                                $post_image = get_field('featured_image');
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-4 item">
                        <a href="<?php echo get_permalink(); ?>">
                            <img class="img-responsive" src="<?php echo !empty($post_image['url']) ? $post_image['url'] : $default_img; ?>" alt="<?php the_title(); ?>">
                            <span class="info">
                                <span class="overlay"></span>
                                <span class="post-date"><?php the_time('Y.m.d'); ?></span>
                                <?php if (count($categories) > 0) { ?>
                                    <span class="category <?php echo $class_category[$term->name] ?>"><?php echo implode(', ', $categories); ?></span>
                                <?php } ?>
                                <h3 class="title"><?php the_title(); ?></h3>
                            </span>
                        </a>
                    </div>
                    <?php
                            }
                            wp_reset_postdata();
                        }
                    ?>
                </div>
                <div class="row-gap-medium"></div>
                <?php wpbeginner_numeric_posts_nav(); ?>
                <div class="row-gap-medium"></div>
            </div>
        </div>

    <?php get_template_part('part-contact'); ?>
</div>
<?php get_footer(); ?>
