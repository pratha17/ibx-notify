<?php
     global $post;
     $values = get_post_custom( $post->ID );

     $ibx_notify_config_active = isset( $values['ibx-notify-config-active'] ) ? esc_attr( $values['ibx-notify-config-active'][0] ) : '';
     $ibx_notify_config_hide_button = isset( $values['ibx-notify-config-hide-button'] ) ? esc_attr( $values['ibx-notify-config-hide-button'][0] ) : '';
     $ibx_notify_type = isset( $values['ibx_notify_type'] ) ? esc_attr( $values['ibx_notify_type'][0] ) : '';
     $ibx_notify_notification_bar_description = isset( $values['ibx_notify_notification_bar_description'] ) ? esc_attr( $values['ibx_notify_notification_bar_description'][0] ) : '';
     $ibx_notify_enable_countdown = isset( $values['ibx_notify_enable_countdown'] ) ? esc_attr( $values['ibx_notify_enable_countdown'][0] ) : '';
     $ibx_notify_notification_bar_countdown_text = isset( $values['ibx_notify_notification_bar_countdown_text'] ) ? esc_attr( $values['ibx_notify_notification_bar_countdown_text'][0] ) : '';
     $ibx_notify_notification_bar_countdown_days = isset( $values['ibx_notify_notification_bar_countdown_days'] ) ? esc_attr( $values['ibx_notify_notification_bar_countdown_days'][0] ) : '';
     $ibx_notify_notification_bar_countdown_hr = isset( $values['ibx_notify_notification_bar_countdown_hr'] ) ? esc_attr( $values['ibx_notify_notification_bar_countdown_hr'][0] ) : '';
     $ibx_notify_notification_bar_countdown_min = isset( $values['ibx_notify_notification_bar_countdown_min'] ) ? esc_attr( $values['ibx_notify_notification_bar_countdown_min'][0] ) : '';
     $ibx_notify_notification_bar_countdown_sec = isset( $values['ibx_notify_notification_bar_countdown_sec'] ) ? esc_attr( $values['ibx_notify_notification_bar_countdown_sec'][0] ) : '';
     $ibx_notify_enable_notification_email = isset( $values['ibx-notify-enable-notification-email'] ) ? esc_attr( $values['ibx-notify-enable-notification-email'][0] ) : '';
     $ibx_notify_notification_email = isset( $values['ibx-notify-notification-email'] ) ? esc_attr( $values['ibx-notify-notification-email'][0] ) : '';
     $ibx_notify_email_type = isset( $values['ibx_notify_email_type'] ) ? esc_attr( $values['ibx_notify_email_type'][0] ) : '';
     $ibx_notify_email_def_msg = isset( $values['ibx_notify_email_def_msg'] ) ? esc_attr( $values['ibx_notify_email_def_msg'][0] ) : '';
     $ibx_notify_email_def_place = isset( $values['ibx_notify_email_def_place'] ) ? esc_attr( $values['ibx_notify_email_def_place'][0] ) : '';
     $ibx_notify_email_def_sendmail = isset( $values['ibx_notify_email_def_sendmail'] ) ? esc_attr( $values['ibx_notify_email_def_sendmail'][0] ) : '';
     $ibx_notify_email_def_conmsg = isset( $values['ibx_notify_email_def_conmsg'] ) ? esc_attr( $values['ibx_notify_email_def_conmsg'][0] ) : '';
     $ibx_notify_email_convertkit_id = isset( $values['ibx_notify_email_convertkit_id'] ) ? esc_attr( $values['ibx_notify_email_convertkit_id'][0] ) : '';
     $ibx_notify_email_convertkit_conmsg = isset( $values['ibx_notify_email_convertkit_conmsg'] ) ? esc_attr( $values['ibx_notify_email_convertkit_conmsg'][0] ) : '';
     $ibx_notify_email_mailchimp_id = isset( $values['ibx_notify_email_mailchimp_id'] ) ? esc_attr( $values['ibx_notify_email_mailchimp_id'][0] ) : '';
     $ibx_notify_email_mailchimp_conmsg = isset( $values['ibx_notify_email_mailchimp_conmsg'] ) ? esc_attr( $values['ibx_notify_email_mailchimp_conmsg'][0] ) : '';
     $ibx_notify_email_cust_msg = isset( $values['ibx_notify_email_cust_msg'] ) ? esc_attr( $values['ibx_notify_email_cust_msg'][0] ) : '';
     $ibx_notify_email_cust_conmsg = isset( $values['ibx_notify_email_cust_conmsg'] ) ? esc_attr( $values['ibx_notify_email_cust_conmsg'][0] ) : '';
     $ibx_notify_cust_msg_msg = isset( $values['ibx_notify_cust_msg_msg'] ) ? esc_attr( $values['ibx_notify_cust_msg_msg'][0] ) : '';
     $ibx_notify_cust_msg_conmsg = isset( $values['ibx_notify_cust_msg_conmsg'] ) ? esc_attr( $values['ibx_notify_cust_msg_conmsg'][0] ) : '';
     $ibx_notify_cust_msg_place = isset( $values['ibx_notify_cust_msg_place'] ) ? esc_attr( $values['ibx_notify_cust_msg_place'][0] ) : '';
     $ibx_notify_sale_msg = isset( $values['ibx_notify_sale_msg'] ) ? esc_attr( $values['ibx_notify_sale_msg'][0] ) : '';
     $ibx_notify_sale_name = isset( $values['ibx-notify-sale-name'] ) ? esc_attr( $values['ibx-notify-sale-name'][0] ) : '';
     $ibx_notify_sale_email = isset( $values['ibx-notify-sale-email'] ) ? esc_attr( $values['ibx-notify-sale-email'][0] ) : '';
     $ibx_notify_design_position = isset( $values['ibx-notify-design-position'] ) ? esc_attr( $values['ibx-notify-design-position'][0] ) : '';
     $ibx_notify_design_text_color = isset( $values['ibx-notify-design-text-color'] ) ? esc_attr( $values['ibx-notify-design-text-color'][0] ) : '';
     $ibx_notify_design_back_color = isset( $values['ibx-notify-design-back-color'] ) ? esc_attr( $values['ibx-notify-design-back-color'][0] ) : '';
     $ibx_notify_design_button_color = isset( $values['ibx-notify-design-button-color'] ) ? esc_attr( $values['ibx-notify-design-button-color'][0] ) : '';
     $ibx_notify_visibility_page = isset( $values['ibx-notify-visibility-page'] ) ? esc_attr( $values['ibx-notify-visibility-page'][0] ) : '';
     $ibx_notify_visibility_log = isset( $values['ibx-notify-visibility-log'] ) ? esc_attr( $values['ibx-notify-visibility-log'][0] ) : '';
     $ibx_notify_visibility_visit = isset( $values['ibx-notify-visibility-visit'] ) ? esc_attr( $values['ibx-notify-visibility-visit'][0] ) : '';
     $ibx_notify_visibility_show = isset( $values['ibx-notify-visibility-show'] ) ? esc_attr( $values['ibx-notify-visibility-show'][0] ) : '';
     $ibx_notify_visibility_show_delay = isset( $values['ibx-notify-visibility-show-delay'] ) ? esc_attr( $values['ibx-notify-visibility-show-delay'][0] ) : '';
     $ibx_notify_visibility_disappear = isset( $values['ibx-notify-visibility-disappear'] ) ? esc_attr( $values['ibx-notify-visibility-disappear'][0] ) : '';
     $ibx_notify_visibility_disappear_delay = isset( $values['ibx-notify-visibility-disappear-delay'] ) ? esc_attr( $values['ibx-notify-visibility-disappear-delay'][0] ) : '';
     $ibx_notify_visibility_appear = isset( $values['ibx-notify-visibility-appear'] ) ? esc_attr( $values['ibx-notify-visibility-appear'][0] ) : '';
     $ibx_notify_visibility_appear_hide = isset( $values['ibx-notify-visibility-appear-hide'] ) ? esc_attr( $values['ibx-notify-visibility-appear-hide'][0] ) : '';
