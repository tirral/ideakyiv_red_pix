"use strict";
jQuery(document).ready(function($) {

  setInterval(function() {
    $('.xoo-wsch-text').text('WAGEN');
    $('.xoo-wsc-empty-cart span').text('Ihr Warenkorb ist leer');
    $('.xoo-wsc-empty-cart .button.btn').text('Zurück zum Shop');
    $('.xoo-wsc-ft-amt-label').text('Zwischensumme');
    $('.xoo-wsc-ft-btn-checkout').text('Besorgen');
  }, 50);

});