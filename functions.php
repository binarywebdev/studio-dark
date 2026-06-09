<?php
/**
 * Studio Dark block theme functions.
 *
 * @package StudioDark
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function studio_dark_setup() {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'studio_dark_setup' );

/**
 * Google Fonts + тематический CSS + motion-слой (курсор/параллакс/reveal).
 */
function studio_dark_assets() {
	$uri = get_template_directory_uri();
	$ver = wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'studio-dark-fonts',
		'https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300..600;1,9..144,300..600&family=Space+Grotesk:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'studio-dark-main',
		"$uri/assets/css/studio.css",
		array( 'studio-dark-fonts' ),
		$ver
	);

	wp_enqueue_script(
		'studio-dark-motion',
		"$uri/assets/js/studio.js",
		array(),
		$ver,
		true
	);

	wp_enqueue_script(
		'studio-dark-chart-bg',
		"$uri/assets/js/chart-bg.js",
		array(),
		$ver,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'studio_dark_assets' );

/**
 * Animated chart backdrop — fixed full-screen canvas rendered
 * behind all content (see #chartBg in studio.css + chart-bg.js).
 */
function studio_dark_chart_canvas() {
	echo '<canvas id="chartBg" aria-hidden="true"></canvas>';
}
add_action( 'wp_footer', 'studio_dark_chart_canvas' );
