<?php
/* Create new fields */
$width = new PuzzleField;
$width->set_name('Width')
    ->set_id('width')
    ->set_input_type('select')
    ->set_options(array(
        'full'      => 'Full Width',
        'medium'    => 'Medium',
        'narrow'    => 'Narrow'
    ))
    ->set_width(4);

$column_background_color = $f->field('background_color');
$column_background_color->add_option('', 'None', 0)
    ->add_option('accent', 'Accent Color')
    ->set_width(4);

$align_items = new PuzzleField;
$align_items->set_name('Position Content')
    ->set_id('align_items')
    ->set_input_type('select')
    ->set_options(array(
        'left'      => 'Left',
        'center'    => 'Center',
        'right'     => 'Right'
    ))
    ->set_selected('center')
    ->set_width(3);
        
$background_bear = new PuzzleField;
$background_bear->set_name('Overlay water bear on background')
    ->set_id('background_bear')
    ->set_input_type('checkbox');

/* Modify the page builder's existing section */
$one_column = $puzzle_sections->section('one-column');

$one_column->add_column_field($width, 0)
    ->add_column_field($f->field('text_color_scheme')->set_width(4), 1)
    ->add_column_field($column_background_color, 2)
    ->add_option_field($align_items, 2)
    ->add_option_field($background_bear)
    ->remove_option_field('overlay');

$one_column->option_field('padding_top')->set_width(3);
$one_column->option_field('padding_bottom')->set_width(3);
$one_column->option_field('text_color_scheme')->set_width(3);
?>
