<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ideakyiv
 */
 ?>

  <div class="form_reg_log_wrapper">
    <!-- REGISTER FORM START  -->
    <div class="form_reg_wrap">
      <div class="form_exit"></div>
      <div class="form_title_block">
        <p class="form_reg_title form_title"><?php pll_e('REGISTRATION'); ?></p>
        <p class="form_reg_tumbler form_tumbler"><?php pll_e('LOGIN'); ?></p>
      </div>
      <form method="post" id="register_form" action="">
          <?php wp_nonce_field( 'settings', 'settings_nonce', false );?>
          <input  id="register_form_user_name"  name="register_form_user_name" type="text" placeholder="<?php pll_e('Enter your name'); ?>"/>
          <input  id="register_form_user_pass"  name="register_form_user_pass" type="text" placeholder="<?php pll_e('Enter password'); ?>"/>
          <input  id="register_form_user_pass_repeat"  name="register_form_user_pass_repeat" type="text" placeholder="<?php pll_e('Repeat password'); ?>"/>
          <button id="register_form_submitme"  name="register_form_submitme"><?php pll_e('Register'); ?></button>
      </form>
    </div>
    <!-- REGISTER FORM END  -->

    <!-- LOGIN FORM START  -->
    <div class="form_log_wrap">
      <div class="form_exit"></div>
      <div class="form_title_block">
        <p class="form_reg_tumbler form_title"><?php pll_e('LOGIN'); ?></p>
        <p class="form_reg_title form_tumbler"><?php pll_e('REGISTRATION'); ?></p>
      </div>
      <form method="post" id="login_form" action="">
          <?php wp_nonce_field( 'settings', 'settings_nonce', false );?>
          <input  id="login_form_user_name"  name="login_form_user_name" type="text" placeholder="<?php pll_e('Enter your name'); ?>"/>
          <input  id="login_form_user_pass"  name="login_form_user_pass" type="text" placeholder="<?php pll_e('Enter password'); ?>"/>
          <button id="login_form_submitme"  name="login_form_submitme"><?php pll_e('Log in'); ?></button>
      </form>
    </div>
      <!-- LOGIN FORM END  -->

  </div>

 <?php if($_COOKIE["cuctom_user_login"] == 'login'){ ?>

    <!-- ADD TO FAVORITE START  -->
  	 <form method="post" id="add_to_favourite" action="">
  			<?php wp_nonce_field( 'settings', 'settings_nonce', false );?>
  			<input  id="add_to_favourite_user_id"  name="add_to_favourite_user_id" type="text"/>
  			<input  id="add_to_favourite_product_id"  name="add_to_favourite_product_id" type="text"/>
  			<button id="add_to_favourite_submitme"  name="add_to_favourite_submitme">Add to favourite</button>
  	 </form>
  	<!-- ADD TO FAVORITE END  -->

    <!-- REMOVE FROM FAVORITE START  -->
     <form method="post" id="remove_from_favourite" action="">
        <?php wp_nonce_field( 'settings', 'settings_nonce', false );?>
        <input  id="remove_from_favourite_user_id"  name="remove_from_favourite_user_id" type="text"/>
        <input  id="remove_from_favourite_product_id"  name="remove_from_favourite_product_id" type="text"/>
        <button id="remove_from_favourite_submitme"  name="remove_from_favourite_submitme">Remove from favourite</button>
     </form>
    <!-- REMOVE FROM FAVORITE END  -->


    <?php
    global $wp;
    $current_url =  home_url( $wp->request );
    if (strpos($current_url, '/order-received/') !== false) { ?>

      <!-- ADD USER ORDER START  -->
       <form method="post" id="add_order" action="">
          <?php wp_nonce_field( 'settings', 'settings_nonce', false );?>
          <input  id="add_order_user_id"  name="add_order_user_id" type="text"/>
          <input  id="add_order_order_id"  name="add_order_order_id" type="text"/>
          <button id="add_order_submitme"  name="add_order_submitme">Add order</button>
       </form>
      <!-- ADD USER ORDER  END  -->

    <?php } ?>
<?php } ?>

  <footer class="footer_container">
    <div class="footer_container_img"></div>
    <div class="footer_container_img_fill"></div>
      <div class="container-fluid">
        <div class="row footer_wrapper">
          <div class="col-lg-12">
            <div class="footer_wrapper_menu">
              <nav class="footer__nav">
                <?php
      	 				wp_nav_menu(
      	 					array(
      	 						'theme_location' => 'menu-2',
      	 						'menu_id' => 'footer-menu',
      	 					)
      	 				);?>
              </nav>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="footer_information_wrapper">
              <div class="footer_information_wrapper_phone_wrapper">
                <p class="footer_information_wrapper_phone_wrappe_title"><?php pll_e('Phone'); ?></p>
                <p class="footer_information_wrapper_phone_wrapper_text" >+38 (094) 389-89-46</p>
                <p class="footer_information_wrapper_phone_wrapper_text">+38 (093) 592-27-92</p>
              </div>
              <div class="footer_information_wrapper_maile_wrapper">
                <p class="footer_information_wrapper_maile_wrapper_title"><?php pll_e('Email'); ?></p>
                <p class="footer_information_wrapper_maile_wrapper_text">hello@company.com</p>
                <p class="footer_information_wrapper_maile_wrapper_text">support@company.com</p>
              </div>
              <div class="footer_information_wrapper_adress_wrapper">
                <p class="footer_information_wrapper_adress_wrapper_title"><?php pll_e('Adress'); ?></p>
                <p class="footer_information_wrapper_adress_wrapper_text">Kyiv, Khreshchatyy Yar, 02000</p>
              </div>
              <div class="footer_information_wrapper_social_wrapper">
                <p class="footer_information_wrapper_social_wrapper_title"><?php pll_e('Social network'); ?></p>
                <div class="footer_information_wrapper_social_wrapper_container">
                  <a class="footer_information_wrapper_social_wrapper_container_facebook" href="#"></a>
                  <a class="footer_information_wrapper_social_wrapper_container_twitter" href="#"></a>
                  <a class="footer_information_wrapper_social_wrapper_container_instagram" href="#"></a>
                  <a class="footer_information_wrapper_social_wrapper_container_youtube" href="#"></a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </footer>

    <div class="feedback_btn_wrapper">
      <div class="feedback_btn_container">
         <div class="feedback_btn_container_btn"></div>
      </div>
    </div>

    <div class="feedback_modal_wrapper_body_cover">
      <div class="feedback_modal_wrapper">

        <div class="feedback_modal_container">
          <div class="feedback_modal_container_main_content">
            <div class="feedback_modal_container_close_btn"></div>
            <div class="feedback_modal_container_main_content_img_wrapper"></div>

            <div class="feedback_modal_container_main_content_text_container">

              <div class="feedback_modal_container_main_content_text_wrapper">
                <p class="feedback_modal_container_main_content_text_wrapper_header">Обратная связь</p>
                <p class="feedback_modal_container_main_content_text_wrapper_text">Оставте вашо номер телефона и наш оператор свяжется с вами в тесении 5 минут!</p>
              </div>

              <div class="feedback_modal_container_main_content_form_wrapper">
               <?php echo do_shortcode('[contact-form-7 id="499" title="callback_de"]');?>
              </div>

            </div>



          </div>
        </div>

      </div>
    </div>
 <?php wp_footer(); ?>
</body>
</html>
