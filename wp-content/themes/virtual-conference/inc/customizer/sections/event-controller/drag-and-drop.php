<?php

/***
 * Drag & Drop Sections
 */
add_action( 'customize_register', 'virtual_conference_drag_and_drop_sections' );
function virtual_conference_drag_and_drop_sections( $wp_customize )
{
    $wp_customize->add_section( 'virtual_conference_sort_homepage_sections', array(
        'title'    => esc_html__( 'Drag & Drop', 'virtual-conference' ),
        'panel'    => 'one_page_conference_theme_options_panel',
        'priority' => 1000,
    ) );
    $choices = array(
        'about-us' => esc_html__( 'About Us', 'virtual-conference' ),
        'counter'  => esc_html__( 'Counter', 'virtual-conference' ),
    );
    $default = array( 'about-us', 'counter' );
    
    if ( class_exists( 'WepPlugin' ) ) {
        $choices['sponsors'] = esc_html__( 'Sponsors', 'virtual-conference' );
        $choices['speakers'] = esc_html__( 'Speakers', 'virtual-conference' );
        $choices['schedules'] = esc_html__( 'Schedules', 'virtual-conference' );
        $choices['venue'] = esc_html__( 'Venue', 'virtual-conference' );
        $choices['testimonials'] = esc_html__( 'Testimonials', 'virtual-conference' );
        $choices['organizers'] = esc_html__( 'Organizers', 'virtual-conference' );
        array_push(
            $default,
            'sponsors',
            'speakers',
            'schedules',
            'venue',
            'testimonials',
            'organizers'
        );
    }
    
    $wp_customize->add_setting( 'virtual_conference_sort_homepage', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'virtual_conference_sanitize_array',
        'default'           => $default,
    ) );
    $wp_customize->add_control( new Virtual_Conference_Control_Sortable( $wp_customize, 'virtual_conference_sort_homepage', array(
        'label'    => esc_html__( 'Drag and Drop Sections to rearrange.', 'virtual-conference' ),
        'section'  => 'virtual_conference_sort_homepage_sections',
        'settings' => 'virtual_conference_sort_homepage',
        'type'     => 'sortable',
        'choices'  => $choices,
    ) ) );
}
