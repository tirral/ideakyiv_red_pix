<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$queried_object = get_queried_object();

$terms = get_the_terms( $queried_object->ID, 'product_cat' );
foreach ($terms as $term) {
    $term_b_name =  $product_cat_id = $term->name;
		$term_b_slug =  $product_cat_id = $term->slug;
}

get_header(); ?>

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
		       <a href="<?php echo get_home_url(); ?>/product-category/<?php echo $term_b_slug ?>/" itemprop="item">
		         <span itemprop="name"> <?php echo $term_b_name ?> </span>
		         <meta itemprop="position" content="2">
		       </a>
		     </span>
         <span class="kb_sep"></span>
         <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
           <span class="kb_title" itemprop="name"><?php echo $queried_object->post_title; ?></span>
           <meta itemprop="position" content="3">
         </span>
     </div>
   </div>

	<div class="row single_product_main_container">
		<div class="col-lg-12">
	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );	?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php wc_get_template_part( 'content', 'single-product' ); ?>
		<?php endwhile; // end of the loop. ?>
	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' ); ?>
</div>

<div class="col-lg-12">
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10 -- change template
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20 -- remove
	 */
	 //do_action( 'woocommerce_after_single_product_summary' );
	?>

	<div class="col-lg-12 home_page_product_line_wrapper">
		 <h1>Sales leaders</h1>
		<div class="home_page_product_line_container">
			<?php
			$args = array(
				'order' => 'DESC', //ASC
				'post_type' => 'product',
				'posts_per_page' => 5,
					'tax_query' => array(
					    array(
					        'taxonomy' => 'product_cat',
					        'terms' => $term_b_slug,
					        'field' => 'slug',
					        'include_children' => true,
					        'operator' => 'IN'
					    )
					),
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
</div>

<?php
get_footer();

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
