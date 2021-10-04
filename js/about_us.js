"use strict";
jQuery(document).ready(function ($) {
  function countUp() {
    $(".count").each(function () {
      $(this)
        .prop("Counter", 0)
        .animate(
          {
            Counter: $(this).text(),
          },
          {
            duration: 4000,
            easing: "swing",
            step: function (now) {
              $(this).text(Math.ceil(now));
            },
          }
        );
    });
  }

  $(function () {
    "user strict";
    var bAnimate = true;
    $(".count").css("opacity", "0.0");

    $(window).scroll(function () {
      // console.log("scroll top=" + $(this).scrollTop());
      // console.log("div offset top=" + $("div").offset().top);
      var scrolling = $(this).scrollTop(),
        divoffset = $(".count").offset().top,
        screenBottom = scrolling + $(window).height(),
        elemBottom = divoffset + $(".count").outerHeight(); //
      if (screenBottom > elemBottom) {
        if (bAnimate) {
          $(".count").css("opacity", "1.0");
          countUp();
          bAnimate = false;
        }
      }
    });
  });

  $("#carousel").waterwheelCarousel({
    horizon: 110,
    horizonOffset: -50,
    horizonOffsetMultiplier: 0.7,
    separation: 250,
    edgeFadeEnabled: true,
    activeClassName: "carousel-center",
  });

  // $("#carousel").slick({
  //   centerMode: true,
  //   slidesToShow: 3,
  //   arrows: false,
  //   responsive: [
  //     {
  //       breakpoint: 1199,
  //       settings: {
  //         arrows: false,
  //         centerMode: true,
  //         slidesToShow: 1,
  //       },
  //     },
  //   ],
  // });

  setInterval(function () {
    $(".carousel_team_item .carousel_team_text_wrapper").removeClass("open");
    $(".carousel_team_item .carousel-center")
      .next(".carousel_team_text_wrapper")
      .addClass("open");
  }, 50);
});
