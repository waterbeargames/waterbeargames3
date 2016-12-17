<?php
/* Create new fields */
$width = new PuzzleField(array(
    'name'          => __('Width', 'water-bear-games'),
    'input_type'    => 'select',
    'options'       => array(
        'full'      => 'Full Width',
        'medium'    => 'Medium',
        'narrow'    => 'Narrow'
    )
));

$align_items = new PuzzleField(array(
    'name'          => __('Position Content', 'water-bear-games'),
    'id'            => 'align_items',
    'input_type'    => 'select',
    'options'       => array(
        'left'      => 'Left',
        'center'    => 'Center',
        'right'     => 'Right'
    ),
    'selected'      => 'center'
));
        
$background_bear = new PuzzleField(array(
    'name'          => __('Overlay water bear on background', 'water-bear-games'),
    'id'            => 'background_bear',
    'input_type'    => 'checkbox'
));

/* Modify the page builder's existing section */
$one_column = $puzzle_sections->section('one-column')
    ->set_column_fields(array(
        $width->set_width(4),
        $f->field('text_color_scheme')->set_width(4),
        $f->field('background_color')
            ->add_option('', 'None', 0)
            ->set_width(4),
        $f->field('content')->set_rows(10)
    ))
    ->set_option_fields(array(
        $f->field('headline')->set_width(6),
        $f->field('id')->set_width(6),
        $align_items->set_width(3),
        $f->field('padding_top')->set_width(3),
        $f->field('padding_bottom')->set_width(3),
        $f->field('text_color_scheme')->set_width(3),
        $f->field('background_image')->set_width(6),
        $f->field('background_color')->set_width(6),
        $background_bear
    ));

?>
