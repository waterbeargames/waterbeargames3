<?php

/*
 * Water Bear Games
 * Game Custom Post Type
 */

// Register post type
function game_init() {
    register_post_type('game', array(
        'labels'            => array(
            'name'          => __('Games'),
            'singular_name' => __('Game')
        ),
        'menu_icon'         => 'dashicons-smiley',
        'public'            => true,
        'show_ui'           => true,
        'supports'          => array(
            'title',
            'editor',
            'thumbnail',
            'page-attributes'
        )
    ));
}
add_action('init', 'game_init');

// Add custom fields
function game_meta_box(){
    add_meta_box('game_options', 'Game Options', 'game_meta_options', 'game', 'normal', 'low');
}
add_action('admin_init', 'game_meta_box');

function game_meta_options(){
    global $post;
    $game = get_post_meta($post->ID, 'wbg_game', true);
    
    $game_banner = '<img src="" />';
    if (!empty($game['banner'])) {
        $game_banner = wp_get_attachment_image($game['banner'], 'large');
    }
    
    $file_name_regex = '/[^\/]*$/';
    
    $game_logo_preview = '';
    if (!empty($game['logo'])) {
        preg_match($file_name_regex, wp_get_attachment_url($game['logo']), $matches);
        $game_logo_preview = $matches[0];
    }
    
    $game_print_and_play_preview = '';
    if (!empty($game['print_and_play'])) {
        preg_match($file_name_regex, wp_get_attachment_url($game['print_and_play']), $matches);
        $game_print_and_play_preview = $matches[0];
    }
    ?>
    <div class="row">
        <div class="column xs-span12 sm-span4">
            <h3>Imagery</h3>
            <p>
                SVG Logo<br />
                <?php
                
                ?>
                <input class="wbg-game-file-preview" type="text" value="<?php echo $game_logo_preview; ?>" readonly />
                <input class="wbg-game-file-id" name="wbg_game[logo]" type="hidden" value="<?php echo (!empty($game['logo']) ? $game['logo'] : ''); ?>" readonly />
                <a href="#" class="wbg_add_file_button button" data-editor="content" title="Add File">Add File</a>
                <a href="#" class="wbg_remove_file_button button">Remove File</a>
            </p>
            <p>
                Banner<br />
                <?php echo $game_banner; ?><br />
                <input name="wbg_game[banner]" type="hidden" value="<?php echo (!empty($game['banner']) ? $game['banner'] : ''); ?>" readonly />
                <a href="#" class="puzzle_add_image_button button" data-editor="content" title="Add Image">Add Image</a> <a href="#" class="puzzle_remove_image_button button">Remove Image</a>
            </p>
        </div>
        <div class="column xs-span12 sm-span4">
            <h3>Links</h3>
            <p>
                Print &amp; Play File<br />
                <input class="wbg-game-file-preview" type="text" value="<?php echo $game_print_and_play_preview; ?>" readonly />
                <input class="wbg-game-file-id" name="wbg_game[print_and_play]" type="hidden" value="<?php echo (!empty($game['print_and_play']) ? $game['print_and_play'] : ''); ?>" readonly />
                <a href="#" class="wbg_add_file_button button" data-editor="content" title="Add File">Add File</a>
                <a href="#" class="wbg_remove_file_button button">Remove File</a>
            </p>
            <p>
                Store Link<br />
                <input name="wbg_game[store]" placeholder="http://..." value="<?php echo (!empty($game['store']) ? $game['store'] : ''); ?>" />
            </p>
        </div>
        <div class="column xs-span12 sm-span4">
            <h3>General Details</h3>
            <p>
                Playtime<br />
                <input name="wbg_game[playtime]" placeholder="5-10 minutes" value="<?php echo (!empty($game['playtime']) ? $game['playtime'] : ''); ?>" />
            </p>
            <p>
                Number of Players<br />
                <input name="wbg_game[players_num]" placeholder="2-5" value="<?php echo (!empty($game['players_num']) ? $game['players_num'] : ''); ?>" />
            </p>
            <p>
                Difficulty<br />
                <input name="wbg_game[difficulty]" placeholder="8 years old and up" value="<?php echo (!empty($game['difficulty']) ? $game['difficulty'] : ''); ?>" />
            </p>
            <p>
                Last Print &amp; Play Update<br />
                <input name="wbg_game[print_and_play_update]" placeholder="January 1st, 2016" value="<?php echo (!empty($game['print_and_play_update']) ? $game['print_and_play_update'] : ''); ?>" />
            </p>
            <p>
                Accent Color<br />
                <input class="color-field" name="wbg_game[accent_color]" value="<?php echo (!empty($game['accent_color']) ? $game['accent_color'] : ''); ?>" type="text" />
            </p>
        </div>
    </div>
    <script>
        jQuery('document').ready(function($){
            // Add File
            var custom_uploader;

            $('.wbg_add_file_button').click(function(e) {
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

                // When a file is selected, grab the ID and URL and set them
                custom_uploader.on('select', function() {
                    attachment = custom_uploader.state().get('selection').first().toJSON();
                    $button.siblings('.wbg-game-file-id').val(attachment.id);
                    $button.siblings('.wbg-game-file-preview').val(attachment.url);
                });

                // Open the uploader dialog
                custom_uploader.open();
            });

            // Remove Audio
            $('.wbg_remove_file_button').click(function(e) {
                e.preventDefault();
                var $button = $(this);
                $button.siblings('.wbg-game-file-id').val('');
                $button.siblings('.wbg-game-file-preview').val('');
            });
        });
    </script>
<?php
}

function game_save_options(){
    global $post;
    if ($post && $post->post_type == 'game') {
        update_post_meta($post->ID, 'wbg_game', $_POST['wbg_game']);
    }
}
add_action('save_post', 'game_save_options');

?>