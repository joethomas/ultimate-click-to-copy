<?php
/*
	Plugin Name: Ultimate Click to Copy
	Description: This plugin adds stylish click to copy functionality to your site.
	Plugin URI: https://github.com/joethomas/ultimate-click-to-copy
	Version: 1.0.1
	Author: Joe Thomas
	Author URI: http://joethomas.co
	License: GNU General Public License v3.0
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
	Text Domain: ultimate-click-to-copy
	Domain Path: /languages/
*/

/*
	Uses Zeno Rocha's awesome clipboard.js
	@link https://clipboardjs.com/
	@link http://webdesign.tutsplus.com/tutorials/copy-to-clipboard-made-easy-with-clipboardjs--cms-25086
*/

// Prevent direct file access
defined( 'ABSPATH' ) or exit;


/* Setup Plugin
==============================================================================*/

/**
 * Define the constants for use within the plugin
 */

// Plugin
function joeuctc_get_plugin_data() {
	$plugin = get_plugin_data( __FILE__, false, false );

	define( 'JOEUCTC_VER', $plugin['Version'] );
	define( 'JOEUCTC_PREFIX', $plugin['TextDomain'] );
	define( 'JOEUCTC_NAME', $plugin['Name'] );
}
add_action( 'init', 'joeuctc_get_plugin_data' );

// Plugin basename
define( 'JOEUCTC_BASENAME', plugin_basename(__DIR__) );
define( 'JOEUCTC_BASENAME_FILE', plugin_basename(__FILE__) );

// Plugin paths
define( 'JOEUCTC_DIR', untrailingslashit( plugin_dir_path(__FILE__) ) );
define( 'JOEUCTC_DIR_URI', untrailingslashit( plugin_dir_url(__FILE__) ) );

// Plugin directory paths
define( 'JOEUCTC_INC_DIR', JOEUCTC_DIR . '/includes' );
define( 'JOEUCTC_INC_DIR_URI', JOEUCTC_DIR_URI . '/includes' );

define( 'JOEUCTC_LIB_DIR', JOEUCTC_DIR . '/library' );
define( 'JOEUCTC_LIB_DIR_URI', JOEUCTC_DIR_URI . '/library' );


/* Styles
==============================================================================*/

/**
 * Load CSS
 */
function joeuctc_enqueue_scripts() {

	wp_register_style( JOEUCTC_PREFIX, JOEUCTC_LIB_DIR_URI . '/css/' . JOEUCTC_PREFIX . '.css', array(), JOEUCTC_VER );
	wp_enqueue_style( JOEUCTC_PREFIX );

	wp_register_script( 'clipboardjs', '//cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.13/clipboard.min.js', array(), '1.5.13', true );
	wp_enqueue_script( 'clipboardjs' );

	wp_register_script( 'clicktocopy-init', JOEUCTC_LIB_DIR_URI . '/js/' . JOEUCTC_PREFIX . '-init.js', array( 'clipboardjs' ), JOEUCTC_VER, true );
	wp_enqueue_script( 'clicktocopy-init' );

}
add_action( 'wp_enqueue_scripts', 'joeuctc_enqueue_scripts' );


/* Bootstrap Files
==============================================================================*/

// Plugin updates
require_once( JOEUCTC_INC_DIR . '/updates.php' );

// Plugin settings
//require_once( JOEUCTC_INC_DIR . '/settings.php' );


/* Languages
==============================================================================*/

/**
 * Load text domain for plugin translations
 */
function joeuctc_load_textdomain() {
	load_plugin_textdomain( JOEUCTC_PREFIX, FALSE, basename(__DIR__) . '/languages/' );
}
add_action( 'plugins_loaded', 'joeuctc_load_textdomain' );
