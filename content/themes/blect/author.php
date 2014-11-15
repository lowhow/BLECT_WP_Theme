<?php
/**
 * The template for general author page
 *
 * @package WordPress
 * @subpackage Vun_Hougkh
 * @since The Starry Night 1.0 with Vun Hougkh 1.0
 */

get_header(); ?>
<div id="main">
	<div id="main-inner" class="container">
		<div class="row">

			<div id="primary" class="content-area">
				<div id="content" class="site-content" role="main">

					<?php if ( have_posts() ) : ?>

					<header class="archive-header">

						<?php
						/**
						 * Get breadcrumbs
						 */ 
						if ( function_exists('fw_breadcrumbs') ) fw_breadcrumbs(); 
						?>

						<h1 class="archive-title author-title"><?php	printf( __( '%s\'s <small>articless</small>' ), get_the_author() ); ?></h1>

						<?php

						// If a user has filled out their description, show a bio on their entries.
						if ( get_the_author_meta( 'description' ) ) : ?>
						<div class="author-info">
							<div class="row">
					      <div class="author-avatar">
					        <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentythirteen_author_bio_avatar_size', 74 ) ); ?>
					      </div><?php // END: .author-avatar ?><!-- .author-avatar -->
					      <div class="author-description">
					        <p class="author-bio">
					          <?php the_author_meta( 'description' ); ?>
					        </p>
					      </div><?php // END: .author-description ?>
					    </div>
						</div>              
						<?php endif; ?>

					</header><?php // END: .archive-header ?>
					
					<?php /** The loop. */ ?>
					<?php	while ( have_posts() ) : the_post(); ?>

					<div class="row">
						<?php get_template_part( 'templates/content-listing', 'author' ); ?>
					</div>

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

			<?php get_sidebar(); ?>

  	</div><?php // END: .row ?>
	</div><?php // END: #main-inner ?>
</div><?php // END: #main ?>
<?php get_footer(); ?>