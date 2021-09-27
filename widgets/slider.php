<?php

// namespace Elementor;

class extreAO_slider_Widget extends \Elementor\Widget_Base {
 
    public $PluginName;

    public function get_name() {
        return 'extraAO-carousel';
    }
 
    public function get_title() {
        return __( 'extraAO Carousel', $PluginName );
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
 
        $repeater->add_control(
            'list_title', [
                'label' => __( 'Title', $PluginName ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'List Title' , $PluginName ),
                'label_block' => true,
            ]
        );
 
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
 
        $this->add_control(
            'list',
            [
                'label' => __( 'Repeater List', $PluginName ),
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
 
    }
     
    protected function render() {
        // generate the final HTML on the frontend using PHP
        $settings = $this->get_settings_for_display();
    
        if ( $settings['list'] ) {
            ?>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
    
                    <?php for($i=0; $i<count($settings['list']); $i++) { ?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="<?php echo ($i==0) ? 'active':''; ?>"></li>
                    <?php } ?>
                </ol>
                <div class="carousel-inner">
                    <?php $i = 0; ?>
                    <?php foreach (  $settings['list'] as $item ) { ?>
                        <div class="carousel-item <?php echo ($i==0) ? 'active':''; ?>">
                            <img class="d-block w-100" src="<?php echo $item['list_image']['url']; ?>" alt="<?php echo $item['list_title']; ?>" />
                            <div class="carousel-caption d-none d-md-block">
                                <h3><?php echo $item['list_title']; ?></h3>
                            </div>
                        </div>
                        <?php $i++; ?>
                    <?php } ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <?php
        }

    }
}
