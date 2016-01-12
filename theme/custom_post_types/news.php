<?php

/*
 * Water Bear Games
 * News Custom Post Type
 */

// Register post type
function news_story_init() {
    register_post_type('news', array(
        'labels'            => array(
            'name'          => __('News Stories'),
            'singular_name' => __('News Story')
        ),
        'menu_icon'         => 'dashicons-id-alt',
        'public'            => true,
        'has_archive'       => true,
        'show_ui'           => true,
        'supports'          => array(
            'title',
            'editor',
            'thumbnail'
        )
    ));
}
add_action('init', 'news_story_init');

// Add custom fields
function news_story_meta_box(){
    add_meta_box('news_story_options', 'News Story Options', 'news_story_meta_options', 'news', 'normal', 'low');
}
add_action('admin_init', 'news_story_meta_box');

function news_story_meta_options(){
    global $post;
    $news = get_post_meta($post->ID, 'wbg_news', true);
?>
    <p>
        Media Name<br />
        <input name="wbg_news[media]" value="<?php echo (!empty($news['media']) ? $news['media'] : ''); ?>" />
    </p>
    <p>
        Source Link<br />
        <input name="wbg_news[link]" value="<?php echo (!empty($news['link']) ? $news['link'] : ''); ?>" />
    </p>
<?php
}

function news_story_save_options(){
    global $post;
    if ($post && $post->post_type == 'news-story') {
        update_post_meta($post->ID, 'wbg_news_story', $_POST['wbg_news_story']);
    }
}
add_action('save_post', 'news_story_save_options');

?>