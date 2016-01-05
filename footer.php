<?php
$footer = get_theme_mod('footer_content');

if ($footer) :
    $footer_content = stripslashes_deep($footer);
    ?>
    <footer id="footer">
        <div class="row">
            <div class="column xs-span12">
                <div class="column-inner">
                    <?php echo apply_filters('like_the_content', $footer_content); ?>
                </div>
            </div>
        </div>
    </footer>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>