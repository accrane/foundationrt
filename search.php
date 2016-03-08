<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ACC_Starter_Theme
 */

get_header(); ?>
<div class="wrapper">
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'acc-starter-theme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); 

			// Get our terms for each taxonomy
			$taxonomyCat = 'resource_category';
			$terms = get_the_terms( get_the_ID(), $taxonomyCat );

			// echo '<pre>';
			// print_r($terms);
			$termId = $terms[0]->term_id;

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
		    				<?php 
		    				if( $termId == 9 ) {
			    					echo get_the_permalink();
			    				} elseif( $termId == 10 ) {
			    					echo $mp3;
			    				} else {
			    					echo $pdf;
			    				}

		    				?>
		    				">Link</a>
		    			</div> <!-- resource col -->
		    			<div class="col-right-long">
		    				<a href="
		    				<?php if( $termId == 9 ) {
			    					echo get_the_permalink();
			    				} elseif( $termId == 10 ) {
			    					echo $mp3;
			    				} else {
			    					echo $pdf;
			    				}

		    				?>
		    				"><?php the_title(); ?></a>
		    			</div><!-- col right -->
		    		</div><!-- resource col -->

		    		
		    		<div class="tags">
		    			<?php 
							echo get_the_term_list( $post->ID, 'resource_tag', '<div class="tag"></div>', ', ' );
							?>
		    		</div><!-- tags -->

		    	</div><!-- tax-resource-col -->

			<?php
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar('resource'); ?>
</div>
<?php 
get_footer();
