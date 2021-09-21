<?php

$aboutHeading = get_theme_mod('heading_for_about_us');

$aboutPage = get_page_by_path(get_theme_mod('about_us_pages'));


if(!empty($aboutPage)):
    global $post;
    $post = get_post($aboutPage);
    setup_postdata( $post );
    ?>

    <section class="home-section about-layout-1 spacer" id="about">
        <div class="container">
            <div class="about-holder">
                <?php if(has_post_thumbnail()): ?>
                    <div class="about-item">
                        <div class="img-holder">
                            <img src="<?php echo esc_url(the_post_thumbnail_url()); ?>" >
                        </div>
                    </div>
                <?php endif; ?>
                <div class="about-item">
                    <div class="about-content">
                        <div class="main-title">
                            <?php if ( $aboutHeading ) { ?>
                                <h2 class="title title-1"><?php echo esc_html( $aboutHeading ); ?></h2>
                            <?php } ?>
                        </div>
                        <?php the_excerpt(); ?>
                        <a class="btn btn-secondary" href="<?php esc_url(the_permalink( $aboutPage ));?>"><?php esc_html_e( 'Read More', 'corporate-event' ); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    wp_reset_postdata();
endif
?>
