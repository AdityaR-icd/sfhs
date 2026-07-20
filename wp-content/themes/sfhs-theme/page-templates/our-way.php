<?php 
/* Template Name: Our Way  */
?>

<?php
get_header();

// Getting Post ID for CPT UI

$my_posts = get_page_by_path('our-way', OBJECT, 'templates');
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

									<!-- <video loop preload="meta" muted id="aim__background-video">

									</video> -->

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
							<section class="mB__120 stats mB__50" id="stats">
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
					<section class="mB__80 mobile__mB-40">
						<div class="container">
							<!-- Heading under navbar -->
							<div class="row " id="">
									<div class="col-md-7 ">
										<h2 class="head-nav sectionHeading"><?php echo CFS()->get('section_1_heading', $post_ID); ?></h2>
									</div>
							</div>
						</div>
					</section>
					

						<section class="mB__180 mobile__mB-80">
							<div class="container parallaxBlock">
								<!-- Carousel -->
								<div class="row pos_relative">
									<div class="col-md-8 no-padding">
										<div class="fade_img  way__mB">
											<?php 
													$image = CFS()->get( 'carousel_1' , $post_ID);
													foreach ( $image as $row ):
											?>
													<div><img data-lazy="<?php echo $row['image']; ?>" class="img-responsive" alt=""></div>				
											<?php 
													endforeach;
											?>
											</div>
									</div>
									
									<div class="col-md-5 wayBlock__1 parallaxAnimate">
											<div class="way-block-1-padding font--white redTextBlock">
													<?php echo CFS()->get('carousel_1_text', $post_ID);?>
											</div>
									</div>
								</div>
								<!-- End of Carousel -->
							</div>
						</section>

						<section class="mB__160 mobile__mB-40">
							<div class="container ">	
								<!-- Main Content 1 -->
								<div class="row">
									<div class="col-md-8 col-md-push-4 fade_img way__triangle--1 no-padding">
											<?php 
													$image = CFS()->get( 'carousel_2' , $post_ID);
													foreach ( $image as $row ):
											?>
													<div><img data-lazy="<?php echo $row['image']; ?>" class="img-responsive" alt=""></div>				
											<?php 
													endforeach;
											?>
									</div>

									<div class="col-md-4 col-md-pull-8">
										<!-- <h3>community matters</h3> -->
										<div class="content_padding-60 font--red wayBlock__two anchorLink">
												<?php echo CFS()->get('carousel_2_text', $post_ID);?>
										</div>
										
									</div>
								</div>
								<!-- End of main Content 1 -->
							</div>
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
							<span id="educator-section"></span>
							<!-- Heading under navbar -->
							<div class="container ">							
									<div class="row" id="">
										<div class="col-md-7 ">
											<span id="trigger_stickybar-2"></span>
											<h2 class="head-nav sectionHeading"><?php echo CFS()->get( 'section_2_heading' , $post_ID); ?></h2>
										</div>
									</div>
							</div>
							<!-- End of heading under upper navbar -->

						</section>


						<section class="mB__120 mobile__mB-80">
							<div class="container ">
								<div class="row">
									<div class="col-md-3 ">
											<?php echo CFS()->get( 'column_1_text' , $post_ID); ?>
									</div>
									<div class="col-md-4 ">
										<?php echo CFS()->get( 'column_2_text' , $post_ID); ?>
									</div>
									<div class="col-md-4  " style="padding-left:20px">
										<?php echo CFS()->get( 'column_3_text', $post_ID ); ?>
									</div>
								</div>
							</div>
						</section>


						<section class="mB__160 mobile__mB-120">
							<div class="container ">
								<!-- Content 6 -->
								<div class="row pos_relative parallaxBlock">
									<div class="col-md-8 no-padding">
										<div class="fade_img way__formatting">
												<?php 
													$image = CFS()->get( 'carousel_3' , $post_ID);
													foreach ( $image as $row ):
												?>
														<div><img data-lazy="<?php echo $row['image']; ?>" class="img-responsive" alt=""></div>				
												<?php 
														endforeach;
												?>
										</div>
									</div>
									<div class="col-md-5 way__block-angle parallaxAnimate">
										<div class="wayBlock__2-padding font--white redTextBlock">
												<?php echo CFS()->get( 'carousel_3_text', $post_ID ); ?>
										</div>
									</div>
								</div>
								<!-- End of Content 6 -->
							</div>
						</section>


						<section class="mB__180 mobile__mB-60">
						
							<div class="container ">
							<!-- Content 5 -->

								<div class="row pos_relative">
									<div class="col-md-8 col-md-push-4 no-padding">
										<div class="way__slope-triangle-4 fade_img">
												<?php 
													$image = CFS()->get( 'carousel_4' , $post_ID);
													foreach ( $image as $row ):
												?>
														<div><img data-lazy="<?php echo $row['image']; ?>" class="img-responsive" alt=""></div>				
												<?php
														endforeach;
												?>
										</div>
									</div>

									<div class="col-md-4 col-md-pull-8">
										<div class="content-formatting content_padding-38 font--red anchorLink">
												<?php echo CFS()->get( 'carousel_4_text' , $post_ID); ?>
												<!-- <h3 class="padding_right-64">stretching and interest</h3>
												<p>
													<span class="boldText">From class 5 to 8</span> the goal in the background can be distilled to stretching students, and helping them develop interests that will become the basis for later differentiation.
												</p>
												<p>
													The core subjects English, Hindi, Mathematics, Science and Social Sciences are coupled with electives in the study of a third language (French or Punjabi) and several enrichment clubs and activity to choose from over the year.
												</p>
												
												<a href="#" class="font--red anchor_font margin_top-35">extra curricular activities</a> -->
										</div>					
									</div>
									
								</div>

							<!-- End of Content 5 -->
							</div>
						</section>

						<section class="mB__180 mobile__mB-80">
							<div class="container parallaxBlock">
								<div class="row pos_relative">
									<div class="col-md-8 no-padding">
										<div class="last-margin fade_img">
												<?php 
													$image = CFS()->get( 'carousel_5' , $post_ID);
													foreach ( $image as $row ):
												?>
														<div><img data-lazy="<?php echo $row['image']; ?>" class="img-responsive" alt=""></div>				
												<?php
														endforeach;
												?>
										</div>
											

									</div>
									<div class="col-md-5 red-block-2 parallaxAnimate no-padding">
										<div class="red-block-margin-2 red-block-background">
											<span class="bottom_left-triangle-2 hidden-xs hidden-sm"></span>
											<span class="top_right-triangle hidden-xs hidden-sm"></span>
											<span class="bottom_right-triangle-2 hidden-xs hidden-sm"></span> 
											<div class="red_block-2-padding font--white redTextBlock">
													<?php echo CFS()->get( 'carousel_5_text' , $post_ID); ?>
											</div>
										</div>
									</div>
								</div> <!-- End of Content 6 -->
							</div>
						</section>

						

						<section class="mB__180 mobile__mB-60">
							
							<!-- Content 4 -->
							<div class="container ">
								<div class="row pos_relative">
									<div class="col-md-8 mobile__mB-40 col-md-push-4 no-padding">
										<div class="fade_img">
												<?php 
													$image = CFS()->get( 'carousel_6' , $post_ID);
													foreach ( $image as $row ):
												?>
														<div><img data-lazy="<?php echo $row['image']; ?>" class="img-responsive" alt=""></div>				
												<?php
														endforeach;
												?>										
										</div>
									</div>

									<div class="col-md-4 col-md-pull-8">
										<div class="padding_right-64 font--red anchorLink">
											<?php echo CFS()->get( 'carousel_6_text', $post_ID ); ?>
										</div>
									</div>
									
								</div>
							</div>

							<!-- End of Content 4 -->

						</section>
						
						<section class="mB__160 mobile__mB-60">
							<div class="container parallaxBlock">
								<!-- Content 6 -->
								<div class="row pos_relative ">
									<div class="col-md-8 no-padding">
										<div class="fade_img">
												<?php 
													$image = CFS()->get( 'carousel_7' , $post_ID);
													foreach ( $image as $row ):
												?>
														<div><img data-lazy="<?php echo $row['image']; ?>" class="img-responsive" alt=""></div>				
												<?php 
														endforeach;
												?>
										</div>
									</div>
									<div class="col-md-5 way__block-angle wayRedBlock__4 parallaxAnimate">
										<div class="wayBlock__2-padding font--white redTextBlock">
												<?php echo CFS()->get( 'carousel_7_text' , $post_ID); ?>
										</div>
									</div>
								</div>
								<!-- End of Content 6 -->
							</div>
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
						
						
						<section class="mB__80 mobile__mB-60">
							<span class="" id="empowered-section"></span>
							<span id="trigger_stickybar-3"></span>
							<div class="container ">
								<!-- Heading under navbar -->
								<div class="row" id="">
									<div class="col-md-7 ">
										<h2 class="head-nav sectionHeading"><?php echo CFS()->get( 'section_3_heading' , $post_ID); ?></h2>
									</div>
								</div>
								<!-- End of heading under upper navbar -->
							</div>
						</section>

										
				

					<section class="way__slickDots">

						<div class="container no-padding">
							<div class="pos_relative  img__slide redBlockCarousel">
												<?php 
													$carousel = CFS()->get( 'carousel_8' , $post_ID);
													foreach ( $carousel as $row ):
												?>
														<div><img data-lazy="<?php echo $row['image']; ?>" class="img-responsive" alt=""></div>				
												<?php
														endforeach;
												?>	
							</div>
						<!--- end of footer image and text --->
						</div>

						
					</section>

					<section class="footer__blockRed">
						<div class="container no-padding way__footer">
							<div class="way__footer-blockRed">
								<div class="way__footer-spacing">
									<div class="row text__slide">
										<?php 
											foreach ( $carousel as $row ):
										?>
											<div>
												<div class="col-md-4">
													<span class="video__section-text font--white"><?php echo $row['title']; ?></span>
												</div>
												<div class="col-md-7">
													<div class="redTextBlock">
															<?php echo $row['text']; ?>
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


