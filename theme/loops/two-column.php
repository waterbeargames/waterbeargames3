<?php
$span_classes = 'xs-span12';

if ($puzzle_options['column_widths'] == '1-2_1-2') {
    $span_classes .= ' lg-span6';
} elseif (($puzzle_options['column_widths'] == '1-3_2-3' && $c == 0) || ($puzzle_options['column_widths'] == '2-3_1-3' && $c == 1)) {
    $span_classes .= ' lg-span4';
} elseif (($puzzle_options['column_widths'] == '1-3_2-3' && $c == 1) || ($puzzle_options['column_widths'] == '2-3_1-3' && $c == 0)) {
    $span_classes .= ' lg-span8';
}
?>
<div class="column <?php echo $span_classes; ?>">
    <div class="column-inner">
        <?php echo apply_filters('the_content', $puzzle_column['content']); ?>
    </div>
</div>