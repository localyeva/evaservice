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
}

add_action('customize_register', 'theme_customize_register');

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
