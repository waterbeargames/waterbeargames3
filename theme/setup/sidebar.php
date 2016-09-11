<?php

/*
 * Water Bear Games
 * Sidebar
 */

/* Initialize sidebar */
function puzzle_sidebar_init() {
    register_sidebar(array(
        'name'          => 'Main Sidebar',
        'id'            => 'main-sidebar',
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'puzzle_sidebar_init');

?>
