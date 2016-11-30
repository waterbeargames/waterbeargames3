<?php
$args = array(
    'orderby'           => 'menu_order',
    'order'             => 'ASC',
    'posts_per_page'    => -1,
    'post_type'         => 'game'
);
query_posts($args);

get_header();
?>
<section class="pz-games">
    <div class="row pz-section-headline">
        <div class="col xs-12">
            <div class="col-inner">
                <h2><?php _e('Games', 'water-bear-games'); ?></h2>
            </div>
        </div>
    </div>
    <?php
    if (have_posts()) :
        $col_classes = 'xs-12 md-4';
        
        if (class_exists('PuzzlePageBuilder')) {
            $args = array(
                'prefix' => '',
                'size1' => 'xs',
                'size2' => 'md'
            );
            $col_classes = ppb_col_classes($wp_query->post_count, $args);
        }
        ?>
        <div class="row pz-columns-content">
            <?php
            while (have_posts()) {
                the_post();
                $game = $post;
                include(locate_template('/theme/loops/games.php'));
            }
            wp_reset_query();
            ?>
        </div>
    <?php else : ?>
        <div class="row pz-main-content">
            <div class="col xs-12 md-9 md-center">
                <div class="col-inner">
                    <p><?php _e('Sorry, no games found.', 'water-bear-games'); ?></p>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>
<?php get_footer(); ?>