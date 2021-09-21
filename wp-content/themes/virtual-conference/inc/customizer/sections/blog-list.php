<?php
/**
 * Blog List Settings
 */


add_action( 'customize_register', 'virtual_conference_customize_blog_list_option' );

function virtual_conference_customize_blog_list_option( $wp_customize ) {

    $wp_customize->add_section( 'virtual_conference_blog_list_section', array(
        'title'          => esc_html__( 'Blog Options', 'virtual-conference' ),
        'priority'       => 9,
    ) );


    $wp_customize->add_setting( 'hide_show_blog_list_on_home', array(
      'sanitize_callback'     =>  'virtual_conference_sanitize_checkbox',
      'default'               =>  true
    ) );

    $wp_customize->add_control( new Virtual_Conference_Toggle_Control( $wp_customize, 'hide_show_blog_list_on_home', array(
      'label' => esc_html__( 'Enable Blog on Home?','virtual-conference' ),
      'section' => 'virtual_conference_blog_list_section',
      'settings' => 'hide_show_blog_list_on_home',
      'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'blog_post_list_options_title_text', array(
        'sanitize_callback' =>  'wp_kses_post',        
    ) );

    $wp_customize->add_control( new Virtual_Conference_Custom_Text( $wp_customize, 'blog_post_list_options_title_text', array(
        'label' =>  esc_html__( 'Blog List Options :', 'virtual-conference' ),
        'section'   =>  'virtual_conference_blog_list_section',
        'Settings'  =>  'blog_post_list_options_title_text'
    ) ) );

    $wp_customize->selective_refresh->add_partial( 'blog_post_list_options_title_text', array(
        'selector' => '#blog h2', // You can also select a css class
    ) );

    $wp_customize->add_setting( 'blog_post_layout', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'virtual_conference_sanitize_choices',
        'default'     => 'sidebar-right',
    ) );

    $wp_customize->add_control( new Virtual_Conference_Radio_Buttonset_Control( $wp_customize, 'blog_post_layout', array(
        'label' => esc_html__( 'Layouts :', 'virtual-conference' ),
        'section' => 'virtual_conference_blog_list_section',
        'settings' => 'blog_post_layout',
        'type'=> 'radio-buttonset',
        'choices'     => array(
            'sidebar-left' => esc_html__( 'Sidebar at left', 'virtual-conference' ),
            'no-sidebar'    =>  esc_html__( 'No sidebar', 'virtual-conference' ),
            'sidebar-right' => esc_html__( 'Sidebar at right', 'virtual-conference' ),            
        ),
    ) ) );


    $wp_customize->add_setting( 'blog_post_view', array(
        'transport'  => 'postMessage',        
        'sanitize_callback' => 'virtual_conference_sanitize_choices',
        'default'     => 'grid-view',
    ) );

    $wp_customize->add_control( new Virtual_Conference_Radio_Buttonset_Control( $wp_customize, 'blog_post_view', array(
        'label' => esc_html__( 'Post View :', 'virtual-conference' ),
        'section' => 'virtual_conference_blog_list_section',
        'settings' => 'blog_post_view',
        'type'=> 'radio-buttonset',
        'choices'     => array(
            'grid-view' => esc_html__( 'Grid View', 'virtual-conference' ),
            'list-view' => esc_html__( 'List View', 'virtual-conference' ),
            'full-width-view' => esc_html__( 'Fullwidth View', 'virtual-conference' ),
        ),
    ) ) );


    $wp_customize->add_setting( 'pagination_type', array(
        'sanitize_callback' => 'virtual_conference_sanitize_choices',
        'default'     => 'ajax-loadmore',
    ) );

    $wp_customize->add_control( new Virtual_Conference_Radio_Buttonset_Control( $wp_customize, 'pagination_type', array(
        'label' => esc_html__( 'Pagination Type :', 'virtual-conference' ),
        'section' => 'virtual_conference_blog_list_section',
        'settings' => 'pagination_type',
        'type'=> 'radio-buttonset',
        'choices'     => array(
            'ajax-loadmore' => esc_html__( 'Ajax Loadmore', 'virtual-conference' ),
            'number-pagination'    =>  esc_html__( 'Number Pagination', 'virtual-conference' ),      
        ),
    ) ) );            
    


}