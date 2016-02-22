<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACC_Starter_Theme
 */


$info = get_field('footer_left_info', 'option');
$sitemap = get_field('sitemap_link', 'option');
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info wrapper">
		
			<div class="footer-left">
				<?php echo $info; ?>
			</div><!-- footer left -->

			<div class="footer-right">
				<div class="footer-email">
					<h3>Join Our Mailing List</h3>
				</div><!-- footer-email -->
				<div class="creds">
					<?php echo '<a href="'.$sitemap.'">sitemap</a> | site by <a target="_blank" href="http://bellaworksweb.com/?r=foundation">Bellaworks</a>'; ?>
				</div><!-- creds -->
			</div><!-- footer left -->

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
