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

		$cat = get_the_category();
		$slug = $cat[0]->slug;
		// echo '<pre>';
		// print_r($cat);
		endwhile; // End of the loop.
		?>

		<div class="related-posts">
			<h3>Related Posts</h3>
			<?php
				$i=0;
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'post',
				'posts_per_page' => 3,
				'paged' => $paged,
				'tax_query' => array(
					array(
						'taxonomy' => 'category', // your custom taxonomy
						'field' => 'slug',
						'terms' => array( $slug ) // the terms (categories) you created
					)
				)
			));
				if ($wp_query->have_posts()) : ?>
			    <?php while ($wp_query->have_posts()) : ?>
			        
			    <?php $wp_query->the_post(); 
			    $i++;
			    if( $i == 3 ) {
			    	$class = "last";
			    	$i=0;
			    } else {
			    	$class = 'first';
			    }

			    ?>
			    <article id="post-<?php the_ID(); ?>" class="articles <?php echo $class; ?> js-blocks">
					<header class="entry-header ">
						<?php the_title( '<h2 class="entry-title js-titles"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

						
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

			<?php endwhile; endif; ?>
		</div><!-- related posts -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar(); ?>
</div><!-- wrapper -->
<?php 
get_footer();
