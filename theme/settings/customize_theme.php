<?php

/*
 * Puzzle
 * Theme Customizations
 */

function puzzle_customize_register($wp_customize) {
    /* Colors */
    $puzzle_pieces = new PuzzlePieces;
    
    foreach($puzzle_pieces->colors() as $color) {
        $wp_customize->add_setting($color->id(), array(
            'default'           => $color->default_color(),
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'refresh'
        ));
        
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $color->id(), array(
            'label'         => $color->label(),
            'section'       => 'colors',
            'settings'      => $color->id()
        )));
    }
    
    /* Header */
    $wp_customize->add_section('puzzle_header' , array(
        'title'      => 'Header',
        'priority'   => 200,
    ));
    
    for ($i = 0; $i < 3; $i++) {
        $wp_customize->add_setting('home_buttons[' . $i . '][text]', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
            'transport'         => 'refresh'
        ));
    
        $wp_customize->add_control('home_buttons[' . $i . '][text]', array(
            'label'             => 'Button ' . ($i + 1) . ' Text',
            'section'           => 'puzzle_header',
            'settings'          => 'home_buttons[' . $i . '][text]',
            'type'              => 'text'
        ));
        
        $wp_customize->add_setting('home_buttons[' . $i . '][icon]', array(
            'default'           => '',
            'sanitize_callback' => 'esc_attr',
            'transport'         => 'refresh'
        ));
    
        $wp_customize->add_control('home_buttons[' . $i . '][icon]', array(
            'label'             => 'Button ' . ($i + 1) . ' Icon',
            'section'           => 'puzzle_header',
            'settings'          => 'home_buttons[' . $i . '][icon]',
            'type'              => 'select',
            'choices'           => array(
                'bear'          => 'Water Bear',
                'salmon'        => 'Salmon',
                'bee'           => 'Bee'
            )
        ));
        
        $wp_customize->add_setting('home_buttons[' . $i . '][color]', array(
            'default'           => '',
            'sanitize_callback' => 'esc_attr',
            'transport'         => 'refresh'
        ));
    
        $wp_customize->add_control('home_buttons[' . $i . '][color]', array(
            'label'             => 'Button ' . ($i + 1) . ' Color',
            'section'           => 'puzzle_header',
            'settings'          => 'home_buttons[' . $i . '][color]',
            'type'              => 'select',
            'choices'           => array(
                'primary'       => 'Primary Color',
                'secondary'     => 'Secondary Color',
                'accent'        => 'Accent Color',
                'alternative'   => 'Alternative Background Color'
            )
        ));
        
        $wp_customize->add_setting('home_buttons[' . $i . '][link]', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
            'transport'         => 'refresh'
        ));
    
        $wp_customize->add_control('home_buttons[' . $i . '][link]', array(
            'label'             => 'Button ' . ($i + 1) . ' Link',
            'section'           => 'puzzle_header',
            'settings'          => 'home_buttons[' . $i . '][link]',
            'type'              => 'text'
        ));
        
        $wp_customize->add_setting('home_buttons[' . $i . '][open_link_in_new_tab]', array(
            'default'           => '',
            'sanitize_callback' => 'esc_attr',
            'transport'         => 'refresh'
        ));
    
        $wp_customize->add_control('home_buttons[' . $i . '][open_link_in_new_tab]', array(
            'label'             => 'Open button ' . ($i + 1) . ' link in new tab',
            'section'           => 'puzzle_header',
            'settings'          => 'home_buttons[' . $i . '][open_link_in_new_tab]',
            'type'              => 'checkbox'
        ));
    }
    
    /* Footer */
    $background_color_options = array(
        'primary'       => 'Primary Color',
        'secondary'     => 'Secondary Color',
        'white'         => 'White',
        'gray'          => 'Gray'
    );
    
    $wp_customize->add_section('puzzle_footer' , array(
        'title'      => 'Footer',
        'priority'   => 210,
    ));
    
    $wp_customize->add_setting('footer_background_color', array(
        'default'           => 'primary',
        'sanitize_callback' => 'esc_attr',
        'transport'         => 'refresh'
    ));
    
    $wp_customize->add_control('footer_background_color', array(
        'label'             => 'Background Color',
        'section'           => 'puzzle_footer',
        'settings'          => 'footer_background_color',
        'type'              => 'select',
        'choices'           => $background_color_options
    ));
    
    $wp_customize->add_setting('footer_content', array(
        'default'           => '',
        'sanitize_callback' => 'esc_html',
        'transport'         => 'refresh'
    ));
    
    $wp_customize->add_control('footer_content', array(
        'label'             => 'Content',
        'section'           => 'puzzle_footer',
        'settings'          => 'footer_content',
        'type'              => 'textarea'
    ));
}
add_action('customize_register', 'puzzle_customize_register');

function puzzle_save_custom_style() {
    ob_start();
    require(get_stylesheet_directory() . '/theme/settings/custom_style.php');
    $css = ob_get_clean();
    
    global $wp_filesystem;
    
    if (empty($wp_filesystem)) {
        require_once(ABSPATH .'/wp-admin/includes/file.php');
        WP_Filesystem();
    }
    
    if (!$wp_filesystem->put_contents(get_stylesheet_directory() . '/assets/css/custom.css', $css)) {
        return true;
    }
}
add_action('customize_save_after', 'puzzle_save_custom_style');
?>