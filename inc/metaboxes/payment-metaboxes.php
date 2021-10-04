<?php
add_action( 'cmb2_admin_init', 'payment_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function payment_metaboxes() {

  	/**
  	 * Initiate the metabox
  	 */
  	$cmb = new_cmb2_box( array(
  		'id'            => 'payment_metabox',
  		'title'         => __( 'ДОПОЛНИТЕЛЬНЫЕ ПОЛЯ ДЛЯ СТРАНИЦЫ ОПЛАТЫ', 'cmb2' ),
      'object_types'  => array( 'page', ), // Post type
      'show_on'       => array( 'key' => 'page-template', 'value' => "page-templates/page_payment.php" ),
      'show_in_rest' => WP_REST_Server::READABLE,
  		'context'       => 'normal',
  		'priority'      => 'high',
  		'show_names'    => true, // Show field names on the left
  	));

    $cmb->add_field( array(
       'name' => '==================== ЗАГОЛОВОК СТРАНИЦЫ ====================',
       'type' => 'title',
       'id'   => 'payment_metabox_section_1'
     ));
     $cmb->add_field( array(
       'name'    => 'Заголовок страницы',
       'id'      => 'payment_metabox_header_section_title',
       'type'    => 'text',
     ));


     $cmb->add_field( array(
        'name' => '==================== ПРЕМ ЗАКАЗА  ====================',
        'type' => 'title',
        'id'   => 'payment_metabox_section_2'
      ));
     $cmb->add_field( array(
        'name'    => 'Прием заказа заголовок',
        'id'      => 'payment_metabox_reception_title',
        'type'    => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats',
      ));
     $cmb->add_field( array(
        'name'    => 'Прием заказа контент',
        'id'      => 'payment_metabox_reception_text',
        'type'    => 'wysiwyg',
        'options' => array(),
        'show_on_cb' => 'cmb2_hide_if_no_cats',
      ));

      $cmb->add_field( array(
         'name' => '==================== ОПЛАТА ЗАКАЗА  ====================',
         'type' => 'title',
         'id'   => 'payment_metabox_section_3'
       ));
      $cmb->add_field( array(
         'name'    => 'Оплата заказа заголовок',
         'id'      => 'payment_metabox_payment_title',
         'type'    => 'text',
         'show_on_cb' => 'cmb2_hide_if_no_cats',
       ));
      $cmb->add_field( array(
         'name'    => 'Оплата заказа контент',
         'id'      => 'payment_metabox_payment_text',
         'type'    => 'wysiwyg',
         'options' => array(),
         'show_on_cb' => 'cmb2_hide_if_no_cats',
       ));

       $cmb->add_field( array(
          'name' => '==================== ДОСТАВКА ЗАКАЗА  ====================',
          'type' => 'title',
          'id'   => 'payment_metabox_section_4'
        ));
       $cmb->add_field( array(
          'name'    => 'Доставка заказа заголовок',
          'id'      => 'payment_metabox_delivery_title',
          'type'    => 'text',
          'show_on_cb' => 'cmb2_hide_if_no_cats',
        ));
       $cmb->add_field( array(
          'name'    => 'Доставка заказа контент',
          'id'      => 'payment_metabox_delivery_text',
          'type'    => 'wysiwyg',
          'options' => array(),
          'show_on_cb' => 'cmb2_hide_if_no_cats',
        ));



   }
