<?php
/**
 * Site Identity Settings
 */

add_action( 'customize_register', 'virtual_conference_change_site_identity_section' );

function virtual_conference_change_site_identity_section( $wp_customize)  {
    $wp_customize->get_section( 'title_tagline' )->priority = 2;

    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_control( 'blogname' )->priority = 5;
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    $wp_customize->get_control( 'blogdescription' )->priority = 7;

    $wp_customize->selective_refresh->add_partial( 'blogname', array(
	    'selector' => '.site-title a',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
	    'selector' => '.site-description',
	) );

    $wp_customize->add_setting( 'virtual_conference_site_title', array(
        'sanitize_callback'     =>  'virtual_conference_sanitize_checkbox',
        'default'               =>  true
      ) );
  
      $wp_customize->add_control( new Virtual_Conference_Toggle_Control( $wp_customize, 'virtual_conference_site_title', array(
        'label' => esc_html__( 'Site Title Show/hide','virtual-conference' ),
        'section' => 'title_tagline',
        'settings' => 'virtual_conference_site_title',
        'type'=> 'toggle',
        'priority'    => 4
      ) ) );

      $wp_customize->add_setting( 'virtual_conference_tagline', array(
        'sanitize_callback'     =>  'virtual_conference_sanitize_checkbox',
        'default'               =>  false
      ) );
  
      $wp_customize->add_control( new Virtual_Conference_Toggle_Control( $wp_customize, 'virtual_conference_tagline', array(
        'label' => esc_html__( 'Tagline Show/hide','virtual-conference' ),
        'section' => 'title_tagline',
        'settings' => 'virtual_conference_tagline',
        'type'=> 'toggle',
        'priority'    => 6
      ) ) );

	$wp_customize->add_setting( 'logo_size', array(
        'default'           => 35,
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( new Virtual_Conference_Slider_Control( $wp_customize, 'logo_size', array(
        'section' => 'title_tagline',
        'settings' => 'logo_size',
        'label'   => esc_html__( 'Logo Size', 'virtual-conference' ),
        'choices'     => array(
            'min'   => 25,
            'max'   => 75,
            'step'  => 1,
        )
    ) ) );

    $wp_customize->add_setting( 'header_height', array(
        'default'           => 30,
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( new Virtual_Conference_Slider_Control( $wp_customize, 'header_height', array(
        'section' => 'title_tagline',
        'settings' => 'header_height',
        'label'   => esc_html__( 'Header Height', 'virtual-conference' ),
        'choices'     => array(
            'min'   => 15,
            'max'   => 200,
            'step'  => 1,
        )
    ) ) );

    $wp_customize->add_setting( 'site_color', array(
        'default'     => '#2c1db7',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'virtual_conference_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_color', array(
        'label'      => esc_html__( 'Site Color', 'virtual-conference' ),
        'section'    => 'title_tagline',
        'settings'   => 'site_color',
        'priority'   => 10
    ) ) );

    $wp_customize->add_setting( 'site_identity_font_family', array(
        'transport' => 'postMessage',
        'default'     => 'Abel',
        'sanitize_callback' => 'virtual_conference_sanitize_google_fonts',
    ) );

    $wp_customize->add_control( 'site_identity_font_family', array(
        'settings'    => 'site_identity_font_family',
        'label'       =>  esc_html__( 'Choose Font Family For Your Site', 'virtual-conference' ),
        'section'     => 'title_tagline',
        'type'        => 'select',
        'choices'     => virtual_conference_google_fonts(),
        'priority'    => 15
    ) );
}
