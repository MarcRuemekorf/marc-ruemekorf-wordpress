<?php
/**
 * Freelancer Theme Customizer
 *
 * @package Freelancer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function freelancer_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'freelancer_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'freelancer_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'freelancer_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function freelancer_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function freelancer_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function freelancer_customize_preview_js() {
	wp_enqueue_script( 'freelancer-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), FREELANCER_VERSION, true );
}
add_action( 'customize_preview_init', 'freelancer_customize_preview_js' );

/**
 * @param $wp_customize
 */
function freelancer_theme_customize_register( $wp_customize ) {

  // Remove Control
  $wp_customize->remove_control("header_image");
  $wp_customize->remove_control("custom_logo");

  // Remove Section
  $wp_customize->remove_section("colors");
  $wp_customize->remove_section("background_image");

}
add_action( "customize_register", "freelancer_theme_customize_register" );