<?php

/*
 * Author: KhangLe
 *
 *
 */

include_once(dirname(__FILE__) . '/lib/includes/cpt_acf_definitions.php');

/* --------------------------------------------------------------------- Init */

// init session id
function myStartSession() {
    if (!session_id()) {
        session_start();
    }
}

add_action('init', 'myStartSession', 1);

// add javascript
function scripts() {
    if (is_page('contact')) {
        wp_enqueue_script('js-validate', get_template_directory_uri() . '/js/jquery.validate.min.js', array(), '1.14.0', TRUE);
        wp_enqueue_script('js-contact', get_template_directory_uri() . '/js/contact.js', array('js-validate'), '1', TRUE);
    }
}

add_action('wp_print_scripts', 'scripts');

/* ---------------------------------------------------------------------Title */

function set_wp_title($title, $sep) {
    global $page, $paged;

    if (is_feed()) {
        return $title;
    }

    // Add the site name.
    $title .= get_bloginfo('name');

    if (is_front_page() || is_home()) {
        $title = "TOP $sep $title";
    } else {

        if (is_archive()) {
            if (is_post_type_archive('news')) {
                $title = "news $sep $title";
            }

            if (is_post_type_archive('recommend')) {
                $title = "recommend $sep $title";
            }

            if (is_post_type_archive('faq')) {
                $title = "faq $sep $title";
            }
        }

        if (is_page()) {
            if (is_page('company')) {
                $title = "company $sep $title";
            }

            if (is_page('service')) {
                $title = "service $sep $title";
            }


            if (is_page('vietnam')) {
                $title = "vietnam $sep $title";
            }


            if (is_page('recruit')) {
                $title = "recruit $sep $title";
            }

            if (is_page('contact') || is_page('confirm') || is_page('thankyou')) {
                $title = "contact $sep $title";
            }
        }
    }

    return $title;
}

add_filter('wp_title', 'set_wp_title', 10, 2);

/* ----------------------------------------------------------------------- Menu */

function remove_menus() {

    global $user_ID;

    $user = new WP_User($user_ID);
    $roles = $user->roles;
    $role = $roles[0];
    $arr_roles = array('administrator');

    if (in_array($role, $arr_roles)) {
        remove_menu_page('edit.php');                   //Posts
//        remove_menu_page('upload.php');                 //Media
        remove_menu_page('edit-comments.php');          //Comments
//        remove_menu_page('plugins.php');                //Plugins
//        remove_menu_page('users.php');                  //Users
        remove_menu_page('tools.php');                  //Tools
    } else {
        remove_menu_page('index.php');                  //Dashboard
        remove_menu_page('edit.php');                   //Posts
        remove_menu_page('upload.php');                 //Media
        remove_menu_page('edit.php?post_type=page');    //Pages
        remove_menu_page('edit-comments.php');          //Comments
        remove_menu_page('themes.php');                 //Appearance
        remove_menu_page('plugins.php');                //Plugins
        remove_menu_page('users.php');                  //Users
        remove_menu_page('tools.php');                  //Tools
        remove_menu_page('options-general.php');        //Settings
    }
}

//add_action('admin_menu', 'remove_menus');