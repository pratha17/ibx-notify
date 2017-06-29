<?php

/**
* Handles all logices and settings configuration.
*
* @since 1.0.0
*/
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;
if( !class_exists( 'Ibx_Notify_Settings' ) ) {

    class Ibx_Notify_Settings{

        /**
        * Meta Box Add Action
        *
        * @since 1.0.0
        * @return void
        */
        public function __construct() {
            add_action( 'admin_menu', array($this,'ibx_notify_settings_menu') );
            add_action( 'admin_init', array($this, 'ibx_notify_register_settings' ) );
            add_action( 'admin_enqueue_scripts', array($this, 'ibx_notify_settings_enqueue' ) );
        }

        function ibx_notify_settings_enqueue() {
            wp_enqueue_style( 'custom_plugin_css', IBX_NOTIFY_URL .'assest/CSS/style.css', array(), null, 'all' );
            wp_enqueue_script( 'custom_plugin_js', IBX_NOTIFY_URL .'assest/JS/app.js','','',true );
        }

        function ibx_notify_settings_menu() {
            add_submenu_page( 'edit.php?post_type=ibx_notify',
            __( 'Settings' ),
            __( 'Settings' ),
            'manage_options',
            'ibx-notify',
            array($this,'ibx_notify_settings_page')
        );
    }

    // Building the Options Page
    function ibx_notify_settings_page(){
        require_once IBX_NOTIFY_DIR . 'includes/display_settings_callback.php';
    }
    // Register the Settings
    function ibx_notify_register_settings() {
    }
}
$Ibx_Notify_Settings = new Ibx_Notify_Settings();
}
