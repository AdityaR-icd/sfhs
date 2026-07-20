<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SFS
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<?php wp_head(); ?>
	<!-- End of title of the page -->

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="theme-color" content="#d0021b">
	<!-- End of Meta Tag -->
	<script>
		
		var scrollTopValue = 50;
		// Safari 3.0+ "[object HTMLElementConstructor]" 
		var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);
		
        // Preloader script
		$(window).on( "load", function (){
			// setTimeout(function(){
				$('#status').fadeOut(); // will first fade out the loading animation 
				$('#preloader').delay(1000).fadeOut('slow'); // will fade out the white DIV that covers the website. 
				$('body').delay(1000).css({'overflow':'visible'});
			// }, 3000);
		});

		// console.log(Cookies.get('notification'));

		if(Cookies.get('notification') == undefined){
			Cookies.set('notification', '0' , { path: '/' });
		}

	</script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-140148907-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-140148907-1');
	</script>

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/resources/img/logo/favicon/favicon.png" />
	<!-- <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" sizes="192x192" />
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" /> -->

	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i|Work+Sans:400,500,600,800" rel="stylesheet">
	<!-- End of Font Style -->

	<!-- Code snippet to speed up Google Fonts rendering: googlefonts.3perf.com -->
		<!-- <link rel="dns-prefetch" href="https://fonts.gstatic.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
		<link rel="preload" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i|Work+Sans:400,500,600,800" as="fetch" crossorigin="anonymous">
		<script type="text/javascript">
			!function(e,n,t){"use strict";var o="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i|Work+Sans:400,500,600,800",r="__3perf_googleFontsStylesheet";function c(e){(n.head||n.body).appendChild(e)}function a(){var e=n.createElement("link");e.href=o,e.rel="stylesheet",c(e)}function f(e){if(!n.getElementById(r)){var t=n.createElement("style");t.id=r,c(t)}n.getElementById(r).innerHTML=e}e.FontFace&&e.FontFace.prototype.hasOwnProperty("display")?(t[r]&&f(t[r]),fetch(o).then(function(e){return e.text()}).then(function(e){return e.replace(/@font-face {/g,"@font-face{font-display:swap;")}).then(function(e){return t[r]=e}).then(f).catch(a)):a()}(window,document,localStorage);
			
		</script> -->
	<!-- End of code snippet for Google Fonts -->


	
	
	<style>
		/*=========Preloader==========*/
		/* Preloader */

		#preloader {
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: #fff;
			/* change if the mask should have another color then white */
			z-index: 999999;
			/* makes sure it stays on top */
		}
		
		#status {
			width: 40px;
			height: 40px;
			position: fixed;
			left: 50%;
			top: 50%;
			background-repeat: no-repeat;
			background-position: center;
			transform: translate(-50%, -50%);
			transform: -webkit-translate(-50%, -50%);
			transform: -moz-translate(-50%, -50%);
			transform: -ms-translate(-50%, -50%);
			/* margin: -50px 0 0 -50px; */
			/* -webkit-transform: translate(0, -50%);
    		transform: translate(0, -50%);  */
			/* background: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwcHgiICBoZWlnaHQ9IjEwMHB4IiAgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgMTAwIDEwMCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ieE1pZFlNaWQiIGNsYXNzPSJsZHMtcm9sbGluZyIgc3R5bGU9ImJhY2tncm91bmQ6IHJnYmEoMCwgMCwgMCwgMCkgbm9uZSByZXBlYXQgc2Nyb2xsIDAlIDAlOyI+PGNpcmNsZSBjeD0iNTAiIGN5PSI1MCIgZmlsbD0ibm9uZSIgbmctYXR0ci1zdHJva2U9Int7Y29uZmlnLmNvbG9yfX0iIG5nLWF0dHItc3Ryb2tlLXdpZHRoPSJ7e2NvbmZpZy53aWR0aH19IiBuZy1hdHRyLXI9Int7Y29uZmlnLnJhZGl1c319IiBuZy1hdHRyLXN0cm9rZS1kYXNoYXJyYXk9Int7Y29uZmlnLmRhc2hhcnJheX19IiBzdHJva2U9IiNlYzFkMjQiIHN0cm9rZS13aWR0aD0iMiIgcj0iMjAiIHN0cm9rZS1kYXNoYXJyYXk9Ijk0LjI0Nzc3OTYwNzY5Mzc5IDMzLjQxNTkyNjUzNTg5NzkzIj48YW5pbWF0ZVRyYW5zZm9ybSBhdHRyaWJ1dGVOYW1lPSJ0cmFuc2Zvcm0iIHR5cGU9InJvdGF0ZSIgY2FsY01vZGU9ImxpbmVhciIgdmFsdWVzPSIwIDUwIDUwOzM2MCA1MCA1MCIga2V5VGltZXM9IjA7MSIgZHVyPSIxcyIgYmVnaW49IjBzIiByZXBlYXRDb3VudD0iaW5kZWZpbml0ZSI+PC9hbmltYXRlVHJhbnNmb3JtPjwvY2lyY2xlPjwvc3ZnPg==); */
			background: url(/wp-content/themes/sfhs-theme/assets/resources/icons/loader.gif) no-repeat ;
			/* background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/PjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMjAwMTA5MDQvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvVFIvMjAwMS9SRUMtU1ZHLTIwMDEwOTA0L0RURC9zdmcxMC5kdGQiPjxzdmcgdmVyc2lvbj0iMS4wIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxLjAwMDAwMHB0IiBoZWlnaHQ9IjEuMDAwMDAwcHQiIHZpZXdCb3g9IjAgMCAxLjAwMDAwMCAxLjAwMDAwMCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ieE1pZFlNaWQgbWVldCI+PGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMC4wMDAwMDAsMS4wMDAwMDApIHNjYWxlKDAuMTAwMDAwLC0wLjEwMDAwMCkiZmlsbD0iIzAwMDAwMCIgc3Ryb2tlPSJub25lIj48L2c+PC9zdmc+); */
		}
		
	</style>
	
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	
</head>

