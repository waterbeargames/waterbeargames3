<?php
get_header();
$month = single_month_title(' ', false);
?>
<section>
    <div class="row">
        <div class="col xs-12<?php if (is_active_sidebar('main-sidebar')) echo ' lg-8'; ?>">
            <div class="col-inner">
                <?php if (have_posts()) : ?>
                    <h2><?php printf(__('Date: %s', 'water-bear-games'), $month); ?></h2>
                    <h4><?php
                        printf(
                            _x('%1$s in %2$s', '# posts in Month', 'water-bear-games'),
                            pluralize(
                                $wp_query->found_posts,
                                _x('post', 'noun', 'water-bear-games'),
                                _x('posts', 'plural noun', 'water-bear-games')
                            ),
                            $month
                        ); ?></h4>
                    <?php
                    while (have_posts()) {
                        the_post();
                        get_template_part('theme/loops/loop');
                    }
            
                    get_template_part('theme/partials/pagination');
                    ?>
                <?php else : ?>
                    <h2><?php _e('No results', 'water-bear-games'); ?></h2>
                    <p><?php printf(_x('Sorry, no posts in %s.', 'month', 'water-bear-games'), $month); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php if (is_active_sidebar('main-sidebar')) get_sidebar(); ?>
    </div>
</section>
<?php get_footer(); ?>