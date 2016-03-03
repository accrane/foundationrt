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
	<div id="primary" class="content-area js-main-cols">
		<main id="main" class="site-main" role="main">

			
			        
			    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

			   <article id="post-<?php the_ID(); ?>" class="single">
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content();?>


						<div class="seminars">
						<?php if(have_rows('seminars')) : while(have_rows('seminars')): the_row();

								$year = get_sub_field('year');
								$pdf = get_sub_field('seminar_pdf');
						 ?>


							 <div class="seminar">
							 	<a target="_blank" href="<?php echo $pdf; ?>">
							 		<span class="download">Seminars in <?php echo $year; ?></span>
							 	</a>
							 </div><!-- seminar -->

						<?php endwhile; endif; ?>
						</div><!-- seminars -->



					</div><!-- .entry-content -->

					
				</article><!-- #post-## -->

			<?php endwhile; ?>
		<?php endif; ?>
			

		</main><!-- #main -->
	</div><!-- #primary -->

<div class="widget-area js-main-cols">
<?php
/*
	Random Story Post

*/
	$i=0;
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'story',
	'posts_per_page' => 1,
	//'order' => 'ASC',
	'orderby' => 'rand'
));
	if ($wp_query->have_posts()) : ?>
	<div class="side-story">
    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); 

    	$name = get_field('name');

    	// Get field Name
		$image = get_field('photo'); 
		$url = $image['url'];
		$title = $image['title'];
		$alt = $image['alt'];
		$caption = $image['caption'];
	 	$size = 'medium';
		$thumb = $image['sizes'][ $size ];
		$width = $image['sizes'][ $size . '-width' ];
		$height = $image['sizes'][ $size . '-height' ];

     ?>

	    <h2>
	    	Stories From the Front
	    </h2>

	    <?php if($name != '') { ?>
	    	<div class="date"><?php echo $name; ?></div>
	    <?php } ?>
	    <h3>
	    	<?php the_title(); ?>
	    </h3>
	    <?php if($image != '') { ?>
	    	<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
	    <?php } ?>
	    <?php the_excerpt(); ?>

	    <div class="readmore">
	    	<a href="<?php the_permalink(); ?>">Read More</a>
	    </div>

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
			'field' => 'id',
			'terms' => array( 4 ) // seminars
		)
	)
));
	if ($wp_query->have_posts()) : ?>
	<div class="side-story">
    <?php while ($wp_query->have_posts()) :  $wp_query->the_post(); ?>

	   	<h2>
	    	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	    </h2>

	    <div class="date"><?php echo get_the_date(); ?></div>

	    <?php the_excerpt(); ?>

	    <div class="readmore">
	    	<a href="<?php the_permalink(); ?>">Read More</a>
	    </div>


   <?php endwhile; ?>
   </div><!-- side story -->
<?php endif; ?>
</div><!-- widget area -->

</div><!-- wrapper -->
<?php
get_footer();
