<?php
/**
 * Template Name: Resources Sub Pages
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

					$whichResource = get_field('which_resource');
					//echo $whichResource;

					get_template_part( 'template-parts/content', 'page' );
				
			endwhile; // End of the loop.

// List the Related Resources

	$taxonomyCat = 'resource_category';
	$i=0;
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'resource',
	'posts_per_page' => -1,
	'paged' => $paged,
	'tax_query' => array(
		array(
			'taxonomy' => $taxonomyCat, // your custom taxonomy
			'field' => 'term_id',
			'terms' => array( $whichResource ) // the terms (categories) you created
		)
	)
));
	if ($wp_query->have_posts()) : ?>
    <?php while ($wp_query->have_posts()) : ?>
        
    <?php $wp_query->the_post(); 
		
		$termId = $whichResource;

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

				<div class="tax-resource-col">
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

		    				<div class="tags">
				    			<?php 
									echo get_the_term_list( $post->ID, 'resource_tag', '<div class="tag"></div>', ', ' );
									?>
				    		</div><!-- tags -->
		    				
		    			</div><!-- col right -->
		    		</div><!-- resource col -->

		    		
		    		

		    	</div><!-- resource page -->

		<?php endwhile; ?>
	<?php endif ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar('resource'); ?>
</div>
<?php
get_footer();
