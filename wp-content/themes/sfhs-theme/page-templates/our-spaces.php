<?php 
/* Template Name: Our Spaces  */
?>

<?php
get_header();

// One template, one page per campus. Content lives in a matching "Templates" CPT
// entry whose slug equals this page's slug (same convention as school.php), so
// each campus is edited separately. Falls back to the original `our-spaces`
// entry, which is what the single-campus version of this page always used.
$spaces_slug = get_post_field('post_name', get_post());
$my_posts    = get_page_by_path($spaces_slug, OBJECT, 'templates');
if (!$my_posts) {
	$my_posts = get_page_by_path('our-spaces', OBJECT, 'templates');
}
$post_ID = $my_posts->ID;

// Campus colour for the switcher only — New Chandigarh's active tab is green,
// Chandigarh's is red. This class goes on the .tabitem-wrapper rather than on
// #primary because `.greentheme h1/h3` (and `.redtheme h1/h3`) repaint every
// heading on the page; the spaces components keep their own colours.
$spaces_theme = ($spaces_slug === 'our-spaces-new-chandigarh') ? 'greentheme' : 'redtheme';

// Campus switcher shown above the hero title. Add a campus here (plus its page
// and matching "Templates" entry) and the nav picks it up on every spaces page.
$spaces_campuses = [
	'our-spaces'                 => 'SFHS, Chandigarh',
	'our-spaces-new-chandigarh'  => 'SFHS, New Chandigarh',
];

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


