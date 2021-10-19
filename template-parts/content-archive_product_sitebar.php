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
    }  ?>

  <div class="sitebar_taxonomy_wrapper">
  <div class="title-sidebar_default"><p><?php pll_e('CATEGORIES'); ?></p></div>
  <div id="product_category_sitebar_list">
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
        foreach ($product_categories as $key => $category) { ?>
        <?php  if($queried_object->slug ==  $category->slug){ ?>
          <div class="product_category_sitebar_list_item_wrapper active_radio" data-category="<?php echo $category->slug?>">
            <input type="radio" id="cat_<?php echo $category->slug?>" name="product_category" value="<?php echo $category->slug ?>">
            <label for="cat_<?php echo $category->slug ?>"><?php echo $category->name ?></label>
          </div>
        <?php } else { ?>
          <div class="product_category_sitebar_list_item_wrapper">
            <input type="radio" id="cat_<?php echo $category->slug ?>" name="product_category" value="<?php echo $category->slug ?>">
            <label for="cat_<?php echo $category->slug ?>"><?php echo $category->name ?></label>
          </div>
        <?php } ?>
      <?php }
    } ?>
</div>
</div>


<div class="title-sidebar_default_second"><p><?php pll_e('FILTER BY'); ?></p></div>
<div class="sitebar_filter_wrapper_color">
<div class="title-sidebar_default_second_sub_header"><p><?php pll_e('Color'); ?></p></div>
<?php
// GET COLORS
$products_colors_new = array();
 $args = array('category'  => array($term_b_slug));
 foreach( wc_get_products($args) as $product ){
     foreach( $product->get_attributes() as $attr_name => $attr ){
         foreach( $attr->get_terms() as $term ){
             array_push($products_colors_new, $term->name);
         }
     }
 }
 $product_color_unique = array_unique($products_colors_new); ?>
 <div class="sitebar_filter_wrapper_color_wrapper">
  <?php foreach ($product_color_unique as $product_color) { ?>
     <div class="sitebar_filter_wrapper_color_item" style="background-color:<?php echo $product_color ?>">
       <input type="radio" id="product_color_<?php echo $product_color ?>" name="product_color" value="<?php echo $product_color ?>">
   </div>
<?php } ?>
 </div>
</div>



<div class="sitebar_filter_wrapper_color">
<div class="title-sidebar_default_second_sub_header"><p><?php pll_e('Abmessungen'); ?></p></div>
<div class="product_width_range_title">Länge <span>(сm)</span>:</div>
<section><div id="product_width_range" class="range-slider js-range" data-range-id="product_width_range"></div></section>
<div class="product_width_range_title">Höhe <span>(сm)</span>:</div>
<section><div id="product_height_range" class="range-slider js-range" data-range-id="product_height_range"></div></section>
<div class="product_width_range_title">Tiefe <span>(сm)</span>:</div>
<section><div id="product_depth_range" class="range-slider js-range" data-range-id="product_depth_range"></div></section>
</div>




<?php
// GET MIN AND MAX PRISES
$product_category_term_title_min =  product_category_term_title_min($term_b_slug);
$product_category_term_title_max =  product_category_term_title_max($term_b_slug);
?>



<div id="prise_box" style="display:none;">
  <div id="prise_box_min">
    <?php echo $product_category_term_title_min ?>
  </div>
  <div id="prise_box_max">
    <?php echo $product_category_term_title_max ?>
  </div>
</div>

<div class="sitebar_filter_wrapper_price">
  <div class="title-sidebar_default_second_sub_header price_range"><p><?php pll_e('Price range'); ?></p></div>
    <fieldset class="filter-price">
      <div class="price-field">
        <input type="range"  min="0" max="10000" value="0" id="lower">
        <input type="range" min="0" max="10000" value="10000" id="upper">
      </div>
       <div class="price-wrap">
        <div class="price-wrap-1">
          <input id="one">
          <label for="one">€</label>
        </div>

        <div class="price-wrap-2">
          <input id="two">
          <label for="two">€</label>
        </div>


      </div>
    </fieldset>
 </div>



<div id="filter_button">FILTER</div>
