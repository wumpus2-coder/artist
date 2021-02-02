<?php
/**
 * Displays top navigation
 *
 * @package Voicer
 */
?>
<nav id="site-navigation" class="main-navigation7 header-menu" aria-label="<?php esc_attr_e( 'Theme Header Navigation', 'voicer' ); ?>">
	<?php
    wp_nav_menu(array(
        'theme_location' => 'voicer_header_navigation',
        'menu_class' => 'menu',
        'walker'         => new Voicer_Walker_Nav_Menu()
    ));
    ?>
</nav>
