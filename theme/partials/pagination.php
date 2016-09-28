<?php
$newer_text = '<i class="fa fa-arrow-circle-left"></i><span>' . __('Newer', 'water-bear-games') . '</span>';
$older_text = '<i class="fa fa-arrow-circle-right"></i><span>' . __('Older', 'water-bear-games') . '</span>';

if (get_previous_posts_link() || get_next_posts_link()) : ?>
<ul class="pagination">
    <li class="prev-container">
        <?php
        if (get_previous_posts_link()) :
            previous_posts_link($newer_text);
        else : ?>
            <span class="prev page-numbers disabled"><?php echo $newer_text; ?></span>
        <?php endif; ?>
    </li>

    <?php
    $args = array(
        'mid_size'  => 1,
        'prev_next' => false,
        'type'      => 'array'
    );
    $pages = paginate_links($args);
    ?>
    <li class="page-numbers-container">
        <ul>
            <?php foreach ($pages as $page) : ?>
                <li><?php echo $page; ?></li>
            <?php endforeach; ?>
        </ul>
    </li>
    
    <li class="next-container">
        <?php
        if (get_next_posts_link()) :
            next_posts_link($older_text);
        else : ?>
            <span class="next page-numbers disabled"><?php echo $older_text; ?></span>
        <?php endif; ?>
    </li>
</ul>
<?php endif; ?>