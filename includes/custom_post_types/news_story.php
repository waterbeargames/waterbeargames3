<?php

// Register post type
function news_story_init() {
	register_post_type('news-story', array(
		'labels' => array(
			'name'          => __('News Stories'),
			'singular_name' => __('News Story')
		),
        'public' => true,
        'has_archive' => true
	));
}
add_action('init', 'news_story_init');

// Add custom fields
function news_story_meta_box(){
	add_meta_box('news_story_options', 'News Story Options', 'news_story_meta_options', 'news-story', 'normal', 'low');
}
add_action('admin_init', 'news_story_meta_box');

function news_story_meta_options(){
	global $post;
	$news_story = get_post_meta($post->ID, 'wbg_news_story', true);
?>
    <p>
        Media Name<br />
        <input name="wbg_news_story[media]" value="<?php echo (isset($news_story['media']) ? $news_story['media'] : ''); ?>" />
    </p>
    <p>
        Source Link<br />
        <input name="wbg_news_story[link]" value="<?php echo (isset($news_story['link']) ? $news_story['link'] : ''); ?>" />
    </p>
<?php
}

function news_story_save_options(){
	global $post;
    if ($post->post_type == 'news-story') {
        update_post_meta($post->ID, 'wbg_news_story', $_POST['wbg_news_story']);
    }
}
add_action('save_post', 'news_story_save_options');

?>