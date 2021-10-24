"use strict";
jQuery(window).on("load", function() {
  new WOW().init();
  var product_cart_wariant_val = jQuery.cookie("product_cart_wariant");
  if (product_cart_wariant_val == "variant_line") {
    jQuery(".main_product_container").addClass("container_variant_line");
    jQuery("body").addClass("product_container_variant_line");
  } else {
    jQuery(".main_product_container").removeClass("container_variant_line");
    jQuery("body").removeClass("product_container_variant_line");
  }
});

jQuery(document).ready(function($) {
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
  $(
    ".home_page_main_wrapper .home_page_product_line_container, .home_page_main_wrapper .leaders-slider"
  ).slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 321,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  $(".swiper-wrapper").slick({
    dots: true,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [{
      breakpoint: 1024,
      settings: {
        arrows: false,
      },
    }, ],
  });

  // conditions of slider Sales leaders
  const lengthOfSlides = $(
    ".single-product .home_page_product_line_container .product"
  ).length;
  if ($(window).width() < 420 && lengthOfSlides >= 2) {
    $(".single-product .home_page_product_line_container").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      arrows: true,
    });
  } else if ($(window).width() > 500 && lengthOfSlides >= 4) {
    $(".single-product .home_page_product_line_container").slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      dots: false,
      arrows: true,
      responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: true,
        },
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: true,
        },
      }, ],
    });
  } else {
    $(".single-product .home_page_product_line_container .product").css(
      "max-width",
      "190px"
    );
  }

  $(".cart_wariant_container_variant_line").on("click", function() {
    $(".main_product_container").addClass("container_variant_line");
    $("body").addClass("product_container_variant_line");
  });

  $(".cart_wariant_container_variant_block").on("click", function() {
    $(".main_product_container").removeClass("container_variant_line");
    $("body").removeClass("product_container_variant_line");
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
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 1,
      },
    }, ],
  });
  // SINGLE PRODUCT PAGE end

  // change Layout On Mobile
  function changeLayoutOnMobile() {
    if ($(window).width() <= 1199) {
      $(".header_taxonomy_list_container").append($(".taxonomy_navigation"));
      $(".header_taxonomy_list_container").append($(".header_wrapper_menu"));
      $(".header_taxonomy_head").append($(".header_wrapper_search_content"));

      $(".header_wrapper_menu").after($(".header_wrapper_lang"));

      $(".sitebar_container").prepend($(".woocommerce-ordering"));
      $("#primary-menu").prepend($(".header_wrapper_cabinet_icon_container"));

      $("#primary-menu").prepend(
        $(".header_wrapper_cabinet_icon_container_login")
      );
      $(".single_product_main_container .content-area").prepend(
        $(".product_title.entry-title")
      );
      $(".single_product_main_container .content-area").prepend(
        $(".single_product_btn")
      );

      $("#woocommerce_ordering").prepend("<div class='filter_btn'></div>");

      // product
      $(".attribute_content_wrapper").after(
        $(".woocommerce_main_content_wrapper")
      );
      $(".woocommerce_main_content_wrapper").after(
        $(".woocommerce_single_product_wrapper")
      );
      $(".woocommerce div.product p.price").wrap(
        '<div class="wrap_price-collors" />'
      );
      // $(".single-product .woocommerce div.product").prepend(
      //   $(".product_title entry-title")
      // );
      // $(".woocommerce div.product p.price").after(
      //   $(".woocommerce div.product form.cart .variations")
      // );
    } else if ($(window).width() <= 991) {
      $(".filter_wrap").prepend($("#custom_top_filter_select"));
    } else {
      $(".header_wrapper_logo").after($(".header_wrapper_menu"));
      $(".header_taxonomy_list").css("display", "flex");
      $("#woocommerce_ordering").prepend($(".woocommerce-ordering"));
      $(".header_wrapper_icon_wrapper").prepend($(".header_wrapper_lang"));
      // product single
      $(".woocommerce_custom_wrapper_start").prepend(
        $(".product_title entry-title")
      );
      $(".woocommerce_custom_wrapper_start").prepend($(".single_product_btn"));
    }
  }

  $(window).resize(() => {
    if ($(window).width() <= 1199) {
      $(".header_taxonomy_list_container").append($(".taxonomy_navigation"));
      $(".header_taxonomy_list_container").append($(".header_wrapper_menu"));
      $(".header_taxonomy_head").append($(".header_wrapper_search_content"));

      $(".header_wrapper_menu").after($(".header_wrapper_lang"));

      $(".sitebar_container").prepend($(".woocommerce-ordering"));
      $("#primary-menu").prepend($(".header_wrapper_cabinet_icon_container"));

      $("#primary-menu").prepend(
        $(".header_wrapper_cabinet_icon_container_login")
      );
      $(".header_top_wrapper_content").after($(".header_taxonomy_list"));
      $(".woocommerce div.product p.price").wrap(
        '<div class="wrap_price-collors" />'
      );
      $(".single_product_main_container .content-area").prepend(
        $(".product_title.entry-title")
      );
      $(".single_product_main_container .content-area").prepend(
        $(".single_product_btn")
      );
    } else if ($(window).width() <= 991) {
      $(".filter_wrap").prepend($("#custom_top_filter_select"));
    } else {
      // $(".header_wrapper_logo").after($(".header_wrapper_menu"));
      $(".header_taxonomy_list").css("display", "flex");
      $("#woocommerce_ordering").prepend($(".woocommerce-ordering"));
      $(".header_wrapper_icon_wrapper").prepend($(".header_wrapper_lang"));
      $(".header_wrapper_logo").after($(".header_wrapper_menu"));
      $(".header_wrapper_search_icon_container").after(
        $(".header_wrapper_cabinet_icon_container")
      );

      // product
      $(".single-product .woocommerce_custom_wrapper_start").prepend(
        $(".product_title.entry-title")
      );
      $(".woocommerce_custom_wrapper_start").prepend($(".single_product_btn"));
    }
    // changeLayoutOnMobile();
  });
  changeLayoutOnMobile();

  // search

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

  // filter on mobile

  $(".filter_btn").click(() => {
    $(".filter_wrap").slideToggle();
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

  $(document).on("click", ".like_btn_not_register", function() {
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

  if (document.documentElement.lang === "de-DE") {
    // product more properties btn
    $(".attribute_content_wrapper").prepend(
      "<div class='more_properties_btn'>Eigenschaften</div>"
    );
  } else {
    // product more properties btn
    $(".attribute_content_wrapper").prepend(
      "<div class='more_properties_btn'>Properties</div>"
    );
  }

  $(".more_properties_btn").click(() => {
    $(".more_properties_btn").toggleClass("open");
    $(".attribute_content_item_container").slideToggle();
  });

  // header mobile
  $(".categories_drop-down").click(() => {
    $(".topmenu").slideToggle();
  });

  // menu categories
  if ($(window).width() <= 1199) {
    $(".menu_main_item_link").click(function(e) {
      e.preventDefault();
      $(".submenu").slideUp();
      $(this).next().slideToggle();
    });
  }

  // close header on swipe left

  let startX = 0;
  let endX = 0;

  function handleTouchStart(e) {
    const x = e.changedTouches[0].clientX;
    startX = x;
  }

  function handleTouchEnd(e) {
    const x = e.changedTouches[0].clientX;
    endX = x + 100;
    if ($(".header_taxonomy_list_container").hasClass("open")) {
      if (startX > endX) {
        $(".burger").trigger("click");
      }
    }
  }

  document
    .querySelector(".header_taxonomy_list_container")
    .addEventListener("touchstart", handleTouchStart, false);
  document
    .querySelector(".header_taxonomy_list_container")
    .addEventListener("touchend", handleTouchEnd, false);

  // stock timer

  try {
    const stokDay = $(".stok_date_day").text();
    const stokMonth = $(".stok_date_month").text();
    const stokYear = $(".stok_date_year").text();

    let startDate = new Date("Sep 25 2021 00:00:00 GMT+0300");
    startDate = startDate.getTime() / 1000;

    let today = new Date();
    today = today.getTime() / 1000;

    let endDate = new Date(
      `${stokMonth} ${stokDay} ${stokYear} 00:00:00 GMT+0300`
    );
    endDate = endDate.getTime() / 1000;
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
  } catch (error) {
    console.log("error to start code of stock timer");
  }
});