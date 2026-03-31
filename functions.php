<?php

if (!defined('ABSPATH')) exit;

/**
 * Enqueue styles and scripts for the child theme
 */
function enqueue_child_theme_assets() {
    

    // Parent theme style
    wp_enqueue_style(
        'twentytwentyfour-parent-style',
        get_template_directory_uri() . '/style.css'
    );

    // Bootstrap CSS
    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css',
        array(),
        '5.3.2'
    );

    // Bootstrap Icons (separate handle)
    wp_enqueue_style(
        'bootstrap-icons',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
        array(),
        '1.11.3'
    );

    // Child theme CSS (depends on Bootstrap + parent)
    wp_enqueue_style(
        'twentytwentyfour-child-style',
        get_stylesheet_directory_uri() . '/assets/css/custom-style.css',
        array('twentytwentyfour-parent-style', 'bootstrap-css'),
        '1.0'
    );

    // Google Font - Raleway
    wp_enqueue_style(
        'google-font-raleway',
        'https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    //   Font Awesome for icons 
     wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
        array(),
        null
    );


    // Bootstrap JS Bundle
    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js',
        array(),
        '5.3.2',
        true
    );

    // Child theme JS
    wp_enqueue_script(
        'twentytwentyfour-child-script',
        get_stylesheet_directory_uri() . '/assets/js/script.js',
        array('bootstrap-js'),
        '1.0',
        true
    );
}

add_action('wp_enqueue_scripts', 'enqueue_child_theme_assets');

// Register Menu

function register_my_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
    ));
}
add_action('after_setup_theme', 'register_my_menus');

function add_nav_item_class($classes, $item, $args) {
    if ($args->theme_location == 'primary') {
        $classes[] = 'nav-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_nav_item_class', 10, 3);

// Theme Option For ACF

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug'  => 'theme-options',
        'redirect'   => false
    ));

    acf_add_options_sub_page(array(
        'page_title'  => 'Header Settings',
        'menu_title'  => 'Header',
        'parent_slug' => 'theme-options',
    ));

}