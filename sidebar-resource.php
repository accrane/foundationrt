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

	<h4 class="resources">POPULAR TOPICS</h4>

	<?php 

	$args = array( 'hide_empty=0' );
 
	$terms = get_terms( 'resource_category', $args );
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