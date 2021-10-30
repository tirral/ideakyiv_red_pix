"use strict";
jQuery(document).ready(function($) {

  setInterval(function() {

      var billing_first_name = $('[data-id="billing_first_name"]').text();
      var billing_last_name = $('[data-id="billing_last_name"]').text();
      var billing_email = $('[data-id="billing_email"]').text();
      var billing_phone = $('[data-id="billing_phone"]').text();
      var billing_city = $('[data-id="billing_city"]').text();
      var billing_address_1 = $('[data-id="billing_address_1"]').text();
      var billing_address_2 = $('[data-id="billing_address_2"]').text();
      var billing_postcode = $('[data-id="billing_postcode"]').text();


      if (billing_first_name) {
        $('#billing_first_name').css({
          'border-bottom': '2px solid red'
        });
      } else {
        $('#billing_first_name').css({
          'border-bottom': '2px solid #C4C4C4'
        });
      }

      if (billing_last_name) {
        $('#billing_last_name').css({
          'border-bottom': '2px solid red'
        });
      } else {
        $('#billing_last_name').css({
          'border-bottom': '2px solid #C4C4C4'
        });
      }

      if (billing_email) {
        $('#billing_email').css({
          'border-bottom': '2px solid red'
        });
      } else {
        $('#billing_email').css({
          'border-bottom': '2px solid #C4C4C4'
        });
      }

      if (billing_phone) {
        $('#billing_phone').css({
          'border-bottom': '2px solid red'
        });
      } else {
        $('#billing_phone').css({
          'border-bottom': '2px solid #C4C4C4'
        });
      }

      if (billing_city) {
        $('#billing_city').css({
          'border-bottom': '2px solid red'
        });
      } else {
        $('#billing_city').css({
          'border-bottom': '2px solid #C4C4C4'
        });
      }
      if (billing_address_1) {
        $('#billing_address_1').css({
          'border-bottom': '2px solid red'
        });
      } else {
        $('#billing_address_1').css({
          'border-bottom': '2px solid #C4C4C4'
        });
      }
      if (billing_address_2) {
        $('#billing_address_2').css({
          'border-bottom': '2px solid red'
        });
      } else {
        $('#billing_address_2').css({
          'border-bottom': '2px solid #C4C4C4'
        });
      }
      if (billing_postcode) {
        $('#billing_postcode').css({
          'border-bottom': '2px solid red'
        });
      } else {
        $('#billing_postcode').css({
          'border-bottom': '2px solid #C4C4C4'
        });
      }

    },
    1000);

});