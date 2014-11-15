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
require get_template_directory() . '/blect-config.php';

// $vh = new VunHougkh( 'WordPress' );

// if (BLECT_CMS_DIR){
// 	echo BLECT_CMS_DIR;
// }else{
// 	echo  'BLECT_CMS_DIR is not defined.';
// }


/** 
 * Setup Redux Options 
 */
// if ( ! function_exists( 'setup_redux' ) ){
// 	function setup_redux() {
// 		if ( !isset( $t_options ) && file_exists( trailingslashit( FW_THEME_ADMIN_DIR ) . 'themeoptions-config.php' ) ) {
// 		    require_once( trailingslashit( FW_THEME_ADMIN_DIR ) . '/themeoptions-config.php' );
// 		}
// 	}

// 	setup_redux();
// }


//require get_template_directory() . '/functions/sample-function-file.php';



/**

+-+-+-+-+-+-+-+-+-+-+-+
|p|r|e|t|t|y|P|h|o|t|o|
+-+-+-+-+-+-+-+-+-+-+-+
 
 */

if ( is_admin() ) {
	add_filter( 'image_send_to_editor', 'fw_add_prettyPhoto_rel_in_editor', 10, 7 );
	add_filter( 'wp_get_attachment_link', 'fw_add_prettyPhoto_rel_in_gallery', 10, 4 );
}

/** 
 *  Hook into 'image_send_to_editor' and place rel="prettyPhoto" 
 */
function fw_add_prettyPhoto_rel_in_editor($html, $id, $alt, $title, $align, $url, $size ) {
  global $post;
  global $permalink;

  $hook = "rel";
  $selector = 'prettyPhoto';
  
  if ( ! $permalink )
    $html = preg_match( '/' . $hook . '="/', $html ) ? str_replace( $hook . '="', $hook . '="' . $selector. '" ' , $html ) : str_replace( '<a ', '<a ' . $hook . '="' . $selector . '" ', $html );
  
  return $html;
}


/** 
 * Hook into 'wp_get_attachment_link' and place rel="prettyPhoto" 
 */
function fw_add_prettyPhoto_rel_in_gallery($html, $id, $size, $permalink) {
	global $post;

	$pid = $post->ID;

  $hook = "rel";
  $selector = 'prettyPhoto';

	if ( ! $permalink )
		$html = preg_match( '/' . $hook . '="/', $html ) ? str_replace( $hook . '="', $hook . '="' . $selector . '[gallery-' . $pid . '] ', $html ) : str_replace( '<a ', '<a ' . $hook . '="' . $selector . '[gallery-' . $pid . ']" ', $html );
	return $html;
}




