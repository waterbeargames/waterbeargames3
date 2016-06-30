<?php
global $wp_query;

$posts_per_page = $wp_query->query_vars['posts_per_page'];
$found_posts = $wp_query->found_posts;
?>

<?php get_header(); ?>
<section>
    <div class="row">
        <div class="column xs-span12<?php if (is_active_sidebar('main-sidebar')) echo ' lg-span8'; ?>">
            <div class="column-inner">
                <h2><?php echo get_the_title($wp_query->queried_object_id); ?></h2>
                <?php
                if (have_posts()) :
                    while (have_posts()) {
                        the_post();
                        get_template_part('theme/loops/loop');
                    }
            
                    if ($found_posts > $posts_per_page) get_template_part('theme/partials/pagination');
                    ?>
                <?php else : ?>
                    <h1>No results</h1>
                    <p>Sorry, no posts found.</p>
                <?php endif; ?>
            </div>
        </div>
        <?php if (is_active_sidebar('main-sidebar')) get_sidebar(); ?>
    </div>
</section>
<?php get_footer(); ?>