<?php

/*
 * Water Bear Games
 * Team Custom Post Type
 */

// Register post type
function register_team() {
    register_post_type('team', array(
        'labels'            => array(
            'name'          => __('Team Members', 'water-bear-games'),
            'singular_name' => __('Team Member', 'water-bear-games')
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
    
    $output  = '<div class="col xs-12 sm-6 md-4 puzzle-page-builder-column">';
    $output .= '<div class="puzzle-section-menu">';
    $output .= '<div class="pz-row puzzle-section-menu-title">';
    $output .= '<h4>Image</h4>';
    $output .= '<a class="puzzle-remove-section" href="#" title="Delete" aria-label="Delete"><i class="ei ei-close-alt2" aria-hidden="true"></i></a>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '<div class="puzzle-image-container">';
    $output .= $image_preview;
    $output .= '<input name="_wbg_team[images][' . $i . ']" type="hidden" value="' . (!empty($image) ? $image : '') . '" readonly />';
    $output .= '<a class="puzzle-add-image-button" data-editor="content" href="#" title="Add Image" aria-label="Add Image"><i class="ei ei-plus-alt2" aria-hidden="true"></i></a>';
    $output .= '<a class="puzzle-remove-image-button" href="#" title="Remove Image" aria-label="Remove Image"><i class="ei ei-close-alt" aria-hidden="true"></i></a>';
    $output .= '</div>';
    $output .= '</div>';
    
    return $output;
}

function meta_options_team() {
    global $post;
    $team = get_post_meta($post->ID, '_wbg_team', true);
    ?>
    <p>
        Title<br />
        <input name="_wbg_team[title]" type="text" value="<?php echo (!empty($team['title']) ? $team['title'] : ''); ?>" />
    </p>
    <hr />
    <h3>Images</h3>
    <p>Images should be squares only.</p>
    <div id="puzzle-page-section-options" class="row added-columns">
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
    <p><a class="button puzzle-add-team-image" href="#">Add New Image</a></p>
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
    if ($post && $post->post_type == 'team' && isset($_POST['_wbg_team'])) {
        update_post_meta($post->ID, '_wbg_team', $_POST['_wbg_team']);
    }
}

add_action('admin_init', 'admin_init_team');
add_action('save_post', 'save_options_team');

?>