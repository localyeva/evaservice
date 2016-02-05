<?php
$site_url = get_bloginfo('siteurl');
$template_url = get_bloginfo('template_url');
?>
<div class="container-fluid header-footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 center-block page-top">
                <img src="<?php echo $template_url; ?>/img/28.png" alt="" class="img-responsive img-top hand" id="img-back-top">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="row">
                            <div class="col-xs-12">
                                <img src="<?php echo $template_url; ?>/img/SBC-Logo-Final.png" alt="" class="img-responsive center-block">
                            </div>
                        </div>
                        <div class="row-gap-small"></div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="btn btn-slim ev-mobie-footer center-block"><a class="alnk" href="<?php echo $site_url; ?>/contact">お問い合わせ</a></div>
                            </div>
                        </div>
                        <div class="row-gap-small"></div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="btn btn-slim fb-mobie-footer center-block"><a class="alnk" href="https://www.facebook.com/evolable.asia.eva">Facebook</a></div>
                            </div>
                        </div>
                        <div class="row-gap-small .visible-xs-*"></div>
                    </div>
                    <div class="col-xs-12 no-padding-lr menu-footer-mobi">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo $site_url; ?>">Home <span class="glyphicon glyphicon-menu-right right-icon" aria-hidden="true"></span></a></li>
                            <li><a href="<?php echo $site_url; ?>/company/">Company <span class="glyphicon glyphicon-menu-right right-icon" aria-hidden="true"></span></a></li>
                            <li><a href="<?php echo $site_url; ?>/#header-service" data-goto="header-service">Services <span class="glyphicon glyphicon-menu-right right-icon" aria-hidden="true"></span></a></li>
                            <li><a href="<?php echo $site_url; ?>/news/">News <span class="glyphicon glyphicon-menu-right right-icon" aria-hidden="true"></span></a></li>
                            <li><a href="<?php echo $site_url; ?>/contact/">Contact <span class="glyphicon glyphicon-menu-right right-icon" aria-hidden="true"></span></a></li>
                        </ul>
                    </div>
                    <div class="col-xs-4 col-md-4 hidden-xs">
                        <label>ホーチミン本社</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <p class="small">4F Saigon Finance Center, 9 Dinh Tien Hoang Street, District 1, HCMC</p>
                                <p class="small">TEL +84-8(39111489)</p>
                                <p class="small">FAX +84-8(39118767)</p>
                            </div>
                        </div>
                        <div class="row-gap-medium"></div>
                        <label>ホーチミン支店</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <small>14F GOLDEN TOWER, 6 Nguyen Thi Minh Khai Street,District1, HCMC</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4 col-md-4 hidden-xs">
                        <label>ハノイ支店</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <p class="small">9F Viet A Building, Duy Tan Street, Cau Giay District, Ha Noi</p>
                                <p class="small">TEL +84-4(37957577)</p>
                                <p class="small">FAX +84-4(37957580)</p>
                            </div>
                        </div>
                        <div class="row-gap-medium"></div>
                        <label>ダナン支店</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <small>A/H Zone 1F Danang Software Park - 02 Quang Trung,Hai Chau District, Da Nang</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-6">
                <div class="facebook">
                    <div id="fb-root"></div>
                    <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fevolable.asia.eva%3Ffref%3Dts&amp;width=500px&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=445550542212549" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:290px;" allowTransparency="true"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="<?php echo $template_url; ?>/js/jquery.min.js"></script>
    <script src="<?php echo $template_url; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $template_url; ?>/js/jquery-ui.js"></script>
    <script src="<?php echo $template_url; ?>/js/jquery.heightLine.js"></script>
    <script src="<?php echo $template_url; ?>/js/jquery.sidr.min.js"></script>
    <script src="<?php echo $template_url; ?>/js/wow.js"></script>
    <script src="<?php echo $template_url; ?>/js/parallax/parallax.js"></script>
    <script src="<?php echo $template_url; ?>/js/common.js"></script>
    <script type='text/javascript' src='<?php echo $site_url; ?>/wp-includes/js/wp-embed.min.js?ver=4.4'></script>
    <?php wp_footer(); ?>
</body>
</html>
