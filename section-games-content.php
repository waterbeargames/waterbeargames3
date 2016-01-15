<?php
$args = array(
    'orderby'           => 'menu_order',
    'order'             => 'ASC',
    'posts_per_page'    => -1,
    'post_type'         => 'game'
);
$games = get_posts($args);
$games_num = count($games);
$span_classes = span_classes($games_num, 3, 4, 'xs', 'md');
?>
<div class="row puzzle-<?php echo $puzzle_section_type; ?>-content">
<?php
foreach ($games as $game) :
    $game_featured_image = wp_get_attachment_url(get_post_thumbnail_id($game->ID));
    $game_meta = get_post_meta($game->ID, 'wbg_game', true);
    $game_logo = (!empty($game_meta['logo']) ? $game_meta['logo'] : false);
    ?>
    <div class="column <?php echo $span_classes; ?>">
        <div class="column-inner">
            <div class="circle-button secondary-background"<?php echo ($game_featured_image ? ' style="background-image: url(' . $game_featured_image . ');"' : '') ?>>
                <?php if ($game_featured_image) : ?>
                <div class="puzzle-background-overlay secondary-background"></div>
                <?php endif; ?>
                <div class="circle-button-content">
                    <?php
                    if ($game_logo) :
                        include(get_attached_file($game_logo));
                    else :
                    ?>
                    <h4><?php echo get_the_title($game->ID); ?></h4>
                    <?php endif; ?>
                </div>
                <a class="puzzle-full-cover-link" href="<?php echo get_permalink($game->ID); ?>"></a>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>