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
function news_story_meta_box() {
    add_meta_box('news_story_options', 'News Story Options', 'news_story_meta_options', 'news', 'normal', 'low');
}
add_action('admin_init', 'news_story_meta_box');

function news_story_meta_options() {
    global $post;
    $news = get_post_meta($post->ID, 'wbg_news', true);
    $news_featured = get_post_meta($post->ID, 'wbg_news_featured', true);
    ?>
    <p>
        Media Name<br />
        <input name="wbg_news[media]" value="<?php echo (!empty($news['media']) ? $news['media'] : ''); ?>" />
    </p>
    <p>
        Source Link<br />
        <input name="wbg_news[link]" value="<?php echo (!empty($news['link']) ? $news['link'] : ''); ?>" />
    </p>
    <p>
        <input type="checkbox" name="wbg_news_featured" id="wbg_news_featured"<?php echo (!empty($news_featured) ? ' checked' : ''); ?>><label for="wbg_news_featured">Featured Story</label>
    </p>
    <p>
        <input type="checkbox" name="wbg_news[local]" id="wbg_news[local]"<?php echo (!empty($news['local']) ? ' checked' : ''); ?>><label for="wbg_news[local]">Link to local news story</label><i class="puzzle-field-tip-button fa fa-question-circle"></i><span class="puzzle-field-tip-content"><span>Normally when users click on this article, they will be taken directly to the site provided in the source link. Check this box to link to this site's local post instead.</span></span>
    </p>
<?php
}

function news_story_save_options() {
    global $post;
    if ($post && $post->post_type == 'news') {
        update_post_meta($post->ID, 'wbg_news', $_POST['wbg_news']);
        update_post_meta($post->ID, 'wbg_news_featured', (!empty($_POST['wbg_news_featured']) ? $_POST['wbg_news_featured'] : ''));
    }
}
add_action('save_post', 'news_story_save_options');

?>