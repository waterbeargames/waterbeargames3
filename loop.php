<?php
$link = get_the_permalink($post->ID);
$target = '';

if ($post->post_type == 'news') {
    $news_meta = get_post_meta($post->ID, 'wbg_news', true);
    
    if (!empty($news_meta['link']) && empty($news_meta['local'])) {
        $link = $news_meta['link'];
        $target = ' target="_blank"';
    }
}

$author = '';

if (get_post_type($post) == 'post' || (get_post_type($post) == 'news' && !empty($news_meta['media']))) {
    $author = '<h5>';
    $author .= (get_post_type($post) == 'news' ? 'From ' . $news_meta['media'] : 'By ' . get_the_author());
    $author .= '</h5>';
}

$time = '';

if (get_post_type($post) == 'post' || get_post_type($post) == 'news') {
    $time = '<h5>' . get_the_time(get_option('date_format')) . '</h5>';
}
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('puzzle-loop'); ?>>
    <h3><a href="<?php echo $link; ?>"<?php echo $target; ?>><?php the_title(); ?></a></h3>

    <?php
    echo $author . $time;
    
    if (has_post_thumbnail()) {
        $args = array(
            'class' => 'alignright'
        );
        the_post_thumbnail('small', $args);
    }
    
    the_excerpt();
    ?>
    <p>
        <a class="wbg-button wbg-button-secondary" href="<?php echo $link; ?>"<?php echo $target; ?>>Read More</a>
    </p>
</div>