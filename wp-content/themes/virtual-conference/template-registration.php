<?php // Template Name: Registration ?>
<?php get_header(); ?>

<div class="registration-block">
	<div class="container">
		<div class="registration-holder">
			
			<div class="registration-form-holder">
				<h3 class="main-title"><?php esc_html_e("Registration", 'virtual-conference'); ?></h3>
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>