<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Voicer
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg7">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="profile" href="//gmpg.org/xfn/11">

    <script>
        if ( top !== self && ['iPad', 'iPhone', 'iPod'].indexOf(navigator.platform) >= 0 ) top.location.replace( self.location.href );
    </script>


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <header id="masthead" class="site-header header <?php echo (is_front_page() ? 'header--transparent7' : '') ; ?> header--sticky">
        <div class="header-wrap">
            <div class="container">
                <div class="logo tt-logo">
                    <?php
                    if (function_exists('voicer_logo_svg')) {
                        voicer_logo_svg();
                    }  else {
                        the_custom_logo();
                    }
                    ?>
                </div>
                <div class="header-right">
                    <?php if ( has_nav_menu( 'voicer_header_navigation' ) ) { ?>
                    <?php get_template_part( 'template-parts/navigation/navigation', 'tt-top' ); ?>
                    <?php } else { ?>
                    <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
                    <?php } ?>

                    <?php if (voicer_sidebars('sb_cart')) : echo voicer_sidebars('sb_cart'); endif; ?>
                </div>
                <?php if ( has_nav_menu( 'voicer_header_navigation' ) ) : ?>
                    <a href="#" class="menu-toggle tt-menu-toggle">
                       <svg class="icon icon-three icon-menu" width="19" height="16" viewBox="0 0 19 16" xmlns="http://www.w3.org/2000/svg"><path d="M1.28711 2.67578H17.2129C17.4941 2.67578 17.7344 2.57031 17.9336 2.35938C18.1445 2.14844 18.25 1.89648 18.25 1.60352C18.25 1.31055 18.1445 1.06445 17.9336 0.865234C17.7344 0.654297 17.4941 0.548828 17.2129 0.548828H1.28711C1.00586 0.548828 0.759766 0.654297 0.548828 0.865234C0.349609 1.06445 0.25 1.31055 0.25 1.60352C0.25 1.89648 0.349609 2.14844 0.548828 2.35938C0.759766 2.57031 1.00586 2.67578 1.28711 2.67578ZM17.2129 7.05273H1.28711C1.00586 7.05273 0.759766 7.1582 0.548828 7.36914C0.349609 7.58008 0.25 7.83203 0.25 8.125C0.25 8.41797 0.349609 8.66992 0.548828 8.88086C0.759766 9.0918 1.00586 9.19727 1.28711 9.19727H17.2129C17.4941 9.19727 17.7344 9.0918 17.9336 8.88086C18.1445 8.66992 18.25 8.41797 18.25 8.125C18.25 7.83203 18.1445 7.58008 17.9336 7.36914C17.7344 7.1582 17.4941 7.05273 17.2129 7.05273ZM17.2129 13.5742H1.28711C1.00586 13.5742 0.759766 13.6797 0.548828 13.8906C0.349609 14.1016 0.25 14.3535 0.25 14.6465C0.25 14.9395 0.349609 15.1914 0.548828 15.4023C0.759766 15.6016 1.00586 15.7012 1.28711 15.7012H17.2129C17.4941 15.7012 17.7344 15.6016 17.9336 15.4023C18.1445 15.1914 18.25 14.9395 18.25 14.6465C18.25 14.3535 18.1445 14.1016 17.9336 13.8906C17.7344 13.6797 17.4941 13.5742 17.2129 13.5742Z" /></svg>
                       <svg class="icon icon-remove icon-close" width="20" height="21" viewBox="0 0 20 21" xmlns="http://www.w3.org/2000/svg"><path d="M9.04297 10.1921L0.195312 19.0398C0.0651042 19.157 0 19.3002 0 19.4695C0 19.6518 0.0651042 19.8015 0.195312 19.9187C0.260417 19.9838 0.325521 20.0294 0.390625 20.0554C0.46875 20.0945 0.553385 20.114 0.644531 20.114C0.722656 20.114 0.800781 20.0945 0.878906 20.0554C0.957031 20.0294 1.02214 19.9838 1.07422 19.9187L10 11.0125L18.9258 19.9187C18.9779 19.9838 19.043 20.0294 19.1211 20.0554C19.1992 20.0945 19.2773 20.114 19.3555 20.114C19.4466 20.114 19.5312 20.0945 19.6094 20.0554C19.6875 20.0294 19.7526 19.9838 19.8047 19.9187C19.9349 19.8015 20 19.6518 20 19.4695C20 19.3002 19.9349 19.157 19.8047 19.0398L10.957 10.1921L19.8242 1.32495C19.9414 1.20776 20 1.06453 20 0.895264C20 0.712972 19.9414 0.556722 19.8242 0.426514C19.694 0.309326 19.5378 0.250732 19.3555 0.250732C19.1862 0.250732 19.043 0.309326 18.9258 0.426514L10 9.35229L1.07422 0.426514C0.957031 0.309326 0.807292 0.250732 0.625 0.250732C0.455729 0.250732 0.30599 0.309326 0.175781 0.426514C0.0585938 0.556722 0 0.712972 0 0.895264C0 1.06453 0.0585938 1.20776 0.175781 1.32495L9.04297 10.1921Z" /></svg>
                    </a>
                <?php endif;  ?>
            </div>
            <div class="darkOverlay"></div>
        </div>

	</header>
    <div class="page-main">
        <div class="site-content-contain">
		<div id="content">
