<?php
/**
 * Voicer back compat functionality
 *
 * Prevents Voicer from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package Voicer
 */
function voicer_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'voicer_upgrade_notice' );
}
add_action( 'after_switch_theme', 'voicer_switch_theme' );
function voicer_upgrade_notice() {
	$message = sprintf( __( 'Recording Studio requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'voicer' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}
function voicer_customize() {
	wp_die( sprintf( esc_html__( 'Recording Studio requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'voicer' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'voicer_customize' );
function voicer_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( esc_html__( 'Recording Studio requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'voicer' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'voicer_preview' );