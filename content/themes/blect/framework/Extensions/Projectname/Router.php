<?php namespace Framework\Extensions\Projectname;
use Framework\Core\Observer as Observer;
use Framework\WordPress\Loader as Loader;

class Router implements Observer
{
	private $loader;

	public function __construct( Loader $loader )
	{
		$this->loader = $loader;
	}

	public function handle() 
	{
		$this->loader
		->add_action( 'template_redirect', $this, 'routing_rules' );

		return $this;
	}

	/**
	 * [extension_template_method description]
	 * @return [type] [description]
	 */
	public function routing_rules() 
	{	
		global $helper;
		$is_user_logged_in = is_user_logged_in();

		/* About Us */
		// if ( is_page('about-us') )
		// {
	 //        wp_redirect( get_permalink( get_page_by_path( 'about-us/overview' ) ) ); exit;
	 //    }

	    /* Projects */
	 //    if ( is_page('projects') )
		// {
	 //        wp_redirect( get_permalink( get_page_by_path( 'projects/putrajaya' ) ) ); exit;
	 //    }
	}

}