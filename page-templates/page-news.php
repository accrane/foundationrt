<?php
/**
 * Template Name: News
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACC_Starter_Theme
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				$i=0;
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'post',
				'posts_per_page' => 9,
				'paged' => $paged,
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

			    <article id="post-<?php the_ID(); ?>" class="articles <?php echo $class; ?> blocks">
					<header class="entry-header">
						<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

						
						<div class="entry-meta">
							<div class="date">
								<?php echo get_the_date(); ?>
							</div><!-- date -->
						</div><!-- .entry-meta -->
						
					</header><!-- .entry-header -->

					<?php if ( has_post_thumbnail() ) { ?>
	    				<div class="block-image">
							<?php the_post_thumbnail(); ?>
						</div>
					<?php } ?>

					<div class="entry-content">
						<?php
							the_excerpt();
						?>
					</div><!-- .entry-content -->

					<div class="readmore">
						<a href="<?php the_permalink(); ?>">Read More</a>
					</div>

					
				</article><!-- #post-## -->

			<?php endwhile; ?>
			<?php pagi_posts_nav(); ?>
		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar(); ?>
</div>
<?php
get_footer();
