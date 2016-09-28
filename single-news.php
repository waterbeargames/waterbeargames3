<?php
get_header();
the_post();

$news = get_post_meta($post->ID, '_wbg_news', true);
?>
<section>
    <div class="row">
        <div class="column xs-span12<?php if (is_active_sidebar('main-sidebar')) echo ' lg-span8'; ?>">
            <div class="column-inner">
                <div class="single-post-meta">
                    <?php the_title('<h2>', '</h2>'); ?>
                    <h4><?php the_time(get_option('date_format')); if (!empty($news['media'])) echo ', from ' . $news['media']; ?></h4>
                </div>
            
                <div class="single-news-content<?php echo (!empty($news['link']) ? ' has-news-link' : ''); ?>">
                    <?php the_content(); ?>
                </div>
                
                <?php if (!empty($news['link'])) : ?>
                <a class="wbg-button" href="<?php echo $news['link']; ?>" target="_blank"><?php _e('View Original Story', 'water-bear-games'); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <?php if (is_active_sidebar('main-sidebar')) get_sidebar(); ?>
    </div>
</section>
<?php get_footer(); ?>