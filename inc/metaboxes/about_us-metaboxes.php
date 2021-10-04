<?php
add_action( 'cmb2_admin_init', 'about_us_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function about_us_metaboxes() {

  	/**
  	 * Initiate the metabox
  	 */
  	$cmb = new_cmb2_box( array(
  		'id'            => 'about_us_metabox',
  		'title'         => __( 'ДОПОЛНИТЕЛЬНЫЕ ПОЛЯ ДЛЯ СТРАНИЦЫ О НАС', 'cmb2' ),
      'object_types'  => array( 'page', ), // Post type
      'show_on'       => array( 'key' => 'page-template', 'value' => "page-templates/page_about_us.php" ),
      'show_in_rest' => WP_REST_Server::READABLE,
  		'context'       => 'normal',
  		'priority'      => 'high',
  		'show_names'    => true, // Show field names on the left
  	));

    $cmb->add_field( array(
       'name' => '==================== ЗАГОЛОВОК СТРАНИЦЫ ====================',
       'type' => 'title',
       'id'   => 'about_us_metabox_section_1'
     ));

     $cmb->add_field( array(
       'name'    => 'Заголовок страницы',
       'id'      => 'about_us_metabox_header_section_title',
       'type'    => 'text',
     ));

     $cmb->add_field( array(
       'name'    => 'Подзаголовок страницы',
       'id'      => 'about_us_metabox_header_section_sub_title',
       'type'    => 'textarea_small',
     ));


     $cmb->add_field( array(
        'name' => '==================== ОСНОВНОЙ ПЕРВАЯ СЕКЦИЯ ====================',
        'type' => 'title',
        'id'   => 'about_us_metabox_section_2'
      ));

      $cmb->add_field( array(
        'name'    => 'Название секции',
        'id'      => 'about_us_metabox_section_1_title',
        'type'    => 'text',
      ));

      $cmb->add_field( array(
        'name'    => 'Контент секции',
        'id'      => 'about_us_metabox_section_1_text',
        'type'    => 'textarea',
      ));

      $cmb->add_field( array(
        'name'    => 'Картинка секции',
        'id'      => 'about_us_metabox_section_1_img',
        'type'    => 'file',
        'preview_size' => array( 450, 250),
        'show_on_cb' => 'cmb2_hide_if_no_cats',
      ));

      $cmb->add_field( array(
         'name' => '==================== ОСНОВНОЙ ВТОРАЯ СЕКЦИЯ ====================',
         'type' => 'title',
         'id'   => 'about_us_metabox_section_3'
       ));

       $cmb->add_field( array(
         'name'    => 'Название секции',
         'id'      => 'about_us_metabox_section_2_title',
         'type'    => 'text',
       ));

       $cmb->add_field( array(
         'name'    => 'Контент секции',
         'id'      => 'about_us_metabox_section_2_text',
         'type'    => 'textarea',
       ));

       $cmb->add_field( array(
         'name'    => 'Картинка секции',
         'id'      => 'about_us_metabox_section_2_img',
         'type'    => 'file',
         'preview_size' => array( 450, 250),
         'show_on_cb' => 'cmb2_hide_if_no_cats',
       ));



   }
