"use strict";
jQuery(window).on("load", function() {
  new WOW().init();
  var product_cart_wariant_val = jQuery.cookie("product_cart_wariant");
  if (product_cart_wariant_val == "variant_line") {
    jQuery(".main_product_container").addClass("container_variant_line");
  } else {
    jQuery(".main_product_container").removeClass("container_variant_line");
  }
});

jQuery(document).ready(function($) {
  // COLOR FILTER TO CATEGORY PAGES START
  // $('.custon_color_filter').on('click', function() {
  //   $('.sitebar_filter_wrapper_color input:checkbox').prop('checked', false);
  //   var color_name = $(this).attr("id");
  //   var color_name_lower = color_name.toLowerCase();
  //   console.log(color_name_lower);
  //   $('[data-term-slug="' + color_name_lower + '"]').find('input[type=checkbox]').prop('checked', true);
  // });
  // COLOR FILTER TO CATEGORY PAGES END

  // burger menu
  $(".burger-header").click(function() {
    $(".header_taxonomy_list_container").toggleClass("open");
    $(".burger-header .line-first").toggleClass("first-transform");
    $(".burger-header .line-second").toggleClass("second-transform");
    $(".burger-header .line-third").toggleClass("third-transform");
  });

  $(".header_taxonomy_list_head").click(() => {
    $(".header_taxonomy_list").slideToggle();
    $(".header_taxonomy_list_head").toggleClass("open");
  });

  $(".header_wrapper_basket_icon_container").on("click", function() {
    $(".xoo-wsc-basket").click();
  });

  $(".header_wrapper_lang").on("click", function() {
    $(".language_flag_container").toggleClass("open");
  });

  $(".woocommerce_main_content_wrapper_more_btn").on("click", function() {
    $(".woocommerce_main_content_wrapper_text").addClass("open");
    $(".woocommerce_main_content_wrapper_more_btn").removeClass("open");
    $(".woocommerce_main_content_wrapper_less_btn").addClass("open");
  });

  $(".woocommerce_main_content_wrapper_less_btn").on("click", function() {
    $(".woocommerce_main_content_wrapper_text").removeClass("open");
    $(".woocommerce_main_content_wrapper_more_btn").addClass("open");
    $(".woocommerce_main_content_wrapper_less_btn").removeClass("open");
  });

  // TAXONOMY PAGE START
  $(".cart_wariant_container_variant_line").on("click", function() {
    $.cookie("product_cart_wariant", "variant_line", {
      expires: 7,
      path: "/",
    });
  });

  $(".cart_wariant_container_variant_block").on("click", function() {
    $.cookie("product_cart_wariant", "variant_block", {
      expires: 7,
      path: "/",
    });
  });
  // var swiper = new Swiper(".mySwiper", {
  //   navigation: {
  //     nextEl: ".swiper-button-next",
  //     prevEl: ".swiper-button-prev",
  //   },
  //   // pagination: {
  //   //   el: ".swiper-pagination",
  //   //   type: "bullets",
  //   // },
  // });

  $(".home_page_main_wrapper .home_page_product_line_container").slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    dots: false,
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      },
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    }, ],
  });
  $(".swiper-wrapper").slick({
    dots: true,
    autoplay: true,
    autoplaySpeed: 2000,
  });

  $(".cart_wariant_container_variant_line").on("click", function() {
    $(".main_product_container").addClass("container_variant_line");
  });

  $(".cart_wariant_container_variant_block").on("click", function() {
    $(".main_product_container").removeClass("container_variant_line");
  });

  // $(".wpfFilterButton.wpfButton, .wpfFilterContent li").on(
  //   "click",
  //   function () {
  //     setTimeout(function () {
  //       var currentLocation = window.location;
  //       window.location.replace(currentLocation);
  //     }, 500);
  //   }
  // );

  // TAXONOMY PAGE END

  // SINGLE PRODUCT PAGE START

  $(".slider-for").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: ".slider-nav",
  });

  $(".slider-nav").slick({
    //slidesToScroll: 1,
    infinite: true,
    asNavFor: ".slider-for",
    focusOnSelect: true,
    variableWidth: true,
    autoplay: true,
    autoplaySpeed: 5000,
  });
  // SINGLE PRODUCT PAGE end

  // change Layout On Mobile
  function changeLayoutOnMobile() {
    if ($(window).width() <= 1199) {
      $(".header_taxonomy_list").after($(".header_wrapper_menu"));
      $(".sitebar_container").prepend($(".woocommerce-ordering"));
      $("#primary-menu").prepend($(".header_wrapper_cabinet_icon_container"));
      $(".header_top_wrapper_content").after(
        $(".header_wrapper_search_content")
      );
      $("#primary-menu").prepend(
        $(".header_wrapper_cabinet_icon_container_login")
      );
      $(".header_top_wrapper_content").after($(".header_taxonomy_list"));
    } else {
      $(".header_wrapper_logo").after($(".header_wrapper_menu"));
      $(".header_taxonomy_list").css("display", "flex");
      $("#woocommerce_ordering").prepend($(".woocommerce-ordering"));
    }
  }

  $(window).resize(() => {
    changeLayoutOnMobile();
  });
  changeLayoutOnMobile();

  // search
  if ($(window).width() >= 1199) {
    $(document).click((e) => {
      if (e.target.className === "header_wrapper_search_icon_container") {
        $(".header_wrapper_search_content").fadeToggle(100);
      } else if (
        e.target.className != "focus-visible" &&
        e.target.id != "search_article_wrapper_input" &&
        e.target.className != "search_article_wrapper" &&
        e.target.className != "header_wrapper_search_content"
      ) {
        $(".header_wrapper_search_content").fadeOut(100);
      }
    });
  }

  // filter on mobile

  $(".filter_btn").click(() => {
    $(".sitebar_container").slideToggle();
  });

  // form swicher
  $(".form_tumbler").click(function() {
    $(".form_reg_wrap").show();
    $(".form_log_wrap").show();
    $(this).parent().parent().toggle();
  });

  $(".header_wrapper_cabinet_icon_container").click(() => {
    $(".form_reg_log_wrapper").addClass("open");
  });

  $(".like_btn_not_register").click(() => {
    $(".form_reg_log_wrapper").addClass("open");
  });


  // form close
  $(".form_exit").click(() => {
    $(".form_reg_log_wrapper").removeClass("open");
  });
  $(".form_reg_log_wrapper").click((e) => {
    if (e.target.className === "form_reg_log_wrapper open") {
      $(".form_reg_log_wrapper").removeClass("open");
    }
  });

  // form edit toggle
  $("#edit_user_main_information").click(() => {
    $("#profile_user_add_form_main_wrapper").slideToggle();
  });

  // cabinet molile
  $(".header_wrapper_cabinet_icon_container").click(() => {
    $(".burger").trigger("click");
  });

  // stock timer

  let startDate = new Date("Sep 25 2021 00:00:00 GMT+0300");
  startDate = startDate.getTime() / 1000;

  let today = new Date();
  today = today.getTime() / 1000;

  let endDate = new Date("Sep 30 2021 00:00:00 GMT+0300");
  endDate = endDate.getTime() / 1000;

  console.log("end stok", $(".end-stok").text());

  console.log(startDate);
  console.log(today);
  console.log(endDate);

  $(".countdown").final_countdown({
    start: today,
    end: endDate,
    now: today,
    seconds: {
      borderColor: "#F7F7F7",
      borderWidth: "6",
    },
    minutes: {
      borderColor: "#F7F7F7",
      borderWidth: "6",
    },
    hours: {
      borderColor: "#F7F7F7",
      borderWidth: "6",
    },
    days: {
      borderColor: "#F7F7F7",
      borderWidth: "6",
    },
  });
});