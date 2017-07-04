<?php
/**
* Handles all logices and admin settings.
*
* @since 1.0.0
*/
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'Ibx_Notify_Admin' ) ) {
    class Ibx_Notify_Admin{
        /**
        * Setup Add Action
        *
        * @since 1.0.0
        * @return void
        */

        public function __construct() {
            $this->display_meta_box_callback();
            add_action( 'init', array( $this, 'ibx_notify_admin' ) );
            add_action( 'admin_enqueue_scripts',array( $this, 'load_custom_scripts_admin' ) );
        }

        /**
        * Setup Plugin
        *
        * @since 1.0.0
        * @return void
        */
        public function ibx_notify_admin() {
            $labels = array(
                'name'                => esc_html__( 'IBX Notify', 'ibx_notify' ),
                'singular_name'       => esc_html__( 'IBX Notify', 'ibx_notify' ),
                'add_new'             => esc_html__( 'Add New', 'ibx_notify' ) ,
                'add_new_item'        => esc_html__( 'Add New', 'ibx_notify' ),
                'edit_item'           => esc_html__( 'Edit', 'ibx_notify' ),
                'new_item'            => esc_html__( 'New', 'ibx_notify' ),
                'view_item'           => esc_html__( 'View', 'ibx_notify' ),
                'search_items'        => esc_html__( 'Search', 'ibx_notify' ),
                'not_found'           => esc_html__( 'No Notification found', 'ibx_notify' ),
                'not_found_in_trash'  => esc_html__( 'No Notification found in Trash', 'ibx_notify' ),
                'parent_item_colon'   => esc_html__( 'Parent Notification:', 'ibx_notify' ),
                'menu_name'           => esc_html__( 'IBX Notify', 'ibx_notify' ),
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
        }
/**
 * Enqueue Scripts
 *
 * @since 1.0.0
 * @return void
 */
    public function load_custom_scripts_admin(){
          wp_enqueue_script( 'custom_plugin_js', IBX_NOTIFY_URL .'assest/JS/app.js','','',true );
    }
/**
* Add Meta Box
*
* @since     0.1
*/
public function custom_meta_boxes() {
    add_meta_box(
        'display_meta_box',
        __( 'Display', 'ibx_notify' ),
        array( $this, 'display_meta_box_callback' ),
        'ibx_notify',
        'normal',
        'high'
    );
}
/**
* Display appearance meta box
*
* @since     0.1
*/
public function display_meta_box_callback(  ) {
    require_once IBX_NOTIFY_DIR . 'includes/mbt/metabox-tabs.php';
    require_once IBX_NOTIFY_DIR . 'includes/metabox.php';
}
    }

    $Ibx_Notify_Admin = new Ibx_Notify_Admin();
}
