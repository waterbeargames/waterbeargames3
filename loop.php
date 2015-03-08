<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <hr />
    <h2><a href="<?php echo get_the_permalink($post->ID);?>"><?php the_title(); ?></a></h2>

    <?php if (get_post_type($post) == 'post') : ?>
    <h5><?php the_time('F j, Y'); ?></h5>
    <?php endif; ?>

    <?php the_excerpt(); ?>
    <p><a class="wbg-button" href="<?php echo get_the_permalink($post->ID); ?>">Read More</a></p>
</div>