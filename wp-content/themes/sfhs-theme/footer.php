<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SFS
 */

?>
	</div><!-- #content -->

	<!-- Footer Section -->
			<footer class="margin_top-75">
				<div class="container m-fullwidth footer-margin ">
					<div class="row">
						<div class="col-md-4 col-xs-2 hidden-xs hidden-sm">
							<!-- Brand Logo -->
							<a href="<?php echo get_site_url(); ?>" class="">
									<?php 
										
										// $custom_logo_id = get_theme_mod( 'custom_logo' );
										// $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
										// if ( has_custom_logo() ) {
										// 	echo '<img src="'. esc_url( $logo[0] ) .'">';
										// } else {
										// 	echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
										// }							
									?>
									<img src="<?php bloginfo("template_directory")?>/assets/resources/img/logo/footer-logo.svg" class="logo-dekstop" alt="">
									<img src="<?php bloginfo("template_directory")?>/assets/resources/img/logo/mobile-logo/mobile-footer-logo.svg" class="logo-mobile" alt="">

							</a>
							<!-- End of Brand Logo -->
						</div>

						<div class="col-md-8 col-xs-12 alignRight no-padding">
							<!-- <ul class="footer-links">
								<li><a href="#">FAQ</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Disclaimer</a></li>
							</ul> -->
								<div class="footer_links">
											<?php 
												wp_nav_menu( array( 'theme_location' => 'footer_menu' ) );
											?>
										<!-- <span class="footer_links"><a href="#">Admissions</a></span>
										<span class="footer_links"><a href="#">Announcements</a></span>
										<span class="footer_links"><a href="#">Portals</a></span>
										<span class="footer_links"><a href="#">Contact</a></span> -->
								</div>
								
								<div class="copyright__container">
										
										<span class="copyright__font">©</span>
										<span class="footer_trademark-font">Copyright 2019 | Strawberry Fields High School</span>
										<span class="footer__credits">site design & developed by <a href="https://www.icdindia.com" target="_blank" rel="noreferrer">itu chaudhuri design</a></span>
								</div>
								
														
								
							</div>
							
							

						</div>

						<div class="col-md-3 col-xs-12">
							
						</div>

					</div>
					

				</div>
				

			</footer>
			<div class="floating__linksWrap hidden-xs hidden-sm">
				<span class="floating__links backTo__top--text backtoTopAnimate">Back to top</span>
			</div>

			<div class="floating__linksWrap visible-xs visible-sm">
				<span class="backRipple floating__links backTo__top--text backTo__top--mobile"></span>
				
 
			</div>

				
	<!-- End of Footer Section -->

</div><!-- #page -->

<?php wp_footer(); ?>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
		
</body>

<!-- <script>
	$(window).on( "load", function (){
			// setTimeout(function(){
				$('#status').fadeOut(); // will first fade out the loading animation 
				$('#preloader').delay(1000).fadeOut('slow'); // will fade out the white DIV that covers the website. 
				$('body').delay(1000).css({'overflow':'visible'});
			// }, 3000);

		});
</script> -->

</html>

