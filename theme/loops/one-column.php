<?php
$span_classes = 'xs-span12';

if ($puzzle_column['width'] == 'medium') {
    $span_classes .= ' md-span9';
} else if ($puzzle_column['width'] == 'narrow') {
    $span_classes .= ' md-span6';
}

$column_inner_classes = '';

if (!empty($puzzle_column['background_color'])) {
    $column_inner_classes .= ' ' . $puzzle_column['background_color'] . '-background';
}

if ($puzzle_options_data['text_color_scheme'] != $puzzle_column['text_color_scheme']) {
    $column_inner_classes .= ' ' . $puzzle_column['text_color_scheme'] . '-text-color-scheme';
}
?>
<div class="column <?php echo $span_classes; ?>">
    <div class="column-inner<?php echo $column_inner_classes; ?>">
        <?php echo apply_filters('the_content', $puzzle_column['content']); ?>
    </div>
</div>