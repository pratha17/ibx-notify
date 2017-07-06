<?php

class IBX_Notify_Helper {
    static public function get_notification_msg( $msg, $tags )
    {
        foreach ( $tags as $tag => $value ) {
            $msg = str_replace( $tag, $value, $msg );
        }

        $msg = str_replace( '\\', '', $msg );

        return $msg;
    }
}
