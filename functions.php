<?php

/*
 * Water Bear Games
 */

/* Custom post types */
foreach (glob(get_stylesheet_directory() . '/theme/custom_post_types/*.php') as $filename) {
    include $filename;
}

/*
 * Puzzle Page Builder config
 * Only include if the plugin is active
 */
if (class_exists('PuzzlePageBuilder')) require_once('theme/miscellaneous/puzzle_config.php');

/* Theme setup */
foreach (glob(get_stylesheet_directory() . '/theme/setup/*.php') as $filename) {
    include $filename;
}

?>
