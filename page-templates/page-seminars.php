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
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			
			        
			    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

			   <article id="post-<?php the_ID(); ?>" class="single">
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php
							the_content();

							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'acc-starter-theme' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->

					<footer class="entry-footer">
						<?php
							edit_post_link(
								sprintf(
									/* translators: %s: Name of current post */
									esc_html__( 'Edit %s', 'acc-starter-theme' ),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
								),
								'<span class="edit-link">',
								'</span>'
							);
						?>
					</footer><!-- .entry-footer -->
				</article><!-- #post-## -->

			<?php endwhile; ?>
		<?php endif; ?>
			

		</main><!-- #main -->
	</div><!-- #primary -->

<div class="widget-area">
<?php
/*
	Random Story Post

*/
	$i=0;
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'story',
	'posts_per_page' => 1,
	'order' => 'rand'
));
	if ($wp_query->have_posts()) : ?>
	<div class="side-story">
    <?php while ($wp_query->have_posts()) : $wp_query->the_post();  ?>

    <?php the_title(); ?>
    <?php the_excerpt(); ?>


   <?php endwhile; ?>
</div><!-- side story -->
<?php endif; ?>



<?php
/*
	Post categorized Seminar

*/
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'post',
	'posts_per_page' => 1,
	'tax_query' => array(
		array(
			'taxonomy' => 'category', // your custom taxonomy
			'field' => 'slug',
			'terms' => array( 'seminar' ) // the terms (categories) you created
		)
	)
));
	if ($wp_query->have_posts()) : ?>
	<div class="side-story">
    <?php while ($wp_query->have_posts()) :  $wp_query->the_post(); ?>

    <?php the_title(); ?>
    <?php the_excerpt(); ?>


   <?php endwhile; ?>
   </div><!-- side story -->
<?php endif; ?>
</div><!-- widget area -->

</div><!-- wrapper -->
<?php
get_footer();
