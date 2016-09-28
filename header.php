<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php wp_title(''); ?></title>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php the_favicons(); ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class('smooth-scroll-enabled'); ?>>
    <?php
    get_template_part('theme/partials/nav');
    
    if (is_front_page()) {
        get_template_part('theme/partials/header', 'home');
    } else if (is_singular('game')) {
        get_template_part('theme/partials/header', 'game');
    }
    ?>
    <main>