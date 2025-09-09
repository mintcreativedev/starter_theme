<?php

/**
 * This file adds functions to the Frost WordPress theme.
 *
 * @package Frost
 * @author  WP Engine
 * @license GNU General Public License v3
 * @link    https://frostwp.com/
 */

if (! function_exists('frost_setup')) {

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since 0.8.0
	 *
	 * @return void
	 */
	function frost_setup()
	{

		// Make theme available for translation.
		load_theme_textdomain('frost', get_template_directory() . '/languages');

		// Enqueue editor stylesheet.
		add_editor_style(get_template_directory_uri() . '/style.css');

		// Remove core block patterns.
		remove_theme_support('core-block-patterns');
	}
}
add_action('after_setup_theme', 'frost_setup');

// Enqueue stylesheet.
add_action('wp_enqueue_scripts', 'frost_enqueue_stylesheet');
function frost_enqueue_stylesheet()
{

	wp_enqueue_style('frost', get_template_directory_uri() . '/css/style.css', array(), wp_get_theme()->get('Version'));
}

/**
 * Register block styles.
 *
 * @since 0.9.2
 */
function frost_register_block_styles()
{

	$block_styles = array(
		'core/columns' => array(
			'columns-reverse' => __('Reverse', 'frost'),
		),
		'core/group' => array(
			'shadow-light' => __('Shadow', 'frost'),
			'shadow-solid' => __('Solid', 'frost'),
		),
		'core/list' => array(
			'no-disc' => __('No Disc', 'frost'),
		),
		'core/quote' => array(
			'shadow-light' => __('Shadow', 'frost'),
			'shadow-solid' => __('Solid', 'frost'),
		),
		'core/social-links' => array(
			'outline' => __('Outline', 'frost'),
		),
	);

	foreach ($block_styles as $block => $styles) {
		foreach ($styles as $style_name => $style_label) {
			register_block_style(
				$block,
				array(
					'name'  => $style_name,
					'label' => $style_label,
				)
			);
		}
	}
}
add_action('init', 'frost_register_block_styles');

/**
 * Register block pattern categories.
 *
 * @since 1.0.4
 */
function frost_register_block_pattern_categories()
{

	register_block_pattern_category(
		'frost-page',
		array(
			'label'       => __('Page', 'frost'),
			'description' => __('Create a full page with multiple patterns that are grouped together.', 'frost'),
		)
	);
	register_block_pattern_category(
		'frost-pricing',
		array(
			'label'       => __('Pricing', 'frost'),
			'description' => __('Compare features for your digital products or service plans.', 'frost'),
		)
	);
}

add_action('init', 'frost_register_block_pattern_categories');

/**
 * Register custom ACF Block
 */


function my_acf_blocks_init()
{

	// Check function exists.
	if (function_exists('acf_register_block_type')) {

		// Register a testimonial block.
		acf_register_block_type(array(
			'name'              => 'Post Slider',
			'title'             => __('Post Slider'),
			'description'       => __('A custom carousel block for posts.'),
			'render_template'   => '/blocks/post-slider/post-slider.php',
			'enqueue_script'    => get_template_directory_uri() . '/blocks/post-slider/post-slider.js',
			'category'          => 'formatting',
		));
	}
}
add_action('acf/init', 'my_acf_blocks_init');


/**
 * Register Scripts used in ACF Blocks
 */

// function my_acf_block_assets()
// {
// 	// Swiper CSS
// 	wp_enqueue_style(
// 		'swiper-css',
// 		'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css',
// 		array(),
// 		'4.1.4'
// 	);

// 	// Swiper JS
// 	wp_enqueue_script(
// 		'swiper-js',
// 		'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js',
// 		array(),
// 		'4.1.4',
// 		true
// 	);
// }
// add_action('enqueue_block_assets', 'my_acf_block_assets');
