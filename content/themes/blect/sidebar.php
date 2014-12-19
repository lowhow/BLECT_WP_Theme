<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Vun_Hougkh
 * @since The Starry Night 1.0 with Vun Hougkh 1.0
 */
global $helper;
global $post_to_exclude;
?>
<div id="secondary" class="margin-bottom-2x">
	<div class="adblock margin-bottom-half">
		<!-- 101 Medium Rectangle 1 -->
		<div id='div-gpt-ad-1418719160721-2' style='width:300px; height:250px;' class="center-block">
		<script type='text/javascript'>
		googletag.cmd.push(function() { googletag.display('div-gpt-ad-1418719160721-2'); });
		</script>
		</div>
	</div>
	<div class="adblock margin-bottom-half">
		<!-- 101 Medium Rectangle 2 -->
		<div id='div-gpt-ad-1418719160721-3' style='width:300px; height:250px;' class="center-block">
		<script type='text/javascript'>
		googletag.cmd.push(function() { googletag.display('div-gpt-ad-1418719160721-3'); });
		</script>
		</div>
	</div>
	<div class="adblock margin-bottom-half">
		<!-- 101 Medium Rectangle 3 -->
		<div id='div-gpt-ad-1418719160721-4' style='width:300px; height:250px;' class="center-block">
		<script type='text/javascript'>
		googletag.cmd.push(function() { googletag.display('div-gpt-ad-1418719160721-4'); });
		</script>
		</div>
	</div>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><?php // END: #primary-sidebar ?>
	<?php endif; ?>

	<div class="row">
		<div class="col-sm-6 col-md-12 col-lg-12">
		<?php
		$module_query_args = array( 
			'cat' 				=> '16374', /* 镜头开讲 */
			'posts_per_page'	=> '1',
			'post__not_in' 		=> $post_to_exclude,
			'fw_heading'		=> array(
				'title' => '101信箱',
				'link'	=> trailingslashit( get_bloginfo( 'url' ) ) . '?cat=16374',
			)
		);
		include(locate_template('partials/module/listing-apple101-question.php')); 
		?>
		</div>
		<div class="col-sm-6 col-md-12 col-lg-12">
		<?php
		$module_query_args = array( 
			'cat' 				=> '44', /* 名家旅游 */
			'posts_per_page'	=> '1',
			'post__not_in' 		=> $post_to_exclude,
			'fw_heading'		=> array(
				'title' => '名家旅游',
				'link'	=> trailingslashit( get_bloginfo( 'url' ) ) . '?cat=44',
			)
		);
		include(locate_template('partials/module/listing-apple101-travelmasters.php')); 
		?>
		</div>
	</div>
</div><?php // END: #secondary ?>
