<?php
/**
 * Theme setup and assets.
 *
 * @package Super_Anket
 */

function super_anket_setup() {
	load_theme_textdomain( 'super-anket', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 64,
		'width'       => 240,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );

	register_nav_menus( array(
		'primary' => esc_html__( 'Ana menü', 'super-anket' ),
	) );
}
add_action( 'after_setup_theme', 'super_anket_setup' );

function super_anket_enqueue_styles() {
	wp_enqueue_style(
		'super-anket-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'super_anket_enqueue_styles' );
