<?php 
/* Template Name: Template 2  */
?>

<?php
	get_header();
?>
	
	<div id="primary" class="content-area templatePage">
		<main id="main" class="site-main">

			<!--- Header with Video Or Image --->



			<section class="mB__80 mobile__mB-60">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<h1 class="head-nav sectionHeading templateHeading"><?php echo get_the_title(); ?></h1>
						</div>
					</div>
				</div>

				<?php
					// If Image or Carousel or Video is Uploaded
					$introVideo = CFS()->get('intro_video');
					$carousel = CFS()->get('carousel');
					// $image = CFS()->get('desktop_lead_image');
					if($introVideo or !empty($carousel)){
				?>


						<div class="container m-fullwidth">
							<div class="row">
								<div class="col-lg-12 no-padding">

									<?php 
										$triPosArr = CFS()->get( 'header_image_triangle' );
											foreach ( $triPosArr as $key => $label ) {
												$triPos = $label;
											}
									?>
									<div class="header__img__cont <?php echo $triPos; ?>">

										<?php 
											
											if ($introVideo) {
												// video available
										?>
											<div class="playIcon__center inView customPlay mouseHover innerPages mobile__squareVideo">
												<video class="video-js vjs-16-9" preload="meta"  data-setup='{ "controls": false, "autoplay": false }' playsinline>
														<source src="<?php echo $introVideo; ?>" type="video/mp4" >
												</video>
												<button class="o-play-btn">
													<i class="o-play-btn__icon">
														<div class="o-play-btn__mask"></div>
													</i>
												</button>
											</div>
												
											
										<?php
											} 
											else {
												?>
												<div class="fade_img">
													<?php
														foreach ( $carousel as $row ):
													?>
														<div>
															<img src="<?php echo $row['image'] ?>" class="img-responsive hidden-xs" alt="">
															<img src="<?php echo $row['mobile_image'] ?>" class="img-responsive hidden-sm hidden-lg hidden-md mobile__leadImg" alt="">
															<?php
																$imageText = CFS()->get('lead_image_text');
																if($imageText){
															?>
																	<span class="leadImageText"><?php  echo CFS()->get('lead_image_text'); ?></span>
															<?php
																}
															?>
														</div>
													<?php 
														endforeach;
													?>
												</div>
										<?php								
											
											}

											// else {
												// no video
										?>
											<!-- <div class="leadImageHeight">
												<img src="<?php // echo CFS()->get('desktop_lead_image'); ?>" class="img-responsive hidden-xs" alt="">
												<img src="<?php // echo CFS()->get('mobile_lead_image'); ?>" class="m-fullwidth img-responsive hidden-sm hidden-lg hidden-md"/>
												<?php
													// $imageText = CFS()->get('lead_image_text');
													// if($imageText){
												?>
												<span class="leadImageText"><?php // echo CFS()->get('lead_image_text'); ?></span>
												<?php
													// }
												?>
											</div> -->
											
										<?php
											// }
										?>

										<span class="triangle__top--white hidden-xs hidden-sm"></span>
										<span class="triangle__right--white hidden-xs hidden-sm"></span>
										<span class="triangle__bottom--white hidden-xs hidden-sm"></span>
										<span class="triangle__left--white hidden-xs hidden-sm"></span>
									</div>

								</div>
							</div>

							
						</div>
				<?php 
					}
				?>

			</section>
			

			<?php 
				$introPara = CFS()->get('intro_para_1');
				if ($introPara) {
			?>
			
				<!--- Intro Section --->

				<section class="mB__80 mobile__mB-60">
					<div class="container">
						<div class="row templateContent__Container">
							<div class="col-lg-5 col-lg-offset-1">
								<span class="paddingRight">
									<?php echo CFS()->get( 'intro_para_1' ); ?>
								</span>
							</div>
							<div class="col-lg-5">
								<span class="paddingRight">
									<?php echo CFS()->get( 'intro_para_2' ); ?>
								</span>
							</div>
						</div>
					</div>
				</section>

				<!--- Intro Section end --->

			<?php
				}
			?>

			<?php 
				$i = 0;
				$fullWidthImage = CFS()->get('full_width_image');
				$content_rows = CFS()->get( 'content' );
				foreach ( $content_rows as $content ) { 
					$i++;
						if ($i % 2 !== 0 ) {
							// left image right text
						?>

							<!--- Left Image Right Text --->
							<section class="mB__120 mobile__mB-100">
								<div class="container">
									<div class="row templateContent__Container">
										<div class="col-lg-6 col-lg-offset-1 templateContent__center">
											<span class="leftImage">
												<img src="<?php  echo $content['content_image']; ?>" class="img-responsive" alt="">
											</span>
										</div>
										<div class="col-lg-4 templateContent__center">
											<?php  echo $content['content_text']; ?>
										</div>
									</div>
								</div>
							</section>
							<!--- Left Image Right Text end --->

						<?php
						} else {
							// right image left text
						?>


							<!--- Right Image Left Text --->
							<section class="mB__120 mobile__mB-100">
								<div class="container">
									<div class="row templateContent__Container">
										<div class="col-lg-6 col-lg-push-5 templateContent__center">
											<span class="rightImage">
												<img src="<?php  echo $content['content_image']; ?>" class="img-responsive" alt="">
											</span>
										</div>

										<div class="col-lg-4 col-lg-offset-1 col-lg-pull-6 templateContent__center">
											<?php  echo $content['content_text']; ?>									
										</div>
									</div>
								</div>
							</section>
							<!--- Right Image Left Text end --->




						<?php
						} // else end

					if ($fullWidthImage) {
						$order = CFS()->get( 'full_width_image_order' );
							foreach ( $order as $key => $label ) {
								$fullWidthImageOrder = $label;
							}


						if ($i == $fullWidthImageOrder) {
							// show full width image
						?>



							<!--- Full width Image --->
								<section class="mB__120 fullWidth__Image">
									<div class="container-fluid">
										<div class="row">
											<div class="col-lg-12 no-padding d-no-padding">
												<img src="<?php echo $fullWidthImage; ?>" class="img-responsive" alt="">
											</div>
										</div>
									</div>
								</section>
							<!--- Full width Image end --->



						<?php
						}
					}

				} // end foreach
			?>
			

			<?php 
				$twoColWidget = CFS()->get('two_col_text');
				if ($twoColWidget) {
					foreach ( $twoColWidget as $field ) {
						// echo $field['slide_title'];
						// echo $field['upload'];
			?>

			<!-- 2 col text widget -->
			<section class="mB__80 templatePage__list">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-lg-offset-1">
							<?php echo $field['column_1_text'] ?>
						</div>
						<div class="col-lg-5">
							<?php echo $field['column_2_text'] ?>
						</div>
					</div>
				</div>
			</section>

			<!-- 2 col text widget end -->

			<?php
					} // end foreach
				} // end if 
			?>

			<?php
				global $post;
				$post_slug = $post->post_name;
			?>

			<?php 
				// $jobWidget = CFS()->get('job_widget');
				if ($post_slug == 'teachers-and-training') {
					
			?>
					<!-- 2 col text widget -->
					<section class="mB__80 templatePage__list">
						<div class="container">
							<?php echo do_shortcode('[contact-form-7 id="525" title="Teaching Job Section"]'); ?>
						</div>
					</section>

					<!-- 2 col text widget end -->

			<?php
					
				} // end if 
			?>

			
			
			
			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>
<script>



</script>
