<?php
/**
 * Handles all logices and admin settings.
 *
 * @since 1.0.0
 */
 // Exit if accessed directly
 if( !defined( 'ABSPATH' ) ) exit;

 if( !class_exists( 'IN_Ibx_Notify_Admin' ) ) {
class IN_Ibx_Notify_Admin{
/**
 * Setup Add Action
 *
 * @since 1.0.0
 * @return void
 */

    public function __construct() {
        add_action( 'init', array( $this, 'ibx_notify_admin' ) );
        add_action( 'admin_enqueue_scripts',array( $this, 'load_custom_scripts_admin' ) );
        // Save Meta Box
        add_action( 'save_post', array( $this, 'ibx_notify_save' ) );
    }

/**
* Setup Plugin
*
* @since 1.0.0
* @return void
*/
      public function ibx_notify_admin() {
      	$labels = array(
      		'name'                => esc_html__( 'IBX Notify', IBX_NOTIFY ),
      		'singular_name'       => esc_html__( 'IBX Notify', IBX_NOTIFY ),
      		'add_new'             => esc_html_x( 'Add New' , IBX_NOTIFY ) ,
      		'add_new_item'        => esc_html__( 'Add New', IBX_NOTIFY ),
      		'edit_item'           => esc_html__( 'Edit', IBX_NOTIFY ),
      		'new_item'            => esc_html__( 'New', IBX_NOTIFY ),
      		'view_item'           => esc_html__( 'View', IBX_NOTIFY ),
      		'search_items'        => esc_html__( 'Search', IBX_NOTIFY ),
      		'not_found'           => esc_html__( 'No Notification found', IBX_NOTIFY ),
      		'not_found_in_trash'  => esc_html__( 'No Notification found in Trash', IBX_NOTIFY ),
      		'parent_item_colon'   => esc_html__( 'Parent Notification:', IBX_NOTIFY ),
      		'menu_name'           => esc_html__( 'IBX Notify', IBX_NOTIFY ),
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
            'register_meta_box_cb' => array( $this, 'custom_meta_boxes' )
      	);
      	register_post_type( IBX_NOTIFY, $args );
      }
/**
 * Enqueue Scripts
 *
 * @since 1.0.0
 * @return void
 */
    public function load_custom_scripts_admin(){
          wp_enqueue_style( 'custom_plugin_css', IBX_URL .'assest/CSS/style.css', array(), null, 'all' );
      // app.js For Admin Section
          wp_enqueue_script( 'custom_plugin_js', IBX_URL .'assest/JS/app.js','','',true );
          wp_enqueue_script( 'wp-color-picker');
          wp_enqueue_style( 'wp-color-picker');
    }
/**
 * Add Meta Box
 *
 * @since     0.1
 */
    public function custom_meta_boxes() {
          add_meta_box(
              'display_meta_box',
              __( 'Display', IBX_NOTIFY ),
              array( $this, 'display_meta_box_callback' ),
              IBX_NOTIFY,
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
    require_once IBX_DIR . 'includes/display_meta_box_callback.php';
}

/**
* Save Meta Box to Database
*
* @since 1.0.0
* @return void
*/

       function ibx_notify_save( $post_id )
       {
           global $post;
           if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
           if( !isset( $_POST['ibx_notify_nonce'] ) || !wp_verify_nonce( $_POST['ibx_notify_nonce'], 'ib_ibx_notify_nonce' ) ) return;
           if( isset( $_POST['ibx-notify-config-active'] ) )
               update_post_meta( $post->ID, 'ibx-notify-config-active', sanitize_text_field( $_POST['ibx-notify-config-active'] ) );
           if( isset( $_POST['ibx-notify-config-hide-button'] ) )
                update_post_meta( $post->ID, 'ibx-notify-config-hide-button', sanitize_text_field( $_POST['ibx-notify-config-hide-button'] ) );
           if( isset( $_POST['ibx_notify_type'] ) )
               update_post_meta( $post->ID, 'ibx_notify_type', sanitize_text_field( $_POST['ibx_notify_type'] ) );
           if( isset( $_POST['ibx_notify_notification_bar_description'] ) )
               update_post_meta( $post->ID, 'ibx_notify_notification_bar_description', sanitize_text_field( htmlentities( $_POST['ibx_notify_notification_bar_description'] ) ) );
           if( isset( $_POST['ibx_notify_enable_countdown'] ) )
               update_post_meta( $post->ID, 'ibx_notify_enable_countdown', sanitize_text_field( $_POST['ibx_notify_enable_countdown'] ) );
           if( isset( $_POST['ibx_notify_notification_bar_countdown_text'] ) )
               update_post_meta( $post->ID, 'ibx_notify_notification_bar_countdown_text', sanitize_text_field( $_POST['ibx_notify_notification_bar_countdown_text'] ) );
           if( isset( $_POST['ibx_notify_notification_bar_countdown_days'] ) )
               update_post_meta( $post->ID, 'ibx_notify_notification_bar_countdown_days', sanitize_text_field( $_POST['ibx_notify_notification_bar_countdown_days'] ) );
           if( isset( $_POST['ibx_notify_notification_bar_countdown_hr'] ) )
               update_post_meta( $post->ID, 'ibx_notify_notification_bar_countdown_hr', sanitize_text_field( $_POST['ibx_notify_notification_bar_countdown_hr'] ) );
           if( isset( $_POST['ibx_notify_notification_bar_countdown_min'] ) )
               update_post_meta( $post->ID, 'ibx_notify_notification_bar_countdown_min', sanitize_text_field( $_POST['ibx_notify_notification_bar_countdown_min'] ) );
           if( isset( $_POST['ibx_notify_notification_bar_countdown_sec'] ) )
               update_post_meta( $post->ID, 'ibx_notify_notification_bar_countdown_sec', sanitize_text_field( $_POST['ibx_notify_notification_bar_countdown_sec'] ) );
           if( isset( $_POST['ibx-notify-enable-notification-email'] ) )
               update_post_meta( $post->ID, 'ibx-notify-enable-notification-email', sanitize_text_field( $_POST['ibx-notify-enable-notification-email'] ) );
           if( isset( $_POST['ibx-notify-notification-email'] ) )
               update_post_meta( $post->ID, 'ibx-notify-notification-email', sanitize_text_field( $_POST['ibx-notify-notification-email'] ) );
           if( isset( $_POST['ibx_notify_email_type'] ) )
               update_post_meta( $post->ID, 'ibx_notify_email_type', sanitize_text_field( $_POST['ibx_notify_email_type'] ) );
           if( isset( $_POST['ibx_notify_email_def_msg'] ) )
               update_post_meta( $post->ID, 'ibx_notify_email_def_msg', sanitize_text_field( htmlentities( $_POST['ibx_notify_email_def_msg'] ) ) );
           if( isset( $_POST['ibx_notify_email_def_place'] ) )
               update_post_meta( $post->ID, 'ibx_notify_email_def_place', sanitize_text_field( $_POST['ibx_notify_email_def_place'] ) );

           if( isset( $_POST['ibx_notify_email_def_sendmail'] ) )
               update_post_meta( $post->ID, 'ibx_notify_email_def_sendmail', sanitize_text_field( $_POST['ibx_notify_email_def_sendmail'] ) );
           if( isset( $_POST['ibx_notify_email_def_conmsg'] ) )
               update_post_meta( $post->ID, 'ibx_notify_email_def_conmsg', sanitize_text_field( $_POST['ibx_notify_email_def_conmsg'] ) );
           if( isset( $_POST['ibx_notify_email_convertkit_id'] ) )
               update_post_meta( $post->ID, 'ibx_notify_email_convertkit_id', sanitize_text_field( $_POST['ibx_notify_email_convertkit_id'] ) );
           if( isset( $_POST['ibx_notify_email_convertkit_conmsg'] ) )
               update_post_meta( $post->ID, 'ibx_notify_email_convertkit_conmsg', sanitize_text_field( $_POST['ibx_notify_email_convertkit_conmsg'] ) );
           if( isset( $_POST['ibx_notify_email_mailchimp_id'] ) )
               update_post_meta( $post->ID, 'ibx_notify_email_mailchimp_id', sanitize_text_field( $_POST['ibx_notify_email_mailchimp_id'] ) );
           if( isset( $_POST['ibx_notify_email_mailchimp_conmsg'] ) )
               update_post_meta( $post->ID, 'ibx_notify_email_mailchimp_conmsg', sanitize_text_field( $_POST['ibx_notify_email_mailchimp_conmsg'] ) );
           if( isset( $_POST['ibx_notify_email_cust_msg'] ) )
               update_post_meta( $post->ID, 'ibx_notify_email_cust_msg', ( $_POST['ibx_notify_email_cust_msg'] ) );
           if( isset( $_POST['ibx_notify_email_cust_conmsg'] ) )
               update_post_meta( $post->ID, 'ibx_notify_email_cust_conmsg', sanitize_text_field( $_POST['ibx_notify_email_cust_conmsg'] ) );
           if( isset( $_POST['ibx_notify_cust_msg_msg'] ) )
               update_post_meta( $post->ID, 'ibx_notify_cust_msg_msg', sanitize_text_field( htmlentities( $_POST['ibx_notify_cust_msg_msg'] ) ) );
           if( isset( $_POST['ibx_notify_sale_msg'] ) )
               update_post_meta( $post->ID, 'ibx_notify_sale_msg', sanitize_text_field( $_POST['ibx_notify_sale_msg'] ) );
            $name = array_map( 'esc_attr', $_POST['ibx-notify-sale-name'] );
            $email = array_map( 'sanitize_email', $_POST['ibx-notify-sale-email'] );
           if( isset( $_POST['ibx-notify-sale-name'] ) )
               update_post_meta( $post->ID, 'ibx-notify-sale-name', $name );
           if( isset( $_POST['ibx-notify-sale-email'] ) )
               update_post_meta( $post->ID, 'ibx-notify-sale-email', $email );

           if( isset( $_POST['ibx-notify-design-position'] ) )
               update_post_meta( $post->ID, 'ibx-notify-design-position', sanitize_text_field( $_POST['ibx-notify-design-position'] ) );
           if( isset( $_POST['ibx-notify-design-text-color'] ) )
               update_post_meta( $post->ID, 'ibx-notify-design-text-color', sanitize_text_field( $_POST['ibx-notify-design-text-color'] ) );
           if( isset( $_POST['ibx-notify-design-back-color'] ) )
               update_post_meta( $post->ID, 'ibx-notify-design-back-color', sanitize_text_field( $_POST['ibx-notify-design-back-color'] ) );
           if( isset( $_POST['ibx-notify-design-button-color'] ) )
               update_post_meta( $post->ID, 'ibx-notify-design-button-color', sanitize_text_field( $_POST['ibx-notify-design-button-color'] ) );
           if( isset( $_POST['ibx-notify-visibility-page'] ) )
               update_post_meta( $post->ID, 'ibx-notify-visibility-page', sanitize_text_field( $_POST['ibx-notify-visibility-page'] ) );
           if( isset( $_POST['ibx-notify-visibility-log'] ) )
               update_post_meta( $post->ID, 'ibx-notify-visibility-log', sanitize_text_field( $_POST['ibx-notify-visibility-log'] ) );
           if( isset( $_POST['ibx-notify-visibility-visit'] ) )
               update_post_meta( $post->ID, 'ibx-notify-visibility-visit', sanitize_text_field( $_POST['ibx-notify-visibility-visit'] ) );
           if( isset( $_POST['ibx-notify-visibility-show'] ) )
               update_post_meta( $post->ID, 'ibx-notify-visibility-show', sanitize_text_field( $_POST['ibx-notify-visibility-show'] ) );
           if( isset( $_POST['ibx-notify-visibility-show-delay'] ) )
               update_post_meta( $post->ID, 'ibx-notify-visibility-show-delay', sanitize_text_field( $_POST['ibx-notify-visibility-show-delay'] ) );
           if( isset( $_POST['ibx-notify-visibility-disappear'] ) )
               update_post_meta( $post->ID, 'ibx-notify-visibility-disappear', sanitize_text_field( $_POST['ibx-notify-visibility-disappear'] ) );
           if( isset( $_POST['ibx-notify-visibility-disappear-delay'] ) )
               update_post_meta( $post->ID, 'ibx-notify-visibility-disappear-delay', sanitize_text_field( $_POST['ibx-notify-visibility-disappear-delay'] ) );
           if( isset( $_POST['ibx-notify-visibility-appear-hide'] ) )
               update_post_meta( $post->ID, 'ibx-notify-visibility-appear-hide', sanitize_text_field( $_POST['ibx-notify-visibility-appear-hide'] ) );
           if( isset( $_POST['ibx-notify-visibility-appear'] ) )
               update_post_meta( $post->ID, 'ibx-notify-visibility-appear', sanitize_text_field( $_POST['ibx-notify-visibility-appear'] ) );
       }

}

$IN_Ibx_Notify_Admin = new IN_Ibx_Notify_Admin();
}
