<?php

add_action( 'cmb2_admin_init', 'product_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function product_metaboxes() {

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'product_metabox',
		'title'         => __( 'ADDITIONAL PRODUCT FIELDS', 'cmb2' ),
    'object_types'  => 'product',
    'show_in_rest' => WP_REST_Server::READABLE,
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	) );

	$cmb->add_field( array(
		'name'    => 'Packing height',
		'id'      => 'product_packing_height',
		'type'    => 'text',
	));

  $cmb->add_field( array(
    'name'    => 'Packing width',
    'id'      => 'product_packing_width',
    'type'    => 'text',
  ));
  $cmb->add_field( array(
    'name'    => 'Packing depth',
    'id'      => 'product_packing_depth',
    'type'    => 'text',
  ));
  $cmb->add_field( array(
    'name'    => 'Product packs number',
    'id'      => 'product_packs_number',
    'type'    => 'text',
  ));


	$cmb->add_field( array(
	'name'    => __( 'Stock', 'ideakyiv' ),
	'id'      => 'attached_stock',
	'type'    => 'custom_attached_posts',
	'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
	'options' => array(
		'show_thumbnails' => true, // Show thumbnails on the left
		'filter_boxes'    => true, // Show a text box for filtering the results
		'query_args'      => array(
			'posts_per_page' => 30,
			'post_type'      => 'stock',
		), // override the get_posts args
	),
));

}
