<?php
$current_language = get_bloginfo('language');
$site_url = get_bloginfo('siteurl');
$template_url = get_bloginfo('template_url');
?>
<!DOCTYPE html>
<html lang="<?php echo $current_language; ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php
        if ($current_language != 'en' && $current_language != 'en-US') {
            include_once 'lib/includes/languages/' . $current_language . '.php';
        }

        session_start();
        $_SESSION['translateX'] = $lang;

        function translateX($word) {
            return !empty($_SESSION['translateX'][$word]) ? $_SESSION['translateX'][$word] : $word;
        }
        ?>

        <meta name="description" content="<?php echo translateX('EVOLABLE ASIA Solution & Business Consultancyは、東南アジア地域で日系最大規模のラボ型開発企業であるEVOLABLE ASIAの100%子会社として設立。これまで培ってきたデジタルマーケティングに関するノウハウをコアバリューとしSolutionをカタチに実現します。'); ?>" />
        <meta name="keywords" content="<?php echo translateX('ベトナム, web制作,動画制作,SEO対策,マーケティング, エボラブルアジア, Evolable Asia'); ?>" />

        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $template_url ?>/img/evaicon.png" />

        <title><?php echo translateX('EVOLABLE ASIA Solution & Business Consultancy'); ?></title>

        <!-- Bootstrap -->
        <link href="<?php echo $template_url; ?>/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="<?php echo $template_url; ?>/css/jquery.sidr.dark.css" rel="stylesheet">
        <link href="<?php echo $template_url; ?>/css/animate.css" rel="stylesheet">
        <link href="<?php echo $template_url; ?>/css/style.css" rel="stylesheet">
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->

        <!-- FACE BOOK start -->
        <meta property="og:title" content="<?php echo translateX('EVOLABLE ASIA Solution & Business Consultancy'); ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="http://sbc.evolable.asia/" />
        <meta property="og:image"  content="http://sbc.evolable.asia/wp-content/uploads/2016/02/sbcfacebook_opg.png" />
        <!-- //FACE BOOK end -->

        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-55361633-6', 'auto');
            ga('send', 'pageview');
        </script>
        <link rel='stylesheet' id='wp-pagenavi-css'  href='<?php echo $site_url; ?>/wp-content/plugins/wp-pagenavi/pagenavi-css.css?ver=2.70' type='text/css' media='all' />
        <link rel='https://api.w.org/' href='<?php echo $site_url; ?>/wp-json/' />
        <link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo $site_url; ?>/xmlrpc.php?rsd" />
        <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo $site_url; ?>/wp-includes/wlwmanifest.xml" />
        <meta name="generator" content="WordPress 4.4" />
        <style>
        </style>
        <?php wp_head(); ?>
    </head>
     <body>
        <div id="navigation">
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center navbar-collapse collapse visible-md">
                            <div class="col-md-4  col-sm-4 col-xs-3">
                                <a href="<?php echo $site_url; ?>">
                                    <img src="<?php echo $template_url; ?>/img/SBC-Logo-Final.png" class="img-responsive top-logo" />
                                </a>
                            </div>
                            <div class="col-md-2  col-sm-2 col-xs-2"><?php echo qtranxf_generateLanguageSelectCode('image'); ?></div>
                            <div class="col-md-6  col-sm-6 col-xs-7 pull-right">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="<?php echo $site_url; ?>/#header-service" data-goto="header-service" class="text-uppercase"><?php echo translateX('Service'); ?></a></li>
                                    <li><a href="<?php echo $site_url; ?>/company/" class="text-uppercase"><?php echo translateX('Company'); ?></a></li>
                                    <li><a href="<?php echo $site_url; ?>/news/" class="text-uppercase"><?php echo translateX('News'); ?></a></li>
                                    <li><a href="<?php echo $site_url; ?>/contact/" class="text-uppercase"><span class="btn-highlight"><?php echo translateX('Contact'); ?></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 visible-xs text-center no-padding-lr">
                            <div class="navbar-header mobie-brand">
                                <div class="col-xs-6">
                                    <a class="logo-mobie" href="#">
                                        <img alt="Brand" src="<?php echo $template_url; ?>/img/SBC-Logo-Final.png" class="img-responsive top-logo" />
                                    </a>
                                </div>
                                <div class="col-xs-4"><?php echo qtranxf_generateLanguageSelectCode('image'); ?></div>
                                <div class="col-xs-2">
                                    <a id="responsive-menu-button" class="btn btn-toggle navbar-btn pull-right" href="#">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="fa fa-bars fa-lg"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="row mobile-menu" id="sidr">
                                <div class="col-xs-12">
                                    <ul class="nav navbar-nav">
                                        <li>
                                            <a href="#"  class="logo">
                                                <img alt="Brand" src="<?php echo $template_url; ?>/img/SBC-Logo-Final.png" />
                                            </a>
                                            <a id="btn-mobile-close" href="javascript:void(0);" class="close">
                                                <span class="fa fa-close fa-lg"></span>
                                            </a>
                                        </li>
                                        <li><a href="<?php echo $site_url; ?>" class="text-uppercase"><?php echo translateX('Home'); ?></a></li>
                                        <li><a href="<?php echo $site_url; ?>/company/" class="text-uppercase"><?php echo translateX('Company'); ?></a></li>
                                        <li><a href="<?php echo $site_url; ?>/#header-service" data-goto="header-service" class="text-uppercase"><?php echo translateX('Service'); ?></a></li>
                                        <li><a href="<?php echo $site_url; ?>/news/" class="text-uppercase"><?php echo translateX('News'); ?></a></li>
                                        <li><a href="<?php echo $site_url; ?>/contact/" class="text-uppercase"><?php echo translateX('Contact'); ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>