<?php if( class_exists('WepPlugin') && get_theme_mod( 'testimonial_display_option', true ) ) { ?>
<section class="testimonials-wrapper spacer">
        <div class="container">
            <?php $testimonialHeading = get_theme_mod( 'heading_for_testimonial', '' ); ?>

            <?php if($testimonialHeading) { ?>
                <h3 class="title title-1"><?php echo esc_html($testimonialHeading); ?></h3>
            <?php } ?>

            <?php do_action('WEP_testimonial_add_layouts'); ?>
        </div>
</section>
<?php }