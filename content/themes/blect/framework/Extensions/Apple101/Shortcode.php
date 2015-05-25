<?php namespace Framework\Extensions\Apple101;
use Framework\Core\Observer as Observer;

class Shortcode implements Observer
{	
	public function handle() 
	{
		add_shortcode( 'fw-question', array( $this, 'question' ) );
		return $this;
	}

	/**
	 * Ad Size
	 * @param  array 	$atts [description]
	 * @return string   HTML string
	 */
	public function question( $atts, $content )
	{ 	
	    return '<i class="fa fa-quote-left fa-fw fa-3x text-primary"></i>' . $content . '<i class="fa fa-quote-right fa-fw fa-3x pull-right text-primary" style="vertical-align:top;"></i>';
	}
}
