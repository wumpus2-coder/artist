<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Voicer
 */
?>
		</div>
    </div>
</div>

<footer id="colophon" class="site-footer7 footer">
    <div class="container">
        <?php
            if ( has_nav_menu('voicer_footer_menu') ) :
                wp_nav_menu(array(
                    'theme_location' => 'voicer_footer_menu',
                    'container' => 'div',
                    'container_class' => 'footer-menu text-center',
                    'menu_class' => ''
                ));
            endif;
        ?>

        <?php if (voicer_sidebars('sb_footer01')) : ?>
        <div class="footer-logo text-center"><?php echo voicer_sidebars('sb_footer01'); ?></div>
        <?php endif; ?>

        <?php if (voicer_sidebars('sb_footer02')) : ?>
        <div class="row footer-info-wrap"><?php echo voicer_sidebars('sb_footer02'); ?></div>
        <?php endif; ?>

        <?php if (voicer_sidebars('sb_footer03')) : ?>
        <div class='footer-social text-center'><?php echo voicer_sidebars('sb_footer03'); ?></div>
        <?php endif; ?>

        <?php if (voicer_sidebars('sb_footer04')) : ?>
        <div class='footer-bottom text-center'><?php echo voicer_sidebars('sb_footer04'); ?></div>
        <?php endif; ?>

        <div class="backToTop ini-backToTop">
            <svg class="icon icon-arrow-left" width="14" height="9" viewBox="0 0 14 9" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 0.132813C7.1276 0.132813 7.25065 0.1556 7.36914 0.201172C7.48763 0.25586 7.597 0.328777 7.69726 0.419922L13.7129 6.43555C13.9043 6.62695 14 6.85938 14 7.13281C14 7.40625 13.9043 7.63867 13.7129 7.83008C13.5215 8.02148 13.2936 8.11719 13.0293 8.11719C12.7559 8.11719 12.5234 8.02148 12.332 7.83008L7 2.49805L1.66797 7.83008C1.47656 8.02149 1.2487 8.11719 0.984374 8.11719C0.710937 8.11719 0.478515 8.02149 0.287109 7.83008C0.0957026 7.63867 -5.76444e-07 7.40625 -6.00349e-07 7.13281C-6.24253e-07 6.85938 0.0957025 6.62695 0.287109 6.43555L6.30273 0.419923C6.40299 0.328777 6.51237 0.25586 6.63086 0.201173C6.74935 0.1556 6.87239 0.132813 7 0.132813Z"/>
            </svg>
        </div>

    </div>
</footer>
<?php wp_footer(); ?>

</div>
</body>
</html>
