<?php
/**
 * Load styles and scripts
 *
 * @since 1.0.0
 */
function joe_uctc_enqueue_scripts() {

	wp_register_style( JOE_UCTC_PREFIX, plugin_dir_url( __FILE__ ) . 'css/' . JOE_UCTC_PREFIX . '.css', array(), JOE_UCTC_VER );
	wp_enqueue_style( JOE_UCTC_PREFIX );

	$clipboarjs_ver = '1.5.16';

	wp_register_script( 'clipboardjs', '//cdnjs.cloudflare.com/ajax/libs/clipboard.js/' . $clipboarjs_ver . '/clipboard.min.js', array(), $clipboarjs_ver, true );
	wp_enqueue_script( 'clipboardjs' );

	wp_register_script( 'clicktocopy-init', plugin_dir_url( __FILE__ ) . 'js/' . JOE_UCTC_PREFIX . '-init.js', array( 'clipboardjs' ), JOE_UCTC_VER, true );
	wp_enqueue_script( 'clicktocopy-init' );

}
add_action( 'wp_enqueue_scripts', 'joe_uctc_enqueue_scripts' );