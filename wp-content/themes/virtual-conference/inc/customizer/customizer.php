<?php

/**
 * Virtual Conference Theme Customizer
 */
$panels = array( 'banner-information-option' );
add_action( 'customize_register', 'virtual_conference_change_homepage_settings_options' );
function virtual_conference_change_homepage_settings_options( $wp_customize )
{
    $wp_customize->get_section( 'static_front_page' )->priority = 13;
    $wp_customize->get_section( 'header_image' )->panel = 'virtual_conference_banner_panel';
    $wp_customize->get_section( 'header_image' )->title = 'Banner Image';
    require get_template_directory() . '/inc/google-fonts.php';
}

$banner_info = array( 'event-information' );
$event_controller = array( 'about-us', 'event-venue', 'drag-and-drop' );
if ( !empty($panels) ) {
    foreach ( $panels as $panel ) {
        require get_template_directory() . '/inc/customizer/panels/' . $panel . '.php';
    }
}
require get_template_directory() . '/inc/customizer/sections/site-identity.php';
require get_template_directory() . '/inc/customizer/sections/theme-header.php';
require get_template_directory() . '/inc/customizer/sections/colors-fonts.php';
require get_template_directory() . '/inc/customizer/sections/social-media.php';
require get_template_directory() . '/inc/customizer/sections/blog-list.php';
require get_template_directory() . '/inc/customizer/sections/copyright.php';
if ( !empty($banner_info) ) {
    foreach ( $banner_info as $section ) {
        require get_template_directory() . '/inc/customizer/sections/banner-information/' . $section . '.php';
    }
}
if ( !empty($event_controller) ) {
    foreach ( $event_controller as $section ) {
        require get_template_directory() . '/inc/customizer/sections/event-controller/' . $section . '.php';
    }
}
if ( !empty($drag_drop) ) {
    foreach ( $drag_drop as $section ) {
        require get_template_directory() . '/inc/customizer/sections/' . $section . '.php';
    }
}
function virtual_conference_customizer_stylesheet()
{
    wp_register_style( 'virtual-conference-customizer-css', get_template_directory_uri() . '/css/customizer.css' );
    wp_enqueue_style( 'virtual-conference-customizer-css' );
}

add_action( 'customize_controls_print_styles', 'virtual_conference_customizer_stylesheet' );
/**
 * Enqueue the customizer javascript.
 */
function virtual_conference_customize_preview_js()
{
    wp_enqueue_script(
        'virtual-conference-customizer-preview',
        get_template_directory_uri() . '/js/customizer.js',
        array( 'jquery' ),
        '',
        true
    );
}

add_action( 'customize_preview_init', 'virtual_conference_customize_preview_js' );
/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/customizer/sanitization-functions.php';