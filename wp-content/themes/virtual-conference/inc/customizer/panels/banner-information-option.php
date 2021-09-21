<?php
/**
 * Event Information Panel
 */

add_action( 'customize_register', 'virtual_conference_customize_register_banner_panel' );

function virtual_conference_customize_register_banner_panel( $wp_customize ) {
    $wp_customize->add_panel( 'virtual_conference_banner_panel', array(
        'priority'    => 6,
        'title'       => esc_html__( 'Banner Information', 'virtual-conference' ),
    ) );
}