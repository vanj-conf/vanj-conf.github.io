<?php
/**
 * Header Layout Settings
 */

add_action( 'customize_register', 'virtual_conference_theme_header_layout_section' );

function virtual_conference_theme_header_layout_section( $wp_customize ) {

    $wp_customize->add_section( 'virtual_conference_theme_header_layout_section', array(
        'title'          => esc_html__( 'Header Options', 'virtual-conference' ),
        'priority'       => 2,
        'capability'     => 'edit_theme_options',
    ) );

    $wp_customize->add_setting( 'virtual_conference_header_sticky_menu_option', array(
      'sanitize_callback'     =>  'virtual_conference_sanitize_checkbox',
      'default'               =>  false
    ) );

    $wp_customize->add_control( new Virtual_Conference_Toggle_Control( $wp_customize, 'virtual_conference_header_sticky_menu_option', array(
      'label' => esc_html__( 'Enable Sticky Menu?','virtual-conference' ),
      'section' => 'virtual_conference_theme_header_layout_section',
      'settings' => 'virtual_conference_header_sticky_menu_option',
      'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'virtual_conference_header_layouts', array(
        'sanitize_callback' => 'virtual_conference_sanitize_choices',
        'default'     => 'one',
    ) );

    $wp_customize->add_control( new Virtual_Conference_Radio_Image_Control( $wp_customize, 'virtual_conference_header_layouts', array(
        'label' => esc_html__( 'Header Layout','virtual-conference' ),
        'section' => 'virtual_conference_theme_header_layout_section',
        'settings' => 'virtual_conference_header_layouts',
        'type'=> 'radio-image',
        'choices'     => array(
            'one'   => get_template_directory_uri() . '/images/header-layouts/header-1.jpg',
            'two'   => get_template_directory_uri() . '/images/header-layouts/header-2.jpg',
            'three'   => get_template_directory_uri() . '/images/header-layouts/header-3.jpg',
            ),
    ) ) );

}