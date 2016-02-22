<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACC_Starter_Theme
 */

get_header(); ?>

<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'page',
	'page_id' => 49
));
	if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); 

	// Get field Name
		$sizeLarge = 'large';
		$sizeMed = 'medium';
		$banner_image = get_field('banner_image'); 
		$content_image_one = get_field('image_1');
		$content_image_two = get_field('image_2');
		$content_image_three = get_field('image_3'); 
		$title = $banner_image['title'];
		$alt = $banner_image['alt'];
		$titleOne = $content_image_one['title'];
		$altOne = $content_image_one['alt'];
		$titleTwo = $content_image_two['title'];
		$altTwo = $content_image_two['alt'];
		$titleThree = $content_image_three['title'];
		$altThree = $content_image_three['alt'];
	 	$thumb = $banner_image['sizes'][ $sizeLarge ];
	 	$thumbOne = $content_image_one['sizes'][ $sizeMed ];
	 	$thumbTwo= $content_image_two['sizes'][ $sizeMed ];
	 	$thumbThree = $content_image_three['sizes'][ $sizeMed ];
	 	$bannerText = get_field('banner_text');
	 	$contentOne = get_field('content_1');
	 	$textOne = get_field('text_1');
	 	$contentTwo = get_field('content_2');
	 	$textTwo = get_field('text_2');
	 	$contentThree = get_field('content_3');
	 	$textThree = get_field('text_3');

	?>

	<div class="home-banner">
		<div class="wrapper bann-img">
			<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
			<div class="banner-text"><?php echo $bannerText; ?></div>
		</div><!-- wrapper -->
	</div><!-- home banner -->

 	
    <?php endwhile; endif; ?>
<div class="wrapper">
	<div id="primary" class="">
		<main id="main" class="site-main" role="main">

		
<?php
/*

		First Content Block


*/
	$post_object = $contentOne;

	if( $post_object ): 

		// override $post
		$post = $post_object;
		setup_postdata( $post ); 

		?>
    
		<div class="content-block block-left blocks">
			<div class="block-image">
				<img src="<?php echo $thumbOne; ?>" alt="<?php echo $altOne; ?>" title="<?php echo $titleOne; ?>" />
			</div>
			<h2><?php the_title(); ?></h2>
			<div class="content-block-excerpt">
				<?php if( $textOne != '' ) {
					echo $textOne;
				} else {
					the_excerpt();
				} ?>
		</div><!-- content block excerpt -->
			<div class="learnmore"><a href="<?php the_permalink(); ?>">Learn More</a></div>
		</div><!-- content block -->
		<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>

<?php
/*

		Second Content Block


*/
	$post_object = $contentTwo;

	if( $post_object ): 

		// override $post
		$post = $post_object;
		setup_postdata( $post ); 

		?>
    
		<div class="content-block block-left blocks">
			<div class="block-image">
				<img src="<?php echo $thumbTwo; ?>" alt="<?php echo $altTwo; ?>" title="<?php echo $titleTwo; ?>" />
			</div>
			<h2><?php the_title(); ?></h2>
			<div class="content-block-excerpt">
				<?php if( $textTwo != '' ) {
					echo $textTwo;
				} else {
					the_excerpt();
				} ?>
		</div><!-- content block excerpt -->
			<div class="learnmore"><a href="<?php the_permalink(); ?>">Learn More</a></div>
		</div><!-- content block -->
		<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>

<?php
/*

		Third Content Block


*/
	$post_object = $contentThree;

	if( $post_object ): 

		// override $post
		$post = $post_object;
		setup_postdata( $post ); 

		?>
    
		<div class="content-block block-right blocks">
			<div class="block-image">
				<img src="<?php echo $thumbThree ?>" alt="<?php echo $altThree; ?>" title="<?php echo $titleThree; ?>" />
			</div>
			<h2><?php the_title(); ?></h2>
			<div class="content-block-excerpt">
				<?php if( $textThree != '' ) {
					echo $textThree;
				} else {
					the_excerpt();
				} ?>
		</div><!-- content block excerpt -->
			<div class="learnmore"><a href="<?php the_permalink(); ?>">Learn More</a></div>
		</div><!-- content block -->
		<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- wrapper -->
<?php
get_footer();
