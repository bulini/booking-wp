<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */
if(function_exists('poly_languages')) {
	$languages = poly_languages();
}




add_filter( 'cmb_meta_boxes', 'cmb_property_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_property_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['property_metabox'] = array(
		'id'         => 'property_metabox',
		'title'      => __( 'Room prices management', 'wpbooking' ),
		'pages'      => array( 'properties'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
			array(
				'name' => 'Tipologia prezzi',
				'desc' => '',
				'id' => $prefix . 'type',
				'taxonomy' => 'types', //Enter Taxonomy Slug
				'type' => 'taxonomy_select',
			),

			array(
				'name' => __( 'Heading text', 'wpbooking' ),
				'desc' => __( 'field description (optional)', 'wpbooking' ),
				'id'   => $prefix . 'heading_text',
				'type' => 'text_medium',
				// 'repeatable' => true,
			),

			array(
				'name' => __( 'Base price', 'wpbooking' ),
				'desc' => __( 'field description (optional)', 'wpbooking' ),
				'id'   => $prefix . 'heading_text',
				'type' => 'min_price',
				// 'repeatable' => true,
			),

			array(
				'name' => __( 'People', 'wpbooking' ),
				'desc' => __( 'field description (optional)', 'wpbooking' ),
				'id'   => $prefix . 'people',
				'type' => 'text_medium',
				// 'repeatable' => true,
			),

			array(
			    'id'          => $prefix . 'prices',
			    'type'        => 'group',
			    'description' => __( 'Periodi di prezzo', 'cmb2' ),
			    'options'     => array(
			        'group_title'   => __( 'Stagione {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
			        'add_button'    => __( 'Aggiungi periodo', 'cmb2' ),
			        'remove_button' => __( 'Rimuovi periodo', 'cmb2' ),
			        'sortable'      => true, // beta
			    ),
			    // Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
			    'fields'      => array(

			        array(
			            'name' => 'Description',
			            'description' => 'Write a short description for this entry',
			            'id'   => 'period_name',
			            'type' => 'text',
			        ),
					array(
					    'name' => 'Start',
					    'id'   => $prefix . 'start_date',
					    'type' => 'text_date_timestamp',
					    // 'timezone_meta_key' => $prefix . 'timezone',
					    'date_format' => 'm/d/Y',
					),

					array(
					    'name' => 'End',
					    'id'   => $prefix . 'end_date',
					    'type' => 'text_date_timestamp',
					    // 'timezone_meta_key' => $prefix . 'timezone',
					    'date_format' => 'm/d/Y',
					),

					array(
				    'name' => 'Test Money',
				    'desc' => 'field description (optional)',
				    'id' => $prefix . 'price',
				    'type' => 'text_money',
				     'before' => '&euro;', // Replaces default '$'
				),


		),
),


		),
	);


	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_property_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_property_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
         require_once 'Custom-Metaboxes-and-Fields-for-WordPress-master/init.php';


}
