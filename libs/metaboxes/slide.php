<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_slide_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_slide_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['slide_metabox'] = array(
		'id'         => 'slide_metabox',
		'title'      => __( 'Slide Box', 'bookingwp' ),
		'pages'      => array( 'slides'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(

			array(
				'name' => __( 'Heading text', 'bookingwp' ),
				'desc' => __( 'field description (optional)', 'bookingwp' ),
				'id'   => $prefix . 'heading_text',
				'type' => 'text_medium',
				// 'repeatable' => true,
			),
			
			
			array(
				'name' => __( 'Subheading text', 'bookingwp' ),
				'desc' => __( 'field description (optional)', 'bookingwp' ),
				'id'   => $prefix . 'subheading_text',
				'type' => 'text_medium',
				// 'repeatable' => true,
			),
	
			array(
				'name'    => __( 'Test Color Picker', 'bookingwp' ),
				'desc'    => __( 'field description (optional)', 'bookingwp' ),
				'id'      => $prefix . 'test_colorpicker',
				'type'    => 'colorpicker',
				'default' => '#ffffff'
			),


		),
	);


	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_slide_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_slide_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
         require_once 'Custom-Metaboxes-and-Fields-for-WordPress-master/init.php';


}