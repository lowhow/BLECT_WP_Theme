<?php
/**
 * The theme default functions file.
 *
 * @package WordPress
 * @subpackage Vun_Hougkh
 * @since The Starry Night 1.0 with Vun Hougkh 1.0
 */

/**
 * Bootstrapping framework to WordPress theme and initialise.
 */
require get_template_directory() . '/framework.php';

$vh = new VunHougkh( 'WordPress' );


/** 
 * Setup Redux Options 
 */
if ( ! function_exists( 'setup_redux' ) ){
	function setup_redux() {
		if ( !isset( $t_options ) && file_exists( trailingslashit( FW_THEME_ADMIN_DIR ) . 'themeoptions-config.php' ) ) {
		    require_once( trailingslashit( FW_THEME_ADMIN_DIR ) . '/themeoptions-config.php' );
		}
	}

	setup_redux();
}


/**
	Load customisable theme function files. 
 *
 * Must always load theme.php first. Append subsequent function files if any.
 */
require get_template_directory() . '/functions/theme.php';
require get_template_directory() . '/functions/t_helper.php';


/** 
 * Setup Redux Demo Options. Remove after development 
 */
/*if ( !isset( $redux_demo ) && file_exists( trailingslashit( FW_LIB_DIR ) . 'ReduxFramework/sample/sample-config.php' ) ) {
    require_once( trailingslashit( FW_LIB_DIR ) . 'ReduxFramework/sample/sample-config.php' );
}*/

/** example */
//require get_template_directory() . '/functions/sample-function-file.php';




