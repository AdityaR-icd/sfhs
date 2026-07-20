<?php 
/* Template Name: Our Aim*/
?>
<?php
get_header();

// Getting Post ID for CPT UI

$my_posts = get_page_by_path('our-aim', OBJECT, 'templates');
$post_ID = $my_posts->ID;


// Loop for Click To option

$text = CFS()->get( 'click_to' , $post_ID );
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

	<span id="trigger__hero"></span>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		

	<!---	====================================================
					Background Image and Background Video Section
				==================================================== --->
			<div id="pinning">

				<div class="hero__background-image">
					
					<div class="aim__hero-shape" id="hero__shape">
					
					</div>
					
					<span class="hero__text-container" id="hero__text">
										
						<h2 class="head-nav"><?php echo get_the_title(); ?></h2>
						<span class="aim__hero-text"><?php echo CFS()->get('hero_text'  , $post_ID); ?></span>
				
					</span>

					<div class="playIcon__center"> 
						<video loop preload="none" poster= "<?php echo CFS()->get('video_poster'  , $post_ID); ?>"  class="" muted id="aim__background-video" playsinline>
							
						</video>
						<button class="o-play-btn o-play-btn--playing opacity_hidden">
							<i class="o-play-btn__icon">
								<div class="o-play-btn__mask"></div>
							</i>
						</button>
					</div>
					
					

					<div id="unmute__btn" class="">
						<span >
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

						</span>
						
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
													$stats_loop = CFS()->get( 'stats_loop'  , $post_ID);
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
						<?php 
										
						?>

						

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
							<div class="container  ">
								<!-- Heading under navbar -->
								<div class="row" id="">
										<div class="col-md-7 ">
											<h2 class="head-nav sectionHeading"><?php echo CFS()->get('section_1_heading'  , $post_ID);?></h2>
										</div>
								</div>
							</div>
						</section>

					

						<section class="mB__200 mobile__mB-40">
							<div class="container  blockParallax">
								<!-- Main Content 1 -->
								
								<div class="row pos_relative ">
										
										<div class="col-md-8 no-padding">
											<div class="img__slide custom__slick-dots firstElement">
												<?php 
													$carousel_section_1 = CFS()->get( 'section_1_carousel'  , $post_ID );
													foreach ( $carousel_section_1 as $row ):
												?>
														<div><img data-lazy="<?php echo $row['carousel_image_1'] ?>" class="img-responsive" alt=""></div>
												<?php 
													endforeach;
												?>
											</div>
										</div>

										<div class="col-md-5 aim__shapeBlock  secondElement no-padding">
												<div class="aim__shapeM-1 red-block-background">
													<span class="shape__bL-angle hidden-xs hidden-sm"></span>
													<span class="shape__top-angle hidden-xs hidden-sm"></span>
													<span class="shape__bR-angle hidden-xs hidden-sm"></span> 
													<div class="text__slide">
														<?php 
															
																foreach ( $carousel_section_1 as $row ):
														?>

													
																	<div class="aim__block-padding font--white redTextBlock">
																			<?php echo $row['carousel_text_1'] ?>
																	</div>
														<?php 
															endforeach;
														?>


													</div>
												</div>
										</div>
								</div>
							
								<!-- End of main Content 1 -->
							</div>
						</section>

						<section class="mB__160 mobile__mB-80">
								<!-- Content 2 -->
							<div class="container  parallax">

								<div class="row pos_relative">

										<div class="col-md-5">
											<div class="font--red our__aim-contentF">
												<?php echo CFS()->get('educator_text'  , $post_ID); ?>
											</div>
										</div>
									
										<div class="col-md-7 no-padding">
											<div class="padding_bottom-65 ouraim__angle-1 image__absolute firstElement mobile__mB-10">
													<img src="<?php echo CFS()->get('image_1'  , $post_ID); ?>" class="img-responsive" alt="">
											</div>	
										</div>
										<div class="info__block infoBlockM visible-xs visible-sm">
												<?php 
													$about_loop = CFS()->get( 'about'  , $post_ID);
													// foreach ( $about_loop as $row ) :
												?>
														<span class="name__text"><?php echo $about_loop[0]['name']; ?></span>
														<span class="desg__text"><i><?php echo $about_loop[0]['designation']; ?></i></span>
												<?php 
													// endforeach;
												?>
											
										</div>
								</div>

								<!-- End of Content 2 -->

								<div class="row">
									<div class="col-md-7 no-padding">
										<div class="our__aim-imgP secondElement">
											<img src="<?php echo CFS()->get('image_2'  , $post_ID); ?>" class="img-responsive" alt="">
										</div>
									</div>
									<div class="col-md-5">
										<div class="padding__top">
											
											<div class="info__block hidden-xs hidden-sm">
												<?php 
													// $about_loop = CFS()->get( 'about'  , $post_ID);
													foreach ( $about_loop as $row ) :
												?>
														<span class="name__text"><?php echo $row['name']; ?></span>
														<span class="desg__text"><i><?php echo $row['designation']; ?></i></span>
												<?php 
													endforeach;
												?>
											
											</div>

											<div class="info__block visible-xs visible-sm">
													<?php 
														// $about_loop = CFS()->get( 'about'  , $post_ID);
														// foreach ( $about_loop as $row ) :
													?>
															<span class="name__text"><?php echo $about_loop[1]['name']; ?></span>
															<span class="desg__text"><i><?php echo $about_loop[1]['designation']; ?></i></span>
													<?php 
														// endforeach;
													?>
												
											</div>

												<?php 
													$links = CFS()->get( 'links'  , $post_ID);
													foreach ( $links as $row ) :
												?>
														
														<div class="multiLink"><?php echo $row['add_link']; ?></div>
														
												
												<?php 
													endforeach;
												?>
										
										
										</div>
									</div>
								</div>
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
							
							<!-- Heading under navbar -->
								<div class="container  ">						
									<div class="row" id="">
										<div class="col-md-7 ">
											<span id="trigger_stickybar-2"></span>
											<h2 class="head-nav sectionHeading"><?php echo CFS()->get('section_2_heading'  , $post_ID); ?></h2>
										</div>
									</div>
								</div>
							<!-- End of heading under upper navbar -->
							
							<!-- End of heading under upper navbar -->

						</section>

						<section class="mB__140">
							<!-- Content 3 -->
							<div class="container">
								<div class="row pos_relative img-position pos_relative">
									<div class="col-md-12 no-padding">
										<div class="last-margin img__slide">

												<?php 
													$carousel_section_2 = CFS()->get( 'section_2_carousel'  , $post_ID);
													foreach ( $carousel_section_2 as $row ):
												?>
														<div><img data-lazy="<?php echo $row['carousel_image_2']; ?>" class="img-responsive" alt=""></div>
												<?php 
													endforeach;		
												?>
										</div>	
									</div>
									<div class="col-md-8  our__aim-carouselShape text__slide">
												<?php 
													foreach ( $carousel_section_2 as $row ):
												?>
														<div>
															<span class="carousel__text"><?php echo $row['carousel_text_2']; ?></span>
														</div>
												<?php 
													endforeach;	
												?>
									</div>
								</div>
							</div>
						</section>

						<section class="mB__160 mobile__mB-80">
							<div class="container  ">
								<div class="row pos_relative">
										<div class="col-md-3 ">
											<div class="padding__right"><?php echo CFS()->get('column_1_text_1'  , $post_ID); ?></div>
										</div>
										<div class="col-md-5 col-md-offset-1  paragraph_right-padding">
												<?php echo CFS()->get('column_2_text_1'  , $post_ID); ?>									
										</div>
										<div class="col-md-3">
											<?php 
													$links = CFS()->get( 'column_3_links_1'  , $post_ID);
													foreach ( $links as $row ):
											?>
												<div class="multiLink"><?php echo $row['link'];?></div>
											<?php 
													endforeach;
											?>
										
			
										</div>
								</div>
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
										
						
						<section class="mB__80 mobile__mB-40">
							<div class="container  ">
								<span id="trigger_stickybar-3"></span>
								<!-- Heading under navbar -->
								<div class="row" id="">
									<div class="col-md-7 col-xs-10">
										
										
										<h2 class="head-nav sectionHeading"><?php echo CFS()->get('section_3_heading'  , $post_ID); ?></h2>
									</div>
								</div>
								<!-- End of heading under upper navbar -->
							</div>
						</section>

						<section class="mB__80 mobile__mB-40">
							<div class="container">
								<div class="row pos_relative">
										<div class="col-md-3 ">
											<?php echo CFS()->get('column_1_text_2' , $post_ID); ?>
										</div>
										<div class="col-md-5 col-md-offset-1 paragraph_right-padding">
												<?php echo CFS()->get('column_2_text_2' , $post_ID); ?>
										</div>
										<div class="col-md-3 ">
											<?php 
													$links = CFS()->get( 'columns_3_links_2'  , $post_ID);
													foreach ( $links as $row ):
											?>
												<div class="multiLink">
														<?php echo $row['link']; ?>														
												</div>
											<?php 
													endforeach;
											?>
										</div>
								</div>
							</div>

						</section>


						<section class="mB__160 mobile__mB-80">

							<div class="container mobile__scroll blockAnimation" id="featureBlock">
									
									<?php 
											$featuresLoop = CFS()->get( 'features_loop'  , $post_ID);
											$number = count($featuresLoop);
											$count = ceil(($number)/3);
											// for($row = 0 ; $row < $count ; $row++){
											
									?>

										<div class="row flex__box featuresFlexbox ">

									<?php
												for($curr = 0 ; $curr < $number ; $curr++ ){
														

														if ($curr%2 == 0 ) :
									?>
											
														<div class="col-md-4 ">
															<div class=" feature__section-padding">
																<div class="feature__section">
																	<span class="feature__heading font--red">	<?php echo $featuresLoop[$curr]['feature_heading']; ?>	</span>
																	<span class="feature__description"><?php echo $featuresLoop[$curr]['feature_description']; ?></span>
																</div>
															</div>
														</div>
															
														
															
									
									
									<?php
														else : 
																if($curr == 1):
																		$classBlock = 'featureSection__red1';
																		

																elseif($curr == 3):
																		$classBlock = 'featureSection__red2';
																
																elseif($curr == 5):
																		$classBlock = 'featureSection__red3';
																	
																elseif($curr == 7):
																		$classBlock = 'featureSection__red4';
																else:
																		$classBlock = 'featureSection__red1';
																endif;
									?>				
														<div class="col-md-4 ">
															<div class="feature__section-padding <?php echo $classBlock; ?>">

																<span class="feature__leftTriangle"></span>
																<span class="feature__topTriangle"></span>
																<span class="feature__rightTriangle"></span>
																<span class="feature__bottomTriangle"></span>
						
																<div class="feature__section bgcolor__red">
																	<span class="feature__heading font--white"><?php echo $featuresLoop[$curr]['feature_heading']; ?></span>
																	<span class="feature__description font--white"><?php echo $featuresLoop[$curr]['feature_description']; ?></span>
																</div>
															</div>
														</div>
															
									<?php
														endif;

															
															
													}
									?>

									</div>
																
							</div>
						</section>

						<section class="container" id="<?php echo $sectionID[$i]; ?>">
								
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

						<section class="mB__80 mobile__mB-40">
							
							<!-- Heading under navbar -->
							<div class="container  ">
									<div class="row" id="">
										<div class="col-md-8 ">
											<span id="trigger_stickybar-2"></span>
											<h2 class="head-nav sectionHeading"><?php echo CFS()->get('section_4_heading' , $post_ID); ?></h2>
										</div>
									</div>

							</div>							
									
							
							<!-- End of heading under upper navbar -->
							
							<!-- End of heading under upper navbar -->

						</section>

					<section>

						<div class="container-fluid d-no-padding pos_relative no-padding">

							<!-- <div class="container pos_relative  aim__video-2 no-padding"> -->
								<div class="playIcon__center replayButton inView customPlay mouseHover mobile__squareVideo">
									<video class="video-js vjs-16-9" preload="none" poster= "<?php echo CFS()->get('video_poster_2'  , $post_ID); ?>" data-setup='{ "controls": false, "autoplay": false }' playsinline>
										<source src="<?php echo CFS()->get('section_4_video', $post_ID); ?>" type="video/mp4">
									</video>
									<button class="o-play-btn">
										<i class="o-play-btn__icon">
											<div class="o-play-btn__mask"></div>
										</i>
									</button>	
								</div>	
							<!-- </div> -->									
						</div>
						
						<!--- end of footer image and text --->
						</div>
						<div class="our__aim-footer pos_relative">
							<div class="container">
								<div class="our__aim-content">
									<div class="row">

										<div class="col-md-10">
											<!-- <div class="footer-formatting"> -->
												<span class="font--red aim__Heading-P"><?php echo CFS()->get('section_4_desc'  , $post_ID); ?></span>
											
												<div class="row">
													<div class="col-md-6  aim__padding">
															<?php echo CFS()->get('section_4_para_1'  , $post_ID); ?>
													</div>
													<div class="col-md-6  aim__padding">
														<div class="anchorLink">
														<?php echo CFS()->get('section_4_para_2'  , $post_ID); ?>

														</div>
													</div>
												</div>
											<!-- </div>	 -->
										</div>

										<div class="col-md-2 stats">
											<?php 
												$stats = CFS()->get( 'section_4_stats'  , $post_ID);
												foreach ( $stats as $row ):
											?>
												<span  class="statsHeader"><?php echo $row['stats_number_2']; ?></span>
												<p><?php echo $row['stats_description_2']; ?></p>
											<?php 
												endforeach;
											?>
										</div>
									</div>
								</div>
								
							
							
							</div> <!--New Container-->
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

