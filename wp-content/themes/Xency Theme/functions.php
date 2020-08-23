<?php



function xency_theme_support() {

	// Custom background color.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'f5efe0',
		)
	);

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support('post-thumbnails');

	//Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	load_theme_textdomain( 'Xency Theme' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );
}

/**
* Register and Enqueue Styles.
*/
function xency_register_styles() {
	
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'xency-style', get_stylesheet_uri(), array(), $theme_version );
	wp_style_add_data( 'xency-style', 'rtl', 'replace' );

}
add_action( 'wp_enqueue_scripts', 'xency_register_styles' );

function xency_register_scripts() {
	
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script( 'twentytwenty-js', get_template_directory_uri() . '/assets/js/script.js', array(), $theme_version, false );
}
add_action('wp_enqueue_scripts', 'xency_register_scripts');


