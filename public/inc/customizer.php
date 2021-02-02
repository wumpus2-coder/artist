<?php
/**
 * Voicer: Customizer
 *
 * @package Voicer
 */
function voicer_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'voicer_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'voicer_customize_partial_blogdescription',
	) );
	$wp_customize->add_section( 'theme_options', array(
		'title'    => esc_html__( 'Theme Options', 'voicer' ),
		'priority' => 130,
	) );
	$num_sections = apply_filters( 'voicer_front_page_sections', 11);
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( 'panel_' . $i, array(
			'label'          => sprintf( esc_html__( 'Front Page Section %d Content', 'voicer' ), $i ),
			'description'    => ( 1 !== $i ? '' : esc_html__( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'voicer' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'voicer_is_static_front_page',
		) );
		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'voicer_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'voicer_customize_register' );
function voicer_customize_partial_blogname() {
	bloginfo( 'name' );
}
function voicer_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function voicer_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}
function voicer_is_view_with_layout_option() {
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}
function voicer_customize_preview_js() {
    wp_enqueue_script('my-theme-script-cust', get_template_directory_uri() . '/assets/js/customize-preview.js', array('jquery'), false, true);
}
add_action( 'customize_preview_init', 'voicer_customize_preview_js' );
function voicer_panels_js() {
    wp_enqueue_script('my-theme-script-cc', get_template_directory_uri() . '/assets/js/customize-controls.js', array('jquery'), false, true);

}
add_action( 'customize_controls_enqueue_scripts', 'voicer_panels_js' );