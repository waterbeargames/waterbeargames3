<div class="header-content <?php echo $puzzle_column['background_color']; ?> align-text-<?php echo $puzzle_column['align_text']; ?>"<?php echo (!empty($puzzle_column['background_image']) ? ' style="background-image: url(' . wp_get_attachment_url($puzzle_column['background_image']) . ');"' : ''); ?>>
    <?php if (!empty($puzzle_column['overlay'])) : ?>
    <div class="<?php echo $puzzle_column['background_color']; ?> puzzle-background-overlay"></div>
    <?php endif; ?>
    
    <?php if (!empty($puzzle_column['headline']) || !empty($puzzle_column['tagline']) || !empty($puzzle_column['content'])) : ?>
    <div class="header-content-inner">
        <?php if (!empty($puzzle_column['headline'])) : ?>
        <h1><span class="<?php echo $puzzle_column['headline_background_color'] . ' ' . $puzzle_column['headline_color']; ?>"><?php echo $puzzle_column['headline']; ?></span></h1>
        <?php endif; ?>
        
        <?php if (!empty($puzzle_column['tagline'])) : ?>
        <h2><span class="<?php echo $puzzle_column['tagline_background_color'] . ' ' . $puzzle_column['tagline_color']; ?>"><?php echo $puzzle_column['tagline']; ?></span></h2>
        <?php endif; ?>
        
        <?php if (!empty($puzzle_column['content'])) : ?>
        <div class="header-content-inner-content">
            <?php echo apply_filters('the_content', $puzzle_column['content']); ?>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</div>