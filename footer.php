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
					<h3>
						<a target="_blank" href="http://visitor.constantcontact.com/manage/optin?v=001l-FZeZKC-P-q2RjvRzQDDU_YVKo1BEzuNKSfXZAMPtw35Uu4apkgmeC7ssdGmwy73dyKIiC12xGseaUXg5ClE38rwHG0w4mtsfbtBqViXrE%3D">Join Our Mailing List</a>
					</h3>

					

				</div><!-- footer-email -->

				<div class="footer-donate">
		        	<a href="<?php bloginfo('url'); ?>/donate">Donate</a>
		        </div>

				<div class="creds">
					<?php echo '<a href="'.$sitemap.'">sitemap</a> | site by <a target="_blank" href="http://bellaworksweb.com/?r=foundation">Bellaworks</a>'; ?>
				</div><!-- creds -->
			</div><!-- footer left -->

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<?php the_field('google_analytics', 'option'); ?>
</body>
</html>
