<?php
     global $post;
     $values = get_post_custom( $post->ID );

     $ibx_notify_type = isset( $values['ibx_notify_type'] ) ? esc_attr( $values['ibx_notify_type'][0] ) : '';
     $ibx_notify_config_active = isset( $values['ibx_notify_config_active'] ) ? esc_attr( $values['ibx_notify_config_active'][0] ) : '';
     $ibx_notify_config_hide_button = isset( $values['ibx_notify_config_hide_button'] ) ? esc_attr( $values['ibx_notify_config_hide_button'][0] ) : '';
     $ibx_notify_notification_bar_description = isset( $values['ibx_notify_notification_bar_description'] ) ? html_entity_decode( $values['ibx_notify_notification_bar_description'][0] ) : '';
     $ibx_notify_enable_countdown = isset( $values['ibx_notify_enable_countdown'] ) ? esc_attr( $values['ibx_notify_enable_countdown'][0] ) : '';
     $ibx_notify_notification_bar_countdown_text = isset( $values['ibx_notify_notification_bar_countdown_text'] ) ? esc_attr( $values['ibx_notify_notification_bar_countdown_text'][0] ) : '';
     $ibx_notify_notification_bar_countdown_days = isset( $values['ibx_notify_notification_bar_countdown_days'] ) ? esc_attr( $values['ibx_notify_notification_bar_countdown_days'][0] ) : '';
     $ibx_notify_notification_bar_countdown_hr = isset( $values['ibx_notify_notification_bar_countdown_hr'] ) ? esc_attr( $values['ibx_notify_notification_bar_countdown_hr'][0] ) : '';
     $ibx_notify_notification_bar_countdown_min = isset( $values['ibx_notify_notification_bar_countdown_min'] ) ? esc_attr( $values['ibx_notify_notification_bar_countdown_min'][0] ) : '';
     $ibx_notify_notification_bar_countdown_sec = isset( $values['ibx_notify_notification_bar_countdown_sec'] ) ? esc_attr( $values['ibx_notify_notification_bar_countdown_sec'][0] ) : '';

     $ibx_notify_enable_notification_email = isset( $values['ibx_notify_enable_notification_email'] ) ? esc_attr( $values['ibx_notify_enable_notification_email'][0] ) : '';
     $ibx_notify_notification_email = isset( $values['ibx_notify_notification_email'] ) ? esc_attr( $values['ibx_notify_notification_email'][0] ) : '';

     $ibx_notify_email_type = isset( $values['ibx_notify_email_type'] ) ? esc_attr( $values['ibx_notify_email_type'][0] ) : '';
     $ibx_notify_email_def_msg = isset( $values['ibx_notify_email_def_msg'] ) ? html_entity_decode( $values['ibx_notify_email_def_msg'][0] ) : '';
     $ibx_notify_email_def_place = isset( $values['ibx_notify_email_def_place'] ) ? esc_attr( $values['ibx_notify_email_def_place'][0] ) : '';
     $ibx_notify_email_def_sendmail = isset( $values['ibx_notify_email_def_sendmail'] ) ? esc_attr( $values['ibx_notify_email_def_sendmail'][0] ) : '';
     $ibx_notify_email_def_conmsg = isset( $values['ibx_notify_email_def_conmsg'] ) ? esc_attr( $values['ibx_notify_email_def_conmsg'][0] ) : '';
     $ibx_notify_email_convertkit_id = isset( $values['ibx_notify_email_convertkit_id'] ) ? esc_attr( $values['ibx_notify_email_convertkit_id'][0] ) : '';
     $ibx_notify_email_convertkit_conmsg = isset( $values['ibx_notify_email_convertkit_conmsg'] ) ? esc_attr( $values['ibx_notify_email_convertkit_conmsg'][0] ) : '';
     $ibx_notify_email_mailchimp_id = isset( $values['ibx_notify_email_mailchimp_id'] ) ? esc_attr( $values['ibx_notify_email_mailchimp_id'][0] ) : '';
     $ibx_notify_email_mailchimp_conmsg = isset( $values['ibx_notify_email_mailchimp_conmsg'] ) ? esc_attr( $values['ibx_notify_email_mailchimp_conmsg'][0] ) : '';
     $ibx_notify_email_cust_msg = isset( $values['ibx_notify_email_cust_msg'] ) ? esc_attr( $values['ibx_notify_email_cust_msg'][0] ) : '';
     $ibx_notify_email_cust_conmsg = isset( $values['ibx_notify_email_cust_conmsg'] ) ? esc_attr( $values['ibx_notify_email_cust_conmsg'][0] ) : '';
     $ibx_notify_cust_msg_msg = isset( $values['ibx_notify_cust_msg_msg'] ) ? html_entity_decode( $values['ibx_notify_cust_msg_msg'][0] ) : '';

     $ibx_notify_sale = get_post_meta( $post->ID, 'ibx_notify_sale', true );

     $ibx_notify_reviews = get_post_meta( $post->ID, 'ibx_notify_reviews', true );
 // print_r($ibx_notify_reviews);

     $ibx_notify_design_position = isset( $values['ibx_notify_design_position'] ) ? esc_attr( $values['ibx_notify_design_position'][0] ) : '';
     $ibx_notify_design_text_color = isset( $values['ibx_notify_design_text_color'] ) ? esc_attr( $values['ibx_notify_design_text_color'][0] ) : '';
     $ibx_notify_design_back_color = isset( $values['ibx_notify_design_back_color'] ) ? esc_attr( $values['ibx_notify_design_back_color'][0] ) : '';
     $ibx_notify_design_button_color = isset( $values['ibx_notify_design_button_color'] ) ? esc_attr( $values['ibx_notify_design_button_color'][0] ) : '';
     $ibx_notify_design_button_text_color = isset( $values['ibx_notify_design_button_text_color'] ) ? esc_attr( $values['ibx_notify_design_button_text_color'][0] ) : '';
     $ibx_notify_visibility_page = isset( $values['ibx_notify_visibility_page'] ) ? esc_attr( $values['ibx_notify_visibility_page'][0] ) : '';
     $ibx_notify_visibility_log = isset( $values['ibx_notify_visibility_log'] ) ? esc_attr( $values['ibx_notify_visibility_log'][0] ) : '';
     $ibx_notify_visibility_visit = isset( $values['ibx_notify_visibility_visit'] ) ? esc_attr( $values['ibx_notify_visibility_visit'][0] ) : '';
     $ibx_notify_visibility_show = isset( $values['ibx_notify_visibility_show'] ) ? esc_attr( $values['ibx_notify_visibility_show'][0] ) : '';
     $ibx_notify_visibility_show_delay = isset( $values['ibx_notify_visibility_show_delay'] ) ? esc_attr( $values['ibx_notify_visibility_show_delay'][0] ) : '';
     $ibx_notify_visibility_disappear = isset( $values['ibx_notify_visibility_disappear'] ) ? esc_attr( $values['ibx_notify_visibility_disappear'][0] ) : '';
     $ibx_notify_visibility_disappear_delay = isset( $values['ibx_notify_visibility_disappear_delay'] ) ? esc_attr( $values['ibx_notify_visibility_disappear_delay'][0] ) : '';
     $ibx_notify_visibility_appear = isset( $values['ibx_notify_visibility_appear'] ) ? esc_attr( $values['ibx_notify_visibility_appear'][0] ) : '';
     $ibx_notify_visibility_appear_hide = isset( $values['ibx_notify_visibility_appear_hide'] ) ? esc_attr( $values['ibx_notify_visibility_appear_hide'][0] ) : '';
