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
          <input  id="register_form_user_pass"  name="register_form_user_pass" type="password" placeholder="<?php pll_e('Enter password'); ?>"/>
          <input  id="register_form_user_pass_repeat"  name="register_form_user_pass_repeat" type="password" placeholder="<?php pll_e('Repeat password'); ?>"/>
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
          <input  id="login_form_user_pass"  name="login_form_user_pass" type="password" placeholder="<?php pll_e('Enter password'); ?>"/>
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
          <input  id="add_order_user_id"   name="add_order_user_id" type="text"/>
          <input  id="add_order_order_id"  name="add_order_order_id" type="text"/>
          <button id="add_order_submitme"  name="add_order_submitme">Add order</button>
       </form>
      <!-- ADD USER ORDER  END  -->

    <?php } ?>
<?php } ?>

  <footer class="footer_container">

      <?php   if( wp_is_mobile() ) { ?>
      <div class="footer_container_img"></div>
      <?php } else { ?>
      <div class="footer_container_img" style="background-image: url(<?php  echo get_template_directory_uri() ?>/img/footer_bg.png)"></div>
      <?php  } ?>

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
          <?php global $tirral_global; ?>

          <div class="col-lg-12">
            <div class="footer_information_wrapper">
              <div class="footer_information_wrapper_phone_wrapper">
                <p class="footer_information_wrapper_phone_wrappe_title"><?php pll_e('Phone'); ?></p>
                <p class="footer_information_wrapper_phone_wrapper_text"><?php echo $tirral_global['location-block-tel-1'] ?></p>
                <p class="footer_information_wrapper_phone_wrapper_text"><?php echo $tirral_global['location-block-tel-2'] ?></p>
              </div>
              <div class="footer_information_wrapper_maile_wrapper">
                <p class="footer_information_wrapper_maile_wrapper_title"><?php pll_e('Email'); ?></p>
                <a href="mailto:mcenter.ml@<?php echo $tirral_global['footer-contacts-mail-address-1'] ?>" class="footer_information_wrapper_maile_wrapper_text"><?php echo $tirral_global['footer-contacts-mail-address-1'] ?></a>
                <a href="mailto:mcenter.ml@<?php echo $tirral_global['footer-contacts-mail-address-2'] ?>" class="footer_information_wrapper_maile_wrapper_text"><?php echo $tirral_global['footer-contacts-mail-address-2'] ?></a>
              </div>
              <div class="footer_information_wrapper_adress_wrapper">
                <p class="footer_information_wrapper_adress_wrapper_title"><?php pll_e('Adress'); ?></p>
                <?php $current_language = pll_current_language( 'slug' ); ?>
                <?php  if($current_language == "de"){ ?>
                    <p class="footer_information_wrapper_adress_wrapper_text"><?php echo $tirral_global['footer-contacts-location-city-de'] ?></p>
                <?php } ?>
                <?php  if($current_language == "en"){ ?>
                    <p class="footer_information_wrapper_adress_wrapper_text"><?php echo $tirral_global['footer-contacts-location-city-en'] ?></p>
                <?php } ?>
              </div>
              <div class="footer_information_wrapper_social_wrapper">
                <p class="footer_information_wrapper_social_wrapper_title"><?php pll_e('Social network'); ?></p>
                <div class="footer_information_wrapper_social_wrapper_container">
                  <a class="footer_information_wrapper_social_wrapper_container_facebook" href="<?php echo $tirral_global['footer-social-link-1'] ?>" target="_blank"></a>
                  <a class="footer_information_wrapper_social_wrapper_container_twitter" href="<?php echo $tirral_global['footer-social-link-2'] ?>" target="_blank"></a>
                  <a class="footer_information_wrapper_social_wrapper_container_instagram" href="<?php echo $tirral_global['footer-social-link-3'] ?>" target="_blank"></a>
                  <a class="footer_information_wrapper_social_wrapper_container_youtube" href="<?php echo $tirral_global['footer-social-link-4'] ?>" target="_blank"></a>
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
                <p class="feedback_modal_container_main_content_text_wrapper_header"><?php pll_e('R??ckkopplung'); ?></p>
                <p class="feedback_modal_container_main_content_text_wrapper_text"><?php pll_e('Hinterlassen Sie Ihre Telefonnummer und unser Operator wird Sie innerhalb von 5 Minuten kontaktieren!'); ?></p>
              </div>
              <div class="feedback_modal_container_main_content_form_wrapper">
                <?php $current_language = pll_current_language( 'slug' ); ?>
                <?php  if($current_language == "de"){ ?>
                  <?php echo do_shortcode('[contact-form-7 id="499" title="callback_de"]'); ?>
                <?php }
                 if($current_language == "en"){ ?>
                  <?php echo do_shortcode('[contact-form-7 id="817" title="callback_en"]'); ?>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

 <?php wp_footer(); ?>



<?php $current_language = pll_current_language( 'slug' ); ?>

  <?php  if($current_language == "de"){ ?>
    <script type="text/javascript">
      document.addEventListener('wpcf7mailsent', function(event) {

        if (jQuery(".custom_alert_wrapper")[0]) {
          jQuery('.custom_alert_wrapper').remove();
        }
        setTimeout(function() {
            jQuery('body').append('<div class="custom_alert_wrapper alert_success"><div class="custom_alert_container_status">Erfolgreich!</div><div class="custom_alert_container_text">VIELEN DANK! IHR BRIEF ERFOLGREICH GESENDET !</div><div class="custom_alert_container_icon"></div></div>');
        }, 600);
        setTimeout(function() {
          jQuery('.custom_alert_wrapper').remove();
        }, 3000);
        setTimeout(function() {
        var el = document.getElementsByClassName('feedback_modal_container_close_btn');
          for (var i=0;i<el.length; i++) {
          el[i].click();
        }
      }, 4000);
      }, false);
    </script>
  <?php }



  if($current_language == "en"){ ?>
    <script type="text/javascript">
    if (jQuery(".custom_alert_wrapper")[0]) {
      jQuery('.custom_alert_wrapper').remove();
    }
    setTimeout(function() {
        jQuery('body').append('<div class="custom_alert_wrapper alert_success"><div class="custom_alert_container_status">Successfully!</div><div class="custom_alert_container_text">THANKS! YOUR LETTER SENT SUCCESSFULLY !</div><div class="custom_alert_container_icon"></div></div>');
    }, 600);
    setTimeout(function() {
      jQuery('.custom_alert_wrapper').remove();
    }, 3000);
    setTimeout(function() {
    var el = document.getElementsByClassName('feedback_modal_container_close_btn');
      for (var i=0;i<el.length; i++) {
      el[i].click();
    }
  }, 4000);
      }, false);

    </script>
  <?php } ?>

</body>
</html>
