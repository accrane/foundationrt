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
	<div id="primary" class="content-area js-main-cols">
		<main id="main" class="site-main" role="main">

			<!-- <header class="pageheading">News & Announcements</header> -->

		<?php
		while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>">
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				
				<?php if( !in_category('events')) { ?>
					<div class="entry-meta">
						Posted on <?php echo get_the_date(); ?>
					</div><!-- .entry-meta -->
				<?php } ?>
				
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

			

		<?php 

		// $cat = get_the_category();
		// $slug = $cat[0]->slug;
		// echo '<pre>';
		// print_r($cat);
		endwhile; // End of the loop.
		?>

		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar('story'); ?>
</div><!-- wrapper -->
<?php 
get_footer();
