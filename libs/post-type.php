<?php
function setup_booking_post_type()
{

	/*
	******* Home Blocks (new) ********
	*/


	register_post_type('home-blocks', array(	'label' => 'home-blocks','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => 'home-blocks'),'query_var' => false,'exclude_from_search' => true,'supports' => array('title','editor','thumbnail'),'labels' => array (
	  'name' => 'Home Blocks',
	  'singular_name' =>  __( 'Home Block', 'bookingwp' ),
	  'menu_name' =>  __( 'Home Blocks', 'bookingwp' ),
	  'add_new' =>  __( 'Add home Block', 'bookingwp' ),
	  'add_new_item' =>  __( 'Add home Block', 'bookingwp' ),
	  'edit' => __( 'Edit', 'bookingwp' ),
	  'edit_item' => 'Edit Block',
	  'new_item' => 'New Block',
	  'view' => 'View Block',
	  'view_item' => 'View Block',
	  'search_items' => 'Search Block',
	  'not_found' => 'No Block Found',
	  'not_found_in_trash' => 'No Block Found in Trash',
	  'parent' => 'Parent Block',
	),) );


	/*
	******* Home Tabs (new) ********
	*/


	register_post_type('tabs', array(	'label' => 'tabs','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => 'tabs'),'query_var' => false,'exclude_from_search' => true,'supports' => array('title','editor','thumbnail'),'labels' => array (
	  'name' => 'Tabs',
	  'singular_name' => 'home tab',
	  'menu_name' => __( 'Home tabs', 'bookingwp' ),
	  'add_new' => 'Add tab',
	  'add_new_item' => 'Add New tab',
	  'edit' => __( 'Edit', 'bookingwp' ),
	  'edit_item' => 'Edit tab',
	  'new_item' => 'New tab',
	  'view' => 'View tab',
	  'view_item' => 'View tab',
	  'search_items' => 'Search tab',
	  'not_found' => 'No tab Found',
	  'not_found_in_trash' => 'No tab Found in Trash',
	  'parent' => 'Parent tab',
	),) );

	/*
	******* Home Slogan / Reviews (new) ********
	*/


	register_post_type('testimonials', array(	'label' => 'tabs','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => 'testimonial'),'query_var' => false,'exclude_from_search' => true,'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes',),'labels' => array (
	  'name' => 'Testimonials',
	  'singular_name' => 'testimonial',
	  'menu_name' => __( 'Testimonial', 'bookingwp' ),
	  'add_new' => 'Add Testimonial',
	  'add_new_item' => 'Add New testimonial',
	  'edit' => __( 'Edit', 'bookingwp' ),
	  'edit_item' => 'Edit testimonial',
	  'new_item' => 'New testimonial',
	  'view' => 'View testimonial',
	  'view_item' => 'View testimonial',
	  'search_items' => 'Search testimonial',
	  'not_found' => 'No testimonial Found',
	  'not_found_in_trash' => 'No testimonial Found in Trash',
	  'parent' => 'Parent testimonial',
	),) );





	/*
	+++ Slides x il tema ++++++
	*/
	register_post_type('slides', array(	'label' => 'Slides','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','map_meta_cap'=>true,'hierarchical' => false,'rewrite' => array('slug' => 'slides'),'query_var' => true,'exclude_from_search' => false,'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes',),'labels' => array (
	  'name' => 'Slides',
	  'singular_name' => 'Slide',
	  'menu_name' => __( 'Slides', 'bookingwp' ),
	  'add_new' => 'Add Slide',
	  'add_new_item' => 'Add New Slide',
	  'edit' => __( 'Edit', 'bookingwp' ),
	  'edit_item' => 'Edit Slide',
	  'new_item' => 'New Slide',
	  'view' => 'View Slide',
	  'view_item' => 'View Slide',
	  'search_items' => 'Search Slides',
	  'not_found' => 'No Slides Found',
	  'not_found_in_trash' => 'No Slides Found in Trash',
	  'parent' => 'Parent Slide',
	),) );


	/*
	******* Properties (new) ********
	*/


	register_post_type('accommodations', array(	'label' => 'Accommodations','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'show_in_nav_menus' => true, 'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => 'listing'),'query_var' => true,'exclude_from_search' => false,'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes',),'labels' => array (
	  'name' => __( 'Accommodations', 'bookingwp' ),
	  'singular_name' => 'Accommodation',
	  'menu_name' => __( 'Accommodations', 'bookingwp' ),
	  'add_new' => __( 'Add accommodation', 'bookingwp' ),
	  'add_new_item' => __( 'Add new accommodation', 'bookingwp' ),
	  'edit' => __( 'Edit', 'bookingwp' ),
	  'edit_item' => 'Edit Accommodation',
	  'new_item' => 'New Accommodation',
	  'view' => 'View Accommodation',
	  'view_item' => 'View Accommodation',
	  'search_items' => 'Search Accommodations',
	  'not_found' => 'No Accommodations Found',
	  'not_found_in_trash' => 'No Accommodations Found in Trash',
	  'parent' => 'Parent Accommodation',
	),) );


	/*
	******* Accommodations (saranno figlie di properties es hotel-> camere)********
	*/


	register_post_type('properties', array(	'label' => 'Properties','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => 'prop'),'query_var' => true,'exclude_from_search' => false,'supports' => array('title','editor','custom-fields','thumbnail','author','page-attributes'),'labels' => array (
	  'name' => __( 'Allotments', 'bookingwp' ),
	  'singular_name' => __('Allotment', 'bookingwp'),
	  'menu_name' => __('Allotments', 'bookingwp'),
	  'add_new' => __('Add Allotment', 'bookingwp'),
	  'add_new_item' => __('Add new Allotment', 'bookingwp'),
	  'edit' => __( 'Edit', 'bookingwp' ),
	  'edit_item' => 'Edit Property',
	  'new_item' => 'New Property',
	  'view' => 'View Property',
	  'view_item' => 'View Property',
	  'search_items' => 'Search Property',
	  'not_found' => 'No Property Found',
	  'not_found_in_trash' => 'No Property Found in Trash',
	  'parent' => 'Parent Property',
	),) );

	/*
	+++ Booking ++++++
	*/
	register_post_type('bookings', array(	'label' => 'booking','description' => '','public' => false,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => 'bookings'),'query_var' => true,'exclude_from_search' => false,'supports' => array('title','custom-fields'),'labels' => array (
	  'name' => __('Bookings', 'bookingwp'),
	  'singular_name' => __('booking', 'bookingwp'),
	  'menu_name' => __('booking', 'bookingwp'),
	  'add_new' => __('Add booking', 'bookingwp'),
	  'add_new_item' => __('Add booking', 'bookingwp'),
	  'edit' => __( 'Edit', 'bookingwp' ),
	  'edit_item' => 'Edit booking',
	  'new_item' => 'New booking',
	  'view' => 'View booking',
	  'view_item' => 'View booking',
	  'search_items' => 'Search booking',
	  'not_found' => 'No booking Found',
	  'not_found_in_trash' => 'No booking Found in Trash',
	  'parent' => 'Parent booking',
	),
	'status' => array(
        'draft' => array(
          'label' => 'New'
        )
        ,'pending' => array(
          'label' => 'Pending'
        )
        ,'quoted' => array(
          'label' => 'quoted: Waiting for Approval'
        )
        ,'booked' => array(
          'label' => 'Inspection Approved'
        )
        ,'refused' => array(
          'label' => 'Refused'
        )
      )

	) );


	/*
	******* Taxonomy Areas ********
	*/


	register_taxonomy('areas',array (
	  0 => 'accommodations',
	  1 => 'advertisement',
	),array( 'hierarchical' => true, 'label' => 'Areas','show_ui' => true,'query_var' => true,'rewrite' => array('slug' => 'zone'),'singular_label' => 'Area') );

	register_taxonomy('amenities',array (
	  0 => 'accommodations',
	),array( 'hierarchical' => true, 'label' => 'Amenities','show_ui' => true,'query_var' => true,'rewrite' => array('slug' => 'amenities'),'singular_label' => 'Amenity') );


