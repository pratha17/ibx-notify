<?php
/**
* Handles logic for post types.
*
* @since 1.0.0
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'IBX_Notify_Posttype' ) ) {

    class IBX_Notify_Posttype{
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
            add_action( 'init', array( $this, 'register_post_type' ) );
            add_action( 'admin_enqueue_scripts', array( $this, 'load_scripts' ) );

            $this->load_metabox();
        }

        /**
         * Registers a post type.
         *
         * @since 1.0.0
         * @return void
         */
        public function register_post_type()
        {
            $labels = array(
                'name'                => esc_html__( 'IBX Notify', 'ibx-notify' ),
                'singular_name'       => esc_html__( 'IBX Notify', 'ibx-notify' ),
                'add_new'             => esc_html__( 'Add New', 'ibx-notify' ) ,
                'add_new_item'        => esc_html__( 'Add New', 'ibx-notify' ),
                'edit_item'           => esc_html__( 'Edit', 'ibx-notify' ),
                'new_item'            => esc_html__( 'New', 'ibx-notify' ),
                'view_item'           => esc_html__( 'View', 'ibx-notify' ),
                'search_items'        => esc_html__( 'Search', 'ibx-notify' ),
                'not_found'           => esc_html__( 'No Notification found', 'ibx-notify' ),
                'not_found_in_trash'  => esc_html__( 'No Notification found in Trash', 'ibx-notify' ),
                'parent_item_colon'   => esc_html__( 'Parent Notification:', 'ibx-notify' ),
                'menu_name'           => esc_html__( 'IBX Notify', 'ibx-notify' ),
            );
            $args = array(
                'labels'              => $labels,
                'hierarchical'        => false,
                'description'         => 'description',
                'taxonomies' 		  => array( '' ),
                'public'              => true,
                'show_ui'             => true,
                'show_in_menu'        => true,
                'show_in_admin_bar'   => true,
                'menu_position'       => null,
                'menu_icon'           => 'dashicons-info',
                'show_in_nav_menus'   => true,
                'publicly_queryable'  => true,
                'exclude_from_search' => false,
                'has_archive'         => '',
                'query_var'           => true,
                'can_export'          => true,
                'rewrite'             => '',
                'capability_type'     => 'post',
                'supports'            => array( 'title' ),
            );
            register_post_type( 'ibx_notify', $args );
            flush_rewrite_rules();
        }

        /**
    	 * Enqueue styles and scripts.
    	 *
    	 * @since 1.0.0
    	 * @return void
    	 */
        public function load_scripts( $hook )
        {
            global $post_type;

            if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
                if ( 'ibx_notify' == $post_type ) {
                    wp_enqueue_style( 'ibx-notify-admin-style', IBX_NOTIFY_URL . 'assets/css/admin.css', array() );
                }
            }
        }

        /**
         * Display appearance meta box
         *
         * @since 1.0.0
         */
        public function load_metabox()
        {
            require_once IBX_NOTIFY_DIR . 'includes/mbt/metabox-tabs.php';
            require_once IBX_NOTIFY_DIR . 'includes/metabox.php';
        }
    }

    $ibx_notify_posttype = new IBX_Notify_Posttype();
}
