<?php
/**
 * Plugin Name: Admin Change Log
 * Description: Logs important administrative changes and displays them in a simple admin timeline.
 * Version: 1.0.0
 * Author: Sai Varshith
 * License: GPLv2 or later
 * Text Domain: admin-change-log
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ACL_PLUGIN_VERSION', '1.0.0' );
define( 'ACL_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Load required files
 */
require_once ACL_PLUGIN_PATH . 'includes/class-acl-storage.php';
require_once ACL_PLUGIN_PATH . 'includes/class-acl-logger.php';
require_once ACL_PLUGIN_PATH . 'includes/class-acl-events.php';
require_once ACL_PLUGIN_PATH . 'includes/class-acl-admin-page.php';

/**
 * Bootstrap plugin
 */
add_action( 'plugins_loaded', function () {
	ACL_Events::register();
	ACL_Admin_Page::register();
});
