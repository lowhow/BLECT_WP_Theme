<?php
/**
 * The template for general page header
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<?php get_template_part( 'partials/nav/blect', 'top' ); ?>
		<?php // get_template_part( 'partials/nav/bootstrap', 'default' ); ?>
		<?php // get_template_part( 'partials/nav/bootstrap', 'inverse' ); ?>
		<?php get_template_part( 'partials/nav/blect', 'default' ); ?>
		<?php // get_template_part( 'partials/nav/blect', 'division' ); ?>
		<?php // get_template_part( 'partials/nav/blect', 'cut-in' ); ?>
		<?php
		global $helper;
		global $post_to_exclude;
		$post_to_exclude = array();
		if ( is_home() ) {
			/**
			 * Get latest 4 post with thumbnail.
			 */
			$module_query_args = array(
				'posts_per_page' => '4',
				'category__in'   => array(/*蘋果快报*/
					33, /*游人悠事*/
					34, /*镜头开讲*/
					35, /*蘋果看世界*/
					36, /*我の旅游梦*/
					37, /*旅游文化*/
					38, /*旅游资讯站*/
					39, /*世界大不同*/
					40, /*游民の日记*/
					41, /*地图人生*/
					42, /*101推荐*/
					43
				),
				'meta_key'       => '_thumbnail_id',
			);
		}
		?>
	</header><?php // END: #masthead ?>

	<div id="main">
		<div id="main-inner">