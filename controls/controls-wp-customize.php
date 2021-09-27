<?php 


    // ============== It is added directly to Customize and has nothing to do with Elementor. Works on every Wordpress site! ==============
    // Wordpress Custom Breakpoint Field
    function extraAO_breakpoint_register( $wp_customize ) {

        $themeName = 'extraAO_breakpoint_theme';

        $wp_customize->add_section( 'extraAO_breakpoint_section' , array(
            'title'      => __( 'extraAO Breakpoint', $themeName ),
            'priority'   => 30,
        ));

        // Field For Endpoint Responsive 1
        $wp_customize->add_setting( 'extraAO_breakpoint', array());
        $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'extraAO_breakpoint_control',
                array(
                    'label'      => __( 'Screen 1 Width', $themeName ),
                    'section'    => 'extraAO_breakpoint_section',
                    'settings'   => 'extraAO_breakpoint',
                    'type'       => 'number',
                    'priority'   => 1,
                )
            )
        );

        // Field For Grid Responsive 1
        $wp_customize->add_setting( 'extraAO_breakpoint_grid', array());
        $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'extraAO_breakpoint_control_grid',
                array(
                    'label'      => __( 'Width Grid', $themeName ),
                    'section'    => 'extraAO_breakpoint_section',
                    'settings'   => 'extraAO_breakpoint_grid',
                    'type'       => 'number',
                    'priority'   => 2,
                )
            )
        );



        // Field For Endpoint Responsive 2
        $wp_customize->add_setting( 'extraAO_breakpoint_2', array());
        $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'extraAO_breakpoint_control_2',
                array(
                    'label'      => __( 'Screen 2 Width', $themeName ),
                    'section'    => 'extraAO_breakpoint_section',
                    'settings'   => 'extraAO_breakpoint_2',
                    'type'       => 'number',
                    'priority'   => 3,
                )
            )
        );

        // Field For Grid Responsive 2
        $wp_customize->add_setting( 'extraAO_breakpoint_grid_2', array());
        $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'extraAO_breakpoint_control_grid_2',
                array(
                    'label'      => __( 'Width Grid 2', $themeName ),
                    'section'    => 'extraAO_breakpoint_section',
                    'settings'   => 'extraAO_breakpoint_grid_2',
                    'type'       => 'number',
                    'priority'   => 4,
                )
            )
        );


        // Field For Endpoint Responsive 3
        $wp_customize->add_setting( 'extraAO_breakpoint_3', array());
        $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'extraAO_breakpoint_control_3',
                array(
                    'label'      => __( 'Screen 3 Width', $themeName ),
                    'section'    => 'extraAO_breakpoint_section',
                    'settings'   => 'extraAO_breakpoint_3',
                    'type'       => 'number',
                    'priority'   => 5,
                )
            )
        );

        // Field For Grid Responsive 3
        $wp_customize->add_setting( 'extraAO_breakpoint_grid_3', array());
        $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'extraAO_breakpoint_control_grid_3',
                array(
                    'label'      => __( 'Width Grid 3', $themeName ),
                    'section'    => 'extraAO_breakpoint_section',
                    'settings'   => 'extraAO_breakpoint_grid_3',
                    'type'       => 'number',
                    'priority'   => 6,
                )
            )
        );


        // ..repeat ->add_setting() and ->add_control() for extraAO_breakpoint_section
    }
    add_action( 'customize_register', 'extraAO_breakpoint_register' );




    // Add Class To The Body Of PAGE
    $optionsCalss = get_theme_mod( "extraAO_breakpoint" );
    function wp_body_classes( $classes ) {
        $classes[]  = 'extraAO-breakpoint-' . get_theme_mod( "extraAO_breakpoint" );
        $classes[] .= 'extraAO-breakpoint2-' . get_theme_mod( "extraAO_breakpoint_2" );
        $classes[] .= 'extraAO-breakpoint3-' . get_theme_mod( "extraAO_breakpoint_3" );
          
        return $classes;
    }
    add_filter( 'body_class','wp_body_classes' );


    // Add style to the FOOTER or if you need in header change **wp_footer** to **wp_head**
    function mytheme_customize_css() {
        /* Field For Grid Responsive 1 */
        $breakpointResponsive   = get_theme_mod( "extraAO_breakpoint" );
        $breakpointGrid         = get_theme_mod( "extraAO_breakpoint_grid" );

        /* Field For Grid Responsive 2 */
        $breakpointResponsive2   = get_theme_mod( "extraAO_breakpoint_2" );
        $breakpointGrid2         = get_theme_mod( "extraAO_breakpoint_grid_2" );

        /* Field For Grid Responsive 3 */
        $breakpointResponsive3   = get_theme_mod( "extraAO_breakpoint_3" );
        $breakpointGrid3         = get_theme_mod( "extraAO_breakpoint_grid_3" );


        ?>
            <style type="text/css">
                /* Field For Grid Responsive 1 */
                @media screen and (max-width: <?php echo $breakpointResponsive . 'px' ?>) {

                    <?php echo '.extraAO-breakpoint-' . $breakpointResponsive; ?> .site-content { 
                        max-width: <?php echo $breakpointGrid . 'px' ?>; 
                        margin: 0 auto;
                    }

                }

                /* Field For Grid Responsive 2 */
                @media screen and (max-width: <?php echo $breakpointResponsive2 . 'px' ?>) {

                    <?php echo '.extraAO-breakpoint2-' . $breakpointResponsive2; ?> .site-content { 
                        max-width: <?php echo $breakpointGrid2 . 'px' ?>; 
                        margin: 0 auto;
                    }

                }



                /* Field For Grid Responsive 3 */
                @media screen and (max-width: <?php echo $breakpointResponsive3 . 'px' ?>) {

                    <?php echo '.extraAO-breakpoint3-' . $breakpointResponsive3; ?> .site-content { 
                        max-width: <?php echo $breakpointGrid3 . 'px' ?>; 
                        margin: 0 auto;
                    }

                }

            </style>
        <?php
    }
    add_action( 'wp_footer', 'mytheme_customize_css');
    // ============== It is added directly to Customize and has nothing to do with Elementor. Works on every Wordpress site! ==============