<?php namespace Framework;

use Framework\WordPress as WordPress;
use Framework\Base_WPSetup as Base_WPSetup;


if ( !class_exists( 'Base_WPSetup' ) ) {

	class Base_WPSetup {

		public $EarlyLoad;
		public $ThemeSupport;
		public $NavMenu;
		public $StylesAndScripts;
		public $Media;


		public function __construct() {


			$this->EarlyLoad = new WordPress\EarlyLoad;
			$this->ThemeSupport = new WordPress\ThemeSupport;
			$this->NavMenu = new WordPress\NavMenu;
			$this->Widget = new WordPress\Widget;
			$this->Media = new WordPress\Media;

			/**
			 * Include necessary files.
			 */
			$this->include_files();


			/////////////////////
			// Action hooks //
			/////////////////////

			/**
			 * Adding custom actions to hooks according to the action hooks sequence.
			 * @link http://codex.wordpress.org/Plugin_API/Action_Reference 
			 */
			
			add_action( 'after_setup_theme', array( $this, 'action_hook_after_setup_theme' ) );

			add_action( 'widget_init', array( $this, 'action_hook_widget_init' ) );

			add_action( 'wp_enqueue_scripts', array( $this, 'action_hook_wp_enqueue_scripts' ) );

			add_action( 'wp_head', array( $this, 'action_hook_wp_head' ) );

			
			$this->run_after_action_hooks();

			// if ( !WP_DEBUG ){
			// 	$tester = new Test();
			// }else{
			// 	$addAction_AfterSetupTheme = new WordPress\AddAction_AfterSetupTheme;
			// 	$addAction_AfterSetupTheme->init();

			// }

		}


		/**
		 * Add actions to action hook 'after_setup_theme'
		 * @return NULL
		 */
		public function action_hook_after_setup_theme() {
		}


		/**
		 * Add actions to action hook 'widget_init'
		 * @return NULL
		 */
		public function action_hook_widget_init() {
		}


		/**
		 * Add actions to action hook 'wp_enqueue_scripts'
		 * @return NULL
		 */
		public function action_hook_wp_enqueue_scripts() {
		}


		/**
		 * Add actions to action hook 'wp_head'
		 * @return NULL
		 */
		public function action_hook_wp_head() {
		}


		/**
		 * Include files in \include folder
		 * @return [type]
		 */
		public function include_files() {
			/** 
			 * Load all helper files matching filename with prefix 'helper_' and extension '.php'. 
			 */
			$extraFiles = glob( FW_THEME_FRAMEWORK_INCLUDE_DIR . '/*.{php}', GLOB_BRACE );
			
			foreach($extraFiles as $file) {
				include_once( $file );
			}

		}


		/**
		 * Run now
		 * @return [type]
		 */
		public function run_after_action_hooks() {			
		}
		
	}
}