?>
<div class="ibx_notify_tab">
    <ul>
        <li><a title="<?php esc_html_e('Config', IBX_NOTIFY); ?>" class="ibx-active"><?php esc_html_e('Config', IBX_NOTIFY); ?></a></li>
        <li><a title="<?php esc_html_e('Content', IBX_NOTIFY); ?>" class=""><?php esc_html_e('Content', IBX_NOTIFY); ?></a></li>
        <li><a title="<?php esc_html_e('Design', IBX_NOTIFY); ?>" class=""><?php esc_html_e('Design', IBX_NOTIFY); ?></a></li>
        <li><a title="<?php esc_html_e('Visibility', IBX_NOTIFY); ?>" class=""><?php esc_html_e('Visibility', IBX_NOTIFY); ?></a></li>
    </ul>
</div>

<form method="post" action="">

    <div class="ibx_notify_container" id="Config">
            <?php wp_nonce_field( 'ib_ibx_notify_nonce', 'ibx_notify_nonce' ); ?>
        	<div class="ibx-notify-config-wraper">
                    <p class="ibx-notify-intro">Configuration Section
                        <small>
                            The section below is for configuration. You can set it as per your requirements.<br>
                        </small>
                    </p>
                    <table class="form-table">
                        <tr>
                            <th scope="row" valign="top">
                                <label><?php esc_html_e('Active?', IBX_NOTIFY); ?></label>
                            </th>
                            <td>
                                <input id="ibx-notify-config-active" name="ibx-notify-config-active" type="checkbox" class="" value="1" <?php echo ( $ibx_notify_config_active ? 'checked="checked"' : '' ); ?> />
                                <label for="ibx-notify-config-active"><?php esc_html_e( 'If checked, this will activate the box.', IBX_NOTIFY ); ?></label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" valign="top">
                                <label><?php esc_html_e('Hide the floating button?', IBX_NOTIFY); ?></label>
                            </th>
                            <td>
                                <input id="ibx-notify-config-hide-button" name="ibx-notify-config-hide-button" type="checkbox" class="" value="1" <?php echo ( $ibx_notify_config_hide_button ? 'checked="checked"' : '' ); ?> />
                                <label for="ibx-notify-config-hide-button"><?php esc_html_e( 'Appears when box is hidden.', IBX_NOTIFY ); ?></label>
                            </td>
                        </tr>
                    </table>
            </div>
    </div>

    <div class="ibx_notify_container" id="Content">
            <?php wp_nonce_field( 'ib_ibx_notify_nonce', 'ibx_notify_nonce' ); ?>
        		<div class="ibx_notify_meta_wraper">
                    <p class="ibx-notify-intro">Content Section
                        <small>
                            The section below is to write your content.<br>
                        </small>
                    </p>
                    <table class="form-table">
                        <tr>
                            <th scope="row" valign="top">
                                <label><?php esc_html_e('Type', IBX_NOTIFY); ?></label>
                            </th>
                            <td>
                                <select id="ibx_notify_type" name="ibx_notify_type">
                                    <?php
                                    $options = array(
                                            'not_bar' => __( 'Notification Bar', IBX_NOTIFY ),
                                            'email' => __( 'Email opt-in', IBX_NOTIFY ),
                                            'msg' => __( 'Custom Message', IBX_NOTIFY ),
                                            'sale' => __( 'Sale Notification', IBX_NOTIFY ),
                                        );
                                        foreach ($options as $key => $value ) {
                                            if ( $ibx_notify_type == $key ) { ?>
                                                <option value="<?php echo $key ; ?>" selected="selected"><?php echo $value ; ?></option>
                                            <?php }else{ ?>
                                                <option value="<?php echo $key ; ?>"><?php echo $value ; ?></option>
                                            <?php }
                                        }?>
                                </select>
                            </td>
                        </tr>
                    </table>
        		</div>

                <div class="ibx_notify_noti_wraper side_wraper" id="not_bar">
                    <!-- <p class="ibx-notify-intro"><?php esc_html_e('Notification Bar', IBX_NOTIFY); ?></p class="ibx-notify-intro"> -->
                        <table class="form-table">
                            <tr>
                                <th scope="row" valign="top">
                                    <label><?php esc_html_e('Description', IBX_NOTIFY); ?></label>
                                </th>
                                <td>
                                    <?php
                                            if( $ibx_notify_notification_bar_description != '' ) { $content = $ibx_notify_notification_bar_description; }else{ $content = '{ Name } just purchased this awesome product'; }
                                            $editor_id = 'ibx_notify_notification_bar_description';
                                            wp_editor( $content, $editor_id );
                                            ?>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row" valign="top">
                                    <label for="ibx_notify_enable_notification_bar"><?php esc_html_e('Enable Countdown?', IBX_NOTIFY); ?></label>
                                </th>
                                <td>
                                    <input id="ibx_notify_enable_notification_bar" name="ibx_notify_enable_countdown" type="checkbox" class="" value="1" <?php echo ( $ibx_notify_enable_countdown ? 'checked="checked"' : '' ); ?> />
                                    <label for="ibx_notify_enable_notification_bar"><?php esc_html_e( 'If checked, this will activate Countdown.', IBX_NOTIFY ); ?></label>
                                </td>
                            </tr>
                            <tr class="ibx_notify_count_wrap">
                                <th scope="row" valign="top">
                                    <label><?php esc_html_e('Countdown Text', IBX_NOTIFY); ?></label>
                                </th>
                                <td>
                                    <textarea cols="60" rows="1" name="ibx_notify_notification_bar_countdown_text" /> <?php echo $ibx_notify_notification_bar_countdown_text; ?></textarea>
                                </td>
                            </tr>
                            <tr class="ibx_notify_count_wrap">
                                <th scope="row" valign="top">
                                    <label><?php esc_html_e('Countdown Timer', IBX_NOTIFY); ?></label>
                                </th>
                                <td>
                                    <select id="ibx_notify_notification_bar_countdown_days" name="ibx_notify_notification_bar_countdown_days">
                                        <option value=""><?php esc_html_e('days', IBX_NOTIFY); ?></option>
                                        <?php for ( $i = 0 ; $i <= 31 ; $i++ ){
                                            $selected_day = $ibx_notify_notification_bar_countdown_days;
                                            if ( $selected_day != '' && $i == $selected_day ){ ?>
                                                <option value="<?php echo $selected_day; ?>" selected="selected" > <?php echo $selected_day; ?> </option>
                                            <?php } else { ?>
                                                <option value="<?php echo $i ; ?>"><?php echo $i ; ?></option>
                                        <?php } } ?>
                                    </select>

                                    <select id="ibx_notify_notification_bar_countdown_hr" name="ibx_notify_notification_bar_countdown_hr">
                                        <option value=""><?php esc_html_e('hour', IBX_NOTIFY); ?></option>
                                        <?php for ( $i = 0 ; $i <= 24 ; $i++ ){
                                            $selected_hr = $ibx_notify_notification_bar_countdown_hr;
                                            if ( $selected_hr != '' && $i == $selected_hr ){ ?>
                                                <option value="<?php echo $selected_hr; ?>" selected="selected" > <?php echo $selected_hr; ?> </option>
                                            <?php } else { ?>
                                                <option value="<?php echo $i ; ?>"><?php echo $i ; ?></option>
                                        <?php } } ?>
                                    </select>

                                    <select id="ibx_notify_notification_bar_countdown_min" name="ibx_notify_notification_bar_countdown_min">
                                        <option value=""><?php esc_html_e('min', IBX_NOTIFY); ?></option>
                                        <?php for ( $i = 0 ; $i <= 60 ; $i++ ){
                                            $selected_min = $ibx_notify_notification_bar_countdown_min;
                                            if ( $selected_min != '' && $i == $selected_min ){ ?>
                                                <option value="<?php echo $selected_min; ?>" selected="selected" > <?php echo $selected_min; ?> </option>
                                            <?php } else { ?>
                                                <option value="<?php echo $i ; ?>"><?php echo $i ; ?></option>
                                        <?php } } ?>
                                    </select>
                                    <select id="ibx_notify_notification_bar_countdown_sec" name="ibx_notify_notification_bar_countdown_sec">
                                        <option value=""><?php esc_html_e('sec', IBX_NOTIFY); ?></option>
                                        <?php for ( $i = 0 ; $i <= 60 ; $i++ ){
                                            $selected_sec = $ibx_notify_notification_bar_countdown_sec;
                                            if ( $selected_sec != '' && $i == $selected_sec ){ ?>
                                                <option value="<?php echo $selected_sec; ?>" selected="selected" > <?php echo $selected_sec; ?> </option>
                                            <?php } else { ?>
                                                <option value="<?php echo $i ; ?>"><?php echo $i ; ?></option>
                                        <?php } } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row" valign="top">
                                    <label for="ibx-notify-enable-notification-email"><?php esc_html_e('Enable Email opt-in?', IBX_NOTIFY); ?></label>
                                </th>
                                <td>
                                    <input id="ibx-notify-enable-notification-email" name="ibx-notify-enable-notification-email" type="checkbox" class="" value="1" <?php echo ( $ibx_notify_enable_notification_email ? 'checked="checked"' : '' ); ?> />
                                    <label for="ibx-notify-enable-notification-email"><?php esc_html_e( 'If checked, this will activate Email opt-in.', IBX_NOTIFY ); ?></label>
                                </td>
                            </tr>
                            <tr class="ibx-notify-noti-email-wrap">
                                <th scope="row" valign="top">
                                    <label for="ibx-notify-notification-email"><?php esc_html_e('Email', IBX_NOTIFY); ?></label>
                                </th>
                                <td>
                                    <input id="ibx-notify-notification-email" name="ibx-notify-notification-email" type="email" value="<?php echo ( $ibx_notify_notification_email ); ?>" />
                                </td>
                            </tr>
                        </table>
                </div>
                <div class="ibx_notify_email_wraper side_wraper" id="email">
                        <table class="form-table">
                            <tr>
                                <th scope="row" valign="top">
                                    <label><?php esc_html_e('Show Email as', IBX_NOTIFY); ?></label>
                                </th>
                                <td>
                                    <select id="ibx_notify_email_type" name="ibx_notify_email_type">
                                        <?php
                                        $email_options = array(
                                                'default' => __( 'Default', IBX_NOTIFY ),
                                                'convertkit' => __( 'Convertkit', IBX_NOTIFY ),
                                                'mailchimp' => __( 'MailChimp', IBX_NOTIFY ),
                                                'custom' => __( 'Custom', IBX_NOTIFY ),
                                            );
                                            foreach ($email_options as $key => $value ) {
                                                if ( $ibx_notify_email_type == $key ) { ?>
                                                    <option value="<?php echo $key ; ?>" selected="selected"><?php echo $value ; ?></option>
                                                <?php }else{ ?>
                                                    <option value="<?php echo $key ; ?>"><?php echo $value ; ?></option>
                                                <?php }
                                            }?>
                                    </select>
                                </td>
                            </tr>
                            <tr class="email_sec default">
                                    <th scope="row" valign="top">
                                        <label><?php esc_html_e('Message', IBX_NOTIFY); ?></label>
                                    </th>
                                    <td>
                                        <?php
                                                if( $ibx_notify_email_def_msg != '' ) { $content = $ibx_notify_email_def_msg; }else{ $content = '{ Name } just purchased this awesome product'; }
                                                $editor_id = 'ibx_notify_email_def_msg';
                                                wp_editor( $content, $editor_id );
                                        ?>
                                    </td>
                            </tr>
                            <tr class="email_sec default">
                                    <th scope="row" valign="top">
                                        <label><?php esc_html_e('Placeholder', IBX_NOTIFY); ?></label>
                                    </th>
                                    <td>
                                        <textarea cols="60" rows="1" name="ibx_notify_email_def_place" /> <?php echo $ibx_notify_email_def_place; ?></textarea>
                                    </td>
                            </tr>
                            <tr class="email_sec default">
                                    <th scope="row" valign="top">
                                        <label><?php esc_html_e('Send to email', IBX_NOTIFY); ?></label>
                                    </th>
                                    <td>
                                        <textarea cols="60" rows="1" name="ibx_notify_email_def_sendmail" /> <?php echo $ibx_notify_email_def_sendmail; ?></textarea>
                                    </td>
                            </tr>
                            <tr class="email_sec default">
                                    <th scope="row" valign="top">
                                        <label><?php esc_html_e('Confirmation Message', IBX_NOTIFY); ?></label>
                                    </th>
                                    <td>
                                        <textarea cols="60" rows="1" name="ibx_notify_email_def_conmsg" /> <?php echo $ibx_notify_email_def_conmsg; ?></textarea>
                                    </td>
                            </tr>
                            <tr class="email_sec convertkit">
                                    <th scope="row" valign="top">
                                        <label><?php esc_html_e('Convertkit List Id', IBX_NOTIFY); ?></label>
                                    </th>
                                    <td>
                                        <textarea cols="60" rows="1" name="ibx_notify_email_convertkit_id" /> <?php echo $ibx_notify_email_convertkit_id; ?></textarea>
                            </tr>
                            <tr class="email_sec convertkit">
                                    <th scope="row" valign="top">
                                        <label><?php esc_html_e('Confirmation Message', IBX_NOTIFY); ?></label>
                                    </th>
                                    <td>
                                        <textarea cols="60" rows="1" name="ibx_notify_email_convertkit_conmsg" /> <?php echo $ibx_notify_email_convertkit_conmsg; ?></textarea>
                                    </td>
                            </tr>
                            <tr class="email_sec mailchimp">
                                    <th scope="row" valign="top">
                                        <label><?php esc_html_e('MailChimp List Id', IBX_NOTIFY); ?></label>
                                    </th>
                                    <td>
                                        <textarea cols="60" rows="1" name="ibx_notify_email_mailchimp_id" /> <?php echo $ibx_notify_email_mailchimp_id; ?></textarea>
                                    </td>
                            </tr>
                            <tr class="email_sec mailchimp">
                                    <th scope="row" valign="top">
                                        <label><?php esc_html_e('Confirmation Message', IBX_NOTIFY); ?></label>
                                    </th>
                                    <td>
                                        <textarea cols="60" rows="1" name="ibx_notify_email_mailchimp_conmsg" /> <?php echo $ibx_notify_email_mailchimp_conmsg; ?></textarea>
                                    </td>
                            </tr>
                            <tr class="email_sec custom">
                                    <th scope="row" valign="top">
                                        <label><?php esc_html_e('Message', IBX_NOTIFY); ?></label>
                                    </th>
                                    <td>
                                        <?php
                                                if( $ibx_notify_email_cust_msg != '' ) { $content = $ibx_notify_email_cust_msg; }else{ $content = '{ Name } just purchased this awesome product'; }
                                                $editor_id = 'ibx_notify_email_cust_msg';
                                                wp_editor( $content, $editor_id );
                                        ?>
                                    </td>
                            </tr>
                            <tr class="email_sec custom">
                                    <th scope="row" valign="top">
                                        <label><?php esc_html_e('Confirmation Message', IBX_NOTIFY); ?></label>
                                    </th>
                                    <td>
                                        <textarea cols="60" rows="1" name="ibx_notify_email_cust_conmsg" /> <?php echo $ibx_notify_email_cust_conmsg; ?></textarea>
                                    </td>
                            </tr>
                        </table>
        		</div>
                <div class="ibx_notify_cust_msg side_wraper" id="msg">
                        <table class="form-table">
                            <tr>
                                <th scope="row" valign="top">
                                    <label><?php esc_html_e('Message', IBX_NOTIFY); ?></label>
                                </th>
                                <td>
                                    <?php
                                            if( $ibx_notify_cust_msg_msg != '' ) { $content = $ibx_notify_cust_msg_msg; }else{ $content = '{ Name } just purchased this awesome product'; }
                                            $editor_id = 'ibx_notify_cust_msg_msg';
                                            wp_editor( $content, $editor_id );
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" valign="top">
                                    <label><?php esc_html_e('Confirmation Message', IBX_NOTIFY); ?></label>
                                </th>
                                <td>
                                    <textarea cols="60" rows="1" name="ibx_notify_cust_msg_conmsg" /> <?php echo $ibx_notify_cust_msg_conmsg; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" valign="top">
                                    <label><?php esc_html_e('Placeholder', IBX_NOTIFY); ?></label>
                                </th>
                                <td>
                                    <textarea cols="60" rows="1" name="ibx_notify_cust_msg_place" /> <?php echo $ibx_notify_cust_msg_place; ?></textarea>
                                </td>
                            </tr>
                        </table>
        		</div>
                <div class="ibx_notify_sale side_wraper" id="sale">
                    <table class="form-table sale-table">
                                    <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" name="ibx-notify-sale-name[]" placeholder="Name">
                                                </td>
                                                <td>
                                                    <input type="email" name="ibx-notify-sale-email[]" placeholder="Email">
                                                </td>
                                                <td>
                                                    <span class='dashicons dashicons-plus button button-primary' id='add-tr'></span>
                                                </td>
                                                <td>
                                                    <span class='dashicons dashicons-plus button button-primary' style="visibility: hidden;"></span>
                                                </td>
                                            </tr>
                                    </tbody>
                    </table>
                    <table class="form-table">
                        <tr>
                            <th scope="row" valign="top">
                                <label><?php esc_html_e('Message', IBX_NOTIFY); ?></label>
                            </th>
                            <td>
                                <?php
                                        if( $ibx_notify_sale_msg != '' ) { $content = $ibx_notify_sale_msg; }else{ $content = '{ Name } just purchased this awesome product'; }
                                        $editor_id = 'ibx_notify_sale_msg';
                                        wp_editor( $content, $editor_id );
                                ?>
                            </td>
                        </tr>
                    </table>
        		</div>
    </div>

    <div class="ibx_notify_container" id="Design">
            <div class="ibx_notify_display_wraper">
                <p class="ibx-notify-intro">Design Options
                    <small>
                        The section below is to change style, color and position of your content.<br>
                    </small>
                </p>
                <table class="form-table">
                    <tr>
                        <th scope="row" valign="top">
                            <label><?php esc_html_e('Positon', IBX_NOTIFY); ?></label>
                        </th>
                        <td>
                            <select id="ibx-notify-design-position" name="ibx-notify-design-position">
                                <?php
                                $positon_options = array(
                                        'bottom-right' => __( 'Bottom right', IBX_NOTIFY ),
                                        'bottom-left' => __( 'Bottom left', IBX_NOTIFY ),
                                    );
                                    foreach ( $positon_options as $key => $value ) {
                                        if ( $ibx_notify_design_position == $key ) { ?>
                                            <option value="<?php echo $key ; ?>" selected="selected"><?php echo $value ; ?></option>
                                        <?php }else{ ?>
                                            <option value="<?php echo $key ; ?>"><?php echo $value ; ?></option>
                                        <?php }
                                    }?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                    <th scope="row" valign="top">
                        <label><?php esc_html_e('Text Color', 'wpfomo'); ?></label>
                    </th>
                    <td>
                        <?php $text_color = get_option('ibx-notify-design-text-color'); ?>
                        <input type="text" id="ibx-notify-design-text-color" name="ibx-notify-design-text-color" class="my-color-field" data-default-color="#000" value="<?php echo ( $ibx_notify_design_text_color != '' ) ? $ibx_notify_design_text_color : '#000' ; ?> " >
                    </td>
                    </tr>
                    <tr>
                        <th scope="row" valign="top">
                            <label><?php esc_html_e('Background Color', 'wpfomo'); ?></label>
                        </th>
                        <td>
                            <?php $text_background_color = get_option('ibx-notify-design-back-color'); ?>
                            <input type="text" id="ibx-notify-design-back-color" name="ibx-notify-design-back-color" class="my-color-field" data-default-color="#ffffff" value="<?php echo ( $ibx_notify_design_back_color != '' ) ? $ibx_notify_design_back_color : '#ffffff' ; ?> " >
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" valign="top">
                            <label><?php esc_html_e('Button Color', 'wpfomo'); ?></label>
                        </th>
                        <td>
                            <?php $button_color = get_option('ibx-notify-design-button-color'); ?>
                            <input type="text" id="ibx-notify-design-button-color" name="ibx-notify-design-button-color" class="my-color-field" data-default-color="#0b6bbf" value="<?php echo ( $ibx_notify_design_button_color != '' ) ? $ibx_notify_design_button_color : '#0b6bbf' ; ?> " >
                        </td>
                    </tr>
                </table>
            </div>
    </div>

    <div class="ibx_notify_container" id="Visibility">
        <div class="ibx-notify-visibility-wraper">
            <p class="ibx-notify-intro"><?php esc_html_e('Visibility Options', IBX_NOTIFY); ?>
                <small>
                    <?php esc_html_e('The section below is to set visibility of Content.', IBX_NOTIFY); ?>
                    <br>
                </small>
            </p>
            <table class="form-table">
                <tr>
                    <th scope="row" valign="top">
                        <label><?php esc_html_e('What pages?', IBX_NOTIFY); ?></label>
                    </th>
                    <td>
                        <select id="ibx-notify-visibility-page" name="ibx-notify-visibility-page">
                            <?php
                            $page_options = array(
                                    'all-pages' => __( 'All pages', IBX_NOTIFY ),
                                    'certain-pages' => __( 'Certain pages', IBX_NOTIFY ),
                                );
                                foreach ( $page_options as $key => $value ) {
                                    if ( $ibx_notify_visibility_page == $key ) { ?>
                                        <option value="<?php echo $key ; ?>" selected="selected"><?php echo $value ; ?></option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $key ; ?>"><?php echo $value ; ?></option>
                                    <?php }
                                }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row" valign="top">
                        <label><?php esc_html_e('Show to these visitors', IBX_NOTIFY); ?></label>
                    </th>
                    <td>
                        <select id="ibx-notify-visibility-log" name="ibx-notify-visibility-log">
                            <?php
                            $log_options = array(
                                    'log-all' => __( 'All visitors', IBX_NOTIFY ),
                                    'log-in' => __( 'Logged in only', IBX_NOTIFY ),
                                    'log-out' => __( 'Logged out only', IBX_NOTIFY ),
                                );
                                foreach ( $log_options as $key => $value ) {
                                    if ( $ibx_notify_visibility_log == $key ) { ?>
                                        <option value="<?php echo $key ; ?>" selected="selected"><?php echo $value ; ?></option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $key ; ?>"><?php echo $value ; ?></option>
                                    <?php }
                                }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row" valign="top">
                        <label><?php esc_html_e('New or returning', IBX_NOTIFY); ?></label>
                    </th>
                    <td>
                        <select id="ibx-notify-visibility-visit" name="ibx-notify-visibility-visit">
                            <?php
                            $visit_options = array(
                                    'visit-all' => __( 'All visitors', IBX_NOTIFY ),
                                    'visit-new' => __( 'New visitors only', IBX_NOTIFY ),
                                    'visit-return' => __( 'Returning visitors only', IBX_NOTIFY ),
                                );
                                foreach ( $visit_options as $key => $value ) {
                                    if ( $ibx_notify_visibility_visit == $key ) { ?>
                                        <option value="<?php echo $key ; ?>" selected="selected"><?php echo $value ; ?></option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $key ; ?>"><?php echo $value ; ?></option>
                                    <?php }
                                }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row" valign="top">
                        <label><?php esc_html_e('When should we show it?', IBX_NOTIFY); ?></label>
                    </th>
                    <td>
                        <select id="ibx-notify-visibility-show" name="ibx-notify-visibility-show">
                            <?php
                            $show_options = array(
                                    'immediate' => __( 'Immediately', IBX_NOTIFY ),
                                    'delay' => __( 'Delay of some time', IBX_NOTIFY ),
                                    'scroll' => __( 'User scrolls halfway down the page', IBX_NOTIFY ),
                                );
                                foreach ( $show_options as $key => $value ) {
                                    if ( $ibx_notify_visibility_show == $key ) { ?>
                                        <option value="<?php echo $key ; ?>" selected="selected"><?php echo $value ; ?></option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $key ; ?>"><?php echo $value ; ?></option>
                                    <?php }
                                }?>
                        </select>
                    </td>
                </tr>
                <tr id="delay">
                    <th scope="row" valign="top">
                        <label><?php esc_html_e('Delay of?', IBX_NOTIFY); ?></label>
                    </th>
                    <td>
                        <input type="number" id="ibx-notify-visibility-show-delay" name="ibx-notify-visibility-show-delay" value="<?php echo $ibx_notify_visibility_show_delay; ?> "><label><?php esc_html_e('seconds', IBX_NOTIFY); ?></label>
                    </td>
                </tr>
                <tr>
                    <th scope="row" valign="top">
                        <label><?php esc_html_e('After it displays, when should it disappear?', IBX_NOTIFY); ?></label>
                    </th>
                    <td>
                        <select id="ibx-notify-visibility-disappear" name="ibx-notify-visibility-disappear">
                            <?php
                            $disappear_options = array(
                                    'click-to-hide' => __( 'When user clicks hide', IBX_NOTIFY ),
                                    'disappear-delay' => __( 'Delay of some time', IBX_NOTIFY ),
                                );
                                foreach ( $disappear_options as $key => $value ) {
                                    if ( $ibx_notify_visibility_disappear == $key ) { ?>
                                        <option value="<?php echo $key ; ?>" selected="selected"><?php echo $value ; ?></option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $key ; ?>"><?php echo $value ; ?></option>
                                    <?php }
                                }?>
                        </select>
                    </td>
                </tr>
                <tr id="disappear-delay">
                    <th scope="row" valign="top">
                        <label><?php esc_html_e('Delay of?', IBX_NOTIFY); ?></label>
                    </th>
                    <td>
                        <input type="number" id="ibx-notify-visibility-disappear-delay" name="ibx-notify-visibility-disappear-delay" value="<?php echo $ibx_notify_visibility_disappear_delay; ?> "><label><?php esc_html_e('seconds', IBX_NOTIFY); ?></label>
                    </td>
                </tr>
                <tr>
                    <th scope="row" valign="top">
                        <label><?php esc_html_e('How often should we show it to each visitor?', IBX_NOTIFY); ?></label>
                    </th>
                    <td>
                        <select id="ibx-notify-visibility-appear" name="ibx-notify-visibility-appear">
                            <?php
                            $appear_options = array(
                                    'page-load' => __( 'Every page load', IBX_NOTIFY ),
                                    'click-to-submit' => __( 'Hide after user interacts (clicks link or submits email)', IBX_NOTIFY ),
                                    'show-and-hide' => __( 'Show, then hide for some days', IBX_NOTIFY ),
                                );
                                foreach ( $appear_options as $key => $value ) {
                                    if ( $ibx_notify_visibility_appear == $key ) { ?>
                                        <option value="<?php echo $key ; ?>" selected="selected"><?php echo $value ; ?></option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $key ; ?>"><?php echo $value ; ?></option>
                                    <?php }
                                }?>
                        </select>
                    </td>
                </tr>
                <tr id="show-and-hide">
                    <th scope="row" valign="top">
                        <label><?php esc_html_e('Hide for', IBX_NOTIFY); ?></label>
                    </th>
                    <td>
                        <input type="number" id="ibx-notify-visibility-appear-hide" name="ibx-notify-visibility-appear-hide" value="<?php echo $ibx_notify_visibility_appear_hide; ?> "><label><?php esc_html_e('days', IBX_NOTIFY); ?></label>
                    </td>
                </tr>
            </table>
        </div>
</div>
</form>
