<?php namespace Framework\Extensions\Apple101;
use Framework\Core\Observer as Observer;
use Framework\WordPress\Loader as Loader;

class UserAvatar implements Observer
{	
	private $loader;

	public function __construct( Loader $loader )
	{
		$this->loader = $loader;
	}

	public function handle() 
	{
		add_shortcode( 'fw-question', array( $this, 'question' ) );
		$this->loader
		->add_action( 'show_user_profile', $this, 'avatar_meta_box_in_edit_user_profile' )
		->add_action( 'edit_user_profile', $this, 'avatar_meta_box_in_edit_user_profile' )
		->add_filter('get_avatar', $this, 'be_gravatar_filter', 10, 5)
		->add_action( 'personal_options_update', $this, 'avatar_save_in_edit_user_profile' )
		->add_action( 'edit_user_profile_update', $this, 'avatar_save_in_edit_user_profile' );
		//->add_action( 'manage_users_columns', $this, 'add_avatar_to_users_column' );
		return $this;
	}

	/**
	 * Ad Size
	 * @param  array 	$atts [description]
	 * @return string   HTML string
	 */
	public function avatar_meta_box_in_edit_user_profile( $user )
	{ 	
		$avatar = get_user_meta( $user->ID, 'avatar', TRUE);
	?>
	<table class="form-table">
		<tbody>
			<tr>
				<th>
					<label for="avatar">Avatar</label>
				</th>
				<td>
					    <div class="bootstrap-wrapper">
					    	<p id="avatar-imgplaceholder" style="width:120px; max-height:120px;">
					    	<?php 
					    	if ( $avatar )	echo '<img src="' . $avatar . '" class="img-thumbnail" width="120" height="120">';
		      				?>
					    	</p>
					    </div>
					    <input class="regular-text" type="text" id="avatar" name="avatar" placeholder="Attachment URL" value="<?php echo $avatar ?>">
					    <button class="button" data-media-uploader-multiple="false" data-media-uploader-title="Select Avatar" data-media-uploader-button-text="Use Image" data-media-uploader-send-to="#avatar" data-media-uploader-show-in="#avatar-imgplaceholder">Set avatar</button>
					    <button class="button hidden" data-media-uploader-remove="#avatar" >Remove</button>
					    <br>
					    <span class="description">Please use <b>square image</b> with minimum <em>120px x 120px</em></span>
				</td>
			</tr>
		</tbody>
	</table>	
	<?php
	}

	/**
	 * [avatar_save_in_edit_user_profile description]
	 * @param  int 	$user_id [description]
	 * @return void
	 */
	public function avatar_save_in_edit_user_profile( $user_id )
	{
		if( ! isset($_POST['avatar'] ) )
			return;

		$avatar_usermeta_key = 'avatar';

		update_user_meta( $user_id, $avatar_usermeta_key, $_POST['avatar'] );
	}

	/**
	 * [add_avatar_to_users_column description]
	 * @param [type] $columns [description]
	 */
	public function add_avatar_to_users_column( $columns ){
		echo "<pre>";
		var_dump($columns);
		echo "</pre>";
	}

	/**
	 * [delete_avatar_when_user_is_deleted description]
	 * @param  [type] $user_id [description]
	 * @return [type]          [description]
	 */
	public function delete_avatar_when_user_is_deleted($user_id)
	{
		$avatar_usermeta_key = 'avatar';

		delete_user_meta( $user_id, $avatar_usermeta_key );
	}

	/**
	 * [be_gravatar_filter description]
	 * @param  [type] $avatar      [description]
	 * @param  [type] $id_or_email [description]
	 * @param  [type] $size        [description]
	 * @param  [type] $default     [description]
	 * @param  [type] $alt         [description]
	 * @return [type]              [description]
	 */
	public function be_gravatar_filter($avatar, $id_or_email, $size, $default, $alt) {
		$avatar = get_user_meta( $id_or_email, 'avatar', TRUE);

		if ($avatar) 
			$return = '<img src="'.$avatar.'" width="'.$size.'" height="'.$size.'" alt="'.$alt.'" />';
		elseif ($avatar) 
			$return = $avatar;
		else 
			$return = '<img src="'.$default.'" width="'.$size.'" height="'.$size.'" alt="'.$alt.'" />';

		return $return;
	}
}
