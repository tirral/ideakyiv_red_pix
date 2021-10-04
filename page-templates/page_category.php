<?php
/*
Template Name: PAGE CATEGORY
*/
echo '/ideakyiv/page-templates/page_category.php';
defined( 'ABSPATH' ) || exit;
get_header();
?>


<div class="container home_page_main_container">

  <?php
      /**
   * Hook: woocommerce_before_main_content.
   *
   * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
   * @hooked woocommerce_breadcrumb - 20
   * @hooked WC_Structured_Data::generate_website_data() - 30
   */
  do_action( 'woocommerce_before_main_content' );?>



  <div class="row home_page_main_wrapper">

    <div class="col-lg-3 sitebar_container">
    <div class="sitebar_taxonomy_wrapper">
      <div class="title-sidebar_default">
        <p>Категории товаров</p>
      </div>
      <?php
      $orderby = 'name';
      $order = 'asc';
      $hide_empty = false ;
      $cat_args = array(
        'orderby'    => $orderby,
        'order'      => $order,
        'hide_empty' => $hide_empty,
      );
      $product_categories = get_terms( 'product_cat', $cat_args );
      if( !empty($product_categories) ){
          echo '<ul class="sitebar_taxonomy_list">';
          foreach ($product_categories as $key => $category) {
          echo '<li class="sitebar_taxonomy_list__item">';
          echo '<a href="'.get_term_link($category).'" >';
          echo $category->name;
          echo '</a>';
          echo '</li>';
          }
          echo '</ul> ';
    }?>
    </div>


    <div class="sitebar_filter_wrapper">
     <?php echo do_shortcode('[wpf-filters id=4]') ?>
    </div>

    <div class="sitebar_filter_wrapper">
     <?php echo do_shortcode('[wpf-filters id=2]') ?>
    </div>

    </div>



    <div class="col-lg-9 main_product_container">

      <div class="main_slider_wrapper">
          <div class="main_slider-content">
            <div class="main_slider-item">
              <a href="#">
                <img src="<?php echo get_template_directory_uri() ?>/img/slider-img.png" alt="">
              </a>
            </div>
            <div class="main_slider-item">
              <a href="#">
                <img src="<?php echo get_template_directory_uri() ?>/img/slider-img.png" alt="">
              </a>
            </div>
            <div class="main_slider-item">
              <a href="#">
                <img src="<?php echo get_template_directory_uri() ?>/img/slider-img.png" alt="">
              </a>
            </div>
          </div>
      </div>


<?php
      $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 10,
        'orderby'        => 'meta_value_num',
        'meta_key'       => '_price',
        'order'          => 'asc'
    );

    $loop = new WP_Query( $args );
    echo '<form id="checkme">';
    while ( $loop->have_posts() ) : $loop->the_post();
        global $product;
        echo '<div>';
        echo ' <input type="radio" name="products" value="'.get_the_title().'" >';
        echo '<label>' . woocommerce_get_product_thumbnail().' '.get_the_title().'</label>';
        echo '</div>';
        /*    echo '<br /><a href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().' '.get_the_title().'</a>';*/
    endwhile;
    echo '</form>';
    wp_reset_query();
?>
  </div>

</div>
</div>

<?php
get_footer();
