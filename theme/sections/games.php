<?php
$game_categories = get_terms('game_category');
$game_category_options = array('' => __('All', 'water-bear-games'));

foreach ($game_categories as $cat) {
    $game_category_options[$cat->term_id] = $cat->name;
}

$games = new PuzzleSection(array(
    'name'          => __('Games', 'water-bear-games'),
    'columns_num'   => 0,
    'order'         => 30,
    'option_fields' => array(
        $f->field('headline')->set_width(6),
        $f->field('id')->set_width(6),
        new PuzzleField(array(
            'name'          => __('Category', 'water-bear-games'),
            'id'            => 'category',
            'input_type'    => 'select',
            'options'       => $game_category_options,
            'width'         => 3
        )),
        $f->field('padding_top')->set_width(3),
        $f->field('padding_bottom')->set_width(3),
        $f->field('text_color_scheme')->set_width(3),
        $f->field('background_image')->set_width(6),
        $f->field('background_color')->set_width(6),
        $f->field('main_content')
    )
));

$puzzle_sections->add_section($games);
?>
