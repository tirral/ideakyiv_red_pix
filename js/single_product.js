"use strict";

jQuery(document).ready(function($) {

  var window_width = $(window).width();
  if (window_width > 1025) {

    // IF MOUSE HOVER ON IMAGE
    $("#single_product_lg_img_container .woocommerce-product-gallery__image--placeholder img").on({
      mouseenter: function(e) {
        //IF IT IS TEMPLATE WITH SLIDER
        if ($("#single_product_main_img_container_main").hasClass("slider-for")) {
          var current_img = $("#single_product_lg_img_container .slick-current .woocommerce-product-gallery__image--placeholder img").attr("src");
          $("#single_product_lg_img_container").mousemove(function(event) {
            const target = event.target;
            const rect = target.getBoundingClientRect();
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;
            if (x < 620) {
              $('#single_product_lg_img_container_zoom').css({
                'display': 'block',
                'background-image': 'url(' + current_img + ')',
                'background-position-x': 'calc(330px - ' + (x * 2) + 'px)',
                'background-position-y': 'calc(320px - ' + (y * 2) + 'px)',
              });
            } else {
              $('#single_product_lg_img_container_zoom').css({
                'display': 'none',
              });
            }
          });
        } else {
          //IF IT IS TEMPLATE WITH SINGLE IMAGE
          var current_img = $("#single_product_lg_img_container img").attr("src");
          $("#single_product_lg_img_container").mousemove(function(event) {
            const target = event.target;
            const rect = target.getBoundingClientRect();
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;
            if (x < 620) {
              $('#single_product_lg_img_container_zoom').css({
                'display': 'block',
                'background-image': 'url(' + current_img + ')',
                'background-position-x': 'calc(330px - ' + (x * 2) + 'px)',
                'background-position-y': 'calc(320px - ' + (y * 2) + 'px)',
              });
            } else {
              $('#single_product_lg_img_container_zoom').css({
                'display': 'none',
              });
            }


          });
        }
      },
      mouseleave: function() {
        $('#single_product_lg_img_container_zoom').css({
          'display': 'none',
        });
      }
    });

    // FORSED CLOSE ZOOM AREA
    $("body").mouseover(function(evt) {
      if (!$(evt.target).closest('#single_product_lg_img_container').length) {
        $('#single_product_lg_img_container_zoom').css({
          'display': 'none',
        });
      }
    });

  }




});