<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php if (is_single()) { ?>
    <h1><?php the_title(); ?></h1>
<?php } else { ?>
    <h2><a href="<?php echo get_the_permalink($post->ID);?>"><?php the_title(); ?></a></h2>
<?php } ?>

<?php if (get_post_type($post) == 'post') { ?>
    <h5><?php the_time('F j, Y'); ?></h5>
<?php } ?>

<?php if (is_single()) { ?>
    <hr />
    <?php the_content();
} else {
    the_excerpt(); ?>
    <p><a class="wbg-button" href="<?php echo get_the_permalink($post->ID); ?>">Read More</a></p>
<?php } ?>

<?php if (!is_single()) { ?>
    <hr />
<?php } ?>
</div>