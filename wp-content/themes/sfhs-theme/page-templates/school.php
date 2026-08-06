<?php
/* Template Name: School Page  */
?>

<?php
get_header();

// One template, one page per campus. Content lives in a matching "Templates" CPT
// entry whose slug equals this page's slug (same convention as our-students /
// our-educators); fall back to the page itself so nothing breaks if it's missing.
$school_slug = get_post_field('post_name', get_post());
$school_tpl  = get_page_by_path($school_slug, OBJECT, 'templates');
$school_id   = $school_tpl ? $school_tpl->ID : get_queried_object_id();

// Both campuses run the red palette. (The admission pages still split red/green
// via their own template — this only covers the school pages.)
$school_theme = 'redtheme';

// Campus switcher shown above the hero title. Add a campus here (plus its page
// and matching "Templates" entry) and the nav picks it up on every school page.
$school_campuses = [
    'sfhs-chandigarh'     => 'SFHS, Chandigarh',
    'sfhs-new-chandigarh' => 'SFHS, New Chandigarh',
];
?>

<script>
scrollTopValue = 2200;
</script>

<div id="primary" class="content-area schoolPage school--<?php echo esc_attr($school_slug); ?> <?php echo $school_theme; ?>">
    <main id="main" class="site-main">

        <!-- ScrollMagic trigger: pinning/animation starts when this reaches the top -->
        <span id="trigger__hero"></span>

        <!---	====================================================
                    Background Image and Background Video Section
                    (full-bleed hero — must stay OUTSIDE .container so the
                     absolutely-positioned video/text can span the viewport)
                ====================================================	--->
        <div id="pinning">

            <div class="hero__background-image">

                <div class="aim__hero-shape" id="hero__shape">

                </div>

                <span class="hero__text-container schoolComponent" id="hero__text">

                    <!-- Campus switcher — sits directly above the heading, part of this first block -->
                    <div class="schoolfirstComponent">
                        <div class="tabitem-wrapper">
                            <?php foreach ($school_campuses as $campus_slug => $campus_label) : ?>
                            <a class="tabitem <?php echo ($school_slug === $campus_slug) ? 'activeTab' : ''; ?>"
                                href="<?php echo esc_url(home_url('/' . $campus_slug . '/')); ?>"><?php echo $campus_label; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <h2 class=""><?php echo get_the_title(); ?></h2>
                    <span class="aim__hero-text"><?php echo CFS()->get('hero_text', $school_id); ?></span>

                </span>

                <div class="playIcon__center">
                    <video loop preload="none" poster="<?php echo CFS()->get('video_poster', $school_id); ?>" class=""
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
                    // Four stats per campus (the CFS loop is capped at 4). `.statsSection`
                    // is a flex row with `flex-grow: 1` children, so it splits into four
                    // equal columns on its own and stacks below 768px.
                    $stats_loop = CFS()->get('stats_loop', $school_id);
                    if (!empty($stats_loop)) :
                        foreach ($stats_loop as $row) :
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
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </section>
        <!-- End of Bold Content -->

        <?php
        // ---- Sections ("scroll to >" nav + the block each entry links to) ----
        // One CFS "Sections" row per section, each carrying its own nav label,
        // heading, carousel images and text. The anchor id is the nav label
        // stripped down to letters — same convention as our-spaces /
        // our-students, where the nav repeats above every section with the
        // current one highlighted.
        $school_sections = CFS()->get('sections', $school_id);
        $school_sections = is_array($school_sections) ? $school_sections : [];

        // CFS leaves a field out of the row entirely when it has never been
        // saved, so every read goes through this.
        $section_field = function ($section, $name) {
            return isset($section[$name]) ? $section[$name] : '';
        };

        $school_anchors = [];
        foreach ($school_sections as $section) {
            $school_anchors[] = preg_replace('/[^a-zA-Z]/', '', $section_field($section, 'nav_label'));
        }

        foreach ($school_sections as $index => $section) :
            if (empty($school_anchors[$index])) {
                continue;
            }
            $section_images  = !empty($section['section_images']) ? $section['section_images'] : [];
            $section_heading = $section_field($section, 'section_heading');
            $section_text    = $section_field($section, 'section_text');
            $column_1        = $section_field($section, 'column_1');
            $column_2        = $section_field($section, 'column_2');
            $column_3        = $section_field($section, 'column_3');

            $has_content = ('' !== $section_heading || '' !== $section_text
                            || '' !== $column_1 . $column_2 . $column_3 || $section_images);

            // One image is a picture, not a slider — slick only goes on when
            // there is something to slide to. (It also owns `data-lazy`, so a
            // lone slide outside slick would never load its src.)
            $is_carousel  = count($section_images) > 1;
            $has_columns  = '' !== $column_1 . $column_2 . $column_3;

            // The select comes back from CFS as [value => label].
            $layout = !empty($section['layout']) ? key($section['layout']) : 'carousel';
        ?>

        <!-- ===== <?php echo $section_field($section, 'nav_label'); ?> ===== -->
        <section class="container" id="<?php echo esc_attr($school_anchors[$index]); ?>">

            <!-- Upper navbar -->
            <div class="sticky-navbar">
                <span class="hidden-xs hidden-sm"><i>scroll to &gt;</i></span>
                <ul class="sticky-nav">
                    <?php foreach ($school_sections as $k => $nav_row) : ?>
                    <li class="sticky-navbar-list <?php echo ($k === $index) ? 'active' : 'hidden-xs hidden-sm'; ?>">
                        <a href="#<?php echo esc_attr($school_anchors[$k]); ?>"><?php echo $section_field($nav_row, 'nav_label'); ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </section>

        <?php if ($has_content) : ?>

        <!-- Heading under navbar -->
        <div class="container mB__80 mobile__mB-40">
            <div class="row">
                <div class="col-md-7">
                    <h2 class="head-nav sectionHeading"><?php echo $section_heading; ?></h2>
                </div>
            </div>
        </div>
        <!-- End of heading under navbar -->

        <?php if ('parallax' === $layout) : ?>

        <!-- Image right, red block riding over it on the left (our-spaces "Content 6") -->
        <section class="mB__160 mobile__mB-120 schoolSection schoolSection--parallax">
            <div class="container parallaxBlock">
                <div class="row pos_relative">

                    <div class="col-md-8 col-md-push-4 no-padding">
                        <?php if ($is_carousel) : ?>
                        <div class="spaces__mB schoolCarousel">
                            <?php foreach ($section_images as $image_row) : ?>
                            <div><img data-lazy="<?php echo $image_row['image']; ?>" class="img-responsive" alt=""></div>
                            <?php endforeach; ?>
                        </div>
                        <?php elseif ($section_images) : ?>
                        <div class="spaces__mB">
                            <img src="<?php echo $section_images[0]['image']; ?>" class="img-responsive" alt="">
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-5 col-md-pull-4 spaces__block no-padding parallaxAnimate">
                        <div class="red-block-background">
                            <span class="spacesTop__angle hidden-xs hidden-sm"></span>
                            <span class="spacesRight__angle hidden-xs hidden-sm"></span>
                            <span class="spacesLeft__angle hidden-xs hidden-sm"></span>
                            <span class="spacesBottom__angle hidden-xs hidden-sm"></span>
                            <div class="spaces__block-padding font--white redTextBlock">
                                <?php echo $section_text; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <?php if ($has_columns) : ?>
        <!-- Optional follow-on row: red heading, copy, then the link. -->
        <section class="mB__120 mobile__mB-40 schoolSection schoolSection--parallax-columns">
            <div class="container">
                <div class="row">

                    <div class="col-md-4 font--red">
                        <?php echo $column_1; ?>
                    </div>

                    <div class="col-md-5 rightPadding">
                        <?php echo $column_2; ?>
                    </div>

                    <div class="col-md-3">
                        <div class="multiLink"><?php echo $column_3; ?></div>
                    </div>

                </div>
            </div>
        </section>
        <?php endif; ?>

        <?php elseif ('columns' === $layout) : ?>

        <!-- Full-width image, then a heading and three columns (our-spaces "Section 2") -->
        <?php if ($section_images) : ?>
        <section class="mB__80 mobile__mB-40 schoolSection schoolSection--columns">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 no-padding">
                        <!-- A single plain image, not a carousel: this block shows one
                             photo full width, so there is nothing to slide between. -->
                        <img src="<?php echo $section_images[0]['image']; ?>" class="img-responsive" alt="">
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <section class="mB__120 mobile__mB-40 schoolSection schoolSection--columns">
            <div class="container">

                <?php if ('' !== $section_text) : ?>
                <div class="row pos_relative">
                    <div class="col-md-12 font--red margin_right">
                        <?php echo $section_text; ?>
                    </div>
                </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-md-5 rightPadding">
                        <?php echo $column_1; ?>
                    </div>
                    <div class="col-md-4 paragraph_right-padding">
                        <?php echo $column_2; ?>
                    </div>
                    <div class="col-md-3">
                        <div class="multiLink"><?php echo $column_3; ?></div>
                    </div>
                </div>

            </div>
        </section>

        <?php elseif ('panel' === $layout) : ?>

        <!-- Full-width image with the white skewed panel riding over its bottom
             edge (our-spaces' closing section). `.footer_width` pulls the panel
             up 100px and `.footer__shape::before` supplies the skew; below
             768px both are switched off and the panel simply stacks. -->
        <?php if ($section_images) : ?>
        <section class="mB__80 mobile__mB-40 schoolSection schoolSection--panel">
            <div class="container pos_relative no-padding">
                <img src="<?php echo $section_images[0]['image']; ?>" class="img-responsive" alt="">
            </div>
        </section>
        <?php endif; ?>

        <section class="schoolSection schoolSection--panel">
            <div class="container">
                <div class="footer_width spacesFooter__width">
                    <div class="footer__shape">
                        <div class="spacesFooter__padding">

                            <div class="row">
                                <div class="col-md-6">
                                    <?php echo $column_1; ?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo $column_2; ?>
                                </div>
                            </div>

                            <?php if ('' !== $column_3) : ?>
                            <div class="row">
                                <div class="col-md-12 text-right multiLink">
                                    <?php echo $column_3; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php else : ?>

        <!-- Image left, text right -->
        <section class="mB__160 mobile__mB-40 schoolSection schoolSection--carousel">
            <div class="container">
                <div class="row pos_relative">

                    <div class="col-md-7 no-padding">
                        <?php if ($is_carousel) : ?>
                        <div class="spaces__angle schoolCarousel">
                            <?php foreach ($section_images as $image_row) : ?>
                            <div><img data-lazy="<?php echo $image_row['image']; ?>" class="img-responsive" alt=""></div>
                            <?php endforeach; ?>
                        </div>
                        <?php elseif ($section_images) : ?>
                        <div class="spaces__angle">
                            <img src="<?php echo $section_images[0]['image']; ?>" class="img-responsive" alt="">
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-5">
                        <div class="content_padding-38 font--red spacesBlock__spacing anchorLink">
                            <?php echo $section_text; ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <?php endif; ?>

        <?php endif; ?>
        <!-- ===== End of <?php echo $section_field($section, 'nav_label'); ?> ===== -->

        <?php endforeach; ?>

        <?php
        // ---- Photo gallery ---------------------------------------------------
        // A tilted strip of photos that bleeds past the container. Page-level,
        // so it sits below the nav sections and has no "scroll to >" entry.
        $gallery_heading = CFS()->get('gallery_heading', $school_id);
        $gallery_image   = CFS()->get('gallery_image', $school_id);

        if ('' !== $gallery_heading && $gallery_image) :
        ?>
        <section class="mB__120 mobile__mB-40 schoolGallery">

            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h2 class="head-nav sectionHeading"><?php echo $gallery_heading; ?></h2>
                    </div>
                </div>
            </div>

            <div class="schoolGallery__band">
                <div class="schoolGallery__strip">
                    <img src="<?php echo $gallery_image; ?>" alt="">
                </div>
            </div>

        </section>
        <?php endif; ?>

        <?php
        // ---- Latest news -----------------------------------------------------
        // Whichever posts the campus picked, falling back to the three newest in
        // the News category. Cards use the same markup as category-news.php so
        // the styling is shared.
        $news_label  = CFS()->get('news_label', $school_id);
        $news_picked = CFS()->get('news_posts', $school_id);
        $news_posts  = [];

        if ($news_label) {
            if (!empty($news_picked)) {
                // The relationship field hands back post IDs, in the order set
                // in the admin — `get_posts` would re-sort them, so fetch each.
                foreach ((array) $news_picked as $picked_id) {
                    $picked = get_post($picked_id);
                    if ($picked && 'publish' === $picked->post_status) {
                        $news_posts[] = $picked;
                    }
                }
            } else {
                $news_posts = get_posts([
                    'category_name'    => 'news',
                    'posts_per_page'   => 3,
                    'orderby'          => 'date',
                    'order'            => 'DESC',
                    'suppress_filters' => false,
                ]);
            }
        }

        if ($news_posts) :
        ?>
        <section class="mB__120 mobile__mB-40 schoolNews">
            <div class="container">

                <span class="schoolNews__label"><?php echo $news_label; ?></span>

                <div class="row">
                    <?php foreach ($news_posts as $news_post) : ?>
                    <div class="col-md-4 col-sm-4">
                        <div class="newslist__container">

                            <div class="newsImg__container">
                                <a href="<?php echo esc_url(get_permalink($news_post)); ?>">
                                    <?php echo get_the_post_thumbnail($news_post); ?>
                                </a>
                            </div>

                            <span class="publish__date"><?php echo get_the_date('', $news_post); ?></span>

                            <a href="<?php echo esc_url(get_permalink($news_post)); ?>">
                                <span class="news__title"><?php echo get_the_title($news_post); ?></span>
                            </a>

                            <span class="news__meta"><?php echo wp_strip_all_tags($news_post->post_content); ?></span>

                            <a href="<?php echo esc_url(get_permalink($news_post)); ?>">
                                <span class="read__more">Read More</span>
                            </a>

                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php endif; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>
<script>
jQuery(function($) {

    // ---- Load hero video source from the campus CFS entry (Hero Section tab) ----
    var video_src = $('#aim__background-video');
    if ($(window).width() >= 480) {
        video_src.html('<source src="<?php echo CFS()->get('hero_desktop_video', $school_id); ?>" type="video/mp4">');
    } else {
        video_src.html('<source src="<?php echo CFS()->get('hero_mobile_video', $school_id); ?>" type="video/mp4">');
    }

    // -------------- Section image carousels --------------
    // Same fade transition as the `.fade_img` sliders elsewhere, but initialised
    // here (not via that shared class) because these blocks show dots. Sections
    // with no images yet are skipped so slick doesn't wrap an empty div.
    $('.schoolCarousel').each(function() {
        var slides = $(this).children().length;
        if (!slides) {
            return;
        }
        $(this).slick({
            lazyLoad: 'anticipated',
            autoplay: true,
            autoplaySpeed: 4000,
            infinite: true,
            speed: 400,
            fade: true,
            cssEase: 'linear',
            arrows: false,
            dots: slides > 1 // a lone dot under a single image just reads as a stray mark
        });
    });

    // One controller for every scene on this page (parallax + hero).
    var controller = new ScrollMagic.Controller();

    // -------------- Red block parallax (ported from our-spaces) --------------
    // The red text block drifts up over the image as the section scrolls past.
    // Desktop only — below 768px the block sits under the image instead.
    if ($(window).width() > 768) {
        $('.parallaxBlock').each(function() {
            var parallax__1 = new TimelineLite();

            parallax__1
                .fromTo($(this).find('.parallaxAnimate'), 1.5, {
                    y: 100
                }, {
                    y: -20
                });

            new ScrollMagic.Scene({
                    triggerElement: this,
                    triggerHook: 0.6,
                    duration: 1400
                })
                .setTween(parallax__1)
                .addTo(controller);
        });
    }

    // -------------- Hero Section scroll animation (ported from our-students) --------------
    var status = 'playing';
    var $hero__text = $('#hero__text');
    var $hero__shape = $('#hero__shape');
    var $hero__video = $('#aim__background-video');

    var tl = new TimelineMax({
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
        .setTween(tl)
        .addTo(controller);

    pinning.setPin('#pinning', {
            pushFollowers: true
        })
        .addTo(controller);

    var myvid = $('#aim__background-video')[0];

    var playTrigger = new ScrollMagic.Scene({
        triggerElement: '#trigger__hero',
        triggerHook: 0,
        duration: 150,
        offset: 2200
    });
    playTrigger
        .addTo(controller)
        .on('start', function(e) {
            if (e.scrollDirection == 'REVERSE') {
                if (status == 'playing') {
                    $('#unmute__btn').addClass('showMuteBtn');
                    btnAnimate();
                    if (myvid) {
                        myvid.play();
                    }
                }
                $('#aim__background-video').addClass('pointer-all');
            }
        })
        .on('end', function() {
            $('#unmute__btn').removeClass('showMuteBtn');
            $('#aim__background-video').removeClass('pointer-all');
            if (myvid) {
                myvid.pause();
            }
        });

    var pauseTrigger = new ScrollMagic.Scene({
        triggerElement: '#trigger__hero',
        triggerHook: 0,
        duration: 150,
        offset: 800
    });
    pauseTrigger
        .addTo(controller)
        .on('start', function(e) {
            if (e.scrollDirection == 'REVERSE') {
                $('#unmute__btn').removeClass('showMuteBtn');
                btnAnimate();
                $('#aim__background-video').removeClass('pointer-all');
                if (myvid) {
                    myvid.pause();
                }
            }
        });

    function scrollbtn__animation() {
        if (status == 'playing') {
            $('#unmute__btn').addClass('showMuteBtn');
            $('#aim__background-video').addClass('pointer-all');
            if (myvid) {
                myvid.play();
            }
        } else {
            $('#aim__background-video').addClass('pointer-all');
            showbtnAnimate();
            if (myvid) {
                myvid.pause();
            }
        }
    }

    function btnAnimate() {
        $('#aim__background-video').parent().find('.o-play-btn').addClass('opacity_hidden').delay(500).queue(
            function(next) {
                $(this).addClass('o-play-btn--playing');
                next();
            });
    }

    function showbtnAnimate() {
        $('#aim__background-video').parent().find('.o-play-btn').removeClass('o-play-btn--playing').delay(500)
            .queue(function(next) {
                $(this).removeClass('opacity_hidden');
                next();
            });
    }

});
</script>
