<?php




add_action( 'elementor/element/post/document_settings/before_section_end', 'add_elementor_page_settings_controls' , 10, 2 );

function add_elementor_page_settings_controls( \Elementor\Core\DocumentTypes\PageBase $page ) {



	$page->add_control(
		'extreAO_grid_content',
		[
			'label' => __( 'Width Of Page', 'elementor' ),
			'type' => \Elementor\Controls_Manager::NUMBER,
			'selectors' => [
                '{{WRAPPER}} .site-content-contain' => 'max-width: {{VALUE}}px; margin: 0 auto;',
			],
        ]
    );

// 
    $page->add_control(
        'themeprefix_custom_breakpoint',
        [
            'label'        => __( 'Custom Column Breakpoint', 'elementor' ),
            'description'  => __( 'At what width do the columns stack and become 100% wide? Under 768px, use custom CSS', 'elementor' ),
            'type'         => Elementor\Controls_Manager::SELECT,
            'default'      => '',
            'options'      => array( 
                ''            => ' ', 
                'width-900'   => '900px', 
                'width-1000'  => '1000px', 
                'width-1024'  => '1024px', 
                'width-1200'  => '1200px', 
            ),
            'selectors' => [
                '{{VALUE}} .site-content-contain' => 'max-width: {{VALUE}}px; margin: 0 auto;',
			],
            'prefix_class' => 'custom-break-point-',
            'label_block'  => true,
        ]
    );




    
    // $page->add_responsive_control(
    //     'title_padding',
    //     [
    //         'label' => __( 'Padding', 'elementor' ),
    //         'type' => \Elementor\Controls_Manager::DIMENSIONS,
    //         'size_units' => [ 'px', 'em', '%' ],
    //         'selectors' => [
    //             '{{WRAPPER}} .site-content-contain' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
    //         ],
    //         'devices' => [ 'mobile', 'tablet' ],
    //     ]
    // );


}


