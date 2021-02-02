<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package Voicer
 */

function voicer_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	if ( is_customize_preview() ) {
		$classes[] = 'voicer-customizer';
	}
	if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
		$classes[] = 'voicer-front-page';
	}
	if ( has_header_image() ) {
		$classes[] = 'has-header-image';
	}
	if ( is_active_sidebar( 'sidebar-1' ) && ! is_page() ) {
		$classes[] = 'has-sidebar';
	}
    if ( is_page() || is_archive() ) {
        if ( 'two-column' === get_theme_mod( 'page_layout' ) ) {
            $classes[] = 'page-two-column';
        } else {
            $classes[] = 'page-one-column';
        }
    }
	if ( 'blank' === get_header_textcolor() ) {
		$classes[] = 'title-tagline-hidden';
	}

	return $classes;
}
add_filter( 'body_class', 'voicer_body_classes' );

function voicer_panel_count() {
	$panel_count = 0;
	$num_sections = apply_filters( 'voicer_front_page_sections', 4 );
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		if ( get_theme_mod( 'panel_' . $i ) ) {
			$panel_count++;
		}
	}
	return $panel_count;
}
function voicer_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}