<?php

$args = array(
    'sort_column'   => 'menu_order',
    'sort_order'    => 'ASC',
    'child_of'      => $post->ID,
    'meta_key'      => '_wp_page_template',
    'meta_value'    => 'template-section.php'
);

$sections = get_pages($args);

?>

<?php get_header(); ?>
<main>
<?php
if (have_posts()) {
	while (have_posts()) {
		the_post();
        
        if (!empty(get_the_content())) : ?>
        <section>
            <div class="row">
                <div class="column xs-span12">
                    <div class="wbg-area">
                        <?php if (count($sections) < 1) : ?>
                        <div class="wbg-area section-headline">
                            <h2><?php echo get_the_title(); ?></h2>
                        </div>
                        <div class="wbg-area">
                            <?php the_content(); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
        endif;
        get_template_part('sections');
    }
}
?>
</main>
<?php get_footer(); ?>