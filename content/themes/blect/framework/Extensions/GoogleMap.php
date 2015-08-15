<?php namespace Framework\Extensions;
use Framework\Core\Observer as Observer;
use Framework\WordPress\Loader as Loader;

class GoogleMap implements Observer
{
	private $loader;

	public function __construct( Loader $loader )
	{
		$this->loader = $loader;
	}
	
	public function handle() 
	{
		// $this->loader
		// ->add_action('init', $this, 'callback_function_name');

		add_shortcode( 'fw_gmap', array( $this, 'gmap_shortcode' ) );
		/** remove p tag in shortcode */
        remove_filter( 'the_content', 'wpautop' );
        add_filter( 'the_content', 'wpautop', 99 );
        add_filter( 'the_content', 'shortcode_unautop', 100 );

		return $this;
	}

	/**
	 * Supported attributes include 
	 * lat="", lng="", title="", $content 
	 * optional zoom="15"
	 * example:
	 * [fw_gmap lat="2.3423" lng="9.23489" title="Sunway Pyramid"]content here...[/fw_gmap]
	 * @return [type] [description]
	 */
	public function gmap_shortcode( $atts, $content )
	{
		if ( !isset( $atts['lat'] ) || !isset( $atts['lng'] ) || !isset( $atts['title'] ) )
			return; 

		if ( $atts['zoom'] )

		ob_start(); 
		$mapid = 'gm' . wp_generate_password( 8, false );
		?> 
		<style>
		<?php echo '#' . $mapid ?> { width: 100%; height:300px; }
		</style>
		<div class="google-maps">
			<div id="<?php echo $mapid; ?>" class="gmap"></div>
		</div>
		<script type="text/javascript">
		<?php 
		/*
		 * Gmap stuffs
		 */
		?>
		var gmapLoaded = false;

		function initialize() {
			gmapLoaded = true;
			var center = new google.maps.LatLng(<?php echo $atts['lat'] ?>, <?php echo $atts['lng'] ?>);
			function calculateCenter() {
			  	center = map.getCenter();
			}

		  	var mapOptions = {
		  		scrollwheel: false,
			    zoom: 15,
			    center: center
		  	};

		  	var map = new google.maps.Map(document.getElementById('<?php echo $mapid; ?>'), mapOptions);

			var marker1 = new google.maps.Marker({
			      position: center,
			      map: map,
			      title: '<?php echo $atts["title"] ?>'
			});

		<?php if ( isset( $content ) && $content !== '') :?>

			contentString = '<div><?php echo str_replace (array("\r\n", "\n", "\r"), ' ', nl2br( $content ) ) ?></div>';

			var infowindow1 = new google.maps.InfoWindow({
			    content: contentString
			});

			google.maps.event.addListener(marker1, 'click', function() {
			    infowindow1.open(map,marker1);
			});

		  	google.maps.event.addDomListener(window, 'resize', function() {
			    map.setCenter(center);
			});		
		<?php endif; ?>

		<?php 
		if ( WP_DEBUG ) 
			echo 'console.log("Google Map #' . $mapid . ' loaded.")';
		?>
		}

		function loadScript() {
		  	var script = document.createElement('script');
		  	script.type = 'text/javascript';
		  	script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp' + '&callback=initialize';
		  	document.body.appendChild(script);
		}

		window.onload = loadScript;

		</script>
		<?php
        return ob_get_clean();
	}

}