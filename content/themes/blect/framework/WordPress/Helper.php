<?php namespace Framework\WordPress;

class Helper 
{

	/**
	 * Load theme text domain.
	 * @return Helper
	 */
	public function load_theme_textdomain()
	{
		load_theme_textdomain( FW_TEXTDOMAIN, FW_THEME_LANG_DIR );

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
	 * Custom filter to add wp title.
	 * @param [type] $title
	 * @param [type] $sep
	 * @return $title
	 */
	public function add_wp_title( $title, $sep ) 
	{

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


	/**
	 * Create Breadcrumbs 
	 *
	 * @since Vun Hougkh 1.0
	 *
	 * @return void
	 *
	 * @todo Find out how this breadcrumbs work and document it down in evernote
	 *
	 * @link http://www.qualitytuts.com/wordpress-custom-breadcrumbs-without-plugin/
	 */
	public function fw_breadcrumbs() 
	{
  
	  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	  $delimiter = ' <span class="delimiter text-muted">/</span> '; // delimiter between crumbs
	  $home = __( 'Home' ); // text for the 'Home' link
	  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	  $before = '<span class="current">'; // tag before the current crumb
	  $after = '</span>'; // tag after the current crumb
	  
	  global $post;
	  $homeLink = get_bloginfo('url');
	  
	  if (is_home() || is_front_page()) {

	  	if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';

	  } else {

	  	echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

	  	if ( is_category() ) {
	  		$thisCat = get_category(get_query_var('cat'), false);
	  		if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
	  		echo $before . '"' . single_cat_title('', false) . '"' . $after;

	  	} elseif ( is_search() ) {
	  		echo $before . 'Search results for "' . get_search_query() . '"' . $after;

	  	} elseif ( is_day() ) {
	  		echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
	  		echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
	  		echo $before . get_the_time('d') . $after;

	  	} elseif ( is_month() ) {
	  		echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
	  		echo $before . get_the_time('F') . $after;

	  	} elseif ( is_year() ) {
	  		echo $before . get_the_time('Y') . $after;

	  	} elseif ( is_single() && !is_attachment() ) {
	  		if ( get_post_type() != 'post' ) {
	  			$post_type = get_post_type_object(get_post_type());
	  			$slug = $post_type->rewrite;
	  			echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
	  			if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
	  		} else {
	  			$cat = get_the_category(); $cat = $cat[0];
	  			$cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
	  			if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
	  			echo $cats;
	  			if ($showCurrent == 1) echo $before . get_the_title() . $after;
	  		}

	  	} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
	  		$post_type = get_post_type_object(get_post_type());
	  		echo $before . $post_type->labels->singular_name . $after;

	  	} elseif ( is_attachment() ) {
	  		$parent = get_post($post->post_parent);
	  		$cat = get_the_category($parent->ID); $cat = $cat[0];
	  		echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
	  		echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
	  		if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

	  	} elseif ( is_page() && !$post->post_parent ) {
	  		if ($showCurrent == 1) echo $before . get_the_title() . $after;

	  	} elseif ( is_page() && $post->post_parent ) {
	  		$parent_id  = $post->post_parent;
	  		$breadcrumbs = array();
	  		while ($parent_id) {
	  			$page = get_page($parent_id);
	  			$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
	  			$parent_id  = $page->post_parent;
	  		}
	  		$breadcrumbs = array_reverse($breadcrumbs);
	  		for ($i = 0; $i < count($breadcrumbs); $i++) {
	  			echo $breadcrumbs[$i];
	  			if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
	  		}
	  		if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

	  	} elseif ( is_tag() ) {
	  		echo $before . '"' . single_tag_title('', false) . '"' . $after;

	  	} elseif ( is_author() ) {
	  		global $author;
	  		$userdata = get_userdata($author);
	  		echo $before . '' . $userdata->display_name . $after;

	  	} elseif ( is_404() ) {
	  		echo $before . 'Error 404' . $after;
	  	}

	  	echo '</div>';

	  	}
	}


	/**
	 * [t_entry_date description]
	 * @param  boolean $echo [description]
	 * @return [type]        [description]
	 */
	public function t_entry_date( $echo = TRUE ) 
	{
		if ( has_post_format( array( 'chat', 'status' ) ) )
			$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', FW_TEXTDOMAIN );
		else
			$format_prefix = '%2$s';

			$date = sprintf( '<span class="date"><time class="entry-date" datetime="%3$s">%4$s</time></span>',
			esc_url( get_permalink() ),
			esc_attr( sprintf( __( 'Permalink to %s', FW_TEXTDOMAIN ), the_title_attribute( 'echo=0' ) ) ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
		);

		if ( $echo )
			echo $date;

		return $date;
	}


	/**
	 * [t_entry_tag description]
	 * @return [type] [description]
	 */
	public function t_entry_tag() 
	{
		// Translators: used between list items, there is a space after the comma.
		$tag_list = get_the_tag_list( '', ', ' );
		if ( $tag_list ) {
			echo '<span class="tags-links"><i class="fa fa-tags"></i> ' . $tag_list . '</span>';
		}
	}


	/**
	 * [t_entry_cat description]
	 * @return [type] [description]
	 */
	public function t_entry_cat() 
	{
		// Translators: used between list items, there is a space after the comma.
		$categories_list = get_the_category_list( ', ' );
		if ( $categories_list ) {
			echo '<span class="categories-links"><i class="fa fa-folder"></i> ' . $categories_list . '</span>';
		}
	}


	/**
	 *Theme's Entry's Author
	 *
	 * Prints HTML with author information for current post.
	 *
	 * @since The Starry Night 1.0 with Vun Hougkh 1.0
	 *
	 * @param boolean $echo Whether to echo the date. Default true.
	 * @return string The HTML-formatted posFt date.
	 */
	public function t_entry_author( $echo = true ) {
		if ( 'post' == get_post_type() ) {
			printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( ' %s ', FW_TEXTDOMAIN ), get_the_author() ) ),
				get_the_author()
			);
		}
	}
}
