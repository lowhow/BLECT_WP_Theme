<?php namespace Framework;



if ( !class_exists( 'ThemeSetup' ) ) {

	class ThemeSetup{

		private $Helper;
		private $ThemeSupport;
		private $NavMenu;
		private $StylesAndScripts;
		private $Media;


		public function __construct() {

			$this->include_files( array(
				'wp_bootstrap_navwalker.php',
				'simple_html_dom.php',
			) );

			$this->Helper = new WordPress\Helper;
			$this->StylesAndScripts = new WordPress\StylesAndScripts;
			$this->ThemeSupport = new WordPress\ThemeSupport;
			$this->NavMenu = new WordPress\NavMenu;
			$this->Widget = new WordPress\Widget;
			$this->Media = new WordPress\Media;

		}

		/**
		 * Boot up and RUN!
		 * @return [type]
		 */
		public function run() {

			add_action( 'after_setup_theme', array( $this, 'action_hook_after_setup_theme' ) );

			add_action( 'widget_init', array( $this, 'action_hook_widget_init' ) );

			add_action( 'wp_enqueue_scripts', array( $this, 'action_hook_wp_enqueue_scripts' ) );

			add_action( 'wp_head', array( $this->Helper, 'add_favicon' ) );

			$this->Helper
			->remove_wp_generator()
			->remove_wlwmanifest_link()
			->remove_rsd_link();

			$this->Media
			->add_prettyPhoto();
		
			return $this;

		}


		/**
		 * Add actions to action hook 'after_setup_theme'
		 * @return NULL
		 */
		public function action_hook_after_setup_theme() {

			$this->Helper
			->load_theme_textdomain()
			->add_wp_title();

			$this->ThemeSupport
			->add();

			$this->NavMenu
			->register()
			->add_class_to_current_menu_item();	

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

			$this->StylesAndScripts->enqueue_styles()->enqueue_scripts();

			return $this;

		}


		/**
		 * Include files in \include folder
		 * @return [type]
		 */
		public function include_files( $filenames ) {
			/** 
			 * Load all helper files matching filename with prefix 'helper_' and extension '.php'. 
			 */
			foreach($filenames as $file) {
				include_once( trailingslashit( FW_THEME_FRAMEWORK_INCLUDE_DIR ) . '/' . $file );
			}

		}
		
	}
}
