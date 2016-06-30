<?php
get_header();
the_post();
?>
<section>
    <div class="row">
        <div class="column xs-span12<?php echo (is_active_sidebar('main-sidebar') ? ' lg-span8' : ''); ?>">
            <div class="column-inner">
                <div class="single-post-meta">
                    <h2><?php the_title(); ?></h2>
                    <h4><?php the_time(get_option('date_format')); ?>, by <?php the_author(); ?></h4>
                    <?php
                    $categories = get_the_category();
                    if ($categories) : ?>
                        <h6>Categories:
                            <ul class="categories">
                                <?php foreach ($categories as $c) : ?>
                                <li class="cat-item"><a href="<?php echo get_category_link($c->term_id); ?>" title="View all posts in <?php echo $c->name; ?>"><?php echo $c->name; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </h6>
                    <?php endif; ?>
            
                    <?php if (has_tag()) : ?>
                    <h6><?php the_tags(); ?></h6>
                    <?php endif; ?>
                </div>
            
                <div class="single-post-content<?php echo (comments_open() ? ' comments-open' : ''); ?>">
                    <?php
                    the_content();
                    
                    $args = array(
                        'before'            => '<p class="single-post-page-links">' . __('Pages:'),
                        'after'             => '</p>',
                        'link_before'       => '<span>',
                        'link_after'        => '</span>'
                    );
                    wp_link_pages($args);
                    ?>
                </div>
                
                <?php if (comments_open()) comments_template(); ?>
            </div>
        </div>
        <?php if (is_active_sidebar('main-sidebar')) get_sidebar(); ?>
    </div>
</section>
<?php get_footer(); ?>