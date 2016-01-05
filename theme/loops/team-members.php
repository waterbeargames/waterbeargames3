<?php if ($puzzle_options['layout'] == 'columns') : ?>
<div class="column <?php echo span_classes($c, $puzzle_columns_num, false); ?> puzzle-team-member-column">
<?php else : ?>
<div class="column xs-span12 puzzle-team-member-row">
<div class="row">
<div class="column xs-span12 md-span3">
<?php endif; ?>

<div class="column-inner">

<?php
if (!empty($puzzle_column['image'])) {
    $image_args = array(
        'class' => 'puzzle-team-member-picture'
    );
    echo wp_get_attachment_image($puzzle_column['image'], 'full', false, $image_args);
}
?>

<?php if ($puzzle_options['layout'] == 'rows') : ?>
</div>
</div>
<?php endif; ?>

<div class="<?php echo ($puzzle_options['layout'] == 'rows' ? 'column xs-span12 md-span9 ' : ''); ?>puzzle-team-member-content">

<?php if ($puzzle_options['layout'] == 'rows') : ?>
<div class="column-inner">
<?php endif; ?>

<?php
if (!empty($puzzle_column['name'])) {
    $headline_tag = ($puzzle_options['layout'] == 'columns' ? 'h4' : 'h3');
    echo '<' . $headline_tag . '>' . $puzzle_column['name'] . '</' . $headline_tag . '>';
}

if (!empty($puzzle_column['title'])) {
    $title_tag = ($puzzle_options['layout'] == 'columns' ? 'h5' : 'h4');
    echo '<' . $title_tag . '>' . $puzzle_column['title'] . '</' . $title_tag . '>';
}

echo apply_filters('the_content', $puzzle_column['content']);
?>

<?php if (!empty($puzzle_column['phone']) || !empty($puzzle_column['email'])) : ?>
    <div class="puzzle-team-member-contact-info">
    
        <?php if (!empty($puzzle_column['phone'])) : ?>
        <p><i class="fa fa-phone"></i><?php echo $puzzle_column['phone']; ?></p>
        <?php endif; ?>
    
        <?php if (!empty($puzzle_column['email'])) : ?>
        <p><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo $puzzle_column['email']; ?>"><?php echo $puzzle_column['email']; ?></a></p>
        <?php endif; ?>
    
    </div>
<?php endif; ?>

<?php
$social_media = array_filter(array(
    'facebook'      => $puzzle_column['facebook'],
    'twitter'       => $puzzle_column['twitter'],
    'linkedin'      => $puzzle_column['linkedin'],
    'google-plus'   => $puzzle_column['google-plus']
));

if (!empty($social_media)) : ?>
    <div class="puzzle-social-links">
        <?php foreach($social_media as $key => $value) : ?>
        <a href="<?php echo $value; ?>" target="_blank"><i class="fa fa-<?php echo $key; ?>-square"></i></a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

</div>

<?php if ($puzzle_options['layout'] == 'rows') : ?>
</div>
<?php endif; ?>

</div>
</div>