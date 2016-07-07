<?php get_header(); ?>
<section>
    <div class="row">
        <div class="column xs-span12<?php if (is_active_sidebar('main-sidebar')) echo ' lg-span8'; ?>">
            <div class="column-inner">
                <?php if (have_posts()) : ?>
                    <h2>Tag: <?php single_tag_title(); ?></h2>
                    <h4><?php echo pluralize($wp_query->found_posts, 'post'); ?> tagged as &quot;<?php echo single_tag_title(); ?>&quot;</h4>
                    <?php
                    while (have_posts()) {
                        the_post();
                        get_template_part('theme/loops/loop');
                    }
                
                    get_template_part('theme/partials/pagination');
                    ?>
                <?php else : ?>
                    <h1>No results</h1>
                    <p>Sorry, no posts categorized as: &quot;<?php echo single_tag_title(); ?>&quot;.</p>
                <?php endif; ?>
            </div>
        </div>
        <?php if (is_active_sidebar('main-sidebar')) get_sidebar(); ?>
    </div>
</section>
<?php get_footer(); ?>