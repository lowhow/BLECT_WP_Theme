<?php 
use Framework\WordPress as WordPress;
use Framework\Base_WPSetup as Base_WPSetup;


if ( !class_exists( 'ThemeSetup' ) ) {

	class ThemeSetup extends Base_WPSetup{

		/**
		 * Add actions to action hook 'after_setup_theme'
		 * @return NULL
		 */
		public function action_hook_after_setup_theme() {

			/**
			 * Run loader at the earliest stage.
			 */
			$this->EarlyLoad 
			->load_theme_textdomain()
			->remove_wp_generator()
			->add_wp_title();

			/**
			 * Add Theme Supports
			 */
			$this->ThemeSupport
			->add();

			/**
			 * Register Navigation Menu
			 */
			$this->NavMenu
			->register_nav_menu()
			->add_class_to_current_menu_item();	

			/**
			 * Register widget areas
			 */
			$this->Widget
			->register_sidebars();


			return $this;

		}


		/**
		 * Add actions to action hook 'wp_enqueue_scripts'
		 * @return NULL
		 */
		public function action_hook_wp_enqueue_scripts() {

			$this->StylesAndScripts = new WordPress\StylesAndScripts;

			/**
			 * Run the Styles and Scripts registration and enqueue.
			 */
			$this->StylesAndScripts
			->enqueue_styles()
			->enqueue_scripts();

			return $this;

		}


		/**
		 * Add actions to action hook 'wp_head'.
		 * This is where we inject markups into the <head> tag.
		 * @return NULL
		 */
		public function action_hook_wp_head() {

			/**
			 * Add favicon link.
			 */
			$this->EarlyLoad->add_favicon();


			return $this;

		}


		public function run_after_action_hooks() {
			$this->Media
			->add_prettyPhoto();
		}
		
	}
}
