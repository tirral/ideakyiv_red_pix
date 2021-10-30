"use strict";

jQuery(window).load(function() {

  setTimeout(function() {
    jQuery('.home_page_main_container_header_slider .swiper-slide').each(function() {
      jQuery(this).find('.swiper_slide_plug_wrapper').remove();
      var bg_image = jQuery(this).attr("data-url");
      jQuery(this).css('background-image', 'url(' + bg_image + ')');
    });
  }, 4000);

  function slickCarouselleaders() {
    jQuery("#sales_leaders_container").slick({
      slidesToShow: 4,
      dots: false,
      arrows: true,
      responsive: [{
          breakpoint: 767,
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
  }




  function destroyCarouselleaders() {
    if (jQuery('#sales_leaders_container').hasClass('slick-initialized')) {
      jQuery('#sales_leaders_container').slick('destroy');
    }
  }

  setTimeout(function() {
    var counter = 0;
    var result = document.getElementById("sales_leaders_container");
    var ourReqest = new XMLHttpRequest();
    ourReqest.open(
      "GET",
      "http://tigall.red-pix.com/wp-json/wp/v2/product?_embed&per_page=40&order=desc"
    );
    ourReqest.onload = function() {
      var ourData = JSON.parse(ourReqest.responseText);
      for (var i = 0; i < ourData.length; i++) {
        if (counter <= 12) {
          if (ourData[i]._embedded["wp:featuredmedia"][0].source_url != null) {
            if (ourData[i].lang == 'de') {
              var cuctom_user_login = jQuery.cookie("cuctom_user_login");

              if (cuctom_user_login == "login") {
                const array1 = Array.from(document.getElementsByClassName('product_id_favorite')).map(item => item.getAttribute('foo'));
                if (jQuery.inArray('' + ourData[i].id + '', array1) !== -1) {



                  if (ourData[i]._sale_price > 0) {
                    result.innerHTML +=
                      '<li data-user_id="' + jQuery.cookie("cuctom_user_login_id") + '" data-product_id="' + ourData[i].id + '"  class="plug_product_cart_wrapper">' +
                      '<div class="remowe_like_btn show_like_btn"></div>' +
                      '<div class="like_btn hide_like_btn"></div>' +
                      '<a href="' + ourData[i].link + '"><div class="plug_product_cart_wrapper_img">' +
                      '<img src="' + ourData[i]._embedded["wp:featuredmedia"][0].source_url + '">' +
                      '</div>' +
                      '<div class="plug_product_cart_wrapper_title">' + ourData[i].title.rendered + '</div>' +
                      '<div class="plug_product_cart_wrapper_text">' + ourData[i].content.rendered.slice(0, 46) + '...</div>' +
                      '<div class="plug_product_cart_wrapper_prise"><span class="plug_product_cart_wrapper_prise_sale">€' + ourData[i]._sale_price + '</span><span class="plug_product_cart_wrapper_prise_regular">€' + ourData[i]._regular_price + '</span></div>' +
                      '<div class="plug_product_cart_wrapper_rating">' +
                      '<strong class="rating">' +
                      '<div class="star-rating ehi-star-rating">' +
                      '<span style="width:' + (ourData[i]._wc_average_rating) * 20 + '%"></span>' +
                      '</div>' +
                      '</div>' +
                      '<a href="?add-to-cart=' + ourData[i].id + '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="' + ourData[i].id + '">Kaufen</a>' +
                      '</li>';
                  } else {
                    result.innerHTML +=
                      '<li data-user_id="' + jQuery.cookie("cuctom_user_login_id") + '" data-product_id="' + ourData[i].id + '" class="plug_product_cart_wrapper ">' +
                      '<div class="remowe_like_btn show_like_btn"></div>' +
                      '<div class="like_btn hide_like_btn"></div>' +
                      '<a href="' + ourData[i].link + '"><div class="plug_product_cart_wrapper_img">' +
                      '<img src="' + ourData[i]._embedded["wp:featuredmedia"][0].source_url + '">' +
                      '</div>' +
                      '<div class="plug_product_cart_wrapper_title">' + ourData[i].title.rendered + '</div>' +
                      '<div class="plug_product_cart_wrapper_text">' + ourData[i].content.rendered.slice(0, 46) + '...</div>' +
                      '<div class="plug_product_cart_wrapper_prise"> €' + ourData[i]._price + '</div>' +
                      '<div class="plug_product_cart_wrapper_rating">' +
                      '<strong class="rating">' +
                      '<div class="star-rating ehi-star-rating">' +
                      '<span style="width:' + (ourData[i]._wc_average_rating) * 20 + '%"></span>' +
                      '</div>' +
                      '</div>' +
                      '<a href="?add-to-cart=' + ourData[i].id + '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="' + ourData[i].id + '">Kaufen</a>' +
                      '</li>';
                  }
                } else {
                  if (ourData[i]._sale_price > 0) {
                    result.innerHTML +=
                      '<li data-user_id="' + jQuery.cookie("cuctom_user_login_id") + '" data-product_id="' + ourData[i].id + '" class="plug_product_cart_wrapper">' +
                      '<div class="like_btn show_like_btn"></div>' +
                      '<div class="remowe_like_btn hide_like_btn"></div>' +
                      '<a href="' + ourData[i].link + '"><div class="plug_product_cart_wrapper_img">' +
                      '<img src="' + ourData[i]._embedded["wp:featuredmedia"][0].source_url + '">' +
                      '</div>' +
                      '<div class="plug_product_cart_wrapper_title">' + ourData[i].title.rendered + '</div>' +
                      '<div class="plug_product_cart_wrapper_text">' + ourData[i].content.rendered.slice(0, 46) + '...</div>' +
                      '<div class="plug_product_cart_wrapper_prise"><span class="plug_product_cart_wrapper_prise_sale">€' + ourData[i]._sale_price + '</span><span class="plug_product_cart_wrapper_prise_regular">€' + ourData[i]._regular_price + '</span></div>' +
                      '<div class="plug_product_cart_wrapper_rating">' +
                      '<strong class="rating">' +
                      '<div class="star-rating ehi-star-rating">' +
                      '<span style="width:' + (ourData[i]._wc_average_rating) * 20 + '%"></span>' +
                      '</div>' +
                      '</div>' +
                      '<a href="?add-to-cart=' + ourData[i].id + '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="' + ourData[i].id + '">Kaufen</a>' +
                      '</li>';
                  } else {
                    result.innerHTML +=
                      '<li data-user_id="' + jQuery.cookie("cuctom_user_login_id") + '" data-product_id="' + ourData[i].id + '" class="plug_product_cart_wrapper">' +
                      '<div class="like_btn show_like_btn"></div>' +
                      '<div class="remowe_like_btn hide_like_btn"></div>' +
                      '<a href="' + ourData[i].link + '"><div class="plug_product_cart_wrapper_img">' +
                      '<img src="' + ourData[i]._embedded["wp:featuredmedia"][0].source_url + '">' +
                      '</div>' +
                      '<div class="plug_product_cart_wrapper_title">' + ourData[i].title.rendered + '</div>' +
                      '<div class="plug_product_cart_wrapper_text">' + ourData[i].content.rendered.slice(0, 46) + '...</div>' +
                      '<div class="plug_product_cart_wrapper_prise"> €' + ourData[i]._price + '</div>' +
                      '<div class="plug_product_cart_wrapper_rating">' +
                      '<strong class="rating">' +
                      '<div class="star-rating ehi-star-rating">' +
                      '<span style="width:' + (ourData[i]._wc_average_rating) * 20 + '%"></span>' +
                      '</div>' +
                      '</div>' +
                      '<a href="?add-to-cart=' + ourData[i].id + '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="' + ourData[i].id + '">Kaufen</a>' +
                      '</li>';
                  }
                }

              } else {


                if (ourData[i]._sale_price > 0) {
                  result.innerHTML +=
                    '<li class="plug_product_cart_wrapper">' +
                    '<div class="like_btn_not_register"></div>' +
                    '<a href="' + ourData[i].link + '"><div class="plug_product_cart_wrapper_img">' +
                    '<img src="' + ourData[i]._embedded["wp:featuredmedia"][0].source_url + '">' +
                    '</div>' +
                    '<div class="plug_product_cart_wrapper_title">' + ourData[i].title.rendered + '</div>' +
                    '<div class="plug_product_cart_wrapper_text">' + ourData[i].content.rendered.slice(0, 46) + '...</div>' +
                    '<div class="plug_product_cart_wrapper_prise"><span class="plug_product_cart_wrapper_prise_sale">€' + ourData[i]._sale_price + '</span><span class="plug_product_cart_wrapper_prise_regular">€' + ourData[i]._regular_price + '</span></div>' +
                    '<div class="plug_product_cart_wrapper_rating">' +
                    '<strong class="rating">' +
                    '<div class="star-rating ehi-star-rating">' +
                    '<span style="width:' + (ourData[i]._wc_average_rating) * 20 + '%"></span>' +
                    '</div>' +
                    '</div>' +
                    '<a href="?add-to-cart=' + ourData[i].id + '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="' + ourData[i].id + '">Kaufen</a>' +
                    '</li>';
                } else {
                  result.innerHTML +=
                    '<li class="plug_product_cart_wrapper ">' +
                    '<div class="like_btn_not_register"></div>' +
                    '<a href="' + ourData[i].link + '"><div class="plug_product_cart_wrapper_img">' +
                    '<img src="' + ourData[i]._embedded["wp:featuredmedia"][0].source_url + '">' +
                    '</div>' +
                    '<div class="plug_product_cart_wrapper_title">' + ourData[i].title.rendered + '</div>' +
                    '<div class="plug_product_cart_wrapper_text">' + ourData[i].content.rendered.slice(0, 46) + '...</div>' +
                    '<div class="plug_product_cart_wrapper_prise"> €' + ourData[i]._price + '</div>' +
                    '<div class="plug_product_cart_wrapper_rating">' +
                    '<strong class="rating">' +
                    '<div class="star-rating ehi-star-rating">' +
                    '<span style="width:' + (ourData[i]._wc_average_rating) * 20 + '%"></span>' +
                    '</div>' +
                    '</div>' +
                    '<a href="?add-to-cart=' + ourData[i].id + '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="' + ourData[i].id + '">Kaufen</a>' +
                    '</li>';
                }
              }
            }
          }
          counter++;
        }
      }
      if (counter == 0) {
        $("#sales_leaders_container").append(
          '<p class="sory_no_match">Es tut uns leid, es gibt keine Übereinstimmungen in den Suchergebnissen.</p>'
        );
      }
      if (ourReqest.status != 200) {
        // обработать ошибку
      } else {}
    };
    ourReqest.send();

    setTimeout(function() {
      jQuery('#container_plaseholder_wrapper #container_plaseholder').remove();
      jQuery('#container_plaseholder_wrapper #container_plaseholder_text').remove();
      jQuery('#container_plaseholder_wrapper .loader_new_container').remove();


      setTimeout(function() {
        destroyCarouselleaders();
        slickCarouselleaders();

      }, 2000);


    }, 2000);

  }, 5000);





  function slickCarouselnewitems() {
    jQuery("#new_items_container").slick({
      slidesToShow: 4,
      dots: false,
      arrows: true,
      responsive: [{
          breakpoint: 767,
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
  }

  function destroyCarouselnewitems() {
    if (jQuery('#new_items_container').hasClass('slick-initialized')) {
      jQuery('#new_items_container').slick('destroy');
    }
  }

  setTimeout(function() {
    var counter = 0;
    var result = document.getElementById("new_items_container");
    var ourReqest = new XMLHttpRequest();
    ourReqest.open(
      "GET",
      "http://tigall.red-pix.com/wp-json/wp/v2/product?_embed&per_page=8&order=asc"
    );
    ourReqest.onload = function() {
      var ourData = JSON.parse(ourReqest.responseText);
      for (var i = 0; i < ourData.length; i++) {
        if (counter <= 12) {
          if (ourData[i]._embedded["wp:featuredmedia"][0].source_url != null) {
            if (ourData[i].lang == 'de') {
              var cuctom_user_login = jQuery.cookie("cuctom_user_login");

              if (cuctom_user_login == "login") {
                const array1 = Array.from(document.getElementsByClassName('product_id_favorite')).map(item => item.getAttribute('foo'));
                if (jQuery.inArray('' + ourData[i].id + '', array1) !== -1) {



                  if (ourData[i]._sale_price > 0) {
                    result.innerHTML +=
                      '<li data-user_id="' + jQuery.cookie("cuctom_user_login_id") + '" data-product_id="' + ourData[i].id + '"  class="plug_product_cart_wrapper">' +
                      '<div class="remowe_like_btn show_like_btn"></div>' +
                      '<div class="like_btn hide_like_btn"></div>' +
                      '<a href="' + ourData[i].link + '"><div class="plug_product_cart_wrapper_img">' +
                      '<img src="' + ourData[i]._embedded["wp:featuredmedia"][0].source_url + '">' +
                      '</div>' +
                      '<div class="plug_product_cart_wrapper_title">' + ourData[i].title.rendered + '</div>' +
                      '<div class="plug_product_cart_wrapper_text">' + ourData[i].content.rendered.slice(0, 46) + '...</div>' +
                      '<div class="plug_product_cart_wrapper_prise"><span class="plug_product_cart_wrapper_prise_sale">€' + ourData[i]._sale_price + '</span><span class="plug_product_cart_wrapper_prise_regular">€' + ourData[i]._regular_price + '</span></div>' +
                      '<div class="plug_product_cart_wrapper_rating">' +
                      '<strong class="rating">' +
                      '<div class="star-rating ehi-star-rating">' +
                      '<span style="width:' + (ourData[i]._wc_average_rating) * 20 + '%"></span>' +
                      '</div>' +
                      '</div>' +
                      '<a href="?add-to-cart=' + ourData[i].id + '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="' + ourData[i].id + '">Kaufen</a>' +
                      '</li>';
                  } else {
                    result.innerHTML +=
                      '<li data-user_id="' + jQuery.cookie("cuctom_user_login_id") + '" data-product_id="' + ourData[i].id + '" class="plug_product_cart_wrapper ">' +
                      '<div class="remowe_like_btn show_like_btn"></div>' +
                      '<div class="like_btn hide_like_btn"></div>' +
                      '<a href="' + ourData[i].link + '"><div class="plug_product_cart_wrapper_img">' +
                      '<img src="' + ourData[i]._embedded["wp:featuredmedia"][0].source_url + '">' +
                      '</div>' +
                      '<div class="plug_product_cart_wrapper_title">' + ourData[i].title.rendered + '</div>' +
                      '<div class="plug_product_cart_wrapper_text">' + ourData[i].content.rendered.slice(0, 46) + '...</div>' +
                      '<div class="plug_product_cart_wrapper_prise"> €' + ourData[i]._price + '</div>' +
                      '<div class="plug_product_cart_wrapper_rating">' +
                      '<strong class="rating">' +
                      '<div class="star-rating ehi-star-rating">' +
                      '<span style="width:' + (ourData[i]._wc_average_rating) * 20 + '%"></span>' +
                      '</div>' +
                      '</div>' +
                      '<a href="?add-to-cart=' + ourData[i].id + '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="' + ourData[i].id + '">Kaufen</a>' +
                      '</li>';
                  }
                } else {
                  if (ourData[i]._sale_price > 0) {
                    result.innerHTML +=
                      '<li data-user_id="' + jQuery.cookie("cuctom_user_login_id") + '" data-product_id="' + ourData[i].id + '" class="plug_product_cart_wrapper">' +
                      '<div class="like_btn show_like_btn"></div>' +
                      '<div class="remowe_like_btn hide_like_btn"></div>' +
                      '<a href="' + ourData[i].link + '"><div class="plug_product_cart_wrapper_img">' +
                      '<img src="' + ourData[i]._embedded["wp:featuredmedia"][0].source_url + '">' +
                      '</div>' +
                      '<div class="plug_product_cart_wrapper_title">' + ourData[i].title.rendered + '</div>' +
                      '<div class="plug_product_cart_wrapper_text">' + ourData[i].content.rendered.slice(0, 46) + '...</div>' +
                      '<div class="plug_product_cart_wrapper_prise"><span class="plug_product_cart_wrapper_prise_sale">€' + ourData[i]._sale_price + '</span><span class="plug_product_cart_wrapper_prise_regular">€' + ourData[i]._regular_price + '</span></div>' +
                      '<div class="plug_product_cart_wrapper_rating">' +
                      '<strong class="rating">' +
                      '<div class="star-rating ehi-star-rating">' +
                      '<span style="width:' + (ourData[i]._wc_average_rating) * 20 + '%"></span>' +
                      '</div>' +
                      '</div>' +
                      '<a href="?add-to-cart=' + ourData[i].id + '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="' + ourData[i].id + '">Kaufen</a>' +
                      '</li>';
                  } else {
                    result.innerHTML +=
                      '<li data-user_id="' + jQuery.cookie("cuctom_user_login_id") + '" data-product_id="' + ourData[i].id + '" class="plug_product_cart_wrapper">' +
                      '<div class="like_btn show_like_btn"></div>' +
                      '<div class="remowe_like_btn hide_like_btn"></div>' +
                      '<a href="' + ourData[i].link + '"><div class="plug_product_cart_wrapper_img">' +
                      '<img src="' + ourData[i]._embedded["wp:featuredmedia"][0].source_url + '">' +
                      '</div>' +
                      '<div class="plug_product_cart_wrapper_title">' + ourData[i].title.rendered + '</div>' +
                      '<div class="plug_product_cart_wrapper_text">' + ourData[i].content.rendered.slice(0, 46) + '...</div>' +
                      '<div class="plug_product_cart_wrapper_prise"> €' + ourData[i]._price + '</div>' +
                      '<div class="plug_product_cart_wrapper_rating">' +
                      '<strong class="rating">' +
                      '<div class="star-rating ehi-star-rating">' +
                      '<span style="width:' + (ourData[i]._wc_average_rating) * 20 + '%"></span>' +
                      '</div>' +
                      '</div>' +
                      '<a href="?add-to-cart=' + ourData[i].id + '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="' + ourData[i].id + '">Kaufen</a>' +
                      '</li>';
                  }
                }

              } else {


                if (ourData[i]._sale_price > 0) {
                  result.innerHTML +=
                    '<li class="plug_product_cart_wrapper">' +
                    '<div class="like_btn_not_register"></div>' +
                    '<a href="' + ourData[i].link + '"><div class="plug_product_cart_wrapper_img">' +
                    '<img src="' + ourData[i]._embedded["wp:featuredmedia"][0].source_url + '">' +
                    '</div>' +
                    '<div class="plug_product_cart_wrapper_title">' + ourData[i].title.rendered + '</div>' +
                    '<div class="plug_product_cart_wrapper_text">' + ourData[i].content.rendered.slice(0, 46) + '...</div>' +
                    '<div class="plug_product_cart_wrapper_prise"><span class="plug_product_cart_wrapper_prise_sale">€' + ourData[i]._sale_price + '</span><span class="plug_product_cart_wrapper_prise_regular">€' + ourData[i]._regular_price + '</span></div>' +
                    '<div class="plug_product_cart_wrapper_rating">' +
                    '<strong class="rating">' +
                    '<div class="star-rating ehi-star-rating">' +
                    '<span style="width:' + (ourData[i]._wc_average_rating) * 20 + '%"></span>' +
                    '</div>' +
                    '</div>' +
                    '<a href="?add-to-cart=' + ourData[i].id + '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="' + ourData[i].id + '">Kaufen</a>' +
                    '</li>';
                } else {
                  result.innerHTML +=
                    '<li class="plug_product_cart_wrapper ">' +
                    '<div class="like_btn_not_register"></div>' +
                    '<a href="' + ourData[i].link + '"><div class="plug_product_cart_wrapper_img">' +
                    '<img src="' + ourData[i]._embedded["wp:featuredmedia"][0].source_url + '">' +
                    '</div>' +
                    '<div class="plug_product_cart_wrapper_title">' + ourData[i].title.rendered + '</div>' +
                    '<div class="plug_product_cart_wrapper_text">' + ourData[i].content.rendered.slice(0, 46) + '...</div>' +
                    '<div class="plug_product_cart_wrapper_prise"> €' + ourData[i]._price + '</div>' +
                    '<div class="plug_product_cart_wrapper_rating">' +
                    '<strong class="rating">' +
                    '<div class="star-rating ehi-star-rating">' +
                    '<span style="width:' + (ourData[i]._wc_average_rating) * 20 + '%"></span>' +
                    '</div>' +
                    '</div>' +
                    '<a href="?add-to-cart=' + ourData[i].id + '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="' + ourData[i].id + '">Kaufen</a>' +
                    '</li>';
                }
              }
            }
          }
          counter++;
        }
      }
      if (counter == 0) {
        $("#new_items_container").append(
          '<p class="sory_no_match">Es tut uns leid, es gibt keine Übereinstimmungen in den Suchergebnissen.</p>'
        );
      }
      if (ourReqest.status != 200) {
        // обработать ошибку
      } else {}
    };
    ourReqest.send();
    setTimeout(function() {
      jQuery('#container_plaseholder_wrapper_second #container_plaseholder_second').remove();
      jQuery('#container_plaseholder_wrapper_second #container_plaseholder_text_second').remove();
      jQuery('#container_plaseholder_wrapper_second .loader_new_container_second').remove();


      setTimeout(function() {
        destroyCarouselnewitems();
        slickCarouselnewitems();
        jQuery('body').addClass('loaded');
      }, 2000);

    }, 2000);
  }, 9000);


});