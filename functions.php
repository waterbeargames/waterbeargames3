<?php
// Puzzle Pieces required settings
function puzzle_config_location() { return 'theme/settings/puzzle_config.php'; }
require_once('puzzle_pieces/puzzle_pieces.php');

// Custom Post Types
foreach (glob(get_stylesheet_directory() . '/theme/custom_post_types/*.php') as $filename) {
    include $filename;
}

// Allow SVG uploads
function wbg_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter('upload_mimes', 'wbg_myme_types', 1, 1);

// Register Menus
function puzzle_menus() {
    register_nav_menus( array(
        'primary'   => 'Primary Menu'
    ));
}
add_action('after_setup_theme', 'puzzle_menus');

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
function puzzle_scripts() {
    wp_enqueue_style('google-fonts-open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800');
    wp_enqueue_style('puzzle-style', get_template_directory_uri() . '/assets/css/main.css');
    
    if (!file_exists(get_stylesheet_directory() . '/assets/css/custom.css')) {
        puzzle_save_custom_style();
    }
    wp_enqueue_style('puzzle-custom-style', get_template_directory_uri() . '/assets/css/custom.css?' . filemtime(get_stylesheet_directory() . '/assets/css/custom.css'));
    
    wp_enqueue_script('puzzle-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'puzzle_scripts');

// Add Admin Styles
function puzzle_admin_styles() {
    wp_enqueue_style('puzzle-admin-styles', get_template_directory_uri() . '/assets/css/admin-styles.css');
}
add_action('admin_print_styles', 'puzzle_admin_styles');

// Set $content_width variable
if (!isset($content_width)) $content_width = 1200;

?>