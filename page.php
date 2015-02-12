<?php

$args = array(
    'sort_column'   => 'menu_order',
    'sort_order'    => 'ASC',
    'child_of'      => $post->ID,
    'meta_key'      => '_wp_page_template',
    'meta_value'    => 'template-section.php'
);

$sections = get_pages($args);


if (have_posts()) {
	while (have_posts()) {
		the_post();
        get_header();
        ?>
    	<main>
        <?php
            the_content();
            get_template_part('sections');
        ?>
        </main>
        <?php
        get_footer();
    }
}
?>