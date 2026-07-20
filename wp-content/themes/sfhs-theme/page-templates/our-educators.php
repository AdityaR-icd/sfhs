<?php 
/* Template Name: Our Educators  */
?>

<?php
get_header();

// Getting Post ID for CPT UI

$my_posts = get_page_by_path('our-educators', OBJECT, 'templates');
$post_ID = $my_posts->ID;

// Loop for Click To option
$text = CFS()->get( 'click_to' , $post_ID);
$i = 0; 
$sectionID = array();
foreach($text as $row){
	$sectionID[$i] = preg_replace("/[^a-zA-Z]/", "",$row['click_to_text'] );
	$i++;
}
$i = 0;
$j = 0;

?>

	<script>
		scrollTopValue = 2200;
	</script>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<!---	====================================================
					Background Image and Background Video Section
				====================================================	--->
							<div id="pinning">

								<div class="hero__background-image">
									
									<div class="aim__hero-shape" id="hero__shape">
									
									</div>
									<!-- <div class="container  hero__text-container" id="hero__text">
										<div class="row">
											<div class="col-md-9 ">
												<h2 class="head-nav">our educators</h2>
												<span class="font--red aim__hero-text">are self evolving, enthusiastic individuals. We provide them with a dynamic platform, encouraging them to imbibe innovative teaching techniques everyday so that they in turn help evolve well rounded, compassionate students.</span>
											</div>
										</div>
									</div> -->

									<span class="hero__text-container" id="hero__text">
										
												<h2 class="head-nav"><?php echo get_the_title(); ?></h2>
												<span class="aim__hero-text"><?php echo CFS()->get('hero_text', $post_ID); ?></span>
										
									</span>
									
									
									<div class="playIcon__center"> 
										<video loop preload="none" poster= "<?php echo CFS()->get('video_poster'  , $post_ID); ?>" class="" muted id="aim__background-video" playsinline>
											
										</video>
										<button class="o-play-btn o-play-btn--playing opacity_hidden">
											<i class="o-play-btn__icon">
												<div class="o-play-btn__mask"></div>
											</i>
										</button>
									</div>

									<div id="unmute__btn" class="">
										<a href="#" class="unmute__btn font--white" id="anchor--white" data-tilt>
											<div id="icon__mute">
												<span class="unmuteBtn">
													<img src="<?php bloginfo("template_directory")?>/assets/resources/icons/mute-icon.svg" id="tap__icon" alt="">
													<span id="mute__text" class="hidden-xs hidden-sm">UNMUTE</span>
												</span>
												<span class="muteBtn">
													<img src="<?php bloginfo("template_directory")?>/assets/resources/icons/unmute-icon.svg" id="tap__icon" alt="">
													<span id="mute__text" class="hidden-xs hidden-sm">MUTE</span>
												</span>
												
											</div>
										</a>
									</div>

								</div>  <!--- end of background image and text --->
				
								<section class="mB__120 mB__50">
									<div class="container ">
										<!-- Scroll Button-->
										<div class="alignCenter scroll__btn-margin">
											<a href="#stats" class="scroll__btn" id="">
												<span>scroll</span>
												<span class="scroll__arrow bounce"></span>
											</a>
										</div>
										<!-- End of Scroll Button -->
									</div>					
								</section>

							</div>

							<!-- Bold Content -->
							<section class="mB__120 stats mobile__mB-60" id="stats">
								<div class="container  ">

										<div class="statsSection">

											<?php 
													$stats_loop = CFS()->get( 'stats_loop' , $post_ID);
													foreach ( $stats_loop as $row ) {
											?>
														<div class="our__aim-stats">
															<span  class="statsHeader">
																<?php echo $row['stats_number']; ?>
															</span>
															<p>
																<?php echo $row['stats_description']; ?>
															</p>
														</div> 
											<?php 
													}
											?>
										</div>
								</div>	
							</section>
							
							<!-- End of Bold Content -->
					
						

							<section class="container " id="<?php echo $sectionID[$i]; ?>">
								
								<!-- Upper navbar -->
								<div class="sticky-navbar">
									<span class="hidden-xs hidden-sm"><i>click to ></i></span>
									<ul class="sticky-nav">
										<?php 
												foreach($text as $row):
										?>							
													<li class="sticky-navbar-list <?php if($i == $j){ echo 'active';}else{ echo 'hidden-xs hidden-sm'; };  ?>"><a href="#<?php echo $sectionID[$j]; ?>"><?php echo $row['click_to_text'] ;?></a> </li>
										<?php
													$j++;
												endforeach;
												$j = 0;
												$i++;
												
										?>
									</ul>
																	
								</div>
																
						</section>
						<!-- End of heading under upper navbar -->		
					
					<div class="container  mB__80 mobile__mB-40">
						<!-- Heading under navbar -->
						<div class="row " id="">
								<div class="col-md-8 ">
									<h2 class="head-nav sectionHeading"><?php echo CFS()->get('section_1_heading', $post_ID); ?></h2>
								</div>
						</div>
					</div>

					<section class="mB__80 mobile__mB-40">
						<div class="container ">	
							<!-- Main Content 1 -->
							<div class="row">
								
								<div class="col-md-8  col-md-push-4 no-padding">
									<div class="fade_img educators__angle">
											<?php 
													$image = CFS()->get( 'carousel_1' , $post_ID);
													foreach ( $image as $row ):
											?>
													<div><img data-lazy="<?php echo $row['image']; ?>" class="img-responsive" alt=""></div>				
											<?php 
													endforeach;
											?>
									</div>
									<!-- <div class="slope-triangle">
										<img src="<?php bloginfo("template_directory")?>/assets/resources/img/main-content/main-1.jpg" class="img-responsive img_margin" alt="">
									</div> -->
								</div>

								<div class="col-md-4 col-md-pull-8">
									<div class="content_padding-60 font--red anchorLink">
											<?php echo CFS()->get('carousel_1_text', $post_ID);?>
									</div>	
								</div>
								
							</div>
							<!-- End of main Content 1 -->
						</div>
					</section>


					

						<section class="mB__120 mobile__mB-60 padding__top">
							<div class="container parallaxBlock">
								<!-- Carousel -->
								<div class="row pos_relative">
									<div class="col-md-8 fade_img imgIndex no-padding">
											<?php 
													$image = CFS()->get( 'carousel_2' , $post_ID);
													foreach ( $image as $row ):
											?>
													<div><img data-lazy="<?php echo $row['image']; ?>" class="img-responsive" alt=""></div>				
											<?php 
													endforeach;
											?>

									</div>
									
									<div class="col-md-5 wayBlock__1 parallaxAnimate">
																	
										<div class="way-block-1-padding font--white redTextBlock">
												<?php echo CFS()->get('carousel_2_text', $post_ID);?>
										</div>
											
									</div>
								</div>
								<!-- End of Carousel -->
							</div>
						</section>


						<section class="mB__120 mobile__mB-80">
								<!-- Content 2 -->
								
							<div class="container ">
								<div class="row">
									<div class="col-md-7">
										<span class="quotes__icon"><img src="<?php bloginfo("template_directory")?>/assets/resources/img/svg-images/quotes.svg" alt=""></span>
										<span class="statsHeader quotes__font"><?php echo CFS()->get('quote_text_2', $post_ID); ?></span>
										<span class="quotes__name"><?php echo CFS()->get('quote_from_2', $post_ID); ?></span>
									</div>
								</div>

								<!-- End of Content 2 -->
							</div>
						</section>

						<section class="mB__180 mobile__mB-80">
							<div class="container">
								<div class="row">
								<?php 
										$testimonials = CFS()->get( 'testimonials' , $post_ID);
										foreach ( $testimonials as $row ):
								?>
											<div class="col-md-4">
												<div class="alignLeft achiever_section-formatting wayTestimonial">
													<div class="playIcon__bottomRight customPlay inView">
														<video class="video-js" preload="none" data-setup='{ "controls": false, "autoplay": false }' poster="<?php echo $row['video_thumb'];?>" playsinline>
															<source src="<?php echo $row['testimonial_video'];?>" type="video/mp4">
														</video>
														<button class="o-play-btn">
															<i class="o-play-btn__icon">
																<div class="o-play-btn__mask"></div>
															</i>
														</button>													

													</div>
													<span class="testimonialName"><?php echo $row['name'];?></span>
													<span class="testimonialDesc"><?php echo $row['about'];?></span>
												</div>
											</div>

											<!-- <div class="play-btn first">
												<div class="pos_relative">
													<video class="video-js static_video" data-setup="{ }" preload="auto">
														<source src="<?php //echo $row['testimonial_video']; ?>" type="video/mp4">
													</video>
													<span class="homeVideo__caption"><?php //echo $row['testimonial_video_subtitle']; ?></span>
												</div>
												
												<button class="o-play-btn">
													<i class="o-play-btn__icon">
														<div class="o-play-btn__mask"></div>
													</i>
												</button>				
												<div class="homeVideo__info">
													<span class="homeCarousel__name"><?php echo $row['name']; ?></span>
													<span class="homeCarousel__class"><?php echo $row['about']; ?></span>
												</div>
											</div> -->
									<?php 
										endforeach;
									?>
								</div>									
							</div>

						</section>

						<!-- Stats Section -->
						<!-- <section class="mB__120 stats mobile__mB-100" id="stats">
							<div class="container ">
								<div class="row">
									
									<div class="col-md-4  ">
										<div class="counter_block-padding">
											<span  class="statsHeader">122</span>
											<p>teachers with advanced degrees</p>
										</div>										
									</div>

									<div class="col-md-4  ">
										<div class="counter_block-padding">
											<span class="statsHeader">22%</span>
											<p>of our teachers are examiners at ICSE and ISC board exams</p>
										</div>
									</div>

									<div class="col-md-4  ">
										<div class="counter_block-padding">
											<span class="statsHeader">56</span>
											<p>teachers have been with us from the very beginning</p>
										</div>
									</div>
									
								</div>
							</div>
						</section> -->
							
							<!-- Stats Section -->

							<section class="container " id="<?php echo $sectionID[$i]; ?>">
								
								<!-- Upper navbar -->
								<div class="sticky-navbar">
									<span class="hidden-xs hidden-sm"><i>click to ></i></span>
									<ul class="sticky-nav">
										<?php 
												foreach($text as $row):
										?>							
													<li class="sticky-navbar-list <?php if($i == $j){ echo 'active';}else{ echo 'hidden-xs hidden-sm'; };  ?>"><a href="#<?php echo $sectionID[$j]; ?>"><?php echo $row['click_to_text'] ;?></a> </li>
										<?php
													$j++;
												endforeach;
												$j = 0;
												$i++;
												
										?>
									</ul>
																	
								</div>
																
						</section>
						<!-- End of heading under upper navbar -->

						<section class="mB__80 mobile__mB-40">
							<span id="educator-section"></span>
							<!-- Heading under navbar -->
							<div class="container ">							
									<div class="row" id="">
										<div class="col-md-8 ">
											<span id="trigger_stickybar-2"></span>
											<h2 class="head-nav sectionHeading"><?php echo CFS()->get('section_2_heading', $post_ID); ?></h2>
										</div>
									</div>
							</div>
							<!-- End of heading under upper navbar -->

						</section>

						<section class="footer__blockRed slickDots__align mobile__mB-120">

							<div class="container no-padding">
								<div class="pos_relative img__slide redBlockCarousel">
											<?php 
													$fullwidth_carousel = CFS()->get( 'carousel_3', $post_ID );
													foreach ( $fullwidth_carousel as $row ):
											?>
													<div><img data-lazy="<?php echo $row['image']; ?>" class="img-responsive" alt=""></div>				
											<?php 
													endforeach;
											?>
								</div>										
							</div>

							<div class="container way__footer  no-padding">
								<div class="way__footer-blockRed educators__wayBlock">
									<div class="way__footer-spacing">
										<div class="row text__slide">

											<?php 
													foreach ( $fullwidth_carousel as $row ):
											?>
													<div>
														<div class="col-md-5">
															<span class="video__section-text font--white"><?php echo $row['carousel_heading']; ?></span>
														</div>
														<div class="col-md-6">
															<div class="redTextBlock">
																	<?php echo $row['carousel_text']; ?>
															</div>
														</div>
													</div>			
											<?php 
													endforeach;
											?>
																				
										</div>
									</div>
								</div>
							</div>
						</section>

						<section>
							
						</section>

						<section class="container " id="<?php echo $sectionID[$i]; ?>">
								
								<!-- Upper navbar -->
								<div class="sticky-navbar">
									<span class="hidden-xs hidden-sm"><i>click to ></i></span>
									<ul class="sticky-nav">
										<?php 
												foreach($text as $row):
										?>							
													<li class="sticky-navbar-list <?php if($i == $j){ echo 'active';}else{ echo 'hidden-xs hidden-sm'; };  ?>"><a href="#<?php echo $sectionID[$j]; ?>"><?php echo $row['click_to_text'] ;?></a> </li>
										<?php
													$j++;
												endforeach;
												$j = 0;
												$i++;
												
										?>
									</ul>
																	
								</div>
																
						</section>
						<!-- End of heading under upper navbar -->
				
						<section class="mB__80 mobile__mB-40">
							<span class="" id="empowered-section"></span>
							<span id="trigger_stickybar-3"></span>
							<div class="container ">
								<!-- Heading under navbar -->
								<div class="row" id="">
									<div class="col-md-8 ">
										<h2 class="head-nav sectionHeading"><?php echo CFS()->get('section_3_heading', $post_ID); ?></h2>
									</div>
								</div>
								<!-- End of heading under upper navbar -->
							</div>
						</section>

						<section >
							<div class="container pos_relative  aim__video-2 no-padding">
								<div class="playIcon__center inView customPlay replayButton mouseHover mobile__squareVideo">
									<video class="video-js vjs-16-9" preload="none" poster= "<?php echo CFS()->get('video_poster_2'  , $post_ID); ?>" data-setup='{ "controls": false, "autoplay": false }' playsinline>
										<source src="<?php echo CFS()->get('video', $post_ID); ?>" type="video/mp4">
									</video>
									<button class="o-play-btn">
										<i class="o-play-btn__icon">
											<div class="o-play-btn__mask"></div>
										</i>
									</button>	
								</div>	
							</div>
						</section>
						<section class="mB__80 mobile__mB-0">
							<div class="container ">
								<div class="row educators__footer-padding">
									<div class="col-md-5 col-md-offset-1">
											<?php echo CFS()->get('column_1_text', $post_ID); ?>
									</div>
									<div class="col-md-5">
										<div class="anchorLink"><?php echo CFS()->get('column_2_text', $post_ID); ?></div>
									</div>
								</div>
							</div>
							
						</section>

						

				

					

					
						
					
				
			<!-- End of Content Section -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>
