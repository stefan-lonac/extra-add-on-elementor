<?php 

// This example will add a custom "select" drop down & "switcher" to the "testimonial" section
// and add custom "color" to the "testimonial style" section
add_action('elementor/element/before_section_end', 'add_control_in_existing_widget', 10, 3 );
function add_control_in_existing_widget( $section, $section_id, $args ) {
	if( $section->get_name() == 'testimonial' && $section_id == 'section_testimonial' ){
		// we are at the end of the "section_testimonial" area of the "testimonial"
		$section->add_control(
			'testimonial_name_title_pos' ,
			[
				'label'        => 'Name and title position',
				'type'         => Elementor\Controls_Manager::SELECT,
				'default'      => 'vertical',
				'options'      => array(
					'vertical' => 'Vertical',
					'horizontal' => 'Horizontal'
				),
				'prefix_class' => 'dgm-testimonial-name-title-',
				'label_block'  => true,
				'condition'  => [
					'testimonial_image_position' => 'aside',
				]
			]
		);
	}
	if( $section->get_name() == 'testimonial' && $section_id == 'section_style_testimonial_content' ){
		// we are at the end of the "section_testimonial" area of the "testimonial"
		$section->add_control(
			'testimonial_content_border_bottom' ,
			[
				'label'        => 'Border Bottom',
				'type'         => Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor' ),
				'label_off' => __( 'Hide', 'elementor' ),
				'return_value' => 'border_bottom',
				'default' => 'yes',
			]
		);
		$section->add_control(
			'testimonial_content_border_color' ,
			[
				'label'        => 'Border Color',
				'type'         => Elementor\Controls_Manager::COLOR,
				'label_block'  => true,
				'default'  => '#ECF0F8',
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .elementor-testimonial-content.border_bottom' => 'border-bottom: solid 1px {{VALUE}};',
				],
				'condition'  => [
					'testimonial_content_border_bottom' => 'border_bottom',
				]
			]
		);
	}
}

// This example will add a render 'class' attribute to the testimonial content
add_action( 'elementor/widget/before_render_content', 'custom_render_to_testimonial' );
function custom_render_to_testimonial( $testimonial ) {
	//Check if we are on a testimonial
	if( 'testimonial' === $testimonial->get_name() ) {
		// Get the settings
		$settings = $testimonial->get_settings();
		// Adding our type as a class to the testimonial
		if( $settings['testimonial_content_border_bottom'] ) {
			$testimonial->add_render_attribute( 'testimonial_content', 'class', $settings['testimonial_content_border_bottom'], true );
		}
	}
}




// add_action('elementor/element/before_section_end', function( $section, $section_id, $args ) {
// 	if( $section->get_name() == 'image-box' && $section_id == 'section_image' ){
// 		// we are at the end of the "section_image" area of the "image-box"
// 		$section->add_control(
// 			'extraAO_image_box_template' ,
// 			[
// 				'label'        => 'Background Color',
// 				'type'         => Elementor\Controls_Manager::SELECT,
// 				'default'      => '',
//                 'options'      => array( 
//                                     'blue' => 'Blue Style', 
//                                     'green' => 'Green Style',
//                                     '' => 'None Style', 
//                                 ),
// 				'prefix_class' => 'extraAO-box-style-',
// 				'label_block'  => true,
// 			]
// 		);
// 	}
// }, 10, 3 );






add_action('elementor/element/before_section_end', function( $section, $section_id, $args ) {
	if( $section->get_name() == 'posts' ){
		// we are at the end of the "section_image" area of the "image-box"
		
		$section->add_control(
			'extraAO_category_of_posts_show_hide' ,
			[
				'label'        => 'Category',
				'type'         => Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor' ),
				'label_off' => __( 'Hide', 'elementor' ),
				'return_value' => 'category_posts',
				'default' => 'no',
			]
		);

		$section->add_control(
			'extraAO_category_of_posts',
			[
				'label' => __( 'Show Category', 'elementor' ),
				'label_block' => true,
				'type' => Elementor\Controls_Manager::SELECT,
				'default' => [ 'No' ],
				'multiple' => true,
				'options' => [
					'yes' => __( 'Yes', 'elementor' ),
					'no'  => __( 'No', 'elementor' ),
				],
				'separator' => 'before',
				'condition'  => [
					'extraAO_category_of_posts_show_hide' => 'category_posts',
				]
			]
		);
	}
}, 10, 3 );


// This example will add a render 'class' attribute to the testimonial content
add_action( 'elementor/widget/before_render_content', 'custom_render_to_posts' );
function custom_render_to_posts( $section ) {
	//Check if we are on a testimonial
	if( 'posts' === $section->get_name() ) {
		
		$settings = $section->get_settings();

		// echo '<pre>' , var_dump($post_id) , '</pre>';

		if( $settings['extraAO_category_of_posts'] == 'yes' ) {
			$posts= new WP_Query($args);
			while ($posts->have_posts() ) : $posts->the_post();
				echo "Helooo";
			endwhile;
			wp_reset_postdata();

		}
	}
}



// add_action( 'elementor/element/button/section_style/after_section_start', 'custom_button_field', 10, 2 );
// /**
//  * Adding button fields
//  * @param \Elementor\Widget_Base $button
//  * @param array                  $args
//  */
// function custom_button_field( $button, $args ) {
//     $button->add_control( 'custom_button_type',
//         [
//         'label' => __( 'Button Type', 'elementor' ),
//         'type' => \Elementor\Controls_Manager::SELECT,
//         'default' => 'button',
//         'options' => array(
//           'no' => 'Default Button',
//           'button' => 'Button',
//           'button brand' => 'Orange',
//           'button brand gradient' => 'Orange Gradient'
//         )
//         ]
//     );
// }