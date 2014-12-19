<?php namespace Framework\Extensions\Apple101;
use Framework\Core\Observer as Observer;
use Framework\WordPress\Loader as Loader;

class PublisherTaxonomy implements Observer
{
	private $loader;

	public function __construct( Loader $loader )
	{
		$this->loader = $loader;
	}

	public function handle() 
	{
		$this->loader
		->add_action( 'init', $this, 'taxonomy_init' )
		->add_action( 'publisher_add_form_fields', $this, 'publisher_meta_box_in_add_form' )
		->add_action( 'publisher_edit_form_fields', $this, 'publisher_meta_box_in_edit_form' )
		->add_action( 'created_term', $this, 'publisher_save_in_edit_form', 10, 3)
		->add_action( 'edited_term', $this, 'publisher_save_in_edit_form', 10, 3)
		->add_action( 'delete_term', $this, 'publisher_delete_in_edit_form', 10, 3);

		return $this;
	}

	/**
	 * [wp_pagenavi_to_bootstrap description]
	 * @param  [type] $html [description]
	 * @return [type]       [description]
	 */
	public function taxonomy_init() 
	{	
	    // Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'              => _x( 'Publishers', 'taxonomy general name' ),
			'singular_name'     => _x( 'Publisher', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Publishers' ),
			'all_items'         => __( 'All Publishers' ),
			'parent_item'       => __( 'Parent Publisher' ),
			'parent_item_colon' => __( 'Parent Publisher:' ),
			'edit_item'         => __( 'Edit Publisher' ),
			'update_item'       => __( 'Update Publisher' ),
			'add_new_item'      => __( 'Add New Publisher' ),
			'new_item_name'     => __( 'New Publisher Name' ),
			'menu_name'         => __( 'Publisher' ),
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'publisher' ),
		);
		register_taxonomy( 'publisher', array( 'post' ), $args );

		return $this;
	}

	/**
	 * [publisher_meta_box_in_add_form description]
	 *
	 * @param  string $taxonomy_name Name of the taxonomy this term belongs to.
	 * @return void 	          
	 */
	public function publisher_meta_box_in_add_form( $taxonomy_name )
	{
	?>
	  	<div class="form-field">
		    <label for="avatar">Avatar</label>
		    <div class="bootstrap-wrapper">
		    	<p id="avatar-imgplaceholder"></p>
		    </div>
		    <input type="text" id="avatar" name="avatar" placeholder="Attachment URL" value="">
		    <button class="button" data-media-uploader-multiple="false" data-media-uploader-title="Select Avatar" data-media-uploader-button-text="Use Image" data-media-uploader-send-to="#avatar" data-media-uploader-show-in="#avatar-imgplaceholder">Set avatar</button>
		    <button class="button hidden" data-media-uploader-remove="#avatar" >Remove</button>
		    <p>Please use <b>square image</b> with minimum <em>100px x 100px</em></p>
	  	</div>
	<?php
	}

	/**
	 * [publisher_meta_box_in_edit_form description]
	 *
	 * Option name format = 'term_{term_id}_meta_{meta_name}'
	 * @param  [type] $term [description]
	 * @return [type]       [description]
	 */
	public function publisher_meta_box_in_edit_form( $term )
	{	
		$avatar_option_name = 'term_' . $term->term_id . '_meta_avatar';

		$avatar = get_option( $avatar_option_name );
	?>
		<table class="form-table">
			<tbody>
				<tr class="form-field">
					<th scope="row"><label for="avatar">Avatar</label></th>
					<td>
						<div class="bootstrap-wrapper">
					    	<p id="avatar-imgplaceholder">
					    		<?php  
					    		if ( $avatar )
					    		{
					    			echo '<img src="' . esc_attr( $avatar ) . '" class="aligncenter img-responsive img-thumbnail" >';
					    		}
					    		?>
					    	</p>
					    </div>
						<input type="text" id="avatar" name="avatar" placeholder="Attachment URL" value="<?php echo esc_attr( $avatar ) ?>">
						<button class="button" data-media-uploader-multiple="false" data-media-uploader-title="Select Avatar" data-media-uploader-button-text="Use Image" data-media-uploader-send-to="#avatar" data-media-uploader-show-in="#avatar-imgplaceholder">Set avatar</button>
						<button class="button hidden" data-media-uploader-remove="#avatar" >Remove</button>
						<p class="description">Please use <b>square image</b> with minimum <em>100px x 100px</em></p>
					</td>
				</tr>
			</tbody>
		</table>
	<?php
	}

	/**
	 * [publisher_save_in_edit_form description]
	 * @param  int 	$term_id  [description]
	 * @param  int 	$tt_id    [description]
	 * @param  object $taxonomy [description]
	 * @return void           [description]
	 */
	public function publisher_save_in_edit_form( $term_id, $tt_id, $taxonomy )
	{
		if( ! isset($_POST['avatar'] ) )
			return;

		$avatar_option_name = 'term_' . $term_id . '_meta_avatar';

		update_option( $avatar_option_name, $_POST['avatar'] );		
	}

	public function publisher_delete_in_edit_form( $term_id, $tt_id, $taxonomy )
	{
		$avatar_option_name = 'term_' . $term_id . '_meta_avatar';
		delete_option( $avatar_option_name );
	}

}