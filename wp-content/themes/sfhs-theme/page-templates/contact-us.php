<?php 
/* Template Name: Contact us  */
?>

<?php
get_header();
?>

	<div id="primary" class="content-area contact__us">
		<main id="main" class="site-main">

			<!--- Heading Section --->
			<section>
				<div class="container">
					<div class="row">
						<div class="col-md-11 col-md-offset-1">
							<h1 class="head-nav sectionHeading templateHeading"><?php echo get_the_title(); ?></h1>
						</div>
					</div>
				</div>
			</section>
	
			<!--- Contact us Section --->
			<section class="mB__80">
				<div class="container">
					<div class="row">
						<div class="col-md-5 col-md-offset-1 col-xs-12">
							<div class="contactPadding">
									<?php echo do_shortcode('[contact-form-7 id="105" title="Contact us"]'); ?>					
							</div>
						</div>
						<div class="col-md-4 col-md-offset-1 col-xs-12">
							<?php
							while ( have_posts() ) :
								the_post();

								the_content();

								
							endwhile; // End of the loop.
							?>
						</div>
					</div>
				</div>
				
			</section>
			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>
<script>



</script>
