<?php namespace Framework\WordPress;

class Shortcode
{	
	/**
	 * Add shortcodes
	 */
	public function add() 
	{
		add_shortcode( 'bartag', array( $this, 'shortcode_bartag' ) );
	}


	/**
	 * [shortcode_bartag description]
	 * @param  [type] $atts [description]
	 * @return [type]       [description]
	 */
	public function shortcode_bartag( $atts  )
	{
		$a = shortcode_atts( array(
	        'foo' => 'something',
	        'bar' => 'something else',
	    ), $atts );

	    return "foofighters = {$a['foo']}";
	}
}
