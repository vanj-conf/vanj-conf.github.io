<?php
/**
 * CTA With Video Settings
 *
 * @package Virtual_Conference
 */
add_action( 'customize_register', 'virtual_conference_customize_cta_with_video_section' );

function virtual_conference_customize_cta_with_video_section( $wp_customize ) {

    $wp_customize->add_section('virtual_conference_cta_with_video_sections', array(
        'title' => esc_html__('CTA with Video', 'virtual-conference'),
        'panel' => 'one_page_conference_theme_options_panel'
    ));

    $wp_customize->add_setting('cta_with_video_display_option', array(
        'sanitize_callback' => 'virtual_conference_sanitize_checkbox',
        'default' => true
    ));

    $wp_customize->add_control(new Virtual_Conference_Toggle_Control($wp_customize, 'cta_with_video_display_option', array(
        'label' => esc_html__('Hide / Show', 'virtual-conference'),
        'section' => 'virtual_conference_cta_with_video_sections',
        'settings' => 'cta_with_video_display_option',
        'type' => 'toggle',
    )));

    $wp_customize->selective_refresh->add_partial('cta_with_video_display_option', array(
        'selector' => '.cta-video-1 .container', // You can also select a css class
    ));

    $wp_customize->add_setting('cta_with_video_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => ''
    ));

    $wp_customize->add_control('cta_with_video_title', array(
        'label' => esc_html__('CTA Title', 'virtual-conference'),
        'section' => 'virtual_conference_cta_with_video_sections',
        'settings' => 'cta_with_video_title',
        'type' => 'text',
    ));


    $wp_customize->add_setting( 'cta_with_video_select_video_type', array(
        'sanitize_callback'     =>  'virtual_conference_sanitize_select',
        'default' => 'external_source'
    ) );

 
    $wp_customize->add_control( 'cta_with_video_select_video_type', array(
        'label' => esc_html__( 'Choose Video Type', 'virtual-conference' ),
        'section' => 'virtual_conference_cta_with_video_sections',
        'type' => 'select',
        'choices' => array(
            'external_source' => esc_html__( 'External URL', 'virtual-conference' ),
            'upload' => esc_html__( 'Upload Video', 'virtual-conference' )
        )
    ) );


    $wp_customize->add_setting('cta_with_video_external_url_video', array(
        'sanitize_callback' => 'esc_url_raw',
        'default' => ''
    ));

    $wp_customize->add_control('cta_with_video_external_url_video', array(
        'label' => esc_html__('CTA External URL Video', 'virtual-conference'),
        'section' => 'virtual_conference_cta_with_video_sections',
        'settings' => 'cta_with_video_external_url_video',
        'type' => 'url',
        'active_callback'  => function() {
            $video_source = get_theme_mod( 'cta_with_video_select_video_type', 'external_source' );
            if( $video_source == 'external_source' )
                return true;
        }
    ) );


    $wp_customize->add_setting( 'cta_with_video_video', array(
        'sanitize_callback'     =>  'absint',
    ) );


    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'cta_with_video_video', array(
        'label'      => esc_html__( 'CTA Video', 'virtual-conference' ),
        'section'    => 'virtual_conference_cta_with_video_sections',
        'settings'   => 'cta_with_video_video',
        'mime_type' => 'video',
        'active_callback'  => function() {
            $video_source = get_theme_mod( 'cta_with_video_select_video_type', 'external_source' );
            if( $video_source == 'upload' )
                return true;
        }
    ) ) );


    $wp_customize->add_setting('cta_with_video_text', array(
        'sanitize_callback' => 'wp_kses_post',
        'default' => ''
    ));

    $wp_customize->add_control('cta_with_video_text', array(
        'label' => esc_html__('CTA Text', 'virtual-conference'),
        'section' => 'virtual_conference_cta_with_video_sections',
        'settings' => 'cta_with_video_text',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('cta_with_video_button_label', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => ''
    ));

    $wp_customize->add_control('cta_with_video_button_label', array(
        'label' => esc_html__('CTA Button Label', 'virtual-conference'),
        'section' => 'virtual_conference_cta_with_video_sections',
        'settings' => 'cta_with_video_button_label',
        'type' => 'text',
    ));

    $wp_customize->add_setting('cta_with_video_link', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => ''
    ));

    $wp_customize->add_control('cta_with_video_link', array(
        'label' => esc_html__('CTA Link', 'virtual-conference'),
        'section' => 'virtual_conference_cta_with_video_sections',
        'settings' => 'cta_with_video_link',
        'type' => 'text',
    ));

    

}

