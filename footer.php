    </main>
    <?php
    $footer = get_theme_mod('footer_content');

    if ($footer) : ?>
        <footer id="footer">
            <div class="row">
                <div class="col xs-12">
                    <div class="col-inner">
                        <?php echo wp_kses_post($footer_content); ?>
                    </div>
                </div>
            </div>
        </footer>
        <?php
    endif;

    // Drop shadow for SVGs such as game logos
    include('assets/images/dropshadow.svg');

    wp_footer();
    ?>
</body>
</html>