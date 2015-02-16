<?php

// Register post type
function team_member_init() {
	register_post_type('team-member', array(
		'labels' => array(
			'name'          => __('Team Members'),
			'singular_name' => __('Team Member')
		),
        'public' => true,
        'show_ui' => true,
        'supports' => array('title', 'editor', 'page-attributes', 'thumbnail')
	));
}
add_action('init', 'team_member_init');

// Add custom fields
function team_member_meta_box(){
	add_meta_box('team_member_options', 'Team Member Options', 'team_member_meta_options', 'team-member', 'normal', 'low');
}
add_action('admin_init', 'team_member_meta_box');

function team_member_meta_options(){
	global $post;
	$team_member = get_post_meta($post->ID, 'wbg_team_member', true);
?>
    <p>
        Title<br />
        <input name="wbg_team_member[title]" value="<?php echo (isset($team_member['title']) ? $team_member['title'] : ''); ?>" />
    </p>
    <p>
        Email<br />
        <input name="wbg_team_member[email]" value="<?php echo (isset($team_member['email']) ? $team_member['email'] : ''); ?>" />
    </p>
    <p>
        Twitter<br />
        <input name="wbg_team_member[twitter]" value="<?php echo (isset($team_member['twitter']) ? $team_member['twitter'] : ''); ?>" />
    </p>
<?php
}

function team_member_save_options(){
	global $post;
    if ($post->post_type == 'team-member') {
        update_post_meta($post->ID, 'wbg_team_member', $_POST['wbg_team_member']);
    }
}
add_action('save_post', 'team_member_save_options');

?>