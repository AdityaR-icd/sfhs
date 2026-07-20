<?php 
/* Template Name: Home */
?>

<?php
get_header();

$my_posts = get_page_by_path('home', OBJECT, 'templates');

$post_ID = $my_posts->ID;

?>
	<script>
		scrollTopValue = 400;
	</script>
	
	
	<div id="primary" class="content-area">
		<main id="main home__animation" class="site-main">

		<?php
		/*if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php //single_post_title(); ?></h1>
				</header>
				<?php
			endif;*/

			/* Start the Loop */
		/*	while ( have_posts() ) :
				the_post();*/

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				/*get_template_part( 'template-parts/content', get_post_type() );*/

		/*	endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;*/
		?>

		

		<div class="hero__background-image homeHero__section">

			<!-- <div class="home__heroSection--text">
				<span class=""><?php echo CFS()->get('hero_text' , $post_ID);?></span>
			</div> -->

			<div class="heroVideo__container playIcon__center hideBtn inView">
				<video id="homeVideo" preload="none" class="video-js heroVideoSrc" poster="<?php echo CFS()->get('hero_video_thumb' , $post_ID);?>"  playsinline>

				</video>

				<button aria-label="button" role="button" class="o-play-btn">
					<i class="o-play-btn__icon">
						<div class="o-play-btn__mask"></div>
					</i>
				</button>
								
				<!-- <div id="unmute__btn" class="muteHidden">
					<a href="#" class="unmute__btn font--white js-tilt" id="anchor--white" data-tilt>
						<div id="icon__mute">
							<span class="unmuteBtn">
								<img src="<?php bloginfo("template_directory")?>/assets/resources/icons/mute-icon.svg" id="tap__icon" alt="">
								<span id="mute__text" class="hidden-xs hidden-sm"> CLICK TO UNMUTE</span>
							</span>
							<span class="muteBtn">
								<img src="<?php bloginfo("template_directory")?>/assets/resources/icons/unmute-icon.svg" id="tap__icon" alt="">
								<span id="mute__text" class="hidden-xs hidden-sm"> CLICK TO MUTE</span>
							</span>
							
						</div>
					</a>
				</div> -->
				
				
				
				<div class="skipButton opacity_hidden">
					<a href="#" class="skipBtn" data-tilt>Skip</a>
				</div>
				
				
			</div>
			<a href="#" class="textReplay replayBtn opacity_hidden">
				<span class="hidden-xs">REPLAY MOVIE</span>
				<span class="visible-xs skipBg"></span>
			</a>
			

			<div id="home__animation" class="opacity_hidden">
											
			</div>  <!--- home animation --->
			<div class="slideDots">
				<ul class="slick-dots" role="tablist" aria-label="dots">
					<li class="dotsSelect" role="presentation">
						<button id="dot-01" aria-label="button" role="button" type="button" role="tab">1</button>
					</li>
					<li class="dotsSelect" role="presentation">
						<button id="dot-02" aria-label="button" role="button" type="button" role="tab">2</button>
					</li>
					<li class="dotsSelect" role="presentation">
						<button id="dot-03" aria-label="button" role="button" type="button" role="tab">3</button>
					</li>
					<li class="dotsSelect" role="presentation">
						<button  id="dot-04" aria-label="button" role="button" type="button" role="tab">4</button>
					</li>
					<li class="dotsSelect" role="presentation">
						<button id="dot-05" aria-label="button" role="button" type="button" role="tab">5</button>
					</li>
				</ul>
			</div>

			<?php $heroMobile__animation = CFS()->get( 'hero_text_loop'  , $post_ID); ?>
			<div class="heroMobile__animate opacity_hidden" id="heroMobileAnimate">
				<div class="text__slide visible-xs heroMobile__text">
					<?php 
						foreach ( $heroMobile__animation as $row ):
					?>
							<div>
								<span class=""><?php echo $row['hero_text']; ?></span>
							</div>
					<?php 
						endforeach;	
					?>
				</div>

				<div class="no-padding visible-xs">
					<div class="img__slide">
						<?php 
							foreach ( $heroMobile__animation as $row ):
						?>
								<div><img data-lazy="<?php echo $row['add_image']; ?>" class="img-responsive" alt=""></div>
						<?php 
							endforeach;		
						?>
					</div>	
				</div>
			</div>
			
			

			<div class="homeScroll__btn">
				<div class="container ">
					<!-- Scroll Button-->
					<div class="alignCenter scroll__btn-margin">
						<a href="#scrollTo" class="scroll__btn" id="">
							<span>scroll</span>
							<span class="scroll__arrow bounce"></span>
						</a>
					</div>
					<!-- End of Scroll Button -->
				</div>
			</div>
	
		</div>  <!--- end of background image and text --->
		
		

		<div id="tickerTrigger">

		<?php 
			$testimonials_loop = CFS()->get( 'testimonials_loop' ,$post_ID );
			foreach ( $testimonials_loop as $row ):
		?>
				<div class="fullPage__section">
					<div class="container  homeCarousel" id="scrollTo">
						<div class="row">
							<div class="col-md-6 ">
								<h2 class="head-nav hero__header"><?php echo $row['testimonial_heading']; ?></h2>
								<div class="anchorLink">
									<?php echo $row['testimonial_description']; ?>
								</div>
							</div>

							<div class="col-md-5  col-md-offset-1">
								<div class="achiever_section-formatting ">
									<div class="pos_relative">
										<div class="play-btn first homeTestimonials">
											<div class="playIcon__bottomLeft customPlay inView">
												<video class="video-js static_video" preload="none"  data-setup='{ "controls": false, "autoplay": false  }' poster="<?php echo $row['testimonial_thumb']; ?>" playsinline>
													<source src="<?php echo $row['testimonial_video']; ?>" type="video/mp4">
												</video>
												<span class="homeVideo__caption"><?php echo $row['testimonial_video_subtitle']; ?></span>

												<button aria-label="button" role="button" class="o-play-btn">
													<i class="o-play-btn__icon">
														<div class="o-play-btn__mask"></div>
													</i>
												</button>
												<div class="homeVideo__info">
													<span class="homeCarousel__name"><?php echo $row['name']; ?></span>
													<span class="homeCarousel__class"><?php echo $row['about']; ?></span>
												</div>
											</div>
											
											
										</div>

									</div>
									
								</div>
							</div>						
						</div>

					</div>
				</div>
		<?php 
			endforeach;
		?>
		<?php 
			// $announcements = get_page_by_path('announcements', OBJECT, 'announcement');
			// var_dump($announcements);
		?>
			
				<section class="mB__120 home-ibdp">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
							<a href="http://strawberryfieldshighschool.com/ib-dp-programme/" class="no-arrow"><h2 class="head-nav hero__header">OUR IB DP</h2></a>
							</div>
						</div>
					</div>
					<!-- Video Section -->
					<div class="container">
						<div class="row">
							<div class="col-md-12 no-padding">
								<div class="pos_relative img-position playIcon__left inView customPlay mobile__squareVideo" >
									<video class="video-js vjs-16-9" preload="none" data-setup='{ "controls": false, "autoplay": false }' poster="<?php echo CFS()->get('video_thumb', $post_ID); ?>" playsinline>
										<source src="<?php echo CFS()->get('video', $post_ID); ?>" type="video/mp4">
									</video> 
																
									<div class="img-caption font--white" id="overlay">
										<button class="o-play-btn">
											<i class="o-play-btn__icon">
												<div class="o-play-btn__mask"></div>
											</i>
										</button>
										<p><?php echo CFS()->get('video_caption', $post_ID); ?></p>
									</div>	
								</div>
							</div>
						</div>
					</div>
					<div class="templatePage">
						<div class="container">
							<a href="http://strawberryfieldshighschool.com/ib-dp-programme/" class="learn-more">Learn More</a>
						</div>
					</div>
					<!-- Video Section End-->

					
					<!-- <div class="templatePage">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<a href="http://strawberryfieldshighschool.com/ib-dp-programme/" class="no-arrow">
										<div class="header__img__cont top-right">

											<img src="http://strawberryfieldshighschool.com/wp-content/uploads/2019/03/placements.jpg" class="img-responsive hidden-xs" alt="">
											<img src="http://strawberryfieldshighschool.com/wp-content/uploads/2019/03/ib-lead.jpg" class="m-fullwidth img-responsive hidden-sm hidden-lg hidden-md">
												
											<span class="triangle__top--white hidden-xs hidden-sm"></span>
											<span class="triangle__right--white hidden-xs hidden-sm"></span>
											<span class="triangle__bottom--white hidden-xs hidden-sm"></span>
											<span class="triangle__left--white hidden-xs hidden-sm"></span>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="container">
							<a href="http://strawberryfieldshighschool.com/ib-dp-programme/" class="learn-more">Learn More</a>
						</div>
					</div> -->
				</section>
				



				<div class="tickerPadding">
					<div class="container ">
						<div class="row">
							<div class="col-md-12 ">
								<span class="imgTicker__head">our affiliations</span>
							</div>
						</div>
					</div>
					

					<div class="imgTicker__container mB__40">
						<div id="imgTicker">

							<?php 
								$tickerImage = CFS()->get( 'image_loop' , $post_ID );
								foreach ( $tickerImage as $row ):
							?>
									<div class="slide"><a href="<?php echo $row['image_link']; ?>" target="_blank" rel="noopener"><img src="<?php echo $row['image']; ?>" alt=""></a></div>
							<?php 
								endforeach;
							?>						
						</div>
					</div>
				</div>
				


		</div>  

		<?php
			$relargs = array(
				'post_type' =>  array('announcement') ,
				'orderby' => 'publish_date', 
				'order' => 'ASC',
				'posts_per_page' => -1 , 
				'numberposts' => -1
			);

			$relposts = get_posts( $relargs );
			$i = 1; 
			//$num = -1; 
			if ($relposts) { 
		?>
		<section>
			<div class="tickerContainer hidden-xs hidden-sm hidden-md"  id="tickerToggle">
				<div class="tickerClose"><span class="tickerClose__icon"></span></div>
				<ul id="textTicker">
					<?php 
						//$num = count($relposts);
						foreach( $relposts as $current_post ) {
					?>
							<li data-update="item<?php echo $i; ?>" class="tickerText"><?php  echo CFS()->get('ticker_text' , $current_post->ID ); //echo apply_filters( 'post_title', $current_post->post_title ); ?></li>
					<?php 
							$i++;
						}
					?>		
				</ul>
			</div>
		</section>

		<?php 
			$hide = true;
		} else {
			$hide = false;
		}?>

		

		

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
	get_sidebar();
	get_footer();
?>
<script>