// A callback function to add a custom field to our "presenters" taxonomy
function icon_fields($tag) {
   // Check for existing taxonomy meta for the term you're editing
    $t_id = $tag->term_id; // Get the ID of the term you're editing
    $term_meta = get_option( "taxonomy_term_$t_id" ); // Do the check
?>

<tr class="form-field">
	<th scope="row" valign="top">
		<label for="fa-icon"><?php _e('Font Awesome Icon'); ?></label>
	</th>
	<td>
		<input type="text" name="term_meta[fa-icon]" id="term_meta[fa-icon]" size="25" style="width:60%;" class="form-control icp icp-auto" value="<?php echo $term_meta['fa-icon'] ? $term_meta['fa-icon'] : ''; ?>"><br />
		<span class="description"><?php _e('Font Awesome Icon'); ?></span>
	</td>
</tr>

<?php
}


// A callback function to save our extra taxonomy field(s)
function save_icon_fields( $term_id ) {
    if ( isset( $_POST['term_meta'] ) ) {
        $t_id = $term_id;
        $term_meta = get_option( "taxonomy_term_$t_id" );
        $cat_keys = array_keys( $_POST['term_meta'] );
            foreach ( $cat_keys as $key ){
            if ( isset( $_POST['term_meta'][$key] ) ){
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        //save the option array
        update_option( "taxonomy_term_$t_id", $term_meta );
    }
}


// Add the fields to the "presenters" taxonomy, using our callback function
add_action( 'amenities_edit_form_fields', 'icon_fields', 10, 2 );
add_action( 'amenities_add_form_fields', 'icon_fields', 10, 2 );

// Save the changes made on the "presenters" taxonomy, using our callback function
add_action( 'edited_amenities', 'save_icon_fields', 10, 2 );

	/*
	******* Taxonomy Type ********
	*/

	register_taxonomy('types',array (
	  0 => 'accommodations',
	  1 => 'properties',
	),array( 'hierarchical' => true, 'label' => 'Types','show_ui' => true,'query_var' => true,'rewrite' => array('slug' => 'property-type'),'singular_label' => 'Type') );


	/*
	******* Taxonomy Stars (stelle hotel e classificazioni varie ) ********
	*/

	register_taxonomy('stars',array (
	  0 => 'accommodations',
	),array( 'hierarchical' => true, 'label' => 'stars','show_ui' => true,'query_var' => true,'rewrite' => array('slug' => 'stars'),'singular_label' => 'Stars') );

	/*
	******* gestione eruoli e capabilities ********
	*/

$result = add_role('customer', 'Customer', array(
    'read' => true, // True allows that capability
    'edit_posts' => false,
    'delete_posts' => false // Use false to explicitly deny

));

$result = add_role('property_owner', 'Owner / Manager', array(

));

$result = add_role('sales_agent', 'agente di vendita', array(
    'read' => true, // True allows that capability
    'edit_posts' => false,
    'delete_posts' => false, // Use false to explicitly deny
    'create_users' => true
));




}


add_action('init', 'setup_booking_post_type');


function request_status(){
	register_post_status( 'waiting', array(
		'label'                     => _x( 'waiting', 'bookings' ),
		'public'                    => true,
		'exclude_from_search'       => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'label_count'               => _n_noop( 'Pending <span class="count">(%s)</span>', 'Waiting <span class="count">(%s)</span>' ),
	) );

	register_post_status( 'quoted', array(
		'label'                     => _x( 'quoted', 'bookings' ),
		'public'                    => true,
		'exclude_from_search'       => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'label_count'               => _n_noop( 'Quoted <span class="count">(%s)</span>', 'Quoted <span class="count">(%s)</span>' ),
	) );


	register_post_status( 'refused', array(
		'label'                     => _x( 'refused', 'bookings' ),
		'public'                    => true,
		'exclude_from_search'       => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'label_count'               => _n_noop( 'Refused <span class="count">(%s)</span>', 'Refused <span class="count">(%s)</span>' ),
	) );


	register_post_status( 'accepted', array(
		'label'                     => _x( 'accepted', 'bookings' ),
		'public'                    => true,
		'exclude_from_search'       => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'label_count'               => _n_noop( 'Accepted <span class="count">(%s)</span>', 'Accepted <span class="count">(%s)</span>' ),
	) );

	register_post_status( 'booked', array(
		'label'                     => _x( 'booked', 'bookings' ),
		'public'                    => true,
		'exclude_from_search'       => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'label_count'               => _n_noop( 'Booked <span class="count">(%s)</span>', 'Booked <span class="count">(%s)</span>' ),
	) );


}
add_action( 'init', 'request_status' );


?>
