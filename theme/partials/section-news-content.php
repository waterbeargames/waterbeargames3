<?php
$args = array(
    'offset'            => 0,
    'posts_per_page'    => 4,
    'post_type'         => 'news'
);
$news_stories = get_posts($args);

$args = array(
    'meta_query' => array(
        array(
            'key' => '_wbg_news_featured',
            'value' => 'on',
        )
    ),
    'offset'            => 0,
    'posts_per_page'    => 1,
    'post_type'         => 'news'
);
$featured_story = get_posts($args);

if (empty($featured_story)) {
    $featured_story = $news_stories[0];
} else {
    $featured_story = $featured_story[0];
}

$featured_story_featured_image = wp_get_attachment_url(get_post_thumbnail_id($featured_story->ID));
$featured_story_meta = get_post_meta($featured_story->ID, '_wbg_news', true);

$featured_story_link = get_permalink($featured_story->ID);
$featured_story_target = '';
if (!empty($featured_story_meta['link']) && empty($featured_story_meta['local'])) {
    $featured_story_link = $featured_story_meta['link'];
    $featured_story_target = ' target="_blank"';
}
?>
<div class="pz-row pz-columns-content">
    <div class="column xs-12 sm-9 sm-center md-6 lg-uncenter wbg-featured-story">
        <div class="col-inner wbg-news-section-headline">
            <h3><?php _e('Featured Story', 'water-bear-games'); ?></h3>
        </div>
        <div class="col-inner wbg-story">
            <div class="wbg-story-image"<?php echo ($featured_story_featured_image ? ' style="background-image: url(' . $featured_story_featured_image . ');"' : '') ?>>
                <a class="wbg-full-cover-link" href="<?php echo $featured_story_link; ?>"<?php echo $featured_story_target; ?>></a>
            </div>
            <div class="wbg-story-content">
                <h3><?php echo $featured_story->post_title; ?></h3>
                <?php if (!empty($featured_story_meta['media'])) : ?>
                <h4><?php echo $featured_story_meta['media']; ?></h4>
                <?php endif; ?>
                <h5><?php echo date(get_option('date_format'), strtotime($featured_story->post_date)); ?></h5>
                <a class="wbg-button" href="<?php echo $featured_story_link; ?>"<?php echo $featured_story_target; ?>>View Story</a>
            </div>
        </div>
    </div>
    <div class="column xs-12 lg-6">
        <div class="col-inner wbg-news-section-headline">
            <h3>Recently</h3>
        </div>
        <div class="pz-row wbg-stories">
            <?php
            $span_classes = 'xs-span12 sm-span6';
            foreach ($news_stories as $story) include(locate_template('theme/loops/stories.php'));
            ?>
        </div>
    </div>
</div>
<div class="pz-row wbg-section-cta">
    <div class="column xs-12">
        <div class="col-inner">
            <a class="wbg-button" href="/news">View All News Stories</a>
        </div>
    </div>
</div>