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
             $ibx_notify_type = get_post_meta($coupon->ID, 'ibx_notify_type', true);
             $ibx_notify_cust_msg_msg = get_post_meta($coupon->ID, 'ibx_notify_cust_msg_msg', true);
         }
        ?>

<?php if ( $ibx_notify_type == 'msg' && $ibx_notify_config_active == 1 ) { ?>
    <div class="ibx-notify-email-wraper">
        <div class="ibx-notify-email-container">
                <div class="ibx-notify-email-text">
                    <?php echo html_entity_decode( $ibx_notify_cust_msg_msg); ?>
                </div>
        </div>
    </div>
<?php } ?>
