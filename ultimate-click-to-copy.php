<?php
/*
	Plugin Name: Ultimate Click to Copy
	Description: This plugin adds stylish click to copy functionality to your site.
	Plugin URI: https://github.com/joethomas/ultimate-click-to-copy
	Version: 1.1.4
	Author: Joe Thomas
	Author URI: https://github.com/joethomas
	License: GNU General Public License v3.0
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
	Text Domain: ultimate-click-to-copy
	Domain Path: /languages/

	GitHub Plugin URI: https://github.com/joethomas/ultimate-click-to-copy
	GitHub Branch: master
*/

/*******************************************************************************

	Uses Zeno Rocha's awesome clipboard.js
	@link https://clipboardjs.com/
	@link http://webdesign.tutsplus.com/tutorials/copy-to-clipboard-made-easy-with-clipboardjs--cms-25086

*******************************************************************************/

// Prevent direct file access
defined( 'ABSPATH' ) or exit;


/* Setup Plugin
==============================================================================*/

/**
 * Define the constants for use within the plugin
 */

// Plugin
function joe_uctc_get_plugin_data() {
	$plugin = get_plugin_data( __FILE__, false, false );

	define( 'JOE_UCTC_VER', $plugin['Version'] );
	define( 'JOE_UCTC_TEXTDOMAIN', $plugin['TextDomain'] );
	define( 'JOE_UCTC_NAME', $plugin['Name'] );
}
add_action( 'init', 'joe_uctc_get_plugin_data' );

define( 'JOE_UCTC_PREFIX', 'ultimate-click-to-copy' );

// Set latest clipboard.js version
define( 'JOE_UCTC_CLIPBOARDJS_VER', '1.7.1');


/* Bootstrap
==============================================================================*/

require_once( 'includes/scripts.php' ); // controls styles and scripts
require_once( 'includes/updates.php' ); // controls plugin updates
