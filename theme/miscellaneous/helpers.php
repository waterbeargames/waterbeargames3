<?php

/*
 * Puzzle
 * Helper functions
 */

// Determines classes for a section. Can be edited on a theme-by-theme basis.
//
// $page_section - array of data pertaining to the section
//
// Returns a string of classes for a section
function section_classes($page_section) {
    $puzzle_options_data = $page_section['options'];
    
    $section_classes  = 'puzzle-' . $page_section['type'];
    $section_classes .= (!empty($puzzle_options_data['background_color']) ? ' ' . $puzzle_options_data['background_color'] . '-background' : '');
    $section_classes .= (!empty($puzzle_options_data['text_color_scheme']) ? ' ' . $puzzle_options_data['text_color_scheme'] . '-text-color-scheme' : '');
    $section_classes .= (!empty($puzzle_options_data['padding_top']) ? ' ' . $puzzle_options_data['padding_top'] . '-padding-top' : '');
    $section_classes .= (!empty($puzzle_options_data['padding_bottom']) ? ' ' . $puzzle_options_data['padding_bottom'] . '-padding-bottom' : '');
    $section_classes .= (!empty($puzzle_options_data['vertical_center']) ? ' vertical-center' : '');
    $section_classes .= (!empty($puzzle_options_data['align_items']) ? ' align-items-' . $puzzle_options_data['align_items'] : '');
    
    return $section_classes;
}

// Shortens content
//
// $content - a string of content to be shortened
// $words_num - integer indicating the desired word count
//
// Returns a string of content shortened to the indicated word count
function shorten_content($content, $word_count = 35) {
    $shortened_content = strip_tags(strip_shortcodes($content));
    $words = explode(' ', $shortened_content, $word_count + 1);

    if (count($words) > $word_count) {
        array_pop($words);
        array_push($words, '…');
        $shortened_content = implode(' ', $words);
    }
    
    return $shortened_content;
}

?>