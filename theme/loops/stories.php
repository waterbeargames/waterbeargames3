<?php
$story_featured_image = wp_get_attachment_url(get_post_thumbnail_id($story->ID));
$story_link = get_permalink($story->ID);
$story_target = '';
$story_media = '';

if ($story->post_type == 'news') {
    $news_meta = get_post_meta($story->ID, 'wbg_news', true);
    
    if (!empty($news_meta['link']) && empty($news_meta['local'])) {
        $story_link = $news_meta['link'];
        $story_target = ' target="_blank"';
    }
    
    if (!empty($news_meta['media'])) {
        $story_media = $news_meta['media'] . '<br />';
    }
}
?>
<div class="column <?php echo $span_classes; ?>">
    <div class="column-inner puzzle-story">
        <div class="puzzle-story-image"<?php echo ($story_featured_image ? ' style="background-image: url(' . $story_featured_image . ');"' : '') ?>>
            <?php if (!$story_featured_image) : ?>
            <div class="background-bear-container">
                <div class="background-bear">
                    <?php insert_svg(get_template_directory() . '/assets/images/bear.svg'); ?>
                </div>
            </div>
            <?php endif; ?>
            <a class="puzzle-full-cover-link" href="<?php echo $story_link; ?>"<?php echo $story_target; ?>></a>
        </div>
        <div class="puzzle-story-content">
            <h4><?php echo $story->post_title; ?></h4>
            <h6>
                <?php
                echo $story_media;
                echo date(get_option('date_format'), strtotime($story->post_date));
                ?>
            </h6>
            <?php
            if ($story->post_type == 'post') {
                $story_excerpt = $story->post_excerpt;
        
                if (empty($story_excerpt)) {
                    $story_excerpt = shorten_content($story->post_content);
                }
            
                echo apply_filters('like_the_content', $story_excerpt);
            }
            ?>
            <a class="wbg-button wbg-button-small" href="<?php echo $story_link; ?>"<?php echo $story_target; ?>><?php echo ($story->post_type == 'news' ? 'View Story' : 'Read More'); ?></a>
        </div>
    </div>
</div>