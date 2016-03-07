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
			/* Start the Loop */
			while ( have_posts() ) : the_post();

			$queried_object = get_queried_object();
			//var_dump( $queried_object );

			$termId = $queried_object->term_taxonomy_id;

			// Set the icon based on category

		    if( $termId == '7') { // Bibliographies
		    	$imageType = 'pdf';
		    } elseif( $termId == '10') { // Sermons
		    	$imageType = 'mp3';
		    } elseif( $termId == '9') { // Publications
		    	$imageType = 'doc';
		    } elseif( $termId == '8') { // Studies
		    	$imageType = 'pdf';
		    } else {
		    	$imageType = '';
		    }

		    // get files
		    $pdf = get_field('pdf');
		    $mp3 = get_field('mp3');
		    ?>

			
		    	<div class="tax-resource-col <?php echo $class; ?>">
		    		
		    		

		    		<div class="resource-col">
		    			<div class="col-left-long <?php echo $imageType; ?>">
		    				<a href="
		    				<?php if( $termId == 9 ) {
			    					echo get_the_permalink();
			    				} elseif( $termId == 10 ) {
			    					echo $mp3;
			    				} else {
			    					echo $pdf;
			    				}

		    				?>
		    				">Link</a>
		    			</div><!-- left col -->
		    			<div class="col-right-long">
		    				<?php the_title(); ?>
		    			</div><!-- col right -->
		    		</div><!-- resource col -->

		    		
		    		<div class="tags">
		    			<?php 
							echo get_the_term_list( $post->ID, 'resource_tag', '<div class="tag"></div>', ', ' );
							?>
		    		</div><!-- tags -->

		    	</div><!-- resource page -->


			<?php 
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar('resource'); ?>
</div>
<?php
get_footer();
