<?php
/**
 * Template Name: Support
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACC_Starter_Theme
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="content-area js-main-cols">
		<main id="main" class="site-main" role="main">

			
			        
			    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

			   <article id="post-<?php the_ID(); ?>" class="single">
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content();?>


						



					</div><!-- .entry-content -->

					
				</article><!-- #post-## -->

			<?php endwhile; ?>
		<?php endif; ?>
			

		</main><!-- #main -->
	</div><!-- #primary -->

<div class="widget-area js-main-cols">
	<?php get_template_part('template-parts/side-stories'); ?>
</div><!-- widget area -->

</div><!-- wrapper -->
<?php
get_footer();
