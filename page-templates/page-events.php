<?php
/**
 * Template Name: Events
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACC_Starter_Theme
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="content-area js-main-cols">
		<main id="main" class="site-main" role="main">

			<header class="entry-header">
				<h1><?php the_title(); ?></h1>
			</header >

			<?php
				$i=0;
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'post',
				'posts_per_page' => -1,
				'paged' => $paged,
				'tax_query' => array(
					array(
						'taxonomy' => 'category', // your custom taxonomy
						'field' => 'id',
						'terms' => array( 6 ) // events
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

			    $date = DateTime::createFromFormat('Ymd', get_field('date'));

			    ?>

			    <article id="post-<?php the_ID(); ?>" class="articles <?php echo $class; ?> js-blocks">
					<header class="entry-header">
						<?php the_title( '<h2 class="entry-title js-art-titles"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

						
						<div class="entry-meta">
							<div class="date">
								<?php 
								if($date != '') {
									echo $date->format('M d, Y');
								}
								 ?>
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

			<?php endwhile; ?>
			<?php //pagi_posts_nav(); ?>
		<?php endif; 
				wp_reset_query();
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<div class="widget-area">
	<div class="widget">
		<h3>Organizations of Interest</h3>
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		<?php if(have_rows('organizations_of_interest')) : 
		while(have_rows('organizations_of_interest')) : 
			the_row(); 
			$organization = get_sub_field('organization');
			$link = get_sub_field('link');
		?>

		<div class="organization">
			<a target="_blank" href="<?php echo $link; ?>"><?php echo $organization; ?></a>
		</div><!-- organization -->

	<?php endwhile; endif; ?>
<?php endwhile; endif; ?>
</div><!-- widget -->
</div><!-- widget area -->

</div><!-- wrapper -->
<?php
get_footer();
