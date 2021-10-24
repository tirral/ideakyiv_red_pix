<?php
/*
Template Name: Home page
*/
get_header(); ?>

<?php
if ( wp_is_mobile() ) { ?>

  <div class="swiper mySwiper home_page_main_container_header_slider">
     <div class="swiper-wrapper">
       <?php
         $entries = get_post_meta( get_the_ID(), 'header_slider', true );
         foreach ((array) $entries as $key => $entry ) {
           $header_slider_img =  '';
           $header_slider_title =  '';
           $header_slider_sale_value =  '';
           $header_slider_description =  '';
           $header_slider_btn_title =  '';
           $header_slider_btn_url =  '';
           $header_slider_img = ( $entry['header_slider_img'] );
           $header_slider_title = ( $entry['header_slider_title'] );
           $header_slider_sale_value = ( $entry['header_slider_sale_value'] );
           $header_slider_description = ( $entry['header_slider_description'] );
           $header_slider_btn_title = ( $entry['header_slider_btn_title'] );
           $header_slider_btn_url = ( $entry['header_slider_btn_url'] ); ?>
              <div class="swiper-slide" data-url="<?php echo $header_slider_img ?>">
                <div class="swiper_slide_plug_wrapper">
                  <div class="swiper_slide_plug_container">
                    <div class="loader_new">
                      <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                    </div>
                  </div>
                </div>
              <div class="swiper_slide_container">
               <div class="swiper_slide_container_content">
                 <p class="swiper_slide_container_content_header"><?php echo $header_slider_title ?></p>
                 <?php if($header_slider_sale_value){ ?>
                    <p class="swiper_slide_container_content_val"><?php echo $header_slider_sale_value ?>%</p>
                 <?php } ?>
                 <p class="swiper_slide_container_content_text"><?php echo $header_slider_description ?></p>
                 <a class="swiper_slide_container_content_btn"  href="<?php echo $header_slider_btn_url ?>"><?php echo $header_slider_btn_title ?></a>
               </div>
             </div>
           </div>
          <?php } ?>
     </div>
     <div class="swiper-button-next"></div>
     <div class="swiper-button-prev"></div>
   </div>

   <?php if($_COOKIE["cuctom_user_login"] == 'login'){ ?>
   		<!-- GET ULIST FAVORITE PRODUCT ID START  -->
   		<?php
   		$cuctom_user_id =  $_COOKIE["cuctom_user_login_id"];
   		$products_id = array();
   		$results = $wpdb->get_results("SELECT *  FROM  custom_users_favourite WHERE user_id='$cuctom_user_id'");
   		foreach ($results as $result) {
   		    array_push($products_id, $result->product_id);
   		} ?>
   		<!-- GET ULIST FAVORITE PRODUCT ID END  -->
    <?php } ?>
  <?php
  foreach($products_id as $products_id_var){ ?>
   <span class="product_id_favorite" foo = "<?php echo $products_id_var ?>"></span>
  <?php } ?>
   <div class="container home_page_main_container">
     <div class="row home_page_main_wrapper">
      <div class="col-lg-12 home_page_product_line_wrapper ">
        <h1 class="sales_leaders_title"><?php pll_e('Sales leaders'); ?></h1>
        <div id="sales_leaders_container" class="home_page_product_line_container sales_leaders_block">
        </div>
        <div id="container_plaseholder_wrapper">
          <div id="container_plaseholder">
            <div class="loader_new_container">
            <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
            </div>
              <div id="container_plaseholder_text"><?php pll_e('Beladung'); ?></div>
          </div>
        </div>
      </div>
      <div class="col-lg-12 home_page_product_line_wrapper">
        <h1><?php pll_e('New items'); ?></h1>
        <div id="new_items_container" class="home_page_product_line_container">
        </div>
        <div id="container_plaseholder_wrapper_second">
          <div id="container_plaseholder_second">
            <div class="loader_new_container_second">
            <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
            </div>
              <div id="container_plaseholder_text_second"><?php pll_e('Beladung'); ?></div>
          </div>

        </div>
      </div>
     </div>
   </div>

<?php } else { ?>
<div class="swiper mySwiper home_page_main_container_header_slider animate__animated animate__fadeIn wow">
   <div class="swiper-wrapper">
     <?php
       $entries = get_post_meta( get_the_ID(), 'header_slider', true );
       foreach ((array) $entries as $key => $entry ) {
         $header_slider_img =  '';
         $header_slider_title =  '';
         $header_slider_sale_value =  '';
         $header_slider_description =  '';
         $header_slider_btn_title =  '';
         $header_slider_btn_url =  '';
         $header_slider_img = ( $entry['header_slider_img'] );
         $header_slider_title = ( $entry['header_slider_title'] );
         $header_slider_sale_value = ( $entry['header_slider_sale_value'] );
         $header_slider_description = ( $entry['header_slider_description'] );
         $header_slider_btn_title = ( $entry['header_slider_btn_title'] );
         $header_slider_btn_url = ( $entry['header_slider_btn_url'] ); ?>
            <div class="swiper-slide" style="background-image: url(<?php echo $header_slider_img ?> )">
            <div class="swiper_slide_container">
             <div class="swiper_slide_container_content">
               <p class="swiper_slide_container_content_header"><?php echo $header_slider_title ?></p>
               <?php if($header_slider_sale_value){ ?>
                  <p class="swiper_slide_container_content_val"><?php echo $header_slider_sale_value ?>%</p>
               <?php } ?>
               <p class="swiper_slide_container_content_text"><?php echo $header_slider_description ?></p>
               <a class="swiper_slide_container_content_btn"  href="<?php echo $header_slider_btn_url ?>"><?php echo $header_slider_btn_title ?></a>
             </div>
           </div>
         </div>
        <?php } ?>

   </div>
   <div class="swiper-button-next"></div>
   <div class="swiper-button-prev"></div>
 </div>

<div class="container home_page_main_container">
  <div class="row home_page_main_wrapper">

        <div class="col-lg-12 home_page_product_line_wrapper animate__animated animate__fadeIn wow">
           <h1 class="sales_leaders_title"><?php pll_e('Sales leaders'); ?></h1>
          <div class="home_page_product_line_container sales_leaders_block">
            <?php
            $args = array(
              'order' => 'DESC', //ASC
              'post_type' => 'product',
              'posts_per_page' => 8,
              'orderby'  => array( 'meta_value_num' => 'DESC', 'title' => 'ASC' ),
              'meta_key' => 'total_sales',
            );
            $loop = new WP_Query( $args);
            if ( $loop->have_posts() ) {
              while ( $loop->have_posts() ) : $loop->the_post();
               // $some = get_post_meta(get_the_ID(), 'total_sales', true);
               // echo $some;
               	wc_get_template_part( 'content', 'product' );
               endwhile;
            }
            wp_reset_postdata(); ?>
            </div>
        </div>
        <div class="col-lg-12 home_page_product_line_wrapper animate__animated animate__fadeIn wow">
        <h1><?php pll_e('New items'); ?></h1>
          <div class="home_page_product_line_container">
            <?php
            $args = array(
              'order' => 'DESC', //ASC
              'post_type' => 'product',
              'posts_per_page' => 8,
            );
            $loop = new WP_Query( $args);
            if ( $loop->have_posts() ) {
              while ( $loop->have_posts() ) : $loop->the_post();
                wc_get_template_part( 'content', 'product' );
               endwhile;
            }
            wp_reset_postdata(); ?>
            </div>
        </div>
  </div>
</div>


<?php } ?>



<?php $current_language = pll_current_language( 'slug' ); ?>
<?php  if($current_language == "de"){ ?>
<style media="screen">
.sales_leaders_block::before {
  background: url('<?php echo get_template_directory_uri() ?>/img/VERTRIEBSLEITER.svg');
}
</style>
<?php } ?>
<?php  if($current_language == "en"){ ?>
<style media="screen">
.sales_leaders_block::before {
  background: url('<?php echo get_template_directory_uri() ?>/img/SALES_LEADERS.svg');
}
</style>
<?php } ?>





<?php
get_footer();
