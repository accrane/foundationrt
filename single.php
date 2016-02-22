<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACC_Starter_Theme
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" class="single">
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				
				<div class="entry-meta">
					<?php acc_starter_theme_posted_on(); ?>
				</div><!-- .entry-meta -->
				
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'acc-starter-theme' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'acc-starter-theme' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php acc_starter_theme_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</article><!-- #post-## -->

			

		<?php endwhile; // End of the loop.
		?>

		<div class="related-posts">
			<h3>Related Posts</h3>
		</div><!-- related posts -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar(); ?>
</div><!-- wrapper -->
<?php 
get_footer();
