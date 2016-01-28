<?php

$default_img = get_template_directory_uri() . '/img/default-img.jpg';

get_header();

$args = array(
    'post_type' => 'home-slider',
    'posts_per_page' => 1,
    'orderby' => array('date' => 'DESC'),
);

$loop = new WP_Query($args);
$home_slider = array();

if ($loop->have_posts()) {
    while ($loop->have_posts()) {
        $loop->the_post();
        while (have_rows('images')) {
            the_row();
            $home_slider[]['image'] = get_sub_field('image');
        }
    }
}
?>

<video autoplay="" loop="" poster="http://evarecruit.localhost/wp-content/uploads/2015/08/cover.png" id="bgvid">
    <source src="http://evarecruit.localhost/wp-content/uploads/2015/08/cover.webm" type="video/webm">
    <source src="http://evarecruit.localhost/wp-content/uploads/2015/08/cover.mp4" type="video/mp4">
</video>

<!--//Why-->
<div class="container-fluid header-why">
    <div class="row">
        <div class="container">
            <div class="col-md-7 why-text-right">
                <h2>EVA Solution and Business Consultancy</h2>
                <h3>私たちは経験豊富なエンジニアの採用に自信があります。<br/>御社の開発チームを迅速に構築します。</h3>
                <div class="row-gap-small"></div>
                <div class="text-small">2012年の設立以降、今では東南アジア地域で日系最大規模のラボ型オフショア開発企業としてさらに成長を続けるEvolable Asia。その成長の背景には、「高品質な人材の提供」と「安心のサポートシステム」があります。Evolable Asiaでは質が高く幅広い技術者を豊富に確保し、最適な環境で終業してもらえるノウハウと実績を持っています。また日本人ラボマネージャーが常駐し、初めてベトナム進出する企業も、より安心して業務をスタートできるようなサポートシステムが整っています。詳しくはこちらのページをご覧ください。
                </div>
                <div class="">
                    <a href="http://evaservice.localhost/company/reason/" class="btn btn-slim">
                        <i class="fa fa-angle-right"></i>エボラブルアジアが選ばれる理由
                    </a>
                </div>
            </div>
            <div class="col-md-5 why-text-left text-left">
                <div class="row-gap-big"></div>
                <img src="http://evaservice.localhost/wp-content/uploads/2016/01/koppos32a6ml.jpg" alt="" class="img-responsive" />
            </div>
        </div>
    </div>
    <div class="row-gap-medium"></div>
</div>
<!--//Why End-->

<!--//Services-->
<div id="header-service" class="container-fluid header-service">
    <div class="row service-bg bg-silver">
        <div class="col-xs-12">
            <div class="row-gap-big"></div>
            <h2 class="text-center text-spacing short-line">SERVICES</h2>
            <div class="row-gap-big"></div>
        </div>
    </div>
    <?php
        $args = array(
            'post_type' => 'services',
            'posts_per_page' => 10,
            'orderby' => array('date' => 'ASC'),
        );
        $loop = new WP_Query($args);
    ?>

    <?php if ($loop->have_posts()) { ?>
        <?php $i = 0; ?>
        <?php $num_posts = count($loop->posts); ?>
        <?php while ($loop->have_posts()) { ?>
            <?php $loop->the_post(); ?>
            <?php $post_img = get_field('image'); ?>
            <?php if ($i % 2 == 0) { ?>
                <div class="row bg-light-grey">
                    <div class="col-xs-12 col-md-6 no-padding-lr sv-main-block service-block wow fadeInLeft">
                        <img src="<?php echo $post_img['url']; ?>" alt="" class="img-responsive full-width" />
                    </div>
                    <div class="col-xs-12 col-md-6 service-block wow fadeInRight">
                        <div class="col-md-12 col-xs-12">
                            <div class="row-gap-medium"></div>
                            <h3 class="fw400"><?php the_title(); ?></h3>
                            <div class="row-gap-medium"></div>
                            <p><?php echo the_excerpt(); ?></p>
                            <div class="row-gap-small"></div>
                            <a href="<?php echo get_permalink(); ?>" class="simple-btn black">LEARN MORE</a>
                            <div class="row-gap-medium"></div>
                        </div>
                    </div>
                </div>
                <?php } else { ?>
                <div class="row bg-light-grey">
                    <div class="col-xs-12 col-md-6 service-block wow fadeInLeft">
                        <div class="col-md-12 col-xs-12">
                            <div class="row-gap-medium"></div>
                            <h3 class="fw400"><?php the_title(); ?></h3>
                            <div class="row-gap-medium"></div>
                            <p><?php echo the_excerpt(); ?></p>
                            <div class="row-gap-small"></div>
                            <a href="<?php echo get_permalink(); ?>" class="simple-btn black">LEARN MORE</a>
                            <div class="row-gap-medium"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 service-block no-padding-lr sv-main-block wow fadeInRight">
                        <img src="<?php echo $post_img['url']; ?>" alt="" class="img-responsive full-width" />
                    </div>
                </div>
                <?php } ?>
            <?php $i++; ?>
        <?php } ?>
    <?php } ?>
    <?php wp_reset_postdata() ?>
