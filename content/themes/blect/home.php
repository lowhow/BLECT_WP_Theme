<?php
/**
 * The template for home page
 *
 * @package WordPress
 * @subpackage Vun_Hougkh
 * @since The Starry Night 1.0 with Vun Hougkh 1.0
 */
get_header(); 
global $helper;
global $post_to_exclude;
?>
<div class="page-body">
	<div class="page-body-container container">
		<div class="page-body-inner row">
			<div  id="primary" class="content-area col-md-8">
				<?php if( ! is_paged() ) : ?>
				<div class="row">
					<div class="col-sm-6">
						<?php
						$module_query_args = array( 
							'cat' 				=> '34', /* 游人悠事 */
							'posts_per_page'	=> '3',
							'post__not_in' 		=> $post_to_exclude,
							'fw_heading'		=> array(
								'title' => '游人悠事',
								'link'	=> trailingslashit( get_bloginfo( 'url' ) ) . '?cat=34',
							)
						);
						include(locate_template('partials/module/listing-grid1list.php')); 
						?>
					</div>
					<div class="col-sm-6">
						<?php 
						$module_query_args = array( 
							'cat' 				=> '33', /* 蘋果快报 */
							'posts_per_page'	=> '3',
							'post__not_in' 		=> $post_to_exclude,
							'fw_heading'		=> array(
								'title' => '蘋果快报',
								'link'	=> trailingslashit( get_bloginfo( 'url' ) ) . '?cat=33',
							)
						);
						include(locate_template('partials/module/listing-grid1list.php')); 
						?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<?php
						$module_query_args = array( 
							'cat' 				=> '43', /*101推荐*/
							'posts_per_page'	=> '4',
							'post__not_in' 		=> $post_to_exclude,
							'fw_heading'		=> array(
								'title' => '101推荐',
								'link'	=> trailingslashit( get_bloginfo( 'url' ) ) . '?cat=43',
							)
						);
						include(locate_template('partials/module/listing.php')); 
						?>
					</div>
					<div class="col-sm-6">
						<?php
						$module_query_args = array( 
							'cat' 				=> '36', /* 蘋果看世界 */
							'posts_per_page'	=> '4',
							'post__not_in' 		=> $post_to_exclude,
							'fw_heading'		=> array(
								'title' => '蘋果看世界',
								'link'	=> trailingslashit( get_bloginfo( 'url' ) ) . '?cat=36',
							)
						);
						include(locate_template('partials/module/listing.php')); 	
						?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<?php
						$module_query_args = array( 
							'cat' 				=> '35', /* 镜头开讲 */
							'posts_per_page'	=> '2',
							'post__not_in' 		=> $post_to_exclude,
							'fw_heading'		=> array(
								'title' => '镜头开讲',
								'link'	=> trailingslashit( get_bloginfo( 'url' ) ) . '?cat=35',
							)
						);
						include(locate_template('partials/module/listing-grid.php')); 
						?>
					</div>
					<div class="col-sm-6">
						<?php
						/* 映画室 */
						$module_query_args = array( 
							'cat' 				=> '16375',
							'posts_per_page'	=> '2',
							'post__not_in' 		=> $post_to_exclude,
							'fw_heading'		=> array(
								'title' => '映画室',
								'link'	=> trailingslashit( get_bloginfo( 'url' ) ) . '?cat=16375',
							)
						);
						include(locate_template('partials/module/listing-grid.php')); 	
						?>
					</div>
				</div>
			<?php endif; // END: is_paged() ?>
				<div class="row">
					<div class="col-sm-12">
						<?php
						query_posts( array(
							'post__not_in' 		=> $post_to_exclude,
							'paged' 			=> $paged,
							'category__not_in' 	=> array(/*Uncategorized*/1, /*Publisher*/3, /*站内公告*/195, /*101奖礼*/1395, /*101信箱*/16374),
						) );
						/* Home Listing */
						include(locate_template('partials/module/listing-home.php')); 	
						?>
					</div>
				</div>
			</div>
			<div class="col-md-4 margin-top-1x"><?php get_sidebar(); ?></div>		
		</div>
	</div>
</div>
<?php get_footer(); ?>