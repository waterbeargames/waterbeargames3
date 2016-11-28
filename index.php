<?php get_header(); ?>
<section>
    <div class="pz-row">
        <div class="column xs-12<?php if (is_active_sidebar('main-sidebar')) echo ' lg-8'; ?>">
            <div class="col-inner">
                <h2><?php echo get_the_title($wp_query->queried_object_id); ?></h2>
                <?php
                if (have_posts()) :
                    while (have_posts()) {
                        the_post();
                        get_template_part('theme/loops/loop');
                    }
            
                    get_template_part('theme/partials/pagination');
                    ?>
                <?php else : ?>
                    <h2><?php _e('No results', 'water-bear-games'); ?></h2>
                    <p><?php _e('Sorry, no posts found.', 'water-bear-games'); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php if (is_active_sidebar('main-sidebar')) get_sidebar(); ?>
    </div>
</section>
<?php get_footer(); ?>