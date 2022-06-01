<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Freelancer
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function freelancer_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'freelancer_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function freelancer_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'freelancer_pingback_header' );

if ( ! function_exists( 'freelancer_mce_buttons' ) ) {
  /**
   * Add additional MCE settings to mce buttons
   * @param $buttons
   * @return mixed
   */
  function freelancer_mce_buttons( $buttons ) {
    array_splice($buttons, 1, 0, 'styleselect');
    return $buttons;
  }
}
add_filter( 'mce_buttons', 'freelancer_mce_buttons' );

function freelancer_mce_before_init_insert_formats( $init_array ) {
  // Define the style_formats array
  $style_formats = array(
    // Each array child is a format with it's own settings
    array(
      'title' => 'Extra Large',
      'selector' => 'p',
      'classes' => 'text-xl',
      'styles' => array(
        'fontSize' => '24px'
      )
    ),
    array(
      'title' => 'Large',
      'selector' => 'p',
      'classes' => 'text-lg',
      'exact'   => true,
      'styles' => array(
        'fontSize' => '18px'
      )
    ),
    array(
      'title' => 'Base',
      'selector' => 'p',
      'classes' => 'text-base',
      'exact'   => true
    ),
    array(
      'title' => 'Small',
      'selector' => 'p',
      'classes' => 'text-sm',
    ),
  );
  $init_array['style_formats'] = wp_json_encode( $style_formats );

  return $init_array;

}
add_filter( 'tiny_mce_before_init', 'freelancer_mce_before_init_insert_formats' );

if ( ! function_exists( 'freelancer_mce_text_sizes' ) ) {
  /**
   * Customize mce editor font sizes
   * @param $initArray
   * @return mixed
   *
   * DEPRECATED
   */
  function freelancer_mce_text_sizes( $initArray ){
    $initArray['fontsize_formats'] = "11pt 12pt 14pt 18pt 24pt 42pt 60pt";
    return $initArray;
  }
}
add_filter( 'tiny_mce_before_init', 'freelancer_mce_text_sizes' );

/**
 * Options Page
 */
if( function_exists( 'acf_add_options_page' ) ) {

  acf_add_options_page(array(
    'page_title' 	=> __( 'Theme Options', 'freelancer' ),
    'menu_title'	=> __( 'Theme Options', 'freelancer' ),
    'menu_slug' 	=> 'theme-options',
    'capability'	=> 'edit_posts',
    'redirect'		=> false
  ));

}