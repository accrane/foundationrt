<div class="resource-area">

<h3 class="resources">Search for Resources</h3>

	<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	    <label>
	        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
	        <input type="search" class="search-field"
	            placeholder="<?php echo esc_attr_x( 'Enter keyword or topic', 'placeholder' ) ?>"
	            value="<?php echo get_search_query() ?>" name="s"
	            title="<?php echo esc_attr_x( 'Enter keyword or topic', 'label' ) ?>" />
	    </label>
	    <input type="submit" class="search-submit"
	        value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
	</form>



<h3>Other Resources</h3>

	<?php 
	wp_reset_query();
	global $post;     // outside the loop

	// If we are on a Single View or Searching by Tag
	if( is_single() || is_archive() || is_search() ) :

		// Resource Parent page ID
		$ID = '24';
		    $arg = array(
				'child_of' => $ID,
				//'exclude' => $current,
				'title_li' => ''
			);
		    //echo '<div class="organization" >' . get_the_title($ID) . '</div>';
		    wp_list_pages($arg);
	
	// if is not a Single Resource Viewor Search by Tag
	else:
 
		$current = get_the_ID();

		if ( is_page() && $post->post_parent ) {
		    
		    // This is a subpage
		    $parentPage = $post->post_parent;
			// List pages arguments
		    $arg = array(
				'child_of' => $parentPage,
				'exclude' => $current,
				'title_li' => ''
			);
			//echo '<div class="organization" >' . get_the_title($parentPage) . '</div>';
			wp_list_pages($arg);

		} else {
		    // This is not a subpage
		    $ID = get_the_ID();
		    $arg = array(
				'child_of' => $ID,
				'exclude' => $current,
				'title_li' => ''
			);
		    //echo '<div class="organization" >' . get_the_title($ID) . '</div>';
		    wp_list_pages($arg);
		}

	endif; 

	// echo '<pre>';
	// print_r($children);
	// echo '</pre>';
	 ?>





	<h4 class="resources">POPULAR TOPICS</h4>

	<?php 

	$args = array( 
		'hide_empty'=> 1,
		'orderby' => 'count',
		'order' => 'DESC'
		 );
 
	$terms = get_terms( 'resource_tag', $args );
	// echo '<pre>';
	// print_r($terms);
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
	    $count = count( $terms );
	    $i = 0;
	    foreach ( $terms as $term ) {
	     
	        echo '<li>';
	        echo '<a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . '</a>';
	        echo '</li>';
	    }
	    
	}

	?>



</div><!-- resource-area -->