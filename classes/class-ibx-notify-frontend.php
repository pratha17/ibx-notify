<?php

/**
 * Handles all logices and frontend configuration.
 *
 * @since 1.0.0
 */

 // Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'IBX_Notify_Frontend' ) ) {

    class IBX_Notify_Frontend {

        public static $active = array();
        public static $is_cookie_set = 0;

        /**
         * Primary class constructor.
         *
         * @since 1.0.0
         * @return void
         */
        public function __construct()
        {
            $this->init_hooks();
        }

        /**
         * Initialize hooks and filters.
         *
         * @since 1.0.0
         * @return void
         */
        public function init_hooks()
        {
            add_action( 'init', array( $this, 'set_cookie' ) );
            add_action( 'wp_enqueue_scripts', array( $this, 'load_scripts' ) );
            add_action( 'wp', array( $this, 'get_active_items' ) );
            add_action( 'wp_footer', array( $this, 'maybe_display_items' ) );
        }

        public function set_cookie()
        {
            $cookie_ip = ( isset( $_COOKIE['ibx_notify_ip'] ) ) ? $_COOKIE['ibx_notify_ip'] : '';
            if ( empty( $cookie_ip ) ) {
                $current_ip = $this->get_client_ip();
                setcookie( 'ibx_notify_ip', $current_ip, strtotime('+1 month'), "/" );
                self::$is_cookie_set = 1;
            }
        }

        /**
    	 * Enqueue styles and scripts.
    	 *
    	 * @since 1.0.0
    	 * @return void
    	 */
        public function load_scripts()
        {
            wp_enqueue_style( 'ibx-notify-frontend-style', IBX_NOTIFY_URL . 'assets/css/frontend.css', array() );

            wp_enqueue_script( 'jquery-cookie-script', IBX_NOTIFY_URL . 'assets/js/jquery.cookie.js', array('jquery'), '' );
            wp_enqueue_script( 'ibx-notify-frontend-script', IBX_NOTIFY_URL . 'assets/js/frontend.js', array('jquery'), '', true );
        }

        /**
    	 * Get all active notifications.
    	 *
    	 * @since 1.0.0
    	 * @return void
    	 */
        public function get_active_items()
        {
            // WP Query arguments.
            $args = array(
                'post_type'         => 'ibx_notify',
                'posts_per_page'    => '-1',
                'meta_query'        => array(
                    array(
                        'key'           => 'ibx_notify_active_check',
                        'value'         => '1',
                        'compare'       => '='
                    )
                )
            );

            // Get the notification posts.
            $posts = get_posts( $args );

            if ( count( $posts ) ) {
                foreach ( $posts as $post ) {
                    self::$active[] = $post->ID;
                }
            }
        }

        /**
         * Render the notification.
         *
         * @since 1.0.0
         * @return void
         */
        public function maybe_display_items()
        {
            // Return if there is no notification.
            if ( empty( self::$active ) ) {
                return;
            }

            // Conversions.
            $conversion_ids = array();

            // Do check for page conditions, logged in, etc here.
            foreach ( self::$active as $id ) {
                $settings = MetaBox_Tabs::get_metabox_settings( $id );

                $logged_in = is_user_logged_in();
                $logged_in_meta = $settings->visibility_display;

                // Check logged in condition.
                if ( ( $logged_in && $logged_in_meta == 'logged_out' ) || ( ! $logged_in && $logged_in_meta == 'logged_in' ) ) {
                    continue;
                }

                $page       = $settings->page;
                $ids        = $settings->page_ids;
                $page_ids   = array();
                $page_id    = get_the_ID();

                if ( ! empty( $ids ) ) {
                    $sanitized  = preg_replace('/\s+/', '', $ids);
                    $page_ids   = explode( ',', $sanitized );
                }

                // if page conditions are set, only show on those pages
                if ( 'certain-pages' == $page && is_array( $page_ids ) && ! in_array( $page_id, $page_ids ) ) {
                    continue;
                }

                $current_ip = $this->get_client_ip();
                $visitors   = $settings->visibility_visitors;
                $cookie_ip  = ( isset( $_COOKIE['ibx_notify_ip'] ) ) ? $_COOKIE['ibx_notify_ip'] : '';

                // New visitors.
                if ( 'new' == $visitors ) {
                    if ( $cookie_ip == $current_ip && ! self::$is_cookie_set ) {
                        continue;
                    }
                }

                switch ( $settings->type ) {
                    case "fomo_bar":
                        require IBX_NOTIFY_DIR . 'includes/frontend-fomo-bar.php';
                        break;
                    case "conversion":
                        $conversion_ids[] = $id;
                        break;
                    case "reviews":
                        require IBX_NOTIFY_DIR . 'includes/frontend-conversion.php';
                        break;
                    default:
                        break;
                }
            }

            if ( ! empty( $conversion_ids ) ) {
                ?>
                <script type="text/javascript">
                    var ibx_fomo_conversion_nonce = '<?php echo wp_create_nonce('ibx_fomo_conversion_nonce_front'); ?>';
                    var ibx_fomo_conversion_ids = <?php echo json_encode( $conversion_ids ); ?>;
                </script>
                <?php
            }
        }

        /**
         * Get IP address of the client.
         *
         * @since 1.0.0
         * @return string
         */
        public function get_client_ip() {
            $ipaddress = '';
            if (getenv('HTTP_CLIENT_IP'))
                $ipaddress = getenv('HTTP_CLIENT_IP');
            else if(getenv('HTTP_X_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
            else if(getenv('HTTP_X_FORWARDED'))
                $ipaddress = getenv('HTTP_X_FORWARDED');
            else if(getenv('HTTP_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_FORWARDED_FOR');
            else if(getenv('HTTP_FORWARDED'))
               $ipaddress = getenv('HTTP_FORWARDED');
            else if(getenv('REMOTE_ADDR'))
                $ipaddress = getenv('REMOTE_ADDR');
            else
                $ipaddress = 'UNKNOWN';
            return $ipaddress;
        }
    }

    $ibx_notify_frontend = new IBX_Notify_Frontend();
}
