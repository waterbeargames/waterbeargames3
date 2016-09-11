<?php
$game = get_post_meta($post->ID, '_wbg_game', true);
$game_banner = (!empty($game['banner']) ? wp_get_attachment_url($game['banner'], 'large') : false);
?>
<header id="header" class="alternative-background"<?php if ($game_banner) echo ' style="background-image: url(' . $game_banner . ');"'; ?>>
    <?php if (!empty($game['logo'])) : ?>
    <div class="header-game-logo"<?php echo(!empty($game['accent_color']) ? ' style="background-color: rgba(' . hex2rgb($game['accent_color']) . ', 0.75);"' : ''); ?>>
        <?php insert_svg(get_attached_file($game['logo'])); ?>
    </div>
    <?php else : ?>
    <h1><?php the_title(); ?></h1>
    <?php endif; ?>
</header>