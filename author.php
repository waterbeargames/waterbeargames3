<?php
global $wp_query;

$posts_per_page = $wp_query->query_vars['posts_per_page'];
$found_posts = $wp_query->found_posts;

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

<?php get_header(); ?>
<section>
    <div class="row">
        <div class="column xs-span12<?php echo (is_active_sidebar('main-sidebar') ? ' lg-span8' : ''); ?>">
            <div class="column-inner">
                <?php if (have_posts()) : ?>
                    <h2>Author: <?php echo $curauth->display_name; ?></h2>
                    <h4><?php echo $found_posts ?> post<?php echo ($found_posts != 1 ? 's' : ''); ?> written by <?php echo $curauth->display_name; ?></h4>
                    <?php
                    while (have_posts()) {
                        the_post();
                        get_template_part('loop');
                    }
            
                    if ($found_posts > $posts_per_page) get_template_part('pagination');
                    ?>
                <?php else : ?>
                    <h1>No results</h1>
                    <p>Sorry, no posts by <?php echo $curauth->display_name; ?>.</p>
                <?php endif; ?>
            </div>
        </div>
        <?php if (is_active_sidebar('main-sidebar')) get_sidebar(); ?>
    </div>
</section>
<?php get_footer(); ?>