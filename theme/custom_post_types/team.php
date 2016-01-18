<?php

/*
 * Water Bear Games
 * Team Custom Post Type
 */

// Register post type
function register_team() {
    register_post_type('team', array(
        'labels'            => array(
            'name'          => __('Team Members'),
            'singular_name' => __('Team Member')
        ),
        'menu_icon'         => 'dashicons-groups',
        'public'            => true,
        'rewrite'           => array(
            
        ),
        'show_ui'           => true,
        'slug'              => 'games',
        'supports'          => array(
            'title',
            'editor',
            'thumbnail',
            'page-attributes'
        )
    ));
}
add_action('init', 'register_team');

// Add custom fields
function admin_init_team() {
    add_meta_box('team_options', 'Team Member Options', 'meta_options_team', 'team', 'normal', 'low');
}

// Markup for the team image field
function team_image_markup($i, $image = NULL) {
    $image_preview = '<img src="" />';
    if (!empty($image)) {
        $image_preview = wp_get_attachment_image($image, 'large');
    }
    
    $output  = '<div class="column xs-span12 sm-span6 md-span4">';
    $output .= '<div class="puzzle-collapsable-menu">';
    $output .= '<h5>Image</h5>';
    $output .= '<i class="fa fa-close puzzle-remove-section"></i>';
    $output .= '</div>';
    $output .= '<div class="column-inner">';
    $output .= $image_preview . '<br />';
    $output .= '<input name="wbg_team[images][' . $i . ']" type="hidden" value="' . (!empty($image) ? $image : '') . '" readonly />';
    $output .= '<a href="#" class="puzzle_add_image_button button" data-editor="content" title="Insert Image">Insert Image</a>';
    $output .= '</div>';
    $output .= '</div>';
    
    return $output;
}

function meta_options_team() {
    global $post;
    $team = get_post_meta($post->ID, 'wbg_team', true);
    ?>
    <p>
        Title<br />
        <input name="wbg_team[title]" type="text" value="<?php echo (!empty($team['title']) ? $team['title'] : ''); ?>" />
    </p>
    <hr />
    <h3>Images</h3>
    <div class="row added-columns">
        <?php
        $i = 0;
    
        if (!empty($team['images'])) {
            foreach ($team['images'] as $image) {
                echo team_image_markup($i, $image);
                $i++;
            }
        }
        ?>
    </div>
    <p><a class="button puzzle-add-team-image" href="#">Add Image</a></p>
    <script>
        var $ = jQuery.noConflict();
        $(document).ready(function() {
            var $document = $(document),
                columnCount = <?php echo $i ?>;
        
            // Add an image
            $document.on('click', '.puzzle-add-team-image', function(e) {
                e.preventDefault();
            
                var $t = $(this),
                    $addedColumns = $('#team_options .added-columns');
            
                $addedColumns.append('<?php echo team_image_markup('\'+columnCount+\''); ?>');
                columnCount++;
                return false;
            });
        });
    </script>
<?php
}

function save_options_team() {
    global $post;
    if ($post && $post->post_type == 'team') {
        update_post_meta($post->ID, 'wbg_team', $_POST['wbg_team']);
    }
}

add_action('admin_init', 'admin_init_team');
add_action('save_post', 'save_options_team');

?>