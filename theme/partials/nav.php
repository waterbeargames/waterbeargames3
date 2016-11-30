<nav id="nav"<?php if (is_front_page()) echo ' class="no-logo no-shadow no-transition"'; ?>>
    <div class="row">
        <div class="col xs-8 sm-6 md-2">
            <div class="vector-container">
                <a href="<?php echo get_site_url(); ?>">
                    <?php include(TEMPLATEPATH . '/assets/images/bear.svg'); ?>
                </a>
            </div>
        </div>
        
        <?php if (has_nav_menu('primary')) : ?>
        <div class="col xs-4 sm-6 md-10">
            <?php
            $args = array(
                'theme_location'  => 'primary',
                'container_id'    => 'nav-menu'
            );
            wp_nav_menu($args);
            
            $args = array(
                'theme_location'  => 'primary',
                'container_id'    => 'dl-menu',
                'container_class' => 'dl-menuwrapper',
                'items_wrap'      => '<button class="dl-trigger">' . __('Open Menu', 'water-bear-games') . '</button><ul class="dl-menu">%3$s</ul>'
            );
            wp_nav_menu($args);
            
            $twitter = get_theme_mod('twitter');
            $facebook = get_theme_mod('facebook');
            
            if (!empty($twitter) || !empty($facebook)) : ?>
            <ul class="nav-social-media">
                <?php if (!empty($twitter)) : ?>
                <li><a href="<?php echo $twitter; ?>" target="_blank" title="Twitter" aria-label="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <?php endif; ?>
                
                <?php if (!empty($facebook)) : ?>
                <li><a href="<?php echo $facebook; ?>" target="_blank" title="Facebook" aria-label="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <?php endif; ?>
            </ul>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</nav>