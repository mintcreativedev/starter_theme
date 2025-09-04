<?php

/**
 * Enqueue Frost Child styles
 */
function theme_enqueue_styles()
{
    wp_enqueue_style(
        'theme-style',
        get_stylesheet_directory_uri() . '/css/style.css',
        array(),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
