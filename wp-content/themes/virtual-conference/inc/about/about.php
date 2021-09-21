<?php

/**
 * Added Virtual Conferencee Page.
*/
/**
 * Add a new page under Appearance
 */
function virtual_conference_menu()
{
    add_theme_page(
        __( 'Get Started', 'virtual-conference' ),
        __( 'Get Started', 'virtual-conference' ),
        'edit_theme_options',
        'virtual-conference-get-started',
        'virtual_conference_page'
    );
}

add_action( 'admin_menu', 'virtual_conference_menu' );
/**
 * Enqueue styles for the help page.
 */
function virtual_conference_admin_scripts( $hook )
{
    if ( 'appearance_page_virtual-conference-get-started' !== $hook ) {
        return;
    }
    wp_enqueue_style(
        'virtual-conference-admin-style',
        get_template_directory_uri() . '/inc/about/about.css',
        array(),
        ''
    );
}

add_action( 'admin_enqueue_scripts', 'virtual_conference_admin_scripts' );
/**
 * Add the theme page
 */
function virtual_conference_page()
{
    ?>
	<div class="das-wrap">
		<div class="virtual-conference-panel">
			<div class="virtual-conference-logo">
				<img class="ts-logo" width="250" src="<?php 
    echo  esc_url( get_template_directory_uri() . '/inc/about/images/wpeventpartners.png' ) ;
    ?>" alt="<?php 
    esc_attr_e( 'Logo', 'virtual-conference' );
    ?>">
			</div>
			<?php 
    ?>
				<a href="https://wpeventpartners.com/layouts/virtual-conferences-pro/" target="_blank" class="btn btn-success pull-right"><?php 
    esc_html_e( 'Upgrade to Pro $49.99', 'virtual-conference' );
    ?></a>
			<?php 
    ?>
			<p>
			<?php 
    esc_html_e( 'Virtual Conference is a free WordPress theme for events, conferences, conclaves, and meetups. This theme is based on the Event and Conference Management WordPress theme, WPEventPartners. If you are the organizer of the conference and looking to build a Virtual Conference website then this is the best theme for you.', 'virtual-conference' );
    ?></p>
			<a class="btn btn-primary" href="<?php 
    echo  esc_url( admin_url( '/customize.php?' ) ) ;
    ?>"><?php 
    esc_html_e( 'Theme Options - Click Here', 'virtual-conference' );
    ?></a>
		</div>

		<div class="virtual-conference-panel">
			<div class="virtual-conference-panel-content">
				<div class="theme-title">
					<h3><?php 
    esc_html_e( 'Once you install all recommended plugins, you can import demo template.', 'virtual-conference' );
    ?></h3>
				</div>
				<a class="btn btn-secondary" href="<?php 
    echo  esc_url( admin_url( '/themes.php?page=advanced-import' ) ) ;
    ?>"><?php 
    esc_html_e( 'View Demo Templates', 'virtual-conference' );
    ?></a>
			</div>
		</div>
		<div class="virtual-conference-panel">
			<div class="virtual-conference-panel-content">
				<div class="theme-title">
					<h4><?php 
    esc_html_e( 'If you like the theme, please leave a review or Contact us for technical support.', 'virtual-conference' );
    ?></h4>
				</div>
				<a href="https://wordpress.org/support/theme/virtual-conference/reviews/#new-post" target="_blank" class="btn btn-secondary"><?php 
    esc_html_e( 'Rate this theme', 'virtual-conference' );
    ?></a> <a href="https://wpeventpartners.com/support/" target="_blank" class="btn btn-secondary"><?php 
    esc_html_e( 'Contact Us', 'virtual-conference' );
    ?></a>
			</div>
		</div>
	</div>
	<?php 
}
