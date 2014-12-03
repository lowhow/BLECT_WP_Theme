<?php namespace Framework\WordPress;

class StylesAndScripts {

	/**
	 * Enqueue Styles with WordPress
	 * @return [type]
	 */
	public function enqueue_styles() 
	{

		////////////////////
		// stylesheets //
		////////////////////

		/**
		 * Link Skin Stylesheet (compiled and minified from LESS)
		 */
		wp_enqueue_style( 'fontawesome', trailingslashit( FW_VENDOR_URI ) . 'fontawesome/css/font-awesome.min.css', array(), null );

		/**
		 * Link Skin Stylesheet (compiled and minified from LESS)
		 */
		wp_enqueue_style( 'vendor', trailingslashit( FW_THEME_ASSETS_CSS_URI ) . 'vendor.css', array(), null );

		/**
		 * Main Stylesheet 
		 */
		wp_enqueue_style( 'main', trailingslashit( FW_THEME_ASSETS_CSS_URI ) . 'skin.css', array( 'vendor' ), null );

		return $this;

	}


	/**
	 * Enqueue Scripts with WordPress
	 * @return [type]
	 */
	public function enqueue_scripts() 
	{

		///////////////
		// Scripts //
		///////////////

		/**
		 * Modernizr.js
		 */
		wp_enqueue_script( 'modenizr-js', trailingslashit( FW_VENDOR_URI ) . 'modernizr/modernizr.js', array(), null, TRUE );

		/**
		 * jQuery
		 *
		 * Replace WordPress bundled version with our own version
		 */
		wp_deregister_script('jquery');
		wp_enqueue_script( 'jquery', trailingslashit( FW_VENDOR_URI ) . 'jquery/dist/jquery.min.js', array(), null, TRUE );

		/**
		 * Bootstrap Script
		 */
	  	wp_enqueue_script( 'bs-js', trailingslashit( FW_VENDOR_URI ) . 'bootstrap/dist/js/bootstrap.min.js', array( 'jquery' ), null, TRUE );

		/**
		 * Register Vendor scripts
		 */
	  	wp_enqueue_script( 'vendor-js', trailingslashit( FW_THEME_ASSETS_JS_URI ) . 'vendor-min.js', array(), null, TRUE );
	  
		/**
		 * Adding Theme's script .
		 */
		wp_enqueue_script( 'application-js', trailingslashit( FW_THEME_ASSETS_JS_URI ) . 'application-min.js', array( 'vendor-js' ), null, TRUE );


		return $this;

	}


	/**
	 * [admin_enqueue_scripts description]
	 * @return [type] [description]
	 */
	public function admin_enqueue_styles() 
	{
		/**
		 * Main Stylesheet 
		 */
		wp_enqueue_style( 'admin', trailingslashit( FW_THEME_ASSETS_CSS_URI ) . 'admin.css', array(), null );
	}


	/**
	 * [admin_enqueue_scripts description]
	 * @return [type] [description]
	 */
	public function admin_enqueue_scripts() 
	{
		/**
		 * Boostrap3 Script 
		 */
		wp_enqueue_script( 'bs3-js', trailingslashit( FW_VENDOR_URI ) . '/bootstrap/dist/js/bootstrap.min.js', array(), null );

		/**
		 * Main Script 
		 */
		wp_enqueue_script( 'admin-js', trailingslashit( FW_THEME_ASSETS_JS_URI ) . 'admin.js', array(), null );
	}

}