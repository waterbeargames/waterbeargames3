<?php
$news = new PuzzleSection(array(
    'name'          => __('News', 'water-bear-games'),
    'columns_num'   => 0,
    'order'         => 40,
    'option_fields' => array(
        $f->field('headline')->set_width(6),
        $f->field('id')->set_width(6),
        $f->field('padding_top')->set_width(4),
        $f->field('padding_bottom')->set_width(4),
        $f->field('text_color_scheme')->set_width(4),
        $f->field('background_image')->set_width(6),
        $f->field('background_color')->set_width(6),
        $f->field('main_content')
    )
));

$puzzle_sections->add_section($news);
?>
