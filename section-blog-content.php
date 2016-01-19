<?php
$args = array(
    'offset'            => 0,
    'posts_per_page'    => $puzzle_options_data['posts_num']
);
$blog_posts = get_posts($args);
$blog_posts_num = count($blog_posts);
$span_classes = span_classes($blog_posts_num);
?>
<div class="row puzzle-columns-content puzzle-stories">
    <?php
    foreach ($blog_posts as $blog_post) :
        $blog_post_featured_image = wp_get_attachment_url(get_post_thumbnail_id($blog_post->ID));
        $blog_post_link = get_permalink($blog_post->ID);
        ?>
        <div class="column <?php echo $span_classes; ?>">
            <div class="column-inner puzzle-story">
                <div class="puzzle-story-image"<?php echo ($blog_post_featured_image ? ' style="background-image: url(' . $blog_post_featured_image . ');"' : '') ?>>
                    <a class="puzzle-full-cover-link" href="<?php echo $blog_post_link; ?>"<?php echo $target; ?>></a>
                </div>
                <div class="puzzle-story-content">
                    <h4><?php echo $blog_post->post_title; ?></h4>
                    <h6>
                        <?php echo date(get_option('date_format'), strtotime($blog_post->post_date)); ?>
                    </h6>
                    <?php
                    $excerpt = $blog_post->post_excerpt;
                
                    if (empty($excerpt)) {
                        $excerpt = shorten_content($blog_post->post_content);
                    }
                    
                    echo apply_filters('like_the_content', $excerpt);
                    ?>
                    <a class="wbg-button wbg-button-small" href="<?php echo $blog_post_link; ?>">Read More</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="row puzzle-section-cta">
    <div class="column xs-span12">
        <div class="column-inner">
            <?php
            $blog_link = get_site_url();
            if (get_option('show_on_front') == 'page') {
                $blog_link = get_permalink(get_option('page_for_posts'));
            }
            ?>
            <a class="wbg-button" href="<?php echo $blog_link; ?>">View All Blog Posts</a>
        </div>
    </div>
</div>