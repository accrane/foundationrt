<?php 
/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
	
	// Register the Homepage Slides
  
     $labels = array(
	'name' => _x('Resources', 'post type general name'),
    'singular_name' => _x('Resource', 'post type singular name'),
    'add_new' => _x('Add New', 'Resource'),
    'add_new_item' => __('Add New Resource'),
    'edit_item' => __('Edit Resources'),
    'new_item' => __('New Resource'),
    'view_item' => __('View Resources'),
    'search_items' => __('Search Resources'),
    'not_found' =>  __('No Resources found'),
    'not_found_in_trash' => __('No Resources found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Resources'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('resource',$args); // name used in query

    // Register the Homepage Slides
  
     $labels = array(
      'name' => _x('Story', 'post type general name'),
        'singular_name' => _x('Story', 'post type singular name'),
        'add_new' => _x('Add New', 'Story'),
        'add_new_item' => __('Add New Story'),
        'edit_item' => __('Edit Story'),
        'new_item' => __('New Story'),
        'view_item' => __('View Story'),
        'search_items' => __('Search Story'),
        'not_found' =>  __('No Story found'),
        'not_found_in_trash' => __('No Story found in Trash'), 
        'parent_item_colon' => '',
        'menu_name' => 'Story'
      );
      $args = array(
      'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true, 
        'show_in_menu' => true, 
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => false, 
        'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
        'menu_position' => 20,
        'supports' => array('title','editor','custom-fields','thumbnail'),
      
      ); 
  register_post_type('story',$args); // name used in query
  
  // Add more between here
  
  // and here
  
  } // close custom post type


/*
##############################################
  Custom Taxonomies
*/
add_action( 'init', 'build_taxonomies', 0 );
 
function build_taxonomies() {
// cusotm tax
    register_taxonomy( 'resource_category', 'resource',
     array( 
      'hierarchical' => true, // true = acts like categories false = acts like tags
      'label' => 'Category', 
      'query_var' => true, 
      'rewrite' => true ,
      'show_admin_column' => true,
      'public' => true,
      'rewrite' => array( 'slug' => 'categorized' ),
      '_builtin' => true
    ) );

    register_taxonomy( 'resource_tag', 'resource',
     array( 
      'hierarchical' => false, // true = acts like categories false = acts like tags
      'label' => 'Tags', 
      'query_var' => true, 
      'rewrite' => true ,
      'show_admin_column' => true,
      'public' => true,
      'rewrite' => array( 'slug' => 'tagged' ),
      '_builtin' => true
    ) );
  
} // End build taxonomies