<div id="primary" class="content-area spacesPage spaces--<?php echo esc_attr($spaces_slug); ?>">
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
												<h2 class="head-nav">our spaces</h2>
												<span class="font--red aim__hero-text">Strawberry Fields High School building, is the fourth teacher in our core group of educators. This space is the inner sanctum of every </span>
											</div>
										</div>
									</div> -->

                <span class="hero__text-container" id="hero__text">
                    <!-- Campus switcher — sits directly above the heading. Same markup
										     as the school pages, so it picks up .tabitem / .activeTab. The
										     theme class is on the wrapper, not #primary, so the campus
										     colour reaches the active tab and nothing else. -->
                    <div class="spacesfirstComponent">
                        <div class="tabitem-wrapper <?php echo $spaces_theme; ?>">
                            <?php foreach ($spaces_campuses as $campus_slug => $campus_label) : ?>
                            <a class="tabitem <?php echo ($spaces_slug === $campus_slug) ? "activeTab" : ""; ?>"
                                href="<?php echo esc_url(home_url("/" . $campus_slug . "/")); ?>"><?php echo $campus_label; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <h2 class="head-nav"><?php echo get_the_title(); ?></h2>
                    <span class="aim__hero-text"><?php echo CFS()->get('hero_text', $post_ID); ?></span>

                </span>

                <div class="playIcon__center">
                    <video loop preload="none" poster="<?php echo CFS()->get('video_poster'  , $post_ID); ?>" class=""
                        muted id="aim__background-video" playsinline>

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
                                <img src="<?php bloginfo("template_directory")?>/assets/resources/icons/mute-icon.svg"
                                    id="tap__icon" alt="">
                                <span id="mute__text" class="hidden-xs hidden-sm">UNMUTE</span>
                            </span>
                            <span class="muteBtn">
                                <img src="<?php bloginfo("template_directory")?>/assets/resources/icons/unmute-icon.svg"
                                    id="tap__icon" alt="">
                                <span id="mute__text" class="hidden-xs hidden-sm">MUTE</span>
                            </span>

                        </div>
                    </a>
                </div>

            </div>
            <!--- end of background image and text --->

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
                        <span class="statsHeader">
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
                    <li
                        class="sticky-navbar-list <?php if($i == $j){ echo 'active';}else{ echo 'hidden-xs hidden-sm'; };  ?>">
                        <a href="#<?php echo $sectionID[$j]; ?>"><?php echo $row['click_to_text'] ;?></a>
                    </li>
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
                <div class="col-md-7 ">
                    <h2 class="head-nav sectionHeading"><?php echo CFS()->get('section_1_heading', $post_ID); ?></h2>
                </div>
            </div>
        </div>

        <?php
		$image = CFS()->get( 'carousel_1' , $post_ID);

		// Where the slides carry their own text, the copy beside the carousel
		// changes with the image rather than sitting there as one fixed block —
		// the same synced pair as Section 2. Campuses that leave the per-slide
		// text empty keep the single `carousel_1_text` block, so this is opt-in
		// per page and the layout is identical either way.
		// Tested on the raw value, not on strip_tags() of it: the theme's
		// the_content filter prefixes every wysiwyg field with an `<?xml ...>`
		// declaration, and strip_tags reads `<?` as an unterminated processing
		// instruction and throws the whole string away.
		$carousel_1_synced = false;
		foreach ( (array) $image as $row ) {
			if ( '' !== trim( $row['slide_text'] ?? '' ) ) {
				$carousel_1_synced = true;
				break;
			}
		}
		?>

        <section class="mB__160 mobile__mB-40">

            <div class="container ">
                <!-- Content 5 -->

                <div class="row pos_relative">
                    <div class="col-md-7 no-padding">
                        <div
                            class="spaces__angle <?php echo $carousel_1_synced ? 'spacesSection1__imgSlide' : 'fade_img'; ?>">
                            <?php foreach ( $image as $row ) : ?>
                            <div><img data-lazy="<?php echo $row['image']; ?>" class="img-responsive" alt=""></div>
                            <?php endforeach; ?>
                        </div>
                    </div>


                    <div class="col-md-5">
                        <?php if ( $carousel_1_synced ) : ?>
                        <div class="spacesSection1__textSlide">
                            <?php foreach ( $image as $row ) : ?>
                            <div>
                                <div class="content_padding-38 font--red spacesBlock__spacing anchorLink">
                                    <?php echo $row['slide_text'] ?? ''; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php else : ?>
                        <div class="content_padding-38 font--red spacesBlock__spacing anchorLink">
                            <?php echo CFS()->get('carousel_1_text', $post_ID); ?>
                        </div>
                        <?php endif; ?>
                    </div>

                </div>

                <?php if ( $carousel_1_synced ) : ?>
                <!-- Slick drops its dots inside the slider, which would put them
                     under the image alone. They belong under the pair, so they
                     are appended here instead (see `appendDots` in script.js). -->
                <div class="spacesSection1__dots"></div>
                <?php endif; ?>

                <!-- End of Content 5 -->
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
                    <li
                        class="sticky-navbar-list <?php if($i == $j){ echo 'active';}else{ echo 'hidden-xs hidden-sm'; };  ?>">
                        <a href="#<?php echo $sectionID[$j]; ?>"><?php echo $row['click_to_text'] ;?></a>
                    </li>
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
                        <h2 class="head-nav sectionHeading"><?php echo CFS()->get('section_2_heading', $post_ID); ?>
                        </h2>
                    </div>
                </div>
            </div>
            <!-- End of heading under upper navbar -->

            <!-- End of heading under upper navbar -->

        </section>

        <?php
		// Section 2 body. Where the "Section 2 Carousel" loop is filled in, the
		// single video is replaced by an image carousel and the three-column
		// block below it becomes a second, synced carousel — same layout, but
		// the columns change with the image. Campuses that leave the loop empty
		// keep the original video + static columns, so this is opt-in per page.
		$section_2_carousel = CFS()->get('section_2_carousel', $post_ID);
		?>

        <?php if (!empty($section_2_carousel)) : ?>

        <section class="mB__80 mobile__mB-40">
            <div class="container ">

                <div class="row">
                    <div class="col-md-12 no-padding">
                        <div class="spacesSection2__imgSlide">
                            <?php foreach ($section_2_carousel as $row) : ?>
                            <div><img data-lazy="<?php echo $row['slide_image']; ?>" class="img-responsive" alt="">
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="mB__120 mobile__mB-40">
            <div class="container ">
                <div class="spacesSection2__textSlide">
                    <?php foreach ($section_2_carousel as $row) : ?>
                    <div>
                        <div class="row pos_relative">
                            <div class="col-md-12 ">
                                <h3 class="font--red margin_right"><?php echo $row['slide_column_header']; ?></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5  rightPadding">
                                <?php echo $row['slide_column_1']; ?>
                            </div>
                            <div class="col-md-4  paragraph_right-padding">
                                <?php echo $row['slide_column_2']; ?>
                            </div>
                            <div class="col-md-3 ">
                                <div class="multiLink"><?php echo $row['slide_column_3']; ?></div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <?php else : ?>

        <section class="mB__80 mobile__mB-40">
            <div class="container ">

                <div class="row">
                    <div class="col-md-12 no-padding">
                        <div class="playIcon__center inView customPlay replayButton mouseHover mobile__squareVideo">
                            <video class="video-js vjs-16-9" preload="none"
                                poster="<?php echo CFS()->get('video_poster_2'  , $post_ID); ?>"
                                data-setup='{ "controls": false, "autoplay": false }' playsinline>
                                <source src="<?php echo CFS()->get('video', $post_ID); ?>" type="video/mp4">
                            </video>
                            <button class="o-play-btn">
                                <i class="o-play-btn__icon">
                                    <div class="o-play-btn__mask"></div>
                                </i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Content 3 -->

            </div>
        </section>

        <section class="mB__120 mobile__mB-40">
            <div class="container ">
                <div class="row pos_relative">
                    <div class="col-md-12 ">
                        <h3 class="font--red margin_right"><?php echo CFS()->get('column_header', $post_ID); ?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5  rightPadding">
                        <?php echo CFS()->get('column_1', $post_ID); ?>
                    </div>
                    <div class="col-md-4  paragraph_right-padding">
                        <?php echo CFS()->get('column_2', $post_ID); ?>
                    </div>
                    <div class="col-md-3 ">
                        <div class="multiLink"><?php echo CFS()->get('column_3', $post_ID); ?></div>
                    </div>
                </div>
            </div>
        </section>

        <?php endif; ?>


        <section class="container " id="<?php echo $sectionID[$i]; ?>">

            <!-- Upper navbar -->
            <div class="sticky-navbar">
                <span class="hidden-xs hidden-sm"><i>click to ></i></span>
                <ul class="sticky-nav">
                    <?php 
												foreach($text as $row):
										?>
                    <li
                        class="sticky-navbar-list <?php if($i == $j){ echo 'active';}else{ echo 'hidden-xs hidden-sm'; };  ?>">
                        <a href="#<?php echo $sectionID[$j]; ?>"><?php echo $row['click_to_text'] ;?></a>
                    </li>
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
                    <div class="col-md-12 ">
                        <h2 class="head-nav sectionHeading"><?php echo CFS()->get('section_3_heading', $post_ID); ?>
                        </h2>
                    </div>
                </div>
                <!-- End of heading under upper navbar -->
            </div>
        </section>

        <section class="mB__160 mobile__mB-120">
            <div class="container parallaxBlock">
                <div class="row pos_relative">

                    <div class="col-md-8 col-md-push-4 no-padding">
                        <div class="spaces__mB fade_img">
                            <?php 
													$image = CFS()->get( 'carousel_2' , $post_ID);
													foreach ( $image as $row ):
											?>
                            <div><img data-lazy="<?php echo $row['image']; ?>" class="img-responsive" alt=""></div>
                            <?php 
													endforeach;
											?>
                        </div>
                    </div>



                    <div class="col-md-5 col-md-pull-4 spaces__block no-padding parallaxAnimate">
                        <div class="red-block-background">
                            <span class="spacesTop__angle hidden-xs hidden-sm"></span>
                            <span class="spacesRight__angle hidden-xs hidden-sm"></span>
                            <span class="spacesLeft__angle hidden-xs hidden-sm"></span>
                            <span class="spacesBottom__angle hidden-xs hidden-sm"></span>
                            <div class="spaces__block-padding font--white redTextBlock">
                                <?php echo CFS()->get('carousel_2_text', $post_ID); ?>
                            </div>
                        </div>
                    </div>


                </div> <!-- End of Content 6 -->
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
                    <li
                        class="sticky-navbar-list <?php if($i == $j){ echo 'active';}else{ echo 'hidden-xs hidden-sm'; };  ?>">
                        <a href="#<?php echo $sectionID[$j]; ?>"><?php echo $row['click_to_text'] ;?></a>
                    </li>
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
                    <div class="col-md-7 ">
                        <h2 class="head-nav sectionHeading"><?php echo CFS()->get('section_4_heading', $post_ID); ?>
                        </h2>
                    </div>
                </div>
                <!-- End of heading under upper navbar -->
            </div>
        </section>


        <section class="mB__80 mobile__mB-40">
            <div class="container pos_relative  aim__video-2 no-padding">
                <div class="playIcon__center inView customPlay replayButton mouseHover mobile__squareVideo">
                    <video class="video-js vjs-16-9" preload="none"
                        poster="<?php echo CFS()->get('video_poster_3'  , $post_ID); ?>"
                        data-setup='{ "controls": false, "autoplay": false }' playsinline>
                        <source src="<?php echo CFS()->get('video_2', $post_ID); ?>" type="video/mp4">
                    </video>
                    <button class="o-play-btn">
                        <i class="o-play-btn__icon">
                            <div class="o-play-btn__mask"></div>
                        </i>
                    </button>
                </div>
            </div>
        </section>


        <section>
            <div class="container">
                <div class="footer_width spacesFooter__width ">
                    <div class="footer__shape">
                        <div class="spacesFooter__padding">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php echo CFS()->get('footer_column_1', $post_ID); ?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo CFS()->get('footer_column_2', $post_ID); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>


        <?php
            // Content 2 — the our-aim educator block. The three lookups happen here
            // rather than mid-markup, and the loops are cast so an unfilled loop
            // cannot reach `foreach (null)`, which is fatal on PHP 8.
            $educatorText     = CFS()->get('educator_text', $post_ID);
            $aboutImage1      = CFS()->get('image_1', $post_ID);
            // A loop row saved with no sub-field values comes back as '' rather than
            // an array, and `isset($row[0])` is true for a string offset — so filter
            // to real rows here instead of guarding at each use.
            $about_loop       = array_values(array_filter((array) CFS()->get('about', $post_ID), 'is_array'));
            $links            = array_values(array_filter((array) CFS()->get('links', $post_ID), 'is_array'));
            $upcomingHeading  = CFS()->get('upcoming_heading', $post_ID);
            $upcomingText     = CFS()->get('upcoming_text', $post_ID);
            if ($educatorText || $aboutImage1) :
        ?>

        <?php if ($upcomingHeading) : ?>
        <section class="mB__80 mobile__mB-40">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <h2 class="head-nav sectionHeading"><?php echo $upcomingHeading; ?></h2>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <section class="mB__160 mobile__mB-80">
            <!-- Content 2 -->
            <div class="container  parallax">

                <div class="row pos_relative">

                    <div class="col-md-5">
                        <div class="font--red our__aim-contentF">
                            <?php echo $educatorText; ?>
                        </div>
                    </div>

                    <div class="col-md-7 no-padding">
                        <div class="padding_bottom-65 ouraim__angle-1 image__absolute firstElement mobile__mB-10">
                            <img src="<?php echo $aboutImage1; ?>" class="img-responsive" alt="">
                        </div>
                    </div>

                    <?php if (isset($about_loop[0])) : ?>
                    <div class="info__block infoBlockM visible-xs visible-sm">
                        <span class="name__text"><?php echo $about_loop[0]['name']; ?></span>
                        <span class="desg__text"><i><?php echo $about_loop[0]['designation']; ?></i></span>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- End of Content 2 -->

                <div class="row">
                    <div class="col-md-7 no-padding">
                        <div class="our__aim-imgP secondElement">
                            <img src="<?php echo CFS()->get('image_2', $post_ID); ?>" class="img-responsive" alt="">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="padding__top">

                            <?php if ($upcomingText) : ?>
                            <div class="spaces__lowerText"><?php echo $upcomingText; ?></div>
                            <?php endif; ?>

                            <div class="info__block hidden-xs hidden-sm">
                                <?php foreach ($about_loop as $row) : ?>
                                <span class="name__text"><?php echo $row['name']; ?></span>
                                <span class="desg__text"><i><?php echo $row['designation']; ?></i></span>
                                <?php endforeach; ?>
                            </div>

                            <?php if (isset($about_loop[1])) : ?>
                            <div class="info__block visible-xs visible-sm">
                                <span class="name__text"><?php echo $about_loop[1]['name']; ?></span>
                                <span class="desg__text"><i><?php echo $about_loop[1]['designation']; ?></i></span>
                            </div>
                            <?php endif; ?>

                            <?php foreach ($links as $row) : ?>
                            <div class="multiLink"><?php echo $row['add_link']; ?></div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>

        </section>

        <?php endif; ?>

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

