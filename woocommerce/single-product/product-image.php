<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;
//echo wp_get_attachment_image_url( $product->get_image_id(), 'full' ) ;

$columns = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$attachment_ids = $product->get_gallery_image_ids();

$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
); ?>

<div id="single_product_lg_img_wrapper" class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<figure id="single_product_lg_img_container" class="woocommerce-product-gallery__wrapper single_product_lg_img">
			<?php
			if ($attachment_ids && $product->get_image_id()) { ?>
				<div id="single_product_main_img_container_main" class="slider slider-for">
					<?php foreach ( $attachment_ids as $attachment_id ) { ?>
					<div>
						<div  class="woocommerce-product-gallery__image--placeholder">
					  	<img class="sloder_image" src="<?php echo wp_get_attachment_image_url( $attachment_id , 'full' ) ?>" alt="">
						</div>
					</div>
					<?php } ?>
				</div>
		<?php	} else if ($product->get_image_id()){
						$html  = '<div id="single_product_main_img_container" class="woocommerce-product-gallery__image--placeholder">';
						$html .=  '<img src="' . wp_get_attachment_image_url( $product->get_image_id(), 'full' ) .'" alt="#" id="single_product_main_img" class="wp-post-image" />';
						$html .= '</div>';
			   	} else {
						$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
						$html .= sprintf( '<img src="%s" alt="%s"  class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
						$html .= '</div>';
				}
			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id );	?>
	</figure>
			<div id="single_product_lg_img_container_zoom"></div>
	<?php do_action( 'woocommerce_product_thumbnails' ); ?>

	<div class="woocommerce_main_content_wrapper">
		<?php $product_tabs = apply_filters( 'woocommerce_product_tabs', array() );
			if ( ! empty( $product_tabs ) ) : ?>
				<div class="woocommerce_main_content_wrapper_text">
			   <?php call_user_func(woocommerce_product_description_tab) ?>
				</div>
			<span class="woocommerce_main_content_wrapper_more_btn open">More</span>
			<span class="woocommerce_main_content_wrapper_less_btn">Less</span>
		<?php endif; ?>
	</div>

	<div class="woocommerce_single_product_wrapper" style="margin-top: 40px;">
    <?php echo call_user_func(comments_template); ?>
	</div>

</div>
