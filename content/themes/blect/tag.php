<?php
/**
 * The template for general tag listing page
 *
 * @package WordPress
 * @subpackage Vun_Hougkh
 * @since The Starry Night 1.0 with Vun Hougkh 1.0
 */

get_header(); ?>
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

			<h1 class="archive-title tag-title"><?php single_cat_title( '', TRUE ); ?></h1>

			<?php
				// Show an optional term description.
				$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					printf( '<div class="taxonomy-description">%s</div>', $term_description );
				endif;
			?>

		</header><?php // END: .archive-header ?>
		
		<?php /** The loop. */ ?>
		<?php	while ( have_posts() ) : the_post(); ?>

		<div class="row">
			<?php get_template_part( 'templates/content-listing', 'tag' ); ?>
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
<?php get_footer(); ?>