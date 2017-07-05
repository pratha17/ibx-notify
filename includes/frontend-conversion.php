<?php
    $type               = $settings->type;
    $hide_on_desktop    = ( $settings->hide_desktop ) ? true : false;
    $hide_on_mobile     = ( $settings->hide_mobile ) ? true : false;
    $is_closable_popup  = $settings->closable;
    $position           = $settings->position;
    $group_fields       = array();
    $classes            = '';

    if ( 'conversion' == $type && '' != $settings->conversion_group ){
        $group_fields = $settings->conversion_group;
    } elseif ( 'reviews' == $type && '' != $settings->reviews_group ){
        $group_fields = $settings->reviews_group;
    }

    if ( $hide_on_desktop ) {
        $classes .= ' ibx-notification-hide-desktop';
    }
    if ( $hide_on_mobile ) {
        $classes .= ' ibx-notification-hide-mobile';
    }

    $classes .= ' ibx-notification-' . $position;

    foreach ( $group_fields as $key => $value ) { ?>
        <div class="ibx-notification-popup ibx-notification-popup-<?php echo $id; ?><?php echo $classes; ?>" id="ibx-notification-popup-<?php echo $id; ?>" data-popup-id="<?php echo $id;?>">
            <div class="ibx-notification-popup-wraper" id="ibx-notify-<?php echo $key; ?>">

                <?php if ( $is_closable_popup ) : ?>
                <p class="ibx-notification-popup-close" title="<?php esc_html_e('Close', 'ibx-notify'); ?>">×</p>
                <?php endif; ?>

                <?php if ( $value['msg_url'] != '' ) { $href = $value['msg_url']; $c = 'clickable'; }else { $href = '#';$c = 'not-clickable'; } ?>
                <a href="<?php echo $href;?>" class="<?php echo $c;?>" <?php if( 1 == $settings->trigger){echo "target='_blank'";} ?> >
                    <div class="ibx-notify-container <?php if( '1' == $settings->closable ){echo 'container-close';}else{ echo 'container-no-close'; }?>">
                        <div class="ibx-notify-text">
                            <div class="ibx-notify-img">
                                <img src="<?php echo $value['image']['url']; ?>" alt="">
                            </div>
                            <div class="ibx-notify-text-wraper" datalist="<?php echo $settings->max_per_page; ?>" data-time="<?php echo $settings->initial_delay; ?>">
                                <div class="ibx-notify-text-wrap" data-time="<?php echo $settings->delay_between; ?>" >
                                    <div class="ibx-notify-text-content" data-editable="true" data-time="<?php echo $settings->display_time; ?>" >
                                        <?php if( isset($settings->message_format) ){
                                                echo($settings->message_format);
                                            } ?>
                                        <?php if( isset($value['msg']) && $value['msg'] != '' ){ ?>
                                            <?php echo $value['msg']; ?>
                                        <?php } ?>
                                        <?php if( isset($value['rating']) && $value['rating'] != '' ){ ?>
                                            <div class="ibx-notify-rating">
                                                <?php for ($i=0; $i < $value['rating'] ; $i++) { ?>
                                                     <span>&#9734</span>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
<?php } ?>

    <style media="screen">
            .ibx-notification-popup-wraper .ibx-notify-container{
                background:     <?php if( $settings->background_color ){ echo $settings->background_color; }else{ echo '#ffffff'; } ?>;
                color:          <?php if( $settings->text_color ){ echo $settings->text_color; }else{ echo '#00000'; } ?>;
            }
            .ibx-notification-popup-wraper .ibx-notify-text-content strong{
                color:          <?php if( $settings->name_color ){ echo $settings->name_color; }else{ echo '#00000'; } ?>;
                font-size:      15px;
            }
            .ibx-notification-popup-wraper .ibx-notify-container span{
                color:          <?php if( $settings->star_color ){ echo $settings->star_color; }else{ echo '#00000'; } ?>;
                font-size:      20px;
            }
            .ibx-notification-popup-wraper .close {
                color:      <?php if( $settings->text_color ){ echo $settings->text_color; }else{ echo '#00000'; } ?>;
                background: <?php if( $settings->background_color ){ echo $settings->background_color; }else{ echo '#ffffff'; } ?>;
            }

    </style>
