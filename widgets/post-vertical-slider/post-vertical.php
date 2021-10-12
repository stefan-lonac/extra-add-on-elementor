<?php 

class extreAO_slider_post_vertical_Widget extends \Elementor\Widget_Base { 

    public $PluginName;

    public function get_name() {
        return 'extraAO-post-vertical';
    }
 
    public function get_title() {
        return __( 'extraAO Post Vertical Slider', $PluginName );
    }
    
    public function get_icon() {
        return 'fab fa-slideshare';
    }
 
    public function get_categories() {
        return [ 'general' ];
    }


    protected function _register_controls() {

        // $this->start_controls_section(
        //     'content_section',
        //     [
        //         'label' => __( 'Content', $PluginName ),
        //         'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        //     ]
        // );


        // $repeater = new \Elementor\Repeater();
 
        //     $repeater->add_control(
        //         'list_image',
        //         [
        //             'label' => __( 'Choose Image', $PluginName ),
        //             'type' => \Elementor\Controls_Manager::MEDIA,
        //             'default' => [
        //                 'url' => \Elementor\Utils::get_placeholder_image_src(),
        //             ],
        //         ]
        //     );

        //     $repeater->add_control(
        //         'list_title', [
        //             'label' => __( 'Slider Title', $PluginName ),
        //             'type' => \Elementor\Controls_Manager::TEXT,
        //             'default' => __( 'Slider Title' , $PluginName ),
        //             'label_block' => true,
        //         ]
        //     );


        //     $repeater->add_control(
        //         'list_text', [
        //             'label' => __( 'Slider Text', $PluginName ),
        //             'type' => \Elementor\Controls_Manager::WYSIWYG,
        //             'default' => __( 'Slider Text' , $PluginName ),
        //             'label_block' => true,
        //         ]
        //     );

    
        //     $this->add_control(
        //         'list',
        //         [
        //             'label' => __( 'Slider List', $PluginName ),
        //             'type' => \Elementor\Controls_Manager::REPEATER,
        //             'fields' => $repeater->get_controls(),
        //             'default' => [
        //                 [
        //                     'list_title' => __( 'Title #1', $PluginName ),
        //                     'list_image' => __( 'Item image.', $PluginName ),
        //                 ],
        //                 [
        //                     'list_title' => __( 'Title #2', $PluginName ),
        //                     'list_image' => __( 'Item image.', $PluginName ),
        //                 ],
        //                 [
        //                     'list_title' => __( 'Title #3', $PluginName ),
        //                     'list_image' => __( 'Item image.', $PluginName ),
        //                 ],
        //                 [
        //                     'list_title' => __( 'Title #4', $PluginName ),
        //                     'list_image' => __( 'Item image.', $PluginName ),
        //                 ],
        //             ],
        //             'title_field' => '{{{ list_title }}}',
        //         ]
        //     );

        // $this->end_controls_section();


        // ========= Settings =========
        $this->start_controls_section(
            'style_section_settings_inner',
            [
                'label' => __( 'Settings Inner', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
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

            $this->add_responsive_control(
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


            $this->add_responsive_control(
                'loop_slider',
                [
                    'label' => __( 'Loop Slider', $PluginName ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => '',
                    'options' => [
                        'loop'  => __( 'Yes', $PluginName ),
                        ''      => __( 'No', $PluginName ),
                    ],
                ]
            );
            

            $this->add_responsive_control(
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

            $this->add_responsive_control(
                'number_of_posts_slide',
                [
                    'label' => __( 'Number Of Slide', $PluginName ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 15,
                    'step' => 1,
                    'default' => 4,
                ],
            ); 

            // $options = array();

            // $args = array(
            //     'hide_empty' => false,
            // );

            // $categories = get_categories($args);

            // foreach ( $categories as $key => $category ) {
            //     $options[$category->term_id] = $category->name;
            // }

            
            // $this->add_responsive_control(
            //     'categories_list_show_post',
            //     [
            //         'label' => __( 'Category Slider', $PluginName ),
            //         'type' => \Elementor\Controls_Manager::SELECT2,
            //         'multiple' => true,
            //         'default' => '',
            //         'options' =>  $options,
            //     ]
            // );

            $this->add_responsive_control(
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
        
            $this->add_responsive_control(
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
        // ========= END: Settings =========


        // ========= Title Content =========
        $this->start_controls_section(
            'style_section_title_content',
            [
                'label' => __( 'Title Content', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'title_style',
                    'label' => __( 'Title Style', $PluginName ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .post-vertical-content div.slider-content div.slick__slide .extraAO-h3.slider-title-content',
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
                        '{{WRAPPER}} .post-vertical-content div.slider-content div.slick__slide .extraAO-h3.slider-title-content' => 'color: {{VALUE}}',
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
                        '{{WRAPPER}} .post-vertical-content div.slider-content div.slick__slide .extraAO-h3.slider-title-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();   
        // ========= END: Title Content =========



        // ========= Title Navigation =========
        $this->start_controls_section(
            'style_section_title_nav',
            [
                'label' => __( 'Title Navigation', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'title_main_size_margin',
                [
                    'label' => __( 'Margin', $PluginName ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .post-vertical-main div.slider-nav div.slick__slide .extraAO-h3.slider-main-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'title_style_main',
                    'label' => __( 'Style', $PluginName ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .post-vertical-main div.slider-nav div.slick__slide .extraAO-h3.slider-main-title a',
                ],
            );

            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'title_style_main_hover',
                    'label' => __( 'Hover Style', $PluginName ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .post-vertical-main div.slider-nav div.slick__slide .extraAO-h3.slider-main-title a:hover',
                ],
            );

            $this->add_responsive_control(
                'title_color_main',
                [
                    'label' => __( 'Color', $PluginName ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .post-vertical-main div.slider-nav div.slick__slide .extraAO-h3.slider-main-title a' => 'color: {{VALUE}}',
                    ],
                ]
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
                        '{{WRAPPER}} .post-vertical-main div.slider-nav div.slick__slide.slick-slide.slick-current.slick-center .extraAO-h3.slider-main-title a' => 'color: {{VALUE}}',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'title_center_color_hover_main',
                [
                    'label' => __( 'Hover Title Center Color', $PluginName ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .post-vertical-main div.slider-nav div.slick__slide.slick-slide.slick-current.slick-center .extraAO-h3.slider-main-title a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            


        $this->end_controls_section();   
        // ========= END: Title Navigation =========


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
                            'min' => -10000,
                            'max' => 10000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 30,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .post-vertical .main-container .nav-container' => 'top: {{SIZE}}{{UNIT}};',
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
                            'min' => -10000,
                            'max' => 10000,
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
                        '{{WRAPPER}} .post-vertical .main-container .nav-container' => 'left: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();   
        // ========= END: Section Nav =========


        // ========= Button =========
        $this->start_controls_section(
            'style_button_post',
            [
                'label' => __( 'Button', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
            $this->add_control(
                'button_title',
                [
                    'label' => __( 'Title', $PluginName ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'FIND OUT MORE', $PluginName ),
                    'placeholder' => __( 'Type your title here', $PluginName ),
                ]
		    );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'button_style',
                    'label' => __( 'Style', $PluginName ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .post-vertical-content div.slider-content div.slick__slide .extraAO-title-button a',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'button_style_hover',
                    'label' => __( 'Hover Style', $PluginName ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .post-vertical-content div.slider-content div.slick__slide .extraAO-title-button a:hover',
                ]
            );

            $this->add_responsive_control(
                'button_color',
                [
                    'label' => __( 'Color', $PluginName ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .post-vertical-content div.slider-content div.slick__slide .extraAO-title-button a' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'button_color_hover',
                [
                    'label' => __( 'Hover Color', $PluginName ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .post-vertical-content div.slider-content div.slick__slide .extraAO-title-button a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'button_size_margin',
                [
                    'label' => __( 'Margin', $PluginName ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .post-vertical-content div.slider-content div.slick__slide .extraAO-title-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );


            $this->add_responsive_control(
                'button_size_padding',
                [
                    'label' => __( 'Padding', $PluginName ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .post-vertical-content div.slider-content div.slick__slide .extraAO-title-button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'button_background_color',
                [
                    'label' => __( 'Background Color', $PluginName ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .post-vertical-content div.slider-content div.slick__slide .extraAO-title-button a' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'button_background_color_hover',
                [
                    'label' => __( 'Hover Background Color', $PluginName ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .post-vertical-content div.slider-content div.slick__slide .extraAO-title-button a:hover' => 'background-color: {{VALUE}}',
                    ],
                ]
            );


        $this->end_controls_section();   
        // ========= END: Button =========



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
                        '{{WRAPPER}} .post-vertical-main div.slider-nav .control-c i' => 'color: {{VALUE}}',
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
                        '{{WRAPPER}} .post-vertical-main div.slider-nav .control-c i' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();   
        // ========= END: Arrows =========
    

        // ========= Dot =========
        $this->start_controls_section(
            'style_section_dot',
            [
                'label' => __( 'Dot', $PluginName ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
            $this->add_responsive_control(
                'dot_style_color',
                [
                    'label' => __( 'Dot Color', $PluginName ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .post-vertical .main-container .nav-container .slick__slide.slick-current .line-dot .dot.activeContentDot' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'dot_style_font_size',
                [
                    'label' => __( 'Dot Size', $PluginName ),
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
                        'size' => 15,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .post-vertical .main-container .nav-container .slick__slide.slick-current .line-dot .dot.activeContentDot' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();   
        // ========= END: Dot =========
    }


    protected function render() {
        // generate the final HTML on the frontend using PHP
        $settings = $this->get_settings_for_display();

        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => 30,
            // 'category_name'     => $settings['categories_list_show_post'],
            'orderby'           => $settings['orderby_post'],
            'order'             => $settings['order_post'],
        );

        $post_query = new WP_Query($args);

        

        if($post_query->have_posts() ) { ?>
        
<div class="post-vertical">

    <div class="main-container post-vertical-content">

        <div class="nav-container post-vertical-main">

            <div class="slider-nav sl__flex sl__ac sl__dc">

            <?php 
                while($post_query->have_posts() ) {  $post_query->the_post();
            ?>
                    <div class="slick__slide sl__flex">
                        <h3 class="extraAO-h3 slider-main-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>

                        <div class="line-dot">
                            <span class="dot"></span>
                        </div>
                        
                    </div>

            <?php } // End while ?> 
                
            </div>

        </div>

                       

        <div class="slider slider-main slider-content slider-for">
                        
            <?php 
                while($post_query->have_posts() ) {  $post_query->the_post();
                    $url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
            ?>
                    
                    <div class="slick__slide sl__flex-important sl__ac slide__Dots-Trigger">
                            
                        <div class="extraAO-img-align">
                                                    
                            <div class="sl__dc slide-main-text">
                
                                <div class="extraAO-title-align">
                                    <h3 class="extraAO-h3 slider-title-content"><?php the_title(); ?></h3>
                                </div>

                                <div class="extraAO-title-button">
                                    <a href="<?php the_permalink(); ?>"><?php echo $settings['button_title']; ?></a>
                                </div>
                                
                            </div>

                        </div>

                    </div><!-- END of ** slick__slide ** -->

            <?php } // End while ?>
                    
        </div>
    
    </div>

</div>



        <script>

            (function($){
                $(document).ready(function(){
                    
                    $('.slider-for').each(function(key, item) {
                        
                        var sliderIdName = 'slider-' + key;
                        var sliderNavIdName = 'sliderNav-' + key;

                        this.id = sliderIdName;
                        $('.slider-nav')[key].id = sliderNavIdName;

                        var sliderId = '#' + sliderIdName;
                        var sliderNavId = '#' + sliderNavIdName;

                        $(sliderId).slick({
                            dots: false,
                            arrows: false,
                            asNavFor: sliderNavId,
                            vertical: true,   
                            speed: <?php echo $settings['speed_of_slider']; ?>,
                            autoplay: <?php echo $settings['autoplay_slide']; ?>,
                            autoplaySpeed: <?php echo $settings['autoplay_slide_speed']; ?>,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            // initialSlide: 1,
                            // centerMode: true,
                            adaptiveHeight: true
                        });

                        // Get titles from the DOM
                        var titleMain  = $(sliderNavId);
                        var titleSubs  = titleMain.find("slick-active");
                        
                        titleMain.slick({
                            arrows: true,
                            infinite: true,
                            dots: false,
                            centerMode: true,
                            slidesToShow: <?php echo $settings['number_of_posts_slide']; ?>,
                            centerPadding: "0",
                            draggable: false,
                            pauseOnHover: false,
                            swipe: false,
                            touchMove: false,
                            vertical: true,
                            useTransform: true,
                            asNavFor: sliderId,
                            cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1.000)',
                            adaptiveHeight: true,
                            autoplay: <?php echo $settings['autoplay_slide']; ?>,
                            speed: <?php echo $settings['speed_of_slider']; ?>,
                            autoplaySpeed: <?php echo $settings['autoplay_slide_speed']; ?>,
                            prevArrow:"<p class='a-left control-c prev slick-prev slick-arrow'> <i class='fas fa-angle-up'></i> </p>",
                            nextArrow:"<p class='a-right control-c next slick-next slick-arrow'> <i class='fas fa-angle-down'></i> </p>",
                            responsive: [  

                                {
                                    breakpoint: 769,
                                    settings: {
                                        vertical: false,
                                        slidesToShow: 3,
                                        centerMode: true,
                                        prevArrow:"<p class='a-left control-c prev slick-prev slick-arrow'> <i class='fas fa-angle-left'></i> </p>",
                                        nextArrow:"<p class='a-right control-c next slick-next slick-arrow'> <i class='fas fa-angle-right'></i> </p>",
                                    }
                                },

                                {
                                    breakpoint: 426,
                                    settings: {
                                        vertical: false,
                                        slidesToShow: 1,
                                        centerMode: true,
                                        prevArrow:"<p class='a-left control-c prev slick-prev slick-arrow'> <i class='fas fa-angle-left'></i> </p>",
                                        nextArrow:"<p class='a-right control-c next slick-next slick-arrow'> <i class='fas fa-angle-right'></i> </p>",
                                    }
                                }

                            ]
                        });

                        $(".slick-current").each(function(){

                        $(".slide__Dots-Trigger").removeClass("activeTrigger");
                            $(".slick-current .line-dot .dot").addClass("activeContentDot");
                        });

                        $(".slide__Dots-Trigger").removeClass("activeTrigger");
                        $(".slick-current").addClass("activeTrigger");

                        // Autoplay
                        titleMain.on('afterChange', function(event, slick, currentSlide, nextSlide){

                            $(".slide__Dots-Trigger").removeClass("activeTrigger");
                            $(".slick-current .line-dot .dot").addClass("activeContentDot");

                            $(".slide__Dots-Trigger").removeClass("activeTrigger");
                            $(".slick-current").addClass("activeTrigger");

                        });

                        // On init
                        $(".slick-dupe").each(function(index, el) {
                            $("#animatedHeading").slick('slickAdd', "<div>" + el.innerHTML + "</div>");
                        });

                        // Click on slide
                        $('.slide__Dots-Trigger').click(function() {

                            $(".slide__Dots-Trigger").removeClass("activeTrigger");
                            $(".slick-current .line-dot .dot").addClass("activeContentDot");

                            $(".slide__Dots-Trigger").removeClass("activeTrigger");
                            $(".slick-current").addClass("activeTrigger");

                        });

                        // Click on arrow add dot
                        $('.slick-arrow').click(function() {

                            $(".slick-current").each(function(){

                                $(".slide__Dots-Trigger").removeClass("activeTrigger");
                                $(".slick-current .line-dot .dot").addClass("activeContentDot");
                            });

                            $(".slide__Dots-Trigger").removeClass("activeTrigger");
                            $(".slick-current").addClass("activeTrigger");
                        
                        });
                        // END: Slider dots and active titles
                    });

                });
            })(jQuery);

        </script>

    <?php }// END of ** if '$post_query->have_posts()' ** 

    }// END of ** render() **

}// END of ** Class extreAO_slider_horizontal_Widget **