<?php

/**
* Handles all logices and frontend configuration.
*
* @since 1.0.0
*/
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;
if( !class_exists( 'Ibx_Notify_Frontend' ) ) {

    class Ibx_Notify_Frontend{
        /**
        * Setup Add Action
        *
        * @since 1.0.0
        * @return void
        */

        public function __construct() {
            add_action( 'wp_enqueue_scripts',array( $this, 'load_custom_scripts_frontend' ) );
            add_action( 'wp_footer', array( $this, 'ibx_notify_notification_bar' ) );
            add_action( 'wp_footer', array( $this, 'ibx_notify_custom_msg' ) );
            add_action( 'wp_footer', array( $this, 'ibx_notify_popup_notify' ) );
        }

        /**
        * Enqueue Scripts
        * @since 1.0.0
        * @return void
        */
        public function load_custom_scripts_frontend(){
            wp_enqueue_style( 'custom_plugin_css', IBX_NOTIFY_URL .'assest/CSS/frontend.css', array(), null, 'all' );
            wp_enqueue_script( 'custom_plugin_js', IBX_NOTIFY_URL .'assest/JS/frontend.js','','',true );
            wp_enqueue_script( 'wofomo_cookie_js', IBX_NOTIFY_URL .'assest/JS/jquery.cookie.js', '' , '' , true );
        }

        /**
        * Display Notification Bar
        *
        * @since     0.1
        */
        public function ibx_notify_notification_bar() {
            require_once IBX_NOTIFY_DIR . 'includes/ibx_notify_notification_bar.php';
        }


        /**
        * Display Custom Message
        *
        * @since     0.1
        */
        public function ibx_notify_custom_msg() {
            require_once IBX_NOTIFY_DIR . 'includes/ibx_notify_custom_msg.php';
        }

        /**
        * Display Sale Notification
        *
        * @since     0.1
        */
        public function ibx_notify_popup_notify() {
            require_once IBX_NOTIFY_DIR . 'includes/ibx_notify_popup_notify.php';
        }

    }

    $Ibx_Notify_Frontend = new Ibx_Notify_Frontend();
}