$(document).ready( function() { // makes sure the whole site is loaded 


	<?php 
		if($hide){
	?>
	var ticker = $('.tickerContainer');
	var backToTop = $('.backtoTopAnimate');
	var tickerClose = $('.tickerClose__icon');
	//Ticker Open and close
	var controller = new ScrollMagic.Controller();
	new ScrollMagic.Scene({
		triggerElement: '#tickerTrigger',
		offset: 0,
		duration:100,
	})
	.on('start' , function(){
		ticker.removeClass('tickerShow');
		tickerClose.removeClass('ticker__rotate');
		backToTop.removeClass('homeBacktotop');
	})
	.on('end' , function(){
		ticker.addClass('tickerShow');
		tickerClose.addClass('ticker__rotate');
		backToTop.addClass('homeBacktotop');
	})
	
	// .addIndicators({name:name})
	.addTo(controller);

	new ScrollMagic.Scene({
		triggerElement: '#imgTicker',
		offset: -400,
		duration:50,
		triggerHook: 0.8
	})
	.on('start' , function(){
		ticker.addClass('tickerShow');
		tickerClose.addClass('ticker__rotate');
		backToTop.addClass('homeBacktotop');
	})
	.on('end' , function(){
		ticker.removeClass('tickerShow');
		tickerClose.removeClass('ticker__rotate');
		backToTop.removeClass('homeBacktotop');
	})
	// .addIndicators({name:name})
	.addTo(controller);
	<?php 
		}
	?>


	
//Text Ticker 
$('#textTicker').webTicker({
	height: '70px',
	duplicate: true, 
	rssfrequency: 0, 
	startEmpty: false, 
	hoverpause: true, 
	transition: "linear",
	speed: 40,
	<?php // if($num<=2 && $num!=-1){?>
		// duplicate:false, 
		// startEmpty: true,
	<?php // }?>
});

<?php //if($num<=2 && $num!=-1){?>
	// $("#textTicker").webTicker('stop');
<?php // }?>



$('.tickerClose').click(function(){
	$('.tickerContainer').toggleClass('tickerShow');
	$('.tickerClose__icon').toggleClass('ticker__rotate');
	backToTop.toggleClass('homeBacktotop');
});

$('#imgTicker').slick({
	slidesToShow: 5,
	slidesToScroll: 1,
	autoplay: true,
	autoplaySpeed: 2000,
	arrows: false,
	dots: false,
	
		pauseOnHover: false,
		responsive: [

	{

		breakpoint: 1024,
		settings: {
			slidesToShow: 3
		}
	}, 
	{
		breakpoint: 520,
		settings: {
			slidesToShow: 2,
			infinite: true
		}
	}, 

	{
		breakpoint: 340,
		settings: {
			slidesToShow: 1.1,
			infinite: true
		}
	}]
});
	


	// Home Animation Lottie
	
	$sfhsHome = {"v":"5.3.4","fr":30,"ip":135,"op":691,"w":1440,"h":820,"nm":"SFHS static box animation 2","ddd":0,"assets":[{"id":"image_0","w":3314,"h":2195,"u":"images/","p":"img_0.jpg","e":0},{"id":"image_1","w":3376,"h":2308,"u":"images/","p":"img_1.jpg","e":0},{"id":"image_2","w":3437,"h":2277,"u":"images/","p":"img_2.jpg","e":0},{"id":"image_3","w":3696,"h":2448,"u":"images/","p":"img_3.jpg","e":0},{"id":"image_4","w":5120,"h":2880,"u":"images/","p":"img_4.jpg","e":0},{"id":"image_5","w":2786,"h":1845,"u":"images/","p":"img_5.jpg","e":0}],"fonts":{"list":[{"fName":"WorkSans-Bold","fFamily":"Work Sans","fStyle":"Bold","ascent":71.1990356445312},{"fName":"PlayfairDisplay-BoldItalic","fFamily":"Playfair Display","fStyle":"Bold Italic","ascent":80.8998169377446}]},"layers":[{"ddd":0,"ind":1,"ty":5,"nm":"society","parent":6,"sr":1,"ks":{"o":{"a":1,"k":[{"i":{"x":[0.5],"y":[1]},"o":{"x":[0.5],"y":[0]},"n":["0p5_1_0p5_0"],"t":605,"s":[0],"e":[100]},{"i":{"x":[0.5],"y":[1]},"o":{"x":[0.167],"y":[0]},"n":["0p5_1_0p167_0"],"t":615,"s":[100],"e":[100]},{"i":{"x":[0.833],"y":[1]},"o":{"x":[0.167],"y":[0]},"n":["0p833_1_0p167_0"],"t":690,"s":[100],"e":[0]},{"t":700}],"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":0,"k":[350.992,86.347,0],"ix":2},"a":{"a":0,"k":[109.537,-19.552,0],"ix":1},"s":{"a":0,"k":[100,100,100],"ix":6}},"ao":0,"t":{"d":{"k":[{"s":{"s":48,"f":"PlayfairDisplay-BoldItalic","t":"society","j":0,"tr":0,"lh":57.6,"ls":0,"fc":[1,1,1]},"t":0}]},"p":{},"m":{"g":1,"a":{"a":0,"k":[0,0],"ix":2}},"a":[]},"ip":564,"op":3115,"st":414,"bm":0},{"ddd":0,"ind":2,"ty":5,"nm":"environment","parent":6,"sr":1,"ks":{"o":{"a":1,"k":[{"i":{"x":[0.5],"y":[1]},"o":{"x":[0.5],"y":[0]},"n":["0p5_1_0p5_0"],"t":510,"s":[0],"e":[100]},{"i":{"x":[0.5],"y":[1]},"o":{"x":[0.167],"y":[0]},"n":["0p5_1_0p167_0"],"t":520,"s":[100],"e":[100]},{"i":{"x":[0.833],"y":[1]},"o":{"x":[0.167],"y":[0]},"n":["0p833_1_0p167_0"],"t":595,"s":[100],"e":[0]},{"t":605}],"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":0,"k":[350.992,86.347,0],"ix":2},"a":{"a":0,"k":[109.537,-19.552,0],"ix":1},"s":{"a":0,"k":[100,100,100],"ix":6}},"ao":0,"t":{"d":{"k":[{"s":{"s":48,"f":"PlayfairDisplay-BoldItalic","t":"environment","j":0,"tr":0,"lh":57.6,"ls":0,"fc":[1,1,1]},"t":0}]},"p":{},"m":{"g":1,"a":{"a":0,"k":[0,0],"ix":2}},"a":[]},"ip":463,"op":3014,"st":313,"bm":0},{"ddd":0,"ind":3,"ty":5,"nm":"achievements","parent":6,"sr":1,"ks":{"o":{"a":1,"k":[{"i":{"x":[0.5],"y":[1]},"o":{"x":[0.5],"y":[0]},"n":["0p5_1_0p5_0"],"t":415,"s":[0],"e":[100]},{"i":{"x":[0.5],"y":[1]},"o":{"x":[0.167],"y":[0]},"n":["0p5_1_0p167_0"],"t":425,"s":[100],"e":[100]},{"i":{"x":[0.833],"y":[1]},"o":{"x":[0.167],"y":[0]},"n":["0p833_1_0p167_0"],"t":500,"s":[100],"e":[0]},{"t":510}],"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":0,"k":[350.992,86.347,0],"ix":2},"a":{"a":0,"k":[109.537,-19.552,0],"ix":1},"s":{"a":0,"k":[100,100,100],"ix":6}},"ao":0,"t":{"d":{"k":[{"s":{"s":48,"f":"PlayfairDisplay-BoldItalic","t":"achievements","j":0,"tr":0,"lh":57.6,"ls":0,"fc":[1,1,1]},"t":0}]},"p":{},"m":{"g":1,"a":{"a":0,"k":[0,0],"ix":2}},"a":[]},"ip":374,"op":2925,"st":224,"bm":0},{"ddd":0,"ind":4,"ty":5,"nm":"the future","parent":6,"sr":1,"ks":{"o":{"a":1,"k":[{"i":{"x":[0.5],"y":[1]},"o":{"x":[0.5],"y":[0]},"n":["0p5_1_0p5_0"],"t":320,"s":[0],"e":[100]},{"i":{"x":[0.833],"y":[1]},"o":{"x":[0.167],"y":[0]},"n":["0p833_1_0p167_0"],"t":330,"s":[100],"e":[100]},{"i":{"x":[0.833],"y":[1]},"o":{"x":[0.167],"y":[0]},"n":["0p833_1_0p167_0"],"t":405,"s":[100],"e":[0]},{"t":415}],"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":0,"k":[350.992,86.347,0],"ix":2},"a":{"a":0,"k":[109.537,-19.552,0],"ix":1},"s":{"a":0,"k":[100,100,100],"ix":6}},"ao":0,"t":{"d":{"k":[{"s":{"s":48,"f":"PlayfairDisplay-BoldItalic","t":"the future","j":0,"tr":0,"lh":57.6,"ls":0,"fc":[1,1,1]},"t":0}]},"p":{},"m":{"g":1,"a":{"a":0,"k":[0,0],"ix":2}},"a":[]},"ip":300,"op":2851,"st":150,"bm":0},{"ddd":0,"ind":5,"ty":5,"nm":"education","parent":6,"sr":1,"ks":{"o":{"a":1,"k":[{"i":{"x":[0.6],"y":[1]},"o":{"x":[0.4],"y":[0]},"n":["0p6_1_0p4_0"],"t":243,"s":[0],"e":[100]},{"i":{"x":[0.833],"y":[1]},"o":{"x":[0.4],"y":[0]},"n":["0p833_1_0p4_0"],"t":251,"s":[100],"e":[100]},{"i":{"x":[0.833],"y":[1]},"o":{"x":[0.167],"y":[0]},"n":["0p833_1_0p167_0"],"t":310,"s":[100],"e":[0]},{"t":320}],"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":0,"k":[350.992,86.347,0],"ix":2},"a":{"a":0,"k":[109.537,-19.552,0],"ix":1},"s":{"a":0,"k":[100,100,100],"ix":6}},"ao":0,"t":{"d":{"k":[{"s":{"s":48,"f":"PlayfairDisplay-BoldItalic","t":"education","j":0,"tr":0,"lh":57.6,"ls":0,"fc":[1,1,1]},"t":0}]},"p":{},"m":{"g":1,"a":{"a":0,"k":[0,0],"ix":2}},"a":[]},"ip":157,"op":2858,"st":157,"bm":0},{"ddd":0,"ind":6,"ty":5,"nm":"1_With five big steps","sr":1,"ks":{"o":{"a":1,"k":[{"i":{"x":[0.6],"y":[1]},"o":{"x":[0.4],"y":[0]},"n":["0p6_1_0p4_0"],"t":243,"s":[0],"e":[100]},{"t":251}],"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":1,"k":[{"i":{"x":0.6,"y":1},"o":{"x":0.4,"y":0},"n":"0p6_1_0p4_0","t":243,"s":[350,530,0],"e":[350,540,0],"to":[0,1.66666662693024,0],"ti":[0,-1.66666662693024,0]},{"t":251}],"ix":2},"a":{"a":0,"k":[212.897,42.125,0],"ix":1},"s":{"a":0,"k":[79,79,100],"ix":6}},"ao":0,"t":{"d":{"k":[{"s":{"s":52,"f":"WorkSans-Bold","t":"With five big steps\rwe are looking\rafresh at ","j":0,"tr":-10,"lh":54,"ls":0,"fc":[0,0,0]},"t":0}]},"p":{},"m":{"g":1,"a":{"a":0,"k":[0,0],"ix":2}},"a":[]},"ip":157,"op":2858,"st":157,"bm":0},{"ddd":0,"ind":7,"ty":5,"nm":"Welcome to \rStrawberry Fields\rHigh School 4","parent":24,"sr":1,"ks":{"o":{"a":1,"k":[{"i":{"x":[0.565],"y":[1]},"o":{"x":[0.18],"y":[0]},"n":["0p565_1_0p18_0"],"t":135,"s":[0],"e":[100]},{"i":{"x":[0.841],"y":[1]},"o":{"x":[0.385],"y":[0]},"n":["0p841_1_0p385_0"],"t":150,"s":[100],"e":[100]},{"i":{"x":[0.8],"y":[1]},"o":{"x":[0.2],"y":[0]},"n":["0p8_1_0p2_0"],"t":205,"s":[100],"e":[0]},{"t":210}],"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":0,"k":[-342.116,199.43,0],"ix":2},"a":{"a":0,"k":[212.897,42.125,0],"ix":1},"s":{"a":0,"k":[100,100,100],"ix":6}},"ao":0,"t":{"d":{"k":[{"s":{"s":52,"f":"WorkSans-Bold","t":"Welcome to \r","j":0,"tr":-40,"lh":62.4,"ls":0,"fc":[0,0,0]},"t":0}]},"p":{},"m":{"g":1,"a":{"a":0,"k":[0,0],"ix":2}},"a":[]},"ip":112,"op":240,"st":0,"bm":0},{"ddd":0,"ind":8,"ty":5,"nm":"Welcome to \rStrawberry Fields\rHigh School 2","parent":24,"sr":1,"ks":{"o":{"a":1,"k":[{"i":{"x":[0.565],"y":[1]},"o":{"x":[0.18],"y":[0]},"n":["0p565_1_0p18_0"],"t":135,"s":[0],"e":[100]},{"i":{"x":[0.841],"y":[1]},"o":{"x":[0.385],"y":[0]},"n":["0p841_1_0p385_0"],"t":150,"s":[100],"e":[100]},{"i":{"x":[0.8],"y":[1]},"o":{"x":[0.2],"y":[0]},"n":["0p8_1_0p2_0"],"t":205,"s":[100],"e":[0]},{"t":210}],"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":0,"k":[-342.116,252.43,0],"ix":2},"a":{"a":0,"k":[212.897,42.125,0],"ix":1},"s":{"a":0,"k":[100,100,100],"ix":6}},"ao":0,"t":{"d":{"k":[{"s":{"s":52,"f":"WorkSans-Bold","t":"Strawberry Fields\rHigh School","j":0,"tr":-40,"lh":53,"ls":0,"fc":[1,1,1]},"t":0}]},"p":{},"m":{"g":1,"a":{"a":0,"k":[0,0],"ix":2}},"a":[]},"ip":112,"op":240,"st":0,"bm":0},{"ddd":0,"ind":9,"ty":4,"nm":"Left flap","parent":20,"sr":1,"ks":{"o":{"a":0,"k":100,"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":0,"k":[-718.027,410,0],"ix":2},"a":{"a":0,"k":[720,410,0],"ix":1},"s":{"a":0,"k":[37.123,100,100],"ix":6}},"ao":0,"shapes":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":1,"k":[{"i":{"x":0.4,"y":1},"o":{"x":0.6,"y":0},"n":"0p4_1_0p6_0","t":210,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-410],[720,410],[-720,410],[-720,-410]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[1464.448,-388.764],[1464.448,410],[-53.915,431.236],[63.63,-431.236]],"c":true}]},{"i":{"x":0.4,"y":1},"o":{"x":0.167,"y":0},"n":"0p4_1_0p167_0","t":240,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[1464.448,-388.764],[1464.448,410],[-53.915,431.236],[63.63,-431.236]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[1464.448,-388.764],[1464.448,410],[-53.915,431.236],[63.63,-431.236]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":305,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[1464.448,-388.764],[1464.448,410],[-53.915,431.236],[63.63,-431.236]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[1464.448,-410],[1484.039,378.146],[63.63,460.436],[-112.687,-431.236]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":335,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[1464.448,-410],[1484.039,378.146],[63.63,460.436],[-112.687,-431.236]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[1464.448,-410],[1484.039,378.146],[63.63,460.436],[-112.687,-431.236]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":400,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[1464.448,-410],[1484.039,378.146],[63.63,460.436],[-112.687,-431.236]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[1547.709,-411.327],[1821.98,403.364],[-151.868,436.546],[-68.608,-448.491]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":430,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[1547.709,-411.327],[1821.98,403.364],[-151.868,436.546],[-68.608,-448.491]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[1547.709,-411.327],[1821.98,403.364],[-151.868,436.546],[-68.608,-448.491]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":495,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[1547.709,-411.327],[1821.98,403.364],[-151.868,436.546],[-68.608,-448.491]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[1709.333,-398.054],[1684.844,417.964],[-122.482,452.473],[132.197,-445.836]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":525,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[1709.333,-398.054],[1684.844,417.964],[-122.482,452.473],[132.197,-445.836]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[1709.333,-398.054],[1684.844,417.964],[-122.482,452.473],[132.197,-445.836]],"c":true}]},{"i":{"x":0.4,"y":1},"o":{"x":0.167,"y":0},"n":"0p4_1_0p167_0","t":590,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[1709.333,-398.054],[1684.844,417.964],[-122.482,452.473],[132.197,-445.836]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[1464.448,-388.764],[1464.448,410],[44.039,447.164],[-34.324,-431.236]],"c":true}]},{"t":620}],"ix":2},"nm":"Path 1","mn":"ADBE Vector Shape - Group","hd":false},{"ty":"st","c":{"a":0,"k":[1,1,1,1],"ix":3},"o":{"a":0,"k":100,"ix":4},"w":{"a":0,"k":380,"ix":5},"lc":1,"lj":1,"ml":4,"ml2":{"a":0,"k":4,"ix":8},"nm":"Stroke 1","mn":"ADBE Vector Graphic - Stroke","hd":true},{"ty":"fl","c":{"a":0,"k":[0.81568627451,0.007843137255,0.105882352941,1],"ix":4},"o":{"a":0,"k":100,"ix":5},"r":1,"nm":"Fill 1","mn":"ADBE Vector Graphic - Fill","hd":false}],"ip":200,"op":2701,"st":0,"bm":0},{"ddd":0,"ind":10,"ty":4,"nm":"Red Solid 7","td":1,"sr":1,"ks":{"o":{"a":0,"k":100,"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":1,"k":[{"i":{"x":0.4,"y":1},"o":{"x":0.6,"y":0},"n":"0p4_1_0p6_0","t":200,"s":[914.4,410,0],"e":[854.4,410,0],"to":[-10.0000038146973,0,0],"ti":[10.0000038146973,0,0]},{"t":240}],"ix":2},"a":{"a":0,"k":[0,0,0],"ix":1},"s":{"a":1,"k":[{"i":{"x":[0.4,0.4,0.4],"y":[1,1,1]},"o":{"x":[0.6,0.6,0.6],"y":[0,0,0]},"n":["0p4_1_0p6_0","0p4_1_0p6_0","0p4_1_0p6_0"],"t":200,"s":[73,100,100],"e":[55,75.342,100]},{"t":240}],"ix":6}},"ao":0,"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":1,"k":[{"i":{"x":0.4,"y":1},"o":{"x":0.6,"y":0},"n":"0p4_1_0p6_0","t":210,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-410],[720,410],[-720,410],[-720,-410]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}]},{"i":{"x":0.4,"y":1},"o":{"x":0.167,"y":0},"n":"0p4_1_0p167_0","t":240,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":305,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":335,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":400,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":430,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":495,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":525,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}]},{"i":{"x":0.4,"y":1},"o":{"x":0.167,"y":0},"n":"0p4_1_0p167_0","t":590,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}]},{"t":620}],"ix":2},"nm":"Path 1","mn":"ADBE Vector Shape - Group","hd":false},{"ty":"st","c":{"a":0,"k":[1,1,1,1],"ix":3},"o":{"a":0,"k":100,"ix":4},"w":{"a":0,"k":380,"ix":5},"lc":1,"lj":1,"ml":4,"ml2":{"a":0,"k":4,"ix":8},"nm":"Stroke 1","mn":"ADBE Vector Graphic - Stroke","hd":true},{"ty":"fl","c":{"a":0,"k":[0.738740988339,0.009630000358,0.098114993525,1],"ix":4},"o":{"a":0,"k":100,"ix":5},"r":1,"nm":"Fill 1","mn":"ADBE Vector Graphic - Fill","hd":false},{"ty":"tr","p":{"a":0,"k":[0,0],"ix":2},"a":{"a":0,"k":[0,0],"ix":1},"s":{"a":0,"k":[100,100],"ix":3},"r":{"a":0,"k":0,"ix":6},"o":{"a":0,"k":100,"ix":7},"sk":{"a":0,"k":0,"ix":4},"sa":{"a":0,"k":0,"ix":5},"nm":"Transform"}],"nm":"Rectangle 1","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}],"ip":0,"op":2701,"st":0,"bm":0},{"ddd":0,"ind":11,"ty":2,"nm":"Society_girl with braces.jpg","cl":"jpg","tt":1,"refId":"image_0","sr":1,"ks":{"o":{"a":1,"k":[{"i":{"x":[0.7],"y":[1]},"o":{"x":[0.3],"y":[0]},"n":["0p7_1_0p3_0"],"t":600,"s":[0],"e":[100]},{"t":610}],"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":0,"k":[1020,416,0],"ix":2},"a":{"a":0,"k":[1657,1097.5,0],"ix":1},"s":{"a":0,"k":[32,32,100],"ix":6}},"ao":0,"ip":0,"op":2701,"st":0,"bm":0},{"ddd":0,"ind":12,"ty":4,"nm":"Red Solid 6","td":1,"sr":1,"ks":{"o":{"a":0,"k":100,"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":1,"k":[{"i":{"x":0.4,"y":1},"o":{"x":0.6,"y":0},"n":"0p4_1_0p6_0","t":200,"s":[914.4,410,0],"e":[854.4,410,0],"to":[-10.0000038146973,0,0],"ti":[10.0000038146973,0,0]},{"t":240}],"ix":2},"a":{"a":0,"k":[0,0,0],"ix":1},"s":{"a":1,"k":[{"i":{"x":[0.4,0.4,0.4],"y":[1,1,1]},"o":{"x":[0.6,0.6,0.6],"y":[0,0,0]},"n":["0p4_1_0p6_0","0p4_1_0p6_0","0p4_1_0p6_0"],"t":200,"s":[73,100,100],"e":[55,75.342,100]},{"t":240}],"ix":6}},"ao":0,"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":1,"k":[{"i":{"x":0.4,"y":1},"o":{"x":0.6,"y":0},"n":"0p4_1_0p6_0","t":210,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-410],[720,410],[-720,410],[-720,-410]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}]},{"i":{"x":0.4,"y":1},"o":{"x":0.167,"y":0},"n":"0p4_1_0p167_0","t":240,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":305,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":335,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":400,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":430,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":495,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":525,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}]},{"i":{"x":0.4,"y":1},"o":{"x":0.167,"y":0},"n":"0p4_1_0p167_0","t":590,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}]},{"t":620}],"ix":2},"nm":"Path 1","mn":"ADBE Vector Shape - Group","hd":false},{"ty":"st","c":{"a":0,"k":[1,1,1,1],"ix":3},"o":{"a":0,"k":100,"ix":4},"w":{"a":0,"k":380,"ix":5},"lc":1,"lj":1,"ml":4,"ml2":{"a":0,"k":4,"ix":8},"nm":"Stroke 1","mn":"ADBE Vector Graphic - Stroke","hd":true},{"ty":"fl","c":{"a":0,"k":[0.738740988339,0.009630000358,0.098114993525,1],"ix":4},"o":{"a":0,"k":100,"ix":5},"r":1,"nm":"Fill 1","mn":"ADBE Vector Graphic - Fill","hd":false},{"ty":"tr","p":{"a":0,"k":[0,0],"ix":2},"a":{"a":0,"k":[0,0],"ix":1},"s":{"a":0,"k":[100,100],"ix":3},"r":{"a":0,"k":0,"ix":6},"o":{"a":0,"k":100,"ix":7},"sk":{"a":0,"k":0,"ix":4},"sa":{"a":0,"k":0,"ix":5},"nm":"Transform"}],"nm":"Rectangle 1","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}],"ip":0,"op":2701,"st":0,"bm":0},{"ddd":0,"ind":13,"ty":2,"nm":"Environment_students gardening.jpg","cl":"jpg","tt":1,"refId":"image_1","sr":1,"ks":{"o":{"a":1,"k":[{"i":{"x":[0.7],"y":[1]},"o":{"x":[0.3],"y":[0]},"n":["0p7_1_0p3_0"],"t":505,"s":[0],"e":[100]},{"t":515}],"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":0,"k":[926,426,0],"ix":2},"a":{"a":0,"k":[1688,1154,0],"ix":1},"s":{"a":0,"k":[30,30,100],"ix":6}},"ao":0,"ip":0,"op":2701,"st":0,"bm":0},{"ddd":0,"ind":14,"ty":4,"nm":"Red Solid 5","td":1,"sr":1,"ks":{"o":{"a":0,"k":100,"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":1,"k":[{"i":{"x":0.4,"y":1},"o":{"x":0.6,"y":0},"n":"0p4_1_0p6_0","t":200,"s":[914.4,410,0],"e":[854.4,410,0],"to":[-10.0000038146973,0,0],"ti":[10.0000038146973,0,0]},{"t":240}],"ix":2},"a":{"a":0,"k":[0,0,0],"ix":1},"s":{"a":1,"k":[{"i":{"x":[0.4,0.4,0.4],"y":[1,1,1]},"o":{"x":[0.6,0.6,0.6],"y":[0,0,0]},"n":["0p4_1_0p6_0","0p4_1_0p6_0","0p4_1_0p6_0"],"t":200,"s":[73,100,100],"e":[55,75.342,100]},{"t":240}],"ix":6}},"ao":0,"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":1,"k":[{"i":{"x":0.4,"y":1},"o":{"x":0.6,"y":0},"n":"0p4_1_0p6_0","t":210,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-410],[720,410],[-720,410],[-720,-410]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}]},{"i":{"x":0.4,"y":1},"o":{"x":0.167,"y":0},"n":"0p4_1_0p167_0","t":240,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":305,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":335,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":400,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":430,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":495,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":525,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}]},{"i":{"x":0.4,"y":1},"o":{"x":0.167,"y":0},"n":"0p4_1_0p167_0","t":590,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}]},{"t":620}],"ix":2},"nm":"Path 1","mn":"ADBE Vector Shape - Group","hd":false},{"ty":"st","c":{"a":0,"k":[1,1,1,1],"ix":3},"o":{"a":0,"k":100,"ix":4},"w":{"a":0,"k":380,"ix":5},"lc":1,"lj":1,"ml":4,"ml2":{"a":0,"k":4,"ix":8},"nm":"Stroke 1","mn":"ADBE Vector Graphic - Stroke","hd":true},{"ty":"fl","c":{"a":0,"k":[0.738740988339,0.009630000358,0.098114993525,1],"ix":4},"o":{"a":0,"k":100,"ix":5},"r":1,"nm":"Fill 1","mn":"ADBE Vector Graphic - Fill","hd":false},{"ty":"tr","p":{"a":0,"k":[0,0],"ix":2},"a":{"a":0,"k":[0,0],"ix":1},"s":{"a":0,"k":[100,100],"ix":3},"r":{"a":0,"k":0,"ix":6},"o":{"a":0,"k":100,"ix":7},"sk":{"a":0,"k":0,"ix":4},"sa":{"a":0,"k":0,"ix":5},"nm":"Transform"}],"nm":"Rectangle 1","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}],"ip":0,"op":2701,"st":0,"bm":0},{"ddd":0,"ind":15,"ty":2,"nm":"Achievements_jenga kids.jpg","cl":"jpg","tt":1,"refId":"image_2","sr":1,"ks":{"o":{"a":1,"k":[{"i":{"x":[0.7],"y":[1]},"o":{"x":[0.3],"y":[0]},"n":["0p7_1_0p3_0"],"t":410,"s":[0],"e":[100]},{"t":420}],"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":0,"k":[1040,414,0],"ix":2},"a":{"a":0,"k":[1718.5,1138.5,0],"ix":1},"s":{"a":0,"k":[30,30,100],"ix":6}},"ao":0,"ip":0,"op":2701,"st":0,"bm":0},{"ddd":0,"ind":16,"ty":4,"nm":"Red Solid 4","td":1,"sr":1,"ks":{"o":{"a":0,"k":100,"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":1,"k":[{"i":{"x":0.4,"y":1},"o":{"x":0.6,"y":0},"n":"0p4_1_0p6_0","t":200,"s":[914.4,410,0],"e":[854.4,410,0],"to":[-10.0000038146973,0,0],"ti":[10.0000038146973,0,0]},{"t":240}],"ix":2},"a":{"a":0,"k":[0,0,0],"ix":1},"s":{"a":1,"k":[{"i":{"x":[0.4,0.4,0.4],"y":[1,1,1]},"o":{"x":[0.6,0.6,0.6],"y":[0,0,0]},"n":["0p4_1_0p6_0","0p4_1_0p6_0","0p4_1_0p6_0"],"t":200,"s":[73,100,100],"e":[55,75.342,100]},{"t":240}],"ix":6}},"ao":0,"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":1,"k":[{"i":{"x":0.4,"y":1},"o":{"x":0.6,"y":0},"n":"0p4_1_0p6_0","t":210,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-410],[720,410],[-720,410],[-720,-410]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}]},{"i":{"x":0.4,"y":1},"o":{"x":0.167,"y":0},"n":"0p4_1_0p167_0","t":240,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":305,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":335,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":400,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":430,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":495,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":525,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}]},{"i":{"x":0.4,"y":1},"o":{"x":0.167,"y":0},"n":"0p4_1_0p167_0","t":590,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}]},{"t":620}],"ix":2},"nm":"Path 1","mn":"ADBE Vector Shape - Group","hd":false},{"ty":"st","c":{"a":0,"k":[1,1,1,1],"ix":3},"o":{"a":0,"k":100,"ix":4},"w":{"a":0,"k":380,"ix":5},"lc":1,"lj":1,"ml":4,"ml2":{"a":0,"k":4,"ix":8},"nm":"Stroke 1","mn":"ADBE Vector Graphic - Stroke","hd":true},{"ty":"fl","c":{"a":0,"k":[0.738740988339,0.009630000358,0.098114993525,1],"ix":4},"o":{"a":0,"k":100,"ix":5},"r":1,"nm":"Fill 1","mn":"ADBE Vector Graphic - Fill","hd":false},{"ty":"tr","p":{"a":0,"k":[0,0],"ix":2},"a":{"a":0,"k":[0,0],"ix":1},"s":{"a":0,"k":[100,100],"ix":3},"r":{"a":0,"k":0,"ix":6},"o":{"a":0,"k":100,"ix":7},"sk":{"a":0,"k":0,"ix":4},"sa":{"a":0,"k":0,"ix":5},"nm":"Transform"}],"nm":"Rectangle 1","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}],"ip":0,"op":2701,"st":0,"bm":0},{"ddd":0,"ind":17,"ty":2,"nm":"Future_students with telescope.jpg","cl":"jpg","tt":1,"refId":"image_3","sr":1,"ks":{"o":{"a":1,"k":[{"i":{"x":[0.7],"y":[1]},"o":{"x":[0.3],"y":[0]},"n":["0p7_1_0p3_0"],"t":315,"s":[0],"e":[100]},{"t":325}],"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":0,"k":[976,423,0],"ix":2},"a":{"a":0,"k":[1848,1224,0],"ix":1},"s":{"a":0,"k":[28,28,100],"ix":6}},"ao":0,"ip":0,"op":2701,"st":0,"bm":0},{"ddd":0,"ind":18,"ty":4,"nm":"Red Solid 3","td":1,"sr":1,"ks":{"o":{"a":0,"k":100,"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":1,"k":[{"i":{"x":0.4,"y":1},"o":{"x":0.6,"y":0},"n":"0p4_1_0p6_0","t":200,"s":[914.4,410,0],"e":[854.4,410,0],"to":[-10.0000038146973,0,0],"ti":[10.0000038146973,0,0]},{"t":240}],"ix":2},"a":{"a":0,"k":[0,0,0],"ix":1},"s":{"a":1,"k":[{"i":{"x":[0.4,0.4,0.4],"y":[1,1,1]},"o":{"x":[0.6,0.6,0.6],"y":[0,0,0]},"n":["0p4_1_0p6_0","0p4_1_0p6_0","0p4_1_0p6_0"],"t":200,"s":[73,100,100],"e":[55,75.342,100]},{"t":240}],"ix":6}},"ao":0,"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":1,"k":[{"i":{"x":0.4,"y":1},"o":{"x":0.6,"y":0},"n":"0p4_1_0p6_0","t":210,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-410],[720,410],[-720,410],[-720,-410]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}]},{"i":{"x":0.4,"y":1},"o":{"x":0.167,"y":0},"n":"0p4_1_0p167_0","t":240,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":305,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":335,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":400,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":430,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":495,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":525,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}]},{"i":{"x":0.4,"y":1},"o":{"x":0.167,"y":0},"n":"0p4_1_0p167_0","t":590,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}]},{"t":620}],"ix":2},"nm":"Path 1","mn":"ADBE Vector Shape - Group","hd":false},{"ty":"st","c":{"a":0,"k":[1,1,1,1],"ix":3},"o":{"a":0,"k":100,"ix":4},"w":{"a":0,"k":380,"ix":5},"lc":1,"lj":1,"ml":4,"ml2":{"a":0,"k":4,"ix":8},"nm":"Stroke 1","mn":"ADBE Vector Graphic - Stroke","hd":true},{"ty":"fl","c":{"a":0,"k":[1,1,1,1],"ix":4},"o":{"a":0,"k":100,"ix":5},"r":1,"nm":"Fill 1","mn":"ADBE Vector Graphic - Fill","hd":false},{"ty":"tr","p":{"a":0,"k":[0,0],"ix":2},"a":{"a":0,"k":[0,0],"ix":1},"s":{"a":0,"k":[100,100],"ix":3},"r":{"a":0,"k":0,"ix":6},"o":{"a":0,"k":100,"ix":7},"sk":{"a":0,"k":0,"ix":4},"sa":{"a":0,"k":0,"ix":5},"nm":"Transform"}],"nm":"Rectangle 1","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}],"ip":0,"op":2701,"st":0,"bm":0},{"ddd":0,"ind":19,"ty":2,"nm":"Video end frame","tt":1,"refId":"image_4","sr":1,"ks":{"o":{"a":1,"k":[{"i":{"x":[0.833],"y":[0.833]},"o":{"x":[0.167],"y":[0.167]},"n":["0p833_0p833_0p167_0p167"],"t":135,"s":[0],"e":[100]},{"i":{"x":[0.7],"y":[1]},"o":{"x":[0.167],"y":[0]},"n":["0p7_1_0p167_0"],"t":150,"s":[100],"e":[100]},{"i":{"x":[0.7],"y":[1]},"o":{"x":[0.3],"y":[0]},"n":["0p7_1_0p3_0"],"t":243,"s":[100],"e":[0]},{"t":251}],"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":1,"k":[{"i":{"x":0.833,"y":0.833},"o":{"x":0.167,"y":0.167},"n":"0p833_0p833_0p167_0p167","t":200,"s":[716,403,0],"e":[760,410,0],"to":[7.33333349227905,1.16666662693024,0],"ti":[-7.33333349227905,-1.16666662693024,0]},{"t":230}],"ix":2},"a":{"a":0,"k":[2560,1440,0],"ix":1},"s":{"a":1,"k":[{"i":{"x":[0.428,0.428,0.428],"y":[1,1,1]},"o":{"x":[0.624,0.624,0.624],"y":[0,0,0]},"n":["0p428_1_0p624_0","0p428_1_0p624_0","0p428_1_0p624_0"],"t":200,"s":[29,29,100],"e":[25,25,100]},{"t":230}],"ix":6}},"ao":0,"ip":0,"op":2701,"st":0,"bm":0},{"ddd":0,"ind":20,"ty":4,"nm":"Red Solid 2","td":1,"sr":1,"ks":{"o":{"a":0,"k":100,"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":1,"k":[{"i":{"x":0.4,"y":1},"o":{"x":0.6,"y":0},"n":"0p4_1_0p6_0","t":200,"s":[914.4,410,0],"e":[854.4,410,0],"to":[-10.0000038146973,0,0],"ti":[10.0000038146973,0,0]},{"t":240}],"ix":2},"a":{"a":0,"k":[0,0,0],"ix":1},"s":{"a":1,"k":[{"i":{"x":[0.4,0.4,0.4],"y":[1,1,1]},"o":{"x":[0.6,0.6,0.6],"y":[0,0,0]},"n":["0p4_1_0p6_0","0p4_1_0p6_0","0p4_1_0p6_0"],"t":200,"s":[73,100,100],"e":[55,75.342,100]},{"t":240}],"ix":6}},"ao":0,"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":1,"k":[{"i":{"x":0.4,"y":1},"o":{"x":0.6,"y":0},"n":"0p4_1_0p6_0","t":210,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-410],[720,410],[-720,410],[-720,-410]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}]},{"i":{"x":0.4,"y":1},"o":{"x":0.167,"y":0},"n":"0p4_1_0p167_0","t":240,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":305,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":335,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":400,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[747.272,-411.327],[697.727,473.709],[-444.091,378.146],[-443.636,-410]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":430,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":495,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[741.818,-408.673],[688.636,427.255],[-309.545,403.364],[-414.545,-410.995]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":525,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}]},{"i":{"x":0.4,"y":1},"o":{"x":0.167,"y":0},"n":"0p4_1_0p167_0","t":590,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[723.636,-432.564],[725,452.473],[-360.454,417.964],[-352.727,-398.054]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-441.854],[720,463.091],[-444.091,410],[-443.636,-388.764]],"c":true}]},{"t":620}],"ix":2},"nm":"Path 1","mn":"ADBE Vector Shape - Group","hd":false},{"ty":"st","c":{"a":0,"k":[1,1,1,1],"ix":3},"o":{"a":0,"k":100,"ix":4},"w":{"a":0,"k":380,"ix":5},"lc":1,"lj":1,"ml":4,"ml2":{"a":0,"k":4,"ix":8},"nm":"Stroke 1","mn":"ADBE Vector Graphic - Stroke","hd":true},{"ty":"fl","c":{"a":0,"k":[0.738740988339,0.009630000358,0.098114993525,1],"ix":4},"o":{"a":0,"k":100,"ix":5},"r":1,"nm":"Fill 1","mn":"ADBE Vector Graphic - Fill","hd":false},{"ty":"tr","p":{"a":0,"k":[0,0],"ix":2},"a":{"a":0,"k":[0,0],"ix":1},"s":{"a":0,"k":[100,100],"ix":3},"r":{"a":0,"k":0,"ix":6},"o":{"a":0,"k":100,"ix":7},"sk":{"a":0,"k":0,"ix":4},"sa":{"a":0,"k":0,"ix":5},"nm":"Transform"}],"nm":"Rectangle 1","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}],"ip":0,"op":2701,"st":0,"bm":0},{"ddd":0,"ind":21,"ty":2,"nm":"Education_girl flying plane.jpg","cl":"jpg","tt":1,"refId":"image_5","sr":1,"ks":{"o":{"a":1,"k":[{"i":{"x":[0.7],"y":[1]},"o":{"x":[0.167],"y":[0]},"n":["0p7_1_0p167_0"],"t":230,"s":[7],"e":[100]},{"t":235}],"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":0,"k":[746,410,0],"ix":2},"a":{"a":0,"k":[1393,922.5,0],"ix":1},"s":{"a":1,"k":[{"i":{"x":[0.4,0.4,0.4],"y":[1,1,1]},"o":{"x":[0.6,0.6,0.6],"y":[0,0,0]},"n":["0p4_1_0p6_0","0p4_1_0p6_0","0p4_1_0p6_0"],"t":200,"s":[52,52,100],"e":[42,42,100]},{"t":230}],"ix":6}},"ao":0,"ip":0,"op":2701,"st":0,"bm":0},{"ddd":0,"ind":22,"ty":4,"nm":"Right flap","parent":20,"sr":1,"ks":{"o":{"a":0,"k":100,"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":0,"k":[718.63,410,0],"ix":2},"a":{"a":0,"k":[-720,410,0],"ix":1},"s":{"a":0,"k":[10.959,100,100],"ix":6}},"ao":0,"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":1,"k":[{"i":{"x":0.4,"y":1},"o":{"x":0.6,"y":0},"n":"0p4_1_0p6_0","t":210,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[720,-410],[720,410],[-720,410],[-720,-410]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[-1934.545,-330.363],[-1934.545,489.636],[-720,463.091],[-720,-441.854]],"c":true}]},{"i":{"x":0.4,"y":1},"o":{"x":0.167,"y":0},"n":"0p4_1_0p167_0","t":240,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[-1934.545,-330.363],[-1934.545,489.636],[-720,463.091],[-720,-441.854]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[-1934.545,-330.363],[-1934.545,489.636],[-720,463.091],[-720,-441.854]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":305,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[-1934.545,-330.363],[-1934.545,489.636],[-720,463.091],[-720,-441.854]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[205.682,-394.072],[-292.046,459.109],[-919.091,473.709],[-471.136,-411.327]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":335,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[205.682,-394.072],[-292.046,459.109],[-919.091,473.709],[-471.136,-411.327]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[205.682,-394.072],[-292.046,459.109],[-919.091,473.709],[-471.136,-411.327]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":400,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[205.682,-394.072],[-292.046,459.109],[-919.091,473.709],[-471.136,-411.327]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[139.318,-368.854],[-109.545,461.764],[-1002.045,427.255],[-520.908,-408.673]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":430,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[139.318,-368.854],[-109.545,461.764],[-1002.045,427.255],[-520.908,-408.673]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[139.318,-368.854],[-109.545,461.764],[-1002.045,427.255],[-520.908,-408.673]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":495,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[139.318,-368.854],[-109.545,461.764],[-1002.045,427.255],[-520.908,-408.673]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[-1519.772,-395.4],[-2017.5,504.236],[-670.227,452.473],[-670.226,-432.564]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":525,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[-1519.772,-395.4],[-2017.5,504.236],[-670.227,452.473],[-670.226,-432.564]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[-1519.772,-395.4],[-2017.5,504.236],[-670.227,452.473],[-670.226,-432.564]],"c":true}]},{"i":{"x":0.833,"y":1},"o":{"x":0.167,"y":0},"n":"0p833_1_0p167_0","t":590,"s":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[-1519.772,-395.4],[-2017.5,504.236],[-670.227,452.473],[-670.226,-432.564]],"c":true}],"e":[{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[-43.182,-424.932],[-92.955,448.823],[-715.852,463.423],[-719.999,-442.186]],"c":true}]},{"t":620}],"ix":2},"nm":"Path 1","mn":"ADBE Vector Shape - Group","hd":false},{"ty":"st","c":{"a":0,"k":[1,1,1,1],"ix":3},"o":{"a":0,"k":100,"ix":4},"w":{"a":0,"k":380,"ix":5},"lc":1,"lj":1,"ml":4,"ml2":{"a":0,"k":4,"ix":8},"nm":"Stroke 1","mn":"ADBE Vector Graphic - Stroke","hd":true},{"ty":"fl","c":{"a":0,"k":[0.81568627451,0.007843137255,0.105882352941,1],"ix":4},"o":{"a":0,"k":100,"ix":5},"r":1,"nm":"Fill 1","mn":"ADBE Vector Graphic - Fill","hd":false},{"ty":"tr","p":{"a":0,"k":[0,0],"ix":2},"a":{"a":0,"k":[0,0],"ix":1},"s":{"a":0,"k":[100,100],"ix":3},"r":{"a":0,"k":0,"ix":6},"o":{"a":0,"k":100,"ix":7},"sk":{"a":0,"k":0,"ix":4},"sa":{"a":0,"k":0,"ix":5},"nm":"Transform"}],"nm":"Rectangle 1","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}],"ip":200,"op":2701,"st":0,"bm":0},{"ddd":0,"ind":23,"ty":4,"nm":"Static left red","sr":1,"ks":{"o":{"a":1,"k":[{"i":{"x":[0.833],"y":[0.833]},"o":{"x":[0.167],"y":[0.167]},"n":["0p833_0p833_0p167_0p167"],"t":135,"s":[0],"e":[100]},{"t":150}],"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":0,"k":[0,410,0],"ix":2},"a":{"a":0,"k":[-720,0,0],"ix":1},"s":{"a":0,"k":[27,100,100],"ix":6}},"ao":0,"shapes":[{"ty":"gr","it":[{"ty":"rc","d":1,"s":{"a":0,"k":[1440,820],"ix":2},"p":{"a":0,"k":[0,0],"ix":3},"r":{"a":0,"k":0,"ix":4},"nm":"Rectangle Path 1","mn":"ADBE Vector Shape - Rect","hd":false},{"ty":"st","c":{"a":0,"k":[1,1,1,1],"ix":3},"o":{"a":0,"k":100,"ix":4},"w":{"a":0,"k":0,"ix":5},"lc":1,"lj":1,"ml":4,"ml2":{"a":0,"k":4,"ix":8},"nm":"Stroke 1","mn":"ADBE Vector Graphic - Stroke","hd":true},{"ty":"fl","c":{"a":0,"k":[0.81568627451,0.007843137255,0.105882352941,1],"ix":4},"o":{"a":0,"k":100,"ix":5},"r":1,"nm":"Fill 1","mn":"ADBE Vector Graphic - Fill","hd":false},{"ty":"tr","p":{"a":0,"k":[0,0],"ix":2},"a":{"a":0,"k":[0,0],"ix":1},"s":{"a":0,"k":[100,100],"ix":3},"r":{"a":0,"k":0,"ix":6},"o":{"a":0,"k":100,"ix":7},"sk":{"a":0,"k":0,"ix":4},"sa":{"a":0,"k":0,"ix":5},"nm":"Transform"}],"nm":"Rectangle 1","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}],"ip":0,"op":200,"st":0,"bm":0},{"ddd":0,"ind":24,"ty":3,"nm":"Red Solid 1","sr":1,"ks":{"o":{"a":0,"k":100,"ix":11},"r":{"a":0,"k":0,"ix":10},"p":{"a":0,"k":[720,410,0],"ix":2},"a":{"a":0,"k":[0,0,0],"ix":1},"s":{"a":0,"k":[100,100,100],"ix":6}},"ao":0,"ip":0,"op":200,"st":0,"bm":0}],"markers":[],"chars":[{"ch":"S","size":52,"style":"Bold","w":64.4,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[6.266,0],[4.3,-1.833],[2.233,-3.266],[0,-4.133],[-2.034,-2.666],[-3.7,-1.566],[-5.667,-1.133],[-1.967,-0.966],[0,-1.533],[1.833,-1.033],[3.666,0],[3.266,1.467],[2.6,3.6],[0,0],[-4.667,-1.833],[-7.467,0],[-4.234,1.6],[-2.4,3.067],[0,4.2],[3.9,3.2],[9.133,1.667],[1.966,1.034],[0,1.667],[-1.867,1.2],[-3.467,0],[-2.967,-1.566],[-2.2,-3.333],[0,0],[4.433,1.867]],"o":[[-5.867,0],[-4.3,1.834],[-2.234,3.267],[0,4.134],[2.033,2.667],[3.7,1.567],[4.6,0.867],[1.966,0.967],[0,1.934],[-1.834,1.034],[-4.6,0],[-3.267,-1.466],[0,0],[3.4,3.8],[4.666,1.833],[5.333,0],[4.233,-1.6],[2.4,-3.066],[0,-5.8],[-3.9,-3.2],[-4.734,-0.866],[-1.967,-1.033],[0,-2],[1.866,-1.2],[4.133,0],[2.966,1.567],[0,0],[-3.8,-4.2],[-4.434,-1.866]],"v":[[33.1,-67],[17.85,-64.25],[8.05,-56.6],[4.7,-45.5],[7.75,-35.3],[16.35,-28.95],[30.4,-24.9],[40.25,-22.15],[43.2,-18.4],[40.45,-13.95],[32.2,-12.4],[20.4,-14.6],[11.6,-22.2],[2.8,-10.2],[14.9,-1.75],[33.1,1],[47.45,-1.4],[57.4,-8.4],[61,-19.3],[55.15,-32.8],[35.6,-40.1],[25.55,-42.95],[22.6,-47],[25.4,-51.8],[33.4,-53.6],[44.05,-51.25],[51.8,-43.9],[61.5,-55.1],[49.15,-64.2]],"c":true},"ix":2},"nm":"S","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"S","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"t","size":52,"style":"Bold","w":39.8,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[0,0],[2.733,0],[0,4.467],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[-3.134,-2.533],[-5.934,0],[-2.567,0.7],[-1.667,1.134]],"o":[[-2.067,1.467],[-4.4,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0.066,5.6],[3.133,2.534],[2.6,0],[2.566,-0.7],[0,0]],"v":[[40.7,-13.3],[33.5,-11.1],[26.9,-17.8],[26.9,-37.9],[41.9,-37.9],[41.9,-50],[26.9,-50],[26.9,-65.9],[9.9,-61.2],[9.9,-50],[1.3,-50],[1.3,-37.9],[9.9,-37.9],[9.9,-15],[14.7,-2.8],[28.3,1],[36.05,-0.05],[42.4,-2.8]],"c":true},"ix":2},"nm":"t","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"t","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"r","size":52,"style":"Bold","w":43,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[2.266,0],[2.566,-2.033],[1.2,-3.8],[0,0],[0,0],[0,0],[0,0],[0,0],[-2.134,2.034],[-3.2,0],[-1.134,-0.3],[-0.667,-0.4],[0,0]],"o":[[-3.8,0],[-2.567,2.034],[0,0],[0,0],[0,0],[0,0],[0,0],[0,-3.8],[2.133,-2.033],[1.266,0],[1.133,0.3],[0,0],[-1.334,-0.733]],"v":[[37,-51],[27.45,-47.95],[21.8,-39.2],[21.1,-50],[6.1,-50],[6.1,0],[23.1,0],[23.1,-25.2],[26.3,-33.95],[34.3,-37],[37.9,-36.55],[40.6,-35.5],[42.4,-49.9]],"c":true},"ix":2},"nm":"r","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"r","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"a","size":52,"style":"Bold","w":59.9,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[1.266,0],[0,2.6],[0,0],[4.066,3.2],[7.8,0],[3.933,-2.7],[0.866,-4.866],[0,0],[-1.6,1.2],[-2.534,0],[-1.267,-1.333],[0,-2.266],[0,0],[0,0],[3.033,-2.633],[0,-4.266],[-2.667,-2.133],[-5,0],[-3,5.134],[-7.2,0],[-1.934,1.066],[0,0]],"o":[[-2.4,0],[0,0],[0,-6.4],[-4.067,-3.2],[-6.667,0],[-3.934,2.7],[0,0],[0.466,-2.733],[1.6,-1.2],[2.2,0],[1.266,1.334],[0,0],[0,0],[-6.934,1.4],[-3.034,2.634],[0,4.067],[2.666,2.134],[8.866,0],[1.4,5.134],[2.6,0],[0,0],[-0.8,0.267]],"v":[[54.4,-9.7],[50.8,-13.6],[50.8,-31.8],[44.7,-46.2],[26.9,-51],[11,-46.95],[3.8,-35.6],[17.6,-31.6],[20.7,-37.5],[26.9,-39.3],[32.1,-37.3],[34,-31.9],[34,-30.1],[22.7,-27.9],[7.75,-21.85],[3.2,-11.5],[7.2,-2.2],[18.7,1],[36.5,-6.7],[49.4,1],[56.2,-0.6],[57.5,-10.1]],"c":true},"ix":2},"nm":"a","mn":"ADBE Vector Shape - Group","hd":false},{"ind":1,"ty":"sh","ix":2,"ks":{"a":0,"k":{"i":[[2.333,0],[0.866,0.734],[0,1.4],[-0.9,0.767],[-2.134,0.534],[0,0],[0,0],[1.866,-1.3]],"o":[[-1.534,0],[-0.867,-0.733],[0,-1.4],[0.9,-0.766],[0,0],[0,0],[0,2.134],[-1.867,1.3]],"v":[[24.9,-10],[21.3,-11.1],[20,-14.3],[21.35,-17.55],[25.9,-19.5],[34,-21.4],[34,-17.1],[31.2,-11.95]],"c":true},"ix":2},"nm":"a","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"a","np":5,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"w","size":52,"style":"Bold","w":90.8,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0]],"v":[[72,-50],[63.5,-12.3],[53.8,-50],[37,-50],[27.2,-12.3],[18.8,-50],[0.9,-50],[16.1,0],[36.4,0],[45.3,-32.1],[54.3,0],[74.7,0],[89.8,-50]],"c":true},"ix":2},"nm":"w","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"w","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"b","size":52,"style":"Bold","w":62.8,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[6.4,0],[2.566,-1.666],[1.4,-2.933],[0,0],[0,0],[0,0],[0,0],[0,0],[-2.9,-2.1],[-3.934,0],[-3.6,4.534],[0,8.134],[3.666,4.6]],"o":[[-3.534,0],[-2.567,1.667],[0,0],[0,0],[0,0],[0,0],[0,0],[1.4,3.534],[2.9,2.1],[6.533,0],[3.6,-4.533],[0,-8.266],[-3.667,-4.6]],"v":[[38.2,-51],[29.05,-48.5],[23.1,-41.6],[23.1,-71.2],[6.1,-71.2],[6.1,0],[21,0],[21.5,-10.6],[27.95,-2.15],[38.2,1],[53.4,-5.8],[58.8,-24.8],[53.3,-44.1]],"c":true},"ix":2},"nm":"b","mn":"ADBE Vector Shape - Group","hd":false},{"ind":1,"ty":"sh","ix":2,"ks":{"a":0,"k":{"i":[[3,0],[1.633,2.2],[0,4.267],[0,0],[-1.6,2.267],[-2.934,0],[-1.634,-2.2],[0,-4.6],[1.633,-2.2]],"o":[[-2.867,0],[-1.634,-2.2],[0,0],[0,-4.133],[1.6,-2.266],[3,0],[1.633,2.2],[0,4.6],[-1.634,2.2]],"v":[[32.3,-11.5],[25.55,-14.8],[23.1,-24.5],[23.1,-25.5],[25.5,-35.1],[32.3,-38.5],[39.25,-35.2],[41.7,-25],[39.25,-14.8]],"c":true},"ix":2},"nm":"b","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"b","np":5,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"e","size":52,"style":"Bold","w":58.2,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[0,2.267],[4.3,4.434],[8.066,0],[4.533,-4.533],[0,-8.266],[-4.634,-4.533],[-8.734,0],[-4.034,2.234],[-1.4,4.267],[0,0],[1.566,-0.933],[2.466,0],[1.766,1.467],[0.533,3.134],[0,0]],"o":[[0,-8],[-4.3,-4.433],[-8.334,0],[-4.534,4.534],[0,8.267],[4.633,4.534],[5.866,0],[4.033,-2.233],[0,0],[-0.534,1.8],[-1.567,0.934],[-2.934,0],[-1.767,-1.466],[0,0],[0.333,-1.466]],"v":[[54.8,-25.7],[48.35,-44.35],[29.8,-51],[10.5,-44.2],[3.7,-25],[10.65,-5.8],[30.7,1],[45.55,-2.35],[53.7,-12.1],[39.9,-16.5],[36.75,-12.4],[30.7,-11],[23.65,-13.2],[20.2,-20.1],[54.3,-20.1]],"c":true},"ix":2},"nm":"e","mn":"ADBE Vector Shape - Group","hd":false},{"ind":1,"ty":"sh","ix":2,"ks":{"a":0,"k":{"i":[[-5.4,0],[-0.8,-6.533],[0,0]],"o":[[5.333,0],[0,0],[1,-6.533]],"v":[[29.7,-39.1],[38.9,-29.3],[20.1,-29.3]],"c":true},"ix":2},"nm":"e","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"e","np":5,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"y","size":52,"style":"Bold","w":57,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[1.2,-0.7],[2.066,0],[1.3,0.366],[1.066,1],[0,0],[-5.667,0],[-3,1.366],[-2.2,3.133],[-1.867,5.333]],"o":[[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[-0.734,1.8],[-1.2,0.7],[-2.067,0],[-1.3,-0.367],[0,0],[3.4,2.466],[4.266,0],[3,-1.367],[2.2,-3.134],[0,0]],"v":[[57,-50],[40,-50],[32.3,-21.9],[29.6,-10.9],[27.2,-21.5],[19.5,-50],[0.8,-50],[15.7,-12.5],[21.5,1.1],[20.3,4.2],[17.4,7.95],[12.5,9],[7.45,8.45],[3.9,6.4],[0.3,17.8],[13.9,21.5],[24.8,19.45],[32.6,12.7],[38.7,0]],"c":true},"ix":2},"nm":"y","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"y","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":" ","size":52,"style":"Bold","w":28.6,"data":{},"fFamily":"Work Sans"},{"ch":"F","size":52,"style":"Bold","w":61.2,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0]],"v":[[58.6,-52.7],[58.6,-66],[7.3,-66],[7.3,0],[24.5,0],[24.5,-25.4],[51.7,-25.4],[51.7,-38.7],[24.5,-38.7],[24.5,-52.7]],"c":true},"ix":2},"nm":"F","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"F","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"i","size":52,"style":"Bold","w":29.1,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[-3.467,0],[-1.567,1.3],[0,2.8],[1.566,1.3],[3.466,0],[1.566,-1.3],[0,-2.866],[-1.567,-1.3]],"o":[[3.466,0],[1.566,-1.3],[0,-2.866],[-1.567,-1.3],[-3.467,0],[-1.567,1.3],[0,2.8],[1.566,1.3]],"v":[[14.6,-55.8],[22.15,-57.75],[24.5,-63.9],[22.15,-70.15],[14.6,-72.1],[7.05,-70.15],[4.7,-63.9],[7.05,-57.75]],"c":true},"ix":2},"nm":"i","mn":"ADBE Vector Shape - Group","hd":false},{"ind":1,"ty":"sh","ix":2,"ks":{"a":0,"k":{"i":[[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0]],"v":[[23.1,-50],[6.1,-50],[6.1,0],[23.1,0]],"c":true},"ix":2},"nm":"i","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"i","np":5,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"l","size":52,"style":"Bold","w":32.7,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[0,0],[0,0],[0,0],[-2.4,-2.5],[-5.334,0],[-1.934,0.466],[-1.2,0.734],[0,0],[1.6,0],[0.666,0.934],[0,2.267]],"o":[[0,0],[0,0],[0,5.534],[2.4,2.5],[1.866,0],[1.933,-0.466],[0,0],[-1.8,0.6],[-1.734,0],[-0.667,-0.933],[0,0]],"v":[[22.9,-71.2],[5.9,-71.2],[5.9,-14.8],[9.5,-2.75],[21.1,1],[26.8,0.3],[31.5,-1.5],[32.6,-12],[27.5,-11.1],[23.9,-12.5],[22.9,-17.3]],"c":true},"ix":2},"nm":"l","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"l","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"d","size":52,"style":"Bold","w":62.8,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[0,0],[0,0],[2.533,1.667],[3.533,0],[3.666,-4.6],[0,-8.266],[-3.634,-4.533],[-6.467,0],[-2.834,1.866],[-1.467,3.267],[0,0],[0,0],[0,0]],"o":[[0,0],[-1.467,-2.933],[-2.534,-1.666],[-6.467,0],[-3.667,4.6],[0,8.134],[3.633,4.534],[3.733,0],[2.833,-1.866],[0,0],[0,0],[0,0],[0,0]],"v":[[39.8,-71.2],[39.8,-41.6],[33.8,-48.5],[24.7,-51],[9.5,-44.1],[4,-24.8],[9.45,-5.8],[24.6,1],[34.45,-1.8],[40.9,-9.5],[41.5,0],[56.8,0],[56.8,-71.2]],"c":true},"ix":2},"nm":"d","mn":"ADBE Vector Shape - Group","hd":false},{"ind":1,"ty":"sh","ix":2,"ks":{"a":0,"k":{"i":[[2.733,0],[1.633,2.2],[0,4.6],[-1.634,2.2],[-3,0],[-1.634,-2],[-0.2,-3.666],[0,0],[1.633,-1.966]],"o":[[-3,0],[-1.634,-2.2],[0,-4.6],[1.633,-2.2],[2.733,0],[1.633,2],[0,0],[-0.2,3.734],[-1.634,1.967]],"v":[[30.5,-11.5],[23.55,-14.8],[21.1,-25],[23.55,-35.2],[30.5,-38.5],[37.05,-35.5],[39.8,-27],[39.8,-23],[37.05,-14.45]],"c":true},"ix":2},"nm":"d","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"d","np":5,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"s","size":52,"style":"Bold","w":53.3,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[-11.467,0],[-4.067,3.034],[0,4.867],[3.233,2.5],[7.333,1.267],[1.366,0.7],[0,1],[-1.334,0.734],[-2.4,0],[-2.2,-1.066],[-1.6,-2.333],[0,0],[3.633,1.567],[5.733,0],[3.633,-1.566],[1.8,-2.533],[0,-2.866],[-3.167,-2.533],[-7.467,-1.466],[-1.367,-0.7],[0,-0.933],[1.333,-0.633],[2.333,0],[2.866,4.734],[0,0]],"o":[[7.733,0],[4.066,-3.033],[0,-4.333],[-3.234,-2.5],[-3.4,-0.666],[-1.367,-0.7],[0,-1.066],[1.333,-0.733],[3.066,0],[2.2,1.067],[0,0],[-2.267,-3.133],[-3.634,-1.566],[-5.2,0],[-3.634,1.567],[-1.8,2.534],[0,4.2],[3.166,2.534],[3.333,0.667],[1.366,0.7],[0,1.067],[-1.334,0.634],[-7,0],[0,0],[4.8,5.867]],"v":[[26.8,1],[44.5,-3.55],[50.6,-15.4],[45.75,-25.65],[29.9,-31.3],[22.75,-33.35],[20.7,-35.9],[22.7,-38.6],[28.3,-39.7],[36.2,-38.1],[41.9,-33],[50.7,-41.6],[41.85,-48.65],[27.8,-51],[14.55,-48.65],[6.4,-42.5],[3.7,-34.4],[8.45,-24.3],[24.4,-18.3],[31.45,-16.25],[33.5,-13.8],[31.5,-11.25],[26,-10.3],[11.2,-17.4],[2.4,-7.8]],"c":true},"ix":2},"nm":"s","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"s","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"\r","size":52,"style":"Bold","w":0,"fFamily":"Work Sans"},{"ch":"H","size":52,"style":"Bold","w":74.2,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0]],"v":[[49.7,-66],[49.7,-39.9],[24.5,-39.9],[24.5,-66],[7.3,-66],[7.3,0],[24.5,0],[24.5,-26.6],[49.7,-26.6],[49.7,0],[66.9,0],[66.9,-66]],"c":true},"ix":2},"nm":"H","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"H","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"g","size":52,"style":"Bold","w":57.1,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[5.8,0],[0,0],[0,2.267],[-2.067,0.534],[-3.6,0],[-4.267,2.934],[0,5.4],[5.6,2.934],[-1.5,0.8],[-2.267,0],[-1.334,-0.133],[0,0],[0,0],[2.333,-2.533],[0.666,-4],[3.6,0],[4.266,-2.966],[0,-5.4],[-5.467,-2.933],[1.466,-1.8],[0,-2.333],[-5.134,-2.2],[1.533,-1.667],[0,-2.2],[-4.167,-2.067],[-8.734,0],[-5.034,3.033],[0,5.666],[3.166,2.534]],"o":[[0,0],[-3.467,0],[0,-1.8],[2.8,0.6],[7.733,0],[4.266,-2.933],[0,-6.266],[0.666,-1.4],[1.5,-0.8],[0.533,0],[0,0],[0,0],[-4.134,0],[-2.334,2.534],[-3.067,-0.733],[-7.734,0],[-4.267,2.967],[0,6.2],[-2.534,0.867],[-1.467,1.8],[0,4.734],[-3.134,0.733],[-1.534,1.666],[0,3.733],[4.166,2.066],[8.666,0],[5.033,-3.034],[0,-4.933],[-3.167,-2.533]],"v":[[37.8,-11.1],[20.8,-11.1],[15.6,-14.5],[18.7,-18],[28.3,-17.1],[46.3,-21.5],[52.7,-34],[44.3,-47.8],[47.55,-51.1],[53.2,-52.3],[56,-52.1],[54.1,-63.4],[52.5,-63.5],[42.8,-59.7],[38.3,-49.9],[28.3,-51],[10.3,-46.55],[3.9,-34],[12.1,-20.3],[6.1,-16.3],[3.9,-10.1],[11.6,0.3],[4.6,3.9],[2.3,9.7],[8.55,18.4],[27.9,21.5],[48.45,16.95],[56,3.9],[51.25,-7.3]],"c":true},"ix":2},"nm":"g","mn":"ADBE Vector Shape - Group","hd":false},{"ind":1,"ty":"sh","ix":2,"ks":{"a":0,"k":{"i":[[-2.2,0],[-1.367,-1.333],[0,-2.2],[1.366,-1.3],[2.2,0],[1.366,1.3],[0,2.2],[-1.367,1.334]],"o":[[2.2,0],[1.366,1.334],[0,2.2],[-1.367,1.3],[-2.2,0],[-1.367,-1.3],[0,-2.2],[1.366,-1.333]],"v":[[28.3,-41.3],[33.65,-39.3],[35.7,-34],[33.65,-28.75],[28.3,-26.8],[22.95,-28.75],[20.9,-34],[22.95,-39.3]],"c":true},"ix":2},"nm":"g","mn":"ADBE Vector Shape - Group","hd":false},{"ind":2,"ty":"sh","ix":3,"ks":{"a":0,"k":{"i":[[4.4,0],[0,3.066],[-1.167,0.566],[-2.734,0],[0,0],[-0.934,-0.534],[0,-1.067],[2.3,-0.9]],"o":[[-9.267,0],[0,-1.2],[1.166,-0.567],[0,0],[2.2,0],[0.933,0.533],[0,1.466],[-2.3,0.9]],"v":[[29.1,10.5],[15.2,5.9],[16.95,3.25],[22.8,2.4],[36.5,2.4],[41.2,3.2],[42.6,5.6],[39.15,9.15]],"c":true},"ix":2},"nm":"g","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"g","np":6,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"h","size":52,"style":"Bold","w":62,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[5.266,0],[2.7,-1.7],[1.466,-3.333],[0,0],[0,0],[0,0],[0,0],[0,0],[-1.667,1.934],[-2.667,0],[0,-6.333],[0,0],[0,0],[0,0],[3.133,3.067]],"o":[[-3.667,0],[-2.7,1.7],[0,0],[0,0],[0,0],[0,0],[0,0],[0,-4],[1.666,-1.933],[4.733,0],[0,0],[0,0],[0,0],[0,-5.666],[-3.134,-3.066]],"v":[[38.9,-51],[29.35,-48.45],[23.1,-40.9],[23.1,-71.2],[6.1,-71.2],[6.1,0],[23.1,0],[23.1,-26.3],[25.6,-35.2],[32.1,-38.1],[39.2,-28.6],[39.2,0],[56.2,0],[56.2,-33.3],[51.5,-46.4]],"c":true},"ix":2},"nm":"h","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"h","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"c","size":52,"style":"Bold","w":57.1,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[7.533,0],[4.633,-4.566],[0,-8.2],[-4.667,-4.533],[-8.667,0],[-4.1,2.834],[-0.734,4.534],[0,0],[4.733,0],[0,9.134],[-6.6,0],[-0.667,-5.733],[0,0],[3.8,2.867]],"o":[[-8.267,0],[-4.634,4.567],[0,8.267],[4.666,4.534],[6.733,0],[4.1,-2.833],[0,0],[-0.8,5.4],[-6.6,0],[0,-9.4],[4.466,0],[0,0],[-0.934,-4.6],[-3.8,-2.866]],"v":[[30,-51],[10.65,-44.15],[3.7,-25],[10.7,-5.8],[30.7,1],[46.95,-3.25],[54.2,-14.3],[38.9,-19.2],[30.6,-11.1],[20.7,-24.8],[30.6,-38.9],[38.3,-30.3],[54.1,-35.5],[47,-46.7]],"c":true},"ix":2},"nm":"c","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"c","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"o","size":52,"style":"Bold","w":60.2,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[8.333,0],[4.633,-4.566],[0,-8.2],[-4.634,-4.566],[-8.334,0],[-4.634,4.567],[0,8.2],[4.633,4.567]],"o":[[-8.334,0],[-4.634,4.567],[0,8.2],[4.633,4.567],[8.333,0],[4.633,-4.566],[0,-8.2],[-4.634,-4.566]],"v":[[30.1,-51],[10.65,-44.15],[3.7,-25],[10.65,-5.85],[30.1,1],[49.55,-5.85],[56.5,-25],[49.55,-44.15]],"c":true},"ix":2},"nm":"o","mn":"ADBE Vector Shape - Group","hd":false},{"ind":1,"ty":"sh","ix":2,"ks":{"a":0,"k":{"i":[[-3.2,0],[-1.534,-2.2],[0,-4.866],[1.533,-2.2],[3.2,0],[1.533,2.2],[0,4.867],[-1.534,2.2]],"o":[[3.2,0],[1.533,2.2],[0,4.867],[-1.534,2.2],[-3.2,0],[-1.534,-2.2],[0,-4.866],[1.533,-2.2]],"v":[[30.1,-38.9],[37.2,-35.6],[39.5,-25],[37.2,-14.4],[30.1,-11.1],[23,-14.4],[20.7,-25],[23,-35.6]],"c":true},"ix":2},"nm":"o","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"o","np":5,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"W","size":52,"style":"Bold","w":99.7,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0]],"v":[[47,-32],[49.9,-48.1],[50.1,-48.1],[53.1,-32],[60.9,0],[79.6,0],[98.7,-66],[80.9,-66],[70,-13.6],[57.9,-66],[42.3,-66],[30.4,-13.5],[19.5,-66],[1,-66],[20,0],[39.3,0]],"c":true},"ix":2},"nm":"W","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"W","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"m","size":52,"style":"Bold","w":94.1,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[5.066,0],[2.966,-1.733],[1.6,-3.266],[2.766,1.734],[3.8,0],[2.866,-1.8],[1.6,-3.466],[0,0],[0,0],[0,0],[0,0],[0,0],[-1.667,1.934],[-2.534,0],[0,-5.733],[0,0],[0,0],[0,0],[-1.6,1.934],[-2.667,0],[0,-5.733],[0,0],[0,0],[0,0],[3.166,3.067]],"o":[[-3.667,0],[-2.967,1.734],[-1.2,-3.266],[-2.767,-1.733],[-3.867,0],[-2.867,1.8],[0,0],[0,0],[0,0],[0,0],[0,0],[0,-3.866],[1.666,-1.933],[4.533,0],[0,0],[0,0],[0,0],[0,-3.666],[1.6,-1.933],[4.533,0],[0,0],[0,0],[0,0],[0,-5.666],[-3.167,-3.066]],"v":[[71.2,-51],[61.25,-48.4],[54.4,-40.9],[48.45,-48.4],[38.6,-51],[28.5,-48.3],[21.8,-40.4],[21.3,-50],[6.1,-50],[6.1,0],[23.1,0],[23.1,-26.4],[25.6,-35.1],[31.9,-38],[38.7,-29.4],[38.7,0],[55.7,0],[55.7,-26.7],[58.1,-35.1],[64.5,-38],[71.3,-29.4],[71.3,0],[88.3,0],[88.3,-33.3],[83.55,-46.4]],"c":true},"ix":2},"nm":"m","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"m","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"f","size":52,"style":"Bold","w":37.4,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[0,0],[-5.534,0],[-1.467,-1.066],[0,0],[5.2,0],[3.733,-3],[0,-6],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0]],"o":[[0,-4.8],[2.333,0],[0,0],[-2.467,-1.933],[-6,0],[-3.734,3],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0]],"v":[[25.5,-53.5],[33.8,-60.7],[39.5,-59.1],[41.2,-69.7],[29.7,-72.6],[15.1,-68.1],[9.5,-54.6],[9.5,-50],[1.5,-50],[1.5,-37.9],[9.5,-37.9],[9.5,0],[26.5,0],[26.5,-37.9],[40.7,-37.9],[40.7,-50],[25.5,-50]],"c":true},"ix":2},"nm":"f","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"f","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"v","size":52,"style":"Bold","w":56.1,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0]],"v":[[38.6,-50],[28.1,-10.8],[17.8,-50],[-0.1,-50],[17.9,0],[38.2,0],[56.2,-50]],"c":true},"ix":2},"nm":"v","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"v","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"p","size":52,"style":"Bold","w":62.8,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[6.533,0],[2.9,-2.1],[1.4,-3.533],[0,0],[0,0],[0,0],[0,0],[0,0],[-2.567,-1.666],[-3.534,0],[-3.667,4.6],[0,8.267],[3.6,4.534]],"o":[[-3.934,0],[-2.9,2.1],[0,0],[0,0],[0,0],[0,0],[0,0],[1.4,2.934],[2.566,1.666],[6.4,0],[3.666,-4.6],[0,-8.133],[-3.6,-4.533]],"v":[[38.2,-51],[27.95,-47.85],[21.5,-39.4],[21,-50],[6.1,-50],[6.1,21],[23.1,21],[23.1,-8.4],[29.05,-1.5],[38.2,1],[53.3,-5.9],[58.8,-25.2],[53.4,-44.2]],"c":true},"ix":2},"nm":"p","mn":"ADBE Vector Shape - Group","hd":false},{"ind":1,"ty":"sh","ix":2,"ks":{"a":0,"k":{"i":[[3,0],[1.6,2.267],[0,4.134],[0,0],[-1.634,2.2],[-2.867,0],[-1.634,-2.2],[0,-4.6],[1.633,-2.2]],"o":[[-2.934,0],[-1.6,-2.266],[0,0],[0,-4.266],[1.633,-2.2],[3,0],[1.633,2.2],[0,4.6],[-1.634,2.2]],"v":[[32.3,-11.5],[25.5,-14.9],[23.1,-24.5],[23.1,-25.5],[25.55,-35.2],[32.3,-38.5],[39.25,-35.2],[41.7,-25],[39.25,-14.8]],"c":true},"ix":2},"nm":"p","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"p","np":5,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"k","size":52,"style":"Bold","w":62.2,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0]],"o":[[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0]],"v":[[43.3,0],[62.1,0],[42.6,-30.4],[61,-50],[42.2,-50],[23.1,-29],[23.1,-71.2],[6.1,-71.2],[6.1,0],[23.1,0],[23.1,-11.5],[31.2,-20.5]],"c":true},"ix":2},"nm":"k","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"k","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"n","size":52,"style":"Bold","w":62,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[5.266,0],[2.933,-1.766],[1.6,-3.533],[0,0],[0,0],[0,0],[0,0],[0,0],[-1.667,1.9],[-2.667,0],[-1.234,-1.433],[0,-3.4],[0,0],[0,0],[0,0],[3.133,3.067]],"o":[[-3.934,0],[-2.934,1.767],[0,0],[0,0],[0,0],[0,0],[0,0],[0,-3.933],[1.666,-1.9],[2.266,0],[1.233,1.434],[0,0],[0,0],[0,0],[0,-5.666],[-3.134,-3.066]],"v":[[38.9,-51],[28.6,-48.35],[21.8,-40.4],[21.3,-50],[6.1,-50],[6.1,0],[23.1,0],[23.1,-26.4],[25.6,-35.15],[32.1,-38],[37.35,-35.85],[39.2,-28.6],[39.2,0],[56.2,0],[56.2,-33.3],[51.5,-46.4]],"c":true},"ix":2},"nm":"n","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"n","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Work Sans"},{"ch":"e","size":48,"style":"Bold Italic","w":46.9,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[0,5.534],[1.933,1.367],[3.066,0],[5.533,-4.166],[3.2,-6.333],[0,-5.933],[-2.934,-2.466],[-4.6,0],[-4.034,2.6],[-2.4,3.734],[0,0],[2.6,-1.3],[2.066,0],[1.3,1.467],[0,3.534],[-0.4,2.267],[-6.2,4.134]],"o":[[0,-2.533],[-1.934,-1.366],[-6.6,0],[-5.534,4.167],[-3.2,6.334],[0,4.467],[2.933,2.466],[5,0],[4.033,-2.6],[0,0],[-2.467,2.867],[-2.6,1.3],[-2.534,0],[-1.3,-1.466],[0,-2.266],[8.2,-2.266],[6.2,-4.133]],"v":[[46.8,-45.2],[43.9,-51.05],[36.4,-53.1],[18.2,-46.85],[5.1,-31.1],[0.3,-12.7],[4.7,-2.3],[16,1.4],[29.55,-2.5],[39.2,-12],[37.6,-12.8],[30,-6.55],[23,-4.6],[17.25,-6.8],[15.3,-14.3],[15.9,-21.1],[37.5,-30.7]],"c":true},"ix":2},"nm":"e","mn":"ADBE Vector Shape - Group","hd":false},{"ind":1,"ty":"sh","ix":2,"ks":{"a":0,"k":{"i":[[-1.934,0],[-0.267,-0.466],[0,-1.266],[1.533,-3.1],[2.666,-2.4],[4.733,-2.066],[-2.067,4.367],[-2.467,2.734]],"o":[[0.533,0],[0.266,0.467],[0,3.534],[-1.534,3.1],[-2.6,2.4],[1,-4.6],[2.066,-4.366],[2.466,-2.733]],"v":[[34.2,-51.2],[35.4,-50.5],[35.8,-47.9],[33.5,-37.95],[27.2,-29.7],[16.2,-23],[20.8,-36.45],[27.6,-47.1]],"c":true},"ix":2},"nm":"e","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"e","np":5,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Playfair Display"},{"ch":"d","size":48,"style":"Bold Italic","w":57.9,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[0,0],[1,-1.166],[1,0],[0,1.534],[-0.334,0.934],[0,0],[3.766,-0.666],[4.6,-0.066],[0,0],[-1.034,-0.6],[0,-1.333],[0.333,-1.2],[0,0],[3.133,0],[5.066,-4.433],[2.8,-6.366],[0,-5.4],[-2.2,-2.333],[-3.534,0],[-2.834,2.6],[-2.534,5.667],[0,0],[0,-1.933],[-0.534,-1.2],[-4.134,0],[-2.367,1.533],[-1.2,3.8],[0,0],[0,0]],"o":[[-1.067,2.934],[-1,1.167],[-1.267,0],[0,-0.866],[0,0],[-3.467,1.334],[-3.767,0.667],[0,0],[2.466,0],[1.033,0.6],[0,0.667],[0,0],[-0.934,-2.266],[-6.467,0],[-5.067,4.434],[-2.8,6.367],[0,4.667],[2.2,2.333],[3.933,0],[2.833,-2.6],[0,0],[-0.8,2.8],[0,1.6],[1.133,3.067],[2.866,0],[2.366,-1.533],[0,0],[0,0],[0,0]],"v":[[49.9,-11.4],[46.8,-5.25],[43.8,-3.5],[41.9,-5.8],[42.4,-8.5],[62,-79.5],[51.15,-76.5],[38.6,-75.4],[38,-73.3],[43.25,-72.4],[44.8,-69.5],[44.3,-66.7],[39.8,-49.7],[33.7,-53.1],[16.4,-46.45],[4.6,-30.25],[0.4,-12.6],[3.7,-2.1],[12.3,1.4],[22.45,-2.5],[30.5,-14.9],[30.4,-14.5],[29.2,-7.4],[30,-3.2],[37.9,1.4],[45.75,-0.9],[51.1,-8.9],[53.5,-16.2],[51.6,-16.2]],"c":true},"ix":2},"nm":"d","mn":"ADBE Vector Shape - Group","hd":false},{"ind":1,"ty":"sh","ix":2,"ks":{"a":0,"k":{"i":[[0,0],[1.966,-3.733],[1.8,-1.966],[1.333,0],[0.5,1.134],[0,2.334],[-2.1,6.267],[-3.1,4.1],[-2.867,0],[-0.734,-2.333]],"o":[[-1.6,5.134],[-1.967,3.734],[-1.8,1.967],[-1.134,0],[-0.5,-1.133],[0,-6.133],[2.1,-6.266],[3.1,-4.1],[1.933,0],[0,0]],"v":[[34.1,-28.4],[28.75,-15.1],[23.1,-6.55],[18.4,-3.6],[15.95,-5.3],[15.2,-10.5],[18.35,-29.1],[26.15,-44.65],[35.1,-50.8],[39.1,-47.3]],"c":true},"ix":2},"nm":"d","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"d","np":5,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Playfair Display"},{"ch":"u","size":48,"style":"Bold Italic","w":59.7,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[0,0],[1,-1.2],[1.266,0],[0,1.134],[-0.4,1.4],[0,0],[5.933,-0.133],[0,0],[2.766,-6.5],[2.733,-3.933],[2,0],[0,1.534],[-0.6,1.8],[0,0],[0,2.067],[6.066,0],[2.4,-6.866],[0,0],[0,0],[0,0],[-1.034,1.134],[-1.067,0],[0,-1.4],[0.4,-1.2],[0,0],[0,-2.066],[-1.5,-1.4],[-3,0],[-2.467,1.433],[-2.4,3.534],[-2.6,6.267],[0,0],[0,-1.533],[-0.6,-1.2],[-1.267,-0.6],[-1.8,0],[-2.367,1.6],[-1.267,3.667],[0,0],[0,0]],"o":[[-1,2.867],[-1,1.2],[-1.134,0],[0,-0.8],[0,0],[-3.734,0.8],[0,0],[-2.134,7.467],[-2.767,6.5],[-2.734,3.934],[-1.267,0],[0,-1.066],[0,0],[0.933,-3],[0,-5.533],[-6.534,0],[0,0],[0,0],[0,0],[1.066,-3],[1.033,-1.133],[1.266,0],[0,0.734],[0,0],[-0.867,2.534],[0,2.667],[1.5,1.4],[3.066,0],[2.466,-1.433],[2.4,-3.533],[0,0],[-0.667,2.8],[0,1.534],[0.6,1.067],[1.266,0.6],[2.933,0],[2.366,-1.6],[0,0],[0,0],[0,0]],"v":[[51.7,-11.4],[48.7,-5.3],[45.3,-3.5],[43.6,-5.2],[44.2,-8.5],[56.7,-53.1],[42.2,-51.7],[40.7,-46.1],[33.35,-25.15],[25.1,-9.5],[18,-3.6],[16.1,-5.9],[17,-10.2],[26,-37.2],[27.4,-44.8],[18.3,-53.1],[4.9,-42.8],[2.4,-35.5],[4.3,-35.5],[6.1,-40.3],[9.25,-46.5],[12.4,-48.2],[14.3,-46.1],[13.7,-43.2],[4,-13.7],[2.7,-6.8],[4.95,-0.7],[11.7,1.4],[20,-0.75],[27.3,-8.2],[34.8,-22.9],[32.1,-12.6],[31.1,-6.1],[32,-2],[34.8,0.5],[39.4,1.4],[47.35,-1],[52.8,-8.9],[55.5,-16.5],[53.6,-16.5]],"c":true},"ix":2},"nm":"u","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"u","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Playfair Display"},{"ch":"c","size":48,"style":"Bold Italic","w":46.3,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[-3.267,0],[-1.134,-1.333],[1.8,-2.033],[0,-2.6],[-1.067,-1.066],[-1.667,0],[-1.534,1.067],[-0.867,1.734],[0,1.8],[2.233,1.834],[3.666,0],[5.2,-4.066],[2.866,-6.1],[0,-5.733],[-2.9,-2.6],[-4.867,0],[-3.7,2.533],[-2.4,3.867],[0,0],[4.8,0],[0,6.667],[-1.934,5.767],[-3.1,3.567]],"o":[[2.066,0],[-2.467,0.6],[-1.8,2.034],[0,1.734],[1.066,1.067],[1.8,0],[1.533,-1.066],[0.866,-1.733],[0,-2.733],[-2.234,-1.833],[-6.6,0],[-5.2,4.067],[-2.867,6.1],[0,5.067],[2.9,2.6],[4.733,0],[3.7,-2.533],[0,0],[-4,5.867],[-5.067,0],[0,-6.066],[1.933,-5.766],[3.1,-3.566]],"v":[[35.8,-51.1],[40.6,-49.1],[34.2,-45.15],[31.5,-38.2],[33.1,-34],[37.2,-32.4],[42.2,-34],[45.8,-38.2],[47.1,-43.5],[43.75,-50.35],[34.9,-53.1],[17.2,-47],[5.1,-31.75],[0.8,-14],[5.15,-2.5],[16.8,1.4],[29.45,-2.4],[38.6,-12],[36.6,-12.8],[23.4,-4],[15.8,-14],[18.7,-31.75],[26.25,-45.75]],"c":true},"ix":2},"nm":"c","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"c","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Playfair Display"},{"ch":"a","size":48,"style":"Bold Italic","w":55.8,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[0,0],[2.333,0],[0,1.467],[-0.334,1.134],[0,0],[5.333,-0.066],[0,0],[1.1,1.067],[1.8,0],[4.866,-4.466],[3.166,-6.633],[0,-5.933],[-1.9,-2.166],[-3.667,0],[-2.767,2.2],[-2.267,4.934],[0,-1.733],[-0.934,-1.2],[-3.467,0],[-2.367,1.566],[-1.334,3.734],[0,0],[0,0]],"o":[[-1.8,5.267],[-1.267,0],[0,-0.733],[0,0],[-4.334,0.934],[0,0],[-0.2,-2.133],[-1.1,-1.066],[-4.667,0],[-4.867,4.467],[-3.167,6.634],[0,3.867],[1.9,2.166],[3.333,0],[2.766,-2.2],[-0.6,2.2],[0,2.134],[1.466,2.066],[2.733,0],[2.366,-1.566],[0,0],[0,0],[0,0]],"v":[[47.7,-11.4],[41.5,-3.5],[39.6,-5.7],[40.1,-8.5],[53.2,-53.1],[38.7,-51.6],[37.3,-46.7],[35.35,-51.5],[31,-53.1],[16.7,-46.4],[4.65,-29.75],[-0.1,-10.9],[2.75,-1.85],[11.1,1.4],[20.25,-1.9],[27.8,-12.6],[26.9,-6.7],[28.3,-1.7],[35.7,1.4],[43.35,-0.95],[48.9,-8.9],[51.4,-16.2],[49.5,-16.2]],"c":true},"ix":2},"nm":"a","mn":"ADBE Vector Shape - Group","hd":false},{"ind":1,"ty":"sh","ix":2,"ks":{"a":0,"k":{"i":[[0,0],[0,0],[1.766,-3.833],[1.766,-2.033],[1.466,0],[0.433,0.967],[0,2.2],[-2.034,6.134],[-2.9,4.067],[-2.267,0],[-0.567,-0.866],[0,-1.666],[0.066,-0.333]],"o":[[0,0],[-1.334,5.267],[-1.767,3.834],[-1.767,2.034],[-1,0],[-0.434,-0.966],[0,-5.733],[2.033,-6.133],[2.9,-4.066],[1.133,0],[0.566,0.867],[0,0.667],[0,0]],"v":[[31.8,-27.1],[32.3,-29.5],[27.65,-15.85],[22.35,-7.05],[17.5,-4],[15.35,-5.45],[14.7,-10.2],[17.75,-28],[25.15,-43.3],[32.9,-49.4],[35.45,-48.1],[36.3,-44.3],[36.2,-42.8]],"c":true},"ix":2},"nm":"a","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"a","np":5,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Playfair Display"},{"ch":"t","size":48,"style":"Bold Italic","w":35.3,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[0,0],[0,0],[0,0],[0,0],[0,0],[5.666,-0.066],[0,0],[0,0],[0,0],[0,0],[0,0],[0,-1.933],[-1.7,-1.766],[-3.4,0],[-2.6,7.867],[0,0],[0,0],[0,0],[1.366,-1.433],[1.466,0],[0.533,0.5],[0,1],[-0.2,0.667]],"o":[[0,0],[0,0],[0,0],[0,0],[-4,0.867],[0,0],[0,0],[0,0],[0,0],[0,0],[-0.6,2.067],[0,3.067],[1.7,1.766],[7.4,0],[0,0],[0,0],[0,0],[-1.067,2.867],[-1.367,1.434],[-0.934,0],[-0.534,-0.5],[0,-0.666],[0,0]],"v":[[28.3,-49.7],[39.9,-49.7],[40.2,-51.7],[28.9,-51.7],[33.6,-68],[19.1,-66.6],[14.8,-51.7],[5.7,-51.7],[5.2,-49.7],[14.2,-49.7],[4.1,-14.5],[3.2,-8.5],[5.75,-1.25],[13.4,1.4],[28.4,-10.4],[30.4,-16.2],[28.5,-16.2],[27,-12.1],[23.35,-5.65],[19.1,-3.5],[16.9,-4.25],[16.1,-6.5],[16.4,-8.5]],"c":true},"ix":2},"nm":"t","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"t","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Playfair Display"},{"ch":"i","size":48,"style":"Bold Italic","w":32.2,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[0.066,-2.733],[-1.267,-1.166],[-2.4,0],[-2,1.734],[0,2.667],[1.3,1.1],[2.333,0],[1.933,-1.6]],"o":[[-0.134,2],[1.266,1.167],[2.933,0],[2,-1.733],[0,-1.933],[-1.3,-1.1],[-2.867,0],[-1.934,1.6]],"v":[[17.7,-68.4],[19.4,-63.65],[24.9,-61.9],[32.3,-64.5],[35.3,-71.1],[33.35,-75.65],[27.9,-77.3],[20.7,-74.9]],"c":true},"ix":2},"nm":"i","mn":"ADBE Vector Shape - Group","hd":false},{"ind":1,"ty":"sh","ix":2,"ks":{"a":0,"k":{"i":[[0.466,-1.533],[0,0],[0,-2.2],[-6.067,0],[-2.334,6.867],[0,0],[0,0],[0,0],[1.033,-1.133],[1,0],[0,1.4],[-0.4,1.2],[0,0],[0,1.934],[1.4,1.5],[3.066,0],[2.466,-6.866],[0,0],[0,0],[0,0],[-1,1.234],[-1.2,0],[0,-1.333]],"o":[[0,0],[-1,2.867],[0,5.534],[6.666,0],[0,0],[0,0],[0,0],[-1.134,3],[-1.034,1.134],[-1.334,0],[0,-0.733],[0,0],[0.733,-2],[0,-2.4],[-1.4,-1.5],[-6.8,0],[0,0],[0,0],[0,0],[1.066,-2.8],[1,-1.233],[1.2,0],[0,0.467]],"v":[[13.9,-43.2],[4.1,-14.5],[2.6,-6.9],[11.7,1.4],[25.2,-8.9],[27.8,-16.2],[25.9,-16.2],[24.1,-11.4],[20.85,-5.2],[17.8,-3.5],[15.8,-5.6],[16.4,-8.5],[26.9,-39.1],[28,-45],[25.9,-50.85],[19.2,-53.1],[5.3,-42.8],[2.5,-35.2],[4.4,-35.2],[6.4,-40.3],[9.5,-46.35],[12.8,-48.2],[14.6,-46.2]],"c":true},"ix":2},"nm":"i","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"i","np":5,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Playfair Display"},{"ch":"o","size":48,"style":"Bold Italic","w":52.9,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[0,-5.466],[-2.8,-2.833],[-5.2,0],[-4.9,4],[-2.5,5.934],[0,5.467],[2.8,2.834],[5.2,0],[4.9,-4],[2.5,-5.933]],"o":[[0,5.334],[2.8,2.834],[6.8,0],[4.9,-4],[2.5,-5.933],[0,-5.333],[-2.8,-2.833],[-6.8,0],[-4.9,4],[-2.5,5.934]],"v":[[1.2,-15.1],[5.4,-2.85],[17.4,1.4],[34.95,-4.6],[46.05,-19.5],[49.8,-36.6],[45.6,-48.85],[33.6,-53.1],[16.05,-47.1],[4.95,-32.2]],"c":true},"ix":2},"nm":"o","mn":"ADBE Vector Shape - Group","hd":false},{"ind":1,"ty":"sh","ix":2,"ks":{"a":0,"k":{"i":[[-2.467,0],[-0.534,-1.033],[0,-2.6],[2,-6.833],[2.9,-4.6],[2.466,0],[0.533,1.067],[0,2.4],[-2,6.867],[-2.934,4.734]],"o":[[1.133,0],[0.533,1.034],[0,6.134],[-2,6.834],[-2.9,4.6],[-1.2,0],[-0.534,-1.066],[0,-5.933],[2,-6.866],[2.933,-4.733]],"v":[[33.1,-51.1],[35.6,-49.55],[36.4,-44.1],[33.4,-24.65],[26.05,-7.5],[18,-0.6],[15.4,-2.2],[14.6,-7.4],[17.6,-26.6],[25,-44]],"c":true},"ix":2},"nm":"o","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"o","np":5,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Playfair Display"},{"ch":"n","size":48,"style":"Bold Italic","w":60.3,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[0,0],[0,0],[1.033,-1.133],[1.066,0],[0,1.4],[-0.4,1.2],[0,0],[0,2],[6,0],[2.566,-1.533],[2.5,-3.766],[2.733,-6.8],[0,0],[0,1.867],[5.733,0],[2.133,-1.6],[1.266,-3.666],[0,0],[0,0],[0,0],[-0.967,1.167],[-1.267,0],[0,-1.2],[0.4,-1.2],[0,0],[0,0],[0,0],[-2.867,6.634],[-2.834,4.067],[-2,0],[0,-1.533],[0.6,-1.8],[0,0],[0,-2.133],[-0.867,-1.266],[-3.734,0],[-2.4,6.867],[0,0]],"o":[[0,0],[-1.067,3],[-1.034,1.134],[-1.267,0],[0,-0.733],[0,0],[0.866,-2.733],[0,-5.333],[-3.134,0],[-2.567,1.534],[-2.5,3.767],[0,0],[0.533,-2],[0,-5.466],[-3.067,0],[-2.134,1.6],[0,0],[0,0],[0,0],[1.066,-2.933],[0.966,-1.166],[1.133,0],[0,0.934],[0,0],[0,0],[0,0],[2.133,-7.333],[2.866,-6.633],[2.833,-4.066],[1.266,0],[0,1.067],[0,0],[-1.067,3.134],[0,1.867],[1.6,2.2],[6.533,0],[0,0],[0,0]],"v":[[54,-16.2],[52.2,-11.4],[49.05,-5.2],[45.9,-3.5],[44,-5.6],[44.6,-8.5],[54.4,-38],[55.7,-45.1],[46.7,-53.1],[38.15,-50.8],[30.55,-42.85],[22.7,-27],[25.8,-39.1],[26.6,-44.9],[18,-53.1],[10.2,-50.7],[5.1,-42.8],[2.4,-35.2],[4.3,-35.2],[6.2,-40.3],[9.25,-46.45],[12.6,-48.2],[14.3,-46.4],[13.7,-43.2],[1.6,0],[15.7,0],[17,-5],[24.5,-25.95],[33.05,-42],[40.3,-48.1],[42.2,-45.8],[41.3,-41.5],[32.3,-14.5],[30.7,-6.6],[32,-1.9],[40,1.4],[53.4,-8.9],[55.9,-16.2]],"c":true},"ix":2},"nm":"n","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"n","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Playfair Display"},{"ch":"h","size":48,"style":"Bold Italic","w":57,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[0,0],[0,0],[2.2,0],[0,1.4],[-0.4,1.2],[0,0],[0,2.134],[1.466,1.434],[3.133,0],[3.3,-2.933],[3.4,-7.533],[0,0],[3.7,-0.666],[4.666,-0.066],[0,0],[-1.034,-0.6],[0,-1.333],[0.333,-1.2],[0,0],[0,0],[0,0],[0,0],[-0.067,0.067],[0,0],[-2.667,5.867],[-2.567,3.467],[-1.867,0],[0,-1.466],[0.6,-1.933],[0,0],[0,-2.4],[-6.067,0],[-2.4,6.867],[0,0]],"o":[[0,0],[-1.934,5.267],[-1.334,0],[0,-0.733],[0,0],[0.933,-2.6],[0,-2.466],[-1.467,-1.433],[-4.2,0],[-3.3,2.934],[0,0],[-3.467,1.334],[-3.7,0.667],[0,0],[2.466,0],[1.033,0.6],[0,0.667],[0,0],[0,0],[0,0],[0,0],[0,-0.133],[0,0],[2.2,-6.933],[2.666,-5.866],[2.566,-3.466],[1.266,0],[0,1],[0,0],[-1,2.8],[0,5.4],[6.533,0],[0,0],[0,0]],"v":[[50.6,-16.2],[48.8,-11.4],[42.6,-3.5],[40.6,-5.6],[41.2,-8.5],[51,-38],[52.4,-45.1],[50.2,-50.95],[43.3,-53.1],[32.05,-48.7],[22,-33],[35.6,-79.5],[24.85,-76.5],[12.3,-75.4],[11.7,-73.3],[16.95,-72.4],[18.5,-69.5],[18,-66.7],[-1.8,0],[12.3,0],[12.6,-1.1],[12.6,-1],[12.7,-1.3],[15.1,-9.7],[22.4,-28.9],[30.25,-42.9],[36.9,-48.1],[38.8,-45.9],[37.9,-41.5],[29,-14.5],[27.5,-6.7],[36.6,1.4],[50,-8.9],[52.5,-16.2]],"c":true},"ix":2},"nm":"h","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"h","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Playfair Display"},{"ch":" ","size":48,"style":"Bold Italic","w":25.5,"data":{},"fFamily":"Playfair Display"},{"ch":"f","size":48,"style":"Bold Italic","w":34.1,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[4.133,0],[3.733,-3.066],[1.866,-3.566],[1.466,-5.4],[0,0],[0,0],[0,0],[0,0],[-5.6,0.066],[0,0],[0,0],[0,0],[0,0],[0,0],[-0.867,2.334],[-1.2,1.067],[-2,0],[-0.6,-0.233],[-0.334,-0.4],[1.4,-1.733],[0,-2.2],[-1.134,-0.933],[-2,0],[-1.767,1.8],[0,2.2],[2.333,1.734]],"o":[[-5.667,0],[-2.534,2.067],[-1.867,3.567],[0,0],[0,0],[0,0],[0,0],[4.067,-0.867],[0,0],[0,0],[0,0],[0,0],[0,0],[1.133,-4.266],[0.866,-2.333],[1.533,-1.333],[0.733,0],[0.6,0.234],[-2.334,0.867],[-1.4,1.734],[0,1.734],[1.133,0.934],[2.6,0],[1.766,-1.8],[0,-2.933],[-2.334,-1.733]],"v":[[40.1,-78.2],[26,-73.6],[19.4,-65.15],[14.4,-51.7],[6.1,-51.7],[5.5,-49.7],[13.9,-49.7],[-4.5,18.8],[10,17.4],[28,-49.7],[38.6,-49.7],[39.2,-51.7],[28.5,-51.7],[30.6,-59.4],[33.6,-69.3],[36.7,-74.4],[42,-76.4],[44,-76.05],[45.4,-75.1],[39.8,-71.2],[37.7,-65.3],[39.4,-61.3],[44.1,-59.9],[50.65,-62.6],[53.3,-68.6],[49.8,-75.6]],"c":true},"ix":2},"nm":"f","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"f","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Playfair Display"},{"ch":"r","size":48,"style":"Bold Italic","w":47,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[2.533,0],[2.566,-2.566],[2.466,-6.333],[0,0],[0,1.934],[5.133,0],[2.466,-6.866],[0,0],[0,0],[0,0],[-1,1.2],[-1.267,0],[0,-1.266],[0.333,-1.066],[0,0],[0,0],[0,0],[-3.534,4.934],[-3.4,0],[-0.267,-0.1],[-0.134,0],[1.6,-1.9],[0,-2.333],[-1.067,-1.033],[-1.934,0],[-1.834,2.034],[0,2.867],[1.433,1.5]],"o":[[-3.6,0],[-2.567,2.567],[0,0],[0.533,-2],[0,-5.4],[-6.734,0],[0,0],[0,0],[0,0],[1.066,-2.866],[1,-1.2],[1.066,0],[0,1],[0,0],[0,0],[0,0],[3.666,-12.666],[3.533,-4.933],[0.2,0],[0.266,0.1],[-2.334,0.534],[-1.6,1.9],[0,1.934],[1.066,1.034],[2.666,0],[1.833,-2.033],[0,-2.4],[-1.434,-1.5]],"v":[[41.7,-53.1],[32.45,-49.25],[24.9,-35.9],[25.7,-39.1],[26.5,-45],[18.8,-53.1],[5,-42.8],[2.3,-35.2],[4.2,-35.2],[6.1,-40.3],[9.2,-46.4],[12.6,-48.2],[14.2,-46.3],[13.7,-43.2],[1.5,0],[15.6,0],[20,-17.1],[30.8,-43.5],[41.2,-50.9],[41.9,-50.75],[42.5,-50.6],[36.6,-46.95],[34.2,-40.6],[35.8,-36.15],[40.3,-34.6],[47.05,-37.65],[49.8,-45],[47.65,-50.85]],"c":true},"ix":2},"nm":"r","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"r","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Playfair Display"},{"ch":"v","size":48,"style":"Bold Italic","w":52.5,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[-2.867,-1.4],[2.133,-4.6],[3.266,-3.066],[3.933,0],[0.733,1.2],[0,2.534],[-2.934,7.7],[-4.934,7.134],[0,0],[0,0],[2.733,0],[0.833,0.3],[1,0.6],[0.6,0.234],[0.8,0],[1.933,-7.066],[0,0],[0,0],[0,0],[-0.567,0.7],[-0.934,0],[-1.067,-0.6],[-0.867,0],[-0.934,0.567],[-1.4,1.2],[-1.234,0.734],[-1.6,0.2],[0,-11],[-2.2,-2.266],[-5,0],[-4.8,4.334],[-2.534,6.634],[-0.334,6.734],[1.1,2.034],[2.4,0],[1.166,-1.2],[0,-2.133],[-1.834,-2.333]],"o":[[-0.8,4.534],[-2.134,4.6],[-3.267,3.067],[-1.534,0],[-0.734,-1.2],[0,-5.733],[2.933,-7.7],[0,0],[0,0],[-2.134,1.4],[-1.2,0],[-0.834,-0.3],[-0.934,-0.533],[-0.6,-0.233],[-4.334,0],[0,0],[0,0],[0,0],[0.6,-1.8],[0.566,-0.7],[0.666,0],[1.2,0.667],[1,0],[0.933,-0.566],[1.666,-1.4],[1.233,-0.733],[-17.867,14.667],[0,3.4],[2.2,2.266],[6.666,0],[4.8,-4.333],[2.533,-6.633],[0.133,-3.6],[-1.1,-2.033],[-2,0],[-1.167,1.2],[0,2.867],[1.833,2.334]],"v":[[46.7,-32.9],[42.3,-19.2],[34.2,-7.7],[23.4,-3.1],[20,-4.9],[18.9,-10.5],[23.3,-30.65],[35.1,-52.9],[33,-53.9],[32,-52],[24.7,-49.9],[21.65,-50.35],[18.9,-51.7],[16.6,-52.85],[14.5,-53.2],[5.1,-42.6],[2.9,-35.3],[4.8,-35.3],[5.6,-38],[7.35,-41.75],[9.6,-42.8],[12.2,-41.9],[15.3,-40.9],[18.2,-41.75],[21.7,-44.4],[26.05,-47.6],[30.3,-49],[3.5,-10.5],[6.8,-2],[17.6,1.4],[34.8,-5.1],[45.8,-21.55],[50.1,-41.6],[48.65,-50.05],[43.4,-53.1],[38.65,-51.3],[36.9,-46.3],[39.65,-38.5]],"c":true},"ix":2},"nm":"v","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"v","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Playfair Display"},{"ch":"m","size":48,"style":"Bold Italic","w":85.6,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[0,0],[0,0],[2.266,0],[0,1.4],[-0.4,1.267],[0,0],[0,2.2],[1.333,1.4],[2.8,0],[3.433,-3.2],[3.333,-7.933],[0,0],[0,1.867],[5.266,0],[3.433,-3.466],[3.266,-8.133],[0,0],[0,1.734],[1.266,1.467],[2.866,0],[2.366,-1.6],[1.333,-3.666],[0,0],[0,0],[0,0],[-0.967,1.234],[-1.2,0],[0,-1.4],[0.333,-1.133],[0,0],[0,0],[0,0],[0,0],[-3.767,6.934],[-3,0],[0,-1.266],[0.533,-1.733],[0,0],[0,0],[0,0],[0,0],[-3.834,6.567],[-2.734,0],[0,-1.333],[0.533,-1.733],[0,0],[0,-2.2],[-0.734,-1.133],[-3.867,0],[-2.4,6.867],[0,0]],"o":[[0,0],[-1.934,5.267],[-1.267,0],[0,-0.666],[0,0],[0.933,-2.666],[0,-2.4],[-1.334,-1.4],[-4.467,0],[-3.434,3.2],[0,0],[0.8,-3],[0,-5.2],[-4.8,0],[-3.434,3.467],[0,0],[0.6,-2.266],[0,-2.4],[-1.267,-1.466],[-2.934,0],[-2.367,1.6],[0,0],[0,0],[0,0],[1.066,-2.8],[0.966,-1.233],[1.2,0],[0,0.8],[0,0],[0,0],[0,0],[0,0],[3.333,-11.133],[3.766,-6.933],[1.066,0],[0,1],[0,0],[0,0],[0,0],[0,0],[3.866,-12.533],[3.833,-6.566],[0.933,0],[0,0.934],[0,0],[-1,3],[0,1.867],[1.466,2.4],[6.6,0],[0,0],[0,0]],"v":[[79.2,-16.2],[77.4,-11.4],[71.1,-3.5],[69.2,-5.6],[69.8,-8.5],[79.6,-38],[81,-45.3],[79,-51],[72.8,-53.1],[60.95,-48.3],[50.8,-31.6],[52.6,-38],[53.8,-45.3],[45.9,-53.1],[33.55,-47.9],[23.5,-30.5],[25.7,-39.1],[26.6,-45.1],[24.7,-50.9],[18.5,-53.1],[10.55,-50.7],[5,-42.8],[2.3,-35.2],[4.2,-35.2],[6.1,-40.3],[9.15,-46.35],[12.4,-48.2],[14.2,-46.1],[13.7,-43.2],[1.5,0],[15.6,0],[18.2,-10.1],[18.2,-10],[28.85,-37.1],[39,-47.5],[40.6,-45.6],[39.8,-41.5],[27.6,0],[41.9,0],[44.5,-9.3],[44.5,-9],[56.05,-37.65],[65.9,-47.5],[67.3,-45.5],[66.5,-41.5],[57.5,-14.5],[56,-6.7],[57.1,-2.2],[65.1,1.4],[78.6,-8.9],[81.1,-16.2]],"c":true},"ix":2},"nm":"m","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"m","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Playfair Display"},{"ch":"s","size":48,"style":"Bold Italic","w":42,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[1,0.467],[-0.334,1.167],[0,1.467],[1.033,1.467],[1.733,0],[1,-1.4],[0,-2],[-3.133,-1.833],[-4.734,0],[-2.834,1.333],[-1.534,2.3],[0,2.934],[0.9,2.267],[2.133,3.534],[0,0],[0.7,1.467],[0,1.8],[-1.367,1.5],[-2.4,0],[-0.867,-0.533],[0.6,-1.433],[0,-1.666],[-1,-1.266],[-1.667,0],[-1.067,1.534],[0,1.867],[2.9,1.567],[4.333,0],[3.233,-2.733],[0,-4.333],[-0.634,-1.833],[-1.3,-2],[-0.267,-0.4],[-0.934,-2.266],[0,-2.133],[1.533,-1.533],[2.533,0]],"o":[[0.666,-1.666],[0.333,-1.166],[0,-2.266],[-1.034,-1.466],[-1.734,0],[-1,1.4],[0,4.067],[3.133,1.833],[3.8,0],[2.833,-1.333],[1.533,-2.3],[0,-2.266],[-0.9,-2.266],[0,0],[-1.667,-2.666],[-0.7,-1.466],[0.066,-2.666],[1.366,-1.5],[1.466,0],[-0.867,1],[-0.6,1.434],[0,1.934],[1,1.267],[1.933,0],[1.066,-1.533],[0,-3.8],[-2.9,-1.566],[-5.667,0],[-3.234,2.734],[0,1.8],[0.633,1.834],[1.3,2],[1.866,2.867],[0.933,2.267],[0,2.667],[-1.534,1.534],[-1.6,0]],"v":[[7.4,-1.4],[8.9,-5.65],[9.4,-9.6],[7.85,-15.2],[3.7,-17.4],[-0.4,-15.3],[-1.9,-10.2],[2.8,-1.35],[14.6,1.4],[24.55,-0.6],[31.1,-6.05],[33.4,-13.9],[32.05,-20.7],[27.5,-29.4],[26.1,-31.5],[22.55,-37.7],[21.5,-42.6],[23.65,-48.85],[29.3,-51.1],[32.8,-50.3],[30.6,-46.65],[29.7,-42],[31.2,-37.2],[35.2,-35.3],[39.7,-37.6],[41.3,-42.7],[36.95,-50.75],[26.1,-53.1],[12.75,-49],[7.9,-38.4],[8.85,-32.95],[11.75,-27.2],[14.1,-23.6],[18.3,-15.9],[19.7,-9.3],[17.4,-3],[11.3,-0.7]],"c":true},"ix":2},"nm":"s","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"s","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Playfair Display"},{"ch":"y","size":48,"style":"Bold Italic","w":48.2,"data":{"shapes":[{"ty":"gr","it":[{"ind":0,"ty":"sh","ix":1,"ks":{"a":0,"k":{"i":[[4.4,0],[1.2,-1.233],[0,-2.066],[-1.734,-2.266],[-2.734,-1.466],[2.133,-4.366],[2.933,-4.2],[0,0],[1.6,1.6],[2.866,0],[2.033,-1.533],[1.333,-3.8],[0,0],[0,0],[0,0],[-0.667,1],[-0.734,0],[-0.367,-0.633],[-0.334,-1.866],[0,0],[4.8,-2.334],[3.933,0],[1.3,-1.167],[0,-1.8],[-1.233,-1],[-2.133,0],[-2.667,1],[-4.1,3.133],[-3.4,4.066],[-3.867,8.3],[0,6]],"o":[[-2.067,0],[-1.2,1.234],[-0.067,2.6],[1.733,2.267],[-1,4],[-2.134,4.367],[0,0],[-0.6,-4],[-1.6,-1.6],[-2.8,0],[-2.034,1.534],[0,0],[0,0],[0,0],[1.066,-2.933],[0.666,-1],[0.666,0],[0.366,0.634],[0,0],[-3.867,3.8],[-3.2,-4.6],[-2,0],[-1.3,1.166],[0,1.733],[1.234,1],[2.067,0],[4.333,-1.467],[4.1,-3.134],[5.4,-6.466],[3.866,-8.3],[0,-6.066]],"v":[[40.2,-53.1],[35.3,-51.25],[33.5,-46.3],[36,-39],[42.7,-33.4],[38,-20.85],[30.4,-8],[25.8,-42.3],[22.5,-50.7],[15.8,-53.1],[8.55,-50.8],[3.5,-42.8],[1,-35.5],[2.9,-35.5],[4.7,-40.4],[7.3,-46.3],[9.4,-47.8],[10.95,-46.85],[12,-43.1],[19.8,4.7],[6.8,13.9],[-3.9,7],[-8.85,8.75],[-10.8,13.2],[-8.95,17.3],[-3.9,18.8],[3.2,17.3],[15.85,10.4],[27.1,-0.4],[41,-22.55],[46.8,-44]],"c":true},"ix":2},"nm":"y","mn":"ADBE Vector Shape - Group","hd":false}],"nm":"y","np":3,"cix":2,"ix":1,"mn":"ADBE Vector Group","hd":false}]},"fFamily":"Playfair Display"}]};

	$testimonialParams = {
        container: document.getElementById('home__animation'),
        renderer: 'svg',
        loop: false,
        autoplay: true,
        animationData: $sfhsHome,
         rendererSettings: {
			 className: 'homeAnimation',
		 }
	};

	
	
	var vid = videojs("homeVideo");
	vid.on('ended' , function(){
		$('.heroVideo__container').fadeOut(2000);
		$testimonialAnim = lottie.loadAnimation($testimonialParams);
		// $('.homeAnimation').fadeIn(1000);
		// $('.slideDots').addClass('homeShow');
		// $('.homeScroll__btn').addClass('homeShow');
		// $('.replayBtn').removeClass('opacity_hidden');
		// $('#heroMobileAnimate').addClass('homeShow__mobile');
		if($(window).width() < 540){
			$('#heroMobileAnimate').addClass('homeShow__mobile');
			$('.replayBtn').removeClass('opacity_hidden');
		} else {
			$('.slideDots').addClass('homeShow');
			$('.homeScroll__btn').addClass('homeShow');
			$(".home__heroSection--text").fadeOut("slow");
			$('.replayBtn').removeClass('opacity_hidden');
			$('#home__animation').addClass('homeShow');
			$('.homeAnimation').fadeIn(1000);
		}
	});

	vid.on('play' , function(){
		$home__heroText = $('.home__heroSection--text');
		setTimeout(function(){
			var tl = new TweenLite.to($home__heroText , 2 , { left : 200 , ease: Power3.easeOut });
			$('.skipButton').removeClass('opacity_hidden');
		},2000)
		setTimeout(function(){
			$(".home__heroSection--text").fadeOut("slow");
		},8000)
	});

	
	$('.skipBtn').click(function(){
		
		$('.heroVideo__container').fadeOut(2000);
		$testimonialAnim = lottie.loadAnimation($testimonialParams);
		// $testimonialAnim.setProgress(0);
		
		setTimeout(function(){ vid.pause(); }, 2000);
		if($(window).width() < 540){
			$('#heroMobileAnimate').addClass('homeShow__mobile');
			$('.replayBtn').removeClass('opacity_hidden');
		} else {
			$('.slideDots').addClass('homeShow');
			$('.homeScroll__btn').addClass('homeShow');
			$(".home__heroSection--text").fadeOut("slow");
			$('.replayBtn').removeClass('opacity_hidden');
			$('#home__animation').addClass('homeShow');
			$('.homeAnimation').fadeIn(1000);
		}
		
		
	})

	$('.dotsSelect').click(function(){
		btnId = $(this).find('button').attr('id');
		if(btnId === 'dot-01'){
			
			$testimonialAnim.goToAndStop(5000);
			$('.dotsSelect').removeClass('slick-active');
			$(this).addClass('slick-active');
		}
		else if(btnId === 'dot-02'){
			
			$testimonialAnim.goToAndStop(8000);
			$('.dotsSelect').removeClass('slick-active');
			$(this).addClass('slick-active');
		}
		else if(btnId === 'dot-03'){
			$testimonialAnim.goToAndStop(12000);
			$('.dotsSelect').removeClass('slick-active');
			$(this).addClass('slick-active');
		}
		else if(btnId === 'dot-04'){
			$testimonialAnim.goToAndStop(15000);
			$('.dotsSelect').removeClass('slick-active');
			$(this).addClass('slick-active');
		}
		else{
			$testimonialAnim.goToAndStop(18000);
			$('.dotsSelect').removeClass('slick-active');
			$(this).addClass('slick-active');
		}
	});
});

var video_src = $('.heroVideoSrc');
	if($(window).width() >= 480 ){
		video_src.html('<source src="<?php echo CFS()->get('hero_desktop_video' , $post_ID); ?>" type="video/mp4" >');
	}
	else{
		video_src.html('<source src="<?php echo CFS()->get('hero_mobile_video' , $post_ID); ?>" type="video/mp4" >');
	}

$('.replayBtn').on('click' , function(){
	var vid = videojs("homeVideo");
	vid.currentTime(0);
	$testimonialAnim.destroy();
	$('.heroVideo__container .o-play-btn').addClass('opacity_hidden');
	$('.slideDots').removeClass('homeShow');
	$('.homeScroll__btn').removeClass('homeShow');
	$('.heroMobile__animate').removeClass('homeShow__mobile');
	$('.homeAnimation').fadeOut(1000);
	$('.replayBtn').addClass('opacity_hidden');
	$('.heroVideo__container').fadeIn(2000);
	$('#home__animation').removeClass('homeShow');
	setTimeout(function(){ vid.play(); }, 1000);
})


	
</script>