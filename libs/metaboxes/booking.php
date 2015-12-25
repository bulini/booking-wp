<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */




/**
 * Gets a number of posts and displays them as options
 * @param  array $query_args Optional. Overrides defaults.
 * @return array             An array of options that matches the CMB options array
 */
function cmb_get_post_options( $query_args ) {

    $args = wp_parse_args( $query_args, array(
        'post_type' => 'accommodations',
        'numberposts' => 10,
    ) );

    $posts = get_posts( $args );

    $post_options = array();
    if ( $posts ) {
        foreach ( $posts as $post ) {
                   $post_options[] = array(
                       'name' => $post->post_title,
                       'value' => $post->ID
                   );
        }
    }

    return $post_options;
}





add_filter( 'cmb_meta_boxes', 'cmb_booking_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_booking_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['booking_metabox'] = array(
		'id'         => 'booking_metabox',
		'title'      => __( 'Booking Box', 'bookingwp' ),
		'pages'      => array( 'bookings'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
          array(
                'name'    => __( 'Select Room', 'bookingwp' ),
                'desc'    => __( 'field description (optional)', 'bookingwp' ),
                'id'      => $prefix . 'room_id',
                'type'    => 'select',
                'options' => cmb_get_post_options( array( 'post_type' => 'accommodations', 'numberposts' => 5 ) ),
            ),




			array(
				'name' => __( 'email', 'bookingwp' ),
				'desc' => __( 'field description (optional)', 'bookingwp' ),
				'id'   => $prefix . 'email',
				'type' => 'text_medium',
				// 'repeatable' => true,
			),


			array(
			    'name' => 'checkin',
			    'id'   => $prefix . 'checkin',
			    'type' => 'text_date_timestamp',
			    // 'timezone_meta_key' => $prefix . 'timezone',
			    'date_format' => 'm/d/Y',
			),

			array(
			    'name' => 'checkout',
			    'id'   => $prefix . 'checkout',
			    'type' => 'text_date_timestamp',
			    // 'timezone_meta_key' => $prefix . 'timezone',
			    'date_format' => 'm/d/Y',
			),
			array(
				'name' => __( 'adults', 'bookingwp' ),
				'desc' => __( 'field description (optional)', 'bookingwp' ),
				'id'   => $prefix . 'adults',
				'type' => 'text_small',
				// 'repeatable' => true,
			),

			array(
				'name' => __( 'children', 'bookingwp' ),
				'desc' => __( 'field description (optional)', 'bookingwp' ),
				'id'   => $prefix . 'children',
				'type' => 'text_small',
				// 'repeatable' => true,
			),

			array(
			    'name'    => 'Status',
			    'desc'    => 'Seleziona',
			    'id'      => $prefix . 'status',
			    'type'    => 'select',
			    'options' => array(
			        'pending' => __( 'Pending', 'bookingwp' ),
			        'quoted'   => __( 'Quoted', 'bookingwp' ),
			        'booked'     => __( 'Booked', 'bookingwp' ),
			        'refused'     => __( 'Refused', 'bookingwp' ),
			    ),
			    'default' => 'pending',
			),



		),
	);


	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_booking_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_booking_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
         require_once 'Custom-Metaboxes-and-Fields-for-WordPress-master/init.php';


}