if ($(window).width() > 768) {
    $('.sectionHeading').each(function() {
        var heading = $(this);
        var heading__tween = new TweenLite.from(heading, 0.6, {
            autoAlpha: 0
        });
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

$('.stats').each(function() {
    var stats = $(this).find('.statsHeader');
    var detail = $(this).find('p');
    var statsHead = new TimelineLite();
    var statsInfo = new TimelineLite();
    statsHead
        .staggerFrom(stats, 0.6, {
            y: 50,
            autoAlpha: 0
        }, 0.2);
    statsInfo
        .staggerFrom(detail, 0.6, {
            y: 50,
            autoAlpha: 0,
        }, 0.2);

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

if ($(window).width() > 768 && isSafari == false) {
    TweenLite.set(CSSRulePlugin.getRule(".spaces__angle::after"), {
        css: {
            transformPerspective: 100,
            transformStyle: "preserve-3d"
        }
    });

    var angle = new TweenLite.from(CSSRulePlugin.getRule(".spaces__angle::after"), 0.8, {
        cssRule: {
            borderLeft: 140,
            rotationY: -18,
            rotationZ: -2
        },
        ease: Power2.easeInOut
    }, 0);

    var scene = new ScrollMagic.Scene({
            triggerElement: '.spaces__angle',
            triggerHook: 0.1,
        })
        .setTween(angle)
        .addTo(controller);
}


// Parallax for the our-aim "Content 2" component (`.parallax` container with a
// `.secondElement` child). This page's own parallax below drives differently
// named classes (.parallaxBlock / .parallaxAnimate), so without this the
// component's classes are inert: the lower image never gets its vertical
// offset and the red wedge never gets its 3D rotation.
// Ported from our-aim.php:755-792. The tween is named `aimAngle` because
// `angle` is already declared above for `.spaces__angle::after`.
if ($(window).width() > 768) {

    $('.parallax').each(function() {

        var secondElement = $(this).find('.secondElement');
        var aimAngle;

        if (!isSafari) {
            TweenLite.set(CSSRulePlugin.getRule(".ouraim__angle-1:after"), {
                css: {
                    transformPerspective: 100,
                    transformStyle: "preserve-3d"
                }
            });

            aimAngle = new TweenLite.from(CSSRulePlugin.getRule(".ouraim__angle-1:after"), 0.8, {
                cssRule: {
                    rotationY: -18,
                    rotationZ: 8
                },
                rotationZ: .01,
                force3D: !0,
                ease: Power2.easeInOut
            }, 0);

            // our-aim calls .setTween(angle) unconditionally, which throws on
            // Safari where the tween was never created. Only add the scene when
            // there is something to tween.
            new ScrollMagic.Scene({
                    triggerElement: this,
                    triggerHook: 0.1,
                })
                .setTween(aimAngle)
                .addTo(controller);
        }

        var parallax__1 = new TimelineLite();

        parallax__1
            .fromTo(secondElement, 0.5, {
                y: 100
            }, {
                y: -20,
                rotationZ: .01,
                force3D: !0
            });

        new ScrollMagic.Scene({
                triggerElement: this,
                triggerHook: 0.8,
                duration: 1200
            })
            .setTween(parallax__1)
            .addTo(controller);

    });
}


//Red BLock Parallax
if ($(window).width() > 768) {

    $('.parallaxBlock').each(function() {

        var secondElement = $(this).find('.parallaxAnimate');
        var parallax__1 = new TimelineLite();

        parallax__1
            .fromTo(secondElement, 1.5, {
                y: 100
            }, {
                y: -20
            });

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
    .to($hero__shape, 1, {
        x: -100,
        ease: Power0.easeNone
    })
    .to($hero__text, 1.8, {
        x: -800,
        autoAlpha: 0,
        ease: Power0.easeNone
    }, 0)
    .to($hero__video, 3, {
        left: 0,
        top: 0,
        transform: 'rotateY(0deg) rotateX(0deg)',
        width: '100%',
        height: '100%',
        ease: Power0.easeNone
    }, 0);


var controller = new ScrollMagic.Controller();

var pinning = new ScrollMagic.Scene({
    triggerElement: '#trigger__hero',
    triggerHook: 0,
    duration: 1900
});
var scene = new ScrollMagic.Scene({
        triggerElement: '#trigger__hero',
        triggerHook: 0,
        duration: 1500
    })
    // .addIndicators()
    .setTween(tl)
    .addTo(controller);

pinning.setPin('#pinning', {
        pushFollowers: true
    })
    // .addIndicators()
    .addTo(controller)
    .on('end', function() {
        // $('#site-navigation').toggleClass('fixed__header');
    });

var myvid = $('#aim__background-video')[0];
var playTrigger = new ScrollMagic.Scene({
    triggerElement: '#trigger__hero',
    triggerHook: 0,
    duration: 150,
    offset: 2200
});
playTrigger //.addIndicators()
    .addTo(controller)
    .on('start', function(e) {
        if (e.scrollDirection == 'REVERSE') {
            if (status == 'playing') {
                $('#unmute__btn').addClass("showMuteBtn");
                btnAnimate();
                myvid.play();
            }
            $('#aim__background-video').addClass('pointer-all');
        }
    })
    .on('end', function() {
        $('#unmute__btn').removeClass("showMuteBtn");
        $('#aim__background-video').removeClass('pointer-all');
        myvid.pause();
    });

var pauseTrigger = new ScrollMagic.Scene({
    triggerElement: '#trigger__hero',
    triggerHook: 0,
    duration: 150,
    offset: 800
});
pauseTrigger //.addIndicators()
    .addTo(controller)
    .on('start', function(e) {
        if (e.scrollDirection == "REVERSE") {
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


function scrollbtn__animation() {
    // var timeline = new TimelineMax({});

    // timeline
    // 		.fromTo("#unmute__btn" , 0.3, {autoAlpha:0} , {autoAlpha: 1})
    // 		.fromTo("#icon__mute" ,0.1,  {autoAlpha: 0} ,{autoAlpha: 1} , "-=0.1");
    if (status == 'playing') {
        $('#unmute__btn').addClass("showMuteBtn");
        $('#aim__background-video').addClass('pointer-all');
        myvid.play();
    } else {
        $('#aim__background-video').addClass('pointer-all');
        showbtnAnimate();
        // $('#aim__background-video').parent().find('.o-play-btn').removeClass("opacity_hidden o-play-btn--playing");
        myvid.pause();
    }

    // timeline.pause(true);

}

function btnAnimate() {
    $('#aim__background-video').parent().find('.o-play-btn').addClass('opacity_hidden').delay(500).queue(function(
        next) {
        $(this).addClass("o-play-btn--playing");
        next();
    });
}

function showbtnAnimate() {
    $('#aim__background-video').parent().find('.o-play-btn').removeClass('o-play-btn--playing').delay(500).queue(
        function(next) {
            $(this).removeClass("opacity_hidden");
            next();
        });
}


var video_src = $('#aim__background-video');
if ($(window).width() >= 480) {
    video_src.html('<source src="<?php echo CFS()->get('hero_desktop_video', $post_ID); ?>" type="video/mp4" >');
} else {
    video_src.html('<source src="<?php echo CFS()->get('hero_desktop_video', $post_ID); ?>" type="video/mp4" >');
}
</script>