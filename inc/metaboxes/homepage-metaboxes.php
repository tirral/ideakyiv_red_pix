<?php
add_action( 'cmb2_admin_init', 'homepage_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function homepage_metaboxes() {

  	/**
  	 * Initiate the metabox
  	 */
  	$cmb = new_cmb2_box( array(
  		'id'            => 'homepage_metabox',
  		'title'         => __( 'ДОПОЛНИТЕЛЬНЫЕ ПОЛЯ ДЛЯ ГЛАВНОЙ СТРАНИЦЫ', 'cmb2' ),
      'object_types'  => array( 'page', ), // Post type
      'show_on'       => array( 'key' => 'page-template', 'value' => "page-templates/page_home.php" ),
      'show_in_rest' => WP_REST_Server::READABLE,
  		'context'       => 'normal',
  		'priority'      => 'high',
  		'show_names'    => true, // Show field names on the left
  	));



    $cmb->add_field( array(
  		'name' => 'НАСТРОЙКА СЛАЙДЕРА В ОБЛАСТИ ШАПКИ',
  		'type' => 'title',
  		'id'   => 'activehousedays_header_title'
  	));

  	$group_field_id = $cmb->add_field( array(
  		'id'          => 'header_slider',
  		'type'        => 'group',
  			'options'     => array(
  			'group_title'   => __( 'Слайд {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
  			'add_button'    => __( 'Add Another Entry', 'cmb2' ),
  			'remove_button' => __( 'Remove Entry', 'cmb2' ),
  			'sortable'      => true, // beta
  		),
  	));

  	$cmb->add_group_field( $group_field_id, array(
  		'name' => 'Изображение cлайдера',
  		'id'   => 'header_slider_img',
  		'type' => 'file',
  		'options' => array(
  			'url' => false, // Hide the text input for the url
  		),
  		'text'    => array(
  			'add_upload_file_text' => 'Добавить изображение' // Change upload button text. Default: "Add or Upload File"
  		),
  		'preview_size' => 'medium', // Image size to use when previewing in the admin.
  	));

  	$cmb->add_group_field( $group_field_id, array(
  		'name'       => __( 'Заголовок слайда', 'cmb2' ),
  		'id'         => 'header_slider_title',
  		'type'       => 'text',
  		'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
  	));
    $cmb->add_group_field( $group_field_id, array(
      'name'       => __( 'Размер скидки', 'cmb2' ),
      'id'         => 'header_slider_sale_value',
      'type'       => 'text',
      'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
    ));
  	$cmb->add_group_field( $group_field_id, array(
  		'name' => 'Краткое описание слайда',
  		'id'   => 'header_slider_description',
  		'type' => 'textarea_small',
  	));
  	$cmb->add_group_field( $group_field_id, array(
  		'name' => 'Название кнопки',
  		'id'   => 'header_slider_btn_title',
  		'type'       => 'text',
  	));
  	$cmb->add_group_field( $group_field_id, array(
  		'name' => 'Ссылка на кнопке',
  		'id'   => 'header_slider_btn_url',
  		'type' => 'text',
  	));

   }
