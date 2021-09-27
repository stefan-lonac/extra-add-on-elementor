<?php 

class extreAO_slider_title_Widget extends \Elementor\Widget_Base { 

    public $PluginName;

    public function get_name() {
        return 'extraAO-carousel-title';
    }
 
    public function get_title() {
        return __( 'extraAO Title Slider', $PluginName );
    }
    
    public function get_icon() {
        return 'fas fa-arrows-alt-h';
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

            $repeater->add_control(
                'list_title', [
                    'label' => __( 'Slider Title', $PluginName ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Slider Title' , $PluginName ),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'website_link',
                [
                    'label' => __( 'Link', $PluginName ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'Type the first three letters of your page name...', $PluginName ),
                    'show_external' => true,
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                ]
            );


            $this->add_control(
                'list',
                [
                    'label' => __( 'Slider List', $PluginName ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'list_title' => __( 'Title #1', $PluginName ),
                            'website_link' => __( 'Item link.', $PluginName ),
                        ],

                        [
                            'list_title' => __( 'Title #2', $PluginName ),
                            'website_link' => __( 'Item link.', $PluginName ),
                        ],

                        [
                            'list_title' => __( 'Title #3', $PluginName ),
                            'website_link' => __( 'Item link.', $PluginName ),
                        ],
                    ],
                    'title_field' => '{{{ list_title }}}',
                ]
            );

        $this->end_controls_section();


        // ========= Settings =========
        $this->start_controls_section(
            'style_section_settings_inner',
            [
                'label' => __( 'Settings Inner', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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

            $this->add_control(
                'autoplay_slide_speed',
                [
                    'label' => __( 'Autoplay Speed Slider (1000 = 1s)', $PluginName ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 500,
                    'max' => 10000,
                    'step' => 1,
                    'default' => 1000,
                ], 
            );


            $this->add_control(
                'loop_slider',
                [
                    'label' => __( 'Loop Slider', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'true',
                    'options' => [
                        'true'  => __( 'Yes', $PluginName ),
                        'false'      => __( 'No', $PluginName ),
                    ],
                ]
            );
            

            $this->add_control(
                'speed_of_slider',
                [
                    'label' => __( 'Speed Of Slides (1000 = 1s)', $PluginName ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 500,
                    'max' => 10000,
                    'step' => 1,
                    'default' => 1000,
                ], 
            );
            

        $this->end_controls_section();    
        // ========= END: Settings =========


        // ========= END: Content Inner =========
        $this->start_controls_section(
            'style_section_content_style',
            [
                'label' => __( 'Content Style', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'slide_background_color',
                    'label' => __( 'Background Content', $PluginName ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .title-slider .title-slider-main',
                ]
            );


        $this->end_controls_section();   
        // ========= END: Content Inner =========


        // ========= Title =========
        $this->start_controls_section(
            'style_section_title',
            [
                'label' => __( 'Title', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'title_main_size_margin',
                [
                    'label' => __( 'Margin Title', $PluginName ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .title-slider .title-slider-main .extraAO-h3.slider-main-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'title_style_main',
                    'label' => __( 'Title Style', $PluginName ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .title-slider .title-slider-main .extraAO-h3.slider-main-title a',
                ],
            );

            $this->add_responsive_control(
                'title_color_main',
                [
                    'label' => __( 'Title Color', $PluginName ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .title-slider .title-slider-main .extraAO-h3.slider-main-title a' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'title_style_center_main',
                    'label' => __( 'Title Center Style', $PluginName ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .title-slider .title-slider-main .slick-slide.slick-center .extraAO-h3.slider-main-title a',
                    'separator' => 'before',
                ],
            );

            $this->add_responsive_control(
                'title_center_color_main',
                [
                    'label' => __( 'Title Center Color', $PluginName ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [ 
                        '{{WRAPPER}} .title-slider .title-slider-main .slick-slide.slick-center .extraAO-h3.slider-main-title a' => 'color: {{VALUE}}',
                    ],
                ]
            );


        $this->end_controls_section();   
        // ========= END: Title =========



        // ========= Arrows =========
        $this->start_controls_section(
            'style_section_arrows',
            [
                'label' => __( 'Arrows', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
            $this->add_responsive_control(
                'arrows_style_color',
                [
                    'label' => __( 'Arrows Color', $PluginName ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .title-slider .title-slider-main p.control-c i:before' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'arrows_style_font_size',
                [
                    'label' => __( 'Arrows Size', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', 'em' ],
                    'range' => [
                        'px' => [
                            'min' => 1,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        'em' => [
                            'min' => 1,
                            'max' => 1000,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .title-slider .title-slider-main p.control-c i:before' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'arrows_left_position_left_right',
                [
                    'label' => __( 'Arrow Previous Move Left/Right', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 1000,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .title-slider .title-slider-main p.control-c.a-left' => 'left: {{SIZE}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'arrows_left_position_top_bottom',
                [
                    'label' => __( 'Arrow Previous Move Top/Bottom', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 1000,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .title-slider .title-slider-main p.control-c.a-left' => 'bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );


            $this->add_responsive_control(
                'arrows_right_position_left_right',
                [
                    'label' => __( 'Arrow Next Move Left/Right', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 1000,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .title-slider .title-slider-main p.control-c.a-right' => 'right: {{SIZE}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'arrows_right_position_bottom_top',
                [
                    'label' => __( 'Arrow Next Move Top/Bottom', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 1000,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 30,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .title-slider .title-slider-main p.control-c.a-right' => 'bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();   
        // ========= END: Arrows =========

    }

    protected function render() {
        // generate the final HTML on the frontend using PHP
        $settings = $this->get_settings_for_display();
    
        if ( $settings['list'] ) { ?>


<div class="title-slider">

    <div class="title-slider-main sl__flex-important">

        <?php  $e = 0;
            foreach (  $settings['list'] as $item ) { ?>

            <div class="">

                <h3 class="extraAO-h3 slider-main-title">
                    <a href="<?php echo $item['website_link']['url']; ?>">

                        <?php echo $item['list_title']; ?>

                    </a>
                </h3>

            </div>
        <?php $e++; } ?><!-- END of ** foreach ** -->
        
    </div>

</div>

    <style>
        .title-slider .title-slider-main p.control-c {
            position: absolute;
            margin: 0;
        }
        .title-slider .title-slider-main .extraAO-h3.slider-main-title {
            text-align: center;
        }

         .title-slider .title-slider-main .slick-slide.slick-current, 
         .title-slider .title-slider-main .slick-slide.slick-center {
            transform:scale(1.4);
        }
    </style>


    <script src="https://kit.fontawesome.com/125e2c501f.js" crossorigin="anonymous"></script>
    <script>

    (function($){
        $(document).ready(function(){

            $('.title-slider-main').slick({
                slidesToShow: 3,
                // slidesToScroll: 1,
                centerMode: true,
                centerPadding: '0px',
                autoplay: <?php echo $settings['autoplay_slide']; ?>,
                speed: <?php echo $settings['speed_of_slider']; ?>,
                autoplaySpeed: <?php echo $settings['autoplay_slide_speed']; ?>,
                infinite: <?php echo $settings['loop_slider']; ?>,
                prevArrow:"<p class='a-left control-c prev slick-prev'> <i class='fas fa-angle-left'></i> </p>",
                nextArrow:"<p class='a-right control-c next slick-next'> <i class='fas fa-angle-right'></i> </p>",
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        arrows: true,
                        centerMode: true,
                        centerPadding: '0px',
                        slidesToShow: 3
                    }
                },

                {
                    breakpoint: 480,
                    settings: {
                        arrows: true,
                        centerMode: true,
                        centerPadding: '0px',
                        slidesToShow: 1
                    }
                }]
            });

        });
    })(jQuery);

    </script>

        <?php 
        }// END of ** if ( $settings['list'] ) **

    }// END of ** render() **
}