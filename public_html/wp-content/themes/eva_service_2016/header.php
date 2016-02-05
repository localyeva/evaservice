<?php
$site_url = get_bloginfo('siteurl');
$template_url = get_bloginfo('template_url');
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="EVOLABLE ASIA Solution & Business Consultancyは、東南アジア地域で日系最大規模のラボ型開発企業であるEVOLABLE ASIAの100%子会社として設立。これまで培ってきたデジタルマーケティングに関するノウハウをコアバリューとしSolutionをカタチに実現します。" />
        <meta name="keywords" content="ベトナム, web制作,動画制作,SEO対策,マーケティング, エボラブルアジア, Evolable Asia" />

        <title>EVOLABLE ASIA Solution & Business Consultancy</title>

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
        <meta property="og:title" content="EVOLABLE ASIA Solution & Business Consultancy" />
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

        <script type="text/javascript">
            window._wpemojiSettings = {"baseUrl":"http:\/\/s.w.org\/images\/core\/emoji\/72x72\/","ext":".png","source":{"concatemoji":"http:\/\/evaservice.localhost\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.4"}};
            !function(a,b,c){function d(a){var c=b.createElement("canvas"),d=c.getContext&&c.getContext("2d");return d&&d.fillText?(d.textBaseline="top",d.font="600 32px Arial","flag"===a?(d.fillText(String.fromCharCode(55356,56806,55356,56826),0,0),c.toDataURL().length>3e3):("simple"===a?d.fillText(String.fromCharCode(55357,56835),0,0):d.fillText(String.fromCharCode(55356,57135),0,0),0!==d.getImageData(16,16,1,1).data[0])):!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g;c.supports={simple:d("simple"),flag:d("flag"),unicode8:d("unicode8")},c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.simple&&c.supports.flag&&c.supports.unicode8||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
        </script>
        <style type="text/css">
            img.wp-smiley,
            img.emoji {
                display: inline !important;
                border: none !important;
                box-shadow: none !important;
                height: 1em !important;
                width: 1em !important;
                margin: 0 .07em !important;
                vertical-align: -0.1em !important;
                background: none !important;
                padding: 0 !important;
            }
        </style>
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
                            <div class="col-md-4 col-xs-5">
                                <a href="<?php echo $site_url; ?>">
                                    <img src="<?php echo $template_url; ?>/img/SBC-Logo-Final.png" class="img-responsive" />
                                </a>
                            </div>
                            <div class="col-md-8 col-xs-7 pull-right">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="<?php echo $site_url; ?>/#header-service" data-goto="header-service">SERVICE</a></li>
                                    <li><a href="<?php echo $site_url; ?>/company/">COMPANY</a></li>
                                    <li><a href="<?php echo $site_url; ?>/news/">NEWS</a></li>
                                    <li><a href="<?php echo $site_url; ?>/contact/"><span class="btn-highlight">CONTACT</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 visible-xs text-center no-padding-lr">
                            <div class="navbar-header mobie-brand">
                                <div class="col-xs-6">
                                    <a class="logo-mobie" href="#">
                                        <img alt="Brand" src="<?php echo $template_url; ?>/img/SBC-Logo-Final.png" class="img-responsive" />
                                    </a>
                                </div>
                                <div class="col-xs-6">
                                    <a id="responsive-menu-button" class="btn btn-toggle navbar-btn pull-right" href="#">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="fa fa-bars fa-lg"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="row mobile-menu" id="sidr">
                                <div class="col-xs-12">
                                    <ul class="nav navbar-nav">
                                        <li><a href="<?php echo $site_url; ?>">HOME</a></li>
                                        <li><a href="<?php echo $site_url; ?>/company/">COMPANY</a></li>
                                        <li><a href="<?php echo $site_url; ?>/#header-service" data-goto="header-service">SERVICE</a></li>
                                        <li><a href="<?php echo $site_url; ?>/news/">NEWS</a></li>
                                        <li><a href="<?php echo $site_url; ?>/contact/">CONTACT</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>