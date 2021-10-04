"use strict";

jQuery(document).ready(function($) {
  $(".feedback_btn_container_btn").on("click", function() {
    $(".feedback_modal_wrapper_body_cover").addClass('open');
  });
  $(".feedback_modal_container_close_btn").on("click", function() {
    $(".feedback_modal_wrapper_body_cover").removeClass('open');
  });


  $("#custom_top_filter_select_body_title").on("click", function() {
    $('#custom_top_filter_select_body_wrapper').toggleClass('open');
  });


});

document.addEventListener('wpcf7mailsent', function(event) {
  setTimeout(function() {
    alert('1111');
  }, 1000);
}, false);