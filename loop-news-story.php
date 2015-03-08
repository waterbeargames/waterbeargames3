<?php

$news_story = get_post_meta($post->ID, 'wbg_news_story', true);

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <hr />
    <h3><?php the_title(); ?></h3>
    <h5><?php echo $news_story['media'] ?> | <?php the_time('F j, Y'); ?></h5>
    <p><a class="wbg-button" href="<?php echo $news_story['link']; ?>">View Story</a></p>
</div>