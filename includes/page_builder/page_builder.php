<?php

/*
 * Page builder
 */

function admin_init() {
	add_meta_box('page_builder_options', 'Page Builder', 'meta_options', 'page', 'normal', 'high');
}

function meta_options() {
	global $post;
    global $wbg_sections;
    
    // Use nonce for verification
    wp_nonce_field(plugin_basename( __FILE__ ), 'wbg_columns_meta');
    
    $wbg_section_type = get_post_meta($post->ID, 'wbg_section_type', true);
    $wbg_options = get_post_meta($post->ID, 'wbg_options', true);
    $wbg_columns = get_post_meta($post->ID, 'wbg_columns', true);
    $c = 0;
    
?>
    <div id="wbg-page-section-options">
        <div id="choose-section-area" class="wbg-add-section-area<?php if (!$wbg_section_type) echo ' show'; ?>">
        	<h2>Choose Type</h2>
            
            <?php
            // Loops through the $wbg_sections to create buttons
            foreach ($wbg_sections as $section) : ?>
            <a class="button" href="#" id="wbg-<?php echo $section->get_group_name_slug(); ?>"><?php echo $section->get_group_name(); ?></a>
            <?php endforeach; ?>
        </div>
        
        <?php
        // Loops through $wbg_sections to create each section's options
        foreach ($wbg_sections as $section) : ?>
        <div id="wbg-<?php echo $section->get_group_name_slug(); ?>-area" class="wbg-add-section-area<?php if ($wbg_section_type == $section->get_group_name_slug()) echo ' show'; ?>">
            <h3><?php echo $section->get_group_name(); ?> Section</h3>
            
            <div id="general-options-area" class="row">
                <div class="column xs-span12">
                <h3>General Options</h3>
                    <?php
                    echo $section->options_markup($wbg_options);
                    ?>
                </div>
            </div>
            
            <?php if ($section->has_multiple()) { ?>
            <p><a class="button wbg-add-section">Add <?php echo $section->get_single_name(); ?></a></p>
            <?php } ?>
            
            <div class="row<?php if ($section->has_multiple()) echo ' added-sections'; ?>">
                <?php
                if (!empty($wbg_columns) && $wbg_section_type == $section->get_group_name_slug()) {
                    foreach($wbg_columns as $wbg_column) {
                        echo $section->admin_column_markup($c, $wbg_column);
                        $c++;
                    }
                } else if ($section->get_markup_attr()) {
                    echo $section->admin_column_markup($c);
                    $c++;
                }
                ?>
            </div>
            
            <?php if ($section->has_multiple()) { ?>
            <p><a class="button wbg-add-section">Add <?php echo $section->get_single_name(); ?></a></p>
            <?php } ?>
        </div>
        <?php endforeach; ?>
        
        
    </div>
    
    <div id="wbg-text-editor-area" class="wbg-pop-up-area">
        <?php
        $wp_editor_settings = array(
            'textarea_rows' => 10
        );
        
        wp_editor('', 'wbgcustomeditor', $wp_editor_settings);
        ?>
        <div class="wbg-pop-up-controls">
            <a class="button" href="#" id="wbg-update-content">Update and Close <i class="fa fa-save"></i></a>
            <a class="button" href="#" id="wbg-cancel-editor">Cancel <i class="fa fa-close"></i></a>
        </div>
    </div>
    
    <input id="wbg_section_type" name="wbg_section_type" type="hidden" value="<?php echo $wbg_section_type; ?>" />
    
    <script>
        var $ = jQuery.noConflict();
        $(document).ready(function() {
            // Add a column
            // This can't go in admin-js.js because these events need access to
            // the number that the columns are at and the markup methods.
            var count = <?php echo $c; ?>;
            
            // If a section type can have columns added, its markup is added to the javascript click event.
            $('.wbg-add-section').click(function() {
                <?php
                $s = 0;
                
                foreach ($wbg_sections as $section) {
                    if ($section->has_multiple()) { ?>
                        <?php echo ($s != 0 ? ' else ' : '') ?>if ($('.show').attr('id') === 'wbg-<?php echo $section->get_group_name_slug(); ?>-area') {
                            $('#wbg-page-section-options .show > .added-sections').append('<?php echo $section->admin_column_markup('\'+count+\''); ?>');
                        }
                    <?php
                        $s++; 
                    }
                }
                ?>
                
                count++;
                return false;
            });
            
            // Remove a Column
            $('.wbg-remove-section').live('click', function() {
                $(this).parents('.column').remove();
            });
        });
    </script>
<?php
}

function save_options() {
	global $post;
    $post_id = $post->ID;
    $template = get_post_meta($post_id, '_wp_page_template', true);
    
    if ($template == 'template-section.php') {
        // Verify if this is an auto save routine. 
        // If it is our form has not been submitted, so we dont want to do anything
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
    
        // Verify this came from the our screen and with proper authorization,
        // because save_post can be triggered at other times
        if (!isset( $_POST['wbg_columns_meta'])) {
            return;
        }

        if (!wp_verify_nonce($_POST['wbg_columns_meta'], plugin_basename( __FILE__ ))) {
            return;
        }

        // Save the data
    
        update_post_meta($post_id, 'wbg_options', $_POST['wbg_options']);
        
        if ($_POST['wbg_columns']) {
            update_post_meta($post_id, 'wbg_columns', $_POST['wbg_columns']);
        }
        
        update_post_meta($post_id, 'wbg_section_type', $_POST['wbg_section_type']);
        
        $wbg_section_type = get_post_meta($post->ID, 'wbg_section_type', true);
        $wbg_columns = get_post_meta($post->ID, 'wbg_columns', true);
        
        $content = '';

        foreach($wbg_columns as $wbg_column) {
            if ($wbg_section_type == 'header') {
            } elseif ($wbg_section_type == 'text') {
            } elseif ($wbg_section_type == 'features') {
            } elseif ($wbg_section_type == 'team-members') {
            } elseif ($wbg_section_type == 'accordions') {
            } elseif ($wbg_section_type == 'cta') {
            }
        }
    
        if (!wp_is_post_revision($post_id)) {

            // unhook this function so it doesn't loop infinitely
            remove_action('save_post', 'save_options');

            // update the post, which calls save_post again
            $args = array(
                'ID'            => $post_id,
                'post_content'  => $content
            );

            wp_update_post($args);

            // re-hook this function
            add_action('save_post', 'save_options');
        }
    }
}

add_action('admin_init', 'admin_init');
add_action('save_post', 'save_options');

?>