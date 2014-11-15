<?php
/**
 * The template for general search result page
 *
 * @package WordPress
 * @subpackage Vun_Hougkh
 * @since The Starry Night 1.0 with Vun Hougkh 1.0
 */

get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title"><?php printf( __( '<small>Search result</small> for "%s"' ), get_search_query() ); ?></h1>
			
			<div class="text-right text-muted"><small><?php global $wp_query; echo $wp_query->found_posts;	?> results</small></div>
		</header><?php // END: .page-header ?>


		<?php /** The loop. */ ?>
		<?php	while ( have_posts() ) : the_post(); ?>

		<div class="row">
			<?php get_template_part( 'templates/content-listing', 'search' ); ?>
		</div>

		<?php endwhile; ?>
		<?php
		/**
		 * Pagination
		 */	
		if ( function_exists( 't_pagination' ) ) 	t_pagination();
		?>
			<div class="text-right text-muted"><small><?php global $wp_query; echo $wp_query->found_posts;	?> results</small></div>
		<?php

		else :
			// If no content, include the "No posts found" template.
			get_template_part( 'templates/content', 'none' );

		endif;
	?>

	</div><?php // END: #content ?>
</div><?php // END: #primary ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>