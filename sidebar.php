<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACC_Starter_Theme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area js-main-cols" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>

	<div class="organization">
		<a target="_blank" href="http://archive.constantcontact.com/fs079/1103274555079/archive/1109898183947.html">Email Archive</a>
	</div>

</aside><!-- #secondary -->
