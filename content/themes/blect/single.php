<?php
/**
 * The template for general single post page
 *
 * @package WordPress
 * @subpackage Vun_Hougkh
 * @since The Starry Night 1.0 with Vun Hougkh 1.0
 */

get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<?php /** The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'templates/content', 'single' ); ?>

			<?php //twentythirteen_post_nav(); ?>
			
			<?php comments_template(); ?>

		<?php endwhile; /** END: The loop */ ?>

	</div><?php // END: #content ?>
</div><?php // END: #primary ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>