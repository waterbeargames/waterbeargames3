<?php
get_header();
the_post();

$game = get_post_meta($post->ID, '_wbg_game', true);
$has_meta_info = !empty($game['playtime']) || !empty($game['players_num']) || !empty($game['difficulty']) || !empty($game['print_and_play_update']);
$has_sidebar = !empty($game['print_and_play']) || !empty($game['store']) || $has_meta_info;

$meta_info = array_filter(array(
    'Playtime'                      => (!empty($game['playtime']) ? esc_html($game['playtime']) : false),
    'Number of Players'             => (!empty($game['players_num']) ? esc_html($game['players_num']) : false),
    'Difficulty'                    => (!empty($game['difficulty']) ? esc_html($game['difficulty']) : false),
    'Last Print &amp; Play Update'  => (!empty($game['print_and_play_update']) ? esc_html($game['print_and_play_update']) : false)
));
?>
<section>
    <div class="row">
        <div class="col xs-12<?php echo ($has_sidebar ? ' lg-6 xl-7' : ''); ?>">
            <div class="col-inner">
                <h2><?php _e('Overview', 'water-bear-games'); ?></h2>
                <?php the_content(); ?>
            </div>
        </div>
        <?php if ($has_sidebar) : ?>
        <div class="game-sidebar col xs-12 sm-8 sm-center lg-6 lg-uncenter xl-5">
            <div class="col-inner">
                <?php if (!empty($game['store']) || !empty($game['print_and_play'])) : ?>
                <div class="game-buttons">
                    <?php if (!empty($game['store'])) : ?>
                    <div class="circle-button-container">
                        <div class="circle-button pz-accent-background">
                            <div class="circle-button-content">
                                <i class="fa fa-shopping-cart"></i>
                                <h4><?php _e('Purchase', 'water-bear-games'); ?></h4>
                                <h5><?php _e('the official game', 'water-bear-games'); ?></h5>
                            </div>
                            <a class="wbg-full-cover-link" href="<?php echo esc_url($game['store']); ?>" target="_blank"></a>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($game['print_and_play'])) : ?>
                    <div class="circle-button-container">
                        <div class="circle-button pz-secondary-background pz-light-text">
                            <div class="circle-button-content">
                                <i class="fa fa-arrow-circle-o-down"></i>
                                <h4><?php _e('Download', 'water-bear-games'); ?></h4>
                                <h5><?php _e('the print &amp; play', 'water-bear-games'); ?></h5>
                            </div>
                            <a class="wbg-full-cover-link" href="<?php echo wp_get_attachment_url($game['print_and_play']); ?>"></a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                
                <?php if ($has_meta_info) : ?>
                <div class="game-details pz-alternative-background">
                    <?php foreach ($meta_info as $label => $info) : ?>
                    <p><strong><?php echo $label; ?>:</strong> <?php echo $info; ?></p>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php if (!empty($game['cta'])) : ?>
<section class="pz-alternative-background">
    <div class="row">
        <div class="col xs-12">
            <div class="col-inner">
                <?php echo wp_kses_post($game['cta']); ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>