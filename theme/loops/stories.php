<?php
$story_featured_image = wp_get_attachment_url(get_post_thumbnail_id($story->ID));
$story_link = get_permalink($story->ID);
$story_target = '';
$story_media = '';

if ($story->post_type == 'news') {
    $news_meta = get_post_meta($story->ID, '_wbg_news', true);
    
    if (!empty($news_meta['link']) && empty($news_meta['local'])) {
        $story_link = esc_url($news_meta['link']);
        $story_target = ' target="_blank"';
    }
    
    if (!empty($news_meta['media'])) {
        $story_media = esc_html($news_meta['media']) . '<br />';
    }
}
?>
<div class="col <?php echo $col_classes; ?>">
    <div class="col-inner wbg-story">
        <div class="wbg-story-image"<?php if ($story_featured_image) echo ' style="background-image: url(' . $story_featured_image . ');"'; ?>>
            <?php if (!$story_featured_image) : ?>
            <div class="background-bear-container">
                <div class="background-bear">
                    <?php insert_svg(get_template_directory() . '/assets/images/bear.svg'); ?>
                </div>
            </div>
            <?php endif; ?>
            <a class="wbg-full-cover-link" href="<?php echo $story_link; ?>"<?php echo $story_target; ?>></a>
        </div>
        <div class="wbg-story-content">
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
            
                echo echo ppb_format_content($story_excerpt);;
            }
            ?>
            <a class="wbg-button wbg-button-small" href="<?php echo $story_link; ?>"<?php echo $story_target; ?>><?php ($story->post_type == 'news' ? _e('View Story', 'water-bear-games') : _e('Read More', 'water-bear-games')); ?></a>
        </div>
    </div>
</div>