</div>
<!--//Services End-->

<!--//News-->
<div class="container-fluid block-center header-news">
    <h1 class="text-center">News</h1>
    <div class="container">
        <div class="row">
            <?php
                $all_bg_color = array('categories-pink', 'categories-blue', 'categories-yellow');
                $bg_color = array();
                $terms = get_terms('news-type', 'hide_empty=0');
                $i = 0;
                foreach ($terms as $term) {
                    $all_terms[] = $term->name;
                    $bg_color[$i % 3] = $all_bg_color[$i % 3];
                    $i++;
                }
                $class_category = array_combine($all_terms, $bg_color);
                //
                $time2 = 0;
                $args = array(
                    'post_type' => 'news',
                    'posts_per_page' => 3,
                    'orderby' => array('date' => 'DESC'),
                );
                $loop = new WP_Query($args);
            ?>
            <?php if ($loop->have_posts()) { ?>
                <?php $num_posts = count($loop->posts); ?>
                <?php while ($loop->have_posts()) { ?>
                    <?php
                        $loop->the_post();
                        $postId = get_the_ID();
                        $terms = get_the_terms($postId, 'news-type');
                        $news_img = get_field('featured_image');
                        $categories = array();
                        if (is_array($terms) && count($terms) > 0) {
                            foreach ($terms as $term) {
                                $categories[] = $term->name;
                            }
                        }
                    ?>
                    <div class="col-xs-12 col-md-4 news-main-block wow fadeInUp" data-wow-delay="<?php echo $time2; ?>s">
                        <a class="news-hover" href="<?php the_permalink() ?>">
                            <img src="<?php echo !empty($news_img['url']) ? $news_img['url'] : $default_img; ?>" alt="" style="width:100%; height:auto;">
                            <div class="caption-eva" ></div>
                            <span class="overlay"></span>
                            <div class="caption left">
                                <div class="news-main-title">
                                    <span class="date-text"><?php echo get_the_date('Y.m.d', $postId); ?></span>
                                    <?php if (count($categories) > 0) { ?>
                                        <span class="categories-text <?php echo $class_category[$term->name] ?>"><?php echo implode(', ', $categories); ?></span>
                                    <?php } ?>
                                </div>
                                <h2 class="intro more"><?php the_title(); ?></h2>
                            </div>
                        </a>
                    </div>
                    <?php $time2+= 0.5; ?>
                <?php } ?>
            <?php } ?>
            <?php wp_reset_postdata() ?>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12 text-center">
                <a href="<?php echo home_url('news') ?>">
                    <button class="btn btn-slim "><span class="glyphicon glyphicon-plus"></span>View All</button>
                </a>
            </div>
        </div>
    </div>
</div>
<!--//News End-->

<?php get_template_part('part-contact'); ?>

<?php get_footer(); ?>