if($(window).width() <= 768 ){
	$('.featuresFlexbox').slick({
			slidesToShow: 2.2,
			slidesToScroll: 1,
			autoplay: false,
			arrows: false,
			infinite: false,
			draggable: true,
			dots: false,
			pauseOnHover: false,
			responsive: [{
			breakpoint: 768,
			settings: {
				slidesToShow: 2
			}
		}, {
			breakpoint: 520,
			settings: {
				slidesToShow: 1.3
			}
		}, {
			breakpoint: 340,
			settings: {
				slidesToShow: 1.1
			}
		}]
	});
}



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
				.staggerFrom( detail , 0.6 , { y: 50 , autoAlpha: 0  } , 0.2);

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

if($(window).width() > 768){
	//Parallax Animations
	$('.parallax').each(function(){

		var secondElement = $(this).find('.secondElement');
		var link = $(this).find('.anchor_font');
				
		if (isSafari){
				console.log("Safari doesn't support CSS Rule Plugin");
		} else {
				TweenLite.set(CSSRulePlugin.getRule(".ouraim__angle-1:after"), {css:{transformPerspective:100, transformStyle:"preserve-3d"}});
				var angle = new TweenLite.from(CSSRulePlugin.getRule(".ouraim__angle-1:after"), 0.8, {cssRule: { rotationY:-18 , rotationZ: 8 }, rotationZ: .01, force3D: !0,ease: Power2.easeInOut}, 0);
		}
		var parallax__1 = new TimelineLite();
		
		parallax__1
			.fromTo(secondElement , 0.5 ,{y: 100} , {y: -20, rotationZ: .01, force3D: !0});

		var scene = new ScrollMagic.Scene({
			triggerElement: this,
			triggerHook: 0.1,
			
		})
		.setTween(angle)
		.addTo(controller);
		// .addIndicators({name: "Angle"});

		var scene = new ScrollMagic.Scene({
				triggerElement: this,
				triggerHook: 0.8,
				duration: 1200
		})
		.setTween(parallax__1)
		.addTo(controller);
		// .addIndicators({name: "Block"});

	});
}
if($(window).width() > 768 ){
	$('.blockParallax').each(function(){
		var secondElement = $(this).find('.secondElement');
		var parallax__1 = new TimelineLite();
		parallax__1
			.fromTo(secondElement , 0.5 ,{y: 100} , {y: -20, rotationZ: .01, force3D: !0});
		var scene = new ScrollMagic.Scene({
			triggerElement: this,
			triggerHook: 0.8,
			duration: 1200
		})
		.setTween(parallax__1)
		.addTo(controller);
		// .addIndicators({name: "Block"});
	});
}

