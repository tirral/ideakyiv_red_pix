"use strict";
jQuery(document).ready(function ($) {
  $(".tab_btn").click(() => {
    $(".tab_btn").css("pointer-events", "none");
    setTimeout(() => {
      // $(".tabs_wrapper").removeClass("animate__animated animate__fadeInUp animate__slow");
      $(".tab_btn").css("pointer-events", "auto");
    }, 1000);
  });
  $("#reception_btn").on("click", function () {
    $("#reception_btn").removeClass("active");
    $("#payment_btn").removeClass("active");
    $("#delivery_btn").removeClass("active");
    $("#reception_btn").addClass("active");
    $("#payment_wrapper").removeClass(
      "animate__animated animate__fadeInUp animate__slow"
    );
    $("#delivery_wrapper").removeClass(
      "animate__animated animate__fadeInUp animate__slow"
    );
    $("#reception_wrapper").addClass(
      "animate__animated animate__fadeInUp animate__slow"
    );

    $("#reception_wrapper").removeClass("hide_block");
    $("#payment_wrapper").addClass("hide_block");
    $("#delivery_wrapper").addClass("hide_block");
  });

  $("#payment_btn").on("click", function () {
    $("#reception_btn").removeClass("active");
    $("#payment_btn").removeClass("active");
    $("#delivery_btn").removeClass("active");
    $("#payment_btn").addClass("active");
    $("#payment_wrapper").addClass(
      "animate__animated animate__fadeInUp animate__slow"
    );
    $("#delivery_wrapper").removeClass(
      "animate__animated animate__fadeInUp animate__slow"
    );
    $("#reception_wrapper").removeClass(
      "animate__animated animate__fadeInUp animate__slow"
    );

    $("#reception_wrapper").addClass("hide_block");
    $("#payment_wrapper").removeClass("hide_block");
    $("#delivery_wrapper").addClass("hide_block");
  });

  $("#delivery_btn").on("click", function () {
    $("#reception_btn").removeClass("active");
    $("#payment_btn").removeClass("active");
    $("#delivery_btn").removeClass("active");
    $("#delivery_btn").addClass("active");
    $("#payment_wrapper").removeClass(
      "animate__animated animate__fadeInUp animate__slow"
    );
    $("#delivery_wrapper").addClass(
      "animate__animated animate__fadeInUp animate__slow"
    );
    $("#reception_wrapper").removeClass(
      "animate__animated animate__fadeInUp animate__slow"
    );

    $("#reception_wrapper").addClass("hide_block");
    $("#payment_wrapper").addClass("hide_block");
    $("#delivery_wrapper").removeClass("hide_block");
  });
});
