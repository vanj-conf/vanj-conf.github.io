<?php
/**
 * Sanitization Functions
 *
 * @package Virtual_Conference
 * 
 */

    
function virtual_conference_sanitize_category( $input ){
  $output = intval( $input );
  return $output;

}

function virtual_conference_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

//checkbox sanitization function
function virtual_conference_sanitize_checkbox( $input ) {
    //returns true if checkbox is checked
    return ( ( isset( $input ) && true == $input ) ? true : false );
}

//file input sanitization function
function virtual_conference_sanitize_image( $file, $setting ) {
 
    //allowed file types
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png'
    );
     
    //check file type from file name
    $file_ext = wp_check_filetype( $file, $mimes );
     
    //if file has a valid mime type return it, otherwise return default
    return ( $file_ext['ext'] ? $file : $setting->default );
}

function virtual_conference_sanitize_select( $input, $setting ) {
  
  // Ensure input is a slug.
  $input = sanitize_key( $input );
  
  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( $setting->id )->choices;
  
  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}


function virtual_conference_sanitize_choices( $input, $setting ) {
    global $wp_customize;
 
    $control = $wp_customize->get_control( $setting->id );
 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}


function virtual_conference_sanitize_google_fonts( $input, $setting ) {

  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( $setting->id )->choices;
  
  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}

function virtual_conference_sanitize_array( $value ){    
    if ( is_array( $value ) ) {
    foreach ( $value as $key => $subvalue ) {
      $value[ $key ] = esc_attr( $subvalue );
    }
    return $value;
  }
  return esc_attr( $value );    
}

function virtual_conference_sanitize_script( $script_textarea )
{
    $allowed_html = array(
        'script' => array(
            'async' => array(),
            'src' => array()
        )
    );
    return wp_kses( $script_textarea, $allowed_html );
}
function virtual_conference_sanitize_ifram( $iframe_textarea )
{
    $allowed_html = array(
        'iframe' => array(
            'src' => array(),
            'width' => array(),
            'height' => array(),
        )
    );
    return wp_kses( $iframe_textarea, $allowed_html );
}

function virtual_conference_sanitize_hex_color( $color ) {
  if ( '' === $color ) {
    return '';
  }

  // 3 or 6 hex digits, or the empty string.
  if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
    return $color;
  }

  return NULL;
}



function virtual_conference_date_time_sanitization( $input, $setting ) {
  $datetimeformat = 'Y-m-d';

  if ( $setting->manager->get_control( $setting->id )->include_time ) {
    $datetimeformat = 'Y-m-d H:i:s';
  }

  $date = DateTime::createFromFormat( $datetimeformat, $input );

  if ( $date === false ) {
    $date = DateTime::createFromFormat( $datetimeformat, $setting->default );
  }
  
  return $date->format( $datetimeformat );
}

/**
 * Sanitize date time value
 * @param $input
 * @return string
 */
function virtual_conference_sanitize_time( $input ) {
   $date = new DateTime( $input );
   return $date->format('h:i A');
}


// Sanitize Number Range
function virtual_conference_sanitize_number_range( $number, $setting ) {
    $atts = $setting->manager->get_control( $setting->id )->input_attrs;
    $min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
    $max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
    $step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

    return ( $min <= $number && $number <= $max ) ? $number : $setting->default;
}
function sanitize_text( $string ) {
	global $allowedtags;
	return wp_kses( $string , $allowedtags );
}