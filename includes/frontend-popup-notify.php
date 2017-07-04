<?php
if ( 'purchase' == $settings->type OR 'reviews' == $settings->type ) {

$all_val    =  array( );
    if ( 'purchase' == $settings->type && $settings->purchase_group != '' ){
        $all_val    =   $settings->purchase_group;
    }elseif ( 'reviews' == $settings->type && $settings->reviews_group != '' ){
        $all_val    =   $settings->reviews_group;
    }
if ( 1 == $settings->clickable && $settings->url != '' ) { $href = $settings->url; $c = 'clickable'; }else { $href = '#';$c = 'not-clickable'; }

        foreach ( $all_val as $key => $value ) { ?>
            <div class="ibx-notify-popup <?php echo $id;?>" datalist="<?php echo $id;?>">
                <div class="ibx-notify-popup-wraper <?php if ( $settings->position == 'bottom-right' ){ echo 'popup-wraper-right';}else{ echo 'popup-wraper-left'; }?>" id="ibx-notify-<?php echo $key; ?>">
                    <a class="<?php if( 'click' == $settings->hide ){echo 'close';}else{ echo 'no-close'; }?> " title="Close" style="">×</a>
                    <a href="<?php echo $href;?>" class="<?php echo $c;?>">
                        <div class="ibx-notify-container <?php if( 'click' == $settings->hide ){echo 'container-close';}else{ echo 'container-no-close'; }?>">
                            <div class="ibx-notify-text">
                                <div class="ibx-notify-img">
                                    <img src="<?php echo $value['image']['url']; ?>" alt="">
                                </div>
                                <div class="ibx-notify-text-wraper" datalist="<?php echo $settings->show_delay; ?>" data-time="">
                                    <div class="ibx-notify-text-wrap" data-time="<?php echo $settings->hide; ?>" >
                                        <div class="ibx-notify-text-content" data-editable="true" data-time="<?php echo $settings->hide_delay; ?>" >
                                            <?php if( isset($value['name']) && $value['name'] != '' ){ ?>
                                                <strong>  <?php echo $value['name']; ?></strong>
                                            <?php } ?>
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
            .ibx-notify-popup-wraper .ibx-notify-container{
                background:     <?php if( $settings->background_color ){ echo $settings->background_color; }else{ echo '#ffffff'; } ?>;
                color:          <?php if( $settings->text_color ){ echo $settings->text_color; }else{ echo '#00000'; } ?>;
            }
            <?php if ( 1 == $settings->clickable && $settings->url != '' ) {   ?>
                .ibx-notify-popup-wraper a{
                    cursor:     pointer;
                }
            <?php } ?>
            .ibx-notify-popup-wraper .ibx-notify-text-content strong{
                color:          <?php if( $settings->name_color ){ echo $settings->name_color; }else{ echo '#00000'; } ?>;
                font-size:      15px;
            }
            .ibx-notify-popup-wraper .ibx-notify-container{
                color:          <?php if( $settings->text_color ){ echo $settings->text_color; }else{ echo '#00000'; } ?>;
            }
            .ibx-notify-popup-wraper .ibx-notify-container span{
                color:          <?php if( $settings->star_color ){ echo $settings->star_color; }else{ echo '#00000'; } ?>;
                font-size:      20px;
            }
            .ibx-notify-popup-wraper .close {
                color:      <?php if( $settings->text_color ){ echo $settings->text_color; }else{ echo '#00000'; } ?>;
                background: <?php if( $settings->background_color ){ echo $settings->background_color; }else{ echo '#ffffff'; } ?>;
            }

    </style>
<?php } ?>
