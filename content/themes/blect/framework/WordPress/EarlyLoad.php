<?php namespace Framework\WordPress;

class EarlyLoad {

	/**
	 * Load theme text domain.
	 * @return [type]
	 */
	public function load_theme_textdomain(){

		load_theme_textdomain( wp_get_theme()->get( 'TextDomain' ), FW_THEME_LANG_DIR );

		return $this;

	}



	/**
	 * Remove WordPress Branding generator
	 * @return [type]
	 */
	public function remove_wp_generator() {

		remove_action('wp_head', 'wp_generator');

		return $this;
	}



	/**
	 * Initialize WP Title
	 * @return [type]
	 */
	public function add_wp_title() {

		add_filter( 'wp_title', array( $this, 'filter_hooks_add_wp_title' ), 10, 2 );

		return $this;

	}



	/**
	 * Custom filter to add wp title.
	 * @param [type] $title
	 * @param [type] $sep
	 * @return $title
	 */
	public function filter_hooks_add_wp_title( $title, $sep ) {

		global $paged, $page;

		$sep = '-';

		if ( is_feed() ) {
			return $title;
		}

		// Add the site name.
		$title .= get_bloginfo( 'name', 'display' );

		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title = "$title $sep $site_description";
		}

		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 ) {
			$title = "$title $sep " . sprintf( __( 'Page %s', wp_get_theme()->get( 'TextDomain' ) ), max( $paged, $page ) );
		}

		return $title;

	}



	/**
	 * Add favicon links
	 */
	public function add_favicon() {
		echo '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="'. FW_THEME_ASSETS_FAVICON_URI .'apple-touch-icon-144-precomposed.png" />' . 
		'<link rel="apple-touch-icon-precomposed" sizes="114x114" href="'. FW_THEME_ASSETS_FAVICON_URI .'apple-touch-icon-114-precomposed.png" /> ' .
	  '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="'. FW_THEME_ASSETS_FAVICON_URI .'apple-touch-icon-72-precomposed.png" />' .
	  '<link rel="apple-touch-icon-precomposed" href="'. FW_THEME_ASSETS_FAVICON_URI .'apple-touch-icon-57-precomposed.png" />' .
	  '<link rel="shortcut icon" href="'. FW_THEME_ASSETS_FAVICON_URI .'favicon.ico" />';

	  return $this;
	}

}