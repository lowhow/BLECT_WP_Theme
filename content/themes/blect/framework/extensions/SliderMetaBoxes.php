<?php namespace Framework\Extensions;

class SliderMetaBoxes implements \Framework\Core\Observer
{
	public function __construct()
	{
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}


	public function handle() 
	{	
		if ( is_admin() )
		{
			$metaboxArgs = array(
				'id' 				=> 'slides',
				'title' 			=> __( 'Slides', FW_TEXTDOMAIN ),
				'callback'			=> array( $this, 'slides_meta_box_callback' ),
				'post_type'			=> array( 'slider' ), 
				'context' 			=> 'normal',
				'priority'			=> 'high',
				'fields' 			=> array(
					array(
						'id' 		=> 'myplugin_new_field',
						'name' 		=> 'myplugin_new_field',
						'key'		=> '_key1',
					),
					array(
						'id' 		=> 'exampleInputEmail1',
						'name' 		=> 'exampleInputEmail1',
						'key'		=> '_key2',
					),
					array(
						'id' 		=> 'slideimage',
						'name' 		=> 'slideimage',
						'key'		=> '_key2',
					)
				)
			);
			$metaBox = new \Framework\Core\MetaBox( $metaboxArgs );
		}

		return $this;
	}


	public function slides_meta_box_callback( $post ) {

		// Add an nonce field so we can check for it later.
		wp_nonce_field( 'myplugin_meta_box', 'myplugin_meta_box_nonce' );

		/*
		 * Use get_post_meta() to retrieve an existing value
		 * from the database and use the value for the form.
		 */
		$value = get_post_meta( $post->ID, '_key1', true );
		$value2 = get_post_meta( $post->ID, '_key2', true );
		?>
			<div class="bootstrap-wrapper">
				<form role="form">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="text" id="exampleInputEmail1" name="exampleInputEmail1" placeholder="Enter email" value="<?php echo esc_attr( $value2 ) ?>">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="text" id="exampleInputEmail1" name="myplugin_new_field" placeholder="Enter email" value="<?php echo esc_attr( $value ) ?>">
				  </div>
				  <div class="form-group">
				    <label for="slideimage">Slide image</label>
				    <input type="text" id="slideimage" name="slideimage" placeholder="slideimage" value="<?php echo esc_attr( $value ) ?>">
				    <button class="button" data-media-uploader-multiple="false" data-media-uploader-title="Select Slide Image" data-media-uploader-button-text="Set Slide Image" data-media-uploader-send-to="#slideimage">Set slide image</button>
				  </div>
				</form>
			</div>
		<?php 
	}



	public function admin_enqueue_scripts()
	{
		wp_enqueue_media();
		
		wp_enqueue_script( 'admin-media-in-metabox-js', trailingslashit( FW_THEME_ASSETS_JS_URI ) . 'admin-media-in-metabox.js', array('media-upload'), null );
	}
}