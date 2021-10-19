"use strict";

jQuery(window).load(function() {

  setTimeout(function() {
    jQuery('.home_page_main_container_header_slider .swiper-slide').each(function() {
      jQuery(this).find('.swiper_slide_plug_wrapper').remove();
      var bg_image = jQuery(this).attr("data-url");
      jQuery(this).css('background-image', 'url(' + bg_image + ')');
    });
  }, 6000);



  function slickCarouselleaders() {
    jQuery("#sales_leaders_container").slick({
      slidesToShow: 3,
      dots: false,
      arrows: true,
      responsive: [{
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
      "http://tigall.red-pix.com/wp-json/wp/v2/product?_embed&per_page=8&order=desc"
    );
    ourReqest.onload = function() {
      var ourData = JSON.parse(ourReqest.responseText);
      for (var i = 0; i < ourData.length; i++) {
        if (ourData[i]._embedded["wp:featuredmedia"][0].source_url != null) {
          result.innerHTML +=
            '<div class="plug_product_cart_wrapper"><a href="' +
            ourData[i].link +
            '"><div class="plug_product_cart_wrapper_img"><img src="' +
            ourData[i]._embedded["wp:featuredmedia"][0].source_url +
            '"></div><div class="plug_product_cart_wrapper_title">' +
            ourData[i].title.rendered + '</div><div class="plug_product_cart_wrapper_text">' +
            ourData[i].content.rendered.slice(0, 46) + '...</div><div class="plug_product_cart_wrapper_prise"> €' +
            ourData[i]._price + '</div></a><a href="?add-to-cart=' +
            ourData[i].id + '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="' +
            ourData[i].id + '">Kaufen</a></div>';
        }
        counter++;
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
      destroyCarouselleaders();
      slickCarouselleaders();
    }, 2000);
  }, 6000);





  function slickCarouselnewitems() {
    jQuery("#new_items_container").slick({
      slidesToShow: 3,
      dots: false,
      arrows: true,
      responsive: [{
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
        if (ourData[i]._embedded["wp:featuredmedia"][0].source_url != null) {
          result.innerHTML +=
            '<div class="plug_product_cart_wrapper"><a href="' +
            ourData[i].link +
            '"><div class="plug_product_cart_wrapper_img"><img src="' +
            ourData[i]._embedded["wp:featuredmedia"][0].source_url +
            '"></div><div class="plug_product_cart_wrapper_title">' +
            ourData[i].title.rendered + '</div><div class="plug_product_cart_wrapper_text">' +
            ourData[i].content.rendered.slice(0, 46) + '...</div><div class="plug_product_cart_wrapper_prise"> €' +
            ourData[i]._price + '</div></a><a href="?add-to-cart=' +
            ourData[i].id + '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="' +
            ourData[i].id + '">Kaufen</a></div>';
        }
        counter++;
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
      destroyCarouselnewitems();
      slickCarouselnewitems();
    }, 2000);
  }, 6000);







});