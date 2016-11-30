<?php
$args = array(
    'offset'            => 0,
    'posts_per_page'    => $puzzle_options_data['posts_num']
);
$blog_posts = get_posts($args);
$blog_posts_num = count($blog_posts);
$col_classes = ppb_col_classes($blog_posts_num, array('prefix' => ''));
?>
<div class="row pz-columns-content wbg-stories">
    <?php foreach ($blog_posts as $story) include(locate_template('theme/loops/stories.php')); ?>
</div>
<div class="row wbg-section-cta">
    <div class="col xs-12">
        <div class="col-inner">
            <?php
            $blog_link = get_site_url();
            if (get_option('show_on_front') == 'page') {
                $blog_link = get_permalink(get_option('page_for_posts'));
            }
            ?>
            <a class="wbg-button" href="<?php echo $blog_link; ?>"><?php _e('View All Blog Posts', 'water-bear-games'); ?></a>
        </div>
    </div>
</div>
