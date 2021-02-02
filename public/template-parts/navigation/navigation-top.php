<?php
/**
 * Displays top navigation
 *
 * @package Voicer
 */
?>
<nav id="site-navigation" class="main-navigation7 header-menu" aria-label="<?php esc_attr_e( 'Theme Header Navigation', 'voicer' ); ?>">
    <?php wp_nav_menu( array(
    'theme_location' => 'top',
    'menu_id'        => 'top-menu',
) ); ?>

</nav>
