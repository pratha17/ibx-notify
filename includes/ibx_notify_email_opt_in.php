<?php
        $coupons_args = array(
            'post_type'      => 'ibx_notify',
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
             $ibx_notify_design_button_text_color = get_post_meta($coupon->ID, 'ibx-notify-design-button-text-color', true);
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
        ?>
<?php if ( $ibx_notify_type == 'email' && $ibx_notify_config_active == 1 ) { ?>


    <?php if ( $ibx_notify_email_type == 'default' ) { ?>
            <div class="ibx-notify-toggel-button">
                <img src="<?php echo IBX_NOTIFY_URL . 'assest\img\min.png'; ?>" alt="" id="hide" style="display:none;">
                <img src="<?php echo IBX_NOTIFY_URL . 'assest\img\plus.png'; ?>" alt="" id="show">
                <!-- <span class="dashicons dashicons-plus-alt" id="show" style="display:none;"></span>
                <span class="dashicons dashicons-dismiss" id="hide"></span> -->
            </div>
            <div class="ibx-notify-email-wraper" style="display:none;">
                <div class="ibx-notify-email-container row">
                        <div class="ibx-notify-email-text">
                            <?php echo html_entity_decode( $ibx_notify_email_def_msg); ?>
                        </div>
                        <div class="input-group">
                          <input type="email" name="" value="" placeholder="<?php esc_html_e( $ibx_notify_email_def_place, 'ibx_notify' ); ?>" aria-describedby="basic-addon2">
                          <span class="input-group-addon btn btn-primary" id="basic-addon2">Send</span>
                        </div>
                </div>
            </div>

    <?php } ?>
    <?php if ( $ibx_notify_email_type == 'convertkit' ) { ?>

    <?php } ?>
    <?php if ( $ibx_notify_email_type == 'mailchimp' ) { ?>

    <?php } ?>
    <?php if ( $ibx_notify_email_type == 'custom' ) { ?>
            <div class="ibx-notify-email-wraper col-md-3">
                <div class="ibx-notify-email-container row">
                        <?php echo  $ibx_notify_email_cust_msg; ?>

                </div>
            </div>
    <?php } ?>


<?php } ?>

<style media="screen">
    <?php if ( $ibx_notify_design_position == 'bottom-right' ){ ?>
            .ibx-notify-toggel-button{
               position: fixed;
               bottom: 13px;
               left: 10px;
           }
            .ibx-notify-email-wraper{
                position: fixed;
                bottom: 60px;
                left: 60px;
            }
    <?php }elseif ( $ibx_notify_design_position == 'bottom-left' ){?>
            .ibx-notify-toggel-button{
               position: fixed;
               bottom: 13px;
               right: 10px;
               -moz-transform: scaleX(-1);
               -o-transform: scaleX(-1);
               -webkit-transform: scaleX(-1);
               transform: scaleX(-1);
           }
            .ibx-notify-email-wraper{
                position: fixed;
                bottom: 60px;
                right: 60px;
            }
    <?php } ?>
    .ibx-notify-email-container{
        background: <?php echo $ibx_notify_design_back_color; ?>;
        color: <?php echo $ibx_notify_design_text_color; ?>;
    }
    .ibx-notify-email-wraper .input-group span{
        background: <?php echo $ibx_notify_design_button_color; ?>;
        border-color: <?php echo $ibx_notify_design_button_color; ?>;
        color: <?php echo $ibx_notify_design_button_text_color; ?>;
    }
    .ibx-notify-email-wraper .input-group span:hover{
        background: <?php echo $ibx_notify_design_button_text_color; ?>;
        border-color: <?php echo $ibx_notify_design_button_text_color; ?>;
        color: <?php echo $ibx_notify_design_button_color; ?>;
    }
</style>
