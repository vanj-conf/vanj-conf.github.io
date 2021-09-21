<?php

if( class_exists( 'WP_Customize_Control' ) ) {

    class Virtual_Conference_Custom_Text extends WP_Customize_Control {
        public $type = 'customtext';

        public function render_content() {
        ?>
            <label>
                <h2 class="customize-text_editor"><?php echo wp_kses_post( $this->label ); ?></h2>
                <span class="customize-text_editor_desc">
                    <?php echo wp_kses_post( $this->description ); ?>
                </span>
            </label>
        <?php
        }
    }
}