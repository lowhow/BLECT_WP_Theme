<?php namespace Framework;

class ThemeSetup
{
	private $helper;
	private $themeSupport;
	private $navMenu;
	private $stylesAndScripts;
	private $extensionLoader;
	private $sustomPostTypeLoader;
	private $loader;


	public function __construct() 
	{	
		$this->loader = new WordPress\Loader;
		$this->helper = new WordPress\Helper;
		$this->stylesAndScripts = new WordPress\StylesAndScripts;
		$this->themeSupport = new WordPress\ThemeSupport;
		$this->navMenu = new WordPress\NavMenu;
		$this->widget = new WordPress\Widget;
		$this->shortcode = new WordPress\Shortcode;
		$this->extensionLoader = new Core\ExtensionLoader;

		global $helper; 
		$helper = $this->helper;
	}

	/**
	 * Boot up and RUN!
	 * @return [type]
	 */
	public function run() 
	{	
		$this->loader

		->load_dependancies( array( 'wp_bootstrap_navwalker.php', 'simple_html_dom.php') )

		->add_action( 'after_setup_theme', $this->helper, 'load_theme_textdomain' )

		->add_action( 'after_setup_theme', $this->themeSupport, 'add_theme_support' )

		->add_action( 'after_setup_theme', $this->navMenu, 'register' )

		->add_action( 'widgets_init', $this->widget, 'register_sidebars' )

		->add_action( 'wp_enqueue_scripts', $this->stylesAndScripts, 'enqueue_styles' )

		->add_action( 'wp_enqueue_scripts', $this->stylesAndScripts, 'enqueue_scripts' )

		->add_action( 'admin_enqueue_scripts', $this->stylesAndScripts, 'admin_enqueue_styles' )

		->add_action( 'admin_enqueue_scripts', $this->stylesAndScripts, 'admin_enqueue_scripts' )

		->add_filter( 'wp_title', $this->helper, 'add_wp_title', 10, 2 )

		->add_filter( 'nav_menu_css_class', $this->navMenu, 'add_class_to_current_menu_item', 10, 2 )

		->add_filter( 'widget_text', NULL, 'shortcode_unautop' )

		->add_filter( 'widget_text', NULL, 'do_shortcode' )

		->remove_action( 'wp_head', 'wp_generator' )

		->remove_action( 'wp_head', 'wlwmanifest_link' )

		->remove_action( 'wp_head', 'rsd_link' )

		->run();

		$this->shortcode->add();

		$this->extensionLoader

		->attach( new Extensions\PrettyPhoto )

		->attach( new Extensions\SliderCustomPostType( 'slider', 'sliders') )
		->attach( new Extensions\SliderMetaBoxes() )

		->load();


		return $this;
	}
	
}

