<?php get_header(); ?>
<section>
    <div class="row">
        <div class="column xs-span12<?php if (is_active_sidebar('main-sidebar')) echo ' lg-span8'; ?>">
            <div class="column-inner">
                <?php if (have_posts()) : ?>
                    <h2><?php _e('Date:', 'water-bear-games'); ?> <?php single_month_title(' '); ?></h2>
                    <h4><?php echo pluralize($wp_query->found_posts, 'post'); ?> in <?php single_month_title(' '); ?></h4>
                    <?php
                    while (have_posts()) {
                        the_post();
                        get_template_part('theme/loops/loop');
                    }
            
                    get_template_part('theme/partials/pagination');
                    ?>
                <?php else : ?>
                    <h1><?php _e('No results', 'water-bear-games'); ?></h1>
                    <p><?php _e('Sorry, no posts in', 'water-bear-games'); ?> <?php single_month_title(' '); ?>.</p>
                <?php endif; ?>
            </div>
        </div>
        <?php if (is_active_sidebar('main-sidebar')) get_sidebar(); ?>
    </div>
</section>
<?php get_footer(); ?>