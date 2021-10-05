<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;
get_header();

$queried_object = get_queried_object();

// echo '<pre>';
// print_r($queried_object);
// echo '</pre>';


$terms = get_the_terms( $queried_object->ID, 'product_cat' );
foreach ($terms as $term) {
    $term_b_name =  $product_cat_id = $term->name;
		$term_b_slug =  $product_cat_id = $term->slug;
}
?>

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
           <span itemprop="item">
             <span class="kb_title"><?php pll_e('Категории'); ?></span>
           <meta itemprop="position" content="2">
         </span>
         </span>
         <span class="kb_sep"></span>
         <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
           <span class="kb_title" itemprop="name"><?php echo $queried_object->name; ?></span>
           <meta itemprop="position" content="3">
         </span>
     </div>
   </div>

  <div class="row">
    <div class="col-lg-12">
<?php

    if(isset($_GET['product_color'])) {
        $product_color_val = $_GET['product_color'];
    } else {
        $product_color_val = 'not_set';
    }
    if(isset($_GET['product_width_range'])) {
        $product_width_range = $_GET['product_width_range'];
    } else {
        $product_width_range = 'not_set';
    }
    if(isset($_GET['product_height_range'])) {
        $product_height_range = $_GET['product_height_range'];
    } else {
        $product_height_range = 'not_set';
    }
    if(isset($_GET['product_depth_range'])) {
        $product_depth_range = $_GET['product_depth_range'];
    } else {
        $product_depth_range = 'not_set';
    }
    if(isset($_GET['product_price_lower'])) {
        $product_price_lower = $_GET['product_price_lower'];
    } else {
        $product_price_lower = 'not_set';
    }
    if(isset($_GET['product_price_upper'])) {
        $product_price_upper = $_GET['product_price_upper'];
    } else {
        $product_price_upper = 'not_set';
    }  ?>
    </div>
  </div>

  <div class="row home_page_main_wrapper">
    <div class="col-lg-2 filter_wrap">
      <?php  get_template_part( 'template-parts/content', 'archive_product_sitebar'); ?>
    </div>
    <div class="col-lg-10 main_product_container">
      <div id="woocommerce_ordering" class="product_category_before_loop_function_wrapper">
        <div id="custom_top_filter_select">
          <div id="custom_top_filter_select_text"><?php pll_e('SORT BY'); ?></div>
          <div id="custom_top_filter_select_body">
            <div id="custom_top_filter_select_body_wrapper" >
              <div class="custom_top_filter_select_body_wrapper_container">
                <div id="custom_top_filter_select_body_title">Standardsortierung</div>
                <ul id="custom_top_filter_select_body_item_wrapper">
                  <li>
                    <a href="<?php echo get_site_url();?>/product-category/<?php echo $term_b_slug ?>/">Standardsortierung</a>
                  </li>
                  <li>
                    <a href="<?php echo get_site_url();?>/product-category/<?php echo $term_b_slug ?>/?orderby=price">Nach Preis sortiert: niedrig zu hoch</a>
                  </li>
                  <li>
                    <a href="<?php echo get_site_url();?>/product-category/<?php echo $term_b_slug ?>/?orderby=price-desc">Nach Preis sortiert: hoch zu niedrig</a>
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

      <?php
          $term = get_queried_object();
          $children = get_terms( $term->taxonomy, array(
              'parent'    => $term->term_id,
              'hide_empty' => false
          ));
          echo '<ul id="children_taxonomy_wrapper">';
          if ( $children) {
              foreach( $children as $subcat ){
                  echo '<li class="children_taxonomy_wrapper_item" ><a href="' . esc_url(get_term_link($subcat, $subcat->taxonomy)) . '">' . $subcat->name . '</a></li>';
              }
          }
          echo '</ul>'; ?>

      <ul class="products columns-4">
          <?php
        $current_page = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;

        if(isset($_GET['orderby'])) {
            $sorting_order = $_GET['orderby'];

// =============================================================================
//                      PARAMETERS FOR SORT BY PRICE START
// =============================================================================
        $sorting_order = $_GET['orderby'];
          if($sorting_order == 'price'){

            $params = array(
              'order' => 'DESC',
              'posts_per_page' => 3,
              'post_type' => 'product',
              'paged' => $current_page,
              'tax_query' => array(
                array(
                  'taxonomy' => 'product_cat',
                  'terms' => $term_b_slug,
                  'field' => 'slug',
                  'include_children' => true,
                  'operator' => 'IN'
                 ) ),
                 'orderby' => 'meta_value_num',
                 'meta_key' => '_price',
                 'order' => 'asc',
               );

              } elseif ($sorting_order == 'price-desc'){

                $params = array(
                  'order' => 'DESC',
                  'posts_per_page' => 3,
                  'post_type' => 'product',
                  'paged' => $current_page,
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'product_cat',
                      'terms' => $term_b_slug,
                      'field' => 'slug',
                      'include_children' => true,
                      'operator' => 'IN'
                     ) ),
                     'orderby' => 'meta_value_num',
                     'meta_key' => '_price',
                     'order' => 'desc',
                   );
               } else {
                 $params = array(
                   'order' => 'DESC',
                   'posts_per_page' => 3,
                   'post_type' => 'product',
                   'paged' => $current_page,
                   'tax_query' => array(
                     array(
                       'taxonomy' => 'product_cat',
                       'terms' => $term_b_slug,
                       'field' => 'slug',
                       'include_children' => true,
                       'operator' => 'IN'
                      ) ),
                    );
          }
