<?php
/**
 * Template Name: Officers and Directors
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
			while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<div class="column-left"><?php the_field('column_1'); ?></div>
					<div class="column-right"><?php the_field('column_2'); ?></div>
				</div><!-- .entry-content -->

				
			</article><!-- #post-## -->
				

		<?php	endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar('page'); ?>
</div>
<?php
get_footer();

