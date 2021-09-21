<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */


function virtual_conference_widgets_init() {
    
    for($i = 1; $i<4; $i++){
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Widget', 'virtual-conference' ) . " " . $i,
				'id'            => 'footer-'.$i.'',
				'description'   => esc_html__( 'Add widgets here.', 'virtual-conference' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			)
		);
	}

    register_sidebar( array(
        'name'          => esc_html__( 'Right Sidebar', 'virtual-conference' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Left Sidebar', 'virtual-conference' ),
        'id'            => 'left-sidebar',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );

}
add_action( 'widgets_init', 'virtual_conference_widgets_init' );