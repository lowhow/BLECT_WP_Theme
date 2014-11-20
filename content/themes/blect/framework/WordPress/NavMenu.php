<?php namespace Framework\WordPress;

class NavMenu {

	/**
	 * Register Navigation Menu
	 * @return [type]
	 */
	public function register() {

		/**
		 * Register a primary navigation
		 */
		register_nav_menu( 'primary', __( 'Main Navigation', wp_get_theme()->get( 'TextDomain' ) ) );

		/**
		 * Register a mobile navigation
		 */
		register_nav_menu( 'mobile', __( 'Mobile Navigation', wp_get_theme()->get( 'TextDomain' ) ) );

		return $this;

	}


	public function add_class_to_current_menu_item() {

		add_filter('nav_menu_css_class' , array( $this, 'filter_hook_add_class_to_current_menu_item' ) , 10 , 2);

		return $this;
	}


	/**
	 * Custom filter to add 'active' & 'current' class to current menu item.
	 * @param [type] $classes
	 * @param [type] $item
	 */
	public function filter_hook_add_class_to_current_menu_item( $classes, $item ){

		if(in_array('current-menu-item', $classes)){
			$classes[] = "active";
	    $classes[] = "current";
		}

		return $classes;
	}

}