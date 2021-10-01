<?php 

class extreAO_slider_posts_Widget extends \Elementor\Widget_Base { 

    public $PluginName;

    public function get_name() {
        return 'extraAO-carousel-posts';
    }
 
    public function get_title() {
        return __( 'extraAO Posts Slider', $PluginName );
    }
    
    public function get_icon() {
        return 'fab fa-slideshare';
    }
 
    public function get_categories() {
        return [ 'general' ];
    }

    

    protected function _register_controls() {

        // ============ CONTENT ============
            // ******* Slider Controls *******
            $this->start_controls_section(
                'slider_controls_section',
                [
                    'label' => __( 'Slider Controls', $PluginName ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

                $this->add_control(
                    'loop_posts_slide',
                    [
                        'label' => __( 'Loop Slider', $PluginName ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'true',
                        'options' => [
                            'true'  => __( 'Yes', $PluginName ),
                            'false' => __( 'No', $PluginName ),
                        ],
                    ]
                );
                
                $this->add_control(
                    'mousewheel_posts_slide',
                    [
                        'label' => __( 'Mousewheel Slider', $PluginName ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'true',
                        'options' => [
                            'true'  => __( 'Yes', $PluginName ),
                            'false' => __( 'No', $PluginName ),
                        ],
                    ]
                );

                $this->add_control(
                    'keyboard_posts_slide',
                    [
                        'label' => __( 'Keyboard Slider', $PluginName ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'true',
                        'options' => [
                            'true'  => __( 'Yes', $PluginName ),
                            'false' => __( 'No', $PluginName ),
                        ],
                    ]
                );

                $this->add_control(
                    'number_of_posts_slide',
                    [
                        'label' => __( 'Number Of Slide', $PluginName ),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 1,
                        'max' => 15,
                        'step' => 1,
                        'default' => 3,
                    ],
                ); 


                $this->add_control(
                    'autoplay_posts_slide',
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


                $this->add_control(
                    'category_show_post',
                    [
                        'label' => __( 'Category', $PluginName ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'true',
                        'options' => [
                            'true'  => __( 'Yes', $PluginName ),
                            'false' => __( 'No', $PluginName ),
                        ],
                    ]
                );


                $this->add_control(
                    'date_show_post',
                    [
                        'label' => __( 'Date', $PluginName ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'true',
                        'options' => [
                            'true'  => __( 'Yes', $PluginName ),
                            'false' => __( 'No', $PluginName ),
                        ],
                    ]
                );


                $this->add_control(
                    'author_show_post',
                    [
                        'label' => __( 'Author', $PluginName ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'true',
                        'options' => [
                            'true'  => __( 'Yes', $PluginName ),
                            'false' => __( 'No', $PluginName ),
                        ],
                    ]
                );


                // Wrap all categories in a function
                function wcat2() {
                    $args = array(
                        'order' => 'ASC',
                    );
                    $cats = get_categories($args);
                    foreach($cats as $cat) {
                        $catsArray[''] = __('' . 'All' . '', $PluginName);
                        $catsArray[$cat->cat_name] = __('' . $cat->cat_name . '', $PluginName);
                    }
                    return $catsArray;
                }

                $this->add_control(
                    'categories_list_show_post',
                    [
                        'label' => __( 'Category Slider', $PluginName ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => '',
                        'options' => wcat2(),
                    ]
                );

                // $this->add_control(
                //     'categories_list_show_post',
                //     [
                //         'label' => __( 'Category Slider Test', $PluginName ),
                //         'type' => \Elementor\Controls_Manager::SELECT2,
                //         'multiple' => true,
                //         'options' => wcat2(),
                //         'default' => '',
                //     ]
                // );

                $this->add_control(
                    'orderby_post',
                    [
                        'label' => __( 'Order Posts', $PluginName ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'date',
                        'options' => [
                            'date'  => __( 'Date', $PluginName ),
                            'author' => __( 'Author', $PluginName ),
                            'title' => __( 'Title', $PluginName ),
                            'rand' => __( 'Random', $PluginName ),
                        ],
                    ]
                );
            
                $this->add_control(
                    'order_post',
                    [
                        'label' => __( 'Order', $PluginName ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'asc',
                        'options' => [
                            'asc'  => __( 'ASC', $PluginName ),
                            'desc' => __( 'DESC', $PluginName ),
                        ],
                    ]
                );

            $this->end_controls_section(); 
            // ******* END: Slider Controls *******



            // ******* Arrows *******
            $this->start_controls_section(
                'arrows_section',
                [
                    'label' => __( 'Arrows', $PluginName ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

                $this->add_responsive_control(
                    'arrows_posts_slide',
                    [
                        'label' => __( 'Arrows Slider', $PluginName ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'block',
                        'options' => [
                            'block'  => __( 'Yes', $PluginName ),
                            'none'   => __( 'No', $PluginName ),
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .swiper-button-prev' => 'display: {{VALUE}};',
                            '{{WRAPPER}} .extraAO-post-slider .swiper-button-next' => 'display: {{VALUE}};',
                        ],
                    ]
                );

            $this->end_controls_section();
            // ******* END: Arrows *******


            // ******* Pagination *******
            $this->start_controls_section(
                'pagination_section',
                [
                    'label' => __( 'Pagination', $PluginName ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

                $this->add_responsive_control(
                    'pagination_posts_slide_block',
                    [
                        'label' => __( 'Pagnation Slider', $PluginName ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'flex',
                        'options' => [
                            'flex'  => __( 'Yes', $PluginName ),
                            'none'   => __( 'No', $PluginName ),
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .extraAO-pagination' => 'display: {{VALUE}}!important;',
                        ],
                    ]
                );


            $this->end_controls_section(); 
            // ******* END: Pagination *******
        // ============ END: CONTENT ============




        // ============ Style ============
            // ******* Image *******
            $this->start_controls_section(
                'style_post_image',
                [
                'label' => __( 'Image', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_responsive_control(
                    'height_image_post',
                    [
                        'label' => __( 'Heght', $PluginName ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 2000,
                                'step' => 1,
                            ],
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 500,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .extraAO-post-slide' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

            $this->end_controls_section();
            // ******* END: Image *******


            // ******* Title *******
            $this->start_controls_section(
                'style_post_title',
                [
                'label' => __( 'Title', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_responsive_control(
                    'title_color_post',
                    [
                        'label' => __( 'Color', $PluginName ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .extraAO-post-slide .extraAO-post-slide-title a' => 'color: {{VALUE}}',
                        ],    
                    ]
                );

                
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'title_style_post',
                        'label' => __( 'Style', $PluginName ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .extraAO-post-slider .extraAO-post-slide .extraAO-post-slide-title a',    
                    ]
                );

                $this->add_responsive_control(
                    'title_margin_post',
                    [
                        'label' => __( 'Margin', $PluginName ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .extraAO-post-slide .extraAO-post-slide-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                        'separator' => 'before',    
                    ]
                );

            $this->end_controls_section();
            // ******* END: Title *******


            // ******* Excerpt *******
            $this->start_controls_section(
                'style_post_excerpt',
                [
                'label' => __( 'Excerpt', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                
                
                $this->add_responsive_control(
                    'excerpt_length_of_text_post',
                    [
                        'label' => __( 'Length Of Text', $PluginName ),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 1,
                        'max' => 1000,
                        'step' => 1,
                        'default' => 200,                    
                    ],
                ); 

                $this->add_responsive_control(
                    'excerpt_color_post',
                    [
                        'label' => __( 'Color', $PluginName ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .extraAO-post-slide .extraAO-post-slide-content .extraAO-post-slide-excerpt' => 'color: {{VALUE}}',
                        ],    
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'excerpt_color_post',
                        'label' => __( 'Style', $PluginName ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .extraAO-post-slider .extraAO-post-slide .extraAO-post-slide-content .extraAO-post-slide-excerpt',    
                    ]
                );

                $this->add_responsive_control(
                    'excerpt_margin_post',
                    [
                        'label' => __( 'Margin', $PluginName ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .extraAO-post-slide .extraAO-post-slide-content .extraAO-post-slide-excerpt' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                        'separator' => 'before',    
                    ]
                );

            $this->end_controls_section();
            // ******* END: Excerpt *******



            // ******* Text *******
            $this->start_controls_section(
                'style_post_text',
                [
                'label' => __( 'Text', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );


                $this->add_responsive_control(
                    'text_align_content_post',
                    [
                        'label' => __( 'Alignment Content', $PluginName ),
                        'type' => \Elementor\Controls_Manager::CHOOSE,
                        'options' => [
                            'flex-start' => [
                                'title' => __( 'Left', $PluginName ),
                                'icon'  => 'fa fa-align-left',
                            ],
                            'center' => [
                                'title' => __( 'Center', $PluginName ),
                                'icon'  => 'fa fa-align-center',
                            ],
                            'flex-end' => [
                                'title'  => __( 'Right', $PluginName ),
                                'icon'   => 'fa fa-align-right',
                            ],
                        ],
                        'default' => 'center',
                        'toggle' => true,
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .extraAO-post-slide' => 'align-items: {{VALUE}}; -ms-flex-align: {{VALUE}}; -webkit-box-align: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'text_align_text_post',
                    [
                        'label' => __( 'Alignment Text', $PluginName ),
                        'type' => \Elementor\Controls_Manager::CHOOSE,
                        'options' => [
                            'left' => [
                                'title' => __( 'Left', $PluginName ),
                                'icon'  => 'fa fa-align-left',
                            ],
                            'center' => [
                                'title' => __( 'Center', $PluginName ),
                                'icon'  => 'fa fa-align-center',
                            ],
                            'right' => [
                                'title'  => __( 'Right', $PluginName ),
                                'icon'   => 'fa fa-align-right',
                            ],
                        ],
                        'default' => 'center',
                        'toggle' => true,
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .extraAO-post-slide .extraAO-post-slide-content' => 'text-align: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'text_position_post',
                    [
                        'label' => __( 'Position', $PluginName ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'flex-end',
                        'options' => [
                            'flex-start'    => __( 'Top', $PluginName ),
                            'center'        => __( 'Center', $PluginName ),
                            'flex-end'      => __( 'Bottom', $PluginName ),
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .extraAO-post-slide' => 'justify-content: {{VALUE}}; -webkit-justify-content: {{VALUE}}; -ms-justify-content: {{VALUE}};',
                        ],
                    ]
                );


                $this->add_responsive_control(
                    'text_padding_post',
                    [
                        'label' => __( 'Padding', $PluginName ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .extraAO-post-slide .extraAO-post-slide-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                        'separator' => 'before',
    
                    ]
                );

                $this->add_responsive_control(
                    'text_width_post',
                    [
                        'label' => __( 'Content Width', $PluginName ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 2000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'default' => [
                            'unit' => '%',
                            'size' => 100,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .extraAO-post-slide .extraAO-post-slide-content' => 'width: {{SIZE}}{{UNIT}};',
                        ],
    
                    ]
                );
                
                $this->add_group_control(
                    \Elementor\Group_Control_Background::get_type(),
                    [
                        'name' => 'text_background_post',
                        'label' => __( 'Background', $PluginName ),
                        'types' => [ 'classic', 'gradient' ],
                        'selector' => '{{WRAPPER}} .extraAO-post-slider .extraAO-post-slide .extraAO-post-slide-content',
                        'separator' => 'before',    
                    ]
                );


            $this->end_controls_section();
            // ******* END: Text *******




            // ******* Bullets *******
            $this->start_controls_section(
                'style_post_buletts',
                [
                'label' => __( 'Bullets', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_responsive_control(
                    'position_bullets_post',
                    [
                        'label' => __( 'Position', $PluginName ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'initial',
                        'options' => [
                            'absolute'  => __( 'Absolute', $PluginName ),
                            'initial'   => __( 'Default', $PluginName ),
                        ],
                    ]
                );

                // ** IF Select ABSOLUTE **
                $this->add_responsive_control(
                    'position_bullets_top_post',
                    [
                        'label' => __( 'Posiion top/bottom', $PluginName ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 2000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 100,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .swiper-pagination' => 'top: {{SIZE}}{{UNIT}};',
                        ],
                        'condition' => [
                            'position_bullets_post' => 'absolute',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'position_bullets_left_post',
                    [
                        'label' => __( 'Posiion left/right', $PluginName ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 2000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 100,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .swiper-pagination' => 'left: {{SIZE}}{{UNIT}};',
                        ],
                        'condition' => [
                            'position_bullets_post' => 'absolute',
                        ],
                    ]
                );
                // ** END: IF Select ABSOLUTE **


                // ** IF Select DEFAULT(initial) **
                $this->add_responsive_control(
                    'position_bullets_align_post',
                    [
                        'label' => __( 'Alignment Text', $PluginName ),
                        'type' => \Elementor\Controls_Manager::CHOOSE,
                        'options' => [
                            'flex-start' => [
                                'title' => __( 'Left', $PluginName ),
                                'icon'  => 'fa fa-align-left',
                            ],
                            'center' => [
                                'title' => __( 'Center', $PluginName ),
                                'icon'  => 'fa fa-align-center',
                            ],
                            'flex-end' => [
                                'title'  => __( 'Right', $PluginName ),
                                'icon'   => 'fa fa-align-right',
                            ],
                        ],
                        'default' => 'center',
                        'toggle' => true,
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .swiper-pagination' => 'width: 100%; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-pack:{{VALUE}}; -ms-flex-pack: {{VALUE}}; justify-content: {{VALUE}};',
                        ],
                        'condition' => [
                            'position_bullets_post' => 'initial',
                        ],
                    ]
                );
                // ** END: IF Select DEFAULT(initial) **


                $this->add_group_control(
                    \Elementor\Group_Control_Background::get_type(),
                    [
                        'name' => 'color_none_active_bullets_left_post',
                        'label' => __( 'Bullets', $PluginName ),
                        'types' => [ 'classic', 'gradient' ],
                        'selector' => '{{WRAPPER}} .extraAO-post-slider .swiper-pagination .swiper-pagination-bullet',
                        'separator' => 'before',    
                    ]
                );



                $this->add_group_control(
                    \Elementor\Group_Control_Background::get_type(),
                    [
                        'name' => 'color_active_bullets_left_post',
                        'label' => __( 'Active Bullet', $PluginName ),
                        'types' => [ 'classic', 'gradient' ],
                        'selector' => '{{WRAPPER}} .extraAO-post-slider .swiper-pagination .swiper-pagination-bullet-active',    
                    ]
                );

                $this->add_responsive_control(
                    'width_bullet_post',
                    [
                        'label' => __( 'Width Bullet', $PluginName ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 2000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 10,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .swiper-pagination .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                        'separator' => 'before',
                    ]
                );


                $this->add_responsive_control(
                    'height_bullet_post',
                    [
                        'label' => __( 'Height Bullet', $PluginName ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 2000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 10,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .swiper-pagination .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );


                $this->add_responsive_control(
                    'bullets_distance_margin_post',
                    [
                        'label' => __( 'Distance Between Bullets', $PluginName ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .swiper-pagination .swiper-pagination-bullet' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                        'separator' => 'before',    
                    ]
                );


            $this->end_controls_section();
            // ******* END: Bullets *******




            // ******* Arrows *******
            $this->start_controls_section(
                'style_post_arrows',
                [
                'label' => __( 'Arrows', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );


                $this->add_responsive_control(
                    'position_arrows_top_post',
                    [
                        'label' => __( 'Posiion top/bottom', $PluginName ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 2000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 100,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .swiper-button-next' => 'top: {{SIZE}}{{UNIT}};',
                            '{{WRAPPER}} .extraAO-post-slider .swiper-button-prev' => 'top: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'position_arrows_right_post',
                    [
                        'label' => __( 'Posiion Right Arrow', $PluginName ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 2000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 0,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .swiper-button-next' => 'right: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );


                $this->add_responsive_control(
                    'position_arrows_left_post',
                    [
                        'label' => __( 'Posiion Left Arrow', $PluginName ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 2000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 0,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .swiper-button-prev' => 'left: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );


                $this->add_responsive_control(
                    'color_arrows_post',
                    [
                        'label' => __( 'Color', $PluginName ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .swiper-button-next:after' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .extraAO-post-slider .swiper-button-prev:after' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'size_arrows_post',
                    [
                        'label' => __( 'Arrow Size', $PluginName ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 200,
                                'step' => 1,
                            ],
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 20,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .swiper-button-next:after' => 'font-size: {{SIZE}}{{UNIT}};',
                            '{{WRAPPER}} .extraAO-post-slider .swiper-button-prev:after' => 'font-size: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

            $this->end_controls_section();
            // ******* END: Arrows *******
            


            // ******* Date *******
            $this->start_controls_section(
                'style_post_date',
                [
                'label' => __( 'Date', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_responsive_control(
                    'date_color_post',
                    [
                        'label' => __( 'Color', $PluginName ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .extraAO-post-slide .extraAO-post-slide-content .extraAO-post-slide-date' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'date_color_post',
                        'label' => __( 'Style', $PluginName ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .extraAO-post-slider .extraAO-post-slide .extraAO-post-slide-content .extraAO-post-slide-date',
                    ]
                );

                $this->add_responsive_control(
                    'date_margin_post',
                    [
                        'label' => __( 'Margin', $PluginName ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .extraAO-post-slide .extraAO-post-slide-content .extraAO-post-slide-date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                        'separator' => 'before',
                    ]
                );

            $this->end_controls_section();
            // ******* END: Date *******



            // ******* Category *******
            $this->start_controls_section(
                'style_post_category',
                [
                'label' => __( 'Category', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_responsive_control(
                    'category_color_post',
                    [
                        'label' => __( 'Color', $PluginName ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .extraAO-post-slide .extraAO-post-slide-content .extraAO-post-slide-category' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'category_color_post',
                        'label' => __( 'Style', $PluginName ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .extraAO-post-slider .extraAO-post-slide .extraAO-post-slide-content .extraAO-post-slide-category',
                    ]
                );

                $this->add_responsive_control(
                    'category_margin_post',
                    [
                        'label' => __( 'Margin', $PluginName ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .extraAO-post-slide .extraAO-post-slide-content .extraAO-post-slide-category' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                        'separator' => 'before',
                    ]
                );

            $this->end_controls_section();
            // ******* END: Category *******



            // ******* Author *******
            $this->start_controls_section(
                'style_post_author',
                [
                'label' => __( 'Author', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_responsive_control(
                    'author_color_post',
                    [
                        'label' => __( 'Color', $PluginName ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .extraAO-post-slide .extraAO-post-slide-content .extraAO-post-slide-author' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'author_color_post',
                        'label' => __( 'Style', $PluginName ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .extraAO-post-slider .extraAO-post-slide .extraAO-post-slide-content .extraAO-post-slide-author',
                    ]
                );

                $this->add_responsive_control(
                    'author_margin_post',
                    [
                        'label' => __( 'Margin', $PluginName ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .extraAO-post-slider .extraAO-post-slide .extraAO-post-slide-content .extraAO-post-slide-author' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                        'separator' => 'before',
                    ]
                );

            $this->end_controls_section();
            // ******* END: Author *******


        // ============ END: Style ============

    }


    protected function render() {

        $settings = $this->get_settings_for_display();
        
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => $settings['number_of_posts_slide'],
            'category_name'     => $settings['categories_list_show_post'],
            'orderby'           => $settings['orderby_post'],
            'order'             => $settings['order_post'],
        );
    
        $post_query = new WP_Query($args);
    
        if($post_query->have_posts() ) { ?>

            <div class="swiper-container extraAO-post-slider">

                <div class="swiper-wrapper">

                <?php while($post_query->have_posts() ) {  $post_query->the_post(); ?>

                    <?php $url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
                    
                    <div class="swiper-slide extraAO-post-slide sl__flex sl__dc" style='background-image: url("<?php echo $url; ?>"'>

                        <div class="extraAO-post-slide-content">
                        
                            <h3 class="extraAO-post-slide-title">
                                <a href=""><?php the_title(); ?></a>
                            </h3>
                            
                            <div class="extraAO-post-slide-excerpt"><?php    
                                    $content = get_the_content();
                                    echo $excerpt = wp_trim_words( $content, $settings['excerpt_length_of_text_post'] );
                            ?></div>


                            <?php if ($settings['date_show_post'] == 'true') { ?>

                                <p class="extraAO-post-slide-date"><?php echo get_the_date(); ?></p>

                            <?php } // END: date_show_post ?> 


                            <?php if ($settings['category_show_post'] == 'true') { ?>
                                
                                <div class="extraAO-post-category sl__flex sl__ac sl__jcc">
                                <p class="extraAO-post-slide-category"><?php echo $settings['categories_list_show_post']; ?></p> 
                                
                                </div>
                                
                            <?php } // END: category_show_post ?>


                            <?php if ($settings['author_show_post'] == 'true') { ?>

                                <p class="extraAO-post-slide-author"><?php echo the_author_meta( 'nickname' , $author_id ); ?></p>

                            <?php } // END: author_show_post ?>
                                

                        </div> <!-- END: extraAO-post-slide-content -->

                    </div> <!-- END: swiper-slide -->

                <?php } // End while ?>

                </div> <!-- END: swiper-wrapper -->

                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>


                <!-- Add Pagination -->
                <div class="swiper-pagination extraAO-pagination"></div>

            </div> <!-- END: swiper-container -->
            


            <script>

            var swiper = new Swiper('.swiper-container', {
                // cssMode: true,
                loop: <?php echo $settings['loop_posts_slide']; ?>,
                <?php

                if($settings['autoplay_posts_slide'] == 'true') {
                    echo 'autoplay: {
                        delay: 2500,
                        disableOnInteraction: false,
                    },';
                }

                ?>
                
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                
                mousewheel: <?php echo $settings['mousewheel_posts_slide']; ?>,
                keyboard: <?php echo $settings['keyboard_posts_slide']; ?>,
            });

            </script>



        <?php } // End if 
        

    }

}
