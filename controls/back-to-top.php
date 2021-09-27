<?php 
// Register Controls BackToTop
function extraAO_backtotop_register( $wp_customize ) {

    $themeName = 'extraAO_backtotop_theme';

    $wp_customize->add_section( 'extraAO_backtotop_section' , array(
        'title'      => __( 'extraAO Back to Top', $themeName ),
        'priority'   => 30,
    ));

    // Field: Text
    $wp_customize->add_setting( 'extraAO_backtotop_text', array());
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'extraAO_backtotop_control_text',
            array(
                'label'      => __( 'Text', $themeName ),
                'section'    => 'extraAO_backtotop_section',
                'settings'   => 'extraAO_backtotop_text',
                'type'       => 'text',
                'priority'   => 1,
            )
        )
    );
    // Field: Text ** Show/Hide **
    $wp_customize->add_setting( 'extraAO_backtotop_text_on_off',
        array(
            'default' => 1,
            // 'transport' => 'refresh',
            // 'sanitize_callback' => 'skyrocket_switch_sanitization'
        )
    );
    
    $wp_customize->add_control( new WP_Customize_Control( 
        $wp_customize,
        'extraAO_backtotop_text_on_off',
            array(
                'label' => __( 'Text Show/Hide', $themeName ),
                'description' => esc_html__( 'Check if you need to show text' ),
                'section'  => 'extraAO_backtotop_section',
                'priority' => 10, // Optional. Order priority to load the control. Default: 10
                'type'=> 'checkbox',
            )
        )
    );


    // Field: Icon
    $wp_customize->add_setting( 'extraAO_backtotop_icon',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'extraAO_backtotop_icon',
        array(
            'label' => __( 'Icon', $themeName ),
            'description' => esc_html__( 'This is the description for the Image Control' ),
            'section' => 'extraAO_backtotop_section',
            'button_labels' => array( // Optional.
                'select' => __( 'Select Image' ),
                'change' => __( 'Change Image' ),
                'remove' => __( 'Remove' ),
                'default' => __( 'Default' ),
                'placeholder' => __( 'No image selected' ),
                'frame_title' => __( 'Select Image' ),
                'frame_button' => __( 'Choose Image' ),
            )
        )
    ));


    // ..repeat ->add_setting() and ->add_control() for extraAO_backtotop_register
}
add_action( 'customize_register', 'extraAO_backtotop_register' );



// HYML button
function back_to_top_html() { 
    $backToTop_Text          = get_theme_mod( "extraAO_backtotop_text" );
    $backToTop_Text_on_off   = get_theme_mod( "extraAO_backtotop_text_on_off" );

    $backToTop_Icon   = get_theme_mod( "extraAO_backtotop_icon" );

    ?>

        <a class="extraAO-back-to-top" href="#top">
            
            <?php echo  $bttActivate; ?>
            <img src="<?php echo  $backToTop_Icon; ?>" alt="">

            <?php
            if ($backToTop_Text_on_off == 1) {
                echo  $backToTop_Text; 

            }
            ?>
                
            
        </a>

    <?php

}
add_action( 'wp_footer', 'back_to_top_html');

?>


