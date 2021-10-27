"use strict";
jQuery(document).ready(function($) {

  if (document.documentElement.lang === "de-DE") {
    setInterval(function() {
      $('.xoo-wsch-text').text('WAGEN');
      $('.xoo-wsc-empty-cart span').text('Ihr Warenkorb ist leer');
      $('.xoo-wsc-empty-cart .button.btn').text('Zurück zum Shop');
      $('.xoo-wsc-ft-amt-label').text('Zwischensumme');
      $('.xoo-wsc-ft-btn-checkout').text('Besorgen');
    }, 50);

    $('.comment-form-comment #comment').val('Kommentar');
    $('.comment-form-author #author').attr('placeholder', 'Name');
    $('.comment-form-email #email').attr('placeholder', 'Email');

  } else {
    setInterval(function() {
      $('.xoo-wsc-cart-close').text('BACK');
      $('.cart-subtotal th').text('Subtotal');
      $('.shipping th').text('Shipping');
      $('.order-total th').text('Total');
      $("#btn_plaseholder button").text("Make order");

    }, 50);

    $('.comment-form-comment #comment').val('Сomment');
    $('.comment-form-author #author').attr('placeholder', 'Name');
    $('.comment-form-email #email').attr('placeholder', 'Email');
  }
});