?>
<div class="ibx_notify_tab">
    <ul>
        <li><a title="<?php esc_html_e('Config', 'ibx_notify'); ?>" class="ibx-active"><?php esc_html_e('Config', 'ibx_notify'); ?></a></li>
        <li><a title="<?php esc_html_e('Content', 'ibx_notify'); ?>" class=""><?php esc_html_e('Content', 'ibx_notify'); ?></a></li>
        <li><a title="<?php esc_html_e('Design', 'ibx_notify'); ?>" class=""><?php esc_html_e('Design', 'ibx_notify'); ?></a></li>
        <li><a title="<?php esc_html_e('Visibility', 'ibx_notify'); ?>" class=""><?php esc_html_e('Visibility', 'ibx_notify'); ?></a></li>
    </ul>
</div>

<form method="post" action="">

    <div class="ibx_notify_container" id="Config">
            <?php wp_nonce_field( 'ib_ibx_notify_nonce', 'ibx_notify_nonce' ); ?>
        	<div class="ibx-notify-config-wraper">
                    <p class="ibx-notify-intro"><?php esc_html_e('Configuration Section', 'ibx_notify'); ?>
                        <small>
                            <?php esc_html_e('The section below is for configuration. You can set it as per your requirements.', 'ibx_notify'); ?>
                            <br>
                        </small>
                    </p>
                    <table class="form-table">
                        <tr>
                            <th scope="row" valign="top">
                                <label><?php esc_html_e('Type', 'ibx_notify'); ?></label>
                            </th>
                            <td>
                                <select id="ibx_notify_type" name="ibx_notify_type">
                                    <?php
                                    $options = array(
                                            'not_bar' => __( 'Notification Bar', 'ibx_notify' ),
                                            'msg' => __( 'Custom Message', 'ibx_notify' ),
                                            'sale' => __( 'Sale Notification', 'ibx_notify' ),
                                            'reviews' => __( 'Reviews', 'ibx_notify' ),
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
                        <tr>
                            <th scope="row" valign="top">
                                <label><?php esc_html_e('Active?', 'ibx_notify'); ?></label>
                            </th>
                            <td>
                                <input id="ibx_notify_config_active" name="ibx_notify_config_active" type="checkbox" class="" value="1" <?php echo ( $ibx_notify_config_active ? 'checked="checked"' : '' ); ?> />
                                <label for="ibx_notify_config_active"><?php esc_html_e( 'If checked, this will activate the box.', 'ibx_notify' ); ?></label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" valign="top">
                                <label><?php esc_html_e('Hide the floating button?', 'ibx_notify'); ?></label>
                            </th>
                            <td>
                                <input id="ibx_notify_config_hide_button" name="ibx_notify_config_hide_button" type="checkbox" class="" value="1" <?php echo ( $ibx_notify_config_hide_button ? 'checked="checked"' : '' ); ?> />
                                <label for="ibx_notify_config_hide_button"><?php esc_html_e( 'Appears when box is hidden.', 'ibx_notify' ); ?></label>
                            </td>
                        </tr>

                    </table>
            </div>
    </div>

    <div class="ibx_notify_container" id="Content">
            <?php wp_nonce_field( 'ib_ibx_notify_nonce', 'ibx_notify_nonce' ); ?>
        		<div class="ibx_notify_meta_wraper">
                    <p class="ibx-notify-intro"><?php esc_html_e('Content Section', 'ibx_notify'); ?>
                        <small>
                            <?php esc_html_e('The section below is to write your content.The section below is to write your content.', 'ibx_notify'); ?>
                            <br>
                        </small>
                    </p>
        		</div>

                <div class="ibx_notify_noti_wraper side_wraper" id="not_bar">
                        <table class="form-table">
                            <tr>
                                <th scope="row" valign="top">
                                    <label><?php esc_html_e('Description', 'ibx_notify'); ?></label>
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
                                    <label for="ibx_notify_enable_notification_bar"><?php esc_html_e('Enable Countdown?', 'ibx_notify'); ?></label>
                                </th>
                                <td>
                                    <input id="ibx_notify_enable_notification_bar" name="ibx_notify_enable_countdown" type="checkbox" class="" value="1" <?php echo ( $ibx_notify_enable_countdown ? 'checked="checked"' : '' ); ?> />
                                    <label for="ibx_notify_enable_notification_bar"><?php esc_html_e( 'If checked, this will activate Countdown.', 'ibx_notify' ); ?></label>
                                </td>
                            </tr>
                            <tr class="ibx_notify_count_wrap">
                                <th scope="row" valign="top">
                                    <label><?php esc_html_e('Countdown Text', 'ibx_notify'); ?></label>
                                </th>
                                <td>
                                    <textarea cols="60" rows="1" name="ibx_notify_notification_bar_countdown_text" /> <?php echo $ibx_notify_notification_bar_countdown_text; ?></textarea>
                                </td>
                            </tr>
                            <tr class="ibx_notify_count_wrap">
                                <th scope="row" valign="top">
                                    <label><?php esc_html_e('Countdown Timer', 'ibx_notify'); ?></label>
                                </th>
                                <td>
                                    <select id="ibx_notify_notification_bar_countdown_days" name="ibx_notify_notification_bar_countdown_days">
                                        <option value=""><?php esc_html_e('days', 'ibx_notify'); ?></option>
                                        <?php for ( $i = 0 ; $i <= 31 ; $i++ ){
                                            $selected_day = $ibx_notify_notification_bar_countdown_days;
                                            if ( $selected_day != '' && $i == $selected_day ){ ?>
                                                <option value="<?php echo $selected_day; ?>" selected="selected" > <?php echo $selected_day; ?> </option>
                                            <?php } else { ?>
                                                <option value="<?php echo $i ; ?>"><?php echo $i ; ?></option>
                                        <?php } } ?>
                                    </select>

                                    <select id="ibx_notify_notification_bar_countdown_hr" name="ibx_notify_notification_bar_countdown_hr">
                                        <option value=""><?php esc_html_e('hour', 'ibx_notify'); ?></option>
                                        <?php for ( $i = 0 ; $i <= 24 ; $i++ ){
                                            $selected_hr = $ibx_notify_notification_bar_countdown_hr;
                                            if ( $selected_hr != '' && $i == $selected_hr ){ ?>
                                                <option value="<?php echo $selected_hr; ?>" selected="selected" > <?php echo $selected_hr; ?> </option>
                                            <?php } else { ?>
                                                <option value="<?php echo $i ; ?>"><?php echo $i ; ?></option>
                                        <?php } } ?>
                                    </select>

                                    <select id="ibx_notify_notification_bar_countdown_min" name="ibx_notify_notification_bar_countdown_min">
                                        <option value=""><?php esc_html_e('min', 'ibx_notify'); ?></option>
                                        <?php for ( $i = 0 ; $i <= 60 ; $i++ ){
                                            $selected_min = $ibx_notify_notification_bar_countdown_min;
                                            if ( $selected_min != '' && $i == $selected_min ){ ?>
                                                <option value="<?php echo $selected_min; ?>" selected="selected" > <?php echo $selected_min; ?> </option>
                                            <?php } else { ?>
                                                <option value="<?php echo $i ; ?>"><?php echo $i ; ?></option>
                                        <?php } } ?>
                                    </select>
                                    <select id="ibx_notify_notification_bar_countdown_sec" name="ibx_notify_notification_bar_countdown_sec">
                                        <option value=""><?php esc_html_e('sec', 'ibx_notify'); ?></option>
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
                                    <label for="ibx_notify_enable_notification_email"><?php esc_html_e('Enable Email opt-in?', 'ibx_notify'); ?></label>
                                </th>
                                <td>
                                    <input id="ibx_notify_enable_notification_email" name="ibx_notify_enable_notification_email" type="checkbox" class="" value="1" <?php echo ( $ibx_notify_enable_notification_email ? 'checked="checked"' : '' ); ?> />
                                    <label for="ibx_notify_enable_notification_email"><?php esc_html_e( 'If checked, this will activate Email opt-in.', 'ibx_notify' ); ?></label>
                                </td>
                            </tr>
                            <tr class="ibx-notify-noti-email-wrap">
                                <th scope="row" valign="top">
                                    <label for="ibx_notify_notification_email"><?php esc_html_e('Email', 'ibx_notify'); ?></label>
                                </th>
                                <td>
                                    <input id="ibx_notify_notification_email" name="ibx_notify_notification_email" type="email" value="<?php echo ( $ibx_notify_notification_email ); ?>" />
                                </td>
                            </tr>
                        </table>
                </div>
                <div class="ibx_notify_cust_msg side_wraper" id="msg">
                        <table class="form-table">
                            <tr>
                                <th scope="row" valign="top">
                                    <label><?php esc_html_e('Message', 'ibx_notify'); ?></label>
                                </th>
                                <td>
                                    <?php
                                            if( $ibx_notify_cust_msg_msg != '' ) { $content = $ibx_notify_cust_msg_msg; }else{ $content = '{ Name } just purchased this awesome product'; }
                                            $editor_id = 'ibx_notify_cust_msg_msg';
                                            wp_editor( $content, $editor_id );
                                    ?>
                                </td>
                            </tr>
                        </table>
        		</div>
                <div class="ibx_notify_sale side_wraper" id="sale">
                    <table class="form-table">
                        <tr>
                            <th scope="row" valign="top">
                                <label><?php esc_html_e('Clickable Reviews?', 'ibx_notify'); ?></label>
                            </th>
                            <td>
                                <input id="ibx_notify_sale_clickable" name="ibx_notify_sale_clickable" type="checkbox" class="" value="1" <?php echo ( $ibx_notify_config_hide_button ? 'checked="checked"' : '' ); ?> />
                                <label for="ibx_notify_sale_clickable"><?php esc_html_e( 'Check this if you want to make review section Clickable and redirect to some url.', 'ibx_notify' ); ?></label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" valign="top">
                                <label><?php esc_html_e('URL', 'ibx_notify'); ?></label>
                            </th>
                            <td>
                                <input id="ibx_notify_sale_url" name="ibx_notify_sale_url" type="text" value="" />
                            </td>
                        </tr>
                    </table>

                    <div class="ibx_notify_sale_table">
                        <?php
                        if ( isset( $ibx_notify_sale ) && $ibx_notify_sale != '' ) {
                            foreach ( $ibx_notify_sale as $key => $value ) { ?>
                                    <table class="form-table sale-table" id='sale_div_<?php echo $key; ?>'>
                                                    <tbody class="ibx_notify_sale_tbody" >
                                                            <tr class="ibx_notify_sale_tr">
                                                                <th>
                                                                    <h3><?php esc_html_e('Sale Notification', 'ibx_notify'); ?></h3></th>
                                                                <td class="sale-button"><button type="button" class="del-tr button button-secondary" name="button"><?php esc_html_e('Remove', 'ibx_notify'); ?></button>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" valign="top"><?php esc_html_e('Name', 'ibx_notify'); ?></th>
                                                                <td class="">
                                                                    <input type="text" name="ibx_notify_sale[<?php echo $key; ?>][ibx_notify_sale_name]" placeholder="Name" value="<?php echo ( $value['ibx_notify_sale_name'] ); ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" valign="top"><?php esc_html_e('Email', 'ibx_notify'); ?></th>
                                                                <td class="">
                                                                    <input type="email" name="ibx_notify_sale[<?php echo $key; ?>][ibx_notify_sale_email]" placeholder="Email" value="<?php echo ( $value['ibx_notify_sale_email'] ); ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" valign="top"><?php esc_html_e('Message', 'ibx_notify'); ?></th>
                                                                <td>
                                                                    <textarea cols="60" rows="3" name="ibx_notify_sale[<?php echo $key; ?>][ibx_notify_sale_msg]"><?php echo ( $value['ibx_notify_sale_msg'] ); ?> </textarea>
                                                                </td>
                                                            </tr>
                                                    </tbody>
                                    </table>
                        <?php    } }else{ ?>
                                    <table class="form-table sale-table" id='sale_div_0'>
                                                    <tbody class="ibx_notify_sale_tbody" >
                                                            <tr class="ibx_notify_sale_tr">
                                                                <th>
                                                                    <h3><?php esc_html_e('Sale Notification', 'ibx_notify'); ?></h3></th>
                                                                <td class="sale-button"><button type="button" class="del-tr button button-secondary" name="button"><?php esc_html_e('Remove', 'ibx_notify'); ?></button>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" valign="top"><?php esc_html_e('Name', 'ibx_notify'); ?></th>
                                                                <td class="">
                                                                    <input type="text" name="ibx_notify_sale[0][ibx_notify_sale_name]" placeholder="Name" >
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" valign="top"><?php esc_html_e('Email', 'ibx_notify'); ?></th>
                                                                <td class="">
                                                                    <input type="email" name="ibx_notify_sale[0][ibx_notify_sale_email]" placeholder="Email">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" valign="top"><?php esc_html_e('Message', 'ibx_notify'); ?></th>
                                                                <td>
                                                                    <textarea cols="60" rows="3" name="ibx_notify_sale[0][ibx_notify_sale_msg]"></textarea>
                                                                </td>
                                                            </tr>
                                                    </tbody>
                                    </table>
                            <?php    } ?>
                    </div>
                    <hr/>

                    <button type="button" class="button button-primary add-tr" name="button"><?php esc_html_e('Add', 'ibx_notify'); ?></button>
        		</div>


                <div class="ibx_notify_reviews side_wraper" id="reviews">
                    <table class="form-table">
                        <tr>
                            <th scope="row" valign="top">
                                <label><?php esc_html_e('Clickable Reviews?', 'ibx_notify'); ?></label>
                            </th>
                            <td>
                                <input id="ibx_notify_reviews_clickable" name="ibx_notify_reviews_clickable" type="checkbox" class="" value="1" <?php echo ( $ibx_notify_config_hide_button ? 'checked="checked"' : '' ); ?> />
                                <label for="ibx_notify_reviews_clickable"><?php esc_html_e( 'Check this if you want to make review section Clickable and redirect to some url.', 'ibx_notify' ); ?></label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" valign="top">
                                <label><?php esc_html_e('URL', 'ibx_notify'); ?></label>
                            </th>
                            <td>
                                <input id="ibx_notify_reviews_url" name="ibx_notify_reviews_url" type="text" value="" />
                            </td>
                        </tr>
                    </table>
                    <div class="ibx_notify_review_table">
                        <?php
                        if ( isset( $ibx_notify_reviews ) && $ibx_notify_reviews != '' ) {
                            foreach ( $ibx_notify_reviews as $rev_key => $rev_value ) { ?>

                                    <table class="form-table review-table" id="div_<?php echo $rev_key; ?>" >
                                                    <tbody class="ibx_notify_reviews_tbody" >
                                                            <tr class="ibx_notify_reviews_tr">
                                                                <th>
                                                                    <h3><?php esc_html_e('Reviews', 'ibx_notify'); ?></h3></th>
                                                                <td class="review-button"><button type="button" class="del-tr button button-secondary" name="button"><?php esc_html_e('Remove', 'ibx_notify'); ?></button>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" valign="top"><?php esc_html_e('Image uploader', 'ibx_notify'); ?></th>
                                                                <td class="img-uploader">
                                                                    <input class="ibx_notify_reviews_image" type="text" name="ibx_notify_reviews[<?php echo $rev_key; ?>][ibx_notify_reviews_img]" value="<?php echo ( $rev_value['ibx_notify_reviews_img'] ); ?>" />
                                                                    <input class="ibx_notify_reviews_image_button button button-secondary" type="button" value="Upload Image" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" valign="top"><?php esc_html_e('Ratings', 'ibx_notify'); ?></th>
                                                                <td class="">
                                                                    <select id="ibx_notify_rating" name="ibx_notify_reviews[<?php echo $rev_key; ?>][ibx_notify_rating]">
                                                                        <?php
                                                                        $positon_options = array(
                                                                                '' => __( 'Rating', 'ibx_notify' ),
                                                                                '1' => __( '1', 'ibx_notify' ),
                                                                                '2' => __( '2', 'ibx_notify' ),
                                                                                '3' => __( '3', 'ibx_notify' ),
                                                                                '4' => __( '4', 'ibx_notify' ),
                                                                                '5' => __( '5', 'ibx_notify' ),
                                                                            );
                                                                            foreach ( $positon_options as $rate_key => $rate ) {
                                                                                if( isset( $rev_value['ibx_notify_rating'] ) && $rev_value['ibx_notify_rating'] == $rate_key ) {?>
                                                                                    <option value="<?php echo $rate_key ; ?>" selected="selected"><?php echo $rate ; ?></option>
                                                                                <?php }else{ ?>
                                                                                    <option value="<?php echo $rate_key ; ?>"><?php echo $rate ; ?></option>
                                                                                <?php } }?>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" valign="top"><?php esc_html_e('Message', 'ibx_notify'); ?></th>
                                                                <td>
                                                                    <textarea cols="60" rows="3" name="ibx_notify_reviews[<?php echo $rev_key; ?>][ibx_notify_review_msg]" >
                                                                        <?php esc_html_e( $rev_value['ibx_notify_review_msg'] ); ?>
                                                                    </textarea>
                                                                </td>
                                                            </tr>
                                                    </tbody>
                                    </table>
                                <?php } }else{ ?>
                                    <table class="form-table review-table" id="div_0">
                                                    <tbody class="ibx_notify_reviews_tbody" >
                                                            <tr class="ibx_notify_reviews_tr">
                                                                <th>
                                                                    <h3><?php esc_html_e('Reviews', 'ibx_notify'); ?></h3></th>
                                                                <td class="review-button"><button type="button" class="del-tr button button-secondary" name="button"><?php esc_html_e('Remove', 'ibx_notify'); ?></button>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" valign="top"><?php esc_html_e('Image uploader', 'ibx_notify'); ?></th>
                                                                <td class="img-uploader">
                                                                    <input class="ibx_notify_reviews_image" type="text" name="ibx_notify_reviews[0][ibx_notify_reviews_img]" value="" />
                                                                    <input class="ibx_notify_reviews_image_button button button-secondary" type="button" value="Upload Image" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" valign="top"><?php esc_html_e('Ratings', 'ibx_notify'); ?></th>
                                                                <td class="">
                                                                    <select id="ibx_notify_rating" name="ibx_notify_reviews[0][ibx_notify_rating]">
                                                                        <?php
                                                                        $positon_options = array(
                                                                                '' => __( 'Rating', 'ibx_notify' ),
                                                                                '1' => __( '1', 'ibx_notify' ),
                                                                                '2' => __( '2', 'ibx_notify' ),
                                                                                '3' => __( '3', 'ibx_notify' ),
                                                                                '4' => __( '4', 'ibx_notify' ),
                                                                                '5' => __( '5', 'ibx_notify' ),
                                                                            );
                                                                            foreach ( $positon_options as $key => $value ) { ?>
                                                                                    <option value="<?php echo $key ; ?>"><?php echo $value ; ?></option>
                                                                                <?php } ?>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" valign="top"><?php esc_html_e('Message', 'ibx_notify'); ?></th>
                                                                <td>
                                                                    <textarea cols="60" rows="3" name="ibx_notify_reviews[0][[ibx_notify_review_msg]["> <?php echo 'ibx_notify_review_msg'; ?></textarea>
                                                                </td>
                                                            </tr>
                                                    </tbody>
                                    </table>
                                <?php } ?>
                    </div>
                    <hr/>
                    <button type="button" class="button button-primary add-tr" name="button"><?php esc_html_e('Add', 'ibx_notify'); ?></button>
                            <!-- <td class="review-button"><span class='dashicons dashicons-plus add-tr'></span></td> -->
        		</div>
    </div>

    <div class="ibx_notify_container" id="Design">
            <div class="ibx_notify_display_wraper">
                <p class="ibx-notify-intro"><?php esc_html_e('Design Options', 'ibx_notify'); ?>
                    <small>
                        <?php esc_html_e('The section below is to change style, color and position of your content.', 'ibx_notify'); ?>
                        <br>
                    </small>
                </p>
                <table class="form-table">
                    <tr>
                        <th scope="row" valign="top">
                            <label><?php esc_html_e('Positon', 'ibx_notify'); ?></label>
                        </th>
                        <td>
                            <select id="ibx_notify_design_position" name="ibx_notify_design_position">
                                <?php
                                $positon_options = array(
                                        'bottom-right' => __( 'Bottom right', 'ibx_notify' ),
                                        'bottom-left' => __( 'Bottom left', 'ibx_notify' ),
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
                        <label><?php esc_html_e('Text Color', 'ibx_notify'); ?></label>
                    </th>
                    <td>
                        <?php $text_color = get_option('ibx_notify_design_text_color'); ?>
                        <input type="text" id="ibx_notify_design_text_color" name="ibx_notify_design_text_color" class="my-color-field" data-default-color="#000" value="<?php echo ( $ibx_notify_design_text_color != '' ) ? $ibx_notify_design_text_color : '#000' ; ?> " >
                    </td>
                    </tr>
                    <tr>
                        <th scope="row" valign="top">
                            <label><?php esc_html_e('Background Color', 'ibx_notify'); ?></label>
                        </th>
                        <td>
                            <?php $text_background_color = get_option('ibx_notify_design_back_color'); ?>
                            <input type="text" id="ibx_notify_design_back_color" name="ibx_notify_design_back_color" class="my-color-field" data-default-color="#ffffff" value="<?php echo ( $ibx_notify_design_back_color != '' ) ? $ibx_notify_design_back_color : '#ffffff' ; ?> " >
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" valign="top">
                            <label><?php esc_html_e('Button Color', 'ibx_notify'); ?></label>
                        </th>
                        <td>
                            <?php $button_color = get_option('ibx_notify_design_button_color'); ?>
                            <input type="text" id="ibx_notify_design_button_color" name="ibx_notify_design_button_color" class="my-color-field" data-default-color="#0b6bbf" value="<?php echo ( $ibx_notify_design_button_color != '' ) ? $ibx_notify_design_button_color : '#0b6bbf' ; ?> " >
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" valign="top">
                            <label><?php esc_html_e('Button Text Color', 'ibx_notify'); ?></label>
                        </th>
                        <td>
                            <?php $button_color = get_option('ibx_notify_design_button_text_color'); ?>
                            <input type="text" id="ibx_notify_design_button_text_color" name="ibx_notify_design_button_text_color" class="my-color-field" data-default-color="#0b6bbf" value="<?php echo ( $ibx_notify_design_button_text_color != '' ) ? $ibx_notify_design_button_text_color : '#000000' ; ?> " >
                        </td>
                    </tr>
                </table>
            </div>
    </div>

    <div class="ibx_notify_container" id="Visibility">
        <div class="ibx-notify-visibility-wraper">
            <p class="ibx-notify-intro"><?php esc_html_e('Visibility Options', 'ibx_notify'); ?>
                <small>
                    <?php esc_html_e('The section below is to set visibility of Content.', 'ibx_notify'); ?>
                    <br>
                </small>
            </p>
            <table class="form-table">
                <tr>
                    <th scope="row" valign="top">
                        <label><?php esc_html_e('What pages?', 'ibx_notify'); ?></label>
                    </th>
                    <td>
                        <select id="ibx_notify_visibility_page" name="ibx_notify_visibility_page">
                            <?php
                            $page_options = array(
                                    'all-pages' => __( 'All pages', 'ibx_notify' ),
                                    'certain-pages' => __( 'Certain pages', 'ibx_notify' ),
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
                        <label><?php esc_html_e('Show to these visitors', 'ibx_notify'); ?></label>
                    </th>
                    <td>
                        <select id="ibx_notify_visibility_log" name="ibx_notify_visibility_log">
                            <?php
                            $log_options = array(
                                    'log-all' => __( 'All visitors', 'ibx_notify' ),
                                    'log-in' => __( 'Logged in only', 'ibx_notify' ),
                                    'log-out' => __( 'Logged out only', 'ibx_notify' ),
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
                        <label><?php esc_html_e('New or returning', 'ibx_notify'); ?></label>
                    </th>
                    <td>
                        <select id="ibx_notify_visibility_visit" name="ibx_notify_visibility_visit">
                            <?php
                            $visit_options = array(
                                    'visit-all' => __( 'All visitors', 'ibx_notify' ),
                                    'visit-new' => __( 'New visitors only', 'ibx_notify' ),
                                    'visit-return' => __( 'Returning visitors only', 'ibx_notify' ),
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
                        <label><?php esc_html_e('When should we show it?', 'ibx_notify'); ?></label>
                    </th>
                    <td>
                        <select id="ibx_notify_visibility_show" name="ibx_notify_visibility_show">
                            <?php
                            $show_options = array(
                                    'immediate' => __( 'Immediately', 'ibx_notify' ),
                                    'delay' => __( 'Delay of some time', 'ibx_notify' ),
                                    'scroll' => __( 'User scrolls halfway down the page', 'ibx_notify' ),
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
                        <label><?php esc_html_e('Delay of?', 'ibx_notify'); ?></label>
                    </th>
                    <td>
                        <input type="number" id="ibx_notify_visibility_show_delay" name="ibx_notify_visibility_show_delay" value="<?php echo $ibx_notify_visibility_show_delay; ?> "><label><?php esc_html_e('seconds', 'ibx_notify'); ?></label>
                    </td>
                </tr>
                <tr>
                    <th scope="row" valign="top">
                        <label><?php esc_html_e('After it displays, when should it disappear?', 'ibx_notify'); ?></label>
                    </th>
                    <td>
                        <select id="ibx_notify_visibility_disappear" name="ibx_notify_visibility_disappear">
                            <?php
                            $disappear_options = array(
                                    'click-to-hide' => __( 'When user clicks hide', 'ibx_notify' ),
                                    'disappear-delay' => __( 'Delay of some time', 'ibx_notify' ),
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
                        <label><?php esc_html_e('Delay of?', 'ibx_notify'); ?></label>
                    </th>
                    <td>
                        <input type="number" id="ibx_notify_visibility_disappear_delay" name="ibx_notify_visibility_disappear_delay" value="<?php echo $ibx_notify_visibility_disappear_delay; ?> "><label><?php esc_html_e('seconds', 'ibx_notify'); ?></label>
                    </td>
                </tr>
                <tr>
                    <th scope="row" valign="top">
                        <label><?php esc_html_e('How often should we show it to each visitor?', 'ibx_notify'); ?></label>
                    </th>
                    <td>
                        <select id="ibx_notify_visibility_appear" name="ibx_notify_visibility_appear">
                            <?php
                            $appear_options = array(
                                    'page-load' => __( 'Every page load', 'ibx_notify' ),
                                    'click-to-submit' => __( 'Hide after user interacts (clicks link or submits email)', 'ibx_notify' ),
                                    'show-and-hide' => __( 'Show, then hide for some days', 'ibx_notify' ),
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
                        <label><?php esc_html_e('Hide for', 'ibx_notify'); ?></label>
                    </th>
                    <td>
                        <input type="number" id="ibx_notify_visibility_appear_hide" name="ibx_notify_visibility_appear_hide" value="<?php echo $ibx_notify_visibility_appear_hide; ?> "><label><?php esc_html_e('days', 'ibx_notify'); ?></label>
                    </td>
                </tr>
            </table>
        </div>
</div>
</form>
