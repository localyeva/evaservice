<?php
/*
 * Author: Truong Ly
 * Template Name: Contact-Confirm
 *
 */

if (isset($_POST['submit'])) {

    //お問い合わせフォーム内容
    $reg_company = @htmlspecialchars(stripslashes($_POST['reg_company']));
    $reg_division = @htmlspecialchars(stripslashes($_POST['reg_division']));
    $reg_name = @htmlspecialchars(stripslashes($_POST['reg_name']));
    $reg_email = @htmlspecialchars($_POST['reg_email']);
    $reg_tel = @htmlspecialchars($_POST['reg_tel']);
    $reg_inq = @$_POST['reg_inq'];
    $reg_inq_other = @htmlspecialchars(stripslashes($_POST['reg_inq_other']));
    $reg_itemSelect = @$_POST['itemSelect'];

    $reg_content = @htmlspecialchars(stripslashes($_POST['reg_content']));

    $reg_inq_all = NULL;
    $arr_inq = array('知人の紹介', '雑誌', '新聞', 'テレビ', 'インターネット記事', 'インターネット検索', 'Facebook', 'EVOLABLE ASIAブログ', 'その他');
    $arr_inq_checked = array('', '', '', '', '', '', '', '', '');
    if (is_array($reg_inq)) {
        foreach ($reg_inq as $value) {
            $key = array_search($value, $arr_inq);
            $arr_inq_checked[$key] = 'checked';
            //
            if ($value != 'その他') {
                $reg_inq_all[] = htmlspecialchars($value);
            } else {
                $reg_inq_all[] = htmlspecialchars($reg_inq_other);
            }
        }
    }

    $_SESSION['contact'] = array(
        'reg_company' => $reg_company,
        'reg_division' => $reg_division,
        'reg_name' => $reg_name,
        'reg_email' => $reg_email,
        'reg_tel' => $reg_tel,
        'reg_inq' => $reg_inq,
        'reg_inq_other' => $reg_inq_other,
        'inq_all' => $reg_inq_all,
        'itemSelect' => $reg_itemSelect,
        'reg_content' => $reg_content,
    );
} elseif (isset($_POST['send'])) {
    //
    $data = array(
        'entry_time' => gmdate("Y/m/d H:i:s", time() + 9 * 3600),
        'entry_host' => gethostbyaddr(getenv("REMOTE_ADDR")),
        'entry_ua' => getenv("HTTP_USER_AGENT"),
        //
        'company' => $_SESSION['contact']['reg_company'],
        'division' => $_SESSION['contact']['reg_division'],
        'name' => $_SESSION['contact']['reg_name'],
        'email' => $_SESSION['contact']['reg_email'],
        'tel' => $_SESSION['contact']['reg_tel'],
        'inq' => $_SESSION['contact']['reg_inq'],
        'inq_other' => $_SESSION['contact']['reg_inq_other'],
        'inq_all' => $_SESSION['contact']['inq_all'],
        'itemSelect' => $_SESSION['contact']['itemSelect'],
        'content' => $_SESSION['contact']['reg_content'],
    );

    require_once 'lib/Twig/Autoloader.php';
    Twig_Autoloader::register();

    $loader = new Twig_Loader_String;

    $twig = new Twig_Environment($loader);

    $from = omw_get_option('wpt_omw_text_from_email');
    $fromname = omw_get_option('wpt_omw_text_from_name');
    // Mail to Client
    $body_client = omw_get_option('wpt_omw_text_block_client');
    if (isset($body_client) && $body_client != '') {
        $body_client = $twig->render($body_client, $data);
        $subject_client = $twig->render(omw_get_option('wpt_omw_text_subject_client'), $data);
        $headers = 'From: ' . $fromname . ' <' . $from . '>' . '\r\n';
        //
        wp_mail($data['email'], stripslashes($subject_client), stripslashes($body_client), $headers);
    }

    //Admin用メッセージ
    $body_admin = omw_get_option('wpt_omw_text_block_admin');
    if (isset($body_admin) && $body_admin != '') {
        $body_admin = $twig->render($body_admin, array_merge(
                        $data, array(
            'entry_time' => gmdate("Y/m/d H:i:s", time() + 9 * 3600),
            'entry_host' => gethostbyaddr(getenv("REMOTE_ADDR")),
            'entry_ua' => getenv("HTTP_USER_AGENT"),
        )));
        //
        $subject_admin = omw_get_option('wpt_omw_text_subject_admin');
        //
        $list_email = omw_get_option('wpt_omw_text_list_email');
        if (isset($list_email) && $list_email != '') {
            $list_email = preg_split('/\r\n|\n|\r/', $list_email);
            //
            $headers = 'From: ' . $fromname . ' <' . $from . '>' . '\r\n';
            //
            wp_mail($list_email, stripslashes($subject_admin), stripslashes($body_admin), $headers);
        }
    }

    unset($_SESSION['contact']);

    wp_redirect(home_url() . '/contact/thankyou');
    exit();
} else {
    wp_redirect(home_url() . '/contact');
    exit();
}

