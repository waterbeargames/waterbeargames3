<?php

/*
 * Markup for the public-facing site
 * These methods are used in sections.php.
 */

function blog_post_markup($current_col_num, $total_col_num, $options, $attrs) {
    $output  = '<div class="column wbg-blog-post xs-span12 md-span6">';
    $output .= '<div class="wbg-area">';
    $output .= '<h4>' . $options->post_title . '</h4>';
    $output .= '<h6>' . date('F j, Y', strtotime($options->post_date)) . '</h6>';
    
    $excerpt = (empty($options->post_excerpt) ? make_excerpt($options->post_content) : $options->post_excerpt);
    
    $output .= $excerpt;
    $output .= '<a class="wbg-button" href="/' . $options->post_name . '">Read More</a>';
    $output .= '</div>';
    $output .= '</div>';
    
    return $output;
}

function column_markup($current_col_num, $total_col_num, $options, $attrs) {
    $column_classes_array = ['xs-span', 'xs-left', 'xs-right', 'sm-span', 'sm-left', 'sm-right', 'md-span', 'md-left', 'md-right', 'lg-span', 'lg-left', 'lg-right'];
    $column_classes = '';
    
    foreach ($column_classes_array as $c) {
        if (!empty($attrs[$c])) {
            $column_classes .= ' ' . $c . $attrs[$c];
        }
    }
    
    $output  = '<div class="column' . $column_classes . (!empty($attrs['center']) ? ' center' : '' ) . '">';
    $output .= '<div class="wbg-area wbg-area-' . $attrs['background_color'] . '-background' . (!empty($attrs['text_color']) ? ' ' . $attrs['text_color'] . '-text' : '') . '">';
    $output .= apply_filters('the_content', $attrs['content']);
    $output .= '</div>';
    $output .= '</div>';
    
    return $output;
}

function game_markup($current_col_num, $total_col_num, $options, $attrs) {
}

function news_story_featured_markup($current_col_num, $total_col_num, $options, $attrs) {
    $column_classes_array = ['xs-span', 'xs-left', 'xs-right', 'sm-span', 'sm-left', 'sm-right', 'md-span', 'md-left', 'md-right', 'lg-span', 'lg-left', 'lg-right'];
    $column_classes = '';
    
    foreach ($column_classes_array as $c) {
        if (!empty($attrs[$c])) {
            $column_classes .= ' ' . $c . $attrs[$c];
        }
    }
    
    $output  = '<div class="column wbg-news-story-featured' . $column_classes . (!empty($attrs['center']) ? ' center' : '' ) . '">';
    $output .= '<div class="wbg-area wbg-area-' . $attrs['background_color'] . '-background' . (!empty($attrs['text_color']) ? ' ' . $attrs['text_color'] . '-text' : '') . '">';
    $output .= apply_filters('the_content', $attrs['content']);
    $output .= '</div>';
    $output .= '</div>';
    
    return $output;
}

function news_story_markup($current_col_num, $total_col_num, $options, $attrs) {
    $output  = '<div class="column wbg-news-story ' . span_classes($current_col_num, $total_col_num) . '">';
    $output .= '<div class="wbg-area">';
    $output .= '<h4>' . $options->post_title . '</h4>';
    $output .= '<h6>' . $attrs['media'] . '</h6>';
    $output .= '<h6>' . date('F j, Y', strtotime($options->post_date)) . '</h6>';
    $output .= '<a class="wbg-button" href="' . $attrs['link'] . '" target="_blank">View Story</a>';
    $output .= '</div>';
    $output .= '</div>';
    
    return $output;
}

function team_member_markup($current_col_num, $total_col_num, $options, $attrs) {
    $output  = '<div class="column ' . span_classes($current_col_num, $total_col_num) . '">';
    $output .= '<div class="wbg-area">';
    $output .= '<a class="wbg-button wbg-large-button" href="/team-member/' . $options->post_name . '">' . $options->post_title . '</a>';
    $output .= '</div>';
    $output .= '</div>';
    
    return $output;
}

?>