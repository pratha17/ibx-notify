<?php
global $post;
$settings = MetaBox_Tabs::get_metabox_settings( $post->ID );
?>
<?php if ( 'not_bar' == $settings->type && 1 == $settings->active_check ){ ?>
    <div class="ibx-notify-notification-bar-wraper" datalist ="<?php echo $settings->show_delay; ?>" data-time="<?php echo $settings->hide_delay;?>">
        <div class="container" datalist="<?php echo $settings->hide; ?>">
            <a class="close" title="Close" style="">×</a>
            <div class="timer">
                <div class="timer-text">
                    <p>
                        <?php esc_html_e( $settings->countdown_text, 'ibx_notify' ); ?>
                    </p>
                </div>
                <div class="timer-counter" data-time="<?php if( isset($settings->countdown_time['days'] ) && 'not_bar' == $settings->type ){ echo $settings->countdown_time['days'].','.$settings->countdown_time['hours'].','.$settings->countdown_time['minutes'].','.$settings->countdown_time['seconds'] ; } ?>">
                    <p id="start"><b>00</b><b>00</b><b>00</b><b>00</b></p>
                </div>
            </div>

            <div class="text">
                <div class="text-wrap">
                    <div class="text-content" data-editable="true">
                        <?php echo html_entity_decode( $settings->not_description ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <style media="screen">
        .ibx-notify-notification-bar-wraper{
            background: <?php if ( $settings->background_color != '' ){ echo $settings->background_color; }else{ echo '#ffffff'; } ?>;
            color: <?php if ( $settings->text_color != '' ){ echo $settings->text_color; }else{ echo '#000000'; } ?>;
            position: <?php if ( $settings->sticky == 1 ){ echo 'fixed'; }else{ echo 'absolute'; } ?>;
            top: 0;
            left: 0;
        }
        .ibx-notify-notification-bar-wraper .timer{
            background: <?php if ( $settings->countdown_background_color != '' ){ echo $settings->countdown_background_color; }else{ echo '#ff0000'; } ?>;
            color: <?php if ( $settings->countdown_text_color != '' ){ echo $settings->countdown_text_color; }else{ echo '#ffffff'; } ?>;
        }
        .ibx-notify-notification-bar-wraper .close{
            display: <?php if( 'click' == $settings->hide ){ echo 'block'; }else{ echo 'none'; } ?>
        }
        </style>
<?php }; ?>
