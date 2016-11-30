<?php
$args = array(
    'orderby'           => 'menu_order',
    'order'             => 'ASC',
    'posts_per_page'    => -1,
    'post_type'         => 'game'
);

if (!empty($puzzle_options_data['category'])) {
    $args['tax_query'] = array(
        array(
            'taxonomy'  => 'game_category',
            'field'     => 'term_id',
            'terms'     => $puzzle_options_data['category']
        )
    );
}

$games = get_posts($args);
$games_num = count($games);

$args = array(
    'prefix' => '',
    'size1' => 'xs',
    'size2' => 'md'
);
$col_classes = ppb_col_classes($games_num, $args);
?>
<div class="row pz-columns-content">
    <?php foreach ($games as $game) include(locate_template('/theme/loops/games.php')); ?>
</div>