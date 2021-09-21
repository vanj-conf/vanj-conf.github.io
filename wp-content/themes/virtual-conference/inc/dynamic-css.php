<?php
function virtual_conference_dynamic_css() {

        wp_enqueue_style(
            'virtual-conference-dynamic-css', get_template_directory_uri() . '/css/dynamic.css'
        );

        $header_bg_color = esc_attr( get_theme_mod( 'header_bg_color', '#ffffff' ) );
        $primary_color = esc_attr( get_theme_mod( 'primary_color', '#8854E1' ) );
        $secondary_color = esc_attr( get_theme_mod( 'secondary_color', '#13C4FA' ) );
        $text_color = get_theme_mod( 'text_color', '#757575' );
        $light_color = get_theme_mod( 'light_color', '#EFF3FC ' );
        $dark_color = get_theme_mod( 'dark_color', '#111111 ' );
        $grey_color = get_theme_mod( 'grey_color', '#606060 ' );
        $header_text_color = '#'.get_header_textcolor();
        $header_height = absint( get_theme_mod( 'header_height', 30 ) );

        $banner_overlay_color = esc_attr( get_theme_mod( 'banner_overlay_color', '#e3f0f7' ) );

        $font_family = esc_attr( get_theme_mod( 'font_family', 'Raleway' ) );
        $font_size = esc_attr( get_theme_mod( 'font_size', '16px' ) );

        $logo_font_size = absint( get_theme_mod( 'logo_size', 35 ) );
        $logo_size = absint( $logo_font_size * 6 );
        $site_color = esc_attr( get_theme_mod( 'site_color', '#2c1db7' ) );
        $site_identity_font_family = esc_attr( get_theme_mod( 'site_identity_font_family', 'Abel' ) );

        $heading_font_family = esc_attr( get_theme_mod( 'heading_font_family', 'Abel' ) );
        

        $event_title_font_size = get_theme_mod( 'event_title_font_size', 50 );

        
        $dynamic_css = "


                :root {
                        --header-background: $header_bg_color;
                        --primary-color: $primary_color;
                        --secondary-color: $secondary_color;
                        --text-color: $text_color;
                        --light-color: $light_color;
                        --dark-color: $dark_color;
                        --grey-color: $grey_color;
                        --header-text-color: $header_text_color;
                        --heading-font-family: $heading_font_family;
                        --body-font-family: $font_family;
                }


                html,:root{ font: normal $font_size"." $font_family;}
                header .custom-logo-link img{ width: {$logo_size}"."px; }

                .header{padding: {$header_height}" . "px 0;}

                /*Site Title*/
                header .site-title a{ font-size: $logo_font_size"."px; font-family: $site_identity_font_family; color: $site_color; }

                /* Banner Colors */
                section[class*=banner-layout-] .item:before { background-color: {$banner_overlay_color}; }
                .banner-layout-2 .item { background-color: {$banner_overlay_color};}

                #banner .caption .title{
                        font-size: $event_title_font_size"."px;
                }

               
        ";
        wp_add_inline_style( 'virtual-conference-dynamic-css', $dynamic_css );
}
add_action( 'wp_enqueue_scripts', 'virtual_conference_dynamic_css' ,'99');




if ( class_exists( 'WepPlugin' ) ) {
        /**
        * Set default settings when switching themes
        */
        function virtual_conference_customizer_default_settings() {
                
                set_theme_mod( 'one_page_conference_speaker_layouts', '4' );
                set_theme_mod( 'one_page_conference_sponsor_layouts', '2' );
                set_theme_mod( 'testimonail_layouts', '3' );
                

        }
        add_action( 'after_switch_theme', 'virtual_conference_customizer_default_settings' );
}