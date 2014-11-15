<?php
/**
 * The bootstrap file for Vun Hougkh Framework
 *
 * @package Vun_Hougkh
 * @subpackage Vun_Hougkh
 * @since Vun Hougkh 1.0
 * @todo what to do when platform is 'HTML'
 */
class VunHougkh {

  function __construct( $platform = 'HTML' ) {

  	/** check is WordPress function available */
  	if ( function_exists( 'get_template_directory_uri' ) ) {
  		define( 'FW_BASE_URI', get_template_directory_uri() . '/' . basename( __FILE__, '.php' ) );
  	}
  	/** ELSE manually define */
  	else {
  		define( 'FW_BASE_URI', 'http://www.example.com' );	
  	}

		/** Set framework version */
		define( 'FRAMEWORK_NAME', 'Vun Hougkh' );

		/** Set framework version */
		define( 'FW_VER', '1.0' );

		/** Set framework directory path - framework folder must be at the same level as the file */
		define( 'FW_DIR', dirname( __FILE__ ) . '/' . basename( __FILE__, '.php' ) );

		/** Set classes directory path */
		define( 'FW_CLASSES_DIR', FW_DIR . '/classes' );

		/** Set WordPress functions directory path */
		define( 'FW_WPFUNC_DIR', FW_DIR . '/wp-functions' );	

		/** Set helpers directory path */
		define( 'FW_HELPERS_DIR', FW_DIR . '/helpers' );	

		/** Set assets directory path */
		define( 'FW_ASSETS_DIR', FW_DIR . '/assets' );

		/** Set assets directory URI */
		define( 'FW_ASSETS_URI', FW_BASE_URI . '/assets' );

		/** Set libraries directory path */
		define( 'FW_LIB_DIR', FW_DIR . '/lib' );	

		/** Set libraries directory URI */
		define( 'FW_LIB_URI', FW_BASE_URI . '/lib' );	

		

		if ( $platform == 'WordPress' ) {

			$this->constantsWP();
			$this->classes();
			$this->helpers();
			$this->initWP();
		}
		else {
			/** put in to-do : refer metronics*/
		}

	}


/*
db   d8b   db  .d88b.  d8888b. d8888b. d8888b. d8888b. d88888b .d8888. .d8888. 
88   I8I   88 .8P  Y8. 88  `8D 88  `8D 88  `8D 88  `8D 88'     88'  YP 88'  YP 
88   I8I   88 88    88 88oobY' 88   88 88oodD' 88oobY' 88ooooo `8bo.   `8bo.   
Y8   I8I   88 88    88 88`8b   88   88 88~~~   88`8b   88~~~~~   `Y8b.   `Y8b. 
`8b d8'8b d8' `8b  d8' 88 `88. 88  .8D 88      88 `88. 88.     db   8D db   8D 
 `8b8' `8d8'   `Y88P'  88   YD Y8888D' 88      88   YD Y88888P `8888Y' `8888Y' 
*/	

