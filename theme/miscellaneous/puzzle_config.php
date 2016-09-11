<?php

/*
 * Puzzle Page Builder
 * Config
 */

/* General settings */
function wbg_modify_puzzle_settings($settings) {
    $settings->set_shortcodes(false);
    $settings->set_templates_directory('/theme/loops');
    $settings->set_owl_carousel(false);
    $settings->set_icon_library(false);
}
add_action('ppb_modify_settings', 'wbg_modify_puzzle_settings');

/* Field modifications */
function wbg_modify_puzzle_fields($f) {
    $f->field('background_color', false)
        ->remove_option('gray')
        ->add_option('alternative', 'Alternative Background', 1);
}
add_action('ppb_modify_fields', 'wbg_modify_puzzle_fields');

/* Section modifications */
function wbg_modify_puzzle_sections($puzzle_sections, $f) {
    $puzzle_sections->remove_sections(array('accordions', 'call-to-action', 'carousel', 'features', 'three-column'));
    
    foreach (glob(get_stylesheet_directory() . '/theme/sections/*.php') as $filename) {
        include $filename;
    }
}
add_action('ppb_modify_sections', 'wbg_modify_puzzle_sections', 10, 2);

?>
