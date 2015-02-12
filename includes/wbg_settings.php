<?php

/*
 * NOVA
 * Admin Settings
 */

function wbg_settings_page() {
    add_menu_page('Theme Options', 'Theme Options', 'manage_options', 'wbg_settings', 'wbg_settings_page_content');
}
add_action('admin_menu', 'wbg_settings_page');

function wbg_settings_page_content() {
    wp_enqueue_media();
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
    
    if (!current_user_can('manage_options')) {
        wp_die( __('You do not have sufficient permissions to access this page.'));
    }
    
    if(isset($_POST['update_settings']) && $_POST['update_settings'] == 'Y') {
        update_option('wbg_website_logo', $_POST['wbg_website_logo']);
        update_option('wbg_header_buttons', $_POST['wbg_header_buttons']);
        update_option('wbg_footer_content', $_POST['wbg_footer_content']);
        echo '<div id="wbg_settings_saved" class="wrap"><h4>Options saved &mdash; ' . date_i18n('m/j/y h:m:s') . '</h4></div>';
    }
    
    $logo = get_option('wbg_website_logo');
    $header_buttons = get_option('wbg_header_buttons');
    $footer_content = stripslashes_deep(get_option('wbg_footer_content'));
    
    ?>
    
    <div class="wrap">
        <h2>Theme Options</h2>
        <form name="wbg_settings_form" method="post" action="">
            <input type="hidden" name="update_settings" value="Y" />
            
            <div class="wbg_settings_form_section">
                <h3>Header</h3>
                <h4>Logo</h4>
                <p>
                    <img src="<?php echo $logo; ?>" /><br />
                    <input id="wbg_website_logo" name="wbg_website_logo" type="hidden" value="<?php echo $logo; ?>" readonly />
                    <a href="#" class="wbg_add_image_button button" data-editor="content" title="Add Image">Add Image</a> <a href="#" class="wbg_remove_image_button button">Remove Image</a>
                </p>
                <h4>Buttons</h4>
                <div class="row">
                <?php
                $b = 0;
                while ($b < 3) : ?>
                    <div class="column xs-span12 sm-span4">
                        <p>
                            Button <?php echo $b + 1; ?> Text:<br />
                            <input name="wbg_header_buttons[<?php echo $b; ?>][text]" type="text" value="<?php echo $header_buttons[$b]['text']; ?>" />
                        </p>
                        <p>
                            Button <?php echo $b + 1; ?> Link:<br />
                            <input name="wbg_header_buttons[<?php echo $b; ?>][link]" type="text" value="<?php echo $header_buttons[$b]['link']; ?>" />
                        </p>
                        <p>
                            <input name="wbg_header_buttons[<?php echo $b; ?>][important]" type="checkbox"<?php echo (!empty($header_buttons[$b]['important']) ? ' checked' : ''); ?> /> Important button
                        </p>
                        <p>
                            <input name="wbg_header_buttons[<?php echo $b; ?>][open_link_in_new_tab]" type="checkbox"<?php echo (!empty($header_buttons[$b]['open_link_in_new_tab']) ? ' checked' : ''); ?> /> Open link in new tab
                        </p>
                    </div>
                <?php
                    $b++;
                endwhile;
                ?>
                </div>
            </div>
            
            <div class="wbg_settings_form_section">
                <h3>Footer Content</h3>
                <textarea name="wbg_footer_content" rows="10"><?php echo $footer_content; ?></textarea>
            </div>
            
            <p class="submit">
                <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
            </p>
        </form>
    </div>
    <script>
        jQuery('document').ready(function($){
            // Add Image
            var custom_uploader;
    
            $('.wbg_add_image_button').click(function(e) {
                e.preventDefault();
                $button = $(this);

                // If the uploader object has already been created, reopen the dialog
                if (custom_uploader) {
                    custom_uploader.open();
                    return;
                }

                // Extend the wp.media object
                custom_uploader = wp.media.frames.file_frame = wp.media({
                    title: 'Choose File',
                    button: {
                        text: 'Choose File'
                    },
                    multiple: false
                });

                // When a file is selected, grab the URL and set it as the text field's value
                custom_uploader.on('select', function() {
                    attachment = custom_uploader.state().get('selection').first().toJSON();
                    $button.siblings('input').val(attachment.url);
                    $button.siblings('img').attr('src', attachment.url);
                });

                // Open the uploader dialog
                custom_uploader.open();
            });
    
            // Remove Image
            $('.wbg_remove_image_button').click(function(e) {
               e.preventDefault();
               $button = $(this);
               $button.siblings('input').val(''); 
               $button.siblings('img').attr('src', '<?php echo get_template_directory_uri(); ?>/images/clear-pixel.gif');
            });
        });
    </script>
        
    <?php
}
?>