//Features Section Animation

var featureSection1 = new TweenLite.from(CSSRulePlugin.getRule(".featureSection__red1") , 1, {cssRule: { rotationX: -3 },ease: Power2.easeInOut}, 0);
var featureSection2 = new TweenLite.from(CSSRulePlugin.getRule(".featureSection__red2") , 1, {cssRule: { rotationY: 2 },ease: Power2.easeInOut}, 0);
var featureSection3 = new TweenLite.from(CSSRulePlugin.getRule(".featureSection__red3") , 1, {cssRule: { rotationY: -2 },ease: Power2.easeInOut}, 0);
var featureSection4 = new TweenLite.from(CSSRulePlugin.getRule(".featureSection__red4") , 1, {cssRule: {  rotationX: 3 },ease: Power2.easeInOut}, 0);

var scene = new ScrollMagic.Scene({
	triggerElement: '#featureBlock',
	triggerHook: 0.5,
	
})
.setTween(featureSection1)
.addTo(controller)
// .addIndicators({name: "Features Section"});
var scene = new ScrollMagic.Scene({
	triggerElement: '#featureBlock',
	triggerHook: 0.5,
	
})
.setTween(featureSection2)
.addTo(controller)
// .addIndicators({name: "Features Section"});
var scene = new ScrollMagic.Scene({
	triggerElement: '#featureBlock',
	triggerHook: 0.5,
	
})
.setTween(featureSection3)
.addTo(controller)
// .addIndicators({name: "Features Section"});
var scene = new ScrollMagic.Scene({
	triggerElement: '#featureBlock',
	triggerHook: 0.5,
	
})
.setTween(featureSection4)
.addTo(controller)
// .addIndicators({name: "Features Section"});



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
	video_src.html('<source src="<?php echo CFS()->get('hero_desktop_video'  , $post_ID); ?>" class="hidden-xs" type="video/mp4" >');
}
else{
	video_src.html('<source src="<?php echo CFS()->get('hero_mobile_video'  , $post_ID); ?>" class="hidden-sm hidden-lg hidden-md" type="video/mp4" >');
}
</script>
