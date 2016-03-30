<?php
/**
 * The template for displaying archive pages.
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
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			$i=0;
			/* Start the Loop */
			while ( have_posts() ) : the_post(); 

				$i++;
			    if( $i == 3 ) {
			    	$class = "last";
			    	$i=0;
			    } else {
			    	$class = 'first';
			    }

			?>

				<article id="post-<?php the_ID(); ?>" class="articles <?php echo $class; ?> js-blocks">
					<header class="entry-header">
						<?php the_title( '<h2 class="entry-title js-art-titles"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

						
						<div class="entry-meta">
							<div class="date">
								<?php echo get_the_date(); ?>
							</div><!-- date -->
						</div><!-- .entry-meta -->
						
					</header><!-- .entry-header -->

					<div class="block-image">
						<?php if ( has_post_thumbnail() ) { 
								the_post_thumbnail(); 
							  } else { 
							  	echo '<img src="'.get_bloginfo('template_url').'/css/images/default.png" alt="Roundation RT" />';
							  }

						?>
					</div><!-- block image -->

					<div class="entry-content">
						<?php
							the_excerpt();
						?>
					</div><!-- .entry-content -->

					<div class="readmore">
						<a href="<?php the_permalink(); ?>">Read More</a>
					</div>

					
				</article><!-- #post-## -->

			<?php endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar(); ?>
</div>
<?php
get_footer();
