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

					<!--Begin CTCT Sign-Up Form-->
					<!-- EFD 1.0.0 [Thu Mar 03 10:51:42 EST 2016] -->
					
					       <span id="success_message" style="display:none;">
					           <div style="text-align:center;">Thanks for signing up!</div>
					       </span>
					       <form data-id="embedded_signup:form" class="ctct-custom-form Form" name="embedded_signup" method="POST" action="https://visitor2.constantcontact.com/api/signup">
					           
					           <!-- The following code must be included to ensure your sign-up form works properly. -->
					           <input data-id="ca:input" type="hidden" name="ca" value="243494f4-ae9b-434b-96c5-8995410dc30d">
					           <input data-id="list:input" type="hidden" name="list" value="1">
					           <input data-id="source:input" type="hidden" name="source" value="EFD">
					           <input data-id="required:input" type="hidden" name="required" value="list,email">
					           <input data-id="url:input" type="hidden" name="url" value="">
					           <input class="footer-email-input" data-id="Email Address:input" type="text" name="email" value="Enter your email..." maxlength="80">
					           <!-- <p data-id="First Name:p" ><label data-id="First Name:label" data-name="first_name">First Name</label> <input data-id="First Name:input" type="text" name="first_name" value="" maxlength="50"></p> -->
					           <button type="submit" class="Button ctct-button Button--block Button-secondary" data-enabled="enabled">Join</button>
					       	<!-- <div><p class="ctct-form-footer">By submitting this form, you are granting: Foundation for Reformed Theology, 4103 Monument Avenue, Richmond, Virginia, 23230-3818, United States, http://www.foundationrt.org permission to email you. You may unsubscribe via the link found at the bottom of every email.  (See our <a href="http://www.constantcontact.com/legal/privacy-statement" target="_blank">Email Privacy Policy</a> for details.) Emails are serviced by Constant Contact.</p></div> -->
					       </form>
					   
					<script type='text/javascript'>
					   var localizedErrMap = {};
					   localizedErrMap['required'] = 		'This field is required.';
					   localizedErrMap['ca'] = 			'An unexpected error occurred while attempting to send email.';
					   localizedErrMap['email'] = 			'Please enter your email address in name@email.com format.';
					   localizedErrMap['birthday'] = 		'Please enter birthday in MM/DD format.';
					   localizedErrMap['anniversary'] = 	'Please enter anniversary in MM/DD/YYYY format.';
					   localizedErrMap['custom_date'] = 	'Please enter this date in MM/DD/YYYY format.';
					   localizedErrMap['list'] = 			'Please select at least one email list.';
					   localizedErrMap['generic'] = 		'This field is invalid.';
					   localizedErrMap['shared'] = 		'Sorry, we could not complete your sign-up. Please contact us to resolve this.';
					   localizedErrMap['state_mismatch'] = 'Mismatched State/Province and Country.';
						localizedErrMap['state_province'] = 'Select a state/province';
					   localizedErrMap['selectcountry'] = 	'Select a country';
					   var postURL = 'https://visitor2.constantcontact.com/api/signup';
					</script>
					<script type='text/javascript' src='https://static.ctctcdn.com/h/contacts-embedded-signup-assets/1.0.2/js/signup-form.js'></script>
					<!--End CTCT Sign-Up Form-->

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
