<?php
$queried_object = get_queried_object();
$terms = get_the_terms( $queried_object->ID, 'product_cat' );
foreach ($terms as $term) {
    $term_b_name =  $product_cat_id = $term->name;
		$term_b_slug =  $product_cat_id = $term->slug;
}
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
    } 

    // =============================================================================
    //                      PARAMETERS FOR SORT BY PRICE START
    // =============================================================================

            $sorting_order = $_GET['orderby'];
            if($sorting_order == 'price'){
                $args = array(
                    'order' => 'DESC',
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
                    'post_status' => 'publish',
                    'lang' => '',
                    'post_type' => 'product',
                    'post__in' => $products_id,
                    'orderby' => 'meta_value_num',
                    'meta_key' => '_price',
                    'order' => 'desc',
                );
               } else {
                  $args = array(
                    'order' => 'DESC',
                    'post_status' => 'publish',
                    'lang' => '',
                    'post_type' => 'product',
                    'post__in' => $products_id,
                  );
              }
    // =============================================================================
    //                      PARAMETERS FOR SORT BY PRICE END
    // =============================================================================

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
