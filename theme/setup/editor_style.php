<?php
/*
 * Water Bear Games
 * Custom Editor Style
 */

/* Insert Formats dropdown into TinyMCE buttons */
function wbg_mce_buttons($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'wbg_mce_buttons');

/* Add style options */
function wbg_insert_formats($init_array) {
    $style_formats = array(
        array(
            'title'     => 'Default Button',
            'inline'    => 'a',
            'selector'  => 'a',
            'classes'   => 'wbg-button'
        ),
        array(
            'title'     => 'Small Button',
            'inline'    => 'a',
            'selector'  => 'a',
            'classes'   => 'wbg-button wbg-button-small'
        ),
        array(
            'title'     => 'Large Button',
            'inline'    => 'a',
            'selector'  => 'a',
            'classes'   => 'wbg-button wbg-button-large'
        ),
        array(
            'title'     => 'Primary Color Button',
            'inline'    => 'a',
            'selector'  => 'a',
            'classes'   => 'wbg-button wbg-button-primary'
        ),
        array(
            'title'     => 'Secondary Color Button',
            'inline'    => 'a',
            'selector'  => 'a',
            'classes'   => 'wbg-button wbg-button-secondary'
        ),
        array(
            'title'     => 'Accent Color Button',
            'inline'    => 'a',
            'selector'  => 'a',
            'classes'   => 'wbg-button wbg-button-accent'
        ),
        array(
            'title'     => 'Alternative Color Button',
            'inline'    => 'a',
            'selector'  => 'a',
            'classes'   => 'wbg-button wbg-button-alternative'
        ),
        array(
            'title'     => 'Black Button',
            'inline'    => 'a',
            'selector'  => 'a',
            'classes'   => 'wbg-button wbg-button-black'
        )
    );
    
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode($style_formats);
    
    return $init_array;
}
add_filter('tiny_mce_before_init', 'wbg_insert_formats');

/* Add editor stylesheets so the content looks more like it will on the frontend */
add_editor_style(array(
    'assets/css/editor-style.css',
    'assets/css/custom.css'
));

?>
