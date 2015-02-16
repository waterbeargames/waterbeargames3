<?php

require_once('includes/page_builder/helpers.php');
require_once('includes/page_builder/models/wbg_section.php');

foreach (glob(get_stylesheet_directory() . '/includes/page_builder/models/wbg_section_*.php') as $filename) {
    include $filename;
}

require_once('includes/page_builder/config.php');
require_once('includes/page_builder/markup.php');
require_once('includes/page_builder/page_builder.php');

require_once('includes/theme_settings.php');

// Register Menus
function wbg_menus() {
	register_nav_menus( array(
		'primary'	=> 'Primary Menu'
	));
}
add_action('after_setup_theme', 'wbg_menus');

// Initialize sidebar widget
function sidebar_widget_init() {
	register_sidebar(array(
		'name'          => 'Main Sidebar',
		'id'            => 'main-sidebar',
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	));
}
add_action('widgets_init', 'sidebar_widget_init');

// Add Styles and Scripts
function wbg_scripts() {
    wp_enqueue_style('dl-menu-component', get_template_directory_uri() . '/css/lib/dl-menu-component.css');
    wp_enqueue_style('font-awesome-style', get_template_directory_uri() . '/css/lib/font-awesome.min.css');
    wp_enqueue_style('wbg-style', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_script('dl-menu-modernizr', get_template_directory_uri() . '/js/lib//modernizr.dlmenu.js', array('jquery'));
    wp_enqueue_script('dl-menu-script', get_template_directory_uri() . '/js/lib/jquery.dlmenu.js', array('jquery'));
    wp_enqueue_script('wbg-script', get_template_directory_uri() . '/js/main.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'wbg_scripts');

// Add Admin Styles
function admin_styles() {
    wp_enqueue_style('wbg-admin-css', get_template_directory_uri() . '/css/admin-styles.css');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/lib/font-awesome.min.css');
}
add_action('admin_print_styles', 'admin_styles');

// Add Admin Scripts
function admin_scripts() {
    wp_enqueue_media();
    wp_enqueue_script('wbg-admin-js', get_template_directory_uri() . '/js/admin-js.js', array('jquery', 'jquery-ui-sortable'));
}
add_action('admin_print_scripts', 'admin_scripts');

// Add Featured Image Support
add_theme_support('post-thumbnails');

// Add Feed Links
add_theme_support('automatic-feed-links');

// Add like_the_content Filter
//
// Has the same actions as the_content but for times when running
// the_content filter conflicts with plugins.
add_filter('like_the_content', 'wptexturize');
add_filter('like_the_content', 'convert_smilies');
add_filter('like_the_content', 'convert_chars');
add_filter('like_the_content', 'wpautop');
add_filter('like_the_content', 'shortcode_unautop');
add_filter('like_the_content', 'prepend_attachment');

// Alters formatting of excerpt_more
function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Redirects pages with section template
// The 301 redirect should also prevent sections' pages from being listed in Google.
function template_section_redirect() {
    global $wp_query;
    
    if (is_page_template('template-section.php')) {
        $parent = get_post($wp_query->queried_object->post_parent);
        $parent_url = get_permalink($parent);
        
        // If the section does not have a parent, redirects to home page
        if ($parent_url == get_permalink($wp_query->queried_object->ID)) {
            $parent_url = get_site_url();
        }
        
        wp_redirect(esc_url_raw($parent_url), 301);
        exit;
    }
}
add_action('template_redirect', 'template_section_redirect', 1);

?>