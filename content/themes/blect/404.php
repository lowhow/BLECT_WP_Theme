<?php
/**
 * The template for 404 page
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

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<header class="entry-header">
							<h1 class="entry-title"><?php _e( '404 Page Not found' ); ?></h1>
						</header>

						<div class="page-content">

							<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyfourteen' ); ?></p>

							<div class="search-box"><?php get_search_form(); ?></div>

						</div><!-- .page-content -->

					</article>	

				</div><?php // END: #content ?>
			</div><?php // END: #primary ?>

			<?php get_sidebar(); ?>

  	</div><?php // END: .row ?>
	</div><?php // END: #main-inner ?>
</div><?php // END: #main ?>
<?php get_footer(); ?>