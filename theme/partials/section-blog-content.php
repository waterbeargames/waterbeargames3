<?php
$args = array(
    'offset'            => 0,
    'posts_per_page'    => $puzzle_options_data['posts_num']
);
$blog_posts = get_posts($args);
$blog_posts_num = count($blog_posts);
$span_classes = ppb_span_classes($blog_posts_num);
?>
<div class="row puzzle-columns-content puzzle-stories">
    <?php foreach ($blog_posts as $story) include(locate_template('theme/loops/stories.php')); ?>
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