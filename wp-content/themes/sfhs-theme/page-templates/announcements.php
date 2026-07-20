<?php 
/* Template Name: Announcements  */
?>

<?php
get_header();
?>
	
	<div id="primary" class="content-area announcementPage">
		<main id="main" class="site-main">

			<!--- Heading Section --->
			<section>
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<h1 class="head-nav sectionHeading templateHeading"><?php echo get_the_title(); ?></h1>
						</div>
					</div>
				</div>
			</section>

			<section class="mB__120">
				<div class="container">
					<?php 
						
						$relargs = array(
							'post_type' =>  array('announcement'),
							'orderby' => 'publish_date', 
							'order' => 'ASC',
							'posts_per_page'=>-1, 
							'numberposts'=>-1
						);

						$relposts = get_posts( $relargs );
						
						foreach( $relposts as $current_post ) {
					?>

							<div class="row">
								<div class="col-md-10 col-md-offset-1">
									<h4 class="announcementHeading"><?php echo apply_filters( 'post_title', $current_post->post_title ); ?></h4>
									<div>
										<?php // echo apply_filters('the_content', $current_post->post_content); ?>
									</div>
									<div>
										<?php echo CFS()->get( 'link'  , $current_post->ID); ?>
									</div>
									<!-- <a href="#" class="font--red anchor_font">admissions ></a> -->
									<span class="borderBottom"></span>
								</div>
							</div>
							
						<?php } //end foreach ?>

					<!-- <div class="row">
						<div class="col-md-10 col-md-offset-1">
							<h4 class="announcementHeading">Winter vacations to start from 24th December 2018</h4>
							<a href="#" class="font--red anchor_font">events ></a>
							<span class="borderBottom"></span>
						</div>
					</div> -->

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