<body <?php body_class(); ?>>
			<div id="preloader">
				<div id="status">
				</div>
			</div>
	
	<div id="page" class="site">
	
		<!---	====================================================
							HEADER SECTION
				====================================================	--->
				
		<header id="masthead" class="site-header">
			<nav id="site-navigation" class="main-navigation navbar nav_font site-header">
				<div class="container m-fullwidth navbar-menu xs__margin ">
				
					<div class="row">
						<div class="col-md-2 col-xs-6 menuItems">
							<!-- Brand Logo -->
							<!-- <a href="index.php" class="navbar-brand ">
								<?php 
									
									// $custom_logo_id = get_theme_mod( 'custom_logo' );
									// $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
									// if ( has_custom_logo() ) {
									// 	echo '<img src="'. esc_url( $logo[0] ) .'">';
									// } else {
									// 	echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
									// }
								
								?>

							</a> -->
							<!-- End of Brand Logo -->
							
							<a href="<?php echo get_site_url(); ?>" id="logo">
								<img src="<?php bloginfo("template_directory")?>/assets/resources/img/logo/mobile-logo/mobile-header-logo.svg" class="logo-mobile" alt="">
								<img src="<?php bloginfo("template_directory")?>/assets/resources/img/logo/header-logo.svg" class="logo-dekstop" alt="">
							</a>


						</div>

						<div class="col-md-8 visible-lg menuItems">
							<div class="">
								<!-- Navbar Header -->
								<?php
									wp_nav_menu(
									array(
									'theme_location' => 'main-navigation',
									'container_class' => 'navigation',
									)
								);
								?>
							</div>
							
						</div>
						
						<div class="col-md-1 visible-lg menuItems search__btn-padding">
							<span class="search__btn">search</span>
						</div>
						
						<div class="col-md-1 col-xs-6 pull-right hamburger_icon-padding">
                        <?php

                            $relargs = array(
                                'post_type' =>  array('announcement'),
                                'orderby' => 'publish_date', 
                                'order' => 'ASC',
                            );

                            $relposts = get_posts( $relargs );

                            if($relposts){
                        ?>
                                <!-- Notification Bell -->
                                <div class="notification-container hidden-lg">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="notification-counter"></span>
                                </div>
                                <!-- End of Notification Bell -->
                        <?php
                            }
                        ?>
							<a id="hamburger-icon" href="#" title="Menu">
								<div class="line line-1"></div>
								<div class="line line-2"></div>
								<div class="line line-3"></div>
								<span class="hamburger-menu-text visible-lg" id="open">MENU</span>		
							</a>
						<!-- End of Side Menu Icon -->
						</div>
						
					</div>
				</div>

			

				<div class="notification-list">
					<div class="container">
							<div class="notificationContainer">
								<span class="notification__close"></span>
								<?php 
									$relargs = array(
										'post_type' =>  array('announcement'),
										'orderby' => 'publish_date', 
										'order' => 'ASC',
									);

									$relposts = get_posts( $relargs );
									
									foreach( $relposts as $current_post ) {
								?>
										<div class="announcementHeading"><?php echo apply_filters( 'post_title', $current_post->post_title ); ?></div>
										<div>
											<?php echo apply_filters('the_content', $current_post->post_content); ?>
										</div>
										<span class="borderBottom"></span>
								<?php 
									}
								?>
							</div>
					</div>
				</div>
				
				<div class="search__container">
					<div class="container">
						<div class="row">
							<div class="col-md-10">
								<form action="/" method="get">
									<input type="submit" class="searchBtn" value="">
									<input type="text" placeholder="What are you looking for?" class="search__input" name="s" id="search" value="<?php the_search_query(); ?>" required>
								</form>
							</div>
							<div class="col-md-1">
								<span class="close__search">close</span>
							</div>
						</div>
					</div>
				</div>
				
				<div class="mega__menu ">
					<div class="whiteBlock">
									
					</div>

					<div class="container mega__menu-container mB__40 mobile__mB-40">
						<div class="row">
						<div class="home-link"><a href="<?php echo get_site_url(); ?>">Home</a></div>
							<div class="col-sm-12 search__mobile">
								<form action="/" method="get">
									<input type="submit" class="searchBtn" value="">
									<input type="text" placeholder="search the site" class="search__input" name="s" id="search" value="<?php the_search_query(); ?>" required>
								</form>
							</div>

							<div class="col-md-3 no-padding clear megaMenu__noPadding ">
								<div class="megaMenu__mPadding megaMenu__main-nav mainMenuAnimate">
									<?php 
										wp_nav_menu( array( 'theme_location' => 'main-navigation' , 'link_before' => '<span class="menu__head-grey">OUR</span> ' , 'menu_class' => 'menu__head-grey' ) );
									?>
								</div>
							</div>

							<div class="col-md-5 no-padding megaMenu__noPadding">

								
								<div class="col-md-6 no-padding megaMenu__noPadding">
									<div class="menu__submenu autoDropdown">
										<div class="menuList subMenuAnimate_1">
											<div class="menu__subhead"><span class=""><li>more about sfhs</li></span></div>
											
												
											<?php 
												wp_nav_menu( array( 'theme_location' => 'mega_menu-sub-1',
												'items_wrap'      => '<ul id="%1$s" class="inner">%3$s</ul>',
												'container'       => 'ul', ) );
											?>
										</div>				
										
									</div>

									<div class="menu__submenu subMenuPadding autoDropdown">
										<div class="menuList subMenuAnimate_1">
											<span class="menu__subhead "><li>process</li></span>
											<?php 
												wp_nav_menu( array( 'theme_location' => 'mega_menu-sub-2', 
												'items_wrap'      => '<ul id="%1$s" class="inner">%3$s</ul>',
												'container'       => 'ul',) );
											?>
										</div>
										
									</div>
									
									<div class="menu__submenu subMenuPadding__3 autoDropdown">
										<div class="menuList subMenuAnimate_1">
											<span class="menu__subhead "><li>HAPPENINGS</li></span>
											<?php 
												wp_nav_menu( array( 'theme_location' => 'mega_menu-sub-3',
												'items_wrap'      => '<ul id="%1$s" class="inner">%3$s</ul>',
												'container'       => 'ul', ) );
											?>
										</div>	
									
									</div>

								</div>
								<div class="col-md-6 no-padding megaMenu__noPadding">
									<div class="menu__submenu subMenuPadding__2 autoDropdown">
										<div class="menuList subMenuAnimate_2">
											<span class="menu__subhead "><li>LIFE AT SFHS</li></span>
											<?php 
												wp_nav_menu( array( 'theme_location' => 'mega_menu-sub-4',
												'items_wrap'      => '<ul id="%1$s" class="inner">%3$s</ul>',
												'container'       => 'ul', ) );
											?>
										</div>
										
									</div>

									<div class="menu__submenu connectFont subMenuPadding__3 autoDropdown">
										<div class="menuList subMenuAnimate_2">
											<span class="menu__subhead"><li>connect</li></span>
											<?php 
												wp_nav_menu( array( 'theme_location' => 'mega_menu-sub-5',
												'items_wrap'      => '<ul id="%1$s" class="inner">%3$s</ul>',
												'container'       => 'ul', ) );
											?>
										</div>
									</div>
								</div>
								
								
								
								
							</div>

							
							
							<div class="col-md-4 fadeInAnimate">
								<!-- <div class="hidden-xs hidden-sm">
									<span class="menu__subhead">WATCH OUR STORY</span>
								</div> -->
								<!-- <div class="menu__submenu megaMenu__video">
									<div class="pos_relative img-position inView mouseHover" >
										<video class="video-js vjs-16-9" preload="none" poster= "<?php //bloginfo("template_directory")?>/assets/resources/img/poster.jpg" data-setup='{ "controls": true, "autoplay": false }' playsinline>
											<source src="<?php //echo  bloginfo("template_directory")?>/assets/resources/videos/aim/video-01.mp4" type="video/mp4">
										</video> 
									</div>
								</div> -->
								<div class="fadeInAnimate">
									<div class="latestNewsPadding">
										<div class="hidden-xs hidden-sm">
											<span class="menu__subhead">LATEST NEWS</span>
										</div>

										<?php 
											$relargs = array(
												'category_name'    => 'news',
												'orderby' => 'publish_date', 
												'order' => 'DSC',
												'numberposts' => 2,
												'post_status'       => 'publish',
											);

											$relposts = get_posts( $relargs );
											
											foreach( $relposts as $current_post ) {
												
												$post_id = $current_post->ID;
										?>		<a href="<?php echo esc_url(get_permalink( $post_id )); ?>">
													<div class="row latest__post hidden-xs hidden-sm">
														<div class="col-md-5 ">
															<span><img src="<?php echo get_the_post_thumbnail_url( $post_id ); ?>" class="menu__post-thumb" alt=""></span>
														</div>
														<div class="col-md-7 megaMenu__padding">
															<span class="post__date"><?php echo get_the_date( 'dS F Y', $post_id ); ?></span>
															<span class="post__desc"><?php echo $current_post->post_title; ?></span>
														</div>
													</div>
												</a>
										<?php
												
											}
										?>
										<div class="newsAll hidden-xs hidden-sm"><a href="<?php echo get_home_url(); ?>/category/news/">view all</a></div>
									</div>
								
								</div>
							</div>
							
						</div>

						

						<div class="row ">

							<div class="col-md-3 col-md-push-9 autoDropdown fadeInAnimate-2 no-padding">
								
							</div>

							

							
							
						</div>
							
					</div>
				
					<div class="container fadeInAnimate">
						<span class="menu__credits">Site Content, Design, Art Direction and Development by <a href="https://www.icdindia.com" target="_blank" rel="noreferrer">itu chaudhuri design</a> | Photography by Palash Jain | Cinematography by Kamki Diengdoh | Film Direction and edited by Tarun Bhartiya | © Copyright 2019 Strawberry Fields High School |</span>
					</div>
				</div>

			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->



		<div id="content" class="site-content">
			