<?php
    
$logo = get_option('wbg_website_logo');
$header_buttons = get_option('wbg_header_buttons');

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title(''); ?></title>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php wp_head(); ?>
    <!--[if (gte IE 6)&(lte IE 8)]>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lib/selectivizr.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lib/respond.min.js"></script>
    <![endif]-->
</head>
<body <?php body_class(); ?>>
    <header id="header">
        <?php if ($logo) : ?>
        <div id="header-content">
            <div id="header-image">
                <div id="header-image-inner">
                    <img src="<?php echo $logo; ?>" />
                </div>
            </div>
            <div id="header-buttons">
                <?php foreach ($header_buttons as $button) : ?>
                    <?php if (!empty($button['text'])) : ?>
                    <a class="header-button<?php echo (!empty($button['important']) ? ' header-button-important' : ''); ?>" href="<?php echo $button['link']; ?>"<?php echo (!empty($button['open_link_in_new_tab']) ? ' target="_blank"' : ''); ?>><?php echo $button['text']; ?></a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
        <nav id="nav">
            <div class="row">
                <div class="column xs-span12">
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
            </div>
        </nav>
    </header>