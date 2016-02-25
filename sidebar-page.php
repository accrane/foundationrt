<div class="widget-area js-main-cols">
	<?php 

	global $post;     // outside the loop

	
	

	if ( is_page() && $post->post_parent ) {
	    
	    // This is a subpage
	    $parentPage = $post->post_parent;
		// List pages arguments
	    $arg = array(
			'child_of' => $parentPage,
			'title_li' => ''
		);
		echo '<h3>' . get_the_title($parentPage) . '</h3>';
		wp_list_pages($arg);

	} else {
	    // This is not a subpage
	    $ID = get_the_ID();
	    $arg = array(
			'child_of' => $ID,
			'title_li' => ''
		);
	    echo '<h3>' . get_the_title($ID) . '</h3>';
	    wp_list_pages($arg);
	}

	// echo '<pre>';
	// print_r($children);
	// echo '</pre>';
	 ?>
</div>