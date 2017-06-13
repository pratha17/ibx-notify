<?php
        $coupons_args = array(
            'post_type'      => IBX_NOTIFY,
            'post_status'    => 'publish',
            'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
        );
        $coupons = new WP_Query($coupons_args);
        // print_r($coupons);
        foreach ( $coupons->posts as $coupon ) {
             $post_title = $coupon->post_title;
             $ibx_notify_config_active = get_post_meta($coupon->ID, 'ibx-notify-config-active', true);
             $ibx_notify_config_hide_button = get_post_meta($coupon->ID, 'ibx-notify-config-hide-button', true);
             $ibx_notify_type = get_post_meta($coupon->ID, 'ibx_notify_type', true);

             $ibx_notify_email_type = get_post_meta($coupon->ID, 'ibx_notify_email_type', true);
             $ibx_notify_email_def_msg = get_post_meta($coupon->ID, 'ibx_notify_email_def_msg', true);
             $ibx_notify_email_def_place = get_post_meta($coupon->ID, 'ibx_notify_email_def_place', true);
             $ibx_notify_email_def_sendmail = get_post_meta($coupon->ID, 'ibx_notify_email_def_sendmail', true);
             $ibx_notify_email_def_conmsg = get_post_meta($coupon->ID, 'ibx_notify_email_def_conmsg', true);
             $ibx_notify_email_convertkit_id = get_post_meta($coupon->ID, 'ibx_notify_email_convertkit_id', true);
             $ibx_notify_email_convertkit_conmsg = get_post_meta($coupon->ID, 'ibx_notify_email_convertkit_conmsg', true);
             $ibx_notify_email_mailchimp_id = get_post_meta($coupon->ID, 'ibx_notify_email_mailchimp_id', true);
             $ibx_notify_email_mailchimp_conmsg = get_post_meta($coupon->ID, 'ibx_notify_email_mailchimp_conmsg', true);
             $ibx_notify_email_cust_msg = get_post_meta($coupon->ID, 'ibx_notify_email_cust_msg', true);
             $ibx_notify_email_cust_conmsg = get_post_meta($coupon->ID, 'ibx_notify_email_cust_conmsg', true);

             $ibx_notify_design_position = get_post_meta($coupon->ID, 'ibx-notify-design-position', true);
             $ibx_notify_design_text_color = get_post_meta($coupon->ID, 'ibx-notify-design-text-color', true);
             $ibx_notify_design_back_color = get_post_meta($coupon->ID, 'ibx-notify-design-back-color', true);
             $ibx_notify_design_button_color = get_post_meta($coupon->ID, 'ibx-notify-design-button-color', true);
             $ibx_notify_visibility_page = get_post_meta($coupon->ID, 'ibx-notify-visibility-page', true);
             $ibx_notify_visibility_log = get_post_meta($coupon->ID, 'ibx-notify-visibility-log', true);
             $ibx_notify_visibility_visit = get_post_meta($coupon->ID, 'ibx-notify-visibility-visit', true);
             $ibx_notify_visibility_show = get_post_meta($coupon->ID, 'ibx-notify-visibility-show', true);
             $ibx_notify_visibility_show_delay = get_post_meta($coupon->ID, 'ibx-notify-visibility-show-delay', true);
             $ibx_notify_visibility_disappear = get_post_meta($coupon->ID, 'ibx-notify-visibility-disappear', true);
             $ibx_notify_visibility_disappear_delay = get_post_meta($coupon->ID, 'ibx-notify-visibility-disappear-delay', true);
             $ibx_notify_visibility_appear = get_post_meta($coupon->ID, 'ibx-notify-visibility-appear', true);
             $ibx_notify_visibility_appear_hide = get_post_meta($coupon->ID, 'ibx-notify-visibility-appear-hide', true);
         }
         print_r($ibx_notify_email_def_msg);
        ?>

<?php if ( $ibx_notify_type == 'email' && $ibx_notify_config_active == 1 ) { ?>


    <?php if ( $ibx_notify_email_type == 'default' ) { ?>
            <div class="ibx-notify-email-wraper">
                <div class="ibx-notify-email-container">
                        <div class="ibx-notify-email-text">
                            <img class=" wp-image-503 alignleft" src="http://localhost/wordpress/wp-content/uploads/2017/04/testimonial-300x300.png" alt="" width="99" height="99" />Prashant just purchased this awesome product
                            <?php esc_html_e( $ibx_notify_email_def_msg, IBX_NOTIFY ); ?>
                        </div>
                        <div class="ibx-notify-email-input">
                            <input type="email" name="" value="" placeholder="<?php esc_html_e( $ibx_notify_email_def_place, IBX_NOTIFY ); ?>">
                            <input type="button" name="" value="Send" class="button button-primary">
                        </div>
                </div>
            </div>

    <?php } ?>
    <?php if ( $ibx_notify_email_type == 'convertkit' ) { ?>

    <?php } ?>
    <?php if ( $ibx_notify_email_type == 'mailchimp' ) { ?>

    <?php } ?>
    <?php if ( $ibx_notify_email_type == 'custom' ) { ?>

    <?php } ?>


<?php } ?>
