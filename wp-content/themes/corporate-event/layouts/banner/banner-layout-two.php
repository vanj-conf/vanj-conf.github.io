<section class="banner-layout-<?php echo esc_attr( $class ); ?>" id="banner">
	<div class="item">
		<div class="container">
				<div class="row">
					<div class="col-lg-7">
						<div class="caption">
							<?php if( $countdown_show_hide ) : ?>
								<div id="clockdiv"></div>
							<?php endif; ?>
							
							<div class="title">
								<?php $event_title = get_theme_mod( 'event_title', '' ); ?>
                        		<?php echo esc_html( $event_title ); ?>
							</div>
							
							<?php
		                        $display_start_date = get_theme_mod( 'hide_show_banner_start_date', true );
								$display_end_date = get_theme_mod( 'hide_show_banner_end_date', true );
								$display_start_time = get_theme_mod( 'hide_show_banner_start_time', true );
								$display_end_time = get_theme_mod( 'hide_show_banner_end_time', true );
								$start_time = get_theme_mod( 'start_time', '' );
								$end_time = get_theme_mod( 'end_time', '' );
								$start_date = get_theme_mod( 'start_date', '' );
								$end_date = get_theme_mod( 'end_date', '' );
		                    ?>
		                    
							<?php if( $display_start_date || $display_end_date || $display_start_time || $display_end_time ) : ?>
		                        <div class="date-location">

		                            <?php if( $display_start_date || $display_end_date ) : ?>
		                                <div class="date">
		                                    <?php
		                                        $date_format = get_option('date_format');
		                                        $date_format = ! empty( $date_format ) ? $date_format : 'F j, Y';
		                                    ?>

		                                    <?php if( $display_start_date && $start_date ) { ?>
		                                        <i class="icon-calendar"></i> <?php echo date(''.$date_format.'', strtotime( $start_date ) ); ?>
		                                    <?php } ?>

		                                    <?php if( $display_end_date && $end_date && $end_date != $start_date ) { ?>
		                                        <?php if( $start_date && $display_start_date ) { echo "-"; } ?>
		                                        <span aria-hidden="true"></span> <?php echo date(''.$date_format.'', strtotime( $end_date ) ); ?>
		                                    <?php } ?>
		                                </div>
		                            <?php endif; ?>

		                            <?php if( $display_start_time || $display_end_time ) { ?>
		                                <div class="time">
		                                    <?php
		                                        $time_format = get_option('time_format');
		                                        $time_format = ! empty( $time_format ) ? $time_format : 'h:i A';
		                                    ?>
		                                    <i class="icon-clock"></i>
		                                    <?php if( $display_start_time && $start_time ) { ?>
		                                        <span class="" aria-hidden="true"></span> <?php echo date(''.$time_format.'', strtotime( $start_time ) ); ?>
		                                    <?php } ?>

		                                    <?php if( $display_end_time && $end_time ) { ?>
		                                        <?php if( $start_time && $display_start_time ) { echo "-"; } ?>
		                                        <span class="" aria-hidden="true"></span> <?php echo date(''.$time_format.'', strtotime( $end_time ) ); ?>
		                                    <?php } ?>
		                                    
		                                </div>
		                            <?php } ?>
		                            
		                        </div>
		                    <?php endif; ?>                    

		                    <?php if( $venu_show_hide ) : ?>
                                <div class="location">
								<i class="icon-location"></i> <?php echo esc_html( get_theme_mod( 'event_venue', '' ) ); ?>
                                </div>
							<?php endif; ?>
							
							<p>
                        		<?php $event_description = get_theme_mod( 'event_description', '' ); ?>
                        		<?php echo esc_html( $event_description ); ?>
							</p>
							
							<div class="group-btn">
                        <?php 
                            if(get_theme_mod( 'hide_show_cta_button_1', true )){
                                $cta_button1_for_banner = get_theme_mod('cta_1_button_label');
                                $cta_button1_link = get_theme_mod('cta_1_link');
                                if($cta_button1_for_banner && $cta_button1_link){ 
                        ?>
                            <a href="<?php echo esc_url($cta_button1_link); ?>" class="btn btn-primary cta-1">
                                <?php echo esc_html( get_theme_mod( 'cta_1_button_label', '' ) ); ?>
                            </a>
                        <?php } } ?>
						<?php if(get_theme_mod( 'hide_show_cta_button_2', true )){
                            $cta_button2_for_banner = get_theme_mod('cta_2_button_label');
                            $cta_button2_link = get_theme_mod('cta_2_link');
                            if($cta_button2_for_banner && $cta_button2_link){
                        ?>
                            <a href="<?php echo esc_url($cta_button2_link); ?>" class="btn btn-secondary cta-2">
                                <?php echo esc_html( get_theme_mod( 'cta_2_button_label', '' ) ); ?>
                            </a>
                             <?php } } ?>
                    </div>
						</div>
					</div>

					<div class="col-lg-5">
						<div class="img-holder">
							<?php
							$image = get_header_image();
							if ( $image ) {
								?>
								<img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_attr_e( 'Header Image', 'corporate-event' ); ?>">
							<?php } ?>
						</div>
					</div>
				</div>
		</div>
	</div>
</section>

<div id="primary"></div>