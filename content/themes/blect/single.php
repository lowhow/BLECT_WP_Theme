<?php
/**
 * The template for general single post page
 *
 * @package WordPress
 * @subpackage Vun_Hougkh
 * @since The Starry Night 1.0 with Vun Hougkh 1.0
 */

get_header(); ?>
<div class="page-body">
	<div class="page-body-container container">
		<div class="page-body-inner row">
			<?php  
			/**
			 * Primary
			 */
			?>
			<div id="primary" class="content-area col-md-8 margin-bottom-2x padding-right-1x">
				<div id="content" class="site-content" role="main">
			
					<?php /** The loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
			
						<?php get_template_part( 'partials/content/single' ); ?>
			
					<?php endwhile; /** END: The loop */ ?>
			
				</div><?php // END: #content ?>
			</div><?php // END: #primary ?>
			<?php  
			/**
			 * Secondary
			 */
			?>
			<?php get_sidebar(); ?>
			
		</div><?php // END: .page-body-inner ?>
	</div><?php // END: .page-body-container ?>
</div><?php // END: .page-body ?>

<?php get_footer(); ?>