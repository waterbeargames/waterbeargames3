<?php
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

get_header();
?>
<section>
    <div class="row">
        <div class="column xs-span12<?php if (is_active_sidebar('main-sidebar')) echo ' lg-span8'; ?>">
            <div class="column-inner">
                <?php if (have_posts()) : ?>
                    <h2>Author: <?php echo $curauth->display_name; ?></h2>
                    <h4><?php echo pluralize($wp_query->found_posts, 'post'); ?> written by <?php echo $curauth->display_name; ?></h4>
                    <?php
                    while (have_posts()) {
                        the_post();
                        get_template_part('theme/loops/loop');
                    }
            
                    get_template_part('theme/partials/pagination');
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