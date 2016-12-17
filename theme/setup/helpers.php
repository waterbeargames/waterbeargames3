<?php

/*
 * Water Bear Games
 * Helper functions
 */

/*
 * Generates favicon code
 *
 * Returns a string of favicons separated by new lines
 */
function get_the_favicons() {
    $favicons = array();
    
    $apple_sizes = array(57, 114, 72, 144, 60, 120, 76, 152);
    $standard_sizes = array(196, 96, 32, 16, 128);
    $ms_sizes = array(
        'TileImage'         => array(144, 144),
        'square70x70logo'   => array(70, 70),
        'square150x150logo' => array(150, 150),
        'wide310x150logo'   => array(310, 150),
        'square310x310logo' => array(310, 310)
    );
    
    foreach ($apple_sizes as $size) {
        $dimensions = $size . 'x' . $size;
        $favicons[] = '<link rel="apple-touch-icon-precomposed" sizes="' . $dimensions . '" href="' . get_template_directory_uri() . '/assets/images/favicons/apple-touch-icon-' . $dimensions . '.png" />';
    }
    
    foreach ($standard_sizes as $size) {
        $dimensions = $size . 'x' . $size;
        $favicons[] = '<link rel="icon" type="image/png" href="' . get_template_directory_uri() . '/assets/images/favicons/favicon-' . $dimensions . '.png" sizes="' . $dimensions . '" />';
    }
    
    $favicons[] = '<meta name="application-name" content="&nbsp;"/>';
    $favicons[] = '<meta name="msapplication-TileColor" content="#FFFFFF" />';
    
    foreach ($ms_sizes as $name => $size) {
        $dimensions = $size[0] . 'x' . $size[1];
        $favicons[] = '<meta name="msapplication-' . $name . '" content="' . get_template_directory_uri() . '/assets/images/favicons/mstile-' . $dimensions . '.png" />';
    }
    
    return join("\n    ", $favicons);
}

/* Echos the favicons */
function the_favicons() { echo get_the_favicons(); }

/*
 * Converts a hex value to rgb
 *
 * $hex - string, hex color, e.g. '#abc123'
 *
 * Returns a string of the color converted to rgb, with values separated by commas
 */
function hex2rgb($hex) {
    $hex = str_replace('#', '', $hex);

    if (strlen($hex) == 3) {
        $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
        $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
        $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
    } else {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
    }
    $rgb = array($r, $g, $b);
    
    return implode(', ', $rgb); // returns a string of the rgb values separated by commas
    // return $rgb; // returns an array with the rgb values
}

/*
 * Inserts an inline SVG with a padding trick on the container to fix the size
 * in IE and Edge. SVGs do not scale properly in these browsers.
 *
 * $svg_location - string, location of the SVG file
 *
 * Echos the SVG wrapped in a container
 */
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

/*
 * Pluralizes a string
 *
 * $num - integer, the number to base the pluralization on
 * $word - string, the word to pluralize
 * $plural - string, the pluralized form of the word
 *
 * Returns a string with the number and correctly pluralized word
 * e.g. '5 cats', '1 dog'
 */
function pluralize($num, $word, $plural) {
    return $num . ' ' . ($num == 1 ? $word : $plural);
}

/*
 * Shortens content
 *
 * $content - a string of content to be shortened
 * $words_num - integer indicating the desired word count
 *
 * Returns a string of content shortened to the indicated word count
 */
function shorten_content($content, $word_count = 35) {
    $shortened_content = strip_tags(strip_shortcodes($content));
    $words = explode(' ', $shortened_content, $word_count + 1);

    if (count($words) > $word_count) {
        array_pop($words);
        array_push($words, '&hellip;');
        $shortened_content = implode(' ', $words);
    }
    
    return $shortened_content;
}

/*
 * Determines classes for a section
 *
 * $page_section - array of data pertaining to the section
 *
 * Returns a string of classes for a section
 */
function wbg_section_classes($page_section) {
    $puzzle_options_data = $page_section['options'];
    
    $section_classes  = 'pz-section pz-' . $page_section['type'];
    
    if (!empty($puzzle_options_data['background_color'])) {
        $section_classes .= ' pz-' . $puzzle_options_data['background_color'] . '-background';
    }
    
    if (!empty($puzzle_options_data['text_color_scheme'])) {
        $section_classes .= ' pz-' . $puzzle_options_data['text_color_scheme'] . '-text';
    }
    
    if (!empty($puzzle_options_data['padding_top'])) {
        $section_classes .= ' ' . $puzzle_options_data['padding_top'] . '-padding-top';
    }
    
    if (!empty($puzzle_options_data['padding_bottom'])) {
        $section_classes .= ' ' . $puzzle_options_data['padding_top'] . '-padding-bottom';
    }
    
    $section_classes .= (!empty($puzzle_options_data['vertical_center']) ? ' vertical-center' : '');
    $section_classes .= (!empty($puzzle_options_data['align_items']) ? ' align-items-' . $puzzle_options_data['align_items'] : '');
    
    return $section_classes;
}

?>
