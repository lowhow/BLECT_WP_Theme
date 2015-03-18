<?php namespace Framework\Extensions;
use Framework\Core\Observer as Observer;
use Framework\WordPress\Loader as Loader;

class Woocommerce implements Observer
{
	private $loader;

	public function __construct( Loader $loader )
	{
		$this->loader = $loader;
	}

	public function handle()
	{
		$this->loader
			->remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10)
			->remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10)
			->add_action('woocommerce_before_main_content', $this, 'my_theme_wrapper_start', 10)
			->add_action('woocommerce_after_main_content', $this, 'my_theme_wrapper_end', 10)
			->add_action('after_setup_theme', $this, 'woocommerce_support');

		return $this;
	}


	public function my_theme_wrapper_start()
	{
		echo '<section id="wcmain">';
	}

	public function my_theme_wrapper_end()
	{
		echo '</section>';
	}

	public function woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}

}