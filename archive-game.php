<?php
$args = array(
    'orderby'   => 'menu_order',
    'order'     => 'ASC',
    'post_type' => 'game'
);
query_posts($args);

get_header();
?>
<section class="puzzle-games">
    <div class="row puzzle-section-headline">
        <div class="column xs-span12">
            <div class="column-inner">
                <h2>Games</h2>
            </div>
        </div>
    </div>
    <?php
    if (have_posts()) :
        $span_classes = ppb_span_classes($wp_query->post_count, 3, 4, 'xs', 'md');
        ?>
        <div class="row puzzle-columns-content">
            <?php
            while (have_posts()) {
                the_post();
                $game = $post;
                include(locate_template('/theme/loops/games.php'));
            }
        
            get_template_part('theme/partials/pagination');
            ?>
        </div>
    <?php else : ?>
        <div class="row puzzle-main-content">
            <div class="column xs-span12 md-span9 md-center">
                <div class="column-inner">
                    <p>Sorry, no games found.</p>
                </div>
            </div>
        </div>
        <?php
        wp_reset_query();
    endif;
    ?>
</section>
<?php get_footer(); ?>