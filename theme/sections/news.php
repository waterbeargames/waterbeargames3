<?php
$news = new PuzzleSection;
$news->set_name('News')
    ->set_columns_num(0)
    ->set_order(40)
    ->set_option_fields(array(
        $f->field('headline')->set_width(6),
        $f->field('id')->set_width(6),
        $f->field('padding_top')->set_width(4),
        $f->field('padding_bottom')->set_width(4),
        $f->field('text_color_scheme')->set_width(4),
        $f->field('background_image')->set_width(6),
        $f->field('background_color')->set_width(6),
        $f->field('main_content')
    ));

$puzzle_sections->add_section($news);
?>
