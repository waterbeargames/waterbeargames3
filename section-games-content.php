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
$span_classes = span_classes($games_num, 3, 4, 'xs', 'md');
?>
<div class="row puzzle-columns-content">
<?php
foreach ($games as $game) {
    include(locate_template('/theme/loops/games.php'));
}
?>
</div>