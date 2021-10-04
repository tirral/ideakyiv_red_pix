<?php
add_action( 'cmb2_admin_init', 'warranty_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function warranty_metaboxes() {

  	/**
  	 * Initiate the metabox
  	 */
  	$cmb = new_cmb2_box( array(
  		'id'            => 'warranty_metabox',
  		'title'         => __( 'ДОПОЛНИТЕЛЬНЫЕ ПОЛЯ ДЛЯ СТРАНИЦЫ ГАРАНТИИ', 'cmb2' ),
      'object_types'  => array( 'page', ), // Post type
      'show_on'       => array( 'key' => 'page-template', 'value' => "page-templates/page_warranty.php" ),
      'show_in_rest' => WP_REST_Server::READABLE,
  		'context'       => 'normal',
  		'priority'      => 'high',
  		'show_names'    => true, // Show field names on the left
  	));

    $cmb->add_field( array(
       'name' => '==================== ЗАГОЛОВОК СТРАНИЦЫ ====================',
       'type' => 'title',
       'id'   => 'warranty_metabox_section_1'
     ));

     $cmb->add_field( array(
       'name'    => 'Заголовок страницы',
       'id'      => 'warranty_metabox_header_section_title',
       'type'    => 'text',
     ));


     $cmb->add_field( array(
        'name' => '==================== ОСНОВНОЙ КОНТЕНТ  ====================',
        'type' => 'title',
        'id'   => 'warranty_metabox_section_2'
      ));

      $group_field_id = $cmb->add_field( array(
        'id'          => 'warranty_metabox_counter',
        'type'        => 'group',
        'object_types'     => array( 'myxi' ),
        'description' => __( 'Наши гарантии', 'cmb2' ),
        'options'     => array(
        'group_title'   => __( 'Гарантия {#}', 'cmb2' ),
        'add_button'    => __( 'Add Another Entry', 'cmb2' ),
        'remove_button' => __( 'Remove Entry', 'cmb2' ),
        'sortable'      => true,
        ),
      ));
      $cmb->add_group_field( $group_field_id, array(
        'name'    => 'Наши гарантии название',
        'id'      => 'warranty_metabox_counter_value',
        'type'    => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats',
      ));
      $cmb->add_group_field( $group_field_id, array(
        'name'    => 'Наши гарантии текст',
        'id'      => 'warranty_metabox_counter_text',
        'type'    => 'wysiwyg',
        'options' => array(),
        'show_on_cb' => 'cmb2_hide_if_no_cats',
      ));






   }
