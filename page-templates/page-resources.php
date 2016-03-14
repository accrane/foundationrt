<?php
/**
 * Template Name: Resources
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
				get_template_part( 'template-parts/content', 'page' );
			endwhile; // End of the loop.
			?>


			<div class="featured-resources">
		<h2>Featured Resources</h2>
		<?php
		$args = array( 'hide_empty=0' );
 
		$terms = get_terms( 'resource_category', $args );

		foreach ( $terms as $term ) {
			$i=0;
			$wp_query = new WP_Query();
			$wp_query->query(array(
				'post_type'=>'resource',
				'posts_per_page' => 1,
				'orderby' => 'rand',
				'tax_query' => array(
					array(
						'taxonomy' => 'resource_category', // your custom taxonomy
						'field' => 'slug',
						'terms' => array( $term->slug ) // the terms (categories) you created
					)
				)
			));
			if ($wp_query->have_posts()) : ?>
		    <?php while ($wp_query->have_posts()) : ?>
		        
		    <?php $wp_query->the_post(); 
		    
		    // counter
		    $i++;
		    // get the term ID
		    $termId = $term->term_id;
		    //echo $termId;
		    // set the class for the row

		    if( $i == 2 ) {
		    	$class = 'r-last';
		    	$i = 0;
		    } else {
		    	$class = 'r-first';
		    }

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

		    	<div class="single-resource-col <?php echo $class; ?> js-blocks">
		    		
		    		
		    			<div class="resource-title js-titles">
			    			<a href="<?php echo get_bloginfo('url') . '/resources'.'/'. $term->slug; ?>">
			    				<?php echo $term->name; ?>
			    			</a>
			    		</div>
		    		

		    		<div class="resource-col">
		    			<div class="col-left <?php echo $imageType; ?>">
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
		    			<div class="col-right">
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

		    	</div><!-- resource page -->

		<?php endwhile; endif;  

	} // end for each

		?>
	</div><!-- featured resources -->

		</main><!-- #main -->
	</div><!-- #primary -->


	<?php get_sidebar('resource'); ?>



</div><!-- wrapper -->

<div class="clear"></div>

<div class="wrapper">
	
</div><!-- wrapper -->

<?php
get_footer();
