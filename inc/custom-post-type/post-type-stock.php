<?php
/**
 * This file registers the Stock custom post type
 *
 */


// Register the Stock custom post type
function ideakyiv_toolbox_register_stock() {

	$slug = apply_filters( 'ideakyiv_clients_rewrite_slug', 'stock' );
	$labels = array(
		'name'                  => _x( 'Акция', 'Post Type General Name', 'ideakyiv_toolbox' ),
		'singular_name'         => _x( 'Акция', 'Post Type Singular Name', 'ideakyiv_toolbox' ),
		'menu_name'             => __( 'Акция', 'ideakyiv_toolbox' ),
		'name_admin_bar'        => __( 'Акция', 'ideakyiv_toolbox' ),
		'archives'              => __( 'Архив Акция', 'ideakyiv_toolbox' ),
		'parent_item_colon'     => __( 'Parent Item:', 'ideakyiv_toolbox' ),
		'all_items'             => __( 'Все Акция', 'ideakyiv_toolbox' ),
		'add_new_item'          => __( 'Добавить новую Акцию', 'ideakyiv_toolbox' ),
		'add_new'               => __( 'Добавить новую Акцию', 'ideakyiv_toolbox' ),
		'new_item'              => __( 'Новая Акция', 'ideakyiv_toolbox' ),
		'edit_item'             => __( 'Редактировать Акцию', 'ideakyiv_toolbox' ),
		'update_item'           => __( 'Обновить Акцию', 'ideakyiv_toolbox' ),
		'view_item'             => __( 'View Stock', 'ideakyiv_toolbox' ),
		'search_items'          => __( 'Search Stock', 'ideakyiv_toolbox' ),
		'not_found'             => __( 'Not found', 'ideakyiv_toolbox' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'ideakyiv_toolbox' ),
		'featured_image'        => __( 'Featured Image', 'ideakyiv_toolbox' ),
		'set_featured_image'    => __( 'Set featured image', 'ideakyiv_toolbox' ),
		'remove_featured_image' => __( 'Remove featured image', 'ideakyiv_toolbox' ),
		'use_featured_image'    => __( 'Use as featured image', 'ideakyiv_toolbox' ),
		'insert_into_item'      => __( 'Insert into item', 'ideakyiv_toolbox' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'ideakyiv_toolbox' ),
		'items_list'            => __( 'Items list', 'ideakyiv_toolbox' ),
		'items_list_navigation' => __( 'Items list navigation', 'ideakyiv_toolbox' ),
		'filter_items_list'     => __( 'Filter items list', 'ideakyiv_toolbox' ),
	);


	$args = array(
		'label'                 => __( 'Stock', 'ideakyiv_toolbox' ),
		'description'           => __( 'A post type for your stock', 'ideakyiv_toolbox' ),
		'labels'                => $labels,
    'show_in_rest'          => true,
		'supports'              => array(  'title',  'thumbnail' ),
		'taxonomies'            => array( 'stock_types' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 26,
		'menu_icon'             => 'dashicons-tag',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite' 				=> array( 'slug' => $slug ),
	);
	register_post_type( 'stock', $args );
}
add_action( 'init', 'ideakyiv_toolbox_register_stock', 0 );


// Register the Stock taxonomy
	add_action( 'init', 'create_stock_types' );
	function create_stock_types() {
		register_taxonomy(
			'stock_types',
			'stock',
			array(
				'label' => __( 'stock_types' ),
				'rewrite' => array( 'slug' => 'stock_types' ),
				'hierarchical' => true,
			)
		);
	}
