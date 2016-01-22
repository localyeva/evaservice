<?php

/*
 * This file is custom post type, custom taxonomy and custom fields
 * definition file.
 *
 * Exported from CPT UI & Advanced Custom Fields
 */

/* ---------------------------------------------------------------------------- */
/* post type definitions */
/* ---------------------------------------------------------------------------- */

add_action( 'init', 'cptui_register_my_cpts' );
function cptui_register_my_cpts() {
    $labels = array(
        "name" => "Home Slider",
        "singular_name" => "Home Slider",
        );

    $args = array(
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "home-slider", "with_front" => true ),
        "query_var" => true,

        "supports" => array( "title" ),
    );
    register_post_type( "home-slider", $args );

    $labels = array(
        "name" => "Services",
        "singular_name" => "Service",
        );

    $args = array(
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "services", "with_front" => true ),
        "query_var" => true,

    );
    register_post_type( "services", $args );

    $labels = array(
        "name" => "News",
        "singular_name" => "Article",
        "menu_name" => "News",
        "all_items" => "All News",
        "add_new" => "Add New",
        "add_new_item" => "Add new Article",
        "edit_item" => "Edit Article",
        );

    $args = array(
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "has_archive" => true,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "rewrite" => array( "slug" => "news", "with_front" => true ),
        "query_var" => true,

        "supports" => array( "title", "editor", "excerpt" ),
    );
    register_post_type( "news", $args );

    $labels = array(
        "name" => "Company Profile",
        "singular_name" => "Company Profile",
        "menu_name" => "会社概要",
        "add_new_item" => "会社概要記事を書く",
        "edit_item" => "会社概要記事を編集",
        "new_item" => "新しい会社概要記事",
        "view_item" => "会社概要記事を見る",
        "search_items" => "会社概要記事を探す",
        "not_found" => "会社概要記事はありません",
        "not_found_in_trash" => "ゴミ箱に会社概要記事はありません",
    );

    $args = array(
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array("slug" => "company", "with_front" => true),
        "query_var" => true,
        "menu_position" => 28,
        "menu_icon" => get_template_directory_uri() . '/img/ad-ico/h3.png',
    );
    register_post_type("company", $args);

    $labels = array(
        "name" => "Company Activities",
        "singular_name" => "Company Activities",
    );

    $args = array(
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array("slug" => "company-activities", "with_front" => true),
        "query_var" => true,
        "menu_position" => 28,
        "menu_icon" => get_template_directory_uri() . '/img/ad-ico/h3.png',
        "supports" => array("title"),
    );
    register_post_type("company-activities", $args);

// End of cptui_register_my_cpts()
}


/* ---------------------------------------------------------------------------- */
/* taxonomy definitions */
/* ---------------------------------------------------------------------------- */

add_action('init', 'cptui_register_my_taxes');
function cptui_register_my_taxes() {
    $labels = array(
        "name" => "News Categories",
        "label" => "News Categories",
    );

    $args = array(
        "labels" => $labels,
        "hierarchical" => true,
        "label" => "News Type",
        "show_ui" => true,
        "query_var" => true,
        "rewrite" => array('slug' => 'news-type', 'with_front' => true),
        "show_admin_column" => false,
    );
    register_taxonomy("news-type", array("news"), $args);

    $labels = array(
        "name" => "Company Taxonomy",
        "label" => "Company Taxonomy",
    );

    $args = array(
        "labels" => $labels,
        "hierarchical" => true,
        "label" => "Company Taxonomy",
        "show_ui" => true,
        "query_var" => true,
        "rewrite" => array('slug' => 'company-tax', 'with_front' => true),
        "show_admin_column" => false,
    );
    register_taxonomy("company-tax", array("company", "company-activities"), $args);

// End cptui_register_my_taxes
}

