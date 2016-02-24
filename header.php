<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACC_Starter_Theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acc-starter-theme' ); ?></a>

	<header id="masthead" class="site-header " role="banner">

		<div class="wrapper">

			<?php if(is_home()) { ?>
	            <h1 class="logo">
	            <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
	            </h1>
	        <?php } else { ?>
	            <div class="logo">
	            <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
	            </div>
	        <?php } ?>

	        <div class="donate">
	        	<a href="<?php bloginfo('url'); ?>/donate">Donate</a>
	        </div>

	        <div class="site-description"><?php bloginfo('description'); ?></div>

    	</div><!-- wrapper -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="wrapper">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'acc-starter-theme' ); ?>
				 <span></span>
				  <span></span>
				  <span></span>
				  <span></span>
				</button><!-- menu toggle -->
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</div><!-- wrapper -->
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
