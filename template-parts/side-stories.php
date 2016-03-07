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

    	$position = get_field('position');
    	$location = get_field('church_and_location');

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

	    
	    <h3 class="story-title">
	    	<?php the_title(); ?>
	    </h3>

	    <?php if($position != '') { ?>
	    	<div class="story-position"><?php echo $position; ?></div>
	    <?php } ?>

	    <?php if($location != '') { ?>
	    	<div class="story-name"><?php echo $location; ?></div>
	    <?php } ?>

	    <?php if($image != '') { ?>
	    	<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
	    <?php } ?>

	    <div class="side-story-excerpt"><?php the_excerpt(); ?></div>
	    

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