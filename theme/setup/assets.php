<?php

/*
 * Water Bear Games
 * Assets
 */

/* Add styles and scripts */
function wbg_scripts() {
    /* Google fonts */
    wp_enqueue_style('wbg-google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800');
    
    /* Main styles */
    $wbg_style_location = '/assets/css/main.css';
    wp_enqueue_style('wbg-style', get_template_directory_uri() . $wbg_style_location, array(), filemtime(get_stylesheet_directory() . $wbg_style_location));
    
    /* Custom styles generated from user options */
    $wbg_custom_style_location = '/assets/css/custom.css';
    puzzle_check_if_custom_style_exists();
    wp_enqueue_style('wbg-custom-style', get_template_directory_uri() . $wbg_custom_style_location, array(), filemtime(get_stylesheet_directory() . $wbg_custom_style_location));
    
    /* DL Menu Modernizr */
    $dl_menu_modernizr_location = '/assets/js/lib/modernizr.dlmenu.js';
    wp_enqueue_script(
        'dl-menu-modernizr',
        get_template_directory_uri() . $dl_menu_modernizr_location,
        array('jquery'),
        filemtime(get_stylesheet_directory() . $dl_menu_modernizr_location)
    );
    
    /* DL Menu */
    $dl_menu_script_location = '/assets/js/lib/jquery.dlmenu.js';
    wp_enqueue_script(
        'dl-menu-script',
        get_template_directory_uri() . $dl_menu_script_location,
        array('jquery'),
        filemtime(get_stylesheet_directory() . $dl_menu_script_location)
    );
    
    /* Main script */
    $wbg_script_location = '/assets/js/main.js';
    wp_enqueue_script('wbg-script', get_template_directory_uri() . $wbg_script_location, array('jquery'), filemtime(get_stylesheet_directory() . $wbg_script_location));
}
add_action('wp_enqueue_scripts', 'wbg_scripts');

/* Add admin style */
function wbg_admin_style() {
    wp_enqueue_style('wbg-admin-style', get_template_directory_uri() . '/assets/css/admin-style.css');
}
add_action('admin_print_styles', 'wbg_admin_style');

/* Add script for comments */
function pzp_enqueue_comments_reply() {
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('comment_form_before', 'pzp_enqueue_comments_reply');

?>
