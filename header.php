<?php
$logo_id = get_theme_mod('logo');

$disable_smooth_scroll = get_theme_mod('disable_smooth_scroll');
if ($disable_smooth_scroll) {
    $smooth_scroll_class = 'smooth-scroll-disabled';
} else {
    $smooth_scroll_class = 'smooth-scroll-enabled';
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php wp_title(''); ?></title>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class($smooth_scroll_class); ?>>
    <?php if ($logo_id || has_nav_menu('primary')) : ?>
    <nav id="nav">
        <div class="row">
            <?php if ($logo_id) : ?>
            <div class="column xs-span8 sm-span6 md-span4 lg-span3">
                <a href="<?php echo get_site_url(); ?>">
                    <?php echo wp_get_attachment_image($logo_id, 'medium'); ?>
                </a>
            </div>
            <?php endif; ?>
            
            <?php if (has_nav_menu('primary')) : ?>
            <div class="column <?php echo ($logo_id ? 'xs-span4 sm-span6 md-span8 lg-span9' : 'xs-span12'); ?>">
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
    <?php endif; ?>