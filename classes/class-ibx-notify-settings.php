<?php
 class IN_Ibx_Notify_Settings{

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
          wp_enqueue_style( 'custom_plugin_css', IBX_URL .'assest/CSS/style.css', array(), null, 'all' );
          wp_enqueue_script( 'custom_plugin_js', IBX_URL .'assest/JS/app.js','','',true );
      }

    function ibx_notify_settings_menu() {
         add_submenu_page( 'edit.php?post_type=ibx_notify',
                            __( 'Settings' ),
                            __( 'Settings' ),
                            'manage_options',
                            'ibx_notify',
                            array($this,'ibx_notify_settings_page')
                    );
     }

     // Building the Options Page
    function ibx_notify_settings_page(){
        require_once IBX_DIR . 'includes/display_settings_callback.php';
    }

     // Register the Settings
    function ibx_notify_register_settings() {

    }


 }

$IN_Ibx_Notify_Settings = new IN_Ibx_Notify_Settings();