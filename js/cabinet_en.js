"use strict";

jQuery(document).ready(function($) {

  // EXIT FROM PERSONAL CABINET START
  jQuery(document).on("click", ".cabinet_orders_list_exit", function(event) {
    $.cookie("cuctom_user_login", null, {
      path: '/'
    });
    $.cookie("cuctom_user_login_id", null, {
      path: '/'
    });
    SlimNotifierJs.notification('error', 'Error', 'YOU ARE OUT OF YOUR CABINET !', 3000, false);
    document.location.href = 'http://tigall.red-pix.com/';
  });
  // EXIT FROM PERSONAL CABINET END


  // REGISTER FORM START
  jQuery(document).on("click", "#register_form_submitme", function(event) {
    event.preventDefault();
    var user_name = jQuery("#register_form_user_name").val();
    var user_password = jQuery("#register_form_user_pass").val();
    var user_password_repeat = jQuery("#register_form_user_pass_repeat").val();
    var regexp = /[0-9]/;
    var regexp_second = /[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/;
    if (user_name.match(regexp)) {
      SlimNotifierJs.notification('error', 'Error', 'THE USER MUST NOT HAVE NUMBERS !', 3000, false);
    } else if (user_name.match(regexp_second)) {
      alert('Юзернейм не должна содержать символы');
      SlimNotifierJs.notification('error', 'Error', 'THE USERNAME CANNOT BE SPECIAL SYMBOLS !', 3000, false);
    } else if (user_name.length > 20) {
      SlimNotifierJs.notification('error', 'Error', 'THE USERNAME MUST BE LESS THAN 20 CHARACTERS !', 3000, false);
    } else if (user_name.length < 2) {
      SlimNotifierJs.notification('error', 'Error', 'USERNAME MUST BE MORE THAN 2 CHARACTERS !', 3000, false);
    } else if (user_password.length > 20) {
      SlimNotifierJs.notification('error', 'Error', 'PASSWORD MUST BE LESS THAN 20 CHARACTERS !', 3000, false);
    } else if (user_password.length < 2) {
      SlimNotifierJs.notification('error', 'Error', 'PASSWORD MUST BE MORE THAN 2 CHARACTERS !', 3000, false);
    } else if (user_password != user_password_repeat) {
      SlimNotifierJs.notification('error', 'Error', 'PASSWORD DOES NOT MATCH !', 3000, false);
    } else {
      jQuery.ajax({
        type: "POST",
        url: "http://tigall.red-pix.com/wp-admin/admin-ajax.php",
        data: {
          action: "ajax_form_login_check_user",
          "register_form_user_name": jQuery("#register_form_user_name").val(),
          "register_form_user_pass": jQuery("#register_form_user_pass").val(),
          "register_form_user_pass_repeat": jQuery("#register_form_user_pass_repeat").val(),
        },
        beforeSend: function() {
          console.log('USER NAME - ' + jQuery("#register_form_user_name").val());
          console.log('USER PASSWORD - ' + jQuery("#register_form_user_pass").val());
          console.log('REPEAT PASSWORD - ' + jQuery("#register_form_user_pass_repeat").val());
        },
        success: function(data) {
          if (data) {
            SlimNotifierJs.notification('error', 'Error', 'USER ALREADY ISSET !', 3000, false);
          } else {
            jQuery.ajax({
              type: "POST",
              url: "http://tigall.red-pix.com/wp-admin/admin-ajax.php",
              data: {
                action: "ajax_form_register_user",
                "register_form_user_name": jQuery("#register_form_user_name").val(),
                "register_form_user_pass": jQuery("#register_form_user_pass").val(),
                "register_form_user_pass_repeat": jQuery("#register_form_user_pass_repeat").val(),
              },
              beforeSend: function() {
                console.log('USER NAME - ' + jQuery("#register_form_user_name").val());
                console.log('USER PASSWORD - ' + jQuery("#register_form_user_pass").val());
                console.log('REPEAT PASSWORD - ' + jQuery("#register_form_user_pass_repeat").val());
              },
              success: function() {
                SlimNotifierJs.notification('success', 'Successfully', 'YOU REGISTERED SUSSEX !', 3000, false);
              },
              error: function() {
                // alert("error");
              },
            });
          }
        },
        error: function() {
          // alert("error");
        },
      });
    }
  });
  // REGISTER FORM END


  // REGISTER FORM START
  jQuery(document).on("click", "#login_form_submitme", function(event) {
    event.preventDefault();
    jQuery.ajax({
      type: "POST",
      url: "http://tigall.red-pix.com/wp-admin/admin-ajax.php",
      data: {
        action: "ajax_form_login_user",
        "login_form_user_name": jQuery("#login_form_user_name").val(),
        "login_form_user_pass": jQuery("#login_form_user_pass").val(),
      },
      beforeSend: function() {
        console.log('USER NAME - ' + jQuery("#login_form_user_name").val());
        console.log('USER PASSWORD - ' + jQuery("#login_form_user_pass").val());
      },
      success: function(data) {
        if (data) {
          console.log(data);
          $.cookie("cuctom_user_login", "login", {
            expires: 7,
            path: "/",
          });
          $.cookie("cuctom_user_login_id", data, {
            expires: 7,
            path: "/",
          });
          SlimNotifierJs.notification('success', 'Successfully', 'YOU ARE LOG IN !', 3000, false);
          location.reload();
        } else {
          SlimNotifierJs.notification('error', 'Error', 'YOU ARE NOT LOG IN !', 3000, false);
        }
      },
      error: function() {
        // alert("error");
      },
    });
  });
  // REGISTER FORM END

  // ADD TO FAVORITE START
  $('.like_btn').on('click', function() {
    var data_user_id = $(this).closest('li').attr("data-user_id");
    var data_product_id = $(this).closest('li').attr("data-product_id");
    $('#add_to_favourite_user_id').val(data_user_id);
    $('#add_to_favourite_product_id').val(data_product_id);
    $(this).removeClass('show_like_btn');
    $(this).addClass('hide_like_btn');
    $(this).next('.remowe_like_btn').removeClass('hide_like_btn');
    $(this).next('.remowe_like_btn').addClass('show_like_btn');
    if ($(".header_wrapper_favorite_icon_container").hasClass("not_isset_product")) {
      $(".header_wrapper_favorite_icon_container").removeClass("not_isset_product");
      $(".header_wrapper_favorite_icon_container").addClass("isset_product");
    }
    $('#add_to_favourite_submitme').click();
  });

  jQuery(document).on("click", "#add_to_favourite_submitme", function(event) {
    event.preventDefault();
    jQuery.ajax({
      type: "POST",
      url: "http://tigall.red-pix.com/wp-admin/admin-ajax.php",
      data: {
        action: "ajax_form_add_to_favourite",
        "add_to_favourite_user_id": jQuery("#add_to_favourite_user_id").val(),
        "add_to_favourite_product_id": jQuery("#add_to_favourite_product_id").val(),
      },
      beforeSend: function() {
        console.log('USER ID - ' + jQuery("#add_to_favourite_user_id").val());
        console.log('PRODUCT ID - ' + jQuery("#add_to_favourite_product_id").val());
      },
      success: function() {
        SlimNotifierJs.notification('info', 'Information', 'PRODUCT ADD TO FAVORITE !', 3000, false);
      },
      error: function() {
        // alert("error");
      },
    });
  });
  // ADD TO FAVORITE END


  // REMOVE FROM FAVORITE START
  $('.remowe_like_btn').on('click', function() {
    var data_user_id = $(this).closest('li').attr("data-user_id");
    var data_product_id = $(this).closest('li').attr("data-product_id");
    $('#remove_from_favourite_user_id').val(data_user_id);
    $('#remove_from_favourite_product_id').val(data_product_id);
    $(this).removeClass('show_like_btn');
    $(this).addClass('hide_like_btn');
    $(this).prev('.like_btn').removeClass('hide_like_btn');
    $(this).prev('.like_btn').addClass('show_like_btn');
    $('#remove_from_favourite_submitme').click();
  });

  jQuery(document).on("click", "#remove_from_favourite_submitme", function(event) {
    event.preventDefault();
    jQuery.ajax({
      type: "POST",
      url: "http://tigall.red-pix.com/wp-admin/admin-ajax.php",
      data: {
        action: "ajax_form_remove_from_favourite",
        "remove_from_favourite_user_id": jQuery("#remove_from_favourite_user_id").val(),
        "remove_from_favourite_product_id": jQuery("#remove_from_favourite_product_id").val(),
      },
      beforeSend: function() {
        console.log('USER ID - ' + jQuery("#remove_from_favourite_user_id").val());
        console.log('PRODUCT ID - ' + jQuery("#remove_from_favourite_product_id").val());
      },
      success: function() {
        SlimNotifierJs.notification('warning', 'Warning', 'PRODUCT REMOVED FROM FAVORITE !', 3000, false);
        if ($("body").hasClass("page-template-page_personal_cabinet-favorits")) {
          document.location.reload();
        }
      },
      error: function() {
        // alert("error");
      },
    });
  });
  // REMOVE FROM FAVORITE END



  // SAVE ORDER TO DB START
  if ($("body").hasClass("woocommerce-order-received")) {

    var data_user_id_order = $('#data_user_id_order').attr("data-user_id_order");
    var data_order_id_order = $('#data_order_id_order').attr("data-order_id_order");
    $('#add_order_user_id').val(data_user_id_order);
    $('#add_order_order_id').val(data_order_id_order);

    jQuery.ajax({
      type: "POST",
      url: "http://tigall.red-pix.com/wp-admin/admin-ajax.php",
      data: {
        action: "ajax_form_add_user_order",
        "add_order_user_id": jQuery("#add_order_user_id").val(),
        "add_order_order_id": jQuery("#add_order_order_id").val(),
      },
      beforeSend: function() {
        console.log('USER ID - ' + jQuery("#add_order_user_id").val());
        console.log('ORDER ID - ' + jQuery("#add_order_order_id").val());
      },
      success: function() {
        SlimNotifierJs.notification('info', 'Information', 'ORDER ADD TO CABINET !', 3000, false);
      },
      error: function() {
        // alert("error");
      },
    });

  }
  // SAVE ORDER TO DB END
});