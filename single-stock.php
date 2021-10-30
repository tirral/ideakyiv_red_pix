<?php
/**
 * The template for displaying all single stock
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ideakyiv
 */
get_header();
?>

<?php
while ( have_posts() ) :
  the_post(); ?>
<div class="work_area">


<?php
$data = get_post_meta( get_the_ID(), 'stock_time_end', true );
$data_pieces = explode(".", $data);
$data_mon = array ('Jan',  'Feb',   'Mar',   'Apr',   'May',   'Jun',   'Jul',   'Aug',   'Sep',   'Oct',   'Nov',   'Dec');
echo '<p class="stok_date_day">' .  $data_pieces[0] . '<p>';
echo '<p class="stok_date_month">' .  $data_mon[(intval($data_pieces[1]))-1] . '<p>';
echo '<p class="stok_date_year">' .  $data_pieces[2] . '<p>';
?>
</div>

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
           <span class="kb_title" itemprop="name">Stock</span>
           <meta itemprop="position" content="3">
         </span>
     </div>
   </div>


   <div class="row home_page_main_wrapper">
    <div class="col-lg-12 ">

 <div class="container">
   <div class="row stock_first_section" >
      <div class="col-lg-6 stok_left">
        <img class="stok_img" src="<?php echo get_post_meta( get_the_ID(), 'stock_img', true ); ?>" alt="<?php the_title() ?>">
        <div class="stok_round">
          <p class="stok_round_title">СКИДКА</p>
          <p class="stok_round_num"><?php echo get_post_meta( get_the_ID(), 'stock_value', true ); ?>%</p>
        </div>
      </div>
     <div class="col-lg-6 stock_first_section_text stok_right">
      <h1 class="stock_title"><?php the_title() ?></h1>
      <p class="stock_desc"><?php echo get_post_meta( get_the_ID(), 'stock_header_description', true ); ?></p>
      <p class="end-stok"><?php echo get_post_meta( get_the_ID(), 'stock_time_end', true ); ?></p>
      <p class="stok-timet_title">До конца акции осталось:</p>
        <div class="countdown countdown-container container">

            <div class="clock row">

                <div class="clock-item clock-days countdown-time-value col-sm-6 col-md-3">
                    <div class="wrap">
                        <div class="inner">
                            <div id="canvas-way-days" class="clock-canvas-way"></div>
                            <div id="canvas-days" class="clock-canvas"></div>

                            <div class="text">
                                <p class="val">0</p>
                                <p class="type-days type-time">DAYS</p>
                            </div><!-- /.text -->
                        </div><!-- /.inner -->
                    </div><!-- /.wrap -->
                </div><!-- /.clock-item -->

                <div class="clock-item clock-hours countdown-time-value col-sm-6 col-md-3">
                    <div class="wrap">
                        <div class="inner">
                            <div id="canvas-way-hours" class="clock-canvas-way"></div>
                            <div id="canvas-hours" class="clock-canvas"></div>

                            <div class="text">
                                <p class="val">0</p>
                                <p class="type-hours type-time">HOURS</p>
                            </div><!-- /.text -->
                        </div><!-- /.inner -->
                    </div><!-- /.wrap -->
                </div><!-- /.clock-item -->

                <div class="clock-item clock-minutes countdown-time-value col-sm-6 col-md-3">
                    <div class="wrap">
                        <div class="inner">
                            <div id="canvas-way-minutes" class="clock-canvas-way"></div>
                            <div id="canvas-minutes" class="clock-canvas"></div>

                            <div class="text">
                                <p class="val">0</p>
                                <p class="type-minutes type-time">MINUTES</p>
                            </div><!-- /.text -->
                        </div><!-- /.inner -->
                    </div><!-- /.wrap -->
                </div><!-- /.clock-item -->

                <div class="clock-item clock-seconds countdown-time-value col-sm-6 col-md-3">
                    <div class="wrap">
                        <div class="inner">
                            <div id="canvas-seconds" class="clock-canvas"></div>
                            <div id="canvas-way-seconds" class="clock-canvas-way"></div>

                            <div class="text">
                                <p class="val">0</p>
                                <p class="type-seconds type-time">SECONDS</p>
                            </div><!-- /.text -->
                        </div><!-- /.inner -->
                    </div><!-- /.wrap -->
                </div><!-- /.clock-item -->

            </div><!-- /.clock -->
        </div><!-- /.countdown-wrapper -->
     </div>
   </div>
 </div>


   <div class="row">
     <div class="col-lg-12 favorite_product_wrapper">
      
       <div id="woocommerce_ordering" class="product_category_before_loop_function_wrapper">
         <div id="custom_top_filter_select">
           <div id="custom_top_filter_select_text"><?php pll_e('SORT BY'); ?></div>
           <div id="custom_top_filter_select_body">
             <div id="custom_top_filter_select_body_wrapper" >
               <div class="custom_top_filter_select_body_wrapper_container">
                 <div id="custom_top_filter_select_body_title">Standardsortierung</div>
                 <ul id="custom_top_filter_select_body_item_wrapper">
                   <li>
                     <a href="<?php echo  get_permalink()?>">Standardsortierung</a>
                   </li>
                   <li>
                     <a href="<?php echo  get_permalink()?>?orderby=price">Niedrig zu hoch</a>
                   </li>
                   <li>
                     <a href="<?php echo  get_permalink()?>?orderby=price-desc">Hoch zu niedrig</a>
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

       <div class="row">
         <div class="col-lg-12 favorite_product_wrapper">

             <?php
              // GET A LIST OF ALL PRODUCTS WITH THIS PROMOTION START
               $stock_id =  get_the_ID();
               $products_stock_id = array();
               $args_1 = array(
                 'order' => 'DESC',
                 'post_status' => 'publish',
                 'post_type' => 'product',
                 'posts_per_page' => -1,
               );
               $loop = new WP_Query( $args_1);
               if ( $loop->have_posts() ) {
                 while ( $loop->have_posts() ) : $loop->the_post();
                   $attached = get_post_meta( get_the_ID(), 'attached_stock', true );
                   if(!empty($attached) AND $attached[0] == $stock_id){
                     array_push($products_stock_id, get_the_ID());
                   }
                  endwhile;
               }
               wp_reset_postdata();
               // GET A LIST OF ALL PRODUCTS WITH THIS PROMOTION END

            if(!empty($products_stock_id)){
             $sorting_order = $_GET['orderby'];
             if($sorting_order == 'price'){
               $args = array(
                 'order' => 'DESC',
                 'post_status' => 'publish',
                 'lang' => '',
                 'post_type' => 'product',
                 'post__in' => $products_stock_id,
                 'orderby' => 'meta_value_num',
                 'meta_key' => '_price',
                 'order' => 'asc',
               );
              } elseif($sorting_order == 'price-desc'){
               $args = array(
                 'order' => 'DESC',
                 'post_status' => 'publish',
                 'lang' => '',
                 'post_type' => 'product',
                 'post__in' => $products_stock_id,
                 'orderby' => 'meta_value_num',
                 'meta_key' => '_price',
                 'order' => 'desc',
               );
             } else{
               $args = array(
                 'order' => 'DESC',
                 'post_status' => 'publish',
                 'post_type' => 'product',
                 'post__in' => $products_stock_id,
               ); } ?>

              <div class="main_product_container">
                <ul class="products columns-4">
                <?php
                  $loop = new WP_Query( $args);
                  if ( $loop->have_posts() ) {
                  while ( $loop->have_posts() ) : $loop->the_post();
                  wc_get_template_part( 'content', 'product' );
                  endwhile;
                  }
                  wp_reset_postdata();
                  } else {
                  echo '<p class="not_have_product_in_favorite"> Sorry, you have no products to display. </p>';
                  } ?>
                </ul>
              </div>
     </div>
   </div>
 </div>
</div>
 </div>
</div>
</div>

 <?php endwhile;  ?>


 <style media="screen">
   .star-rating{
     display: none;
   }
 </style>

 <?php
 get_footer();
?>