get_header();
?>

<section>
    <div class="row-gap-medium"></div>
    <div class="head-banner-wrap no-background">
        <h2>ご入力内容の確認</h2>
    </div>

    <div class="row-gap-medium"></div>
    <div class="container-fluid bg-silver">
        <?php custom_breadcrumbs('contact'); ?>
    </div>
    <div class="row-gap-medium"></div>

    <div class="container contact">
        <div class="row" style="max-width:800px;margin:auto;">
            <p class="eva-info">
                <b>以下の内容がメールで送信されます。</b><br/>
                入力・選択された内容をご確認のうえ、「入力内容を送信」ボタンをクリックしてください。入力内容を訂正する場合は、「戻る」をクリックしてください。
            </p>
            <div class="row-gap-medium"></div>
            <table class="table table-bordered">
                <colgroup>
                    <col class="col-sm-2">
                    <col class="col-sm-10">
                </colgroup>
                <tr>
                    <td>会社名</td>
                    <td><?php echo $_SESSION['contact']['reg_company'] ?></td>
                </tr>
                <tr>
                    <td>部署名</td>
                    <td><?php echo $_SESSION['contact']['reg_division'] ?></td>
                </tr>
                <tr>
                    <td>お名前</td>
                    <td><?php echo $_SESSION['contact']['reg_name'] ?></td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td><?php echo $_SESSION['contact']['reg_email'] ?></td>
                </tr>
                <tr>
                    <td>Tel</td>
                    <td><?php echo $_SESSION['contact']['reg_tel'] ?></td>
                </tr>
                <tr>
                    <td>どこでエボラブルアジアを知りましたか?</td>
                    <td>
                        <?php if (!is_null($_SESSION['contact']['inq_all'])): ?>
                            <ul>
                                <?php foreach ($_SESSION['contact']['inq_all'] as $value): ?>
                                    <li><?php echo $value ?></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>お問い合わせ項目</td>
                    <td><?php echo $_SESSION['contact']['itemSelect'] ?></td>
                </tr>
                <tr>
                    <td>お問い合わせ内容</td>
                    <td><?php echo $_SESSION['contact']['reg_content'] ?></td>
                </tr>
            </table>

            <form method="POST">
                <div class="center">
                    <button class="btn btn-success center-block inline-block btn-confirm" type="submit">入力内容を送信</button>
                    <div class="row-gap-big"></div>
                    <table class="table table-borderless">
                        <tr>
                            <td>
                                <a class="btn inline-block" href="<?php echo bloginfo('url') ?>/contact">
                                    <button class="btn btn-default center-block inline-block btn-confirm" type="button">戻る</button>
                                </a>
                                <input type="hidden" name="send" value="send"/>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>
    <div class="row-gap-big"></div>
</section>

<?php get_footer(); ?>
