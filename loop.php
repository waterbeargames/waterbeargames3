<div id="post-<?php the_ID(); ?>" <?php post_class('puzzle-loop'); ?>>
    <h2><a href="<?php echo get_the_permalink($post->ID);?>"><?php the_title(); ?></a></h2>

    <?php if (get_post_type($post) == 'post') : ?>
    <h5><?php the_time('F j, Y'); ?></h5>
    <?php endif; ?>

    <?php
    if (has_post_thumbnail()) {
        $args = array(
            'class' => 'alignright'
        );
        the_post_thumbnail('small', $args);
    }
    
    the_excerpt();
    
    $link = get_the_permalink($post->ID);
    $target = '';
    
    if ($post->post_type == 'news') {
        $news = get_post_meta($post->ID, 'wbg_news', true);
        
        if (!empty($news['link']) && empty($news['local'])) {
            $link = $news['link'];
            $target = ' target="_blank"';
        }
    }
    ?>
    <a class="wbg-button wbg-button-secondary" href="<?php echo $link; ?>"<?php echo $target; ?>>Read More</a>
</div>