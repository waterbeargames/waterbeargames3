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
                <?php if (have_posts()) : ?>
                    <h2>Tag: <?php single_tag_title(); ?></h2>
                    <h4><?php echo $found_posts ?> post<?php if ($found_posts != 1) echo 's'; ?> tagged as &quot;<?php echo single_tag_title(); ?>&quot;</h4>
                    <?php
                    while (have_posts()) {
                        the_post();
                        get_template_part('theme/loops/loop');
                    }
                
                    if ($found_posts > $posts_per_page) get_template_part('theme/partials/pagination');
                    ?>
                <?php else : ?>
                    <h1>No results</h1>
                    <p>Sorry, no posts categorized as: &quot;<?php echo single_cat_title(); ?>&quot;.</p>
                <?php endif; ?>
            </div>
        </div>
        <?php if (is_active_sidebar('main-sidebar')) get_sidebar(); ?>
    </div>
</section>
<?php get_footer(); ?>