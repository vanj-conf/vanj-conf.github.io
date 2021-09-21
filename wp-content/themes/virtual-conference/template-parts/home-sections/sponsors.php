<?php if( class_exists('WepPlugin') && get_theme_mod( 'sponsor_display_option', true ) ) { ?>
	<div class="sponsor-wrapper spacer">
		<div class="container">
			<?php $sponserHeading = get_theme_mod('heading_for_sponsor', 'Sponsor'); ?>
				<?php if ($sponserHeading) { ?>
					<h3 class="title title-1"><?php echo esc_html($sponserHeading); ?></h3>
				<?php } ?>
			<?php do_action('WEP_sponsor_add_layouts'); ?>
		</div>
	</div>
<?php }