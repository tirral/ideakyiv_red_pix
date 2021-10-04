"use strict";
jQuery(document).ready(function($) {

  $('#reception_btn').on('click', function() {
    $('#reception_btn').removeClass('active');
    $('#payment_btn').removeClass('active');
    $('#delivery_btn').removeClass('active');
    $('#reception_btn').addClass('active');
    $('#reception_wrapper').removeClass('animate__animated animate__fadeInLeft');
    $('#payment_wrapper').removeClass('animate__animated animate__fadeInLeft');
    $('#delivery_wrapper').removeClass('animate__animated animate__fadeInLeft');
    $('#reception_wrapper').addClass('animate__animated animate__fadeInLeft');

    $('#reception_wrapper').removeClass('hide_block');
    $('#payment_wrapper').addClass('hide_block');
    $('#delivery_wrapper').addClass('hide_block');
  })

  $('#payment_btn').on('click', function() {
    $('#reception_btn').removeClass('active');
    $('#payment_btn').removeClass('active');
    $('#delivery_btn').removeClass('active');
    $('#payment_btn').addClass('active');
    $('#reception_wrapper').removeClass('animate__animated animate__fadeInLeft');
    $('#delivery_wrapper').removeClass('animate__animated animate__fadeInLeft');
    $('#reception_wrapper').removeClass('animate__animated animate__fadeInLeft');
    $('#payment_wrapper').addClass('animate__animated animate__fadeInLeft');

    $('#reception_wrapper').addClass('hide_block');
    $('#payment_wrapper').removeClass('hide_block');
    $('#delivery_wrapper').addClass('hide_block');
  })

  $('#delivery_btn').on('click', function() {
    $('#reception_btn').removeClass('active');
    $('#payment_btn').removeClass('active');
    $('#delivery_btn').removeClass('active');
    $('#delivery_btn').addClass('active');
    $('#reception_wrapper').removeClass('animate__animated animate__fadeInLeft');
    $('#delivery_wrapper').removeClass('animate__animated animate__fadeInLeft');
    $('#reception_wrapper').removeClass('animate__animated animate__fadeInLeft');
    $('#delivery_wrapper').addClass('animate__animated animate__fadeInLeft');

    $('#reception_wrapper').addClass('hide_block');
    $('#payment_wrapper').addClass('hide_block');
    $('#delivery_wrapper').removeClass('hide_block');
  })

});