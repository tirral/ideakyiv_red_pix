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

<?php
$data = get_post_meta( get_the_ID(), 'stock_time_end', true );
$data_pieces = explode(".", $data);
$data_mon = array ('Jan',  'Feb',   'Mar',   'Apr',   'May',   'Jun',   'Jul',   'Aug',   'Sep',   'Oct',   'Nov',   'Dec');
echo '<p> День - ' .  $data_pieces[0] . '<p>';
echo '<p> Месяц - ' .  $data_mon[(intval($data_pieces[1]))-1] . '<p>';
echo '<p> Год - ' .  $data_pieces[2] . '<p>';
?>


<div class="container">
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
 </div>

 <div class="container stock_first_section_wrapper">
   <div class="row stock_first_section" >

      <div class="col-lg-6">
        <img src="<?php echo get_post_meta( get_the_ID(), 'stock_img', true ); ?>" alt="<?php the_title() ?>">
          <p><?php echo get_post_meta( get_the_ID(), 'stock_value', true ); ?></p>
      </div>
     <div class="col-lg-6 stock_first_section_text">

      <h1 class="stock_title"><?php the_title() ?></h1>
      <p class="stock_desc"><?php echo get_post_meta( get_the_ID(), 'stock_header_description', true ); ?></p>

      <p class="end-stok"><?php echo get_post_meta( get_the_ID(), 'stock_time_end', true ); ?></p>


      <p class="stok-timet_title">До конца акции осталось:</p>


        <div class="countdown countdown-container container">
            <div class="clock row">
                <div class="clock-item clock-days countdown-time-value col-sm-6 col-md-3">
                    <div class="wrap">
                        <div class="inner">
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
   <div class="row">
     <div class="col-lg-12 favorite_product_wrapper">
           <div id="woocommerce_ordering" class="product_category_before_loop_function_wrapper">
             <div class="filter_btn"></div>
             <form class="woocommerce-ordering" method="get" style="display: block;">
                 <span class="woocommerce_ordering_text"><?php pll_e('SORT BY'); ?></span>
                 <select name="orderby" class="orderby" aria-label="Shop-Bestellung">
                           <option value="menu_order" selected="selected">Standardsortierung</option>
                           <option value="popularity" style="display:none">Nach Beliebtheit sortiert</option>
                           <option value="rating" style="display:none">Nach Durchschnittsbewertung sortiert</option>
                           <option value="date" style="display:none">Sortieren nach neuesten</option>
                           <option value="price">Nach Preis sortiert: niedrig zu hoch</option>
                           <option value="price-desc">Nach Preis sortiert: hoch zu niedrig</option>
                       </select>
                 <input type="hidden" name="paged" value="1">
                   </form>
             <div class="cart_wariant_wrapper">
               <div class="cart_wariant_container">
                 <div class="cart_wariant_container_text"><?php pll_e('View'); ?></div>
                 <div class="cart_wariant_container_variant_line"></div>
                 <div class="cart_wariant_container_variant_block"></div>
               </div>
             </div>
           </div>

           <div class="favorits_product_line_container main_product_container">


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
       </div>
     </div>
   </div>
 </div>
 <?php
 endwhile; // End of the loop.
 ?>
 <?php
 get_footer();
?>
