<?php
$blog = new PuzzleSection(array(
    'name'          => __('Blog', 'water-bear-games'),
    'columns_num'   => 0,
    'order'         => 50,
    'option_fields' => array(
        $f->field('headline')->set_width(6),
        $f->field('id')->set_width(6),
        new PuzzleField(array(
            'name'          => __('Number of Posts', 'water-bear-games'),
            'id'            => 'posts_num',
            'input_type'    => 'select',
            'options'       => array(
                '3'         => '3',
                '4'         => '4',
                '6'         => '6',
                '8'         => '8'
            ),
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

$puzzle_sections->add_section($blog);
?>
