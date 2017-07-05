<?php

class IBX_Notify_Ajax {
    public function __construct()
    {
        add_action( 'wp_ajax_ibx_notify_get_conversions', array( $this, 'get_conversions' ) );
        add_action( 'wp_ajax_nopriv_ibx_notify_get_conversions', array( $this, 'get_conversions' ) );
    }

    public function get_conversions()
    {
        if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'ibx_notify_conversion_nonce_front' ) ) {
            return;
        }
        if ( ! isset( $_POST['ids'] ) || empty( $_POST['ids'] ) ) {
            return;
        }

        $ids = $_POST['ids'];
    }
}

$ibx_notify_ajax = new IBX_Notify_Ajax();
