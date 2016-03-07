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

			<header class="pageheading">Resources</header>

		<?php
		while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" class="single">
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				
				<div class="entry-meta">
					Posted on <?php echo get_the_date(); ?>
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

			

		<?php 
		// Get our terms for each taxonomy
		$taxonomyTag = 'resource_tag';
		$taxonomyCat = 'resource_category';
		$tag = get_the_terms( get_the_ID(), $taxonomyTag );
		$cat = get_the_terms( get_the_ID(), $taxonomyCat );

		// only going to show related resources below if there are any
		if($tag != '') {
			$slug = $tag[0]->slug;
			$tagId = $tag[0]->term_id;
		}

		// need to set id for then file image and link below.
		$catId = $cat[0]->term_id;
		
		// echo '<pre>';
		// print_r($cat);

		// collected info in our query, now we can go query related if there are any
		endwhile; // End of the loop.
		?>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar('resource'); ?>
</div><!-- wrapper -->

<?php 

// Only if there are realted tags.
if($cat != '') : ?>
<div class="wrapper">
	<div class="related-posts">
		<h3>Related Publications</h3>
		<?php



			$i=0;
			$wp_query = new WP_Query();
			$wp_query->query(array(
			'post_type'=>'resource',
			'posts_per_page' => 3,
			'paged' => $paged,
			'tax_query' => array(
				array(
					'taxonomy' => $taxonomyTag, // your custom taxonomy
					'field' => 'slug',
					'terms' => array( $slug ) // the terms (categories) you created
				)
			)
		));
			if ($wp_query->have_posts()) : ?>
		    <?php while ($wp_query->have_posts()) : ?>
		        
		    <?php $wp_query->the_post(); 
		    // counter
		    $i++;
		    
		    // set the class for the row

		    if( $i == 4 ) {
		    	$class = 'r-last';
		    	$i = 0;
		    } else {
		    	$class = 'r-first';
		    }

		    // Set the icon based on category

		    if( $catId == '7') { // Bibliographies
		    	$imageType = 'pdf';
		    } elseif( $catId == '10') { // Sermons
		    	$imageType = 'mp3';
		    } elseif( $catId == '9') { // Publications
		    	$imageType = 'doc';
		    } elseif( $catId == '8') { // Studies
		    	$imageType = 'pdf';
		    } else {
		    	$imageType = '';
		    }

		    // get files
		    $pdf = get_field('pdf');
		    $mp3 = get_field('mp3');

		    ?>
		    <div class="single-resource-col <?php echo $class; ?>">
		    		
		    		<div class="resource-title">
		    			<a class=" js-blocks" href="<?php the_permalink(); ?>">
		    				<?php the_title(); ?>
		    			</a>
		    		</div>

		    		<div class="resource-col">
		    			<div class="col-left <?php echo $imageType; ?>">
		    				<a href="
		    				<?php if( $catId == 9 ) {
			    					echo get_the_permalink();
			    				} elseif( $catId == 10 ) {
			    					echo $mp3;
			    				} else {
			    					echo $pdf;
			    				}

		    				?>
		    				">Link</a>
		    			</div><!-- left col -->
		    			<div class="col-right">
		    				<?php the_title(); ?>
		    			</div><!-- col right -->
		    		</div><!-- resource col -->

		    		
		    		<div class="tags">
		    			<?php 
							echo get_the_term_list( $post->ID, 'resource_tag', '<div class="tag"></div>', ', ' );
							?>
		    		</div><!-- tags -->

		    	</div><!-- resource page -->

		<?php endwhile; endif; ?>
	</div><!-- related posts -->
</div><!-- wrapper -->
<?php
// end if there are tags
endif;

get_footer();
