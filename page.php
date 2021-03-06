<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACC_Starter_Theme
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="content-area js-main-cols">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				if(is_page('sitemap')) {
					get_template_part( 'template-parts/content', 'page' );
					wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); 
				} else {
					get_template_part( 'template-parts/content', 'page' );
				}

				
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar('page'); ?>
</div>
<?php
get_footer();