<script>

//Section Heading Animation
var controller = new ScrollMagic.Controller();

if($(window).width() > 768){
	$('.sectionHeading').each(function(){
		var heading = $(this);
		var heading__tween = new TweenLite.from(heading , 0.6 , { autoAlpha: 0});
		var scene = new ScrollMagic.Scene({
					triggerElement: this,
			triggerHook: 0.7,
			})
			.setTween(heading__tween)
		.addTo(controller)
		// .addIndicators({name: "Header"});
	});
}


//Stats Section Animation

$('.stats').each(function(){
	var stats = $(this).find('.statsHeader');
	var detail = $(this).find('p');
	var statsHead = new TimelineLite();
	var statsInfo = new TimelineLite();
	statsHead
				.staggerFrom( stats , 0.6 , { y: 50 , autoAlpha: 0 } , 0.2);
	statsInfo
				.staggerFrom( detail , 0.6 , { y: 50 , autoAlpha: 0 ,  } , 0.2);

	var scene = new ScrollMagic.Scene({
        triggerElement: this,
		triggerHook: 0.8,
    })
    .setTween(statsInfo)
	.addTo(controller)
	// .addIndicators({name: "Stats"});

	var scene = new ScrollMagic.Scene({
        triggerElement: this,
		triggerHook: 0.8,
    })
    .setTween(statsHead)
	.addTo(controller)
	// .addIndicators({name: "Stats"});
});

