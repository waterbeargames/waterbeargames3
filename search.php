<?php get_header(); ?>
<section>
    <div class="row">
        <div class="column xs-span12<?php if (is_active_sidebar('main-sidebar')) echo ' lg-span8'; ?>">
            <div class="column-inner">
                <h2><?php echo pluralize($wp_query->found_posts, 'search result'); ?> for: &quot;<?php echo get_search_query(); ?>&quot;</h2>
                <?php
                if (have_posts()) :
                    while (have_posts()) {
                        the_post();
                        get_template_part('theme/loops/loop');
                    }
                
                    get_template_part('theme/partials/pagination');
                    ?>
                <?php else : ?>
                    <p><?php _e('Sorry, no posts found for', 'water-bear-games'); ?> &quot;<?php echo get_search_query(); ?>&quot;.</p>
                <?php endif; ?>
            </div>
        </div>
        <?php if (is_active_sidebar('main-sidebar')) get_sidebar(); ?>
    </div>
</section>
<?php get_footer(); ?>