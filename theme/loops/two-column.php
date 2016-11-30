<?php
$col_classes = 'xs-12';

if ($puzzle_options_data['column_widths'] == '1-2_1-2') {
    $col_classes .= ' md-6';
} elseif (($puzzle_options_data['column_widths'] == '1-3_2-3' && $c == 0) ||
          ($puzzle_options_data['column_widths'] == '2-3_1-3' && $c == 1)) {
    $col_classes .= ' md-4';
} elseif (($puzzle_options_data['column_widths'] == '1-3_2-3' && $c == 1) ||
          ($puzzle_options_data['column_widths'] == '2-3_1-3' && $c == 0)) {
    $col_classes .= ' md-8';
}
?>
<div class="col <?php echo $col_classes; ?>">
    <div class="col-inner">
        <?php if (!empty($puzzle_options_data['headline']) && $c == 0) : ?>
        <h2><?php echo $puzzle_options_data['headline']; ?></h2>
        <?php endif; ?>
        
        <?php echo apply_filters('the_content', $puzzle_column['content']); ?>
    </div>
</div>