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
        'show_ui'           => true,
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

function meta_options_team() {
    global $post;
    $team = get_post_meta($post->ID, 'wbg_team', true);
    ?>
    <p>
        Title<br />
        <input name="wbg_team[title]" type="text" value="<?php echo (!empty($team['title']) ? $team['title'] : ''); ?>" />
    </p>
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