$('.play-btn').click( function(){
	var src = $(this).find('video')[0];
	var btn = $(this);
	btn.toggleClass('o-play-btn--playing');

	if(videojs(src).paused() == true){
		videojs(src).play();
	}

	else{
		
		videojs(src).pause();
	}

	videojs(src).on('ended' , function(){
		btn.toggleClass('o-play-btn--playing');
	});
});

if($(window).width() > 768 && isSafari == false ){
		//Angle Animations


		TweenLite.set(CSSRulePlugin.getRule(".way__triangle--1:after"), {css:{transformPerspective:100, transformStyle:"preserve-3d"}});

		var angle = new TweenLite.from(CSSRulePlugin.getRule(".way__triangle--1:after"), 0.8, {cssRule: { borderRight: 150  }, rotationZ: .01, force3D: !0,ease: Power2.easeInOut}, 0);

		var scene = new ScrollMagic.Scene({
			triggerElement: '.way__triangle--1',
			triggerHook: 0.1,
		})
		.setTween(angle)
		.addTo(controller);
		// .addIndicators({name: "Angle"});





		TweenLite.set(CSSRulePlugin.getRule(".way__slope-triangle-4::after"), {css:{transformPerspective:100, transformStyle:"preserve-3d"}});

		var angle = new TweenLite.from(CSSRulePlugin.getRule(".way__slope-triangle-4::after"), 0.8, {cssRule: { rotationY:-18 , rotationZ: 8  },ease: Power2.easeInOut}, 0);

		var scene = new ScrollMagic.Scene({
			triggerElement: '.way__slope-triangle-4',
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



// Wiping Animation on Block Text


// var tl = new TimelineMax()
// 	//increase size of clipPath to reveal text
//   .staggerFrom(".wayBlock__two", 2.5, { height:'0', ease:Linear.easeNone } , 0);


// 	var scene = new ScrollMagic.Scene({
// 			triggerElement: '.wayBlock__two',
// 			triggerHook: 0.7,
//     })
//   .setTween(tl)
// 	.addTo(controller)
// 	.addIndicators({name: "TextWiping"});



</script>
