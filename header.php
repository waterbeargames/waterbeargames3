<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php wp_title(''); ?></title>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class('smooth-scroll-enabled'); ?>>
    <nav id="nav"<?php echo (is_front_page() ? ' class="no-logo no-shadow no-transition"' : ''); ?>>
        <div class="row">
            <div class="column xs-span8 sm-span6 md-span4 lg-span3">
                <div class="vector-container">
                    <a href="<?php echo get_site_url(); ?>">
                        <?php include('assets/images/bear.svg'); ?>
                    </a>
                </div>
            </div>
            
            <?php if (has_nav_menu('primary')) : ?>
            <div class="column xs-span4 sm-span6 md-span8 lg-span9">
                <?php
                $args = array(
                    'theme_location'  => 'primary',
                    'menu'            => '',
                    'container'       => 'div',
                    'container_id'    => 'nav-menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => ''
                );
                wp_nav_menu($args);
                
                $args = array(
                    'theme_location'  => 'primary',
                    'menu'            => '',
                    'container'       => 'div',
                    'container_id'    => 'dl-menu',
                    'container_class' => 'dl-menuwrapper',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<button class="dl-trigger">Open Menu</button><ul class="dl-menu">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => ''
                );
                wp_nav_menu($args);
                ?>
            </div>
            <?php endif; ?>
        </div>
    </nav>
    <?php if (is_front_page()) : ?>
    <header id="header">
        <div class="row">
            <div class="column xs-span6 xs-left3 xs-right3 md-span6 md-left0 md-right0">
                <div class="column-inner home-header-logo">
                    <?php include('assets/images/logo.svg'); ?>
                </div>
            </div>
            <?php $home_buttons = get_theme_mod('home_buttons'); ?>
            <div class="column xs-span12 md-span6">
                <?php if ($home_buttons) : ?>
                <div class="column-inner home-buttons">
                    <?php foreach ($home_buttons as $button) : ?>
                    <div class="home-button">
                        <div class="home-button-icon-container <?php echo $button['color']; ?>-background">
                            <?php include('assets/images/' . $button['icon'] . '.svg'); ?>
                        </div>
                        <h4><?php echo $button['text']; ?></h4>
                        <a class="puzzle-full-cover-link" href="<?php echo $button['link']; ?>"<?php echo (!empty($button['open_link_in_new_tab']) ? ' target="_blank"' : ''); ?>></a>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <?php endif; ?>