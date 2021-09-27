<?php
/**
* Plugin Name: Extra add-on Elementor
* Description: This plugin contains widgets for Elementor, as well as a back top button.
* Version: 1.0.1
* Requires at least: 5.2
* Requires PHP: 7.2
* Author: Stefan Loncaric
* Text Domain: extra-add-on-elementor
* Domain Path: /languages
* GitHub URI: https://github.com/stefan-lonac/extra-add-on-elementor
*/

if( ! defined( 'ABSPATH' ) ) exit();

/**
* Main Class
* @since 1.0.0
*/
$bttActivate    = get_option( 'activate-back-to-top' );
$PluginName     = 'extraAO-elementor-add-on';

final class extraAO_Elementor_Widget {
 
    public $bttActivate;
    public $PluginName;

    const VERSION = '1.0';
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
    const MINIMUM_PHP_VERSION = '7.0';
 
    private static $_instance = null;
 
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
 
    public function __construct() {

        require_once plugin_dir_path( __FILE__ ) . 'plugin-update-checker/plugin-update-checker.php';
        $updateChecker = Puc_v4_Factory::buildUpdateChecker(
            'https://github.com/stefan-lonac/extra-add-on-elementor',
            __FILE__,
            'extra-add-on-elementor'
        );

        // Optional: If you're using a private repository, specify the access token like this:
        $updateChecker->setAuthentication('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');
        $updateChecker->getVcsApi()->enableReleaseAssets();

        // Optional: Set the branch that contains the stable release.
        // $myUpdateChecker->setBranch('stable-branch-name');


        add_action( 'init', [ $this, 'i18n' ] );
        add_action( 'plugins_loaded', [ $this, 'init' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ], 11 );

        // Add Admin Settings Page
        add_action( 'add_Plugin_Admin_Menu', [ $this, 'addPluginAdminMenu' ] );
        add_action( 'admin_menu', array( $this, 'addPluginAdminMenu' ), 15);

        // Show script file of DASHBOARD
        if ($_GET['page'] == "extraAO") {
            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts_admin' ) );
        }
 
        // Add CONTROLS to Page Settings
        require_once( __DIR__ . '/admin/options_register.php' );

        // Register Wordpress Customize Controll
        require_once( __DIR__ . '/controls/controls-wp-customize.php' );

        // Back To Top Button Show fixed on page when settings is CHECKED
        if (get_option('activate-back-to-top') == 1) {
            require_once( __DIR__ . '/controls/back-to-top.php' );
        } return;


        require_once( __DIR__ . '/plugin-update-checker/plugin-update-checker.php');
        $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
            'https://github.com/stefan-lonac/extra-add-on-elementor',
            __FILE__,
            $PluginName
        );
        
        $myUpdateChecker->getVcsApi()->enableReleaseAssets();
        //Optional: If you're using a private repository, specify the access token like this:
        $myUpdateChecker->setAuthentication('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');

