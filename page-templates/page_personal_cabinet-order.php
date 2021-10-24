<?php
/*
Template Name: Personal cabinet order
*/
if($_COOKIE["cuctom_user_login"] != "login"){
  wp_redirect(home_url());
  exit();
 }
get_header();

$queried_object = get_queried_object(); ?>


<div class="breadcrumbs_wrapper personal_area_breadcrumbs">
     <div class="kama_breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
       <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
        <a href="<?php echo get_home_url(); ?>/" itemprop="item">
           <span class="home_page" itemprop="name">Home</span>
           <meta itemprop="position" content="1">
         </a>
       </span>
       <span class="kb_sep"></span>
       <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
         <span class="kb_title" itemprop="name"><?php pll_e('Bestellungen'); ?></span>
         <meta itemprop="position" content="3">
       </span>
   </div>
 </div>


<div id="personal_cabinet_wrapper" class="container">
  <!-- GET USER NAME START  -->
  <?php
  $cuctom_user_id =  $_COOKIE["cuctom_user_login_id"];
  $results = $wpdb->get_results("SELECT *  FROM  custom_users WHERE id='$cuctom_user_id'");
  foreach ($results as $result) {
      $cuctom_user_name_from_id =  $result->user_name;
  } ?>
  <!-- GET USER NAME END  -->


  <!-- GET ULIST FAVORITE PRODUCT ID START  -->
  <?php
  $cuctom_orders_id =  $_COOKIE["cuctom_user_login_id"];
  $orders_id = array();
  $results_orders_ids = $wpdb->get_results("SELECT *  FROM  custom_users_orders  WHERE order_user_id='$cuctom_orders_id'");
  foreach ($results_orders_ids as $results_orders_id) {
      array_push($orders_id, $results_orders_id->order_order_id);
  } ?>
  <!-- GET ULIST FAVORITE PRODUCT ID END  -->



  <!-- GET ALL USER INFORMATION START -->
  <?php
  $cuctom_orders_id =  $_COOKIE["cuctom_user_login_id"];
  $results_user_info = $wpdb->get_results("SELECT *  FROM  custom_users_information  WHERE 	information_user_id='$cuctom_orders_id'");
  foreach ($results_user_info as $result_user_info) {
    $user_real_name = $result_user_info->information_user_name;
    $user_img = $result_user_info->information_user_img;
    $user_date_of_birth = $result_user_info->information_user_date_of_birth;
    $user_sex = $result_user_info->information_user_sex;
    $user_address = $result_user_info->information_user_address;
    $user_telephone_1 = $result_user_info->information_user_telephone_1;
    $user_telephone_2 = $result_user_info->information_user_telephone_2;
    $user_email = $result_user_info->information_user_email;
  } ?>
  <!-- GET ALL USER INFORMATION END  -->


 <div class="row row-no_margin">
      <div class="col-lg-2 cabinet_sitebar_wrapper">
        <div class="avatar-name">

          <div class="avatar_name_mobile_exit">
            <a href="#" class="avatar_name_mobile_exit_btn cabinet_orders_list_exit"></a>
          </div>

            <?php if($user_img !='unset'){ ?>
              <div class="cabinet_sitebar_wrapper_image" style="background-image: url(<?php echo get_template_directory_uri() ?>/user-img/user-img-thumb/<?php echo $user_img; ?> );">
            <?php } else { ?>
              <div class="cabinet_sitebar_wrapper_image" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/user_cabinet_unset.svg);">
            <?php } ?>
          </div>
          <p class="cabinet_sitebar_wrapper_user_name"><?php echo $cuctom_user_name_from_id ?></p>
        </div>

      <ul class="cabinet_sitebar_wrapper_user_navigation_container">
        <li class="cabinet_sitebar_wrapper_user_navigation_item"><a href="/personal-area/"><?php pll_e('Personal Area'); ?></a></li>
        <li class="cabinet_sitebar_wrapper_user_navigation_item active"><a href="/order/"><?php pll_e('My orders'); ?></a></li>
        <li class="cabinet_sitebar_wrapper_user_navigation_item"><a href="#"><?php pll_e('My coupons'); ?></a></li>
      </ul>
    </div>
    <div class="col-lg-10 cabinet_orders_list" >
      <a href="#" class="cabinet_orders_list_exit cabinet_orders_list_exit_desctop"></a>
     <h1 class="cabinet_orders_title"><?php pll_e('My orders'); ?></h1>


<?php if(!empty($results_orders_ids)){
     foreach ($orders_id as $order_item) {
        $order = wc_get_order($order_item);
        $items = $order->get_items();
        $order_status  = $order->get_status();
        $date_created  = $order->get_date_created();
        $new_data_format = date('d-m-Y H:i', strtotime($date_created));
          foreach ($items as $item) {
            $product_id = $item->get_product_id();
            if($product_id > 0){
            $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 1 );
            $product = wc_get_product($product_id);
            $product_prise =  $product->get_price();
            $product_url = $product->get_permalink();
            $current_language = pll_current_language( 'slug' );
            if ($current_language == 'de'){
              echo '<div class="cabinet_product_item">';
              echo '<div class="cabinet_product_item_img_wrapper">';
              echo '<img src="' . $image_url[0] . '" >';
              echo '</div>';
              echo '<div class="cabinet_product_item_text_wrapper">';
              echo '<p> <span> № Befehl: </span> ' . '<span>' . $item['order_id'] . '</span>' . '</p>';
              echo '<p> <span> Steckdose: </span> ' . '<span>' . $product_prise . '</span>' . '</p>';
              echo '<p> <span>  Bestellstatus: </span> ' . '<span class=' . $order_status . '>' . $order_status . '</span>' . '</p>';
              echo '<p> <span> Auftragsdatum: </span> ' . '<span>' . $new_data_format . '</span>' . '</p>';
              echo '</div>';
              echo '<div class="cabinet_product_item_btn_wrapper">';
              echo '<a href="'.$product_url.'" style="display:block"> Mehr Details </a> ';
              echo '</div>';
              echo '</div>';
            }
          	if ($current_language == 'en'){
              echo '<div class="cabinet_product_item">';
              echo '<div class="cabinet_product_item_img_wrapper">';
              echo '<img src="' . $image_url[0] . '" >';
              echo '</div>';
              echo '<div class="cabinet_product_item_text_wrapper">';
              echo '<p> <span> № Order: </span> ' . '<span>' . $item['order_id'] . '</span>' . '</p>';
              echo '<p> <span> Prise: </span> ' . '<span>' . $product_prise . '</span>' . '</p>';
              echo '<p> <span>  Order status: </span> ' . '<span class=' . $order_status . '>' . $order_status . '</span>' . '</p>';
              echo '<p> <span> Order date: </span> ' . '<span>' . $new_data_format . '</span>' . '</p>';
              echo '</div>';
              echo '<div class="cabinet_product_item_btn_wrapper">';
              echo '<a href="'.$product_url.'" style="display:block"> More details </a> ';
              echo '</div>';
              echo '</div>';
            }
            }
         }
      }
    } else {
      echo '<p class="not_found_result">' . pll_e('Keine Informationen zum Anzeigen') . '</p>';
    } ?>
    </div>
  </div>
</div>
<?php
get_footer();
