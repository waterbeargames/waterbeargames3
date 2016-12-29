<?php
/* Create new fields */
$vertical_center = new PuzzleField(array(
    'name'          => __('Vertically center columns', 'water-bear-games'),
    'id'            => 'vertical_center',
    'input_type'    => 'checkbox'
));

/* Modify the page builder's existing section */
$two_column = $puzzle_sections->section('two-column');

$two_column->add_option_field($vertical_center, 6)
    ->remove_option_field('overlay');
?>
