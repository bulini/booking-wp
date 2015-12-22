<?php
require get_template_directory() . '/libs/post-type.php';
require get_template_directory() . '/libs/theme-init.php';
require get_template_directory() . '/libs/admin-options.php';
require get_template_directory() . '/libs/booking-options.php';
require get_template_directory() . '/libs/booking-handler.php';
require get_template_directory() . '/libs/ajax-handler.php';
//require get_template_directory() . '/libs/theme-customization.php';
require get_template_directory() . '/libs/metaboxes/accommodation.php';
require get_template_directory() . '/libs/metaboxes/property.php';
require get_template_directory() . '/libs/metaboxes/booking.php';
require get_template_directory() . '/libs/metaboxes/home-block.php';
/*
require('../libs/booking-handler.php');
require('../libs/admin-options.php');
require('../libs/booking-options.php');
require('../libs/metaboxes/accommodation.php');
require('../libs/metaboxes/home-block.php');
require('../libs/metaboxes/booking.php');
require('../libs/metaboxes/property.php');


function poly_languages() {
	global $polylang;
	if (isset($polylang))
	$languages = $polylang->get_languages_list();
	return $languages;
}

add_action('init', 'bookingwp_email_strings'); // the function is called only when all plugins are loaded

function bookingwp_email_strings() {

  $name='bookingwp-quoted-subject';
  $string = booking_get_option('bookingwp_quoted_email_subject');
  $group = 'bookingwp';
  $multiline = true;
  pll_register_string($name, $string, $group, $multiline);



    $name='bookingwp-quoted';
    $string = booking_get_option('bookingwp_quoted_email');
    $group = 'bookingwp';
    $multiline = true;
    pll_register_string($name, $string, $group, $multiline);

    $name='bookingwp-refused-subject';
    $string = booking_get_option('bookingwp_refused_email_subject');
    $group = 'bookingwp';
    $multiline = true;
    pll_register_string($name, $string, $group, $multiline);

    $name='bookingwp-refused';
    $string = booking_get_option('bookingwp_refused_email');
    $group = 'bookingwp';
    $multiline = true;
    pll_register_string($name, $string, $group, $multiline);

    $name='bookingwp-confirmed-email-subject';
    $string = booking_get_option('bookingwp_confirmed_email_subject');
    $group = 'bookingwp';
    $multiline = true;
    pll_register_string($name, $string, $group, $multiline);


    $name='bookingwp-confirmed';
    $string = booking_get_option('bookingwp_confirmed_email');
    $group = 'bookingwp';
    $multiline = true;
    pll_register_string($name, $string, $group, $multiline);


    $name='bookingwp-confirm-button';
    $string = booking_get_option('bookingwp_confirm_button');
    $group = 'bookingwp';
    $multiline = true;
    pll_register_string($name, $string, $group, $multiline);

    $name='bookingwp-cancellation-policy';
    $string = booking_get_option('bookingwp_cancellation_policy');
    $group = 'bookingwp';
    $multiline = true;
    pll_register_string($name, $string, $group, $multiline);


}

function current_language()
{
	$lang = (function_exists('pll_current_language')) ? pll_current_language() : get_locale();
	return $lang;
}

add_action( 'init', 'register_my_menus' );



function remove_home_filter() {
	global $polylang;
	if ($polylang)
		remove_filter('home', array(&$polylang, 'home'));
}
add_action('wp', 'remove_home_filter', 99);

function service_list($lang)
{
	$service_list=mytheme_get_option('custom_services_list_'.$lang);
	$services = explode(",", $service_list);
	$i=0;
	$html='<table class="table table-striped mt30">
              <tbody>';
	foreach($services as $service){
		$html.='<tr><td><i class="fa fa-check-circle"></i> '.$service.'</td></tr>';
	}
	$html.='</tbody>
		</table>';
	return $html;
}

*/

//navbar hack
add_filter('body_class', 'mbe_body_class');

function mbe_body_class($classes){
    if(is_user_logged_in()){
        $classes[] = 'body-logged-in';
    } else{
        $classes[] = 'body-logged-out';
    }
    return $classes;
}


function get_accommodations(){
	return query_posts( array ( 'post_type' => 'accommodations', 'posts_per_page' => -1,'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 )) );
}

function get_homeboxes(){
	return query_posts( array ( 'post_type' => 'home-blocks', 'posts_per_page' => -1, 'order' => 'ASC') );
}

function get_slides(){
	return query_posts( array ( 'post_type' => 'slides', 'posts_per_page' => -1, 'order' => 'ASC') );
}

function get_tabs(){
	return query_posts( array ( 'post_type' => 'tabs', 'posts_per_page' => -1, 'order' => 'ASC') );
}

function get_testimonials(){
	return query_posts( array ( 'post_type' => 'testimonials', 'posts_per_page' => -1, 'order' => 'ASC') );
}

function get_roomtypes($parent=0){

		return query_posts( array ('post_type' => 'properties', 'post_parent' => $parent, 'posts_per_page' => -1, 'order' => 'ASC'));

}

function OneGallery($id)
{
	$id = (function_exists('pll_get_post')) ? pll_get_post($id) : $id;
	$args = array(
		'post_type' => 'attachment',
		'numberposts' => $limit,
		'orderby' => 'menu_order',
		'post_parent' => $id
	);
	$attachments = get_posts($args);
	return $attachments;
}

function service_list($lang)
{
	$service_list=mytheme_get_option('custom_services_list_'.$lang);
	$services = explode(",", $service_list);
	$i=0;
	$html='<table class="table table-striped mt30">
              <tbody>';
	foreach($services as $service){
		$html.='<tr><td><i class="fa fa-check-circle"></i> '.$service.'</td></tr>';
	}
	$html.='</tbody>
		</table>';
	return $html;
}

function LogoImage()
{
	$options=get_option('bookingwp_theme_options');
	$uploads = wp_upload_dir();
	$logo=$options['image_upload_test'];
	return $logo;
}


function load_theme_options()
{
    $options=get_option('bookingwp_theme_options');
    return $options;
}



?>
