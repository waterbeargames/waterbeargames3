<?php
$game = get_post_meta($post->ID, 'wbg_game', true);

$game_banner = false;
if (!empty($game['banner'])) {
    $game_banner = wp_get_attachment_url($game['banner'], 'large');
}
?>
<header id="header"<?php echo ($game_banner ? ' style="background-image: url(' . $game_banner . ');"' : ''); ?>>
    <?php if (!empty($game['logo'])) : ?>
    <div class="header-game-logo"<?php echo(!empty($game['accent_color']) ? ' style="background-color: rgba(' . hex2rgb($game['accent_color']) . ', 0.75);"' : ''); ?>>
        <?php include(get_attached_file($game['logo'])); ?>
    </div>
    <?php endif; ?>
</header>