<?php
/*
 * Author: Truong Ly
 *
 *
 */

function theme_customize_register($wp_customize) {

    $wp_customize->add_section('home', array(
        'title' => __('HOME VIDEO'),
        'priority' => 20,
    ));

    $wp_customize->add_setting('part_work_environment_movie_cover', array(
        'default' => '',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'part_work_environment_movie_cover_c', array(
        'label' => __('Work Environment Movie Cover'),
        'section' => 'home',
        'settings' => 'part_work_environment_movie_cover',
        'priority' => 1,
    )));
    $wp_customize->add_setting('part_work_environment_movie_mp4', array(
        'default' => '',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'part_work_environment_movie_mp4_c', array(
        'label' => __('Work Environment Movie MP4'),
        'section' => 'home',
        'settings' => 'part_work_environment_movie_mp4',
        'mime_type' => 'video',
        'priority' => 1,
    )));

    $wp_customize->add_setting('part_work_environment_movie_webm', array(
        'default' => '',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'part_work_environment_movie_webm_c', array(
        'label' => __('Work Environment Movie WEBM'),
        'section' => 'home',
        'settings' => 'part_work_environment_movie_webm',
        'priority' => 1,
        'mime_type' => 'video',
    )));

    $wp_customize->add_setting('part_work_environment_intro_text_en', array(
        'default' => '',
    ));
    $wp_customize->add_setting('part_work_environment_intro_text_ja', array(
        'default' => '',
    ));
    $wp_customize->add_setting('part_work_environment_intro_text_vi', array(
        'default' => '',
    ));

    $wp_customize->add_control('part_work_environment_intro_text_en', array(
        'label'   => __('Text in front of video here'),
        'section' => 'home',
        'settings' => 'part_work_environment_intro_text_en',
        'type'    => 'textarea',
        'priority' => 1,
    ));

    $wp_customize->add_control('part_work_environment_intro_text_ja', array(
        'label'   => __('テキストがビデオの前に表示され'),
        'section' => 'home',
        'settings' => 'part_work_environment_intro_text_ja',
        'type'    => 'textarea',
        'priority' => 1,
    ));

    $wp_customize->add_control('part_work_environment_intro_text_vi', array(
        'label'   => __('Văn bản sẽ được hiển thị ở phía trước của video'),
        'section' => 'home',
        'settings' => 'part_work_environment_intro_text_vi',
        'type'    => 'textarea',
        'priority' => 1,
    ));

    $wp_customize->add_section('contact', array(
        'title' => __('CONTACT'),
        'priority' => 21,
    ));

    $wp_customize->add_setting('part_contact_term_text_en', array(
        'default' => '',
    ));
    $wp_customize->add_setting('part_contact_term_text_ja', array(
        'default' => '',
    ));
    $wp_customize->add_setting('part_contact_term_text_vi', array(
        'default' => '',
    ));

    // Text_Editor_Custom_Control

    $wp_customize->add_control('part_contact_term_text_en', array(
        'label'   => __('Contact term'),
        'section' => 'contact',
        'settings' => 'part_contact_term_text_en',
        'type'    => 'textarea',
        'priority' => 1,
    ));
    $wp_customize->add_control('part_contact_term_text_ja', array(
        'label'   => __('接触項'),
        'section' => 'contact',
        'settings' => 'part_contact_term_text_ja',
        'type'    => 'textarea',
        'priority' => 1,
    ));
    $wp_customize->add_control('part_contact_term_text_vi', array(
        'label'   => __('Điều khoản liên hệ'),
        'section' => 'contact',
        'settings' => 'part_contact_term_text_vi',
        'type'    => 'textarea',
        'priority' => 1,
    ));
}

function theme_customize_enqueue() {
    wp_enqueue_script( 'customizer', get_template_directory_uri() . '/js/customizer.js' );
    // wp_enqueue_script( 'text_editor_custom_control', includes_url('js/tinymce/tinymce.min.js'), array('jquery'));
}

add_action('customize_register', 'theme_customize_register');
add_action( 'wp_enqueue_scripts', 'theme_customize_enqueue' );

function get_part_work_environment_movie_cover() {
    return esc_url(get_theme_mod('part_work_environment_movie_cover'));
}

function get_part_work_environment_movie_mp4() {
    $id = get_theme_mod('part_work_environment_movie_mp4');
    return wp_get_attachment_url($id);
}

function get_part_work_environment_movie_webm() {
    $id = get_theme_mod('part_work_environment_movie_webm');
    return wp_get_attachment_url($id);
}

function get_part_work_environment_intro_text() {
    $text = '';
    switch(get_bloginfo('language')) {
        case 'ja':
            $text =  get_theme_mod('part_work_environment_intro_text_ja');
            break;
        case 'vi':
            $text =  get_theme_mod('part_work_environment_intro_text_vi');
            break;
        default:
            $text =  get_theme_mod('part_work_environment_intro_text_en');
    }
    return $text;
}

function get_part_contact_term_text() {
    $text = '';
    switch(get_bloginfo('language')) {
        case 'ja':
            $text =  get_theme_mod('part_contact_term_text_ja');
            break;
        case 'vi':
            $text =  get_theme_mod('part_contact_term_text_vi');
            break;
        default:
            $text =  get_theme_mod('part_contact_term_text_en');
    }
    return $text;
}
