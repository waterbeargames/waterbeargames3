<?php if (get_previous_posts_link() || get_next_posts_link()) : ?>
<ul id="pagination">
    <?php if (get_previous_posts_link()) : ?>
    <li id="newer-pages"><?php previous_posts_link('<i class="fa fa-arrow-circle-left"></i>Newer'); ?></li>
    <?php endif; ?>
    
    <?php if (get_next_posts_link()) : ?>
    <li id="older-pages"><?php next_posts_link('<i class="fa fa-arrow-circle-right"></i>Older'); ?></li>
    <?php endif; ?>
</ul>
<?php endif; ?>