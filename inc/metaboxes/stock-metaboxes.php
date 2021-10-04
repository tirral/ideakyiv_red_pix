<?php


add_action( 'cmb2_init', 'stock_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function stock_metaboxes() {



	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'stock_metabox',
		'title'         => __( 'ДОПОЛНИТЕЛЬНЫЕ ПОЛЯ ДЛЯ АКЦИЙ', 'cmb2' ),
    'object_types'  => 'stock',  // Post type
    'show_in_rest' => WP_REST_Server::READABLE,
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );


	$cmb->add_field( array(
	 'name' => 'Размер скидки',
	 'id' => 'stock_value',
	 'type' => 'text',
	 'show_in_rest' => WP_REST_Server::ALLMETHODS,
	) );


	$cmb->add_field( array(
	'name'    => 'Изображение',
	'id'      => 'stock_img',
	'type'    => 'file',
	'preview_size' => array( 400, 300 ), // Image size to use when previewing in the admin.
));


	$cmb->add_field( array(
		'name' => 'Выберете дату окончания акции',
		'id'   => 'stock_time_end',
		'type' => 'text_date',
		'date_format' => 'd.m.Y',
		'attributes' => array(
			// CMB2 checks for datepicker override data here:
			'data-datepicker' => json_encode( array(
				// dayNames: http://api.jqueryui.com/datepicker/#option-dayNames
				'dayNames' => array( 'Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi' ),
				// monthNamesShort: http://api.jqueryui.com/datepicker/#option-monthNamesShort
				'monthNamesShort' => explode( ',', 'Январь,Февраль,Март,Апрель,Май,Июнь,Июль,Август,Сентябрь,Октябрь,Ноябрь,Декабрь' ),
				// yearRange: http://api.jqueryui.com/datepicker/#option-yearRange
				// and http://stackoverflow.com/a/13865256/1883421
				'yearRange' => '-100:+0',
				// Get 1990 through 10 years from now.
				// 'yearRange' => '1990:'. ( date( 'Y' ) + 10 ),
			) ),
		),
		'show_in_rest' => WP_REST_Server::ALLMETHODS,
	) );


	$cmb->add_field( array(
	 'name' => 'Краткое описание акции',
	 'id' => 'stock_header_description',
	 'type' => 'textarea_small',
	 'show_in_rest' => WP_REST_Server::ALLMETHODS,
	) );



}
