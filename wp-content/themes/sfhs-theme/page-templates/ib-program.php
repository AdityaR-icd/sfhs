<?php 
/* Template Name: IB Program  */
?>

<?php
get_header();
?>
	
	<div id="primary" class="content-area templatePage IBPage">
		<main id="main" class="site-main">

			<!--- Header with Video Or Image --->



			<section class="mB__120">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<h1 class="head-nav sectionHeading templateHeading"><?php echo get_the_title(); ?></h1>
						</div>
					</div>
				</div>
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
									$introVideo = CFS()->get('intro_video');
									if ($introVideo) {
										// video available
								?>
									<div class="pos_relative img-position playIcon__center inView customPlay mouseHover mobile__squareVideo">
										<video class="static_video video-js vjs-16-9" preload="meta" data-setup='{ "controls": false, "autoplay": false }'  >
												<source src="<?php echo $introVideo; ?>" type="video/mp4" >
										</video>
										<button class="o-play-btn">
											<i class="o-play-btn__icon">
												<div class="o-play-btn__mask"></div>
											</i>
										</button>
									</div>
										
									
								<?php
									} else {
										// no video
								?>
									<img src="<?php echo CFS()->get('desktop_lead_image'); ?>" class="img-responsive hidden-xs" alt="">
									<img src="<?php echo CFS()->get('mobile_lead_image'); ?>" class="m-fullwidth img-responsive hidden-sm hidden-lg hidden-md"/>
								<?php
									}
								?>

								<span class="triangle__top--white hidden-xs hidden-sm"></span>
								<span class="triangle__right--white hidden-xs hidden-sm"></span>
								<span class="triangle__bottom--white hidden-xs hidden-sm"></span>
								<span class="triangle__left--white hidden-xs hidden-sm"></span>
							</div>

						</div>
					</div>

					
				</div>
			</section>
			

			<?php 
				$introPara = CFS()->get('intro_para_1');
				if ($introPara) {
			?>
			
				<!--- Into Section --->

				<section class="mB__80 mobile__mB-100">
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

				<!--- Into Section end --->

			<?php
				}
			?>

			<?php 
				$i = 0;
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
												<?php 
													if($content['content_video']){
												?>
														<div class="play-btn first homeTestimonials ibdp-video">
															<div class="playIcon__bottomLeft customPlay inView">
																<video class="video-js static_video" preload="none"  data-setup='{ "controls": false, "autoplay": false  }' poster="<?php echo $content['video_thumb']; ?>" playsinline>
																	<source src="<?php echo $content['content_video']; ?>" type="video/mp4">
																</video>
																<span class="homeVideo__caption"><?php echo $content['video_caption']; ?></span>

																<button aria-label="button" role="button" class="o-play-btn">
																	<i class="o-play-btn__icon">
																		<div class="o-play-btn__mask"></div>
																	</i>
																</button>
																<div class="homeVideo__info">
																	<span class="homeCarousel__name"><?php echo $content['student_name']; ?></span>
																	<span class="homeCarousel__class"><?php echo $content['student_class']; ?></span>
																</div>
															</div>
															
															
														</div>
												<?php
													} else {
														echo '<img src="'.$content['content_image'].'" class="img-responsive" alt="">';
													}
												?>
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
												<?php 
													if($content['content_video']){
												?>
														<div class="play-btn first homeTestimonials ibdp-video">
															<div class="playIcon__bottomLeft customPlay inView">
																<video class="video-js static_video" preload="none"  data-setup='{ "controls": false, "autoplay": false  }' poster="<?php echo $content['video_thumb']; ?>" playsinline>
																	<source src="<?php echo $content['content_video']; ?>" type="video/mp4">
																</video>
																<span class="homeVideo__caption"><?php echo $content['video_caption']; ?></span>

																<button aria-label="button" role="button" class="o-play-btn">
																	<i class="o-play-btn__icon">
																		<div class="o-play-btn__mask"></div>
																	</i>
																</button>
																<div class="homeVideo__info">
																	<span class="homeCarousel__name"><?php echo $content['student_name']; ?></span>
																	<span class="homeCarousel__class"><?php echo $content['student_class']; ?></span>
																</div>
															</div>
															
															
														</div>
												<?php
													} else {
														echo '<img src="'.$content['content_image'].'" class="img-responsive" alt="">';
													}
												?>
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

				} // end foreach
			?>
			
			 <!-- Video Section -->
			 <section class="mB__80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1 no-padding">
                            <div class="pos_relative img-position playIcon__left inView customPlay mobile__squareVideo" >
								<video class="video-js vjs-16-9" preload="none" data-setup='{ "controls": false, "autoplay": false }' poster="<?php echo CFS()->get('video_thumb'); ?>" playsinline>
									<source src="<?php echo CFS()->get('video'); ?>" type="video/mp4">
								</video> 
								                              
								<div class="img-caption font--white" id="overlay">
									<button class="o-play-btn">
										<i class="o-play-btn__icon">
											<div class="o-play-btn__mask"></div>
										</i>
									</button>
                                    <p><?php echo CFS()->get('video_caption'); ?></p>
                                </div>	
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Video Section End-->

			<?php 
				$twoColWidget = CFS()->get('two_col_text');
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
			?>
			
            <?php 
				$i = 0;
				$content_rows = CFS()->get( 'content_2' );
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

				} // end foreach
			?>

			<?php 
				$twoColWidget = CFS()->get('two_col_text_2');
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
				}
			?>
			
			
			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>
<script>



</script>
