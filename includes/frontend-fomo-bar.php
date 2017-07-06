<?php
    $is_clickable = $settings->clickable;
    $is_closable = $settings->closable;
    $url = $settings->url;
    $countdown = '';
    if ( isset( $settings->countdown_time['days'] ) ) {
        $countdown .= $settings->countdown_time['days'] . ',';
    } else {
        $countdown .= '00';
    }
    if ( isset( $settings->countdown_time['hours'] ) ) {
        $countdown .= $settings->countdown_time['hours'] . ',';
    } else {
        $countdown .= '00';
    }
    if ( isset( $settings->countdown_time['minutes'] ) ) {
        $countdown .= $settings->countdown_time['minutes'] . ',';
    } else {
        $countdown .= '00';
    }
    if ( isset( $settings->countdown_time['seconds'] ) ) {
        $countdown .= $settings->countdown_time['seconds'];
    } else {
        $countdown .= '00';
    }
?>

<div class="ibx-fomo ibx-fomo-<?php echo $id; ?>" id="ibx-fomo-<?php echo $id; ?>" data-fomo-id="<?php echo $id; ?>" data-initial-delay="<?php echo $settings->initial_delay; ?>" data-display-duration="<?php echo $settings->display_time; ?>">
    <div class="ibx-fomo-bar-wrapper">

        <?php if ( $is_clickable && ! empty( $url ) ) : ?>
        <a href="<?php echo $url; ?>" class="ibx-fomo-bar-clickable">
        <?php endif; ?>

        <div class="ibx-fomo-bar-content">

            <?php if ( $is_closable ) : ?>
            <p class="ibx-fomo-bar-close" title="<?php esc_html_e('Close', 'ibx-notify'); ?>">×</p>
            <?php endif; ?>

            <div class="ibx-fomo-countdown-wrapper">
                <div class="ibx-fomo-countdown-text">
                    <p><?php echo $settings->countdown_text; ?></p>
                </div>
                <div class="ibx-fomo-countdown" data-fomo-time="<?php echo $countdown; ?>">
                    <p id="ibx-fomo-countdown-time">
                        <span class="ibx-fomo-days">00</span>
                        <span class="ibx-fomo-hours">00</span>
                        <span class="ibx-fomo-minutes">00</span>
                        <span class="ibx-fomo-seconds">00</span>
                        <span class="ibx-fomo-expired-text"><?php esc_html_e('Expired!', 'ibx-notify'); ?></span>
                    </p>
                </div>
            </div>
            <div class="ibx-fomo-bar-text">
                <?php echo html_entity_decode( $settings->fomo_desc ); ?>
            </div>
        </div>

        <?php if ( $is_clickable && ! empty( $url ) ) : ?>
        </a>
        <?php endif; ?>

    </div>
</div>

<style id="ibx-fomo-<?php echo $id; ?>-style">
    <?php echo '#ibx-fomo-' . $id; ?> .ibx-fomo-bar-wrapper {
        background: <?php if ( $settings->background_color != '' ) { echo $settings->background_color; } else { echo '#ffffff'; } ?>;
        color: <?php if ( $settings->text_color != '' ) { echo $settings->text_color; } else { echo '#000000'; } ?>;
        position: <?php if ( $settings->sticky == 1 ) { echo 'fixed'; } else { echo 'absolute'; } ?>;
    }
    <?php echo '#ibx-fomo-' . $id; ?> .ibx-fomo-bar-wrapper .ibx-fomo-countdown-wrapper {
        background: <?php if ( $settings->countdown_background_color != '' ) { echo $settings->countdown_background_color; } else { echo '#ff0000'; } ?>;
        color: <?php if ( $settings->countdown_text_color != '' ) { echo $settings->countdown_text_color; } else { echo '#ffffff'; } ?>;
    }
    <?php echo '#ibx-fomo-' . $id; ?> .ibx-fomo-bar-wrapper {
        border: <?php if ( $settings->border != '' ) { echo ( $settings->border ).'px'; } else { echo '0px'; } ?> solid <?php if ( $settings->border_color != '' ) { echo ( $settings->border_color ) ; } else { echo '#000'; } ?>;

        <?php if ( $settings->shadow_strength != '' ) { $strength = ( $settings->shadow_strength ).'px'; } else { $strength = '0px'; } ?>;
        <?php if ( $settings->shadow_blur != '' ) { $blur = ( $settings->shadow_blur ).'px'; } else { $blur = '0px'; } ?>;
        <?php if ( $settings->shadow_color != '' ) { $shadow_color = $settings->shadow_color; } else { $shadow_color = '#999999'; } ?>;

        -webkit-box-shadow: 0 0 <?php echo $strength.' '.$blur.' '.$shadow_color; ?>;
            -moz-box-shadow: 0 0 <?php echo $strength.' '.$blur.' '.$shadow_color; ?>;
            -o-box-shadow: 0 0 <?php echo $strength.' '.$blur.' '.$shadow_color; ?>;
            box-shadow: 0 0 <?php echo $strength.' '.$blur.' '.$shadow_color; ?>;
    }

</style>
