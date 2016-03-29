<?php

/*
 * Puzzle
 * Helper functions
 */

// Inserts an inline SVG with a padding trick on the container to fix the size
// in IE and Edge. SVGs do not scale properly in these browsers.
//
// $svg_location - string, location of the SVG file
//
// Echos the SVG wrapped in a container
function insert_svg($svg_location) {
    ob_start();
    
    // Get the SVG code
    require($svg_location);
    $svg = ob_get_clean();
    $svg = simplexml_load_string($svg);
    
    // Parse the viewBox value
    // e.g. "10 20 100 200"
    $viewBox = (string) $svg->attributes()->viewBox;
    
    // Convert the $viewBox string into an array of the dimensions
    preg_match_all('/\d+/', $viewBox, $dimensions);
    
    // Determine the width and height from the applicable dimensions
    // in the $dimensions array
    //
    // e.g. An svg with a viewBox of "10 20 110 200" would be
    // 100 wide (110 - 10) and 180 tall (200 - 20).
    $width = $dimensions[0][2] - $dimensions[0][0];
    $height = $dimensions[0][3] - $dimensions[0][1];
    
    // Calculate the aspect ratio; round up to the nearest 10,000th place
    // e.g. An SVG that is 100 x 180 has an aspect ratio of 0.556
    $aspect_ratio = ceil($height / $width * 10000) / 10000;
    
    // Echo the SVG wrapped in a container with a padding-bottom trick to fix
    // the size in IE and Edge.
    // e.g. A 100 x 180 SVG would be in a container with
    // "padding-bottom: 55.6%;"
    echo '<div class="vector-container" style="padding-bottom: ' . $aspect_ratio * 100 . '%;">';
    include($svg_location);
    echo '</div>';
}

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