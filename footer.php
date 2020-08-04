<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shop_Petaluma
 */

?>

	<footer id="colophon" class="site-footer">

		<div class="footer-nav">
			
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-footer',
					'menu_id'        => 'footer-menu',
				)
			);
			?>

		</div>
		
		<div class="big-footer-wrapper container-fluid">
			<div class="big-footer container">
				<div class="row">
					<div class="col-md-6 big-footer-column">
						<h2>About</h2>
						<p>Our local businesses are an integral part of what makes our city so special.  ShopPetaluma.com was created to give these shops, restaurants, and service providers a place to share what they have to offer during the unusual circumstances COVID-19 has presented.  We love our business community and hope you will join us in supporting them through these uncertain times.</p>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-xl-6 big-footer-column">
								<h2>Address</h2>
								<p class="no-bottom-marg">27 Howard Street</p>
								<p>Petaluma, CA 94952</p>
							</div>
							<div class="col-xl-6 big-footer-column">
								<h2>Contact</h2>
								<p class="no-bottom-marg"><a href="mailto:econdev@cityofpetaluma.org">econdev@cityofpetaluma.org</a></p>
								<p><a href="tel:707.778.4484">(707) 778-4484</a></p>

								<!-- <h2>Share</h2> -->

								<div class="socials">
									<!-- <a href="https://www.facebook.com" target="_blank" rel="noreferrer"><i class="fa fa-facebook-square"></i></a> -->
									<!-- <a href="https://www.twitter.com" target="_blank" rel="noreferrer"><i class="fa fa-twitter-square"></i></a> -->
									<!-- <a href="https://www.instagram.com" target="_blank" rel="noreferrer"><i class="fa fa-instagram"></i></a> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>			
		</div>

		<div class="site-info-wrapper container-fluid">
			<div class="site-info container">
				<a href="<?php echo esc_url('https://www.petalumadowntown.com/'); ?>">
					<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2020/05/PDA-Letterhead-dd.jpg" alt="Petaluma Downtowm logo" class=" pda-logo">
				</a>
				<a href="<?php echo esc_url('https://cityofpetaluma.org/'); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/images/Petaluma_City_Seal_Grey.svg" alt="City of Petaluma logo" class="">
				</a>
				<a href="<?php echo esc_url('http://www.petalumachamber.com/'); ?>">
					<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2020/05/PACC-Logo.jpg" alt="Petaluma Chamber of Commerce logo" class="pacc-logo">
				</a>
				<p>Sponsored by the City of Petaluma in collaboration with the Petaluma Downtown Association and the Petaluma Area Chamber of Commerce. ©2020 All Rights Reserved.</p>
				<!-- <span class="sep"> | </span> -->
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					// printf( esc_html__( 'Theme: %1$s by %2$s.', 'shop-petaluma' ), 'shop-petaluma', '<a href="http://thedesignguild.co">The Design Guild / Fox Scarlett</a>' );
					?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
