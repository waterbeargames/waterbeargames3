<?php

/*
 * Water Bear Games
 * Menus
 */

/* Register menus */
function puzzle_menus() {
    register_nav_menus( array(
        'primary'   => 'Primary Menu'
    ));
}
add_action('after_setup_theme', 'puzzle_menus');

?>
