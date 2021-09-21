<?php if( get_theme_mod( 'counter_show_hide_option', true ) ) { ?>
<section class="spacer wep-counter-wrapper">
	<div class="container">
		<div class="wep-counter-wrapper-holder">
			<div class="wep-counter-wrapper-item">
			<?php
                $heading_for_counter = get_theme_mod('heading_for_counter');
                if($heading_for_counter){
            ?>
				<h3><?php echo $heading_for_counter; ?></h3>
			<?php } ?>
			<?php
                $content_for_counter = get_theme_mod('content_for_counter');
                if($content_for_counter){
            ?>
				<p><?php echo $content_for_counter; ?></p>
			<?php } ?>
			<?php
                $counter_button_label = get_theme_mod('counter_button_label');
				$counter_link = get_theme_mod('counter_link');
                if($counter_button_label && $counter_link){
            ?>
			
				<a href="<?php echo $counter_link; ?>" class="btn btn-primary"><?php echo $counter_button_label = get_theme_mod('counter_button_label');?></a>
			<?php } ?>
			</div>
			<div class="wep-counter-wrapper-item">
				<div class="wep-counter">
					<?php
					$counters = get_theme_mod( 'counter_display_option', '' );
					if ( ! empty( $counters ) && is_array( $counters ) ) :
						foreach ( $counters as $value ) {
							$count_num = $value['counter_number'];
							$count_text = $value['counter_text'];
							?>
							<div class="wep-counter-number-text">
								<div class="wep-counter-number"><?php echo $count_num; ?></div>
								<div class="wep-counter-text"><?php echo $count_text; ?></div>
							</div>
						<?php } endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php }