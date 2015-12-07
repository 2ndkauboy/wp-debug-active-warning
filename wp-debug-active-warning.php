<?php
/*
 * Plugin Name: WP_DEBUG active warning
 * Description: This plugin will show a warning to the admin user, when the constant WP_DEBUG is set to true.
 * Version: 1.0.0
 * Author: Bernhard Kau
 * Author URI: http://kau-boys.de
 * Plugin URI: https://github.com/2ndkauboy/wp-debug-active-warning
 * Text Domain: wp-debug-active-warning
 * Domain Path: /languages
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl-3.0
*/

function wp_debug_active_warning_load_textdomain() {
	load_plugin_textdomain( 'wp-debug-active-warning', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'wp_debug_active_warning_load_textdomain' );

function wp_debug_active_warning_admin_notice() {
	if ( defined('WP_DEBUG') && WP_DEBUG && current_user_can( 'manage_options' ) ) {
		$message = __( 'Caution! The debug mode is active (constant <code>WP_DEBUG</code> is set to true). Please deactivate it in your <code>wp-config.php</code> file, as soon as you\'ve finished debugging the system', 'wp-debug-active-warning' );
		echo '<div class="error"><p>' . $message . '</p></div>';
	}
}
add_action( 'admin_notices', 'wp_debug_active_warning_admin_notice' );