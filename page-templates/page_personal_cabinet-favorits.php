<?php
/*
Template Name: Personal cabinet favorits
*/
if($_COOKIE["cuctom_user_login"] != "login"){
  wp_redirect(home_url());
  exit();
 }
get_header();


$queried_object = get_queried_object();?>
<div class="container archive_product_main_container">
  <div class="breadcrumbs_wrapper">
       <div class="kama_breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
         <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
          <a href="<?php echo get_home_url(); ?>/" itemprop="item">
             <span class="home_page" itemprop="name">Home</span>
             <meta itemprop="position" content="1">
           </a>
         </span>
         <span class="kb_sep"></span>
         <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
           <span class="kb_title" itemprop="name"><?php pll_e('Favorits'); ?></span>
           <meta itemprop="position" content="3">
         </span>
     </div>
   </div>
    <div class="row home_page_main_wrapper">
        <div class="col-lg-12 ">
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
          $cuctom_user_id =  $_COOKIE["cuctom_user_login_id"];
          $products_id = array();
          $results_product_ids = $wpdb->get_results("SELECT *  FROM  custom_users_favourite WHERE user_id='$cuctom_user_id'");
          foreach ($results_product_ids as $results_product_id) {
              array_push($products_id, $results_product_id->product_id);
          } ?>
          <!-- GET ULIST FAVORITE PRODUCT ID END  -->

         <?php // print_r($products_id); ?>

          <div class="row">
            <div class="col-lg-12 favorite_product_wrapper">
              <h1>Favorites</h1>
              <br><br>
              <div id="woocommerce_ordering" class="product_category_before_loop_function_wrapper">
                <div id="custom_top_filter_select">
                  <div id="custom_top_filter_select_text"><?php pll_e('SORT BY'); ?></div>
                  <div id="custom_top_filter_select_body">
                    <div id="custom_top_filter_select_body_wrapper" >
                      <div class="custom_top_filter_select_body_wrapper_container">
                        <div id="custom_top_filter_select_body_title">Standardsortierung</div>
                        <ul id="custom_top_filter_select_body_item_wrapper">
                          <li>
                            <a href="<?php echo get_site_url();?>/personal-cabinet-favorits/">Standardsortierung</a>
                          </li>
                          <li>
                            <a href="<?php echo get_site_url();?>/personal-cabinet-favorits/?orderby=price">Nach Preis sortiert: niedrig zu hoch</a>
                          </li>
                          <li>
                            <a href="<?php echo get_site_url();?>/personal-cabinet-favorits/?orderby=price-desc">Nach Preis sortiert: hoch zu niedrig</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="cart_wariant_wrapper">
                  <div class="cart_wariant_container">
                    <div class="cart_wariant_container_text"><?php pll_e('View'); ?></div>
                    <div class="cart_wariant_container_variant_line"></div>
                    <div class="cart_wariant_container_variant_block"></div>
                  </div>
                </div>
              </div>
              <br>
              <?php
              $sorting_order = $_GET['orderby'];
              if($sorting_order == 'price'){
                $args = array(
                  'order' => 'DESC',
                  'posts_per_page' => -1,
                  'post_status' => 'publish',
                  'lang' => '',
                  'post_type' => 'product',
                  'post__in' => $products_id,
                  'orderby' => 'meta_value_num',
                  'meta_key' => '_price',
                  'order' => 'asc',
                );
              } elseif ($sorting_order == 'price-desc'){
                $args = array(
                  'order' => 'DESC',
                  'posts_per_page' => -1,
                  'post_status' => 'publish',
                  'lang' => '',
                  'post_type' => 'product',
                  'post__in' => $products_id,
                  'orderby' => 'meta_value_num',
                  'meta_key' => '_price',
                  'order' => 'desc',
                );
              }else{
                $args = array(
                  'order' => 'DESC',
                  'posts_per_page' => -1,
                  'post_status' => 'publish',
                  'lang' => '',
                  'post_type' => 'product',
                  'post__in' => $products_id,
                );
              }
              ?>
             <div class="main_product_container ">
              <ul class="products columns-4">
                <?php
                $loop = new WP_Query( $args);
                if ( $loop->have_posts() ) {
                while ( $loop->have_posts() ) : $loop->the_post();
                  wc_get_template_part( 'content', 'product' );
                endwhile;
              } else {
                echo '<p class="not_have_product_in_favorite"> Sorry, you have no products to display. </p>';
              }
            wp_reset_postdata(); ?>
          </ul>
           </div>
        </div>
      </div>
      </div>
  </div>
</div>

<?php
get_footer();
