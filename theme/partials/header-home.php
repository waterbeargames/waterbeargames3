<?php $home_buttons = get_theme_mod('home_buttons'); ?>
<header id="header">
    <div class="row">
        <div class="column xs-span6 xs-left3 xs-right3<?php if ($home_buttons) echo ' md-left0 md-right0'; ?>">
            <div class="column-inner home-header-logo">
                <?php insert_svg(get_stylesheet_directory() . '/assets/images/logo.svg'); ?>
            </div>
        </div>
        <?php if ($home_buttons) : ?>
        <div class="column xs-span12 md-span6">
            <div class="column-inner home-buttons">
                <?php foreach ($home_buttons as $button) : ?>
                <div class="circle-button-container">
                    <div class="circle-button <?php echo $button['color']; ?>-background">
                        <div class="circle-button-content">
                            <?php insert_svg(get_stylesheet_directory() . '/assets/images/' . $button['icon'] . '.svg'); ?>
                        </div>
                    </div>
                    <h4><?php echo $button['text']; ?></h4>
                    <a class="puzzle-full-cover-link" href="<?php echo $button['link']; ?>"<?php echo (!empty($button['open_link_in_new_tab']) ? ' target="_blank"' : ''); ?>></a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</header>