<?php


function virtual_conference_starter_content() {
	$starter_content = array(
	    'options' => array(
	    	'show_on_front' => 'page',
	        'page_on_front' => '{{home}}',
	        'page_for_posts' => '{{blog}}',
	    ),
	    // Starter pages to include
        'posts' => array(
            'home' => array(
	            'post_type' => 'page',
	            'post_title' => 'Home',	            
	            'template' => 'template-home.php',
	        ),
	        'blog',	        
        ),

		'theme_mods' => array(
	        'event_title' => esc_html__( 'The world’s largest Virtual Conference', 'virtual-conference' ),
	        'event_subtitle' => esc_html__( 'Impact Conference 2021', 'virtual-conference' ),
	        'event_venue' => esc_html__( 'Redwood Hall, Silicon Valley', 'virtual-conference' ),
	        'cta_1_button_label' => esc_html__( 'Call of Paper', 'virtual-conference' ),
	        'cta_1_link' => esc_url( '#' ),
	        'cta_2_button_label' => esc_html__( 'Registration', 'virtual-conference' ),
	        'cta_2_link' => esc_url( '#' )
    	)    	

	);

	return $starter_content; 
}