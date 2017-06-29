<?php
global $post;
$settings = MetaBox_Tabs::get_metabox_settings( $post->ID );
$all_val    =  array( );
    if ( 'purchase' == $settings->type && $settings->purchase_group != '' ){
        $all_val    =   $settings->purchase_group;
    }elseif ( 'reviews' == $settings->type && $settings->reviews_group != '' ){
        $all_val    =   $settings->reviews_group;
    }
    if ( 1 == $settings->clickable && $settings->url != '' ) {
        $href       =   $settings->url;
    }else {
        $href       =   '#';
    }

    $closeable   =  '';
    if ( 'never'    ==  $settings->hide ) { $closeable   =  'no'; }
    if ( 'click'    ==  $settings->hide ) { $closeable   =  'yes'; }
?>

<?php if ( 1 == $settings->active_check && 'not_bar' != $settings->type  ) {
        foreach ( $all_val as $key => $value ) { ?>
            <div class="ibx-notify-popup-wraper" id="ibx-notify-<?php echo $key; ?>">
                <a class="close" title="Close" style="">×</a>
                <a href="<?php echo $href;?>">
                    <div class="ibx-notify-container">
                        <div class="ibx-notify-text">
                            <div class="ibx-notify-img">
                                <img src="<?php echo $value['image']['url']; ?>" alt="">
                            </div>
                            <div class="ibx-notify-text-wraper" datalist="<?php echo $settings->show_delay; ?>" data-time="<?php echo $settings->transition_delay; ?>">
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
    <?php } ?>

    <style media="screen">
        .ibx-notify-popup-wraper{
            display:    none;
        }
        <?php if ( $settings->position == 'bottom-left' ){ ?>
            .ibx-notify-popup-wraper{
                position:       fixed;
                bottom:         40px;
                left:           40px;
            }
        <?php }elseif ( $settings->position == 'bottom-right' ){?>
            .ibx-notify-popup-wraper{
                position:       fixed;
                bottom:         40px;
                right:          40px;
            }
        <?php } ?>
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
            <?php if ( 'yes' == $closeable ){ ?>
                .ibx-notify-popup-wraper .close {
                    display:    block;
                    color:      <?php if( $settings->text_color ){ echo $settings->text_color; }else{ echo '#00000'; } ?>;
                    cursor:     pointer;
                    font-size:  15px;
                    font-weight:900;
                    position:   absolute;
                    top:        2px;
                    right:      5px;
                    text-decoration: none!important;
                    vertical-align: text-top;
                }
                .ibx-notify-container {
                    padding:    15px 20px 15px 15px;
                }
            <?php }else{ ?>
                .ibx-notify-popup-wraper .close {
                    display:    none;
                }
                .ibx-notify-container {
                    padding:    15px;
                }
            <?php } ?>

    </style>
<?php } ?>
