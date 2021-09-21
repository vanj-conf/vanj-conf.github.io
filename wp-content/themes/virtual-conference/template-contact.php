<?php // Template Name: Contact ?>
<?php get_header(); ?>

<div class="contact-block">
	<div class="container">
		<div class="contact-holder">
			<div class="contact-info">
				<h3 class="main-title"><?php esc_html_e( "Contact Info", 'virtual-conference' ); ?></h3>
			</div>
			<div class="contact-form-holder">
				<h3 class="main-title"><?php esc_html_e( "Get In Touch", 'virtual-conference' ); ?></h3>
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>