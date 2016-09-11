<?php

/*
 * Water Bear Games
 * Theme Support
 */

/* Allow SVG uploads */
function wbg_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter('upload_mimes', 'wbg_myme_types', 1, 1);

/* Set $content_width variable */
if (!isset($content_width)) $content_width = 1200;

?>
