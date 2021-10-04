<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */



defined( 'ABSPATH' ) || exit;

global $product;



// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
} ?>



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

		<li data-user_id="<?php echo $_COOKIE["cuctom_user_login_id"] ?>" data-product_id="<?php echo $product->id ?>" <?php wc_product_class( '', $product ); ?>>

		<!-- CHECK IF THE PRODUCT IS IN  FAVORITE AD WARIANT OF BUTTON START   -->
			<?php if (in_array($product->id, $products_id)) { ?>
			   <div class="remowe_like_btn show_like_btn"></div>
				 <div class="like_btn hide_like_btn"></div>
			<?php } else { ?>
				<div class="like_btn show_like_btn"></div>
				<div class="remowe_like_btn hide_like_btn"></div>
			<?php } ?>
		<!-- CHECK IF THE PRODUCT IS IN  FAVORITE AD WARIANT OF BUTTON END  -->
<?php } else { ?>
	 <li  <?php wc_product_class( '', $product ); ?>>
		 <div class="like_btn_not_register"></div>
<?php } ?>

		<div class="list_item_variant_line">
		<?php
				do_action( 'woocommerce_before_shop_loop_item' );
				do_action( 'woocommerce_before_shop_loop_item_title' );
				do_action( 'woocommerce_shop_loop_item_title' );
				do_action( 'woocommerce_after_shop_loop_item_title' );
				do_action( 'woocommerce_after_shop_loop_item' );
			?>
		</div>
	<?php
	$queried_object = get_queried_object();
	if($queried_object->taxonomy == 'product_cat' || is_page_template('page-templates/page_personal_cabinet-favorits.php')){ ?>
			<div class="list_item_variant_block">
				<div class="list_item_variant_block_img">
					<?php
					do_action( 'woocommerce_before_shop_loop_item' );
					do_action( 'woocommerce_before_shop_loop_item_title' );
					?>
				</div>
				<div class="list_item_variant_block_content">
					<?php
					do_action( 'woocommerce_shop_loop_item_title' );
					do_action( 'woocommerce_after_shop_loop_item_title' );
					echo '<p class="cart_content">' . wp_trim_words( get_the_content(), 40, '...' ) . '</p>';
					do_action( 'woocommerce_after_shop_loop_item' );
					?>
				</div>
			</div>
	<?php } ?>
</li>
