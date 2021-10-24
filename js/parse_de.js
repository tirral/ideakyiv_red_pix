jQuery(document).ready(function($) {
  $("#city_load_more_out").hide();
  $("#city_load_more_out").empty();
  $("#search input").keyup(function() {

    console.log($("#search input").val());

    if (document.documentElement.lang === "de-DE") {
      var text_val = $("#search input").val();
      var regexp = /^[a-z - ]+$/i;
      if (text_val.match(regexp)) {
        if (text_val === "") {
          $("#city_load_more_out").hide();
        } else {
          if (!/\S/.test(text_val)) {} else {
            if (text_val.length >= 3) {
              $("#city_load_more_out").show();
              $("#result").html("");
              $("#state").val("");
              var searchField = $("#search input").val();
              console.log(searchField);
              var counter = 0;
              var result = document.getElementById("city_load_more_out");
              var ourReqest = new XMLHttpRequest();
              ourReqest.open(
                "GET",
                "http://tigall.red-pix.com/wp-json/wp/v2/product?_embed&per_page=40&order=asc&search=" +
                searchField
              );
              ourReqest.onload = function() {
                var ourData = JSON.parse(ourReqest.responseText);

                $("#city_load_more_out").empty();
                $("#city_load_more_out").append(
                  '<div class="city_load_more_out_close_icon_wrapper"><div class="city_load_more_out_close_icon_icon"></div></div>'
                );

                for (var i = 0; i < ourData.length; i++) {
                  if (ourData[i]._embedded["wp:featuredmedia"][0].source_url != null) {
                    if (counter <= 10) {
                      if (ourData[i].lang == 'de') {
                        result.innerHTML +=
                          '<div class="archive_news_body_sitebar_container_item serch_items"><div class="archive_news_body_sitebar_container_item_img"><img src="' +
                          ourData[i]._embedded["wp:featuredmedia"][0].source_url +
                          '"></div><div class="archive_news_body_sitebar_container_item_text"><a href="' +
                          ourData[i].link +
                          '">' +
                          ourData[i].title.rendered +
                          "</a></div></div>";
                        counter++;
                      }
                    }
                  }
                }
                if (counter == 0) {
                  $("#city_load_more_out").empty();
                  $("#city_load_more_out").append(
                    '<p class="sory_no_match">Es tut uns leid, es gibt keine Übereinstimmungen in den Suchergebnissen.</p>'
                  );
                }
                if (ourReqest.status != 200) {
                  // обработать ошибку
                } else {}
              };
              ourReqest.send();
            }
          }
        }
      } else {
        $("#city_load_more_out").show();
        $("#city_load_more_out").empty();
        $("#city_load_more_out").append(
          '<p class="sory_no_match">Ein nicht-deutsches Tastaturlayout ist ausgewählt.</p>'
        );
      }

    } else {

      var text_val = $("#search input").val();
      var regexp = /^[a-z - ]+$/i;
      if (text_val.match(regexp)) {
        if (text_val === "") {
          $("#city_load_more_out").hide();
        } else {
          if (!/\S/.test(text_val)) {} else {
            if (text_val.length >= 3) {
              $("#city_load_more_out").show();
              $("#result").html("");
              $("#state").val("");
              var searchField = $("#search input").val();
              console.log(searchField);
              var counter = 0;
              var result = document.getElementById("city_load_more_out");
              var ourReqest = new XMLHttpRequest();
              ourReqest.open(
                "GET",
                "http://tigall.red-pix.com/wp-json/wp/v2/product?_embed&per_page=40&order=asc&search=" +
                searchField
              );
              ourReqest.onload = function() {
                var ourData = JSON.parse(ourReqest.responseText);

                $("#city_load_more_out").empty();
                $("#city_load_more_out").append(
                  '<div class="city_load_more_out_close_icon_wrapper"><div class="city_load_more_out_close_icon_icon"></div></div>'
                );

                for (var i = 0; i < ourData.length; i++) {
                  if (ourData[i]._embedded["wp:featuredmedia"][0].source_url != null) {
                    if (counter <= 10) {
                      if (ourData[i].lang == 'en') {
                        result.innerHTML +=
                          '<div class="archive_news_body_sitebar_container_item serch_items"><div class="archive_news_body_sitebar_container_item_img"><img src="' +
                          ourData[i]._embedded["wp:featuredmedia"][0].source_url +
                          '"></div><div class="archive_news_body_sitebar_container_item_text"><a href="' +
                          ourData[i].link +
                          '">' +
                          ourData[i].title.rendered +
                          "</a></div></div>";
                        counter++;
                      }
                    }
                  }
                }
                if (counter == 0) {
                  $("#city_load_more_out").empty();
                  $("#city_load_more_out").append(
                    '<p class="sory_no_match">Es tut uns leid, es gibt keine Übereinstimmungen in den Suchergebnissen.</p>'
                  );
                }
                if (ourReqest.status != 200) {
                  // обработать ошибку
                } else {}
              };
              ourReqest.send();
            }
          }
        }
      } else {
        $("#city_load_more_out").show();
        $("#city_load_more_out").empty();
        $("#city_load_more_out").append(
          '<p class="sory_no_match">Ein nicht-deutsches Tastaturlayout ist ausgewählt.</p>'
        );
      }
    }
  });
});