<?php $footer_content = stripslashes_deep(get_option('wbg_footer_content')); ?>
    
    <footer id="footer">
        <?php if ($footer_content) { ?>
            <div class="row">
                <div class="column xs-span12">
                    <?php echo apply_filters('like_the_content', $footer_content); ?>
                </div>
            </div>
        <?php } ?>
        <div id="footer-copyright">
            <div class="row">
                <div class="column xs-span12">
    		        <p>&copy; <?php echo get_bloginfo(); ?> <?php echo date('Y'); ?></p>
                </div>
            </div>
        </div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>