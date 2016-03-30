<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACC_Starter_Theme
 */


?>

<aside id="secondary" class="widget-area js-main-cols" role="complementary">
	<?php //dynamic_sidebar( 'sidebar-1' ); ?>
	<?php
/*
	Random Story Post

*/
	$i=0;
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'story',
	'posts_per_page' => -1,
	//'order' => 'ASC',
	'orderby' => 'rand'
));
	if ($wp_query->have_posts()) : ?>
	<div class="side-story">
		 <h2>
	    	Stories From the Front
	    </h2>
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

	   

	    
	    <h3 class="story-title">
	    	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	    	
	    </h3>

	    

   <?php endwhile; ?>
</div><!-- side story -->
<?php endif; ?>

	<div class="organization">
		<a target="_blank" href="http://archive.constantcontact.com/fs079/1103274555079/archive/1109898183947.html">Email Archive</a>
	</div>

</aside><!-- #secondary -->
