<?php
/*
 * Author: Truong Ly
 * Template Name: Contact-Thankyou
 *
 */

get_header();
?>

<section>
    <div class="row-gap-medium"></div>
    <div class="head-banner-wrap no-background">
                <h2>お問い合わせ</h2>
    </div>
    <div class="row-gap-medium"></div>
    <div class="container-fluid bg-silver">
        <?php custom_breadcrumbs('contact'); ?>
    </div>
    <div class="row-gap-medium"></div>

    <div class="container contact">
       <div class="row" style="max-width:800px;margin:auto;">
        <p class="t20b20 taC fwB fz16"> お問い合わせありがとうございます。 </p>
            <p class="t20b20">送信が完了いたしました。<br />
                弊社で確認後、折り返しご連絡させていただきます。<br />
            </p>
            <p class=" t20b0 txtContact02 fwB"><a href="/">←TOPへ戻る</a></p>
            <p class="taC t30b0">上記フォームで送信できない場合は、必要項目をご記入の上、<br />
                <a href="mailto:info@evolable.asia">info@evolable.asia</a>までメールをお送りください。</p>
       </div>
    </div>
</section>
 <div class="row-gap-big"></div>
<?php get_template_part('part', 'contact'); ?>

<?php
get_footer();
?>