 	/**
	 * Define constants in WordPress way
	 *
	 * @since Vun Hougkh 1.0
	 *
	 * @return void
	 */
	function constantsWP() {
		/** Set theme directory path */
		define( 'FW_THEME_DIR', trailingslashit( get_template_directory() ) );

		/** Set theme directory URI */
		define( 'FW_THEME_URI', trailingslashit( get_template_directory_uri() ) );

		/** Set child theme directory path */
		define( 'FW_THEME_CHILD_DIR', trailingslashit( get_stylesheet_directory() ) );

		/** Set child theme directory URI */
		define( 'FW_THEME_CHILD_URI', trailingslashit( get_stylesheet_directory_uri() ) );

		/** Set theme admin directory path */
		define( 'FW_THEME_ADMIN_DIR', trailingslashit( FW_THEME_DIR ) . 'admin' );

		/** Set theme admin directory uri */
		define( 'FW_THEME_ADMIN_URI', trailingslashit( FW_THEME_URI ) . 'admin' );

		/** Set theme css directory path */
		define( 'FW_THEME_CSS_DIR', trailingslashit( FW_THEME_DIR ) . 'css' );

		/** Set theme css directory uri */
		define( 'FW_THEME_CSS_URI', trailingslashit( FW_THEME_URI ) . 'css' );

		/** Set child theme css directory path */
		define( 'FW_THEME_CHILD_CSS_DIR', trailingslashit( FW_THEME_CHILD_DIR ) . 'css' );

		/** Set child theme css directory uri */
		define( 'FW_THEME_CHILD_CSS_URI', trailingslashit( FW_THEME_CHILD_URI ) . 'css' );

		/** Set theme functions directory path */
		define( 'FW_THEME_FUNCTIONS_DIR', trailingslashit( FW_THEME_DIR ) . 'functions' );

		/** Set theme functions directory uri */
		define( 'FW_THEME_FUNCTIONS_URI', trailingslashit( FW_THEME_URI ) . 'functions' );

		/** Set theme images directory path */
		define( 'FW_THEME_IMAGES_DIR', trailingslashit( FW_THEME_DIR ) . 'images' );

		/** Set theme images directory uri */
		define( 'FW_THEME_IMAGES_URI', trailingslashit( FW_THEME_URI ) . 'images' );

		/** Set child theme images directory path */
		define( 'FW_THEME_CHILD_IMAGES_DIR', trailingslashit( FW_THEME_CHILD_DIR ) . 'images' );

		/** Set child theme images directory uri */
		define( 'FW_THEME_CHILD_IMAGES_URI', trailingslashit( FW_THEME_CHILD_URI ) . 'images' );

		/** Set theme js directory path */
		define( 'FW_THEME_JS_DIR', trailingslashit( FW_THEME_DIR ) . 'js' );

		/** Set theme js directory uri */
		define( 'FW_THEME_JS_URI', trailingslashit( FW_THEME_URI ) . 'js' );

		/** Set child theme js directory path */
		define( 'FW_THEME_CHILD_JS_DIR', trailingslashit( FW_THEME_CHILD_DIR ) . 'js' );

		/** Set theme js directory uri */
		define( 'FW_THEME_CHILD_JS_URI', trailingslashit( FW_THEME_CHILD_URI ) . 'js' );

		/** Set theme languages directory path */
		define( 'FW_THEME_LANG_DIR', trailingslashit( FW_THEME_DIR ) . 'languages' );

		/** Set theme languages directory uri */
		define( 'FW_THEME_LANG_URI', trailingslashit( FW_THEME_URI ) . 'languages' );
		
	}


	/**
	 * Load class files in framework
	 *
	 * @since Vun Hougkh 1.0
	 *
	 * @return void
	 */
	function classes() {

		/**
		 * Manually include the required class files.
		 */
		$classfiles = array( 'wp_select_menu_walker', 'wp_bootstrap_navwalker' );	

		if ( ! empty( $classfiles ) ) {
			foreach($classfiles as $file) {
				include_once( FW_CLASSES_DIR . '/' . $file . '.php' );
			}
		}
	}

 	/**
	 * Load helper files in framework
	 *
	 * @since Vun Hougkh 1.0
	 *
	 * @return void
	 */
	function helpers() {		

		/** 
		 * Load all helper files matching filename with prefix 'helper_' and extension '.php'. 
		 */
		$helperFiles = glob( FW_HELPERS_DIR . '/helper_*.{php}', GLOB_BRACE );
		
		foreach($helperFiles as $file) {
			include_once( $file );
		}
	}


 	/**
	 * Initiate for WordPress
	 *
	 * @since Vun Hougkh 1.0
	 *
	 * @return void
	 */
	function initWP() {

		/** 
		 * Load all WordPress function files. 
		 */
		$wpFuncFiles = glob( FW_WPFUNC_DIR . '/*.{php}', GLOB_BRACE );

		foreach($wpFuncFiles as $file) {
			include_once( $file );
		}

		/** Setup theme to use VH Framework: function in framework/wp-functions/setup.php */
		add_action( 'after_setup_theme', 'fw_wp_setup' );

		/** Enqueue scaffolding scripts and style for theme: function in framework/wp-functions/setup.php */
		add_action( 'wp_enqueue_scripts', 'fw_enqueue_style_script' );

		/**
		 * Add default filters to theme
		 */
		/** Setup wp_title for page title: function in framework/helpers/helper_wp.php */
		add_filter( 'wp_title', 'add_wp_title', 10, 2 );

		/* Make text widgets and term descriptions shortcode aware. */
		add_filter( 'widget_text', 'do_shortcode' );
		add_filter( 'term_description', 'do_shortcode' );

		/** Insert prettyPhoto into images: functions in framework/helpers/helper_wp.php */
		add_filter( 'image_send_to_editor', 'fw_add_prettyPhoto_rel_in_editor', 10, 7);
		add_filter( 'wp_get_attachment_link', 'fw_add_prettyPhoto_rel_in_gallery', 10, 4 );

		/**
		 * Bootstrap and initiate Redux Framework
		 *
		 * note: code below commented to test if Redux Plugin is used instead of embed.
		 */
		// if ( !class_exists( 'ReduxFramework' ) && file_exists( trailingslashit( FW_LIB_DIR ) . 'ReduxFramework/ReduxCore/framework.php' ) ) {
		//     require_once( FW_LIB_DIR . '/ReduxFramework/ReduxCore/framework.php' );
		// }
	}


}