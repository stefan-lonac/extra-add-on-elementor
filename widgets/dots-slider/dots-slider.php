<?php 

class extreAO_dots_slider_Widget extends \Elementor\Widget_Base { 

    public $PluginName;

    public function get_name() {
        return 'extraAO-carousel-dots-vertical';
    }
 
    public function get_title() {
        return __( 'extraAO Dots Vertcal', $PluginName );
    }
    
    public function get_icon() {
        return 'fab fa-slideshare';
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
                'list_title', [
                    'label' => __( 'Slider Title', $PluginName ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Slider Title' , $PluginName ),
                    'label_block' => true,
                ]
            );


            $repeater->add_control(
                'list_text', [
                    'label' => __( 'Slider Text', $PluginName ),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => __( 'Slider Text' , $PluginName ),
                    'label_block' => true,
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
                            'list_image' => __( 'Item image.', $PluginName ),
                        ],
                        [
                            'list_title' => __( 'Title #2', $PluginName ),
                            'list_image' => __( 'Item image.', $PluginName ),
                        ],
                        [
                            'list_title' => __( 'Title #3', $PluginName ),
                            'list_image' => __( 'Item image.', $PluginName ),
                        ],
                        [
                            'list_title' => __( 'Title #4', $PluginName ),
                            'list_image' => __( 'Item image.', $PluginName ),
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
                        'false' => __( 'No', $PluginName ),
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
                    'selector' => '{{WRAPPER}} .after-slide-bg',
                    'separator' => 'before',
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


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'title_style',
                    'label' => __( 'Title Style', $PluginName ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .slider-dots div.slick__slide .extraAO-h3.slider-title',
                ]
            );

            $this->add_responsive_control(
                'title_color',
                [
                    'label' => __( 'Title Color', $PluginName ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .slider-dots div.slick__slide .extraAO-h3.slider-title' => 'color: {{VALUE}}',
                    ],
                ]
            );


            $this->add_responsive_control(
                'title_size_margin',
                [
                    'label' => __( 'Margin Title', $PluginName ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .slider-dots div.slick__slide .extraAO-h3.slider-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            

            $this->add_responsive_control(
                'title_main_size_margin',
                [
                    'label' => __( 'Margin Main Title', $PluginName ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .slider-dots div.slick__slide .extraAO-h3.slider-main-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );


            $this->add_responsive_control(
                'title_main_size_margin',
                [
                    'label' => __( 'Margin Main Title', $PluginName ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .slider-dots div.slick__slide .extraAO-h3.slider-main-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'title_style_main',
                    'label' => __( 'Title Main Style', $PluginName ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .slider-dots div.slick__slide .extraAO-h3.slider-main-title',
                ],
            );

            $this->add_responsive_control(
                'title_color_main',
                [
                    'label' => __( 'Title Main Color', $PluginName ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .slider-dots div.slick__slide .extraAO-h3.slider-main-title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'title_center_color_main',
                [
                    'label' => __( 'Title Center Main Color', $PluginName ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .slider-dots div.slick__slide.slick-slide.slick-current.slick-center .extraAO-h3.slider-main-title' => 'color: {{VALUE}}',
                    ],
                ]
            );
            


        $this->end_controls_section();   
        // ========= END: Title =========



        // ========= Text =========
        $this->start_controls_section(
            'style_section_text',
            [
                'label' => __( 'Text', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'text_style',
                    'label' => __( 'Text Style', $PluginName ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .slider-main div.slick__slide .extraAO-text',
                ],
                
            );

            $this->add_responsive_control(
                'text_style_color',
                [
                    'label' => __( 'Text Color', $PluginName ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .slider-main div.slick__slide .extraAO-text' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'text_style_align',
                [
                    'label' => __( 'Text Alignment', $PluginName ),
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
                    'default' => 'left',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .slider-main div.slick__slide .extraAO-text' => 'text-align: {{VALUE}};',
                    ],

                ]
            );

            $this->add_responsive_control(
                'text_style_width',
                [
                    'label' => __( 'Text Area Width', $PluginName ),
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
                        '{{WRAPPER}} .slider-main div.slick__slide .slide-main-text' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'text_style_width_margin',
                [
                    'label' => __( 'Text Area Margin', $PluginName ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .slider-main div.slick__slide .slide-main-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );


        $this->end_controls_section();   
        // ========= END: Text =========

        

        // ========= Section Nav =========
        $this->start_controls_section(
            'style_section_sections_nav',
            [
                'label' => __( 'Section Nav', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        

            $this->add_responsive_control(
                'section_nav_top_bottom',
                [
                    'label' => __( 'Section Nav Top/Bottom', $PluginName ),
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
                        '{{WRAPPER}} .services-slider .main-container .nav-container' => 'top: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'section_nav_left_right',
                [
                    'label' => __( 'Section Nav Left/Right', $PluginName ),
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
                        '{{WRAPPER}} .services-slider .main-container .nav-container' => 'left: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();   
        // ========= END: Section Nav =========


        // ========= Section Content =========
        $this->start_controls_section(
            'style_section_sections_content',
            [
                'label' => __( 'Section Content', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        

            $this->add_responsive_control(
                'section_content_top_bottom',
                [
                    'label' => __( 'Section Content Top/Bottom', $PluginName ),
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
                        '{{WRAPPER}} .slider-main div.slick__slide .slide-main-text' => 'top: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'section_content_left_right',
                [
                    'label' => __( 'Section Content Left/Right', $PluginName ),
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
                        '{{WRAPPER}} .slider-main div.slick__slide .slide-main-text' => 'left: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();   
        // ========= END: Section Content =========



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
                        '{{WRAPPER}} .slider-dots .control-c i' => 'color: {{VALUE}}',
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
                        'size' => 30,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .slider-dots .control-c i' => 'font-size: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .slider-dots .control-c.a-left' => 'left: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .slider-dots .control-c.a-left' => 'bottom: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .slider-dots .control-c.a-right' => 'right: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .slider-dots .control-c.a-right' => 'bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();   
        // ========= END: Arrows =========
    }// END of ** _register_controls() **


    protected function render() {
        // generate the final HTML on the frontend using PHP
        $settings = $this->get_settings_for_display();
    
        if ( $settings['list'] ) { ?>




        <div class="slider-dots slider-for-dots">

            <?php  $e = 0;
                    $trigger = 1;
                foreach (  $settings['list'] as $item ) { ?>
                <div class="slick__slide sl__flex caseStudyTrigger" data-trigger="<?php echo $trigger++; ?>">
                    <h3 class="extraAO-h3 slider-main-title"><?php echo $item['list_title']; ?></h3>
                </div>
            <?php $e++; } ?><!-- END of ** foreach ** -->
            
        </div>



    <script>
        
        (function($){

            $(document).ready(function(){

                $('.slider-for-dots').each(function(key, item) {

                    var sliderIdName = 'slider-dots-' + key;
                    this.id = sliderIdName;
                    var sliderId = '#' + sliderIdName;

                    $(".caseStudyTrigger:first-child").addClass("activeTrigger");
                    $(".help-card .caseStudyCard:first-child").addClass("activeCard");


                    $(sliderId).not('.slick-initialized').slick({

                        slidesToShow: 3,
                        slidesToScroll: 1,
                        arrows: true,
                        autoplay: <?php if ($settings['autoplay_slide'] == '') {echo true;} else {echo $settings['autoplay_slide'];} ?>,
                        autoplaySpeed: <?php echo $settings['autoplay_slide_speed']; ?>,
                        speed: <?php echo $settings['speed_of_slider']; ?>,
                        // asNavFor: '.slider-for',
                        dots: true,
                        infinite: <?php if ($settings['loop_slider'] == '') {echo true;} else {echo $settings['loop_slider'];} ?>,
                        centerMode: true,
                        focusOnSelect: true,
                        prevArrow:"<p class='a-left control-c prev slick-prev'> <i class='fas fa-angle-left'></i> </p>",
                        nextArrow:"<p class='a-right control-c next slick-next'> <i class='fas fa-angle-right'></i> </p>"
                    
                    });

                    $('.caseStudyTrigger').click(function() {
                        var id = $(this).attr('data-trigger');

                        $(".caseStudyTrigger").removeClass("activeTrigger");
                        $(".caseStudyTrigger[data-trigger='" + id + "']").addClass("activeTrigger");

                        $(".caseStudyCard").removeClass("activeCard");
                        $(".caseStudyCard[data-item='"+id+"']").addClass("activeCard");
                    });

                });

            });
        })(jQuery);

    </script>


    <style>
        .caseStudyCard {
            display: none;
        }
        
        .caseStudyCard.activeCard {
            display: flex;
            animation: fadeIn 0.5s;
        }
    </style>


    <?php }// END of ** if 'list' **

    }// END of ** render() **



}// END of ** Class extreAO_dots_slider_Widget **