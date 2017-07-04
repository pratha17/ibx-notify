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

        public static $active = array();
        public static $ip_addr = array();
        /**
        * Setup Add Action
        *
        * @since 1.0.0
        * @return void
        */

        public function __construct() {
            add_action( 'wp_enqueue_scripts',array( $this, 'load_custom_scripts_frontend' ) );
            add_action( 'wp', array( $this, 'get_active_items' ) );
            add_action( 'wp_footer', array( $this, 'ibx_notify_frontend' ) );
            add_action( 'wp_footer', array( $this, 'maybe_display_items' ) );
            add_action( 'init', array( $this, 'ip_addr_cookie' ) );
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

        public function get_active_items() {
            $args = array( 'post_type' => 'ibx_notify' );
            // The Query
            $the_query = new WP_Query( $args );

            // The Loop
            if ( $the_query->have_posts() ) {

                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    $id = get_the_id();
                    $settings = MetaBox_Tabs::get_metabox_settings( $id );

                    if( $settings->active_check != '1' )
                    continue;

                    self::$active[] = strval( $id );
                }

                /* Restore original Post Data */
                wp_reset_postdata();
            }

        }
        /**
        * Show the box
        *
        * @since       0.1.0
        * @return      HTML
        */
        public function maybe_display_items() {

            // do checks for page conditionals, logged in, etc here
            foreach ( self::$active as $key => $id) {
                $settings = MetaBox_Tabs::get_metabox_settings( $id );

                $logged_in = is_user_logged_in();
                $logged_in_meta = $settings->visibility_display;

                // check logged in conditional
                if( $logged_in && $logged_in_meta === 'logged_out' || !$logged_in && $logged_in_meta === 'logged_in' )
                continue;

                $page       = $settings->page;
                $ids        = $settings->page_ids;

                $sanitized  = preg_replace('/\s+/', '', $ids);
                $page_ids   = explode( ',', $sanitized );
                $page_id    = get_the_ID();


                // if page conditionals set, only show on those pages
                if ( 'certain-pages' == $page && is_array( $page_ids ) && !in_array( $page_id, $page_ids ) )
                continue;

                $current_ip = $_SERVER['REMOTE_ADDR'];
                $visitors   = $settings->visibility_visitors;

                if (isset($_COOKIE['ip_addr']) ) {
                    $ip_addr    = str_replace('\"', '', $_COOKIE['ip_addr']);
                    $ip_addr    = str_replace('[', '', $ip_addr);
                    $ip_addr    = str_replace(']', '', $ip_addr);
                }else{
                    $ip_addr    = '';
                }

                // // if page conditionals set, only show on those pages
                if( 'new' == $visitors && $current_ip == $ip_addr || 'returning' == $visitors && $current_ip != $ip_addr )
                continue;
                // $type = $settings->type;
                // $this->ibx_notify_frontend( $id, $type );

                $this->ibx_notify_frontend( $id );
            }
        }

        /**
        * Display Notification Bar
        *
        * @since     0.1
        */
        // public function ibx_notify_frontend( $id, $type ) {
        public function ibx_notify_frontend( $id ) {
            $settings = MetaBox_Tabs::get_metabox_settings( $id );
            $type = $settings->type;

            switch ($type) {
                case "not_bar":
                    require IBX_NOTIFY_DIR . 'includes/frontend-notification-bar.php';
                    break;
                case "msg":
                    require IBX_NOTIFY_DIR . 'includes/frontend-custom-msg.php';
                    break;
                case "purchase":
                    require IBX_NOTIFY_DIR . 'includes/frontend-popup-notify.php';
                    break;
                case "reviews":
                    require IBX_NOTIFY_DIR . 'includes/frontend-popup-notify.php';
                    break;
            }


        }

        function ip_addr_cookie() {
            session_start();
            $_SESSION["PageLoad"] = 1;
            $ip = $_SERVER['REMOTE_ADDR'];
            self::$ip_addr[] = $ip;
            $r = json_encode(self::$ip_addr);
            setcookie('ip_addr', $r );
        }
    }

    $Ibx_Notify_Frontend = new Ibx_Notify_Frontend();
}
