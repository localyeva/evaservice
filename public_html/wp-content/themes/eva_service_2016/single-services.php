<?php
/*
 * Author: Truong Ly
 * Template Name: Single-Services
 *
 */
get_header();

$post_type = get_post_type_object('services');

$default_img = array('url' => get_template_directory_uri() . '/img/default-img.jpg');
if (!$content_image = get_field('content_image')) {
    if (!$content_image = get_field('featured_image')) {
        $content_image = $default_img;
    }
}

$service_details = get_field('detail');
$categories = array();
$terms = get_the_terms(get_the_ID(), 'service-type');
$tmp = $terms;
$terms = array();

foreach($tmp as $term) {
    $categories[] = $term->name;
    $terms[] =$term->slug;
}

?>
<div id="services">
    <div class="container-fluid bg-silver">
        <?php custom_breadcrumbs('services'); ?>
    </div>
    <div class="row-gap-medium"></div>
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-12">
                <h2 class="title"><?php the_title(); ?></h2>
                <?php if (!empty($categories) && count($categories) > 0) { ?>
                    <span class="category"><?php echo implode(', ', $categories); ?></span>
                <?php } ?>
            </div>
            <div class="col-md-12"><?php the_excerpt(); ?></div>
            <div class="col-md-12">
                <img class="img-responsive banner-img" src="<?php echo $content_image['url']; ?>" alt="<?php the_title(); ?>" style="margin: 0px auto 20px auto; display: block;" />
            </div>
        </div>
    </div>
    <div class="row-gap-medium"></div>
    <?php if (is_array($service_details) && count($service_details) > 0) { ?>
        <div class="container-fluid">
            <div class="container">
                <h3 class="text-center service-text">Services</h3>
                <div class="row-gap-big"></div>
            </div>
        </div>
        <?php
        $i = 0;
        foreach ($service_details as $service_detail) {
            $s_image = !empty($service_detail['detail_image']['url']) ? $service_detail['detail_image']['url'] : $default_img;
        ?>
            <?php if ($i % 2 == 0) { ?>
                <div class="container-fluid">
                    <div class="container">
                        <div class="col-md-6 content">
                            <?php
                            // echo $service_detail['detail_name'];
                            echo $service_detail['detail_content'];
                            ?>
                        </div>
                        <div class="col-md-6">
                            <img class="img-responsive" src="<?php echo $s_image; ?>" />
                        </div>
                    </div>
                </div>
                <?php } else { ?>
                <div class="container-fluid highlight-content">
                    <div class="container">
                        <div class="col-md-6"><img class="img-responsive" src="<?php echo $s_image; ?>" /></div>
                        <div class="col-md-6 content"><?php echo $service_detail['detail_content']; ?></div>
                    </div>
                </div>
            <?php } ?>
        <?php $i++; } ?>
    <?php } ?>
    <div class="row-gap-big"></div>
    <?php
    $args = array(
        'post_type' => 'project',
        'orderby' => array('date' => 'DESC'),
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'service-type',
                'field'    => 'slug',
                'terms'    => $terms,
            )
        )
    );
    $wp_query = new WP_Query( $args );
    ?>
    <?php if ($wp_query->have_posts()) { ?>
    <div class="container-fluid">
        <div class="container">
            <h3 class="text-center service-text">Projects</h3>
            <div class="row-gap-medium"></div>
            <div class="row">
                <div class="col-md-12 text-center">Lorem ipsum dolor sit amet</div>
            </div>
            <div class="row-gap-medium"></div>
            <div class="projects row">
                <?php while ($wp_query->have_posts()) { ?>
                    <?php
                    $wp_query->the_post();
                    $project_id = get_the_ID();
                    $project_image = get_field('image');
                    $project_owner = get_field('project_owner');
                    ?>
                    <div class="col-md-4 col-xs-12 project-item">
                        <div class="col-md-12 text-center">
                            <a href="<?php echo get_permalink(); ?>">
                                <img src="<?php echo !empty($project_image['url']) ? $project_image['url'] : $default_img; ?>" class="img-responsive project-img" />
                                <span class="project-name"><?php the_title(); ?></span>
                                <span class="project-owner"><?php echo $project_owner; ?></span>
                            </a>
                        </div>
                    </div>
                    <?php wp_reset_postdata(); ?>
                <?php } ?>
                <div class="col-md-12 text-center">
                    <a href="#" class="more-projects">See more projects</a>
                </div>
            </div>
            <div class="row-gap-big"></div>
        </div>
    </div>
    <?php } ?>
</div>
<?php get_template_part('part-contact'); ?>
<?php get_footer(); ?>
