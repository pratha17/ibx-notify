<?php

class IBX_Notify_Ajax {
    public function __construct()
    {
        add_action( 'wp_ajax_nopriv_ibx_fomo_get_conversions', array( $this, 'get_conversions' ) );
        add_action( 'wp_ajax_ibx_fomo_get_conversions', array( $this, 'get_conversions' ) );
    }

    public function get_conversions()
    {
        if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'ibx_fomo_conversion_nonce_front' ) ) {
            return;
        }
        if ( ! isset( $_POST['ids'] ) || empty( $_POST['ids'] ) || ! is_array( $_POST['ids'] ) ) {
            return;
        }

        $ids = $_POST['ids'];
        $data = [];

        foreach ( $ids as $id ) {
            $settings = MetaBox_Tabs::get_metabox_settings( $id );
            $data['config'] = array(
                'id'                => $id,
                'initial_delay'     => !empty( $settings->initial_delay ) ? $settings->initial_delay * 1000 : 0,
                'max_per_page'      => $settings->max_per_page,
                'display_duration'  => !empty( $settings->display_time ) ? $settings->display_time * 1000 : 0,
                'delay_each'        => !empty( $settings->delay_between ) ? $settings->delay_between * 1000 : 0,
                'random_order'      => $settings->random,
                'loop'              => $settings->loop,
                'random_delay'      => $settings->randomize
            );

            ob_start();
            include IBX_NOTIFY_DIR . 'includes/frontend-conversion.php';
            $content = ob_get_clean();

            $data['content'] = $content;
        }

        echo json_encode($data); die;
    }
}

$ibx_notify_ajax = new IBX_Notify_Ajax();
