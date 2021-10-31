"use strict";

jQuery(window).load(function() {


  setTimeout(function() {
    jQuery('.home_page_main_container_header_slider .swiper-slide').each(function() {
      jQuery(this).find('.swiper_slide_plug_wrapper').remove();
      var bg_image = jQuery(this).attr("data-url");
      jQuery(this).css('background-image', 'url(' + bg_image + ')');
    });
  }, 7000);


  function parse_to_cart() {

    let slide_number = my_slide_nubber;
    let post_id = my_post_id;
    var result = document.getElementById("plug_product_cart_wrapper_" + slide_number);
    var ourReqest = new XMLHttpRequest();

    ourReqest.open("GET", "http://tigall.red-pix.com/wp-json/wp/v2/product/" + post_id + "?_embed");
    ourReqest.onload = function() {
      var ourData = JSON.parse(ourReqest.responseText);
      if (ourData._embedded["wp:featuredmedia"][0].source_url != null) {
        var cuctom_user_login = jQuery.cookie("cuctom_user_login");
        if (cuctom_user_login == "login") {
          const array1 = Array.from(document.getElementsByClassName('product_id_favorite')).map(item => item.getAttribute('foo'));
          if (jQuery.inArray('' + ourData.id + '', array1) !== -1) {
            if (ourData._sale_price > 0) {
              result.innerHTML +=
                '<li data-user_id="' + jQuery.cookie("cuctom_user_login_id") + '" data-product_id="' + ourData.id + '"  class="plug_product_cart_wrapper">' +
                '<div class="remowe_like_btn show_like_btn"></div>' +
                '<div class="like_btn hide_like_btn"></div>' +
                '<a href="' + ourData.link + '"><div class="plug_product_cart_wrapper_img">' +
                '<img src="' + ourData._embedded["wp:featuredmedia"][0].source_url + '">' +
                '</div>' +
                '<div class="plug_product_cart_wrapper_title">' + ourData.title.rendered + '</div>' +
                '<div class="plug_product_cart_wrapper_text">' + ourData.content.rendered.slice(0, 46) + '...</div>' +
                '<div class="plug_product_cart_wrapper_prise"><span class="plug_product_cart_wrapper_prise_sale">€' + ourData._sale_price + '</span><span class="plug_product_cart_wrapper_prise_regular">€' + ourData._regular_price + '</span></div>' +
                '<div class="plug_product_cart_wrapper_rating">' +
                '<strong class="rating">' +
                '<div class="star-rating ehi-star-rating">' +
                '<span style="width:' + (ourData._wc_average_rating) * 20 + '%"></span>' +
                '</div>' +
                '</div>' +
                '<a href="?add-to-cart=' + ourData.id + '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="' + ourData.id + '">Kaufen</a>' +
                '</li>';
            } else {
              result.innerHTML +=
                '<li data-user_id="' + jQuery.cookie("cuctom_user_login_id") + '" data-product_id="' + ourData.id + '" class="plug_product_cart_wrapper ">' +
                '<div class="remowe_like_btn show_like_btn"></div>' +
                '<div class="like_btn hide_like_btn"></div>' +
                '<a href="' + ourData.link + '"><div class="plug_product_cart_wrapper_img">' +
                '<img src="' + ourData._embedded["wp:featuredmedia"][0].source_url + '">' +
                '</div>' +
                '<div class="plug_product_cart_wrapper_title">' + ourData.title.rendered + '</div>' +
                '<div class="plug_product_cart_wrapper_text">' + ourData.content.rendered.slice(0, 46) + '...</div>' +
                '<div class="plug_product_cart_wrapper_prise"> €' + ourData._price + '</div>' +
                '<div class="plug_product_cart_wrapper_rating">' +
                '<strong class="rating">' +
                '<div class="star-rating ehi-star-rating">' +
                '<span style="width:' + (ourData._wc_average_rating) * 20 + '%"></span>' +
                '</div>' +
                '</div>' +
                '<a href="?add-to-cart=' + ourData.id + '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="' + ourData.id + '">Kaufen</a>' +
                '</li>';
            }
          } else {
            if (ourData._sale_price > 0) {
              result.innerHTML +=
                '<li data-user_id="' + jQuery.cookie("cuctom_user_login_id") + '" data-product_id="' + ourData.id + '" class="plug_product_cart_wrapper">' +
                '<div class="like_btn show_like_btn"></div>' +
                '<div class="remowe_like_btn hide_like_btn"></div>' +
                '<a href="' + ourData.link + '"><div class="plug_product_cart_wrapper_img">' +
                '<img src="' + ourData._embedded["wp:featuredmedia"][0].source_url + '">' +
                '</div>' +
                '<div class="plug_product_cart_wrapper_title">' + ourData.title.rendered + '</div>' +
                '<div class="plug_product_cart_wrapper_text">' + ourData.content.rendered.slice(0, 46) + '...</div>' +
                '<div class="plug_product_cart_wrapper_prise"><span class="plug_product_cart_wrapper_prise_sale">€' + ourData._sale_price + '</span><span class="plug_product_cart_wrapper_prise_regular">€' + ourData._regular_price + '</span></div>' +
                '<div class="plug_product_cart_wrapper_rating">' +
                '<strong class="rating">' +
                '<div class="star-rating ehi-star-rating">' +
                '<span style="width:' + (ourData._wc_average_rating) * 20 + '%"></span>' +
                '</div>' +
                '</div>' +
                '<a href="?add-to-cart=' + ourData.id + '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="' + ourData.id + '">Kaufen</a>' +
                '</li>';
            } else {
              result.innerHTML +=
                '<li data-user_id="' + jQuery.cookie("cuctom_user_login_id") + '" data-product_id="' + ourData.id + '" class="plug_product_cart_wrapper">' +
                '<div class="like_btn show_like_btn"></div>' +
                '<div class="remowe_like_btn hide_like_btn"></div>' +
                '<a href="' + ourData.link + '"><div class="plug_product_cart_wrapper_img">' +
                '<img src="' + ourData._embedded["wp:featuredmedia"][0].source_url + '">' +
                '</div>' +
                '<div class="plug_product_cart_wrapper_title">' + ourData.title.rendered + '</div>' +
                '<div class="plug_product_cart_wrapper_text">' + ourData.content.rendered.slice(0, 46) + '...</div>' +
                '<div class="plug_product_cart_wrapper_prise"> €' + ourData._price + '</div>' +
                '<div class="plug_product_cart_wrapper_rating">' +
                '<strong class="rating">' +
                '<div class="star-rating ehi-star-rating">' +
                '<span style="width:' + (ourData._wc_average_rating) * 20 + '%"></span>' +
                '</div>' +
                '</div>' +
                '<a href="?add-to-cart=' + ourData.id + '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="' + ourData.id + '">Kaufen</a>' +
                '</li>';
            }
          }
        } else {
          if (ourData._sale_price > 0) {
            result.innerHTML +=
              '<li class="plug_product_cart_wrapper">' +
              '<div class="like_btn_not_register"></div>' +
              '<a href="' + ourData.link + '"><div class="plug_product_cart_wrapper_img">' +
              '<img src="' + ourData._embedded["wp:featuredmedia"][0].source_url + '">' +
              '</div>' +
              '<div class="plug_product_cart_wrapper_title">' + ourData.title.rendered + '</div>' +
              '<div class="plug_product_cart_wrapper_text">' + ourData.content.rendered.slice(0, 46) + '...</div>' +
              '<div class="plug_product_cart_wrapper_prise"><span class="plug_product_cart_wrapper_prise_sale">€' + ourData._sale_price + '</span><span class="plug_product_cart_wrapper_prise_regular">€' + ourData._regular_price + '</span></div>' +
              '<div class="plug_product_cart_wrapper_rating">' +
              '<strong class="rating">' +
              '<div class="star-rating ehi-star-rating">' +
              '<span style="width:' + (ourData._wc_average_rating) * 20 + '%"></span>' +
              '</div>' +
              '</div>' +
              '<a href="?add-to-cart=' + ourData.id + '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="' + ourData.id + '">Kaufen</a>' +
              '</li>';
          } else {
            result.innerHTML +=
              '<li class="plug_product_cart_wrapper ">' +
              '<div class="like_btn_not_register"></div>' +
              '<a href="' + ourData.link + '"><div class="plug_product_cart_wrapper_img">' +
              '<img src="' + ourData._embedded["wp:featuredmedia"][0].source_url + '">' +
              '</div>' +
              '<div class="plug_product_cart_wrapper_title">' + ourData.title.rendered + '</div>' +
              '<div class="plug_product_cart_wrapper_text">' + ourData.content.rendered.slice(0, 46) + '...</div>' +
              '<div class="plug_product_cart_wrapper_prise"> €' + ourData._price + '</div>' +
              '<div class="plug_product_cart_wrapper_rating">' +
              '<strong class="rating">' +
              '<div class="star-rating ehi-star-rating">' +
              '<span style="width:' + (ourData._wc_average_rating) * 20 + '%"></span>' +
              '</div>' +
              '</div>' +
              '<a href="?add-to-cart=' + ourData.id + '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="' + ourData.id + '">Kaufen</a>' +
              '</li>';
          }
        }
      }
      if (ourReqest.status != 200) {
        // обработать ошибку
      } else {
        jQuery("#plug_product_cart_wrapper_" + slide_number + "  .dum_img").remove();
      }
    };
    ourReqest.send();

  }

  // ========================================
  //=============== FOR 1024 PX
  // ========================================

  if (jQuery(window).width() > 768) {

    setTimeout(function() {
      my_slide_nubber = 1;
      my_post_id = jQuery('#home_page_popular_product_id_1').attr("data-id");
      parse_to_cart();
    }, 1000);
    setTimeout(function() {
      my_slide_nubber = 2;
      my_post_id = jQuery('#home_page_popular_product_id_2').attr("data-id");
      parse_to_cart();
    }, 1500);
    setTimeout(function() {
      my_slide_nubber = 3;
      my_post_id = jQuery('#home_page_popular_product_id_3').attr("data-id");
      parse_to_cart();
    }, 2000);
    setTimeout(function() {
      my_slide_nubber = 4;
      my_post_id = jQuery('#home_page_popular_product_id_4').attr("data-id");
      parse_to_cart();
    }, 2500);

    setTimeout(function() {
      my_slide_nubber = 13;
      my_post_id = jQuery('#home_page_new_product_id_1').attr("data-id");
      parse_to_cart();
    }, 3000);
    setTimeout(function() {
      my_slide_nubber = 14;
      my_post_id = jQuery('#home_page_new_product_id_2').attr("data-id");
      parse_to_cart();
    }, 3500);
    setTimeout(function() {
      my_slide_nubber = 15;
      my_post_id = jQuery('#home_page_new_product_id_3').attr("data-id");
      parse_to_cart();
    }, 4000);
    setTimeout(function() {
      my_slide_nubber = 16;
      my_post_id = jQuery('#home_page_new_product_id_4').attr("data-id");
      parse_to_cart();
    }, 4500);

    setTimeout(function() {
      jQuery('body').addClass('loaded');
    }, 4500);

    // after lider remove

    setTimeout(function() {
      my_slide_nubber = 5;
      my_post_id = jQuery('#home_page_popular_product_id_5').attr("data-id");
      parse_to_cart();
    }, 5000);
    setTimeout(function() {
      my_slide_nubber = 17;
      my_post_id = jQuery('#home_page_new_product_id_5').attr("data-id");
      parse_to_cart();
    }, 5500);
    setTimeout(function() {
      my_slide_nubber = 6;
      my_post_id = jQuery('#home_page_popular_product_id_6').attr("data-id");
      parse_to_cart();
    }, 6000);
    setTimeout(function() {
      my_slide_nubber = 18;
      my_post_id = jQuery('#home_page_new_product_id_6').attr("data-id");
      parse_to_cart();
    }, 6500);
    setTimeout(function() {
      my_slide_nubber = 7;
      my_post_id = jQuery('#home_page_popular_product_id_7').attr("data-id");
      parse_to_cart();
    }, 7000);
    setTimeout(function() {
      my_slide_nubber = 19;
      my_post_id = jQuery('#home_page_new_product_id_7').attr("data-id");
      parse_to_cart();
    }, 7500);
    setTimeout(function() {
      my_slide_nubber = 8;
      my_post_id = jQuery('#home_page_popular_product_id_8').attr("data-id");
      parse_to_cart();
    }, 8000);
    setTimeout(function() {
      my_slide_nubber = 20;
      my_post_id = jQuery('#home_page_new_product_id_8').attr("data-id");
      parse_to_cart();
    }, 8500);
    setTimeout(function() {
      my_slide_nubber = 9;
      my_post_id = jQuery('#home_page_popular_product_id_9').attr("data-id");
      parse_to_cart();
    }, 9000);
    setTimeout(function() {
      my_slide_nubber = 21;
      my_post_id = jQuery('#home_page_new_product_id_9').attr("data-id");
      parse_to_cart();
    }, 9500);
    setTimeout(function() {
      my_slide_nubber = 10;
      my_post_id = jQuery('#home_page_popular_product_id_10').attr("data-id");
      parse_to_cart();
    }, 10000);
    setTimeout(function() {
      my_slide_nubber = 22;
      my_post_id = jQuery('#home_page_new_product_id_10').attr("data-id");
      parse_to_cart();
    }, 10500);
    setTimeout(function() {
      my_slide_nubber = 11;
      my_post_id = jQuery('#home_page_popular_product_id_11').attr("data-id");
      parse_to_cart();
    }, 11500);
    setTimeout(function() {
      my_slide_nubber = 23;
      my_post_id = jQuery('#home_page_new_product_id_11').attr("data-id");
      parse_to_cart();
    }, 12000);
    setTimeout(function() {
      my_slide_nubber = 12;
      my_post_id = jQuery('#home_page_popular_product_id_12').attr("data-id");
      parse_to_cart();
    }, 12500);
    setTimeout(function() {
      my_slide_nubber = 24;
      my_post_id = jQuery('#home_page_new_product_id_12').attr("data-id");
      parse_to_cart();
    }, 13000);

  }

  // ========================================
  //=============== FOR 768 PX
  // ========================================

  if (jQuery(window).width() > 414 && jQuery(window).width() <= 768) {

    setTimeout(function() {
      my_slide_nubber = 1;
      my_post_id = jQuery('#home_page_popular_product_id_1').attr("data-id");
      parse_to_cart();
    }, 1000);
    setTimeout(function() {
      my_slide_nubber = 2;
      my_post_id = jQuery('#home_page_popular_product_id_2').attr("data-id");
      parse_to_cart();
    }, 1500);

    setTimeout(function() {
      my_slide_nubber = 3;
      my_post_id = jQuery('#home_page_popular_product_id_3').attr("data-id");
      parse_to_cart();
    }, 2000);
    setTimeout(function() {
      my_slide_nubber = 4;
      my_post_id = jQuery('#home_page_popular_product_id_4').attr("data-id");
      parse_to_cart();
    }, 2500);

    setTimeout(function() {
      my_slide_nubber = 13;
      my_post_id = jQuery('#home_page_new_product_id_1').attr("data-id");
      parse_to_cart();
    }, 3000);
    setTimeout(function() {
      my_slide_nubber = 14;
      my_post_id = jQuery('#home_page_new_product_id_2').attr("data-id");
      parse_to_cart();
    }, 3500);


    setTimeout(function() {
      jQuery('body').addClass('loaded');
    }, 3500);

    // after lider remove

    setTimeout(function() {
      my_slide_nubber = 15;
      my_post_id = jQuery('#home_page_new_product_id_3').attr("data-id");
      parse_to_cart();
    }, 4000);
    setTimeout(function() {
      my_slide_nubber = 16;
      my_post_id = jQuery('#home_page_new_product_id_4').attr("data-id");
      parse_to_cart();
    }, 4500);

    setTimeout(function() {
      my_slide_nubber = 5;
      my_post_id = jQuery('#home_page_popular_product_id_5').attr("data-id");
      parse_to_cart();
    }, 5000);
    setTimeout(function() {
      my_slide_nubber = 17;
      my_post_id = jQuery('#home_page_new_product_id_5').attr("data-id");
      parse_to_cart();
    }, 5500);
    setTimeout(function() {
      my_slide_nubber = 6;
      my_post_id = jQuery('#home_page_popular_product_id_6').attr("data-id");
      parse_to_cart();
    }, 6000);
    setTimeout(function() {
      my_slide_nubber = 18;
      my_post_id = jQuery('#home_page_new_product_id_6').attr("data-id");
      parse_to_cart();
    }, 6500);
    setTimeout(function() {
      my_slide_nubber = 7;
      my_post_id = jQuery('#home_page_popular_product_id_7').attr("data-id");
      parse_to_cart();
    }, 7000);
    setTimeout(function() {
      my_slide_nubber = 19;
      my_post_id = jQuery('#home_page_new_product_id_7').attr("data-id");
      parse_to_cart();
    }, 7500);
    setTimeout(function() {
      my_slide_nubber = 8;
      my_post_id = jQuery('#home_page_popular_product_id_8').attr("data-id");
      parse_to_cart();
    }, 8000);
    setTimeout(function() {
      my_slide_nubber = 20;
      my_post_id = jQuery('#home_page_new_product_id_8').attr("data-id");
      parse_to_cart();
    }, 8500);
    setTimeout(function() {
      my_slide_nubber = 9;
      my_post_id = jQuery('#home_page_popular_product_id_9').attr("data-id");
      parse_to_cart();
    }, 9000);
    setTimeout(function() {
      my_slide_nubber = 21;
      my_post_id = jQuery('#home_page_new_product_id_9').attr("data-id");
      parse_to_cart();
    }, 9500);
    setTimeout(function() {
      my_slide_nubber = 10;
      my_post_id = jQuery('#home_page_popular_product_id_10').attr("data-id");
      parse_to_cart();
    }, 10000);
    setTimeout(function() {
      my_slide_nubber = 22;
      my_post_id = jQuery('#home_page_new_product_id_10').attr("data-id");
      parse_to_cart();
    }, 10500);
    setTimeout(function() {
      my_slide_nubber = 11;
      my_post_id = jQuery('#home_page_popular_product_id_11').attr("data-id");
      parse_to_cart();
    }, 11500);
    setTimeout(function() {
      my_slide_nubber = 23;
      my_post_id = jQuery('#home_page_new_product_id_11').attr("data-id");
      parse_to_cart();
    }, 12000);
    setTimeout(function() {
      my_slide_nubber = 12;
      my_post_id = jQuery('#home_page_popular_product_id_12').attr("data-id");
      parse_to_cart();
    }, 12500);
    setTimeout(function() {
      my_slide_nubber = 24;
      my_post_id = jQuery('#home_page_new_product_id_12').attr("data-id");
      parse_to_cart();
    }, 13000);

  }



  // ========================================
  //=============== FOR 414 PX
  // ========================================

  if (jQuery(window).width() > 320 && jQuery(window).width() <= 414) {

    setTimeout(function() {
      my_slide_nubber = 1;
      my_post_id = jQuery('#home_page_popular_product_id_1').attr("data-id");
      parse_to_cart();
    }, 5000);
    setTimeout(function() {
      my_slide_nubber = 2;
      my_post_id = jQuery('#home_page_popular_product_id_2').attr("data-id");
      parse_to_cart();
    }, 5500);

    setTimeout(function() {
      my_slide_nubber = 3;
      my_post_id = jQuery('#home_page_popular_product_id_3').attr("data-id");
      parse_to_cart();
    }, 6000);
    setTimeout(function() {
      my_slide_nubber = 4;
      my_post_id = jQuery('#home_page_popular_product_id_4').attr("data-id");
      parse_to_cart();
    }, 6500);

    setTimeout(function() {
      jQuery('body').addClass('loaded');
    }, 6000);

    // after lider remove
    setTimeout(function() {
      my_slide_nubber = 13;
      my_post_id = jQuery('#home_page_new_product_id_1').attr("data-id");
      parse_to_cart();
    }, 7000);
    setTimeout(function() {
      my_slide_nubber = 14;
      my_post_id = jQuery('#home_page_new_product_id_2').attr("data-id");
      parse_to_cart();
    }, 7500);

    setTimeout(function() {
      my_slide_nubber = 15;
      my_post_id = jQuery('#home_page_new_product_id_3').attr("data-id");
      parse_to_cart();
    }, 8000);
    setTimeout(function() {
      my_slide_nubber = 16;
      my_post_id = jQuery('#home_page_new_product_id_4').attr("data-id");
      parse_to_cart();
    }, 9500);

    setTimeout(function() {
      my_slide_nubber = 5;
      my_post_id = jQuery('#home_page_popular_product_id_5').attr("data-id");
      parse_to_cart();
    }, 10000);
    setTimeout(function() {
      my_slide_nubber = 17;
      my_post_id = jQuery('#home_page_new_product_id_5').attr("data-id");
      parse_to_cart();
    }, 11000);
    setTimeout(function() {
      my_slide_nubber = 6;
      my_post_id = jQuery('#home_page_popular_product_id_6').attr("data-id");
      parse_to_cart();
    }, 11500);
    setTimeout(function() {
      my_slide_nubber = 18;
      my_post_id = jQuery('#home_page_new_product_id_6').attr("data-id");
      parse_to_cart();
    }, 12000);
    setTimeout(function() {
      my_slide_nubber = 7;
      my_post_id = jQuery('#home_page_popular_product_id_7').attr("data-id");
      parse_to_cart();
    }, 12500);
    setTimeout(function() {
      my_slide_nubber = 19;
      my_post_id = jQuery('#home_page_new_product_id_7').attr("data-id");
      parse_to_cart();
    }, 13000);
    setTimeout(function() {
      my_slide_nubber = 8;
      my_post_id = jQuery('#home_page_popular_product_id_8').attr("data-id");
      parse_to_cart();
    }, 14000);
    setTimeout(function() {
      my_slide_nubber = 20;
      my_post_id = jQuery('#home_page_new_product_id_8').attr("data-id");
      parse_to_cart();
    }, 14500);
    setTimeout(function() {
      my_slide_nubber = 9;
      my_post_id = jQuery('#home_page_popular_product_id_9').attr("data-id");
      parse_to_cart();
    }, 15000);
    setTimeout(function() {
      my_slide_nubber = 21;
      my_post_id = jQuery('#home_page_new_product_id_9').attr("data-id");
      parse_to_cart();
    }, 15500);
    setTimeout(function() {
      my_slide_nubber = 10;
      my_post_id = jQuery('#home_page_popular_product_id_10').attr("data-id");
      parse_to_cart();
    }, 16000);
    setTimeout(function() {
      my_slide_nubber = 22;
      my_post_id = jQuery('#home_page_new_product_id_10').attr("data-id");
      parse_to_cart();
    }, 16500);
    setTimeout(function() {
      my_slide_nubber = 11;
      my_post_id = jQuery('#home_page_popular_product_id_11').attr("data-id");
      parse_to_cart();
    }, 17000);
    setTimeout(function() {
      my_slide_nubber = 23;
      my_post_id = jQuery('#home_page_new_product_id_11').attr("data-id");
      parse_to_cart();
    }, 17500);
    setTimeout(function() {
      my_slide_nubber = 12;
      my_post_id = jQuery('#home_page_popular_product_id_12').attr("data-id");
      parse_to_cart();
    }, 18000);
    setTimeout(function() {
      my_slide_nubber = 24;
      my_post_id = jQuery('#home_page_new_product_id_12').attr("data-id");
      parse_to_cart();
    }, 18500);
  }


  if (jQuery(window).width() <= 320) {

    setTimeout(function() {
      my_slide_nubber = 1;
      my_post_id = jQuery('#home_page_popular_product_id_1').attr("data-id");
      parse_to_cart();
    }, 5000);
    setTimeout(function() {
      my_slide_nubber = 2;
      my_post_id = jQuery('#home_page_popular_product_id_2').attr("data-id");
      parse_to_cart();
    }, 5500);


    setTimeout(function() {
      jQuery('body').addClass('loaded');
    }, 5500);

    // after lider remove

    setTimeout(function() {
      my_slide_nubber = 3;
      my_post_id = jQuery('#home_page_popular_product_id_3').attr("data-id");
      parse_to_cart();
    }, 6000);
    setTimeout(function() {
      my_slide_nubber = 4;
      my_post_id = jQuery('#home_page_popular_product_id_4').attr("data-id");
      parse_to_cart();
    }, 6500);


    setTimeout(function() {
      my_slide_nubber = 13;
      my_post_id = jQuery('#home_page_new_product_id_1').attr("data-id");
      parse_to_cart();
    }, 7000);
    setTimeout(function() {
      my_slide_nubber = 14;
      my_post_id = jQuery('#home_page_new_product_id_2').attr("data-id");
      parse_to_cart();
    }, 7500);

    setTimeout(function() {
      my_slide_nubber = 15;
      my_post_id = jQuery('#home_page_new_product_id_3').attr("data-id");
      parse_to_cart();
    }, 8000);
    setTimeout(function() {
      my_slide_nubber = 16;
      my_post_id = jQuery('#home_page_new_product_id_4').attr("data-id");
      parse_to_cart();
    }, 9500);

    setTimeout(function() {
      my_slide_nubber = 5;
      my_post_id = jQuery('#home_page_popular_product_id_5').attr("data-id");
      parse_to_cart();
    }, 10000);
    setTimeout(function() {
      my_slide_nubber = 17;
      my_post_id = jQuery('#home_page_new_product_id_5').attr("data-id");
      parse_to_cart();
    }, 11000);
    setTimeout(function() {
      my_slide_nubber = 6;
      my_post_id = jQuery('#home_page_popular_product_id_6').attr("data-id");
      parse_to_cart();
    }, 11500);
    setTimeout(function() {
      my_slide_nubber = 18;
      my_post_id = jQuery('#home_page_new_product_id_6').attr("data-id");
      parse_to_cart();
    }, 12000);
    setTimeout(function() {
      my_slide_nubber = 7;
      my_post_id = jQuery('#home_page_popular_product_id_7').attr("data-id");
      parse_to_cart();
    }, 12500);
    setTimeout(function() {
      my_slide_nubber = 19;
      my_post_id = jQuery('#home_page_new_product_id_7').attr("data-id");
      parse_to_cart();
    }, 13000);
    setTimeout(function() {
      my_slide_nubber = 8;
      my_post_id = jQuery('#home_page_popular_product_id_8').attr("data-id");
      parse_to_cart();
    }, 14000);
    setTimeout(function() {
      my_slide_nubber = 20;
      my_post_id = jQuery('#home_page_new_product_id_8').attr("data-id");
      parse_to_cart();
    }, 14500);
    setTimeout(function() {
      my_slide_nubber = 9;
      my_post_id = jQuery('#home_page_popular_product_id_9').attr("data-id");
      parse_to_cart();
    }, 15000);
    setTimeout(function() {
      my_slide_nubber = 21;
      my_post_id = jQuery('#home_page_new_product_id_9').attr("data-id");
      parse_to_cart();
    }, 15500);
    setTimeout(function() {
      my_slide_nubber = 10;
      my_post_id = jQuery('#home_page_popular_product_id_10').attr("data-id");
      parse_to_cart();
    }, 16000);
    setTimeout(function() {
      my_slide_nubber = 22;
      my_post_id = jQuery('#home_page_new_product_id_10').attr("data-id");
      parse_to_cart();
    }, 16500);
    setTimeout(function() {
      my_slide_nubber = 11;
      my_post_id = jQuery('#home_page_popular_product_id_11').attr("data-id");
      parse_to_cart();
    }, 17000);
    setTimeout(function() {
      my_slide_nubber = 23;
      my_post_id = jQuery('#home_page_new_product_id_11').attr("data-id");
      parse_to_cart();
    }, 17500);
    setTimeout(function() {
      my_slide_nubber = 12;
      my_post_id = jQuery('#home_page_popular_product_id_12').attr("data-id");
      parse_to_cart();
    }, 18000);
    setTimeout(function() {
      my_slide_nubber = 24;
      my_post_id = jQuery('#home_page_new_product_id_12').attr("data-id");
      parse_to_cart();
    }, 18500);



  }





});