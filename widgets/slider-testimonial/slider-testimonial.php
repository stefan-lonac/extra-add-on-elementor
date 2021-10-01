<?php

class extreAO_slider_testimonial_Widget extends \Elementor\Widget_Base {
 
    public $PluginName;

    public function get_name() {
        return 'extraAO-carousel-testimonial';
    }
 
    public function get_title() {
        return __( 'extraAO Carousel Testimonial', $PluginName );
    }
 
    public function get_icon() {
        return 'fa fa-sliders';
    }
 
    public function get_categories() {
        return [ 'general' ];
    }
 
    protected function _register_controls() {
 
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
 
        $repeater = new \Elementor\Repeater();

            // Image
            $repeater->add_control(
                'list_image',
                [
                    'label' => __( 'Choose Image', $PluginName ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $repeater->add_control(
                'show_hide_image',
                [
                    'label' => __( 'Show/Hide mage', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', $PluginName ),
                    'label_off' => __( 'Hide', $PluginName ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'separator' => 'before',
                ]
            );// END: Image

            // Title
            $repeater->add_control(
                'list_title', [
                    'label' => __( 'Slider Title', $PluginName ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Slider Title' , $PluginName ),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'show_hide_title',
                [
                    'label' => __( 'Show/Hide Title', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', $PluginName ),
                    'label_off' => __( 'Hide', $PluginName ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'separator' => 'before',
                ]
            );// END: Title

            // Subtitle
            $repeater->add_control(
                'list_subtitle', [
                    'label' => __( 'Slider Subtitle', $PluginName ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Slider Subtitle' , $PluginName ),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'show_hide_subtitle',
                [
                    'label' => __( 'Show/Hide Subtitle', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', $PluginName ),
                    'label_off' => __( 'Hide', $PluginName ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'separator' => 'before',
                ]
            );// END: Subtitle


            // Slider text
            $repeater->add_control(
                'show_hide_slider_text',
                [
                    'label' => __( 'Show/Hide Slider Text', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', $PluginName ),
                    'label_off' => __( 'Hide', $PluginName ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'separator' => 'before',
                ]
            );

            $repeater->add_control(
                'list_text', [
                    'label' => __( 'Slider Text', $PluginName ),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => __( 'Slider Text' , $PluginName ),
                    'label_block' => true,
                ]
            );// END: Slider text


            // Bottom Image
            $repeater->add_control(
                'show_hide_bottom_image',
                [
                    'label' => __( 'Show/Hide Bottom Image', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', $PluginName ),
                    'label_off' => __( 'Hide', $PluginName ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'separator' => 'before',
                ]
            );

            $repeater->add_control(
                'list_image_star',
                [
                    'label' => __( 'Choose Image Bottom', $PluginName ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );// END: Bottom Image

    
            $this->add_control(
                'list',
                [
                    'label' => __( 'Slider List', $PluginName ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'list_title' => __( 'Title #1', $PluginName ),
                            'list_image' => __( 'Item image.', $PluginName ),
                        ],
                        [
                            'list_title' => __( 'Title #2', $PluginName ),
                            'list_image' => __( 'Item image.', $PluginName ),
                        ],
                    ],
                    'title_field' => '{{{ list_title }}}',
                ]
            );

        $this->end_controls_section();


        // ========= Style Tab Image =========
        $this->start_controls_section(
            'style_section_image',
            [
              'label' => __( 'Image', $PluginName ),
              'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'border_radius',
                [
                    'label' => __( 'Border Radius', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 50,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .extraAO-img' => 'border-radius: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'width_img',
                [
                    'label' => __( 'Width Image', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 50,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .extraAO-img' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                   

                ]
            );

            

            $this->add_responsive_control(
                'padding_img',
                [
                    'label' => __( 'Padding Image', $PluginName ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .extraAO-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],  
                ]
            );
            
            $this->add_responsive_control(
                'image_align',
                [
                    'label' => __( 'Alignment Image', $PluginName ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'flex-start' => [
                            'title' => __( 'Left', $PluginName ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', $PluginName ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'flex-end' => [
                            'title' => __( 'Right', $PluginName ),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => 'center',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .extraAO-img-align' => 'justify-content: {{VALUE}}; -webkit-justify-content: {{VALUE}}; -ms-justify-content: {{VALUE}};',
                    ],

                ]
            );

        
        $this->end_controls_section();
        // ========= END: Style Tab Image =========




        // ========= Style Tab Image Bottom =========
        $this->start_controls_section(
            'style_section_image_bottom',
            [
                'label' => __( 'Image Bottom', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'image_align_bottom',
                [
                    'label' => __( 'Alignment Image Bottom', $PluginName ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'flex-start' => [
                            'title' => __( 'Left', $PluginName ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', $PluginName ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'flex-end' => [
                            'title' => __( 'Right', $PluginName ),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => 'center',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .extraAO-img-stars-align' => 'justify-content: {{VALUE}}; -webkit-justify-content: {{VALUE}}; -ms-justify-content: {{VALUE}};',
                    ],

                ]
            );

            
            $this->add_responsive_control(
                'bootom_img_width',
                [
                    'label' => __( 'Width Bottom Image', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 50,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .extraAO-img-stars' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );


            $this->add_responsive_control(
                'bootom_img_padding',
                [
                    'label' => __( 'Padding Bottom Image', $PluginName ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .extraAO-img-stars' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],

                ]
            );

        $this->end_controls_section();
        // ========= END: Style Tab Image Bottom =========




        // ========= Arrows =========
        $this->start_controls_section(
            'style_section_arrows',
            [
              'label' => __( 'Arrows', $PluginName ),
              'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
            $this->add_control(
                'show_hide_arrows',
                [
                    'label' => __( 'Show or Hide Arrows', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'true',
                    'options' => [
                        'true'  => __( 'Show', $PluginName ),
                        'false' => __( 'Hide', $PluginName ),
                    ],
                ]
            );

            $this->add_responsive_control(
                'arrow_color',
                [
                    'label' => __( 'Arrow Color', $PluginName ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .owl-nav button span' => 'color: {{VALUE}}',
                    ],
                    'separator' => 'before',

                ]
            );

            $this->add_responsive_control(
                'size_arrow',
                [
                    'label' => __( 'Size Of Arrows', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => -1000,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 50,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .owl-nav button span' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],

                ]
            );
            
            $this->add_responsive_control(
                'arrow_position_bottom',
                [
                    'label' => __( 'Arrows Position', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => -1000,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 50,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .owl-nav button' => 'top: {{SIZE}}{{UNIT}};',
                    ],

                ]
            );

            $this->add_responsive_control(
                'arrow_position_previous',
                [
                    'label' => __( 'Arrows Position Previous', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => -1000,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .owl-prev' => 'left: {{SIZE}}{{UNIT}};',
                    ],

                ]
            );

            $this->add_responsive_control(
                'arrow_position_next',
                [
                    'label' => __( 'Arrows Position Next', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .owl-next' => 'right: {{SIZE}}{{UNIT}};',
                    ],

                ]
            );
            
            

        $this->end_controls_section();
        // ========= END: Arrows =========



        // ========= Content Inner =========
        $this->start_controls_section(
            'style_section_content_inner',
            [
                'label' => __( 'Content Inner', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'width_content_inner',
                [
                    'label' => __( 'Width Content Inner', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 50,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .extraAO-content-slider' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );


            
            $this->add_responsive_control(
                'opaity_slide',
                [
                    'label' => __( 'Opacity Slide', $PluginName ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 1,
                    'step' => 0.1,
                    'default' => 0.6,
                    'selectors' => [
                        '{{WRAPPER}} .extraAO-content-slider .owl-item.active' => 'opacity: {{VALUE}};',
                    ],
                ],
            ); 

            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'slide_background_color',
                    'label' => __( 'Background Slide', $PluginName ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .extraAO-content-slider .owl-item',
                    'separator' => 'before',
                ]
            );


            $this->add_responsive_control(
                'margin_slide_content_inner',
                [
                    'label' => __( 'Margin Slide', $PluginName ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .extraAO-content-slider .owl-item.active' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'slide_center_box_shadow',
                    'label' => __( 'Box Shadow Slider', $PluginName ),
                    'selector' => '{{WRAPPER}} .extraAO-content-slider .owl-item.active.center',
                ]
            );

            $this->add_responsive_control(
                'slide_padding',
                [
                    'label' => __( 'Padding Slide', $PluginName ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .extraAO-content-slider .owl-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            
            $this->add_responsive_control(
                'border_radius_content_inner',
                [
                    'label' => __( 'Border Radius Slide', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .extraAO-content-slider .owl-item' => 'border-radius: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'central_slide_width',
                [
                    'label' => __( 'Central Slide Width', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 2000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 600,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .extraAO-content-slider .owl-item.active.center' => 'width: {{SIZE}}{{UNIT}}!important;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'central_slide_height',
                [
                    'label' => __( 'Central Slide Height', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 2000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 600,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .extraAO-content-slider .owl-item.active.center' => 'height: {{SIZE}}{{UNIT}}!important;',
                    ],
                ]
            );
            

            $this->add_responsive_control(
                'number_of_slides',
                [
                    'label' => __( 'Number Of Slides', $PluginName ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 10,
                    'step' => 1,
                    'default' => 3,
                ],
                
            );


            $this->add_control(
                'speed_of_slider',
                [
                    'label' => __( 'Speed Of Slides (1000 = 1s)', $PluginName ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 500,
                    'max' => 10000,
                    'step' => 1,
                    'default' => 3000,
                ],
                
            );

            $this->add_control(
                'touchDrag_slide',
                [
                    'label' => __( 'Touch Drag Slider', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'false',
                    'options' => [
                        'true'  => __( 'Yes', $PluginName ),
                        'false' => __( 'No', $PluginName ),
                    ],
                ]
            );
            

            $this->add_control(
                'mouseDrag_slide',
                [
                    'label' => __( 'Mouse Drag Slider', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'false',
                    'options' => [
                        'true'  => __( 'Yes', $PluginName ),
                        'false' => __( 'No', $PluginName ),
                    ],
                ]
            );

            $this->add_control(
                'autoplay_slide',
                [
                    'label' => __( 'Autoplay Slider', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'true',
                    'options' => [
                        'true'  => __( 'Yes', $PluginName ),
                        'false' => __( 'No', $PluginName ),
                    ],
                ]
            );

        $this->end_controls_section();    
        // ========= END: Content Inner =========




        // ========= Left Overlay =========
        $this->start_controls_section(
            'style_section_left_overlay',
            [
                'label' => __( 'Left Slide Overlay', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );


            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'overlay_left_color_content_inner',
                    'label' => __( 'Overlay Left Background', $PluginName ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .extraAO-content-slider .opacity-left',
                ]
            );


        
        $this->end_controls_section();  
        // ========= END: Left Overlay =========




        // ========= END: Right Overlay =========
        $this->start_controls_section(
            'style_section_right_overlay',
            [
                'label' => __( 'Right Slide Overlay', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );


            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'overlay_right_color_content_inner',
                    'label' => __( 'Overlay Right Background', $PluginName ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .extraAO-content-slider .opacity-right',
                ]
            );


        $this->end_controls_section();
        // ========= END: Right Overlay =========




        // ========= Title =========
        $this->start_controls_section(
            'style_section_title',
            [
                'label' => __( 'Title', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );


            $this->add_responsive_control(
                'title_text_size',
                [
                    'label' => __( 'Margin Title', $PluginName ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .extraAO-h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'title_style',
                    'label' => __( 'Title Text Style', $PluginName ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .extraAO-h3',
                ]
            );

            $this->add_responsive_control(
                'title_color',
                [
                    'label' => __( 'Title Text Color', $PluginName ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .extraAO-h3' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'title_align',
                [
                    'label' => __( 'Title Alignment', $PluginName ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'flex-start' => [
                            'title' => __( 'Left', $PluginName ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', $PluginName ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'flex-end' => [
                            'title' => __( 'Right', $PluginName ),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => 'center',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .extraAO-title-align' => 'justify-content: {{VALUE}}; -webkit-justify-content: {{VALUE}}; -ms-justify-content: {{VALUE}};',
                    ],

                ]
            );


        $this->end_controls_section();
        // ========= END: Title =========




        // ========= END: Subtitle =========
        $this->start_controls_section(
            'style_section_subtitle',
            [
                'label' => __( 'Subtitle', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'margin_subtitle',
                [
                    'label' => __( 'Margin Subtitle', $PluginName ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .extraAO-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'subtitle_style',
                    'label' => __( 'Subtitle Text Style', $PluginName ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .extraAO-subtitle',
                ]
            );

            $this->add_responsive_control(
                'subtitle_color',
                [
                    'label' => __( 'Subtitle Text Color', $PluginName ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .extraAO-subtitle' => 'color: {{VALUE}}',
                    ],
                ]
            );

            
            $this->add_responsive_control(
                'subtitle_align',
                [
                    'label' => __( 'Subtitle Alignment', $PluginName ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'flex-start' => [
                            'title' => __( 'Left', $PluginName ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', $PluginName ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'flex-end' => [
                            'title' => __( 'Right', $PluginName ),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => 'center',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .extraAO-subtitle-align' => 'justify-content: {{VALUE}}; -webkit-justify-content: {{VALUE}}; -ms-justify-content: {{VALUE}};',
                    ],
                ]
            );

        $this->end_controls_section();
        // ========= END: Subtitle =========




        // ========= Text =========
        $this->start_controls_section(
            'style_section_text',
            [
                'label' => __( 'Text', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'padding_text',
                [
                    'label' => __( 'Padding Text', $PluginName ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .extraAO-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );


            $this->add_responsive_control(
                'text_align',
                [
                    'label' => __( 'Alignment Text', $PluginName ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', $PluginName ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', $PluginName ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', $PluginName ),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => 'center',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .extraAO-text' => 'text-align: {{VALUE}};',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'text_style',
                    'label' => __( 'Text Style', $PluginName ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .extraAO-text',
                ]
            );

        $this->end_controls_section();
        // ========= END: Text =========


    }
     
    protected function render() {
        // generate the final HTML on the frontend using PHP
        $settings = $this->get_settings_for_display();
    
        if ( $settings['list'] ) {
            
            ?>


                <div class="owl-carousel owl-theme extraAO-content-slider">
                    <?php $i = 0; ?>
                    <?php foreach (  $settings['list'] as $item ) { ?>
                            
                        <div class="item extraAO-item-slider">
                        
                            <div class="sl__flex sl__dc">

                                <?php if( $item['show_hide_image'] == 'yes' ) { ?>

                                    <div class="sl__flex extraAO-img-align">
                                        <img class="d-block extraAO-img" src="<?php echo $item['list_image']['url']; ?>" alt="<?php echo $item['list_title']; ?>" />
                                    </div>

                                <?php } ?>


                                <?php if( $item['show_hide_title'] == 'yes' ) { ?>

                                    <div class="sl__flex extraAO-title-align">
                                        <h3 class="extraAO-h3"><?php echo $item['list_title']; ?></h3>
                                    </div>

                                <?php } ?>


                                <?php if( $item['show_hide_subtitle'] == 'yes' ) { ?>  

                                    <div class="sl__flex extraAO-subtitle-align">
                                        <p class="extraAO-subtitle"><?php echo $item['list_subtitle']; ?></p>
                                    </div>

                                <?php } ?>
                                

                                <?php if( $item['show_hide_slider_text'] == 'yes' ) { ?>  

                                    <div class="extraAO-text">
                                        <?php echo $item['list_text']; ?>
                                    </div>

                                <?php } ?> 


                                <?php if( $item['show_hide_bottom_image'] == 'yes' ) { ?>  

                                    <div class="sl__flex extraAO-img-stars-align">
                                        <img class="d-block extraAO-img-stars" src="<?php echo $item['list_image_star']['url']; ?>" alt="<?php echo $item['list_title']; ?>" />
                                    </div>

                                <?php } ?>   

                            </div>
                        
                        </div>

                        <?php $i++; ?>
                    <?php } ?>
                </div>


            <script>
                (function($){

                    $(document).ready(function(){

                        $('.owl-carousel').owlCarousel({
                            loop:true,
                            // margin:10,
                            nav: true,
                            dots:false,
                            center: true,
                            autoplay: <?php  echo $settings['autoplay_slide'];  ?>,
                            touchDrag: <?php  echo $settings['touchDrag_slide'];  ?>,
                            mouseDrag: <?php  echo $settings['mouseDrag_slide'];  ?>,
                            autoplayTimeout: <?php echo $settings['speed_of_slider']; ?>,
                            responsive:{
                                0:{
                                    items:<?php if ($settings['number_of_slides_mobile']) {
                                        echo($settings['number_of_slides_mobile']);
                                    } else {
                                        echo 1;
                                    } ?>
                                },
                                425:{
                                    items:<?php 
                                        if ($settings['number_of_slides_tablet']) {
                                            echo($settings['number_of_slides_tablet']);
                                        } else {
                                            echo 2;
                                        }
                                        ?>
                                },
                                800:{
                                    items:<?php 
                                        if ($settings['number_of_slides']) {
                                            echo($settings['number_of_slides']);
                                        } else {
                                            echo 3;
                                        }
                                    ?>
                                },
                            }
                        });


                        // Opacity left
                        $('.owl-stage').find('.active:eq(0)').addClass('opacity-left');

                        // Opacity right
                        $('.owl-stage').find('.active:eq(2)').addClass('opacity-right');


                        // ON LOOP
                        $('.owl-carousel').on('translate.owl.carousel', function(e){
                            idx = e.item.index;
                            // Opacity Center
                            if($('.owl-item').eq(idx)) {
                                $('.owl-item').eq(idx).removeClass('opacity-left');
                                $('.owl-item').eq(idx).removeClass('opacity-right');
                            } else {
                                $('.owl-item').eq(idx-1).removeClass('opacity-right');
                            }

                            // Opacity Left
                            if($('.owl-item').eq(idx-1)) {
                                $('.owl-item').eq(idx-1).addClass('opacity-left');
                            } else {
                                $('.owl-item').eq(idx-1).removeClass('opacity-right');
                            }

                            // Opacity right
                            if($('.owl-item').eq(idx+1)) {
                                $('.owl-item').eq(idx+1).addClass('opacity-right');
                            } else {
                                $('.owl-item').eq(idx+1).removeClass('opacity-left');
                            }
                        });


                        $('.owl-nav button').click(function() {

                            $('.owl-item').each(function(){

                                var width = $(window).width();
                                $(window).resize(function () { 

                                    if (width >= 769) {

                                        // Opacity left
                                        if($(this).hasClass('active')) {
                                            $('.owl-stage').find('.active:eq(0)').addClass('opacity-left');
                                        } else {
                                            $('.owl-stage').find('.active:eq(2)').removeClass('opacity-left');
                                        }

                                        // Opacity right
                                        if($(this).hasClass('active')) {
                                            $('.owl-stage').find('.active:eq(2)').addClass('opacity-right');
                                        } else {
                                            $('.owl-stage').find('.active:eq(0)').removeClass('opacity-right');
                                        }

                                    } else {
                                        $('.owl-stage').find('.center').removeClass('opacity-left');
                                        $('.owl-stage').find('.center').removeClass('opacity-right');
                                    }

                                });

                            });  

                        });

                        

                    });

                })(jQuery);
            </script>
            <?php
        }

    }
}
