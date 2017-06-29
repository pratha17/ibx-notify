<?php
global $post;
$settings = MetaBox_Tabs::get_metabox_settings( $post->ID );

if ( 'msg' == $settings->type  && 1 == $settings->active_check ) { ?>
    <div class="ibx-notify-wraper">
        <div class="ibx-notify-container">
                <div class="ibx-notify-text">
                    <?php echo ( $settings->msg_section); ?>
                </div>
        </div>
    </div>
    <!-- <div class="ibx-notify-toggel-button">
        <img src="<?php echo IBX_NOTIFY_URL . 'assest\img\plus.png'; ?>" alt="" id="show">
        <img src="<?php echo IBX_NOTIFY_URL . 'assest\img\min.png'; ?>" alt="" id="hide">
    </div> -->

        <div class="ibx-notify-toggel-button">
            <button style="background-color: rgb(1, 118, 255); fill: rgb(255, 255, 255); padding:12px;" id="show">
                <svg width="25" height="25" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.583 14.894l-3.256 3.78c-.7.813-1.26.598-1.25-.46a10689.413 10689.413 0 0 1 .035-4.775V4.816a3.89 3.89 0 0 1 3.88-3.89h12.064a3.885 3.885 0 0 1 3.882 3.89v6.185a3.89 3.89 0 0 1-3.882 3.89H4.583z" fill="#FFF" fill-rule="evenodd">
                    </path>
                </svg>
            </button>
            <button style="background-color: rgb(1, 118, 255); fill: rgb(255, 255, 255); padding:17px;" id="hide">
                <svg width="15" height="15" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.726 15.402c.365.366.365.96 0 1.324-.178.178-.416.274-.663.274-.246 0-.484-.096-.663-.274L8.323 9.648h.353L1.6 16.726c-.177.178-.416.274-.663.274-.246 0-.484-.096-.663-.274-.365-.365-.365-.958 0-1.324L7.35 8.324v.35L.275 1.6C-.09 1.233-.09.64.274.274c.367-.365.96-.365 1.326 0l7.076 7.078h-.353L15.4.274c.366-.365.96-.365 1.326 0 .365.366.365.958 0 1.324L9.65 8.675v-.35l7.076 7.077z" fill="#FFF" fill-rule="evenodd">
                    </path>
                </svg>
            </button>
        </div>


    <style media="screen">
        .ibx-notify-wraper{
            opacity: 0;
        }
        <?php if ( $settings->position == 'bottom-left' ){ ?>
            .ibx-notify-toggel-button{
                position:   fixed;
                bottom:     30px;
                left:       40px;
            }
            .ibx-notify-wraper{
                position:   fixed;
                bottom:     110px;
                left:       40px;
            }
    <?php }elseif ( $settings->position == 'bottom-right' ){?>
            .ibx-notify-toggel-button{
                position:           fixed;
                bottom:             30px;
                right:              40px;
                -moz-transform:     scaleX(-1);
                -o-transform:       scaleX(-1);
                -webkit-transform:  scaleX(-1);
                transform:          scaleX(-1);
            }
            .ibx-notify-wraper{
                position:   fixed;
                bottom:     110px;
                right:      40px;
            }
    <?php } ?>
        .ibx-notify-container{
            background:     <?php if( $settings->background_color ){ echo $settings->background_color; }else{ echo '#ffffff'; } ?>;
            color:          <?php if( $settings->text_color ){ echo $settings->text_color; }else{ echo '#00000'; } ?>;
        }
    </style>

<?php } ?>
