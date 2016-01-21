<?php
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
<!--//slide-->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php for ($i = 0; $i < count($home_slider); $i++): ?>
            <li data-target="#myCarousel" data-slide-to="<?php echo $i ?>" class="<?php echo ($i == 0) ? 'active' : '' ?>"></li>
        <?php endfor; ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php for ($i = 0; $i < count($home_slider); $i++): ?>
            <div class="item <?php echo ($i == 0) ? 'active' : '' ?>">
                <div class="parallax-window" data-parallax="scroll" data-image-src="<?php echo $home_slider[$i]['image']['url'] ?>"></div>
            </div>
        <?php endfor; ?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

    <div class="carousel-caption">
        <h2>海外開発拠点が御社の成長を加速させる</h2>
    </div>
</div>
<!--//slide End-->

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
                    <div class="col-xs-12 col-md-6 no-padding-lr sv-main-block wow fadeInLeft">
                        <img src="<?php echo $post_img['url']; ?>" alt="" class="img-responsive full-width" />
                    </div>
                    <div class="col-xs-12 col-md-6 wow fadeInRight">
                        <div class="col-lg-9 col-md-12 col-xs-12">
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
                    <div class="col-xs-12 col-md-6 wow fadeInLeft">
                        <div class="col-lg-9 col-md-12 col-xs-12">
                            <div class="row-gap-medium"></div>
                            <h3 class="fw400"><?php the_title(); ?></h3>
                            <div class="row-gap-medium"></div>
                            <p><?php echo the_excerpt(); ?></p>
                            <div class="row-gap-small"></div>
                            <a href="<?php echo get_permalink(); ?>" class="simple-btn black">LEARN MORE</a>
                            <div class="row-gap-medium"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 no-padding-lr sv-main-block wow fadeInRight">
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
                $terms = get_terms('news-category', 'hide_empty=0');
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
                        $terms = get_the_terms($postId, 'news-category');
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
                            <img src="<?php echo $news_img['url']; ?>" alt="" style="width:100%; height:auto;">
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

<!--//Articles-->
<div class="container-fluid bg-dark-grey white text-center">
    <div class="container">
        <div class="row-gap-big"></div>
        <div class="row">
            <div class="col-md-12">
                <h4>高度成長を遂げるベトナムでのラボ型開発・BPOの魅力</h4>
            </div>
        </div>
        <div class="row-gap-medium"></div>
        <div class="row">
            <div class="col-md-12">
                <a href="#" class="rounded-btn right-arrow yellow">を遂げるベトナムでのラボ型開発</a>
            </div>
        </div>
        <div class="row-gap-medium"></div>
        <div class="row">
            <div class="col-md-12">
                <a href="#" class="link underline white">を遂げるベトナムでのラボ型開発</a>&nbsp;<i class="icon right-arrow"></i>
            </div>
        </div>
        <div class="row-gap-big"></div>
    </div>
</div>
<!--//Articles End-->

<?php get_footer(); ?>