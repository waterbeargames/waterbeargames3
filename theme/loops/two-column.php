<?php
$span_classes = 'xs-span12';

if ($puzzle_options_data['column_widths'] == '1-2_1-2') {
    $span_classes .= ' md-span6';
} elseif (($puzzle_options_data['column_widths'] == '1-3_2-3' && $c == 0) ||
          ($puzzle_options_data['column_widths'] == '2-3_1-3' && $c == 1)) {
    $span_classes .= ' md-span4';
} elseif (($puzzle_options_data['column_widths'] == '1-3_2-3' && $c == 1) ||
          ($puzzle_options_data['column_widths'] == '2-3_1-3' && $c == 0)) {
    $span_classes .= ' md-span8';
}
?>
<div class="column <?php echo $span_classes; ?>">
    <div class="column-inner">
        <?php if (!empty($puzzle_options_data['headline']) && $c == 0) : ?>
        <h2><?php echo $puzzle_options_data['headline']; ?></h2>
        <?php endif; ?>
        
        <?php echo apply_filters('the_content', $puzzle_column['content']); ?>
    </div>
</div>