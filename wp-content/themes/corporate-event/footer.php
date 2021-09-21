<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Corporate_Event
 */
?>

</div><!-- #content -->


<footer class="footer">
 <div class="container">
  
  <div class="footer-widget-wrapper">
    <?php 
for ( $i = 1 ;  $i < 5 ;  $i++ ) {
    ?>
      <div class="f-block">
        <?php 
    dynamic_sidebar( 'footer-' . $i . '' );
    ?>
      </div>
    <?php 
}
?>  
  </div>


  <div class="site-info">

    <div class="copyright">
      <?php 
?>


              <?php 
esc_html_e( '© Copyright ', 'corporate-event' );
echo  date( 'Y' ) ;
?>
                 <a href="<?php 
echo  esc_url( home_url( '/' ) ) ;
?>" rel="home"><?php 
esc_html_e( 'VANJ', 'corporate-event' );
?></a> | 

                 <?php 
esc_html_e( 'Contact:', 'corporate-event' );
?> <a href="<?php 
echo  esc_url( 'https://wpeventpartners.com/' ) ;
?>" target="_blank"  rel="nofollow"><?php 
esc_html_e( 'conf@vanj.jp', 'corporate-event' );
?></a>
                 <br>


       <?php 
?>
    </div>





    <?php 
$social_media_array = get_theme_mod( 'corporate_event_social_media', 'facebook' );
?>

    <?php 

if ( !empty($social_media_array) && is_array( $social_media_array ) ) {
    ?>

      <div class="social-icons">
                        <ul class="list-inline">
                            <?php 
    foreach ( $social_media_array as $value ) {
        $key_classes = $value['social_media_repeater_class'];
        $class = str_replace( " ", "-", strtolower( $key_classes ) );
        $i_tag_class = 'icon-' . $class;
        ?>
                                <li class="<?php 
        echo  esc_attr( strtolower( $class ) ) ;
        ?>">
                                    <a href="<?php 
        echo  esc_url( $value['social_media_link'] ) ;
        ?>" target="_blank">
                                        <i class="<?php 
        echo  esc_attr( $i_tag_class ) ;
        ?>"></i>
                                    </a>
                                </li>
                            <?php 
    }
    ?>
                        </ul>
                    </div>

    <?php 
}

?>

  </div>







</div>
</footer>



</div><!-- #page -->

<?php 
wp_footer();
?>

</body>
</html>