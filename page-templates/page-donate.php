<?php
/**
 * Template Name: Donate
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACC_Starter_Theme
 */

get_header(); ?>
<div class="wrapper">
	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
	<div id="primary" class="content-area js-main-cols">
		<main id="main" class="site-main" role="main">

			
			        
			    

			   <article id="post-<?php the_ID(); ?>" class="single">
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_field('content');?>

					</div><!-- .entry-content -->

					
				</article><!-- #post-## -->

			
			

		</main><!-- #main -->
	</div><!-- #primary -->

<div class="widget-area">
	<div class="widget">
		<?php 
		$hTitle = get_field('honoring_section_title');
		$subtext = get_field('honoring_subtext');
		 ?>
		 <?php if($hTitle != '') { echo '<h3>'.$hTitle.'</h3>';} ?>
		 <?php if($subtext != '') { echo '<p>'.$subtext.'</p>';} ?>
	
		<?php if(have_rows('honoring')) : 
		while(have_rows('honoring')) : 
			the_row(); 

			$year = get_sub_field('year');
			$pdf = get_sub_field('honoring_pdf');
		?>

		<div class="organization">
		 	<a target="_blank" href="<?php echo $pdf; ?>">
		 		<span class="download">Honoring Donors for <?php echo $year; ?></span>
		 	</a>
		 </div><!-- seminar -->

	<?php endwhile; endif; ?>

</div><!-- widget -->
</div><!-- widget area -->
<?php endwhile; endif; ?>
</div><!-- wrapper -->
<?php
get_footer();
