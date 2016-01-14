<?php
get_header();
the_post();

$game = get_post_meta($post->ID, 'wbg_game', true);
$has_meta_info = !empty($game['playtime']) || !empty($game['players_num']) || !empty($game['difficulty']) || !empty($game['print_and_play_update']);
$has_sidebar = !empty($game['print_and_play']) || !empty($game['store']) || $has_meta_info;

$meta_info = array_filter(array(
    'Playtime'                      => (!empty($game['playtime']) ? $game['playtime'] : false),
    'Number of Players'             => (!empty($game['players_num']) ? $game['players_num'] : false),
    'Difficulty'                    => (!empty($game['difficulty']) ? $game['difficulty'] : false),
    'Last Print &amp; Play Update'  => (!empty($game['print_and_play_update']) ? $game['print_and_play_update'] : false)
));
?>
<main>
    <section>
        <div class="row">
            <div class="column xs-span12<?php echo ($has_sidebar ? ' lg-span6 xl-span7' : ''); ?>">
                <div class="column-inner">
                    <h2>Overview</h2>
                    <?php the_content(); ?>
                </div>
            </div>
            <?php if ($has_sidebar) : ?>
            <div class="game-sidebar column xs-span12 sm-span8 sm-left2 sm-right2 lg-span6 lg-left0 lg-right0 xl-span5">
                <div class="column-inner">
                    <?php if (!empty($game['store']) || !empty($game['print_and_play'])) : ?>
                    <div class="game-buttons">
                        <?php if (!empty($game['store'])) : ?>
                        <div class="circle-button-container">
                            <div class="circle-button accent-background">
                                <div class="circle-button-content">
                                    <i class="fa fa-shopping-cart"></i>
                                    <h4>Purchase</h4>
                                    <h5>the official game</h5>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($game['print_and_play'])) : ?>
                        <div class="circle-button-container">
                            <div class="circle-button secondary-background light-text-color-scheme">
                                <div class="circle-button-content">
                                    <i class="fa fa-arrow-circle-o-down"></i>
                                    <h4>Download</h4>
                                    <h5>the print &amp; play</h5>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($has_meta_info) : ?>
                    <div class="game-details alternative-background">
                        <?php foreach ($meta_info as $label => $info) :?>
                        <p><strong><?php echo $label; ?>:</strong> <?php echo $info; ?></p>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>