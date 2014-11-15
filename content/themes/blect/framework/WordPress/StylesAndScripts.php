<?php namespace Framework\WordPress;

class StylesAndScripts {

	/**
	 * Enqueue Styles with WordPress
	 * @return [type]
	 */
	public function enqueue_styles() {

		////////////////////
		// stylesheets //
		////////////////////

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
	public function enqueue_scripts() {

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
		 * Register Vendor scripts
		 */
	  wp_enqueue_script( 'vendor-js', trailingslashit( FW_THEME_ASSETS_JS_URI ) . 'vendor.js', array(), null, TRUE );
	  
	  /**
	   * Adding Theme's script .
	   */
		wp_enqueue_script( 'application-js', trailingslashit( FW_THEME_ASSETS_JS_URI ) . 'application.js', array( 'vendor-js' ), null, TRUE );


		return $this;

	}

}