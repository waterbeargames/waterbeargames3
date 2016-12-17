<?php
get_header();
$tag_title = single_tag_title('', false);
?>
<section>
    <div class="row">
        <div class="col xs-12<?php if (is_active_sidebar('main-sidebar')) echo ' lg-8'; ?>">
            <div class="col-inner">
                <?php if (have_posts()) : ?>
                    <h2><?php printf(__('Tag: %s', 'water-bear-games'), $tag_title); ?></h2>
                    <h4><?php
                        printf(
                            _x('%1$s tagged as %2$s', '# posts tagged as Tag Title', 'water-bear-games'),
                            pluralize(
                                $wp_query->found_posts,
                                _x('post', 'noun', 'water-bear-games'),
                                _x('posts', 'plural noun', 'water-bear-games')
                            ),
                            $tag_title
                        ); ?></h4>
                    <?php
                    while (have_posts()) {
                        the_post();
                        get_template_part('theme/partials/loop');
                    }
                
                    get_template_part('theme/partials/pagination');
                    ?>
                <?php else : ?>
                    <h2><?php _e('No results', 'water-bear-games'); ?></h2>
                    <p><?php printf(_x('Sorry, no posts tagged as %s.', 'tag title', 'water-bear-games'), $tag_title); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php if (is_active_sidebar('main-sidebar')) get_sidebar(); ?>
    </div>
</section>
<?php get_footer(); ?>