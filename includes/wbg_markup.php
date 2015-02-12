<?php

/*
 * Markup for the public-facing site
 * These methods are used in sections.php.
 */

function column_markup($current_col_num, $total_col_num, $options, $attrs) {
    $column_classes_array = ['xs-span', 'xs-left', 'xs-right', 'sm-span', 'sm-left', 'sm-right', 'md-span', 'md-left', 'md-right', 'lg-span', 'lg-left', 'lg-right'];
    $column_classes = '';
    
    foreach ($column_classes_array as $c) {
        if (!empty($attrs[$c])) {
            $column_classes .= ' ' . $c . $attrs[$c];
        }
    }
    
    $output  = '<div class="column' . $column_classes . (!empty($attrs['center']) ? ' center' : '' ) . '">';
    $output .= '<div class="wbg-area wbg-area-background-' . $attrs['background_color'] . '">';
    $output .= apply_filters('the_content', $attrs['content']);
    $output .= '</div>';
    $output .= '</div>';
    
    return $output;
}

?>