if($(window).width() > 768 && isSafari == false){
	TweenLite.set(CSSRulePlugin.getRule(".educators__angle::after"), {css:{transformPerspective:100, transformStyle:"preserve-3d"}});

	var angle = new TweenLite.from(CSSRulePlugin.getRule(".educators__angle::after"), 0.8, {cssRule: { borderRight: 140 },ease: Power2.easeInOut}, 0);

	var scene = new ScrollMagic.Scene({
		triggerElement: '.educators__angle',
		triggerHook: 0.1,
	})
	.setTween(angle)
	.addTo(controller);
	// .addIndicators({name: "Angle"});
}


//Red BLock Parallax
if($(window).width() > 768 ){

	$('.parallaxBlock').each(function(){

		var secondElement = $(this).find('.parallaxAnimate');
		var parallax__1 = new TimelineLite();

		parallax__1
			.fromTo(secondElement , 1.5 ,{y: 100} , {y: -20});

		var scene = new ScrollMagic.Scene({
			triggerElement: this,
			triggerHook: 0.6,
			duration: 1400
		})
		.setTween(parallax__1)
		.addTo(controller);
		// .addIndicators({name: "Block"});
	});
}




//-------------Animation Of Hero Section In Main Pages--------------

var status = 'playing';
$hero__text = $('#hero__text');
$hero__shape = $('#hero__shape');
$hero__video = $('#aim__background-video');

	var tl = new TimelineMax({
		// options
		onComplete: scrollbtn__animation
	});

	tl
		.to($hero__shape , 1 , {x:-100 , ease: Power0.easeNone})
		.to($hero__text , 1.8 , {x: -800 , autoAlpha:0 , ease: Power0.easeNone} , 0)
		.to($hero__video , 3 , {left:0 , top: 0 , transform: 'rotateY(0deg) rotateX(0deg)' , width: '100%' , height:'100%' ,ease: Power0.easeNone} , 0);
		

	var controller = new ScrollMagic.Controller();

	var pinning = new ScrollMagic.Scene({triggerElement: '#trigger__hero' , triggerHook: 0 , duration: 1900 });
	var scene = new ScrollMagic.Scene({triggerElement: '#trigger__hero' , triggerHook: 0 , duration: 1500 })
				// .addIndicators()
				.setTween(tl)
				.addTo(controller);
				
		pinning.setPin('#pinning' , {pushFollowers: true})
			// .addIndicators()
			.addTo(controller)
			.on('end' , function(){
				// $('#site-navigation').toggleClass('fixed__header');
			});
		
		var myvid = $('#aim__background-video')[0];
		var playTrigger = new ScrollMagic.Scene({triggerElement: '#trigger__hero' , triggerHook: 0 , duration: 150 , offset: 2200});
		playTrigger//.addIndicators()
				   .addTo(controller)
				   .on('start' , function(e){
							if(e.scrollDirection == 'REVERSE'){
								if(status == 'playing'){	
									$('#unmute__btn').addClass("showMuteBtn");
									btnAnimate();
									myvid.play();
								}
								$('#aim__background-video').addClass('pointer-all');								
							}
						})
					.on('end', function(){
						$('#unmute__btn').removeClass("showMuteBtn");
						$('#aim__background-video').removeClass('pointer-all');
						myvid.pause();
					});

			var pauseTrigger = new ScrollMagic.Scene({triggerElement: '#trigger__hero' , triggerHook: 0 , duration: 150 , offset: 800});
			pauseTrigger//.addIndicators()
				.addTo(controller)
				.on('start' , function(e){
					if (e.scrollDirection == "REVERSE"){
						$('#unmute__btn').removeClass("showMuteBtn");
						btnAnimate();
						$('#aim__background-video').removeClass('pointer-all');
						myvid.pause();
					} 					
				});
				// .on('end', function(){
				// 	if(status == 'playing'){
				// 			$('#unmute__btn').addClass("showMuteBtn");
				// 			$('#aim__background-video').addClass('pointer-all');
				// 			myvid.play();
				// 	}
				// });


			function scrollbtn__animation(){
				// var timeline = new TimelineMax({});
			
				// timeline
				// 		.fromTo("#unmute__btn" , 0.3, {autoAlpha:0} , {autoAlpha: 1})
				// 		.fromTo("#icon__mute" ,0.1,  {autoAlpha: 0} ,{autoAlpha: 1} , "-=0.1");
				if(status == 'playing'){
					$('#unmute__btn').addClass("showMuteBtn");
					$('#aim__background-video').addClass('pointer-all');
					myvid.play();
				}
				else{
					$('#aim__background-video').addClass('pointer-all');
					showbtnAnimate();
					// $('#aim__background-video').parent().find('.o-play-btn').removeClass("opacity_hidden o-play-btn--playing");
					myvid.pause();
				}
				
				// timeline.pause(true);
				
			}

			function btnAnimate() {
				$('#aim__background-video').parent().find('.o-play-btn').addClass('opacity_hidden').delay(500).queue(function(next){
					$(this).addClass("o-play-btn--playing");
					next();
				});
			}

			function showbtnAnimate() {
				$('#aim__background-video').parent().find('.o-play-btn').removeClass('o-play-btn--playing').delay(500).queue(function(next){
					$(this).removeClass("opacity_hidden");
					next();
				});
			}

			

var video_src = $('#aim__background-video');
if($(window).width() >= 480 ){
	video_src.html('<source src="<?php echo CFS()->get('hero_desktop_video', $post_ID); ?>" type="video/mp4" >');
}
else{
	video_src.html('<source src="<?php echo CFS()->get('hero_mobile_video', $post_ID); ?>" type="video/mp4" >');
}

</script>