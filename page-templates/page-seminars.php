<?php
/**
 * Template Name: Seminars
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


						<div class="seminars">
						<?php if(have_rows('seminars')) : while(have_rows('seminars')): the_row();

								$year = get_sub_field('year');
								$pdf = get_sub_field('seminar_pdf');
						 ?>


							 <div class="seminar">
							 	<a target="_blank" href="<?php echo $pdf; ?>">
							 		<span class="download">Seminars in <?php echo $year; ?></span>
							 	</a>
							 </div><!-- seminar -->

						<?php endwhile; endif; ?>
						</div><!-- seminars -->



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
