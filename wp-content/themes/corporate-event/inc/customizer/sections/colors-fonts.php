<?php

/**
 * Colors Settings
 *
 * @package Corporate_Event
 */
add_action( 'customize_register', 'corporate_event_change_colors_panel' );
function corporate_event_change_colors_panel( $wp_customize )
{
    $wp_customize->get_section( 'colors' )->priority = 4;
    $wp_customize->get_section( 'colors' )->title = esc_html__( 'Colors and Fonts', 'corporate-event' );
    $wp_customize->get_control( 'header_textcolor' )->label = esc_html__( 'Heading Text Color', 'corporate-event' );
    $wp_customize->get_control( 'background_color' )->priority = 500;
    $wp_customize->get_control( 'header_textcolor' )->priority = 501;
}

add_action( 'customize_register', 'corporate_event_customize_font_family' );
function corporate_event_customize_font_family( $wp_customize )
{
    $wp_customize->add_setting( 'font_family', array(
        'transport'         => 'postMessage',
        'default'           => 'Montserrat',
        'sanitize_callback' => 'corporate_event_sanitize_google_fonts',
    ) );
    $wp_customize->add_control( 'font_family', array(
        'settings' => 'font_family',
        'label'    => esc_html__( 'Choose Font Family For Your Site', 'corporate-event' ),
        'section'  => 'colors',
        'type'     => 'select',
        'choices'  => corporate_event_google_fonts(),
        'priority' => 1,
    ) );
}

add_action( 'customize_register', 'corporate_event_customize_font_size' );
function corporate_event_customize_font_size( $wp_customize )
{
    $wp_customize->add_setting( 'font_size', array(
        'transport'         => 'postMessage',
        'default'           => '14px',
        'sanitize_callback' => 'corporate_event_sanitize_select',
    ) );
    $wp_customize->add_control( 'font_size', array(
        'settings' => 'font_size',
        'label'    => esc_html__( 'Choose Font Size', 'corporate-event' ),
        'section'  => 'colors',
        'type'     => 'select',
        'default'  => '13px',
        'choices'  => array(
        '13px' => '13px',
        '14px' => '14px',
        '15px' => '15px',
        '16px' => '16px',
        '17px' => '17px',
        '18px' => '18px',
    ),
        'priority' => 1,
    ) );
}

add_action( 'customize_register', 'corporate_event_heading_font_family' );
function corporate_event_heading_font_family( $wp_customize )
{
    $wp_customize->add_setting( 'heading_font_family', array(
        'transport'         => 'postMessage',
        'sanitize_callback' => 'corporate_event_sanitize_google_fonts',
        'default'           => 'Poppins',
    ) );
    $wp_customize->add_control( 'heading_font_family', array(
        'settings' => 'heading_font_family',
        'label'    => esc_html__( 'Heading Font Family', 'corporate-event' ),
        'section'  => 'colors',
        'type'     => 'select',
        'choices'  => corporate_event_google_fonts(),
        'priority' => 1,
    ) );
}

add_action( 'customize_register', 'corporate_event_color_options' );
function corporate_event_color_options( $wp_customize )
{
    $wp_customize->add_setting( 'color_options_text', array(
        'default'           => '',
        'type'              => 'customtext',
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( new Corporate_Event_Custom_Text( $wp_customize, 'color_options_text', array(
        'label'    => esc_html__( 'Color Options:', 'corporate-event' ),
        'section'  => 'colors',
        'settings' => 'color_options_text',
        'priority' => 1,
    ) ) );
}

add_action( 'customize_register', 'corporate_event_customize_color_options' );
function corporate_event_customize_color_options( $wp_customize )
{
}
