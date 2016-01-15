<?php

/*
 * Water Bear Games
 * Button Shortcode
 */

add_shortcode('wbg_button', 'wbg_button_shortcode');
add_action('init', 'add_wbg_btn');
add_filter('tiny_mce_version', 'wbg_refresh_mce');
add_action('admin_init', 'admin_init_wbg_shortcode_form');

// Add button shortcode
function wbg_button_shortcode($atts) {
    $a = shortcode_atts(array(
        'color'                 => 'primary',
        'size'                  => 'medium',
        'link'                  => '#',
        'open_link_in_new_tab'  => 'false',
        'text'                  => 'Click Here'
    ), $atts);
    
    $open_link_in_new_tab = '';
    if ($a['open_link_in_new_tab'] == 'true') {
        $open_link_in_new_tab = 'target="_blank"';
    }
        
    $output  = '<a class="wbg-button wbg-button-' . $a['color'] . ' wbg-button-' . $a['size'] . '"';
    $output .= ' href="' . $a['link'] . '"';
    $output .= ' ' . $open_link_in_new_tab . '>';
    $output .= $a['text'];
    $output .= '</a>';
    
    return $output;
}

// Add button shortcode button to WYSIWYG editor
function add_wbg_btn() {
    if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) return;
    
    if (get_user_option('rich_editing') == 'true') {
        add_filter('mce_external_plugins', 'add_wbg_custom_tinymce_js');
        add_filter('mce_buttons', 'register_wbg_btn');
    }
}

function register_wbg_btn($buttons) {
    array_push($buttons, "|", "wbgbutton");
    return $buttons;
}

function add_wbg_custom_tinymce_js($plugin_array) {
    $plugin_array['wbgbutton'] = get_template_directory_uri() . '/assets/js/custom-tinymce.js';
    return $plugin_array;
}

function wbg_refresh_mce($ver) {
    $ver += 3;
    return $ver;
}

// Add hidden forms for WYSIWYG shortcode buttons
function admin_init_wbg_shortcode_form() {
    $post_types = array('page', 'post', 'game', 'team');
    
    foreach ($post_types as $post_type) {
        add_meta_box('wbg_shortcode_form', 'Water Bear Games Shortcode Form', 'meta_options_wbg_shortcode_form', $post_type, 'normal', 'low');
    }
}

function meta_options_wbg_shortcode_form() { ?>
    <div id="puzzle-insert-button-shortcode-area" class="puzzle-pop-up-area">
        <div class="puzzle-insert-shortcode-inner">
            <h4>Insert Button Shortcode</h4>
            <form>
                <p>
                    Color<br />
                    <select id="puzzle-insert-button-color" name="puzzle-button-color">
                        <option value="primary" selected>Primary Color</option>
                        <option value="secondary">Secondary Color</option>
                        <option value="accent">Accent Color</option>
                        <option value="alternative">Alternative Background Color</option>
                        <option value="black">Black</option>
                    </select>
                </p>
                <p>
                    Size<br />
                    <select id="puzzle-insert-button-size" name="puzzle-button-size">
                        <option value="small">Small</option>
                        <option value="medium" selected>Medium</option>
                        <option value="large">Large</option>
                    </select>
                </p>
                <p>
                    Text<br />
                    <input id="puzzle-insert-button-text" name="puzzle-insert-button-text" type="text" />
                </p>
                <p>
                    Link<br />
                    <input id="puzzle-insert-button-link" name="puzzle-insert-button-link" placeholder="http://" type="text" />
                </p>
                <p>
                    <input id="puzzle-insert-button-new-tab" name="puzzle-insert-button-new-tab" type="checkbox" /> Open link in new tab
                </p>
                <a class="button" id="puzzle-insert-button-submit" href="#">Insert Shortcode</a>
                <a class="button" id="puzzle-insert-button-cancel" href="#">Cancel</a>
            </form>
        </div>
    </div>
    <?php
}
?>