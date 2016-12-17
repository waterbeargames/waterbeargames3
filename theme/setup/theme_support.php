<?php

/*
 * Water Bear Games
 * Theme Support
 */

/* Add theme supports */
add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');
add_theme_support('title-tag');

/*
 * Add like_the_content Filter
 *
 * Has the same actions as the_content but for times when running
 * the_content filter conflicts with plugins.
 * 
 * The only action this does not have is 'prepend_attachment' because
 * it causes attachment pages to show attachments in weird places.
 */
$actions = array('wptexturize', 'convert_smilies', 'convert_chars', 'wpautop', 'shortcode_unautop');
foreach ($actions as $action) {
    add_filter('like_the_content', $action);
}

/*
 * Add title for home page
 * Workaround for title being blank if the front page is
 * a custom home page.
 */
function wbg_title_for_home($title) {
    if (empty($title) && (is_home() || is_front_page())) {
        return get_bloginfo() . ' | ' . get_bloginfo('description');
    }
    
    return $title;
}
add_filter('wp_title', 'wbg_title_for_home');

/*
 * Alters formatting of excerpt_more
 * Default is [...]
 */
function wbg_excerpt_more($more) {
    return '&hellip;';
}
add_filter('excerpt_more', 'wbg_excerpt_more');

/* Allow SVG uploads */
function wbg_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter('upload_mimes', 'wbg_myme_types', 1, 1);

/* Set $content_width variable */
if (!isset($content_width)) $content_width = 1200;

?>
