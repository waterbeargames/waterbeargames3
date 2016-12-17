<?php
$args = array(
    'orderby'           => 'menu_order',
    'order'             => 'ASC',
    'posts_per_page'    => -1,
    'post_type'         => 'team'
);
$team_members = get_posts($args);
$team_members_num = count($team_members);

$args = array(
    'prefix' => '',
    'size1' => 'xs',
    'size2' => 'md'
);
$col_classes = ppb_col_classes($team_members_num, $args);
?>
<div class="row pz-columns-content">
<?php foreach ($team_members as $team_member) :
    $team_member_featured_image = wp_get_attachment_url(get_post_thumbnail_id($team_member->ID));
    ?>
    <div class="col <?php echo $col_classes; ?>">
        <div class="col-inner">
            <div class="circle-button-container">
                <div class="circle-button pz-secondary-background"<?php if ($team_member_featured_image) echo ' style="background-image: url(' . $team_member_featured_image . ');"'; ?>>
                    <?php if ($team_member_featured_image) : ?>
                    <div class="pz-background-overlay pz-secondary-background"></div>
                    <?php endif; ?>
                    <div class="circle-button-content">
                    </div>
                </div>
                <h4><?php echo get_the_title($team_member->ID); ?></h4>
                <a class="wbg-full-cover-link" href="<?php echo get_permalink($team_member->ID); ?>"></a>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>