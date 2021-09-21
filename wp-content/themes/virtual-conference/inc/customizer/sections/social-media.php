<?php
/**
 * Social Media Sections

 */
add_action( 'customize_register', 'virtual_conference_social_media_sections' );

function virtual_conference_social_media_sections( $wp_customize ) {

    $wp_customize->add_section( 'virtual_conference_social_media_sections', array(
        'title'          => esc_html__( 'Social Media', 'virtual-conference' ),
        'priority'       => 8,
    ) );
    
    
    $wp_customize->add_setting( new Virtual_Conference_Repeater_Setting( $wp_customize, 'virtual_conference_social_media', array(
        'sanitize_callback' => array( 'Virtual_Conference_Repeater_Setting', 'sanitize_repeater_setting' ),
    ) ) );

    $wp_customize->add_control( new Virtual_Conference_Control_Repeater( $wp_customize, 'virtual_conference_social_media', array(
        'section' => 'virtual_conference_social_media_sections',
        'settings'    => 'virtual_conference_social_media',
        'label'   => esc_html__( 'Social Media', 'virtual-conference' ),
        'row_label' => array(
            'type'  => 'field',
            'value' => esc_html__( 'Social Media', 'virtual-conference' ),
            'field' => 'social_media_repeater_class',
        ), 
        'fields' => array(
            'social_media_repeater_class' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Select Social Media', 'virtual-conference' ),
                'default'     => 'facebook',
                'choices'   => virtual_conference_social_media()
            ),
            'social_media_link' => array(
                'type'      => 'url',
                'label'     => esc_html__( 'Social Media Links', 'virtual-conference' ),
            ),          
        ),
                               
    ) ) );

    $wp_customize->selective_refresh->add_partial( 'virtual_conference_social_media', array(
        'selector'        => '.event-information-holder .social-icons',
        'render_callback' => '',
    ) );

}