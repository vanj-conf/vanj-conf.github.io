<?php

/**
 * Colors Settings
 *
 * @package Virtual_Conference
 */
add_action( 'customize_register', 'virtual_conference_change_colors_panel' );
function virtual_conference_change_colors_panel( $wp_customize )
{
    $wp_customize->get_section( 'colors' )->priority = 4;
    $wp_customize->get_section( 'colors' )->title = esc_html__( 'Colors and Fonts', 'virtual-conference' );
    $wp_customize->get_control( 'header_textcolor' )->label = esc_html__( 'Heading Text Color', 'virtual-conference' );
    $wp_customize->get_control( 'background_color' )->priority = 500;
    $wp_customize->get_control( 'header_textcolor' )->priority = 501;
}

add_action( 'customize_register', 'virtual_conference_customize_font_family' );
function virtual_conference_customize_font_family( $wp_customize )
{
    $wp_customize->add_setting( 'font_family', array(
        'transport'         => 'postMessage',
        'default'           => 'Raleway',
        'sanitize_callback' => 'virtual_conference_sanitize_google_fonts',
    ) );
    $wp_customize->add_control( 'font_family', array(
        'settings' => 'font_family',
        'label'    => esc_html__( 'Choose Font Family For Your Site', 'virtual-conference' ),
        'section'  => 'colors',
        'type'     => 'select',
        'choices'  => virtual_conference_google_fonts(),
        'priority' => 1,
    ) );
}

add_action( 'customize_register', 'virtual_conference_customize_font_size' );
function virtual_conference_customize_font_size( $wp_customize )
{
    $wp_customize->add_setting( 'font_size', array(
        'transport'         => 'postMessage',
        'default'           => '16px',
        'sanitize_callback' => 'virtual_conference_sanitize_select',
    ) );
    $wp_customize->add_control( 'font_size', array(
        'settings' => 'font_size',
        'label'    => esc_html__( 'Choose Font Size', 'virtual-conference' ),
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

add_action( 'customize_register', 'virtual_conference_heading_font_family' );
function virtual_conference_heading_font_family( $wp_customize )
{
    $wp_customize->add_setting( 'heading_font_family', array(
        'sanitize_callback' => 'virtual_conference_sanitize_google_fonts',
        'default'           => 'Abel',
    ) );
    $wp_customize->add_control( 'heading_font_family', array(
        'settings' => 'heading_font_family',
        'label'    => esc_html__( 'Heading Font Family', 'virtual-conference' ),
        'section'  => 'colors',
        'type'     => 'select',
        'choices'  => virtual_conference_google_fonts(),
        'priority' => 1,
    ) );
}

add_action( 'customize_register', 'virtual_conference_color_options' );
function virtual_conference_color_options( $wp_customize )
{
    $wp_customize->add_setting( 'color_options_text', array(
        'default'           => '',
        'type'              => 'customtext',
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( new Virtual_Conference_Custom_Text( $wp_customize, 'color_options_text', array(
        'label'    => esc_html__( 'Color Options:', 'virtual-conference' ),
        'section'  => 'colors',
        'settings' => 'color_options_text',
        'priority' => 1,
    ) ) );
}

add_action( 'customize_register', 'virtual_conference_customize_color_options' );
function virtual_conference_customize_color_options( $wp_customize )
{
}
