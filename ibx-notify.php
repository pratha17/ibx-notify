<?php
/*
* Plugin Name: IBX Notify
* Description:
* Plugin URI:
* Author: Prashant Khatri
* Author URI:
* Version: 1.0.0
* Copyright: (c) 2017 IdeaBox Creations
* License:
* License URI:
*/

define( 'IBX_NOTIFY_VER', '1.0.0' );
define( 'IBX_NOTIFY_DIR', plugin_dir_path( __FILE__ ) );
define( 'IBX_NOTIFY_URL', plugins_url( '/', __FILE__ ) );
define( 'IBX_NOTIFY_PATH', plugin_basename( __FILE__ ) );

require_once IBX_NOTIFY_DIR . 'classes/class-ibx-notify-posttype.php';
require_once IBX_NOTIFY_DIR . 'classes/class-ibx-notify-ajax.php';
require_once IBX_NOTIFY_DIR . 'classes/class-ibx-notify-frontend.php';

?>
