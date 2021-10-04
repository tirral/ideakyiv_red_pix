<?php
/*
Template Name: Personal cabinet profile
*/
if($_COOKIE["cuctom_user_login"] != "login"){
  wp_redirect(home_url());
  exit();
 }
get_header();

$queried_object = get_queried_object(); ?>

<div id="personal_cabinet_wrapper" class="container ">
  <!-- GET USER NAME START  -->
  <?php
  $cuctom_user_id =  $_COOKIE["cuctom_user_login_id"];
  $results = $wpdb->get_results("SELECT *  FROM  custom_users WHERE id='$cuctom_user_id'");
  foreach ($results as $result) {
      $cuctom_user_name_from_id =  $result->user_name;
  } ?>
  <!-- GET USER NAME END  -->

  <!-- GET LIST FAVORITE PRODUCT ID START  -->
  <?php
  $cuctom_orders_id =  $_COOKIE["cuctom_user_login_id"];
  $orders_id = array();
  $results_orders_ids = $wpdb->get_results("SELECT *  FROM  custom_users_orders  WHERE order_user_id='$cuctom_orders_id'");
  foreach ($results_orders_ids as $results_orders_id) {
      array_push($orders_id, $results_orders_id->order_order_id);
  } ?>
  <!-- GET LIST FAVORITE PRODUCT ID END  -->

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

  <div class="row">
      <div class="col-lg-2 cabinet_sitebar_wrapper">
      <?php if($user_img !='unset'){ ?>
          <div class="cabinet_sitebar_wrapper_image" style="background-image: url(<?php echo get_template_directory_uri() ?>/user-img/user-img-thumb/<?php echo $user_img; ?> );">
        <?php } else { ?>
          <div class="cabinet_sitebar_wrapper_image" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/user_cabinet_unset.svg);">
        <?php } ?>
      </div>
      <p class="cabinet_sitebar_wrapper_user_name"><?php echo $cuctom_user_name_from_id ?></p>
      <ul class="cabinet_sitebar_wrapper_user_navigation_container">
        <li class="cabinet_sitebar_wrapper_user_navigation_item active"><a href="/personal-area/"><?php pll_e('Personal Area'); ?></a></li>
        <li class="cabinet_sitebar_wrapper_user_navigation_item "><a href="/order/"><?php pll_e('My orders'); ?></a></li>
        <li class="cabinet_sitebar_wrapper_user_navigation_item"><a href="#"><?php pll_e('My coupons'); ?></a></li>
      </ul>
    </div>
    <div class="col-lg-10 cabinet_profile_wrapper">
      <a href="#" class="cabinet_orders_list_exit"></a>
     <h1 class="cabinet_orders_title"><?php pll_e('Personal Area'); ?></h1>
    <div id="profile_user_info_main_wrapper" class="container-fluid">
      <div class="row">
        <div  class="col-lg-12">
          <div class="personal_area_wrapper">
          <div class="personal_area_wrapper_line">
            <div class="personal_area_name_wrapper">
              <p class="personal_area_wrapper_line_header"><?php pll_e('Name'); ?></p>
              <p class="personal_area_wrapper_line_text"><?php echo $user_real_name; ?></p>
            </div>
            <div class="personal_area_name_wrapper">
              <p class="personal_area_wrapper_line_header"><?php pll_e('Date of Birth'); ?></p>
              <p class="personal_area_wrapper_line_text"><?php echo $user_date_of_birth; ?></p>
            </div>
            <div class="personal_area_name_wrapper">
              <p class="personal_area_wrapper_line_header"><?php pll_e('Gender'); ?></p>
              <p class="personal_area_wrapper_line_text"><?php echo $user_sex; ?></p>
            </div>
          </div>
          <div class="personal_area_wrapper_line">
            <div class="personal_area_name_wrapper">
              <p class="personal_area_wrapper_line_header"><?php pll_e('Address'); ?></p>
              <p class="personal_area_wrapper_line_text"><?php echo $user_address; ?></p>
            </div>
            <div class="personal_area_name_wrapper">
              <p class="personal_area_wrapper_line_header"><?php pll_e('Telephone'); ?></p>
              <p class="personal_area_wrapper_line_text"><?php echo $user_telephone_1; ?></p>
              <p class="personal_area_wrapper_line_text"><?php echo $user_telephone_2; ?></p>
            </div>
            <div class="personal_area_name_wrapper">
              <p class="personal_area_wrapper_line_header">E-mail</p>
              <p class="personal_area_wrapper_line_text"><?php echo $user_email; ?></p>
            </div>
          </div>
            <div id="edit_user_main_information" class="btn"><?php pll_e('Edit'); ?></div>
          </div>
        </div>
      </div>
    </div>
      <div id="profile_user_add_form_main_wrapper" class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
          <!-- USER INFORMATION  START  -->
           <form id="user_information_form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" enctype="multipart/form-data" >
             <input type="hidden" name="action" value="profile_user_main_information">
            <p>
              <input id="user_information_form_user_id"  name="user_information_form_user_id" type="hidden" value="<?php echo $_COOKIE["cuctom_user_login_id"] ?>"/>
            </p>
            <p>
              <label for="user_information_form_user_name"><?php pll_e('Enter real name'); ?>:</label>
              <input id="user_information_form_user_name"  name="user_information_form_user_name" type="text" value="<?php echo $user_real_name ?>" placeholder="Enter real name"/>
            </p>
            <p id="user_information_form_user_img_wrapper">
            <label for="photo"><?php pll_e('Your picture'); ?>:</label>
            <input id="user_information_form_user_img" type="file"  name="user_information_form_user_img"  value="unset">
            </p>
            <p>
              <label for="user_information_form_user_date_of_birth"><?php pll_e('Date of birth'); ?>:</label>
              <input id="user_information_form_user_date_of_birth"  name="user_information_form_user_date_of_birth" type="date" value="<?php echo $user_date_of_birth ?>" placeholder="Date of birth"/>
            </p>
            <p>
              <label for="user_information_form_user_sex"><?php pll_e('Your gender'); ?>:</label>
              <select id="user_information_form_user_sex" name="user_information_form_user_sex">
              <option value="male"><?php pll_e('male'); ?></option>
              <option value="female"><?php pll_e('female'); ?></option>
              </select>
            </p>
            <p>
              <label for="user_information_form_user_address"><?php pll_e('Your address'); ?>:</label>
              <textarea  id="user_information_form_user_address"  name="user_information_form_user_address" placeholder="Address"/><?php echo $user_address ?></textarea></p>
            </p>
            <p>
              <label for="user_information_form_user_telephone_1"><?php pll_e('Telephone'); ?> 1:</label>
              <input id="user_information_form_user_telephone_1"  name="user_information_form_user_telephone_1" type="text" value="<?php echo $user_telephone_1 ?>" placeholder="Telephone 1"/>
            </p>
            <p>
              <label for="user_information_form_user_telephone_2"><?php pll_e('Telephone'); ?> 2:</label>
              <input id="user_information_form_user_telephone_2"  name="user_information_form_user_telephone_2" type="text" value="<?php echo $user_telephone_2 ?>" placeholder="Telephone 2"/>
            </p>
            <p>
              <label for="user_information_form_user_email">Email:</label>
              <input id="user_information_form_user_email"  name="user_information_form_user_email" type="text" value="<?php echo $user_email ?>" placeholder="Email"/>
            </p>
            <button id="user_information_form_submite"  name="user_information_form_submite"><?php pll_e('Edite data'); ?></button>
         </form>
         <!-- USER INFORMATION  END  -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
get_footer();
