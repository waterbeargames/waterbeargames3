<div class="column xs-span12 md-span6 lg-span9">
    <div class="column-inner">
        <?php if (!empty($puzzle_column['headline'])) : ?>
        <h3><?php echo $puzzle_column['headline']; ?></h3>
        <?php endif; ?>
        <?php echo apply_filters('the_content', $puzzle_column['content']); ?>
    </div>
</div>
<div class="column xs-span12 md-span6 lg-span3">
    <div class="column-inner">
        <a class="puzzle-button" href="<?php echo $puzzle_column['link']; ?>"<?php echo (!empty($puzzle_column['open_link_in_new_tab']) ? ' target="_blank"' : ''); ?>><?php echo $puzzle_column['button_text']; ?></a>
    </div>
</div>