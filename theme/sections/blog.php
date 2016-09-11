<?php
$blog = new PuzzleSection;
$blog->set_name('Blog')
    ->set_columns_num(0)
    ->set_order(50)
    ->set_option_fields(array(
        $f->field('headline')->set_width(6),
        $f->field('id')->set_width(6),
        (new PuzzleField)->set_name('Number of Posts')
            ->set_id('posts_num')
            ->set_input_type('select')
            ->set_options(array(
                '3'         => '3',
                '4'         => '4',
                '6'         => '6',
                '8'         => '8'
            ))
            ->set_width(3),
        $f->field('padding_top')->set_width(3),
        $f->field('padding_bottom')->set_width(3),
        $f->field('text_color_scheme')->set_width(3),
        $f->field('background_image')->set_width(6),
        $f->field('background_color')->set_width(6),
        $f->field('main_content')
    ));

$puzzle_sections->add_section($blog);
?>
