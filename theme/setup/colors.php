<?php

/*
 * Water Bear Games
 * Default Colors
 */

function wbg_default_colors() {
    return array(
        array(
            'id'        => 'primary_color',
            'label'     => __('Primary Color', 'water-bear-games'),
            'default'   => '#06539d'
        ),
        array(
            'id'        => 'secondary_color',
            'label'     => __('Secondary Color', 'water-bear-games'),
            'default'   => '#0faeb2'
        ),
        array(
            'id'        => 'accent_color',
            'label'     => __('Accent Color', 'water-bear-games'),
            'default'   => '#f7e992'
        ),
        array(
            'id'        => 'alternative_background',
            'label'     => __('Alternative Background Color', 'water-bear-games'),
            'default'   => '#dbe4eb'
        ),
        array(
            'id'        => 'headline_dark',
            'label'     => __('Dark Headlines', 'water-bear-games'),
            'default'   => '#06539d'
        ),
        array(
            'id'        => 'text_dark',
            'label'     => __('Dark Body Text', 'water-bear-games'),
            'default'   => '#4d4d4d'
        ),
        array(
            'id'        => 'headline_light',
            'label'     => __('Light Headlines', 'water-bear-games'),
            'default'   => '#fff'
        ),
        array(
            'id'        => 'text_light',
            'label'     => __('Light Body Text', 'water-bear-games'),
            'default'   => '#fff'
        )
    );
}

/* Returns the user-set colors */
function wbg_theme_colors() {
    $theme_colors = array();
    $default_colors = wbg_default_colors();
    
    foreach ($default_colors as $default_color) {
        $theme_colors[$default_color['id']] = get_theme_mod(
            $default_color['id'],
            $default_color['default']
        );
    }
    
    return $theme_colors;
}

?>
