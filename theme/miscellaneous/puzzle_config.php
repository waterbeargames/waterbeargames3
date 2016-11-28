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
    
    $primary = new PuzzleColor;
    $primary->set_name('Blue')
        ->set_id('primary')
        ->set_color($wbg_theme_colors['primary_color'])
        ->set_text_color_scheme('light');
    
    $secondary = new PuzzleColor;
    $secondary->set_name('Aqua')
        ->set_id('secondary')
        ->set_color($wbg_theme_colors['secondary_color'])
        ->set_text_color_scheme('light');
    
    $white = new PuzzleColor;
    $white->set_name('White')
        ->set_id('white')
        ->set_color('#fff')
        ->set_text_color_scheme('dark');
    
    $accent = new PuzzleColor;
    $accent->set_name('Yellow')
        ->set_id('accent')
        ->set_color($wbg_theme_colors['accent_color'])
        ->set_text_color_scheme('dark');
    
    $alternative = new PuzzleColor;
    $alternative->set_name('Gray')
        ->set_id('alternative')
        ->set_color($wbg_theme_colors['alternative_background'])
        ->set_text_color_scheme('dark');
    
    $colors->replace_theme_colors(array(
        $primary, $secondary, $white, $accent, $alternative
    ));
    
    $colors->set_text_colors(array(
        'headline_dark'     => $wbg_theme_colors['headline_dark'],
        'text_dark'         => $wbg_theme_colors['text_dark'],
        'headline_light'    => $wbg_theme_colors['headline_light'],
        'text_light'        => $wbg_theme_colors['text_light']
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
