<?php

/*
 * Puzzle Page Builder
 * Config
 */

/* General settings */
function wbg_modify_puzzle_settings($settings) {
    $settings->set_button_formats(false);
    $settings->set_templates_directory('/theme/loops');
    $settings->set_owl_carousel(false);
    $settings->set_icon_library(false);
    
    $settings->set_spacing(array(
        'unit'              => 'rem',
        'section_padding'   => 1.5,
        'column_padding'    => 0.75,
        'column_margin'     => 0.375
    ));
}
add_action('ppb_modify_settings', 'wbg_modify_puzzle_settings');

/* Color modifications */
function wbg_modify_puzzle_colors($colors) {
    $wbg_theme_colors = wbg_theme_colors();
    
    $primary = new PuzzleColor(array(
        'name'              => 'Blue',
        'id'                => 'primary',
        'color'             => $wbg_theme_colors['primary_color'],
        'text_color_scheme' => 'light',
        'order'             => 0
    ));
    
    $secondary = new PuzzleColor(array(
        'name'              => 'Aqua',
        'id'                => 'secondary',
        'color'             => $wbg_theme_colors['secondary_color'],
        'text_color_scheme' => 'light',
        'order'             => 1
    ));
    
    $white = new PuzzleColor(array(
        'name'              => 'White',
        'id'                => 'white',
        'color'             => '#fff',
        'text_color_scheme' => 'dark',
        'order'             => 2
    ));
    
    $accent = new PuzzleColor(array(
        'name'              => 'Yellow',
        'id'                => 'accent',
        'color'             => $wbg_theme_colors['accent_color'],
        'text_color_scheme' => 'dark',
        'order'             => 3
    ));
    
    $alternative = new PuzzleColor(array(
        'name'              => 'Gray',
        'id'                => 'alternative',
        'color'             => $wbg_theme_colors['alternative_background'],
        'text_color_scheme' => 'dark',
        'order'             => 4
    ));
    
    $colors->replace_theme_colors(array(
        $primary, $secondary, $white, $accent, $alternative
    ));
    
    $colors->set_text_colors(array(
        'headline_dark'     => $wbg_theme_colors['headline_dark'],
        'text_dark'         => $wbg_theme_colors['text_dark'],
        'headline_light'    => $wbg_theme_colors['headline_light'],
        'text_light'        => $wbg_theme_colors['text_light']
    ));
    
    $colors->set_link_colors(array(
        'link_dark'         => $wbg_theme_colors['secondary_color'],
        'link_dark_hover'   => $wbg_theme_colors['primary_color'],
        'link_light'        => $wbg_theme_colors['accent_color'],
        'link_light_hover'  => 'rgba(255, 255, 255, 0.6)'
    ));
}
add_action('ppb_modify_colors', 'wbg_modify_puzzle_colors');

/* Section modifications */
function wbg_modify_puzzle_sections($puzzle_sections, $f) {
    $puzzle_sections->keep_sections(array('one-column', 'two-column'));
    
    foreach (glob(get_stylesheet_directory() . '/theme/sections/*.php') as $filename) {
        include $filename;
    }
}
add_action('ppb_modify_sections', 'wbg_modify_puzzle_sections', 10, 2);

?>
