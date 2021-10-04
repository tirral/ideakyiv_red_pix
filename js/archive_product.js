"use strict";

jQuery(document).ready(function($) {


  /* ==========================================================================
     Range Slider for price filter START
  ========================================================================== */
  var lowerSlider = document.querySelector('#lower');
  var upperSlider = document.querySelector('#upper');
  document.querySelector('#two').value = upperSlider.value;
  document.querySelector('#one').value = lowerSlider.value;
  var lowerVal = parseInt(lowerSlider.value);
  var upperVal = parseInt(upperSlider.value);
  upperSlider.oninput = function() {
    lowerVal = parseInt(lowerSlider.value);
    upperVal = parseInt(upperSlider.value);
    if (upperVal < lowerVal + 4) {
      lowerSlider.value = upperVal - 4;
      if (lowerVal == lowerSlider.min) {
        upperSlider.value = 4;
      }
    }
    document.querySelector('#two').value = this.value
  };
  lowerSlider.oninput = function() {
    lowerVal = parseInt(lowerSlider.value);
    upperVal = parseInt(upperSlider.value);
    if (lowerVal > upperVal - 4) {
      upperSlider.value = lowerVal + 4;
      if (upperVal == upperSlider.max) {
        lowerSlider.value = parseInt(upperSlider.max) - 4;
      }
    }
    document.querySelector('#one').value = this.value
  };

  /* ==========================================================================
     Range Slider for price filter END
  ========================================================================== */

  /* ==========================================================================
     Range Slider for product dimensions START
  ========================================================================== */

  $.widget("custom.rangeslider", {
    options: {
      'min': 0,
      'max': 10000
    },
    _create: function() {
      var self = this.element,
        options = this.options,
        min = options['min'],
        max = options['max'],
        msg = options['message'],
        $range_inner = $(
          '<input class="range-slider--slide js-range-slide" id="rangeSlider" type="range" value="" min="" max="" step="">' +
          '<output class="range-slider--output js-range-output" for="rangeSlider"></output>'
        ),
        $range = self.append($range_inner),
        $slider = $(self).children('.js-range-slide');
      $slider.attr({
        'min': min,
        'max': max,
        'value': min
      });
      var $width = $slider.width(),
        pos_calc = (min / max) * 100,
        pixel_pos = (pos_calc / 100) * $width,
        $slider_output = $(self).children('.js-range-output');
      $slider_output.css('left', pixel_pos + 'px').html(min);
      self.on('mousemove', function(e) {
        self.rangeslider('moveLabel');
      });
    },

    moveLabel: function() {
      var self = this.element,
        options = this.options,
        range_slider = self[0],
        slider_input = range_slider.getElementsByTagName('input')[0],
        slider_output = range_slider.getElementsByTagName('output')[0],
        input_max = slider_input.max,
        slider_value = slider_input.value,
        width = slider_input.clientWidth,
        pos_calc = (slider_value / input_max) * 100,
        pixel_pos = (pos_calc / 100) * width,
        $output = $(self).children('.js-range-output');
      $output.css('left', pixel_pos + 'px')
        .html(slider_value);
      if (slider_value >= 20 && slider_value < 25) {
        $(self).rangeslider('createMessage', $output, options['message']);
      } else if (slider_value > 25 || slider_value < 20) {
        $(self).rangeslider('killMessage');
      }
    },
    createMessage: function(elem, msg) {
      var msg_html = '<span class="js-range-tooltip range-slider-message"></span>',
        self = this.element;
      if ($('.js-range-tooltip').length === 0) {
        elem.after(msg_html);
      }
      $('.js-range-tooltip').html(msg);
    },
    killMessage: function() {
      if ($('.js-range-tooltip').length > 0) {
        $('.js-range-tooltip').remove();
      }
    }
  });
  /* ==========================================================================
     Range Slider for product dimensions END
  ========================================================================== */

  // INITIALIZING DIMENSION SLIDERS
  $("[data-range-id = product_width_range]").rangeslider({
    max: 3000
  });
  $("[data-range-id = product_height_range]").rangeslider({
    max: 3000
  });
  $("[data-range-id = product_depth_range]").rangeslider({
    max: 3000
  });


  // CHANGING VALUES IN THE PRICE SLIDER
  var prise_box_min = $('#prise_box_min bdi').text();
  var prise_box_min_replace = prise_box_min.replace('€', '');
  var prise_box_max = $('#prise_box_max bdi').text();
  var prise_box_max_replace = prise_box_max.replace('€', '');

  $('#one').val(parseInt(prise_box_min_replace));
  $('#lower').attr("min", parseInt(prise_box_min_replace));
  $('#lower').attr("max", parseInt(prise_box_max_replace));

  $('#two').val(parseInt(prise_box_max_replace));
  $('#upper').attr("min", parseInt(prise_box_min_replace));
  $('#upper').attr("max", parseInt(prise_box_max_replace));


  $('.product_category_sitebar_list_item_wrapper').on('click', function() {
    $('.product_category_sitebar_list_item_wrapper').removeClass('active_radio');
    $(this).addClass('active_radio');
  });


  $('.sitebar_filter_wrapper_color_item').on('click', function() {
    $('.sitebar_filter_wrapper_color_item').removeClass('active');
    $(this).addClass('active');
  });



  // MAIN FILTER START
  $('#filter_button').on('click', function() {

    var product_category = $('input[name="product_category"]:checked').val();

    var product_color_select = $('input[name="product_color"]:checked').val();
    if (typeof product_color_select != 'undefined') {
      var product_color = product_color_select.toLowerCase();
    }

    var product_width_range = $('#product_width_range output').text();
    var product_height_range = $('#product_height_range output').text();
    var product_depth_range = $('#product_depth_range output').text();
    var product_price_lower = $('#lower').val();
    var product_price_upper = $('#upper').val();

    var filter_url = 'http://tigall.red-pix.com/product-category/';

    if (typeof product_category != 'undefined') {
      filter_url += product_category;
    } else {
      var product_category_from_site = $('.active_radio').attr("data-category");
      filter_url += product_category_from_site;
    }


    if (typeof product_color != 'undefined') {
      filter_url += "?product_color=" + product_color;
      var url_mod_stat = 'yes';
    }

    if (product_width_range != 0) {
      if (url_mod_stat == 'yes') {
        filter_url += "&product_width_range=" + product_width_range;
      } else {
        filter_url += "?product_width_range=" + product_width_range;
        var url_mod_stat = 'yes';
      }
    }

    if (product_height_range != 0) {
      if (url_mod_stat == 'yes') {
        filter_url += "&product_height_range=" + product_height_range;
      } else {
        filter_url += "?product_height_range=" + product_height_range;
        var url_mod_stat = 'yes';
      }
    }

    if (product_depth_range != 0) {
      if (url_mod_stat == 'yes') {
        filter_url += "&product_depth_range=" + product_depth_range;
      } else {
        filter_url += "?product_depth_range=" + product_depth_range;
        var url_mod_stat = 'yes';
      }
    }

    if (parseInt(prise_box_min_replace) != product_price_lower) {
      if (url_mod_stat == 'yes') {
        filter_url += "&product_price_lower=" + product_price_lower;
      } else {
        filter_url += "?product_price_lower=" + product_price_lower;
        var url_mod_stat = 'yes';
      }
    }

    if (parseInt(prise_box_max_replace) != product_price_upper) {

      if (url_mod_stat == 'yes') {
        filter_url += "&product_price_upper=" + product_price_upper;
      } else {
        filter_url += "?product_price_upper=" + product_price_upper;
        var url_mod_stat = 'yes';
      }
    }


    location.href = filter_url;

  });

});