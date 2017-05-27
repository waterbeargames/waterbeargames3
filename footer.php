    </main>
    <?php $footer_content = get_theme_mod('footer_content'); ?>
    <footer class="main-footer">
        <div class="row">
            <div class="col xs-12">
                <div class="col-inner">
                    <p>&copy; <?php echo strftime('%Y') . ' ' . get_bloginfo(); ?></p>
                    <?php
                    if (isset($footer_content)) {
                        echo apply_filters('like_the_content', wp_kses_post($footer_content));
                    }
                    ?>
                </div>
            </div>
        </div>
    </footer>
    <?php
    // Drop shadow for SVGs such as game logos
    include('assets/images/dropshadow.svg');

    wp_footer();
    ?>
</body>
</html>
