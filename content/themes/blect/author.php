<?php
/**
 * The template for general author page
 *
 * @package WordPress
 * @subpackage Vun_Hougkh
 * @since The Starry Night 1.0 with Vun Hougkh 1.0
 */

get_header(); ?>

<?php get_template_part( 'partials/page-header/author' ); ?>

<div class="page-body">
	<div class="page-body-container container">
		<div class="page-body-inner row">
			<?php  
			/**
			 * Primary
			 */
			?>
			<div id="primary" class="content-area col-md-8 margin-bottom-2x">
				<div id="content" class="site-content" role="main">

					<?php if ( have_posts() ) : ?>
					
					<?php /** The loop. */ ?>
					<?php	while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'partials/content/listing' ); ?>

					<?php endwhile; ?>
					<?php
					/**
					 * Pagination
					 */	
					if ( function_exists( 't_pagination' ) ) 	t_pagination();
					?>
					<?php
					else : // ELSE: if have_posts()

						/** If no content, include the "No posts found" template. */
						get_template_part( 'templates/content', 'none' );

					endif; // END: if have_posts()
					?>

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