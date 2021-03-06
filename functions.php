<?php
/**
 * ACC Starter Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ACC_Starter_Theme
 */

/**
 * Theme Setup.
 */
require get_template_directory() . '/inc/theme-setup.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/scripts.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/theme-functions.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/post-types.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
