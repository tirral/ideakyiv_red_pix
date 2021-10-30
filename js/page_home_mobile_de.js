"use strict";

jQuery(window).load(function() {

  setTimeout(function() {
    jQuery('.home_page_main_container_header_slider .swiper-slide').each(function() {
      jQuery(this).find('.swiper_slide_plug_wrapper').remove();
      var bg_image = jQuery(this).attr("data-url");
      jQuery(this).css('background-image', 'url(' + bg_image + ')');
    });
  }, 1000);



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



  if (jQuery(window).width() > 768) {
    setTimeout(function() {
      my_slide_nubber = 1;
      my_post_id = 808;
      parse_to_cart();
    }, 1000);
    setTimeout(function() {
      my_slide_nubber = 2;
      my_post_id = 809;
      parse_to_cart();
    }, 1500);
    setTimeout(function() {
      my_slide_nubber = 3;
      my_post_id = 811;
      parse_to_cart();
    }, 2000);
    setTimeout(function() {
      my_slide_nubber = 4;
      my_post_id = 813;
      parse_to_cart();
    }, 2500);

    setTimeout(function() {
      my_slide_nubber = 7;
      my_post_id = 734;
      parse_to_cart();
    }, 3000);
    setTimeout(function() {
      my_slide_nubber = 8;
      my_post_id = 739;
      parse_to_cart();
    }, 3500);
    setTimeout(function() {
      my_slide_nubber = 9;
      my_post_id = 744;
      parse_to_cart();
    }, 4000);
    setTimeout(function() {
      my_slide_nubber = 10;
      my_post_id = 749;
      parse_to_cart();
    }, 4500);

    setTimeout(function() {
      jQuery('body').addClass('loaded');
    }, 4500);
  }



  if (jQuery(window).width() > 414 && jQuery(window).width() <= 768) {

    setTimeout(function() {
      my_slide_nubber = 1;
      my_post_id = 808;
      parse_to_cart();
    }, 1000);
    setTimeout(function() {
      my_slide_nubber = 2;
      my_post_id = 809;
      parse_to_cart();
    }, 1500);
    setTimeout(function() {
      my_slide_nubber = 3;
      my_post_id = 811;
      parse_to_cart();
    }, 2000);

    setTimeout(function() {
      my_slide_nubber = 7;
      my_post_id = 734;
      parse_to_cart();
    }, 2500);
    setTimeout(function() {
      my_slide_nubber = 8;
      my_post_id = 739;
      parse_to_cart();
    }, 3000);
    setTimeout(function() {
      my_slide_nubber = 9;
      my_post_id = 744;
      parse_to_cart();
    }, 3500);

    setTimeout(function() {
      jQuery('body').addClass('loaded');
    }, 3500);
  }


  if (jQuery(window).width() > 320 && jQuery(window).width() <= 414) {

    setTimeout(function() {
      my_slide_nubber = 1;
      my_post_id = 808;
      parse_to_cart();
    }, 1000);
    setTimeout(function() {
      my_slide_nubber = 2;
      my_post_id = 809;
      parse_to_cart();
    }, 1500);

    setTimeout(function() {
      my_slide_nubber = 7;
      my_post_id = 734;
      parse_to_cart();
    }, 2000);
    setTimeout(function() {
      my_slide_nubber = 8;
      my_post_id = 739;
      parse_to_cart();
    }, 2500);

    setTimeout(function() {
      jQuery('body').addClass('loaded');
    }, 2500);
  }


  if (jQuery(window).width() <= 320) {

    setTimeout(function() {
      my_slide_nubber = 1;
      my_post_id = 808;
      parse_to_cart();
    }, 1000);

    setTimeout(function() {
      my_slide_nubber = 7;
      my_post_id = 734;
      parse_to_cart();
    }, 1500);

    setTimeout(function() {
      jQuery('body').addClass('loaded');
    }, 1500);
  }





});