// =============================================================================
//                      PARAMETERS FOR SORT BY PRICE END
// =============================================================================
} else {

// =============================================================================
//                      MAIN PARAMETERS FOR LOOP START
// =============================================================================

// FILTER ONLY BY CATEGORY
if ($product_color_val == 'not_set' AND $product_width_range == 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper == 'not_set'){
  // echo '// FILTER ONLY BY CATEGORY --- ';
  // echo $term_b_slug;
  $params = array(
    'order' => 'ASC',
    'posts_per_page' => 3,
    'post_type' => 'product',
    'paged' => $current_page,
    'tax_query' => array(
      array(
        'taxonomy' => 'product_cat',
        'terms' => $term_b_slug,
        'field' => 'slug',
        'include_children' => true,
        'operator' => 'IN'
       ) ),
     );
}


// FILTER BY CATEGORY AND COLOR
if ($product_color_val !='not_set' AND $product_width_range == 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper == 'not_set'){
  // echo '// FILTER BY CATEGORY AND COLOR';
  // echo '  -- PRODUCT COLOR - ' . $product_color_val;
  $params = array(
    'order' => 'ASC',
    'posts_per_page' => 3,
    'post_type' => 'product',
    'paged' => $current_page,
    'tax_query' => array(
      array(
        'taxonomy' => 'product_cat',
        'terms' => $term_b_slug,
        'field' => 'slug',
        'include_children' => true,
        'operator' => 'IN'
      ),
      array(
      'taxonomy'      => 'pa_color',
      'field'         => 'slug',
      'terms'         => $product_color_val,
      'operator'      => 'IN'
   ),
  ),
);
}

// FILTER  BY CATEGORY AND  WIDTH
if ($product_color_val =='not_set' AND $product_width_range != 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper == 'not_set'){
  // echo '// FILTER  BY CATEGORY AND  WIDTH';
  // echo '  -- WIDTH-- ' . $product_width_range;
  $params = array(
    'order' => 'ASC',
    'posts_per_page' => 3,
    'post_type' => 'product',
    'paged' => $current_page,
    'tax_query' => array(
      array(
        'taxonomy' => 'product_cat',
        'terms' => $term_b_slug,
        'field' => 'slug',
        'include_children' => true,
        'operator' => 'IN'
      ),
     ),
      'meta_query' => array(
       array(
      'key' => '_width',
      'value' => $product_width_range,
      'compare' => '<=',
      ),
      )
    );
 }

 // FILTER  BY CATEGORY AND  WIDTH AND PRICE LOW
 if ($product_color_val =='not_set' AND $product_width_range != 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper == 'not_set'){
   // echo '// FILTER  BY CATEGORY AND  WIDTH AND PRICE LOW';
   // echo '  -- WIDTH-- ' . $product_width_range;
   // echo '--- LOW PRICE --- ' . $product_price_lower;
   $params = array(
     'order' => 'ASC',
     'posts_per_page' => 3,
     'post_type' => 'product',
     'paged' => $current_page,
     'tax_query' => array(
       array(
         'taxonomy' => 'product_cat',
         'terms' => $term_b_slug,
         'field' => 'slug',
         'include_children' => true,
         'operator' => 'IN'
       ),
      ),
       'meta_query' => array(
        array(
       'key' => '_width',
       'value' => $product_width_range,
       'compare' => '<=',
       ),
        array(
        'key' => '_price',
        'value' => $product_price_lower,
        'compare' => '>=',
        'type' => 'NUMERIC'
        )
       )
     );
  }

  // FILTER  BY CATEGORY AND  WIDTH AND PRICE UPPER
  if ($product_color_val =='not_set' AND $product_width_range != 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper != 'not_set'){
    // echo '// FILTER  BY CATEGORY AND  WIDTH AND PRICE UPPER';
    // echo '  -- WIDTH-- ' . $product_width_range;
    // echo '--- UPPER PRICE --- ' . $product_price_upper;
    $params = array(
      'order' => 'ASC',
      'posts_per_page' => 3,
      'post_type' => 'product',
      'paged' => $current_page,
      'tax_query' => array(
        array(
          'taxonomy' => 'product_cat',
          'terms' => $term_b_slug,
          'field' => 'slug',
          'include_children' => true,
          'operator' => 'IN'
        ),
       ),
        'meta_query' => array(
         array(
        'key' => '_width',
        'value' => $product_width_range,
        'compare' => '<=',
        ),
         array(
           'key' => '_price',
           'value' => $product_price_upper,
           'compare' => '<=',
           'type' => 'NUMERIC'
         )
        )
      );
   }

   // FILTER  BY CATEGORY AND  WIDTH AND PRICE LOW AND PRICE UPPER
   if ($product_color_val =='not_set' AND $product_width_range != 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper != 'not_set'){
     // echo '// FILTER  BY CATEGORY AND  WIDTH AND PRICE LOW AND PRICE UPPER';
     // echo '  -- WIDTH-- ' . $product_width_range;
     // echo '--- LOW PRICE --- ' . $product_price_lower;
     // echo '--- UPPER PRICE --- ' . $product_price_upper;
     $params = array(
       'order' => 'ASC',
       'posts_per_page' => 3,
       'post_type' => 'product',
       'paged' => $current_page,
       'tax_query' => array(
         array(
           'taxonomy' => 'product_cat',
           'terms' => $term_b_slug,
           'field' => 'slug',
           'include_children' => true,
           'operator' => 'IN'
         ),
        ),
         'meta_query' => array(
          array(
         'key' => '_width',
         'value' => $product_width_range,
         'compare' => '<=',
         ),
          array(
            'key' => '_price',
            'value' => array($product_price_lower, $product_price_upper),
            'compare' => 'BETWEEN',
            'type' => 'NUMERIC'
          )
         )
       );
    }


 // FILTER  BY CATEGORY AND  HEIGHT
 if ($product_color_val =='not_set' AND $product_width_range == 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper == 'not_set'){
   // echo '// FILTER  BY CATEGORY AND  HEIGHT';
   // echo '  -- HEIGHT-- ' . $product_height_range;
   $params = array(
     'order' => 'ASC',
     'posts_per_page' => 3,
     'post_type' => 'product',
     'paged' => $current_page,
     'tax_query' => array(
       array(
         'taxonomy' => 'product_cat',
         'terms' => $term_b_slug,
         'field' => 'slug',
         'include_children' => true,
         'operator' => 'IN'
       ),
      ),
       'meta_query' => array(
        array(
       'key' => '_height',
       'value' => $product_height_range,
       'compare' => '<=',
       ),
       )
   );
  }

  // FILTER  BY CATEGORY AND  HEIGHT AND PRICE LOW
  if ($product_color_val =='not_set' AND $product_width_range == 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper == 'not_set'){
    // echo '// FILTER  BY CATEGORY AND  HEIGHT';
    // echo '  -- HEIGHT-- ' . $product_height_range;
    // echo '--- LOW PRICE --- ' . $product_price_lower;
    $params = array(
      'order' => 'ASC',
      'posts_per_page' => 3,
      'post_type' => 'product',
      'paged' => $current_page,
      'tax_query' => array(
        array(
          'taxonomy' => 'product_cat',
          'terms' => $term_b_slug,
          'field' => 'slug',
          'include_children' => true,
          'operator' => 'IN'
        ),
       ),
        'meta_query' => array(
         array(
        'key' => '_height',
        'value' => $product_height_range,
        'compare' => '<=',
        ),
        array(
        'key' => '_price',
        'value' => $product_price_lower,
        'compare' => '>=',
        'type' => 'NUMERIC'
        )
        )
    );
   }

   // FILTER  BY CATEGORY AND  HEIGHT AND PRICE UPPER
   if ($product_color_val =='not_set' AND $product_width_range == 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper != 'not_set'){
     // echo '// FILTER  BY CATEGORY AND  HEIGHT AND PRICE UPPER';
     // echo '  -- HEIGHT-- ' . $product_height_range;
     // echo '--- UPPER PRICE --- ' . $product_price_upper;
     $params = array(
       'order' => 'ASC',
       'posts_per_page' => 3,
       'post_type' => 'product',
       'paged' => $current_page,
       'tax_query' => array(
         array(
           'taxonomy' => 'product_cat',
           'terms' => $term_b_slug,
           'field' => 'slug',
           'include_children' => true,
           'operator' => 'IN'
         ),
        ),
         'meta_query' => array(
          array(
         'key' => '_height',
         'value' => $product_height_range,
         'compare' => '<=',
         ),
         array(
           'key' => '_price',
           'value' => $product_price_upper,
           'compare' => '<=',
           'type' => 'NUMERIC'
         )
         )
     );
    }

    // FILTER  BY CATEGORY AND  HEIGHT AND PRICE LOW AND PRICE UPPER
    if ($product_color_val =='not_set' AND $product_width_range == 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper != 'not_set'){
      // echo '// FILTER  BY CATEGORY AND  HEIGHT AND PRICE LOW AND PRICE UPPER';
      // echo '  -- HEIGHT-- ' . $product_height_range;
      // echo '--- LOW PRICE --- ' . $product_price_lower;
      // echo '--- UPPER PRICE --- ' . $product_price_upper;
      $params = array(
        'order' => 'ASC',
        'posts_per_page' => 3,
        'post_type' => 'product',
        'paged' => $current_page,
        'tax_query' => array(
          array(
            'taxonomy' => 'product_cat',
            'terms' => $term_b_slug,
            'field' => 'slug',
            'include_children' => true,
            'operator' => 'IN'
          ),
         ),
          'meta_query' => array(
           array(
          'key' => '_height',
          'value' => $product_height_range,
          'compare' => '<=',
          ),
          array(
            'key' => '_price',
            'value' => array($product_price_lower, $product_price_upper),
            'compare' => 'BETWEEN',
            'type' => 'NUMERIC'
          )
          )
      );
     }


  // FILTER  BY CATEGORY AND LENGHT
  if ($product_color_val =='not_set' AND $product_width_range == 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range != 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper == 'not_set'){
    // echo '// FILTER  BY CATEGORY AND LENGHT';
    // echo '  -- LENGHT-- ' . $product_depth_range;
    $params = array(
      'order' => 'ASC',
      'posts_per_page' => 3,
      'post_type' => 'product',
      'paged' => $current_page,
      'tax_query' => array(
        array(
          'taxonomy' => 'product_cat',
          'terms' => $term_b_slug,
          'field' => 'slug',
          'include_children' => true,
          'operator' => 'IN'
        ),
       ),
        'meta_query' => array(
         array(
        'key' => '_length',
        'value' => $product_depth_range,
        'compare' => '<=',
        ),
        )
    );
   }


   // FILTER  BY CATEGORY AND LENGHT AND PRICE LOW
   if ($product_color_val =='not_set' AND $product_width_range == 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range != 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper == 'not_set'){
     // echo '// FILTER  BY CATEGORY AND LENGHT AND PRICE LOW';
     // echo '  -- LENGHT-- ' . $product_depth_range;
     // echo '--- LOW PRICE --- ' . $product_price_lower;
     $params = array(
       'order' => 'ASC',
       'posts_per_page' => 3,
       'post_type' => 'product',
       'paged' => $current_page,
       'tax_query' => array(
         array(
           'taxonomy' => 'product_cat',
           'terms' => $term_b_slug,
           'field' => 'slug',
           'include_children' => true,
           'operator' => 'IN'
         ),
        ),
         'meta_query' => array(
          array(
         'key' => '_length',
         'value' => $product_depth_range,
         'compare' => '<=',
         ),
         array(
          'key' => '_price',
          'value' => $product_price_lower,
          'compare' => '>=',
          'type' => 'NUMERIC'
          ),
         )
     );
    }


    // FILTER  BY CATEGORY AND LENGHT AND PRICE UPPER
    if ($product_color_val =='not_set' AND $product_width_range == 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range != 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper != 'not_set'){
      // echo '// FILTER  BY CATEGORY AND LENGHT AND PRICE UPPER';
      // echo '  -- LENGHT-- ' . $product_depth_range;
      // echo '--- UPPER PRICE --- ' . $product_price_upper;
      $params = array(
        'order' => 'ASC',
        'posts_per_page' => 3,
        'post_type' => 'product',
        'paged' => $current_page,
        'tax_query' => array(
          array(
            'taxonomy' => 'product_cat',
            'terms' => $term_b_slug,
            'field' => 'slug',
            'include_children' => true,
            'operator' => 'IN'
          ),
         ),
          'meta_query' => array(
           array(
          'key' => '_length',
          'value' => $product_depth_range,
          'compare' => '<=',
          ),
          array(
            'key' => '_price',
            'value' => $product_price_upper,
            'compare' => '<=',
            'type' => 'NUMERIC'
           ),
          )
       );
     }

     // FILTER BY CATEGORY AND LENGHT AND PRICE LOW AND PRICE UPPER
     if ($product_color_val =='not_set' AND $product_width_range == 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range != 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper != 'not_set'){
       // echo '// FILTER BY CATEGORY AND LENGHT AND PRICE LOW AND PRICE UPPER';
       // echo '  -- LENGHT-- ' . $product_depth_range;
       // echo '--- LOW PRICE --- ' . $product_price_lower;
       // echo '--- UPPER PRICE --- ' . $product_price_upper;
       $params = array(
         'order' => 'ASC',
         'posts_per_page' => 3,
         'post_type' => 'product',
         'paged' => $current_page,
         'tax_query' => array(
           array(
             'taxonomy' => 'product_cat',
             'terms' => $term_b_slug,
             'field' => 'slug',
             'include_children' => true,
             'operator' => 'IN'
           ),
          ),
           'meta_query' => array(
            array(
           'key' => '_length',
           'value' => $product_depth_range,
           'compare' => '<=',
           ),
           array(
             'key' => '_price',
             'value' => array($product_price_lower, $product_price_upper),
             'compare' => 'BETWEEN',
             'type' => 'NUMERIC'
            ),
           )
       );
      }

   // FILTER  BY CATEGORY AND  WIDTH  AND  HEIGHT
   if ($product_color_val =='not_set' AND $product_width_range != 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper == 'not_set'){
     // echo '// FILTER  BY CATEGORY AND  WIDTH  AND  HEIGHT';
     // echo '  -- WIDTH-- ' . $product_width_range;
     // echo '  -- HEIGHT-- ' . $product_height_range;
     $params = array(
       'order' => 'ASC',
       'posts_per_page' => 3,
       'post_type' => 'product',
       'paged' => $current_page,
       'tax_query' => array(
         array(
           'taxonomy' => 'product_cat',
           'terms' => $term_b_slug,
           'field' => 'slug',
           'include_children' => true,
           'operator' => 'IN'
         ),
        ),
         'meta_query' => array(
          'relation' => 'AND',
          array(
         'key' => '_width',
         'value' => $product_width_range,
         'compare' => '<=',
         ),
         array(
        'key' => '_height',
        'value' => $product_height_range,
        'compare' => '<=',
        ),
        )
      );
    }

    // FILTER  BY CATEGORY AND  WIDTH  AND  HEIGHT AND PRICE LOW
    if ($product_color_val =='not_set' AND $product_width_range != 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper == 'not_set'){
      // echo '// FILTER  BY CATEGORY AND  WIDTH  AND  HEIGHT AND PRICE LOW';
      // echo '  -- WIDTH-- ' . $product_width_range;
      // echo '  -- HEIGHT-- ' . $product_height_range;
      // echo '--- LOW PRICE --- ' . $product_price_lower;
      $params = array(
        'order' => 'ASC',
        'posts_per_page' => 3,
        'post_type' => 'product',
        'paged' => $current_page,
        'tax_query' => array(
          array(
            'taxonomy' => 'product_cat',
            'terms' => $term_b_slug,
            'field' => 'slug',
            'include_children' => true,
            'operator' => 'IN'
          ),
         ),
          'meta_query' => array(
           'relation' => 'AND',
           array(
          'key' => '_width',
          'value' => $product_width_range,
          'compare' => '<=',
          ),
          array(
         'key' => '_height',
         'value' => $product_height_range,
         'compare' => '<=',
         ),
         array(
          'key' => '_price',
          'value' => $product_price_lower,
          'compare' => '>=',
          'type' => 'NUMERIC'
          )
         )
      );
     }

     // FILTER  BY CATEGORY AND  WIDTH  AND  HEIGHT AND PRICE UPPER
     if ($product_color_val =='not_set' AND $product_width_range != 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper != 'not_set'){
       // echo '// FILTER  BY CATEGORY AND  WIDTH  AND  HEIGHT AND PRICE UPPER';
       // echo '  -- WIDTH-- ' . $product_width_range;
       // echo '  -- HEIGHT-- ' . $product_height_range;
       // echo '--- UPPER PRICE --- ' . $product_price_upper;
       $params = array(
         'order' => 'ASC',
         'posts_per_page' => 3,
         'post_type' => 'product',
         'paged' => $current_page,
         'tax_query' => array(
           array(
             'taxonomy' => 'product_cat',
             'terms' => $term_b_slug,
             'field' => 'slug',
             'include_children' => true,
             'operator' => 'IN'
           ),
          ),
           'meta_query' => array(
            'relation' => 'AND',
            array(
           'key' => '_width',
           'value' => $product_width_range,
           'compare' => '<=',
           ),
           array(
          'key' => '_height',
          'value' => $product_height_range,
          'compare' => '<=',
          ),
          array(
            'key' => '_price',
            'value' => $product_price_upper,
            'compare' => '<=',
            'type' => 'NUMERIC'
           )
          )
       );
      }

      // FILTER  BY CATEGORY AND  WIDTH  AND  HEIGHT AND PRICE LOW AND PRICE UPPER
      if ($product_color_val =='not_set' AND $product_width_range != 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper != 'not_set'){
        // echo '// FILTER  BY CATEGORY AND  WIDTH  AND  HEIGHT AND PRICE LOW AND PRICE UPPER';
        // echo '  -- WIDTH-- ' . $product_width_range;
        // echo '  -- HEIGHT-- ' . $product_height_range;
        // echo '--- LOW PRICE --- ' . $product_price_lower;
        // echo '--- UPPER PRICE --- ' . $product_price_upper;
        $params = array(
          'order' => 'ASC',
          'posts_per_page' => 3,
          'post_type' => 'product',
          'paged' => $current_page,
          'tax_query' => array(
            array(
              'taxonomy' => 'product_cat',
              'terms' => $term_b_slug,
              'field' => 'slug',
              'include_children' => true,
              'operator' => 'IN'
            ),
           ),
            'meta_query' => array(
             'relation' => 'AND',
             array(
            'key' => '_width',
            'value' => $product_width_range,
            'compare' => '<=',
            ),
            array(
           'key' => '_height',
           'value' => $product_height_range,
           'compare' => '<=',
           ),
           array(
             'key' => '_price',
              'value' => array($product_price_lower, $product_price_upper),
              'compare' => 'BETWEEN',
              'type' => 'NUMERIC'
            )
           )
        );
       }


    // FILTER  BY CATEGORY AND  WIDTH  AND  HEIGHT AND LENGHT
    if ($product_color_val =='not_set' AND $product_width_range != 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range != 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper == 'not_set'){
      // echo '// FILTER  BY CATEGORY AND  WIDTH  AND  HEIGHT AND LENGHT';
      // echo '  -- WIDTH-- ' . $product_width_range;
      // echo '  -- HEIGHT-- ' . $product_height_range;
      // echo '  -- LENGHT-- ' . $product_depth_range;
      $params = array(
        'order' => 'ASC',
        'posts_per_page' => 3,
        'post_type' => 'product',
        'paged' => $current_page,
        'tax_query' => array(
          array(
            'taxonomy' => 'product_cat',
            'terms' => $term_b_slug,
            'field' => 'slug',
            'include_children' => true,
            'operator' => 'IN'
          ),
         ),
          'meta_query' => array(
           'relation' => 'AND',
           array(
          'key' => '_width',
          'value' => $product_width_range,
          'compare' => '<=',
          ),
          array(
         'key' => '_height',
         'value' => $product_height_range,
         'compare' => '<=',
         ),
         'meta_query' => array(
          array(
         'key' => '_length',
         'value' => $product_depth_range,
         'compare' => '<=',
         ),
         )
         )
      );
     }


     // FILTER  BY CATEGORY AND  WIDTH  AND  HEIGHT AND LENGHT AND PRICE LOW
     if ($product_color_val =='not_set' AND $product_width_range != 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range != 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper == 'not_set'){
       // echo '// FILTER  BY CATEGORY AND  WIDTH  AND  HEIGHT AND LENGHT AND PRICE LOW';
       // echo '  -- WIDTH-- ' . $product_width_range;
       // echo '  -- HEIGHT-- ' . $product_height_range;
       // echo '  -- LENGHT-- ' . $product_depth_range;
       // echo '--- LOW PRICE --- ' . $product_price_lower;
       $params = array(
         'order' => 'ASC',
         'posts_per_page' => 3,
         'post_type' => 'product',
         'paged' => $current_page,
         'tax_query' => array(
           array(
             'taxonomy' => 'product_cat',
             'terms' => $term_b_slug,
             'field' => 'slug',
             'include_children' => true,
             'operator' => 'IN'
           ),
          ),
           'meta_query' => array(
            'relation' => 'AND',
            array(
           'key' => '_width',
           'value' => $product_width_range,
           'compare' => '<=',
           ),
           array(
          'key' => '_height',
          'value' => $product_height_range,
          'compare' => '<=',
          ),
          'meta_query' => array(
           array(
          'key' => '_length',
          'value' => $product_depth_range,
          'compare' => '<=',
          ),
          array(
          'key' => '_price',
          'value' => $product_price_lower,
          'compare' => '>=',
          'type' => 'NUMERIC'
          )
          )
          )
       );
      }

      // FILTER  BY CATEGORY AND  WIDTH  AND  HEIGHT AND LENGHT AND PRICE UPPER
      if ($product_color_val =='not_set' AND $product_width_range != 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range != 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper != 'not_set'){
        // echo '// FILTER  BY CATEGORY AND  WIDTH  AND  HEIGHT AND LENGHT AND PRICE UPPER';
        // echo '  -- WIDTH-- ' . $product_width_range;
        // echo '  -- HEIGHT-- ' . $product_height_range;
        // echo '  -- LENGHT-- ' . $product_depth_range;
        // echo '--- UPPER PRICE --- ' . $product_price_upper;
        $params = array(
          'order' => 'ASC',
          'posts_per_page' => 3,
          'post_type' => 'product',
          'paged' => $current_page,
          'tax_query' => array(
            array(
              'taxonomy' => 'product_cat',
              'terms' => $term_b_slug,
              'field' => 'slug',
              'include_children' => true,
              'operator' => 'IN'
            ),
           ),
            'meta_query' => array(
             'relation' => 'AND',
             array(
            'key' => '_width',
            'value' => $product_width_range,
            'compare' => '<=',
            ),
            array(
           'key' => '_height',
           'value' => $product_height_range,
           'compare' => '<=',
           ),
           'meta_query' => array(
            array(
           'key' => '_length',
           'value' => $product_depth_range,
           'compare' => '<=',
           ),
           array(
             'key' => '_price',
             'value' => $product_price_upper,
             'compare' => '<=',
             'type' => 'NUMERIC'
           )
           )
           )
        );
       }

       // FILTER  BY CATEGORY AND  WIDTH  AND  HEIGHT AND LENGHT AND PRICE LOW AND PRICE UPPER
       if ($product_color_val =='not_set' AND $product_width_range != 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range != 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper != 'not_set'){
         // echo '// FILTER  BY CATEGORY AND  WIDTH  AND  HEIGHT AND LENGHT AND PRICE UPPER';
         // echo '  -- WIDTH-- ' . $product_width_range;
         // echo '  -- HEIGHT-- ' . $product_height_range;
         // echo '  -- LENGHT-- ' . $product_depth_range;
         // echo '--- LOW PRICE --- ' . $product_price_lower;
         // echo '--- UPPER PRICE --- ' . $product_price_upper;
         $params = array(
           'order' => 'ASC',
           'posts_per_page' => 3,
           'post_type' => 'product',
           'paged' => $current_page,
           'tax_query' => array(
             array(
               'taxonomy' => 'product_cat',
               'terms' => $term_b_slug,
               'field' => 'slug',
               'include_children' => true,
               'operator' => 'IN'
             ),
            ),
             'meta_query' => array(
              'relation' => 'AND',
              array(
             'key' => '_width',
             'value' => $product_width_range,
             'compare' => '<=',
             ),
             array(
            'key' => '_height',
            'value' => $product_height_range,
            'compare' => '<=',
            ),
            'meta_query' => array(
             array(
            'key' => '_length',
            'value' => $product_depth_range,
            'compare' => '<=',
            ),
            array(
              'key' => '_price',
              'value' => array($product_price_lower, $product_price_upper),
              'compare' => 'BETWEEN',
              'type' => 'NUMERIC'
            )
            )
            )
         );
        }

  // FILTER BY CATEGORY AND COLOR AND WIDTH
   if ($product_color_val !='not_set' AND $product_width_range != 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper == 'not_set'){
     // echo '// FILTER BY CATEGORY AND COLOR AND  WIDTH';
     // echo '  -- PRODUCT COLOR - ' . $product_color_val;
     // echo '  -- WIDTH-- ' . $product_width_range;
     $params = array(
       'order' => 'ASC',
       'posts_per_page' => 3,
       'post_type' => 'product',
       'paged' => $current_page,
       'tax_query' => array(
         array(
           'taxonomy' => 'product_cat',
           'terms' => $term_b_slug,
           'field' => 'slug',
           'include_children' => true,
           'operator' => 'IN'
         ),
         array(
         'taxonomy'      => 'pa_color',
         'field'         => 'slug',
         'terms'         => $product_color_val,
         'operator'      => 'IN'
      ),
     ),
       'meta_query' => array(
        array(
       'key' => '_width',
       'value' => $product_width_range,
       'compare' => '<=',
       ),
       )
     );
   }

   // FILTER BY CATEGORY AND COLOR AND WIDTH AND PRICE LOW
    if ($product_color_val !='not_set' AND $product_width_range != 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper == 'not_set'){
      // echo '// FILTER BY CATEGORY AND COLOR AND WIDTH AND PRICE LOW';
      // echo '  -- PRODUCT COLOR - ' . $product_color_val;
      // echo '  -- WIDTH-- ' . $product_width_range;
      // echo '--- LOW PRICE --- ' . $product_price_lower;
      $params = array(
        'order' => 'ASC',
        'posts_per_page' => 3,
        'post_type' => 'product',
        'paged' => $current_page,
        'tax_query' => array(
          array(
            'taxonomy' => 'product_cat',
            'terms' => $term_b_slug,
            'field' => 'slug',
            'include_children' => true,
            'operator' => 'IN'
          ),
          array(
          'taxonomy'      => 'pa_color',
          'field'         => 'slug',
          'terms'         => $product_color_val,
          'operator'      => 'IN'
       ),
      ),
        'meta_query' => array(
         array(
        'key' => '_width',
        'value' => $product_width_range,
        'compare' => '<=',
        ),
        array(
        'key' => '_price',
        'value' => $product_price_lower,
        'compare' => '>=',
        'type' => 'NUMERIC'
        )
        )
      );
    }

    // FILTER BY CATEGORY AND COLOR AND WIDTH AND PRICE UPPER
     if ($product_color_val !='not_set' AND $product_width_range != 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper != 'not_set'){
      //  echo '// FILTER BY CATEGORY AND COLOR AND WIDTH AND PRICE UPPER';
      //  echo '  -- PRODUCT COLOR - ' . $product_color_val;
      //  echo '  -- WIDTH-- ' . $product_width_range;
      // echo '--- UPPER PRICE --- ' . $product_price_upper;
       $params = array(
         'order' => 'ASC',
         'posts_per_page' => 3,
         'post_type' => 'product',
         'paged' => $current_page,
         'tax_query' => array(
           array(
             'taxonomy' => 'product_cat',
             'terms' => $term_b_slug,
             'field' => 'slug',
             'include_children' => true,
             'operator' => 'IN'
           ),
           array(
           'taxonomy'      => 'pa_color',
           'field'         => 'slug',
           'terms'         => $product_color_val,
           'operator'      => 'IN'
        ),
       ),
         'meta_query' => array(
          array(
         'key' => '_width',
         'value' => $product_width_range,
         'compare' => '<=',
         ),
         array(
         'key' => '_price',
         'value' => $product_price_upper,
         'compare' => '>=',
         'type' => 'NUMERIC'
         )
         )
       );
     }


     // FILTER BY CATEGORY AND COLOR AND WIDTH PRICE LOW AND PRICE UPPER
      if ($product_color_val !='not_set' AND $product_width_range != 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper != 'not_set'){
        // echo '// FILTER BY CATEGORY AND COLOR AND WIDTH PRICE LOW AND PRICE UPPER';
        // echo '  -- PRODUCT COLOR - ' . $product_color_val;
        // echo '  -- WIDTH-- ' . $product_width_range;
        // echo '--- LOW PRICE --- ' . $product_price_lower;
        // echo '--- UPPER PRICE --- ' . $product_price_upper;
        $params = array(
          'order' => 'ASC',
          'posts_per_page' => 3,
          'post_type' => 'product',
          'paged' => $current_page,
          'tax_query' => array(
            array(
              'taxonomy' => 'product_cat',
              'terms' => $term_b_slug,
              'field' => 'slug',
              'include_children' => true,
              'operator' => 'IN'
            ),
            array(
            'taxonomy'      => 'pa_color',
            'field'         => 'slug',
            'terms'         => $product_color_val,
            'operator'      => 'IN'
         ),
        ),
          'meta_query' => array(
           array(
          'key' => '_width',
          'value' => $product_width_range,
          'compare' => '<=',
          ),
          array(
          'key' => '_price',
          'value' => $product_price_upper,
          'compare' => '>=',
          'type' => 'NUMERIC'
          )
          )
        );
      }

   // FILTER BY CATEGORY AND COLOR AND HEIGHT
    if ($product_color_val !='not_set' AND $product_width_range == 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper == 'not_set'){
      // echo '// FILTER BY CATEGORY AND COLOR AND  HEIGHT';
      // echo '  -- PRODUCT COLOR - ' . $product_color_val;
      // echo '  -- HEIGHT-- ' . $product_height_range;
      $params = array(
        'order' => 'ASC',
        'posts_per_page' => 3,
        'post_type' => 'product',
        'paged' => $current_page,
        'tax_query' => array(
          array(
            'taxonomy' => 'product_cat',
            'terms' => $term_b_slug,
            'field' => 'slug',
            'include_children' => true,
            'operator' => 'IN'
          ),
          array(
          'taxonomy'      => 'pa_color',
          'field'         => 'slug',
          'terms'         => $product_color_val,
          'operator'      => 'IN'
       ),
      ),
        'meta_query' => array(
         array(
          'key' => '_height',
          'value' => $product_height_range,
          'compare' => '<=',
        ), )
      );
    }

    // FILTER BY CATEGORY AND COLOR AND HEIGHT AND PRICE LOW
     if ($product_color_val !='not_set' AND $product_width_range == 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper == 'not_set'){
       // echo '// FILTER BY CATEGORY AND COLOR AND HEIGHT AND PRICE LOW';
       // echo '  -- PRODUCT COLOR - ' . $product_color_val;
       // echo '  -- HEIGHT-- ' . $product_height_range;
       // echo '--- LOW PRICE --- ' . $product_price_lower;
       $params = array(
         'order' => 'ASC',
         'posts_per_page' => 3,
         'post_type' => 'product',
         'paged' => $current_page,
         'tax_query' => array(
           array(
             'taxonomy' => 'product_cat',
             'terms' => $term_b_slug,
             'field' => 'slug',
             'include_children' => true,
             'operator' => 'IN'
           ),
           array(
           'taxonomy'      => 'pa_color',
           'field'         => 'slug',
           'terms'         => $product_color_val,
           'operator'      => 'IN'
        ),
       ),
         'meta_query' => array(
          array(
           'key' => '_height',
           'value' => $product_height_range,
           'compare' => '<=',
         ),
         array(
         'key' => '_price',
         'value' => $product_price_lower,
         'compare' => '>=',
         'type' => 'NUMERIC'
        ),)
       );
     }

     // FILTER BY CATEGORY AND COLOR AND HEIGHT AND PRICE UPPER
      if ($product_color_val !='not_set' AND $product_width_range == 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper != 'not_set'){
        // echo '// FILTER BY CATEGORY AND COLOR AND HEIGHT AND PRICE UPPER';
        // echo '  -- PRODUCT COLOR - ' . $product_color_val;
        // echo '  -- HEIGHT-- ' . $product_height_range;
        //  echo '--- UPPER PRICE --- ' . $product_price_upper;
        $params = array(
          'order' => 'ASC',
          'posts_per_page' => 3,
          'post_type' => 'product',
          'paged' => $current_page,
          'tax_query' => array(
            array(
              'taxonomy' => 'product_cat',
              'terms' => $term_b_slug,
              'field' => 'slug',
              'include_children' => true,
              'operator' => 'IN'
             ),
            array(
            'taxonomy'      => 'pa_color',
            'field'         => 'slug',
            'terms'         => $product_color_val,
            'operator'      => 'IN'
            ),
          ),
          'meta_query' => array(
           array(
            'key' => '_height',
            'value' => $product_height_range,
            'compare' => '<=',
          ),
          array(
            'key' => '_price',
             'value' => $product_price_upper,
             'compare' => '<=',
             'type' => 'NUMERIC'
          ),)
        );
      }

      // FILTER BY CATEGORY AND COLOR AND HEIGHT AND PRICE LOW AND PRICE UPPER
       if ($product_color_val !='not_set' AND $product_width_range == 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper != 'not_set'){
         echo '// FILTER BY CATEGORY AND COLOR AND HEIGHT AND PRICE UPPER';
         echo '  -- PRODUCT COLOR - ' . $product_color_val;
         echo '  -- HEIGHT-- ' . $product_height_range;
          echo '--- UPPER PRICE --- ' . $product_price_upper;
          echo '--- LOW PRICE --- ' . $product_price_lower;
         $params = array(
           'order' => 'ASC',
           'posts_per_page' => 3,
           'post_type' => 'product',
           'paged' => $current_page,
           'tax_query' => array(
             array(
               'taxonomy' => 'product_cat',
               'terms' => $term_b_slug,
               'field' => 'slug',
               'include_children' => true,
               'operator' => 'IN'
             ),
             array(
             'taxonomy'      => 'pa_color',
             'field'         => 'slug',
             'terms'         => $product_color_val,
             'operator'      => 'IN'
          ),
         ),
           'meta_query' => array(
            array(
             'key' => '_height',
             'value' => $product_height_range,
             'compare' => '<=',
           ),
           array(
             'key' => '_price',
             'value' => array($product_price_lower, $product_price_upper),
             'compare' => 'BETWEEN',
             'type' => 'NUMERIC'
           ),)
         );
       }

    // FILTER BY CATEGORY AND COLOR AND LENGHT
     if ($product_color_val !='not_set' AND $product_width_range == 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range != 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper == 'not_set'){
       // echo '// FILTER BY CATEGORY AND COLOR AND  LENGHT';
       // echo '  -- PRODUCT COLOR - ' . $product_color_val;
       // echo '  -- LENGHT-- ' . $product_depth_range;
       $params = array(
         'order' => 'ASC',
         'posts_per_page' => 3,
         'post_type' => 'product',
         'paged' => $current_page,
         'tax_query' => array(
           array(
             'taxonomy' => 'product_cat',
             'terms' => $term_b_slug,
             'field' => 'slug',
             'include_children' => true,
             'operator' => 'IN'
           ),
           array(
           'taxonomy'      => 'pa_color',
           'field'         => 'slug',
           'terms'         => $product_color_val,
           'operator'      => 'IN'
        ),
       ),
         'meta_query' => array(
          array(
         'key' => '_length',
         'value' => $product_depth_range,
         'compare' => '<=',
         ),
         )
       );
     }

     // FILTER BY CATEGORY AND COLOR AND LENGHT AND PRICE LOW
      if ($product_color_val !='not_set' AND $product_width_range == 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range != 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper == 'not_set'){
        // echo '// FILTER BY CATEGORY AND COLOR AND LENGHT AND PRICE LOW';
        // echo '  -- PRODUCT COLOR - ' . $product_color_val;
        // echo '  -- LENGHT-- ' . $product_depth_range;
        // echo '--- LOW PRICE --- ' . $product_price_lower;
        $params = array(
          'order' => 'ASC',
          'posts_per_page' => 3,
          'post_type' => 'product',
          'paged' => $current_page,
          'tax_query' => array(
            array(
              'taxonomy' => 'product_cat',
              'terms' => $term_b_slug,
              'field' => 'slug',
              'include_children' => true,
              'operator' => 'IN'
             ),
            array(
            'taxonomy'      => 'pa_color',
            'field'         => 'slug',
            'terms'         => $product_color_val,
            'operator'      => 'IN'
         ),
        ),
          'meta_query' => array(
           array(
          'key' => '_length',
          'value' => $product_depth_range,
          'compare' => '<=',
          ),
          array(
          'key' => '_price',
          'value' => $product_price_lower,
          'compare' => '>=',
          'type' => 'NUMERIC'
          )
          )
        );
      }

      // FILTER BY CATEGORY AND COLOR AND LENGHT AND PRICE UPPER
       if ($product_color_val !='not_set' AND $product_width_range == 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range != 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper != 'not_set'){
         // echo '// FILTER BY CATEGORY AND COLOR AND LENGHT AND PRICE UPPER';
         // echo '  -- PRODUCT COLOR - ' . $product_color_val;
         // echo '  -- LENGHT-- ' . $product_depth_range;
         // echo '--- UPPER PRICE --- ' . $product_price_upper;
         $params = array(
           'order' => 'ASC',
           'posts_per_page' => 3,
           'post_type' => 'product',
           'paged' => $current_page,
           'tax_query' => array(
             array(
               'taxonomy' => 'product_cat',
               'terms' => $term_b_slug,
               'field' => 'slug',
               'include_children' => true,
               'operator' => 'IN'
             ),
             array(
             'taxonomy'      => 'pa_color',
             'field'         => 'slug',
             'terms'         => $product_color_val,
             'operator'      => 'IN'
          ),
         ),
           'meta_query' => array(
            array(
           'key' => '_length',
           'value' => $product_depth_range,
           'compare' => '<=',
           ),
           array(
           'key' => '_price',
           'value' => $product_price_upper,
           'compare' => '>=',
           'type' => 'NUMERIC'
           )
           )
         );
       }

       // FILTER BY CATEGORY AND COLOR AND LENGHT AND PRICE LOW AND PRICE UPPER
        if ($product_color_val !='not_set' AND $product_width_range == 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range != 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper != 'not_set'){
          // echo '// FILTER BY CATEGORY AND COLOR AND LENGHT AND PRICE LOW AND PRICE UPPER';
          // echo '  -- PRODUCT COLOR - ' . $product_color_val;
          // echo '  -- LENGHT-- ' . $product_depth_range;
          // echo '--- LOW PRICE --- ' . $product_price_lower;
          // echo '--- UPPER PRICE --- ' . $product_price_upper;
          $params = array(
            'order' => 'ASC',
            'posts_per_page' => 3,
            'post_type' => 'product',
            'paged' => $current_page,
            'tax_query' => array(
              array(
                'taxonomy' => 'product_cat',
                'terms' => $term_b_slug,
                'field' => 'slug',
                'include_children' => true,
                'operator' => 'IN'
              ),
              array(
              'taxonomy'      => 'pa_color',
              'field'         => 'slug',
              'terms'         => $product_color_val,
              'operator'      => 'IN'
           ),
          ),
            'meta_query' => array(
             array(
            'key' => '_length',
            'value' => $product_depth_range,
            'compare' => '<=',
            ),
            array(
             'key' => '_price',
             'value' => array($product_price_lower, $product_price_upper),
             'compare' => 'BETWEEN',
             'type' => 'NUMERIC'
             )
            )
          );
        }

     // FILTER BY CATEGORY AND COLOR AND WIDTH AND HEIGHT
      if ($product_color_val !='not_set' AND $product_width_range != 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper == 'not_set'){
        // echo '// FILTER BY CATEGORY AND COLOR AND WIDTH AND HEIGHT';
        // echo '  -- PRODUCT COLOR - ' . $product_color_val;
        // echo '  -- WIDTH-- ' . $product_width_range;
        // echo '  -- HEIGHT-- ' . $product_height_range;
        $params = array(
          'order' => 'ASC',
          'posts_per_page' => 3,
          'post_type' => 'product',
          'paged' => $current_page,
          'tax_query' => array(
            array(
              'taxonomy' => 'product_cat',
              'terms' => $term_b_slug,
              'field' => 'slug',
              'include_children' => true,
              'operator' => 'IN'
            ),
            array(
            'taxonomy'      => 'pa_color',
            'field'         => 'slug',
            'terms'         => $product_color_val,
            'operator'      => 'IN'
             ),
            ),
            'meta_query' => array(
            'relation' => 'AND',
             array(
            'key' => '_width',
            'value' => $product_width_range,
            'compare' => '<=',
            ),
            array(
           'key' => '_height',
           'value' => $product_height_range,
           'compare' => '<=',
           ),
          )
        );
      }


      // FILTER BY CATEGORY AND COLOR AND WIDTH AND HEIGHT AND PRICE LOW
       if ($product_color_val !='not_set' AND $product_width_range != 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper == 'not_set'){
         // echo '// FILTER BY CATEGORY AND COLOR AND WIDTH AND HEIGHT AND PRICE LOW';
         // echo '  -- PRODUCT COLOR - ' . $product_color_val;
         // echo '  -- WIDTH-- ' . $product_width_range;
         // echo '  -- HEIGHT-- ' . $product_height_range;
         // echo '--- LOW PRICE --- ' . $product_price_lower;
         $params = array(
           'order' => 'ASC',
           'posts_per_page' => 3,
           'post_type' => 'product',
           'paged' => $current_page,
           'tax_query' => array(
             array(
               'taxonomy' => 'product_cat',
               'terms' => $term_b_slug,
               'field' => 'slug',
               'include_children' => true,
               'operator' => 'IN'
             ),
             array(
             'taxonomy'      => 'pa_color',
             'field'         => 'slug',
             'terms'         => $product_color_val,
             'operator'      => 'IN'
              ),
             ),
             'meta_query' => array(
             'relation' => 'AND',
              array(
             'key' => '_width',
             'value' => $product_width_range,
             'compare' => '<=',
             ),
             array(
            'key' => '_height',
            'value' => $product_height_range,
            'compare' => '<=',
            ),
            array(
            'key' => '_price',
            'value' => $product_price_lower,
            'compare' => '>=',
            'type' => 'NUMERIC'
             )
           )
         );
       }

       // FILTER BY CATEGORY AND COLOR AND WIDTH AND HEIGHT AND PRICE UPPER
        if ($product_color_val !='not_set' AND $product_width_range != 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper != 'not_set'){
          // echo '// FILTER BY CATEGORY AND COLOR AND WIDTH AND HEIGHT AND PRICE LOW';
          // echo '  -- PRODUCT COLOR - ' . $product_color_val;
          // echo '  -- WIDTH-- ' . $product_width_range;
          // echo '  -- HEIGHT-- ' . $product_height_range;
          // echo '--- UPPER PRICE --- ' . $product_price_upper;
          $params = array(
            'order' => 'ASC',
            'posts_per_page' => 3,
            'post_type' => 'product',
            'paged' => $current_page,
            'tax_query' => array(
              array(
                'taxonomy' => 'product_cat',
                'terms' => $term_b_slug,
                'field' => 'slug',
                'include_children' => true,
                'operator' => 'IN'
              ),
              array(
              'taxonomy'      => 'pa_color',
              'field'         => 'slug',
              'terms'         => $product_color_val,
              'operator'      => 'IN'
               ),
              ),
              'meta_query' => array(
              'relation' => 'AND',
               array(
              'key' => '_width',
              'value' => $product_width_range,
              'compare' => '<=',
              ),
              array(
             'key' => '_height',
             'value' => $product_height_range,
             'compare' => '<=',
             ),
             array(
               'key' => '_price',
               'value' => $product_price_upper,
               'compare' => '<=',
               'type' => 'NUMERIC'
              )
            )
          );
        }


        // FILTER BY CATEGORY AND COLOR AND WIDTH AND HEIGHT AND PRICE LOW AND PRICE UPPER
         if ($product_color_val !='not_set' AND $product_width_range != 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper != 'not_set'){
           // echo '// FILTER BY CATEGORY AND COLOR AND WIDTH AND HEIGHT AND PRICE LOW AND PRICE UPPER';
           // echo '  -- PRODUCT COLOR - ' . $product_color_val;
           // echo '  -- WIDTH-- ' . $product_width_range;
           // echo '  -- HEIGHT-- ' . $product_height_range;
           // echo '--- LOW PRICE --- ' . $product_price_lower;
           // echo '--- UPPER PRICE --- ' . $product_price_upper;
           $params = array(
             'order' => 'ASC',
             'posts_per_page' => 3,
             'post_type' => 'product',
             'paged' => $current_page,
             'tax_query' => array(
               array(
                 'taxonomy' => 'product_cat',
                 'terms' => $term_b_slug,
                 'field' => 'slug',
                 'include_children' => true,
                 'operator' => 'IN'
               ),
               array(
               'taxonomy'      => 'pa_color',
               'field'         => 'slug',
               'terms'         => $product_color_val,
               'operator'      => 'IN'
                ),
               ),
               'meta_query' => array(
               'relation' => 'AND',
                array(
               'key' => '_width',
               'value' => $product_width_range,
               'compare' => '<=',
               ),
               array(
              'key' => '_height',
              'value' => $product_height_range,
              'compare' => '<=',
              ),
              array(
                'key' => '_price',
                'value' => array($product_price_lower, $product_price_upper),
                'compare' => 'BETWEEN',
                'type' => 'NUMERIC'
               )
             )
           );
         }

      // FILTER BY CATEGORY AND COLOR AND WIDTH AND HEIGHT AND LENGHT
       if ($product_color_val !='not_set' AND $product_width_range != 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range != 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper == 'not_set'){
         // echo '// FILTER BY CATEGORY AND COLOR AND WIDTH AND HEIGHT AND LENGHT';
         // echo '  -- PRODUCT COLOR - ' . $product_color_val;
         // echo '  -- WIDTH-- ' . $product_width_range;
         // echo '  -- HEIGHT-- ' . $product_height_range;
         // echo '  -- LENGHT-- ' . $product_depth_range;
         $params = array(
           'order' => 'ASC',
           'posts_per_page' => 3,
           'post_type' => 'product',
           'paged' => $current_page,
           'tax_query' => array(
             array(
               'taxonomy' => 'product_cat',
               'terms' => $term_b_slug,
               'field' => 'slug',
               'include_children' => true,
               'operator' => 'IN'
             ),
             array(
             'taxonomy'      => 'pa_color',
             'field'         => 'slug',
             'terms'         => $product_color_val,
             'operator'      => 'IN'
              ),
             ),
             'meta_query' => array(
             'relation' => 'AND',
              array(
             'key' => '_width',
             'value' => $product_width_range,
             'compare' => '<=',
             ),
             array(
            'key' => '_height',
            'value' => $product_height_range,
            'compare' => '<=',
            ),
            array(
           'key' => '_length',
           'value' => $product_depth_range,
           'compare' => '<=',
           ),
           )
         );
       }

       // FILTER BY CATEGORY AND COLOR AND WIDTH AND HEIGHT AND LENGHT AND PRICE LOW
        if ($product_color_val !='not_set' AND $product_width_range != 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range != 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper == 'not_set'){
          // echo '// FILTER BY CATEGORY AND COLOR AND WIDTH AND HEIGHT AND LENGHT AND PRICE LOW';
          // echo '  -- PRODUCT COLOR - ' . $product_color_val;
          // echo '  -- WIDTH-- ' . $product_width_range;
          // echo '  -- HEIGHT-- ' . $product_height_range;
          // echo '  -- LENGHT-- ' . $product_depth_range;
          // echo '--- LOW PRICE --- ' . $product_price_lower;
          $params = array(
            'order' => 'ASC',
            'posts_per_page' => 3,
            'post_type' => 'product',
            'paged' => $current_page,
            'tax_query' => array(
              array(
                'taxonomy' => 'product_cat',
                'terms' => $term_b_slug,
                'field' => 'slug',
                'include_children' => true,
                'operator' => 'IN'
              ),
              array(
              'taxonomy'      => 'pa_color',
              'field'         => 'slug',
              'terms'         => $product_color_val,
              'operator'      => 'IN'
               ),
              ),
              'meta_query' => array(
              'relation' => 'AND',
               array(
              'key' => '_width',
              'value' => $product_width_range,
              'compare' => '<=',
              ),
              array(
             'key' => '_height',
             'value' => $product_height_range,
             'compare' => '<=',
             ),
             array(
            'key' => '_length',
            'value' => $product_depth_range,
            'compare' => '<=',
            ),
            array(
            'key' => '_price',
            'value' => $product_price_lower,
            'compare' => '>=',
            'type' => 'NUMERIC'
            )
            )
          );
        }

        // FILTER BY CATEGORY AND COLOR AND WIDTH AND HEIGHT AND LENGHT AND PRICE UPPER
         if ($product_color_val !='not_set' AND $product_width_range != 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range != 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper != 'not_set'){
           // echo '// FILTER BY CATEGORY AND COLOR AND WIDTH AND HEIGHT AND LENGHT AND PRICE UPPER';
           // echo '  -- PRODUCT COLOR - ' . $product_color_val;
           // echo '  -- WIDTH-- ' . $product_width_range;
           // echo '  -- HEIGHT-- ' . $product_height_range;
           // echo '  -- LENGHT-- ' . $product_depth_range;
           // echo '--- UPPER PRICE --- ' . $product_price_upper;
           $params = array(
             'order' => 'ASC',
             'posts_per_page' => 3,
             'post_type' => 'product',
             'paged' => $current_page,
             'tax_query' => array(
               array(
                 'taxonomy' => 'product_cat',
                 'terms' => $term_b_slug,
                 'field' => 'slug',
                 'include_children' => true,
                 'operator' => 'IN'
               ),
               array(
               'taxonomy'      => 'pa_color',
               'field'         => 'slug',
               'terms'         => $product_color_val,
               'operator'      => 'IN'
                ),
               ),
               'meta_query' => array(
               'relation' => 'AND',
                array(
               'key' => '_width',
               'value' => $product_width_range,
               'compare' => '<=',
               ),
               array(
              'key' => '_height',
              'value' => $product_height_range,
              'compare' => '<=',
              ),
              array(
             'key' => '_length',
             'value' => $product_depth_range,
             'compare' => '<=',
             ),
             array(
               'key' => '_price',
               'value' => $product_price_upper,
               'compare' => '<=',
               'type' => 'NUMERIC'
             )
             )
           );
         }

         // FILTER BY CATEGORY AND COLOR AND WIDTH AND HEIGHT AND LENGHT AND PRICE LOW AND PRICE UPPER
          if ($product_color_val !='not_set' AND $product_width_range != 'not_set' AND  $product_height_range != 'not_set' AND $product_depth_range != 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper != 'not_set'){
            // echo '// FILTER BY CATEGORY AND COLOR AND WIDTH AND HEIGHT AND LENGHT AND PRICE LOW AND PRICE UPPER';
            // echo '  -- PRODUCT COLOR - ' . $product_color_val;
            // echo '  -- WIDTH-- ' . $product_width_range;
            // echo '  -- HEIGHT-- ' . $product_height_range;
            // echo '  -- LENGHT-- ' . $product_depth_range;
            // echo '--- LOW PRICE --- ' . $product_price_lower;
            // echo '--- UPPER PRICE --- ' . $product_price_upper;
            $params = array(
              'order' => 'ASC',
              'posts_per_page' => 3,
              'post_type' => 'product',
              'paged' => $current_page,
              'tax_query' => array(
                array(
                  'taxonomy' => 'product_cat',
                  'terms' => $term_b_slug,
                  'field' => 'slug',
                  'include_children' => true,
                  'operator' => 'IN'
                ),
                array(
                'taxonomy'      => 'pa_color',
                'field'         => 'slug',
                'terms'         => $product_color_val,
                'operator'      => 'IN'
                 ),
                ),
                'meta_query' => array(
                'relation' => 'AND',
                 array(
                'key' => '_width',
                'value' => $product_width_range,
                'compare' => '<=',
                ),
                array(
               'key' => '_height',
               'value' => $product_height_range,
               'compare' => '<=',
               ),
               array(
              'key' => '_length',
              'value' => $product_depth_range,
              'compare' => '<=',
              ),
              array(
                'key' => '_price',
                 'value' => array($product_price_lower, $product_price_upper),
                 'compare' => 'BETWEEN',
                 'type' => 'NUMERIC'
              )
              )
            );
          }

          // FILTER ONLY BY CATEGORY AND PRICE LOW
          if ($product_color_val == 'not_set' AND $product_width_range == 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper == 'not_set'){
            // echo '// FILTER ONLY BY CATEGORY AND PRICE LOW --- ';
            // echo '--- LOW PRICE --- ' . $product_price_lower;
            $params = array(
              'order' => 'ASC',
              'posts_per_page' => 3,
              'post_type' => 'product',
              'paged' => $current_page,
              'tax_query' => array(
                array(
                  'taxonomy' => 'product_cat',
                  'terms' => $term_b_slug,
                  'field' => 'slug',
                  'include_children' => true,
                  'operator' => 'IN'
                 ) ),
                 'meta_query' => array(
                   array(
                   'key' => '_price',
                   'value' => $product_price_lower,
                   'compare' => '>=',
                   'type' => 'NUMERIC'
                   )
                 )
               );
            }

            // FILTER ONLY BY CATEGORY AND COLOR AND PRICE LOW
            if ($product_color_val != 'not_set' AND $product_width_range == 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper == 'not_set'){
              // echo '// FILTER ONLY BY CATEGORY AND COLOR AND PRICE LOW --- ';
              // echo '  -- PRODUCT COLOR - ' . $product_color_val;
              // echo '--- LOW PRICE --- ' . $product_price_lower;
              $params = array(
                'order' => 'ASC',
                'posts_per_page' => 3,
                'post_type' => 'product',
                'paged' => $current_page,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'product_cat',
                    'terms' => $term_b_slug,
                    'field' => 'slug',
                    'include_children' => true,
                    'operator' => 'IN'
                  ),
                  array(
                  'taxonomy'      => 'pa_color',
                  'field'         => 'slug',
                  'terms'         => $product_color_val,
                  'operator'      => 'IN'
                   ),
                  ),
                   'meta_query' => array(
                     array(
                     'key' => '_price',
                     'value' => $product_price_lower,
                     'compare' => '>=',
                     'type' => 'NUMERIC'
                     )
                   )
                 );
              }

          // FILTER ONLY BY CATEGORY AND PRICE UPPER
          if ($product_color_val == 'not_set' AND $product_width_range == 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper != 'not_set'){
            // echo '// FILTER ONLY BY CATEGORY AND PRICE UPPER --- ';
            // echo '--- UPPER PRICE --- ' . $product_price_upper;
            $params = array(
              'order' => 'ASC',
              'posts_per_page' => 3,
              'post_type' => 'product',
              'paged' => $current_page,
              'tax_query' => array(
                array(
                  'taxonomy' => 'product_cat',
                  'terms' => $term_b_slug,
                  'field' => 'slug',
                  'include_children' => true,
                  'operator' => 'IN'
                 ) ),
                 'meta_query' => array(
                   array(
                   'key' => '_price',
                   'value' => $product_price_upper,
                   'compare' => '<=',
                   'type' => 'NUMERIC'
                   )
                 )
               );
            }

            // FILTER ONLY BY CATEGORY AND COLOR AND PRICE UPPER
            if ($product_color_val != 'not_set' AND $product_width_range == 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower == 'not_set' AND $product_price_upper != 'not_set'){
              // echo '// FILTER ONLY BY CATEGORY AND  COLOR AND PRICE UPPER --- ';
              // echo '  -- PRODUCT COLOR - ' . $product_color_val;
              // echo '--- UPPER PRICE --- ' . $product_price_upper;
              $params = array(
                'order' => 'ASC',
                'posts_per_page' => 3,
                'post_type' => 'product',
                'paged' => $current_page,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'product_cat',
                    'terms' => $term_b_slug,
                    'field' => 'slug',
                    'include_children' => true,
                    'operator' => 'IN'
                  ),
                  array(
                  'taxonomy'      => 'pa_color',
                  'field'         => 'slug',
                  'terms'         => $product_color_val,
                  'operator'      => 'IN'
                   ),
                  ),
                   'meta_query' => array(
                     array(
                     'key' => '_price',
                     'value' => $product_price_upper,
                     'compare' => '<=',
                     'type' => 'NUMERIC'

                     )
                   )
                 );
              }


          // FILTER ONLY BY CATEGORY AND PRICE LOW AND PRICE UPPER
          if ($product_color_val == 'not_set' AND $product_width_range == 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper != 'not_set'){
            // echo '// FILTER ONLY BY CATEGORY AND PRICE LOW AND PRICE UPPER --- ';
            // echo '--- LOW PRICE --- ' . $product_price_lower;
            // echo '--- UPPER PRICE --- ' . $product_price_upper;
            $params = array(
              'order' => 'ASC',
              'posts_per_page' => 3,
              'post_type' => 'product',
              'paged' => $current_page,
              'tax_query' => array(
                array(
                  'taxonomy' => 'product_cat',
                  'terms' => $term_b_slug,
                  'field' => 'slug',
                  'include_children' => true,
                  'operator' => 'IN'
                 ) ),
                 'meta_query' => array(
                   array(
                   'key' => '_price',
                   'value' => array($product_price_lower, $product_price_upper),
                   'compare' => 'BETWEEN',
                   'type' => 'NUMERIC'
                   )
                 )
               );
             }

             // FILTER ONLY BY CATEGORY AND  COLOR AND PRICE LOW AND PRICE UPPER
             if ($product_color_val != 'not_set' AND $product_width_range == 'not_set' AND  $product_height_range == 'not_set' AND $product_depth_range == 'not_set' AND $product_price_lower != 'not_set' AND $product_price_upper != 'not_set'){
               // echo '// FILTER ONLY BY CATEGORY AND COLOR AND PRICE LOW AND PRICE UPPER --- ';
               // echo '  -- PRODUCT COLOR - ' . $product_color_val;
               // echo '--- LOW PRICE --- ' . $product_price_lower;
               // echo '--- UPPER PRICE --- ' . $product_price_upper;
               $params = array(
                 'order' => 'ASC',
                 'posts_per_page' => 3,
                 'post_type' => 'product',
                 'paged' => $current_page,
                 'tax_query' => array(
                   array(
                     'taxonomy' => 'product_cat',
                     'terms' => $term_b_slug,
                     'field' => 'slug',
                     'include_children' => true,
                     'operator' => 'IN'
                   ),
                   array(
                   'taxonomy'      => 'pa_color',
                   'field'         => 'slug',
                   'terms'         => $product_color_val,
                   'operator'      => 'IN'
                    ),
                   ),
                    'meta_query' => array(
                      array(
                      'key' => '_price',
                      'value' => array($product_price_lower, $product_price_upper),
                      'compare' => 'BETWEEN',
                      'type' => 'NUMERIC'
                      )
                    )
                  );
                }

// =============================================================================
//                      MAIN PARAMETERS FOR LOOP END
// =============================================================================

}

      query_posts( $params );
        $wp_query->is_archive = true;
        $wp_query->is_home = false;
         if ( have_posts() ) :
          while (have_posts()): the_post(); ?>
           <?php wc_get_template_part( 'content', 'product' ); ?>
         <?php  endwhile; ?>
      </ul>
       <div class="show-more roboto news_item_wrapper_pagination">
         <div class="show-more__line"></div>
           <div class="pagination">
              <?php wp_pagenavi(); ?>
           </div>
         <div class="show-more__line"></div>
       </div>
      <?php else :?>
         <p class="info-message"><?php pll_e('Keine Artikel, die den angegebenen Parametern entsprechen'); ?></p>
      <?php endif; ?>
    </div>
  </div>
</div>


<?php
get_footer();?>
