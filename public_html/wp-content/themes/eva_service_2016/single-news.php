<?php
/*
 * Author: Truong Ly
 * Template Name: Single-News
 *
 */
get_header();

$post_type = get_post_type_object('news');

$default_img = get_template_directory_uri() . '/img/default-img.jpg';
$featured_image = get_field('featured_image');

$prev_post = get_previous_post(false, null, 'news-type');
$next_post = get_next_post(false, null, 'news-type');

if (!empty($prev_post)) {
    $prev_post_image = get_field('featured_image', $prev_post->ID);
}

if (!empty($next_post)) {
    $next_post_image = get_field('featured_image', $next_post->ID);
}

?>
<div id="news">
    <div class="container-fluid bg-silver">
        <?php custom_breadcrumbs('news'); ?>
    </div>
    <div class="row-gap-medium"></div>
    <div class="container-fluid">
        <div class="head-banner-wrap no-background row">
            <h2><?php echo $post_type->label; ?></h2>
        </div>
    </div>
    <div class="row-gap-medium"></div>
    <div class="container center bpo-1 contact-width">
        <?php // get_sidebar('news') ?>
        <div class="content post-detail col-md-12">
            <div class="row">
                <div class="post-date text-center">( <?php the_time('Y.m.d'); ?> )</div>
                <h2 class="post-title text-center"><?php the_title(); ?></h2>
                <div class="row-gap-medium"></div>
                <div class="post-content col-md-12 col-xs-12 no-padding-lr">
                    <img class="img-responsive" src="<?php echo !empty($featured_image['url']) ? $featured_image['url'] : $default_img; ?>" alt="<?php the_title(); ?>" style="margin: 0px auto 20px auto; display: block;" />
                    <p style="text-align: justify;"><?php echo $post->post_content ?></p>
                </div>
                <div class="clearfix"></div>
                <div class="row-gap-huge"></div>
                <nav class="post-navigation">
                    <?php if (!empty( $prev_post )) { ?>
                    <div class="prev-post col-md-4 col-xs-4">
                        <a href="<?php echo get_permalink($prev_post->ID); ?>" title="<?php echo $prev_post->post_title; ?>">
                            <span class="prev">Prev</span>
                            <img class="img-responsive" src="<?php echo !empty($prev_post_image['url']) ? $prev_post_image['url'] : $default_img; ?>" alt="<?php echo $prev_post->post_title; ?>" />
                            <span class="prev ss">Prev</span>
                            <h3><?php echo mb_substr($prev_post->post_title, 0, 25) . '...'; ?></h3>
                        </a>
                    </div>
                    <?php } ?>
                    <?php if (!empty( $next_post )) { ?>
                    <div class="next-post  col-md-4 col-xs-4 pull-right">
                        <a href="<?php echo get_permalink($next_post->ID); ?>" title="<?php echo $next_post->post_title; ?>">
                            <img class="img-responsive" src="<?php echo !empty($next_post_image['url']) ? $next_post_image['url'] : $default_img; ?>" alt="<?php echo $next_post->post_title; ?>" />
                            <span class="next">Next</span>
                            <h3><?php echo mb_substr($next_post->post_title, 0, 25) . '...'; ?></h3>
                        </a>
                    </div>
                    <?php } ?>
                </nav>
            </div>
            <div class="row-gap-huge"></div>
        </div>
    </div>
</div>
<?php get_template_part('part-contact'); ?>
<?php get_footer(); ?>
