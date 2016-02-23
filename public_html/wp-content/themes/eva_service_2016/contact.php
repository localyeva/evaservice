<?php
/*
 * Author: Truong Ly
 * Template Name: Contact Form
 *
 */

$reg_company = @$_SESSION['contact']['reg_company'];
$reg_division = @$_SESSION['contact']['reg_division'];
$reg_name = @$_SESSION['contact']['reg_name'];
$reg_email = @$_SESSION['contact']['reg_email'];
$reg_tel = @$_SESSION['contact']['reg_tel'];
$reg_inq = @$_SESSION['contact']['reg_inq'];
$reg_inq_other = @$_SESSION['contact']['reg_inq_other'];
$reg_itemSelect = @$_SESSION['contact']['itemSelect'];
$reg_content = @$_SESSION['contact']['reg_content'];

$arr_itemSelect = array(
    '▼下記からお選びください',
    'WEBサイト（ホームページ）制作',
    '動画制作',
    'デザイン制作',
    'SEO（検索エンジン最適化）サービス ',
    'ソーシャルメディア運用代行',
    'ネットワーク構築',
    'その他',
);

$reg_inq_all = '';
$arr_inq = array('知人の紹介', '雑誌', '新聞', 'テレビ', 'インターネット記事', 'インターネット検索', 'Facebook', 'EVOLABLE ASIAブログ', 'その他');
$arr_inq_checked = array('', '', '', '', '', '', '', '', '');
if (is_array($reg_inq)) {
    foreach ($reg_inq as $value) {
        $key = array_search($value, $arr_inq);
        $arr_inq_checked[$key] = 'checked';
        //
        $reg_inq_all .= htmlspecialchars($value) . "<br/>";
    }
}

get_header();
?>

<section>
    <div class="container-fluid bg-silver">
        <?php custom_breadcrumbs('contact'); ?>
    </div>
    <div class="row-gap-medium"></div>
    <div class="head-banner-wrap no-background">
        <h2><?php echo translateX('Contact') ?></h2>
    </div>
    <div class="row-gap-medium"></div>
    <div class="container contact">
        <form id="contact-form" name="contact" class="form-horizontal" method="post"  action="<?php bloginfo('url') ?>/contact/confirm/" novalidate="novalidate">
            <h3 class="title"><?php echo translateX('Please fill in the following and contact us'); ?></h3>
    <div class="row-gap-big"></div>
            <div class="form-group">
                <label for="contact-company-name" class="col-sm-3 control-label control-label-left"><?php echo translateX('Your company name'); ?><span class="red">※</span></label>
                <div class="col-sm-9">
                    <input type="text" id="contact-company-name" name="reg_company" class="form-control" placeholder="" value="<?php echo $reg_company ?>" />
                </div>
            </div>
            <div class="form-group">
                <label for="contact-division-name" class="col-sm-3 control-label control-label-left"><?php echo translateX('Division name'); ?></label>
                <div class="col-sm-9">
                    <input type="text" id="contact-division-name" name="reg_division" class="form-control" placeholder="" value="<?php echo $reg_division ?>" />
                </div>
            </div>
            <div class="form-group">
                <label for="contact-name" class="col-sm-3 control-label control-label-left"><?php echo translateX('Your name'); ?><span class="red">※</span></label>
                <div class="col-sm-9">
                    <input type="text" id="contact-name" name="reg_name" class="form-control" placeholder="" value="<?php echo $reg_name ?>" />
                </div>
            </div>
            <div class="form-group">
                <label for="contact-email" class="col-sm-3 control-label control-label-left"><?php echo translateX('E-mail'); ?><span class="red">※</span></label>
                <div class="col-sm-9">
                    <input type="email" id="contact-email" name="reg_email" class="form-control" placeholder="" value="<?php echo $reg_email ?>" />
                </div>
            </div>
            <div class="form-group">
                <label for="contact-tel" class="col-sm-3 control-label control-label-left"><?php echo translateX('Tel'); ?><span class="red">※</span></label>
                <div class="col-sm-9">
                    <input type="text" id="contact-tel" name="reg_tel" class="form-control" placeholder="" value="<?php echo $reg_tel ?>" />
                </div>
            </div>
<!-----------------------------------------------------------------------------------------------------------------------
            <div class="form-group">
                <label for="contact-tel" class="col-sm-3 control-label control-label-left">どこでエボラブルアジアを知りましたか?</label>
                <div class="col-sm-9">
                    <div class="checkbox">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="reg_inq[]" value="知人の紹介" <?php echo $arr_inq_checked[0] ?>/> 知人の紹介
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="reg_inq[]" value="雑誌" <?php echo $arr_inq_checked[1] ?>/> 雑誌
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="reg_inq[]" value="新聞" <?php echo $arr_inq_checked[2] ?>/> 新聞
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="reg_inq[]" value="テレビ <?php echo $arr_inq_checked[3] ?>"/> テレビ
                        </label>
                    </div>
                    <div class="checkbox">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="reg_inq[]" value="インターネット記事" <?php echo $arr_inq_checked[4] ?>/> インターネット記事
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="reg_inq[]" value="インターネット検索" <?php echo $arr_inq_checked[5] ?>/> インターネット検索
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="reg_inq[]" value="Facebook" <?php echo $arr_inq_checked[6] ?>/> Facebook
                        </label>

                    </div>
                    <div class="checkbox">
                        <label class="other">
                            <input type="checkbox" id="inq_o" name="reg_inq[]" for="contact-inq_other_text" value="その他" <?php echo $arr_inq_checked[8] ?>/> その他
                            <input type="text" id="contact-inq_other_text" name="reg_inq_other" class="form-control" <?php echo ($arr_inq_checked[8] == 'checked') ? '' : 'disabled="disabled"' ?> value="<?php echo $reg_inq_other ?>" />
                        </label>
                    </div>
                </div>
            </div>
--------------------------------------------------------------------------------------------------------------------->
            <div class="form-group">
                <label for="contact-item" class="col-sm-3 control-label control-label-left"><?php echo translateX('Contact item'); ?><span class="red">※</span></label>
                <div class="col-sm-9">
                    <?php
                    echo mwp_dropdownList($arr_itemSelect, array('id' => 'contact-item', 'name' => 'itemSelect', 'class' => 'form-control'), $reg_itemSelect, false, array(0));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="contact-content" class="col-sm-3 control-label control-label-left"><?php echo translateX('Content of inquiry'); ?><span class="red">※</span></label>
                <div class="col-sm-9">
                    <textarea id="contact-content" name="reg_content" class="form-control" rows="10"><?php echo $reg_content ?></textarea>
                </div>
            </div>

            <div class="col-sm-12 privacy">
                <div class="box">
                    <strong><?php echo translateX('(Terms of personal information policy)'); ?></strong>
                    <div class="privacy-content"><?php echo get_part_contact_term_text(); ?></div>
                </div>
            </div>

            <div class="form-group send">
                <div class="col-sm-12 hold-btn-send">
                    <button class="btn btn-success center-block" type="submit">同意して送信する</button>
                    <input type="hidden" name="submit" value="submit"/>
                </div>
            </div>

        </form>
    </div>
</section>

<?php get_template_part('part', 'contact'); ?>

<?php get_footer(); ?>
