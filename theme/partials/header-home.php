<?php $home_buttons = get_theme_mod('home_buttons'); ?>
<header id="header">
    <div class="pz-row">
        <div class="column xs-6 xs-left3 xs-right3<?php if ($home_buttons) echo ' md-left0 md-right0'; ?>">
            <div class="col-inner home-header-logo">
                <?php insert_svg(get_stylesheet_directory() . '/assets/images/logo.svg'); ?>
            </div>
        </div>
        <?php if ($home_buttons) : ?>
        <div class="column xs-12 md-6">
            <div class="col-inner home-buttons">
                <?php foreach ($home_buttons as $button) : ?>
                <div class="circle-button-container">
                    <div class="circle-button pz-<?php echo $button['color']; ?>-background">
                        <div class="circle-button-content">
                            <?php insert_svg(get_stylesheet_directory() . '/assets/images/' . $button['icon'] . '.svg'); ?>
                        </div>
                    </div>
                    <h4><?php echo $button['text']; ?></h4>
                    <a class="wbg-full-cover-link" href="<?php echo $button['link']; ?>"<?php if (!empty($button['open_link_in_new_tab'])) echo ' target="_blank"'; ?>></a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</header>