/* ---------------------------------------------------------------------------- */
/* custom fields definitions */
/* ---------------------------------------------------------------------------- */

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_home-slider',
        'title' => 'Home Slider',
        'fields' => array (
            array (
                'key' => 'field_569c5cd41a19b',
                'label' => 'Images',
                'name' => 'images',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_569c5ced1a19c',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'object',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'home-slider',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));

    register_field_group(array (
        'id' => 'acf_services',
        'title' => 'Services',
        'fields' => array (
            array (
                'key' => 'field_569dee80f30bb',
                'label' => 'Image',
                'name' => 'image',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'services',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));

    register_field_group(array (
        'id' => 'acf_news',
        'title' => 'News',
        'fields' => array (
            array (
                'key' => 'field_569ef274d6435',
                'label' => 'Featured Image',
                'name' => 'featured_image',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'news',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));

    register_field_group(array(
        'id' => 'acf_company',
        'title' => 'Company Profile',
        'fields' => array(
            array(
                'key' => 'field_55c0283510150',
                'label' => '社名',
                'name' => 'name',
                'type' => 'text',
                'instructions' => '社名をいれてください',
                'required' => 1,
                'default_value' => 'EVOLABLE ASIA Co., Ltd',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_55c02a5d361f8',
                'label' => '所在地',
                'name' => 'location',
                'type' => 'textarea',
                'instructions' => '所在地をいれてください',
                'required' => 1,
                'default_value' => 'ホーチミン本社：4F Saigon Finance Center, 9 Dinh Tien Hoang Street, District 1, HCMC
    ホーチミン支店：14F GOLDEN TOWER, 6 Nguyen Thi Minh Khai Street,District1, HCMC
    ハ　ノ　イ支店：9F Viet A Building, Duy Tan Street, Cau Giay District, Ha Noi',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'formatting' => 'br',
            ),
            array(
                'key' => 'field_55c02a83361f9',
                'label' => '電話番号',
                'name' => 'phone_number',
                'type' => 'textarea',
                'instructions' => '電話番号をいれてください',
                'required' => 1,
                'default_value' => 'ホーチミン本社：+84-8(39111489)
    ハ　ノ　イ支店：+84-4(37957577), +84-4(37957578), +84-4(37957579)',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'formatting' => 'br',
            ),
            array(
                'key' => 'field_55c02aa6361fa',
                'label' => 'FAX',
                'name' => 'fax',
                'type' => 'textarea',
                'instructions' => 'FAX番号をいれてください',
                'required' => 1,
                'default_value' => 'ホーチミン本社：+84-8(39118767)
    ハ　ノ　イ支店：+84-4(37957580)',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'formatting' => 'br',
            ),
            array(
                'key' => 'field_55c02ad2361fb',
                'label' => '役員',
                'name' => 'officer',
                'type' => 'text',
                'instructions' => '役員をいれてください',
                'required' => 1,
                'default_value' => '代表取締役社長　薛 悠司',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'formatting' => 'br',
            ),
            array(
                'key' => 'field_55c02ba4361fc',
                'label' => '設立',
                'name' => 'establishment',
                'type' => 'text',
                'instructions' => '設立年月日をいれてください',
                'required' => 1,
                'default_value' => '2012年3月15日',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_55c02be63b6ca',
                'label' => '資本金',
                'name' => 'Capital',
                'type' => 'text',
                'instructions' => '資本金をいれてください',
                'required' => 1,
                'default_value' => '20万米ドル',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_55c02c063b6cb',
                'label' => '事業内容',
                'name' => 'desc',
                'type' => 'text',
                'instructions' => '事業内容をいれてください',
                'required' => 1,
                'default_value' => 'ITオフショア開発事業・BPO（ビジネスプロセスアウトソーシング）事業',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_55c02c303b6cc',
                'label' => 'ライセンスNo.',
                'name' => 'licence',
                'type' => 'text',
                'instructions' => 'ライセンスナンバーをいれてください',
                'required' => 1,
                'default_value' => 412023000388,
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'formatting' => 'br',
            ),
            array(
                'key' => 'field_55c02f0478ff5',
                'label' => '従業員数',
                'name' => 'staff',
                'type' => 'text',
                'instructions' => '従業員数をいれてください',
                'required' => 1,
                'default_value' => '496名（ホーチミン450名+ハノイ46名　※2015年05月04日現在）',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_55c02f3278ff6',
                'label' => '主要取引銀行',
                'name' => 'bank',
                'type' => 'textarea',
                'instructions' => '主要取引銀行を入力してください',
                'required' => 1,
                'default_value' => 'みずほ銀行
    Bangkok bank',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'formatting' => 'br',
            ),
            array(
                'key' => 'field_55c02f5778ff7',
                'label' => '経営理念',
                'name' => 'principles',
                'type' => 'text',
                'instructions' => '経営理念をいれてください',
                'required' => 1,
                'default_value' => 'アジアを代表する開発・運用チームをつくる',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_565d5c1583a8e',
                'label' => 'History',
                'name' => 'history',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_565d5c2fe21b0',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_565d5c3e23301',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
            array(
                'key' => 'field_565d5e0811f5f',
                'label' => 'Images',
                'name' => 'images',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_565d5e1cae26b',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_565d5e13a1f4c',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'company',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(
                0 => 'permalink',
                1 => 'the_content',
                2 => 'excerpt',
                3 => 'custom_fields',
                4 => 'discussion',
                5 => 'comments',
                6 => 'revisions',
                7 => 'slug',
                8 => 'author',
                9 => 'format',
                10 => 'featured_image',
                11 => 'categories',
                12 => 'tags',
                13 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));

    register_field_group(array(
        'id' => 'acf_company-activities',
        'title' => 'Company Activities',
        'fields' => array(
            array(
                'key' => 'field_5641a299b203b',
                'label' => 'Image',
                'name' => 'image',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array(
                'key' => 'field_5641a2d5b203c',
                'label' => 'Description',
                'name' => 'description',
                'type' => 'textarea',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'formatting' => 'br',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'company-activities',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(
            ),
        ),
        'menu_order' => 0,
    ));
}
