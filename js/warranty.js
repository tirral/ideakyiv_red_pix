"use strict";
jQuery(document).ready(function($) {

  $('.accordion > li:eq(0) a').addClass('active').next().slideDown();
  $('.accordion a').click(function(j) {
    var dropDown = $(this).closest('li').find('.accordion_content');
    $(this).closest('.accordion').find('.accordion_content').not(dropDown).slideUp();
    if ($(this).hasClass('active')) {
      $(this).removeClass('active');
    } else {
      $(this).closest('.accordion').find('a.active').removeClass('active');
      $(this).addClass('active');
    }
    dropDown.stop(false, true).slideToggle();
    j.preventDefault();
  });


});