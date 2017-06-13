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

             $ibx_notify_sale_msg = get_post_meta($coupon->ID, 'ibx_notify_sale_msg', true);
             $ibx_notify_sale_name = get_post_meta($coupon->ID, 'ibx-notify-sale-name', true);
             $ibx_notify_sale_email = get_post_meta($coupon->ID, 'ibx-notify-sale-email', true);

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
        ?>

<?php if ( $ibx_notify_type == 'sale' && $ibx_notify_config_active == 1 ) { ?>

        

<?php } ?>
