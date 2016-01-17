<?php
get_header();
the_post();

$news = get_post_meta($post->ID, 'wbg_news', true);
?>
<main>
    <section>
        <div class="row">
            <div class="column xs-span12<?php echo (is_active_sidebar('main-sidebar') ? ' lg-span8' : ''); ?>">
                <div class="column-inner">
                    <div class="single-post-meta">
                        <h2><?php the_title(); ?></h2>
                        <h4><?php the_time('F j, Y'); echo (!empty($news['media']) ? ', from ' . $news['media'] : ''); ?></h4>
                    </div>
                
                    <div class="single-post-content">
                        <?php the_content(); ?>
                        
                        <?php if (!empty($news['link'])) : ?>
                        <a class="wbg-button" href="<?php echo $news['link']; ?>" target="_blank">Read More</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
            if (is_active_sidebar('main-sidebar')) {
                get_sidebar();
            }
            ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>