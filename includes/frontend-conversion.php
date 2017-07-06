<?php
    $type               = $settings->type;
    $hide_on_desktop    = ( $settings->hide_desktop ) ? true : false;
    $hide_on_mobile     = ( $settings->hide_mobile ) ? true : false;
    $is_closable_popup  = $settings->closable;
    $position           = $settings->position;
    $group_fields       = array();
    $classes            = '';

    if ( 'conversion' == $type && '' != $settings->conversion_group ) {
        $group_fields = $settings->conversion_group;
    } elseif ( 'reviews' == $type && '' != $settings->reviews_group ) {
        $group_fields = $settings->reviews_group;
    }

    if ( $hide_on_desktop ) {
        $classes .= ' ibx-notification-hide-desktop';
    }
    if ( $hide_on_mobile ) {
        $classes .= ' ibx-notification-hide-mobile';
    }
    if ( $is_closable_popup ) {
        $classes .= ' ibx-notification-closable';
    }

    $classes .= ' ibx-notification-' . $position;
?>
<?php foreach ( $group_fields as $key => $value ) { ?>
    <div class="ibx-notification-popup ibx-notification-popup-<?php echo $id; ?><?php echo $classes; ?>" id="ibx-notification-popup-<?php echo $id; ?>" data-popup-id="<?php echo $id;?>">
        <div class="ibx-notification-popup-wrapper">

            <?php if ( $is_closable_popup ) : ?>
            <p class="ibx-notification-popup-close" title="<?php esc_html_e('Close', 'ibx-notify'); ?>">×</p>
            <?php endif; ?>

            <div class="ibx-notification-popup-content">
                <div class="ibx-notification-popup-img">
                    <img src="<?php echo $value['image']['url']; ?>" alt="">
                </div>
                <div class="ibx-notification-popup-text">
                    <?php if ( isset( $settings->notification_msg ) ) {
                        $title = '<span class="ibx-notification-popup-title">' . $value['title'] . '</span>';
                        if ( isset( $value['msg_url'] ) && !empty( $value['msg_url'] ) ) {
                            $target = ( ! $settings->link_target ) ? '_self' : '_blank';
                            $title = '<a href="'.$value['msg_url'].'" class="ibx-notification-popup-title" target="' . $target . '">' . $value['title'] . '</a>';
                        }
                        echo IBX_Notify_Helper::get_notification_msg( $settings->notification_msg, array(
                            '{{name}}'      => $value['name'],
                            '{{city}}'      => $value['city'],
                            '{{state}}'     => $value['state'],
                            '{{country}}'   => $value['country'],
                            '{{title}}'     => $title
                        ) );
                    } ?>
                    <?php if ( isset( $value['rating'] ) && $value['rating'] != '' ){ ?>
                        <div class="ibx-notification-popup-rating">
                            <?php for ( $i=0; $i < $value['rating'] ; $i++ ) { ?>
                                <span>&#9734</span>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
<?php } ?>