        //Optional: Set the branch that contains the stable release.
        $myUpdateChecker->setBranch('master');
    }
    

    public function init() {
        // Check if Elementor installed and activated
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
            return;
        }
         
        // Check for required Elementor version
        if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
            return;
        }
         
        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
            return;
        }

 
        // Add Plugin actions
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
    }
     
    public function i18n() {
        load_plugin_textdomain( $PluginName );
    }
     
    public function admin_notice_missing_main_plugin() {
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
 
        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', $PluginName ),
            '<strong>' . esc_html__( 'Elementor', $PluginName ) . '</strong>'
        );
 
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }
     
    public function admin_notice_minimum_elementor_version() {
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
 
        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'extreAO-elementor-add-on' ),
            '<strong>' . esc_html__( 'Elementor', $PluginName ) . '</strong>',
             self::MINIMUM_ELEMENTOR_VERSION
        );
 
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }
     
    public function admin_notice_minimum_php_version() {
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
 
        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'extreAO-elementor-add-on' ),
            '<strong>' . esc_html__( 'PHP 7.0', $PluginName ) . '</strong>',
             self::MINIMUM_PHP_VERSION
        );
 
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }
     
    public function init_widgets() {
 
        // Include Widget files
        require_once( __DIR__ . '/widgets/slider-tetestimonial.php' );
        require_once( __DIR__ . '/widgets/post-slider.php' );
        require_once( __DIR__ . '/widgets/vertical-slider.php' );
        require_once( __DIR__ . '/widgets/title-slider.php' );
        require_once( __DIR__ . '/widgets/dots-slider.php' );

        // Register widget
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \extreAO_slider_testimonial_Widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \extreAO_slider_posts_Widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \extreAO_slider_vertical_Widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \extreAO_slider_title_Widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \extreAO_dots_slider_Widget() );
 
    }
 
    
    public function enqueue_scripts() {
        wp_enqueue_style( 'extraAO-style', plugins_url( '/assets/css/extraAO-style.css', __FILE__ ) );

        wp_register_style( "bootstrap-css", "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css", array(), false, "all" );
        wp_enqueue_style( "bootstrap-css" );
 
        wp_register_script("bootstrap-js", "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js", array(), false, true);
        wp_enqueue_script("bootstrap-js");
        
        wp_register_script("waypoints-js", "https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.5/waypoints.min.js", array(), false, true);
        wp_enqueue_script("waypoints-js");
        
        wp_enqueue_script("extraAO-back-to-top-js", plugins_url( "/assets/js/extraAO-back-to-top.js", __FILE__ ) );

        // Owl slider
        wp_enqueue_style("extraAO-slider-css-owl", plugins_url( "/assets/owl/owl.carousel.min.css", __FILE__ ) );
        wp_enqueue_style("extraAO-slider-css-owl-theme", plugins_url( "/assets/owl/owl.theme.default.css", __FILE__ ) );
        wp_enqueue_script("extraAO-slider-js-owl", plugins_url( "/assets/owl/owl.carousel.min.js", __FILE__ ) );
        // wp_enqueue_script("extraAO-slider-js", plugins_url( "/assets/js/extraAO-slider.js", __FILE__ ) );

        // Swiper Slider
        wp_enqueue_style("extraAO-slider-posts-main-css-swiper", plugins_url( "/assets/swiper/swiper-main-css.css", __FILE__ ) );
        wp_enqueue_script("extraAO-slider-js-swiper-main", plugins_url( "/assets/swiper/swiper-main.js", __FILE__ ) );
        wp_enqueue_style("extraAO-slider-posts-css-swiper", plugins_url( "/assets/swiper/style-slider-swiper.css", __FILE__ ) );

        wp_register_script("slick-js", "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js", array(), false, true);
        wp_enqueue_script("slick-js");

    }

    

    public function enqueue_scripts_admin() {
        wp_register_script("bootstrap-admin-js", "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js", array(), false, true);
        wp_enqueue_script("bootstrap-admin-js");
        
        wp_register_style( "bootstrap-admin-css", "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css", array(), false, "all" );
        wp_enqueue_style( "bootstrap-admin-css" );

        // Toggle Bootstrap
        wp_register_script("bootstrap-toogle-admin-js", "https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js", array(), false, true);
        wp_enqueue_script("bootstrap-toogle-admin-js");
        
        wp_register_style( "bootstrap-toogle-admin-css", "https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css", array(), false, "all" );
        wp_enqueue_style( "bootstrap-toogle-admin-css" );
        // END: Toggle Bootstrap
        
        wp_enqueue_style( 'extraAO-admin-style', plugins_url( '/assets/css/extraAO-admin-style.css', __FILE__ ), array(), null, false );
    }


    public function addPluginAdminMenu() {   
        $plugin_slug = 'extraAO';
        //add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
        add_menu_page( $plugin_slug, 'extraAO Settings', 'administrator', $plugin_slug, array( $this, 'displayPluginAdminDashboard'), 'dashicons-plugins-checked', 111 );

        // add_submenu_page( '$parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
        // add_submenu_page( $plugin_slug, 'Plugin Name Settings', 'Settings', 'administrator', $plugin_slug.'-settings', array( $this, 'displayPluginAdminSettings' ));
    }

    // Add custom setting link
    function my_plugin_settings_link($links) { 
        $settings_link = '<a href="options-general.php?page=extraAO">Settings</a>'; 
        array_unshift($links, $settings_link); 
        return $links; 
    }

    public function displayPluginAdminDashboard() {
        require_once plugin_dir_path( __FILE__ ) . 'admin/admin.php';
    }


    protected function render() {
    
    }

}


extraAO_Elementor_Widget::instance();



