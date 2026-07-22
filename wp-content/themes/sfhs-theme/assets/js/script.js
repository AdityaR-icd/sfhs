//==========Custom JS=============

$(document).ready(function () {
  $(".carousel-image").slick({
    lazyLoad: "ondemand",
    autoplay: true,
    dots: true,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: "linear",
    arrows: false,
  });

  $(".fade_img").slick({
    lazyLoad: "anticipated",
    autoplay: false,
    infinite: true,
    speed: 400,
    fade: true,
    cssEase: "linear",
    arrows: false,
  });

  // Home Page Testimonials Carousel (same fade+dots style as the hero slider)
  $(".homeTestimonials__carousel")
    .on("afterChange", function (event, slick, currentSlide) {
      // infinite:false stops autoplay at the last slide — loop back to the
      // start so the auto-scroll keeps cycling. (We avoid infinite:true because
      // cloned slides would duplicate the videojs players and break playback.)
      if (currentSlide === slick.slideCount - 1) {
        setTimeout(function () {
          slick.slickGoTo(0);
        }, 2000);
      }
    })
    .slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      infinite: false, // no clones, so each testimonial's video play button keeps working
      speed: 400,
      fade: true,
      cssEase: "linear",
      arrows: false,
      dots: true,
      adaptiveHeight: false, // fixed height so cards don't jump when switching
      autoplay: true, // auto scroll
      autoplaySpeed: 2000, // advance every 2 seconds
      pauseOnHover: true, // pause on hover so a video can be watched
      swipe: true, // drag / swipe to navigate
      draggable: true,
      touchMove: true,
    });

  // Make every testimonial card the same height (the tallest one) so the
  // carousel doesn't resize/jump while switching between slides.
  function equalizeTestimonialHeight() {
    var $carousel = $(".homeTestimonials__carousel");
    if (!$carousel.length) return;
    var $slides = $carousel.find(".fullPage__section");
    $slides.css("min-height", ""); // reset before measuring
    var max = 0;
    $slides.each(function () {
      var h = $(this).outerHeight();
      if (h > max) max = h;
    });
    if (max > 0) {
      $slides.css("min-height", max + "px");
      $carousel.find(".slick-list").css("height", max + "px");
    }
  }
  equalizeTestimonialHeight();
  // Re-run once assets (video posters/images) have loaded and on resize.
  $(window).on("load resize", equalizeTestimonialHeight);
  setTimeout(equalizeTestimonialHeight, 600);

  var fade_controller = new ScrollMagic.Controller();
  $(".fade_img").each(function () {
    var img = $(this);
    var scene = new ScrollMagic.Scene({
      triggerElement: this,
      duration: 700,
    })
      .on("enter", function () {
        // img.slick("slickGoTo",0);
        img.slick("slickSetOption", { autoplay: true }, true);
      })
      .on("leave", function () {
        img.slick("slickSetOption", { autoplay: false }, true);
        // img.slick("slickGoTo",0);
      })
      //.addIndicators()
      .addTo(fade_controller);
  });

  //Image Fade and Text Fade Script Slick

  $(".img__slide").slick({
    lazyLoad: "ondemand",
    autoplay: false,
    infinite: true,
    fade: true,
    speed: 700,
    cssEase: "linear",
    arrows: false,
    pauseOnHover: true,
    asNavFor: ".text__slide",
    dots: true,
    draggable: false,
  });

  $(".text__slide").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true,
    asNavFor: ".img__slide",
    dots: false,
    centerMode: false,
    focusOnSelect: false,
    arrows: false,
    draggable: false,
    lazyLoad: "ondemand",
    pauseOnHover: true,
  });

  var imgFade_controller = new ScrollMagic.Controller();
  $(".img__slide").each(function () {
    var img = $(this);
    var text = $(this).find(".text__slide");
    var scene = new ScrollMagic.Scene({
      triggerElement: this,
      duration: 700,
    })
      .on("enter", function () {
        // img.slick("slickGoTo",0);
        img.slick("slickSetOption", { autoplay: true }, true);
      })
      .on("leave", function () {
        img.slick("slickSetOption", { autoplay: false }, true);
        // img.slick("slickGoTo",0);
      })
      //.addIndicators()
      .addTo(imgFade_controller);
  });

  // $('.text__slide').on('mouseenter', function(){
  // 	$('.img__slide').slick('slickPause');
  // });
  // $('.text__slide').on('mouseleave', function(){
  // 	$('.img__slide').slick('slickPlay');
  // });

  // Home – Academic Programmes carousel.
  // Isolated from the shared .img__slide/.text__slide pair above: the home page
  // has a second such pair (the mobile hero), and a class-based asNavFor that
  // matches multiple carousels breaks dot syncing. Own classes = clean 1:1 pair.
  if ($(".academic__imgSlide").length) {
    $(".academic__imgSlide").slick({
      lazyLoad: "ondemand",
      autoplay: true,
      autoplaySpeed: 3000,
      infinite: true,
      fade: true,
      speed: 700,
      cssEase: "linear",
      arrows: false,
      pauseOnHover: true,
      asNavFor: ".academic__textSlide",
      dots: true,
      draggable: false,
    });
    $(".academic__textSlide").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: true,
      asNavFor: ".academic__imgSlide",
      dots: false,
      arrows: false,
      draggable: false,
      lazyLoad: "ondemand",
      pauseOnHover: true,
    });
  }

  // Our Aim Features Section Slick

  //=================Smooth scrolling to a tag============

  $(document).on("click", 'a[href^="#"]', function (event) {
    event.preventDefault();

    $("html, body").animate(
      {
        scrollTop: eval($($(this).attr("href")).offset().top - 100),
      },
      500,
    );
  });

  //================End of Smooth Scrolling=================

  // Show Dropdown according to page active
  $(".autoDropdown").each(function () {
    // console.log("News");
    if ($(this).find(".current-menu-item").length == 1) {
      $(this).find(".menuList").addClass("showSubmenu");
      $(this).find(".menu__subhead").addClass("rotate");
    }
  });

  //===================Back To Top===================================
  $(window).scroll(function () {
    if ($(window).scrollTop() > 1600) {
      $(".floating__linksWrap").addClass("open");
    } else {
      $(".floating__linksWrap").removeClass("open");
    }
  });

  $(".floating__linksWrap").on("click", function () {
    $("html, body").animate({ scrollTop: 0 }, 1600);
  });

  //=================Custom Play Button========================

  //============== to unmute================
  $("#unmute__btn").on("click", function () {
    video = $(this).parent().find("video");

    muteBtn = $(".muteBtn");
    unmuteBtn = $(".unmuteBtn");
    if (video.prop("muted")) {
      video.prop("muted", false);
      muteBtn.toggleClass("muteVisible");
      unmuteBtn.toggleClass("muteHide");
    } else {
      video.prop("muted", true);
      muteBtn.toggleClass("muteVisible");
      unmuteBtn.toggleClass("muteHide");
    }
  });

  //===================Hamburger Menu======================

  var hamburger = $("#hamburger-icon");
  var notification = $(".notification-container");
  var menu = $(".mega__menu");
  hamburger.click(function () {
    $("video").each(function () {
      if (!$(this).get(0).paused) {
        $(this).get(0).pause();
        $(this)
          .parent()
          .parent()
          .find(".o-play-btn")
          .removeClass("o-play-btn--playing opacity_hidden");
      }
    });

    var subMenuAnimate = $(".subMenuAnimate_1 li");
    var subMenuAnimate_2 = $(".subMenuAnimate_2 li");
    var MenuAnimate = $(".menu__subhead");
    var mainMenuAnimate = $(".mainMenuAnimate li");
    // var subMenushow = new TimelineLite({delay : 0.6});
    var mainMenushow = new TimelineLite({ delay: 0.4 });
    // var subMenuHead = new TimelineLite({delay : 0.6});
    var screenWidth = $(window).width();
    if (hamburger.hasClass("active") == false) {
      $("body").addClass("overflow__hide");
      megaMenu();
      if (screenWidth > 768) {
        mainMenushow
          .staggerFromTo(
            mainMenuAnimate,
            0.5,
            { x: -50, autoAlpha: 0 },
            { x: 0, autoAlpha: 1, ease: Power3.easeOut },
            0.05,
          )
          // .staggerFromTo('.menu__subhead' , 0.3 , { y: -10 , autoAlpha: 0 } , { y: 0 , autoAlpha: 1}, 0.1 , '-=0.8')
          .staggerFromTo(
            subMenuAnimate,
            0.3,
            { x: -25, autoAlpha: 0 },
            { x: 0, autoAlpha: 1, ease: Power3.easeOut },
            0.05,
            "-=0.8",
          )
          .staggerFromTo(
            subMenuAnimate_2,
            0.5,
            { x: -25, autoAlpha: 0 },
            { x: 0, autoAlpha: 1, ease: Power3.easeOut },
            0.05,
            "-=0.8",
          )
          .staggerFromTo(
            ".fadeInAnimate",
            0.5,
            { x: -50, autoAlpha: 0 },
            { autoAlpha: 1, x: 0, ease: Power3.easeOut },
            0.05,
            "-=1",
          )
          .fromTo(
            ".fadeInAnimate-2",
            0.5,
            { x: -50, autoAlpha: 0 },
            { autoAlpha: 1, x: 0, ease: Power3.easeOut },
            "-=0.8",
          );
      }
    } else {
      $("body").removeClass("overflow__hide");
      if (screenWidth > 768) {
        var MenuHide = new TimelineMax({});
        MenuHide.to(
          [mainMenuAnimate, subMenuAnimate, subMenuAnimate_2],
          0.3,
          { autoAlpha: 0 },
          0,
        )
          // .staggerFromTo('.menu__subhead' , 0.3 , { y: -10 , autoAlpha: 0 } , { y: 0 , autoAlpha: 1}, 0.1 , '-=0.8')
          // .to( subMenuAnimate , 0.3 , {  autoAlpha: 0},   0 )
          // .to( subMenuAnimate_2 , 0.3 , {  autoAlpha: 0},  0 )
          .to(".fadeInAnimate", 0.5, { autoAlpha: 0 }, 0)
          .to(".fadeInAnimate-2", 0.5, { autoAlpha: 0 }, 0);
        setTimeout(function () {
          megaMenu();
        }, 150);

        // MenuHide.staggerFromTo( '.mega__menu' , 0.3 , { autoAlpha: 0 } );
      } else {
        megaMenu();
      }
    }
    function megaMenu() {
      // console.log(hamburger.hasClass('active'));
      hamburger.toggleClass("active");
      menu.toggleClass("mega__menu-open");
      notification.toggleClass("hide_notification");
    }

    return false;
  });

  //====================Notifiation Icon=======================
  $(".notification-container").click(function () {
    $("body").addClass("overflow__hide");
    $(".notification-list").toggleClass("mega__menu-open");
    $(".notification-container").toggleClass("hide_notification");
    $("#hamburger-icon").toggleClass("hide_notification");
    // var notify__cookie = document.cookie;
    // if(notify__cookie == 0 ){
    // 	$('.notification-counter').css('display' , 'none');
    // 	document.cookie = "1; path=/";

    // }
    console.log(Cookies.get("notification"));
    var notification = Cookies.get("notification");
    if (notification == "0") {
      $(".notification-counter").css("display", "none");
      Cookies.set("notification", "1", { path: "/" });
    }
  });

  if (Cookies.get("notification") == "1") {
    $(".notification-counter").css("display", "none");
  }
  // if(document.cookie == 1) {
  // 	$('.notification-counter').css('display' , 'none');
  // }

  $(".notification__close").click(function () {
    $(".notification-list").toggleClass("mega__menu-open");
    $(".notification-container").toggleClass("hide_notification");
    $("#hamburger-icon").toggleClass("hide_notification");
    $("body").removeClass("overflow__hide");
  });

  //====================Search Button=======================
  $(".search__btn").click(function () {
    $(".search__container").toggleClass("open__search");
    $(".navbar-menu").toggleClass("header--hidden");
  });

  $(".close__search").click(function () {
    $(".search__container").toggleClass("open__search");
    $(".navbar-menu").toggleClass("header--hidden");
  });

  /*================ Jobs Page Dropdown Change =================*/
  $(".applyBtn").click(function () {
    // console.log($(this).find('a').data('value'));
    $("select").val($(this).find("a").data("value")).trigger("change");
  });

  // Header Hide on Scroll
  var lastScrollTop = 0;
  $(window).scroll(function (event) {
    if ($(window).width() > 768) {
      var st = $(this).scrollTop();
      if (st > lastScrollTop) {
        // downscroll code
        if ($(window).scrollTop() > scrollTopValue) {
          $(".menuItems").addClass("header--hidden");
          $(".site-header").addClass("sticky__header");
          $(".site-header").removeClass("bgWhite");
        }
      } else {
        // upscroll code
        if ($(window).scrollTop() > scrollTopValue) {
          $(".menuItems").removeClass("header--hidden");
          $(".site-header").removeClass("sticky__header");
          $(".site-header").addClass("bgWhite");
        }
      }
      lastScrollTop = st;
    }
    if ($(window).scrollTop() < scrollTopValue) {
      $(".site-header").removeClass("bgWhite");
    }
  });

  // Titl Animation

  // $('.js-tilt').tilt({
  // 	perspective:    400,
  // });

  // Accordin JS
  $(".menu__submenu .menu__subhead").click(function (e) {
    e.preventDefault();
    $(this).parent().toggleClass("showSubmenu");
    $(this).toggleClass("rotate");
  });

  // Play function for bottom right play buttons

  // $('.playIcon__bottomRight .video-js').on("click " , function(){
  // 	$(this).parent().find('.o-play-btn').toggleClass('o-play-btn--playing');
  // 	var src = $(this).parent().find('video')[0];
  // 	if(videojs(src).paused() == true){
  // 		videojs(src).play();
  // 	}
  // 	else{
  // 		videojs(src).pause();
  // 	}
  // });

  $(".o-play-btn").on("click", function () {
    $(this).toggleClass("o-play-btn--playing");
    var src = $(this).parent().find("video")[0];
    var playIcon = $(this);
    if ($(this).parent().hasClass("mouseHover")) {
      if (videojs(src).paused() == true) {
        videojs(src).play();
        playIcon.addClass("opacity_hidden");
        playIcon.removeClass("replayBtn");
        playIcon.find(".o-play-btn__icon").removeClass("opacity_hidden");
      } else {
        videojs(src).pause();
        $(this).removeClass("opacity_hidden");
      }
    } else if ($(this).parent().hasClass("hideBtn")) {
      if (videojs(src).paused() == true) {
        videojs(src).play();
        playIcon.addClass("opacity_hidden");
      } else {
        videojs(src).pause();
        playIcon.removeClass("opacity_hidden");
      }
    } else {
      if (videojs(src).paused() == true) {
        videojs(src).play();
      } else {
        videojs(src).pause();
      }
    }

    // Show play icon on video end
    videojs(src).on("ended", function () {
      // console.log(playIcon);
      if (playIcon.parent().hasClass("replayButton")) {
        // playIcon.removeClass('o-play-btn--playing opacity_hidden');
        // playIcon.addClass('replayBtn');
        playIcon.removeClass("o-play-btn--playing opacity_hidden");
        playIcon.find(".o-play-btn__icon").addClass("opacity_hidden");
        playIcon.addClass("replayBtn");
      } else {
        playIcon.removeClass("o-play-btn--playing opacity_hidden");
      }
    });
  });

  /* activate pause for video if scrolled out of viewport */
  $(window).scroll(function () {
    $(".inView .video-js").each(function () {
      if ($(this).is(":in-viewport")) {
        // $(this)[0].play();
      } else {
        var src = $(this);
        if (videojs(src[0]).paused() == false) {
          videojs(src[0]).pause();
          src
            .parent()
            .find(".o-play-btn")
            .removeClass("o-play-btn--playing opacity_hidden");
        }
      }
    });
  });

  // On mouse Hover inside Video

  $(".mouseHover").mousestop(function () {
    playIcon = $(this).find(".o-play-btn");
    studentVideo = $(this).find("video")[0];
    if (videojs(studentVideo).paused() == false) {
      playIcon.addClass("opacity_hidden");
    }
  });

  $(".mouseHover").mouseout(function () {
    playIcon = $(this).find(".o-play-btn");
    studentVideo = $(this).find("video")[0];
    if (videojs(studentVideo).paused() == false) {
      playIcon.addClass("opacity_hidden");
    }
  });

  $(".mouseHover").mousemove(function () {
    playIcon = $(this).find(".o-play-btn");
    studentVideo = $(this).find("video")[0];
    if (videojs(studentVideo).paused() == false) {
      playIcon.removeClass("opacity_hidden");
    }
  });

  $(".customPlay .video-js").on("click touchend", function () {
    var src = $(this).parent().find("video")[0];
    var playIcon = $(this).parent().find(".o-play-btn");

    if (
      $(this).parent().hasClass("mouseHover") ||
      $(this).parent().hasClass("playIcon__left")
    ) {
      if (videojs(src).paused() == true) {
        videojs(src).play();
        playIcon.addClass("opacity_hidden o-play-btn--playing");
        playIcon.removeClass("replayBtn");
        playIcon.find(".o-play-btn__icon").removeClass("opacity_hidden");
      } else {
        videojs(src).pause();
        playIcon.removeClass("opacity_hidden o-play-btn--playing");
      }
    } else {
      if (videojs(src).paused() == true) {
        videojs(src).play();
        playIcon.addClass("o-play-btn--playing");
      } else {
        videojs(src).pause();
        playIcon.removeClass("o-play-btn--playing");
      }
    }

    // Show play icon on video end
    // videojs(src).on('ended' , function(){
    // 	playIcon.removeClass('o-play-btn--playing opacity_hidden');
    // });

    videojs(src).on("ended", function () {
      // console.log(playIcon);
      if (playIcon.parent().hasClass("replayButton")) {
        playIcon.removeClass("o-play-btn--playing opacity_hidden");
        playIcon.find(".o-play-btn__icon").addClass("opacity_hidden");
        playIcon.addClass("replayBtn");
      } else {
        playIcon.removeClass("o-play-btn--playing opacity_hidden");
      }
    });
  });

  //===============prevent simultaneous video playback===============

  if ($(".wayTestimonial video , .homeTestimonials video").length > 0) {
    $(".wayTestimonial video , .homeTestimonials video").bind(
      "play",
      function () {
        activated = this;

        $("audio,video").each(function () {
          if (this != activated) {
            this.pause();
            $(this)
              .parent()
              .parent()
              .find(".o-play-btn")
              .removeClass("o-play-btn--playing opacity_hidden");
          }
        });
      },
    );
  }

  // Main 5 Pages Video Pause Button on click
  $("#aim__background-video").on("click", function () {
    if ($(this).get(0).paused) {
      $(this)
        .parent()
        .find(".o-play-btn")
        .addClass("o-play-btn--playing opacity_hidden");
      status = "playing";
      $("#unmute__btn").addClass("showMuteBtn");
      $(this).get(0).play();
    } else {
      $(this)
        .parent()
        .find(".o-play-btn")
        .removeClass("o-play-btn--playing opacity_hidden");
      status = "paused";
      $("#unmute__btn").removeClass("showMuteBtn");
      $(this).get(0).pause();
    }
  });

  // Home Page Video Click Pause Play
  $(".heroVideo__container").on("click touchend", function () {
    // alert("hello");
    var src = $(this).find("video");
    if (src.get(0).paused) {
      src
        .parent()
        .siblings(".o-play-btn")
        .addClass("o-play-btn--playing opacity_hidden");
      $("#unmute__btn").addClass("muteVisible");
      src.get(0).play();
    } else {
      src
        .parent()
        .siblings(".o-play-btn")
        .removeClass("o-play-btn--playing opacity_hidden");
      $("#unmute__btn").removeClass("muteVisible");
      src.get(0).pause();
    }
  });

  // $('.heroVideo__container').on('click touchend' , function(){
  // 	alert("Hello;")
  // });

  // Ripple Effect
  if ($(window).width() <= 768) {
    // Waves.attach('.ripple');
  } else {
    Waves.attach(".ripple", ["waves-light", "waves-ripple"]);
  }
  Waves.attach(".backRipple , .submit__ripple", [
    "waves-light",
    "waves-ripple",
  ]);
  Waves.init();
});
