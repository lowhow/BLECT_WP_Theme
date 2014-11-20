<?php namespace Framework\WordPress;

class Helper {

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
	 * @link http://wpsmackdown.com/wordpress-cleanup-wp-head/
	 */
	public function remove_wp_generator() {

		remove_action('wp_head', 'wp_generator');

		return $this;
	}


	/**
	 * Remove Windows Live Writer Manifest Link
	 * @link http://wpsmackdown.com/wordpress-cleanup-wp-head/
	 */
	public function remove_wlwmanifest_link() {

		remove_action('wp_head', 'wlwmanifest_link');

		return $this;
	}


	/**
	 * Remove Really Simple Discovert Link
	 * @link http://wpsmackdown.com/wordpress-cleanup-wp-head/
	 */
	public function remove_rsd_link() {

		remove_action('wp_head', 'rsd_link');

		return $this;
	}


	/**
	 * Remove shortlink from <head>
	 * @link http://wpsmackdown.com/wordpress-cleanup-wp-head/
	 */
	public function remove_shortlink() {

		remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

		return $this;
	}


	/**
	 * Remove previous/next post links from <head>
	 * @link http://wordpress.stackexchange.com/questions/1507/steps-to-take-to-hide-the-fact-a-site-is-using-wordpress
	 */
	public function remove_adjacent_posts_rel_link() {

		remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

		return $this;
	}


	/**
	 * Remove Feed Links
	 * @link http://wordpress.stackexchange.com/questions/1507/steps-to-take-to-hide-the-fact-a-site-is-using-wordpress
	 */
	public function remove_feed_links() {
		
		remove_action('wp_head', 'feed_links', 2);

		return $this;
	}


	/**
	 * Remove Feed Links Extra
	 * @link http://wordpress.stackexchange.com/questions/1507/steps-to-take-to-hide-the-fact-a-site-is-using-wordpress
	 */
	public function remove_feed_links_extra() {
		
		remove_action('wp_head', 'feed_links_extra', 3);

		return $this;
	}


	/**
	 * Initialize WP Title
	 * @return [type]
	 */
	public function add_wp_title() {

		add_filter( 'wp_title', array( $this, 'filter_hook_add_wp_title' ), 10, 2 );

		return $this;
	}


	/**
	 * Custom filter to add wp title.
	 * @param [type] $title
	 * @param [type] $sep
	 * @return $title
	 */
	public function filter_hook_add_wp_title( $title, $sep ) {

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
