<?php
        $coupons_args = array(
            'post_type'      => IBX_NOTIFY,
            'post_status'    => 'publish',
            'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
        );
        $coupons = new WP_Query($coupons_args);
        foreach ( $coupons->posts as $coupon ) {
             $post_title = $coupon->post_title;
             $ibx_notify_config_active = get_post_meta($coupon->ID, 'ibx-notify-config-active', true);
             $ibx_notify_config_hide_button = get_post_meta($coupon->ID, 'ibx-notify-config-hide-button', true);
             $ibx_notify_type = get_post_meta($coupon->ID, 'ibx_notify_type', true);

             $ibx_notify_notification_bar_description = get_post_meta($coupon->ID, 'ibx_notify_notification_bar_description', true);
             $ibx_notify_enable_countdown = get_post_meta($coupon->ID, 'ibx_notify_enable_countdown', true);
             $ibx_notify_notification_bar_countdown_text = get_post_meta($coupon->ID, 'ibx_notify_notification_bar_countdown_text', true);
             $ibx_notify_notification_bar_countdown_days = get_post_meta($coupon->ID, 'ibx_notify_notification_bar_countdown_days', true);
             $ibx_notify_notification_bar_countdown_hr = get_post_meta($coupon->ID, 'ibx_notify_notification_bar_countdown_hr', true);
             $ibx_notify_notification_bar_countdown_min = get_post_meta($coupon->ID, 'ibx_notify_notification_bar_countdown_min', true);
             $ibx_notify_notification_bar_countdown_sec = get_post_meta($coupon->ID, 'ibx_notify_notification_bar_countdown_sec', true);

             $ibx_notify_enable_notification_email = get_post_meta($coupon->ID, 'ibx-notify-enable-notification-email', true);
             $ibx_notify_notification_email = get_post_meta($coupon->ID, 'ibx-notify-notification-email', true);
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

<?php if ( $ibx_notify_type == 'not_bar' && $ibx_notify_config_active == 1 ) { ?>

        <div class="ibx-notify-notification-bar-wraper" data-time="">
            <div class="ibx-notify-notification-bar-container">
                <a class="ibx-notify-notification-bar-close" title="Close" style="">×</a>
                <?php if ( $ibx_notify_enable_countdown == 1 ){ ?>
                    <div class="ibx-notify-notification-bar-timer">
                        <div class="ibx-notify-notification-bar-timer-text">
                            <p>
                                <?php esc_html_e( $ibx_notify_notification_bar_countdown_text, IBX_NOTIFY ); ?>
                            </p>
                        </div>
                            <div class="ibx-notify-notification-bar-timer-counter" data-time="<?php echo  $ibx_notify_notification_bar_countdown_days.','.$ibx_notify_notification_bar_countdown_hr.','.$ibx_notify_notification_bar_countdown_min.','.$ibx_notify_notification_bar_countdown_sec ; ?>">
                                <p id="ibx-notify-notification-bar-start">0d 0h 0m 0s</p>
                            </div>
                    </div>
                <?php }; ?>
                <div class="ibx-notify-notification-bar-text">
                    <div class="ibx-notify-notification-bar-text-wrap">
                        <div class="ibx-notify-notification-bar-text-content" data-editable="true">
                            <?php echo html_entity_decode( $ibx_notify_notification_bar_description ); ?>
                        </div>
                    </div>
                </div>
                <?php if ( $ibx_notify_enable_notification_email == 1 ){ ?>
                    <!-- <div class="input-group">
                      <span class="input-group-addon button button-primary" id="basic-addon2">Send</span>
                    </div> -->
                    <div class="ibx-notify-notification-bar-email">
                        <input type="email" name="" value="" placeholder="<?php esc_html_e( $ibx_notify_notification_email, IBX_NOTIFY ); ?>" aria-describedby="basic-addon2">
                        <input type="button" name="" value="Send" class="button button-primary">
                    </div>
                    <?php } ?>
            </div>
        </div>

<?php } ?>
