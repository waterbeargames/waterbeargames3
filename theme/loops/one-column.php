<?php
$col_classes = 'xs-12';

if ($puzzle_column['width'] == 'medium') {
    $col_classes .= ' md-9';
} else if ($puzzle_column['width'] == 'narrow') {
    $col_classes .= ' md-6';
}

$column_inner_classes = '';

if (!empty($puzzle_column['background_color'])) {
    $column_inner_classes .= ' pz-' . $puzzle_column['background_color'] . '-background';
}

if ($puzzle_options_data['text_color_scheme'] != $puzzle_column['text_color_scheme']) {
    $column_inner_classes .= ' pz-' . $puzzle_column['text_color_scheme'] . '-text';
}
?>
<div class="col <?php echo $col_classes; ?>">
    <div class="col-inner<?php echo $column_inner_classes; ?>">
        <?php echo ppb_format_content($puzzle_column['content']); ?>
    </div>
</div>