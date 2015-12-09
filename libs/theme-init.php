<?php
/*
theme-init.php
*/
//remove_filter('the_content','wpautop');

//image size
add_theme_support( 'post-thumbnails' );

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'homepage-thumb', 356, 228, true ); // (ritagliata)
	//add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
	add_image_size( 'homepage-slider', 1700, 449, true ); //(cropped)
	add_image_size( 'slider-single', 750, 481, true ); //(cropped)
	add_image_size( 'gallery', 800, 504, true ); //(cropped)
	//add_image_size( 'slider-no-crop', 900, 450, false); //(cropped)
	//add_image_size( 'slider-home', 9999, 480, false); //(cropped)
    //add_image_size( 'slider-home-640', 640, 480, true); //(cropped)

}


/* Add stylesheets and custom js to my theme */

	function theme_setup() {


		wp_enqueue_style( 'style', get_template_directory_uri().'/assets/css/style.css');
		//wp_enqueue_style( 'animate', get_template_directory_uri().'/assets/css/animate.css');
		wp_enqueue_style( 'carousel', get_template_directory_uri().'/assets/css/owl.carousel.css');
		//wp_enqueue_style( 'owl-theme', get_template_directory_uri().'/assets/css/owl.theme.css');
		wp_enqueue_style( 'owl-transitions', get_template_directory_uri().'/assets/css/owl.transitions.css');

		wp_enqueue_style( 'prettyphoto', get_template_directory_uri().'/assets/css/prettyPhoto.css');
		//wp_enqueue_style( 'jquery-ui', get_template_directory_uri().'/assets/css/smoothness/jquery-ui-1.10.4.custom.min.css');
		//wp_enqueue_style( 'rs-plugin', get_template_directory_uri().'/assets/rs-plugin/css/settings.css');
		//wp_enqueue_style( 'theme', get_template_directory_uri().'/assets/css/theme.css');
		//wp_enqueue_style( 'ihover', get_template_directory_uri().'/assets/css/ihover.css');
		//wp_enqueue_style( 'responsive', get_template_directory_uri().'/assets/css/responsive.css');
		/*
		wp_enqueue_style( 'calendar', get_template_directory_uri().'/css/fullcalendar.css');
		*/
		wp_enqueue_style( 'style', get_stylesheet_uri() );

		//js
		wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-2.1.4.min.js', array(), '2.1.4', true );
		wp_enqueue_script( 'prettyPhoto', get_template_directory_uri() . '/assets/js/jquery.prettyPhoto.js', array(), '1.11.0', true );
		wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), '2.1.4', true );
		wp_enqueue_script( 'theme-js', get_template_directory_uri() . '/assets/js/theme.js', array(), '2.1.4', true );

		wp_enqueue_script( 'sensor', "http://maps.googleapis.com/maps/api/js?sensor=false", array(), '2.1.4', true );
		wp_enqueue_script( 'gmap3', get_template_directory_uri() . '/assets/js/gmap3.min.js', array(), '2.1.4', true );
		wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), '2.1.4', true );
		wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/assets/js/jquery-ui-1.10.4.custom.min.js', array(), '2.1.4', true );
		wp_enqueue_script( 'ba-outside', get_template_directory_uri() . '/assets/js/jquery.ba-outside-events.min.js', array(), '2.1.4', true );
		wp_enqueue_script( 'jqueryui', get_template_directory_uri() . '/assets/js/jqueryui.js', array(), '2.1.4', true );
		wp_enqueue_script( 'vide', get_template_directory_uri() . '/assets/js/jquery.vide.min.js', array(), '2.1.4', true );
		wp_enqueue_script( 'tab', get_template_directory_uri() . '/assets/js/tab.js', array(), '2.1.4', true );
		wp_enqueue_script( 'jquery-matchHeight', get_template_directory_uri() . '/assets/js/jquery.matchHeight-min.js', array(), '2.1.4', true );
		wp_enqueue_script( 'ajax-handler', get_template_directory_uri() . '/assets/js/ajax-handler.js', array(), '2.1.4', true );


	}


add_action( 'wp_enqueue_scripts', 'theme_setup' );
//add_action( 'wp_enqueue_scripts', 'custom_scripts' );

// Register Script for wp-admin
function custom_scripts() {
	//wp_enqueue_style( 'bootstrap-styles', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.2.0', 'all' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.2.0', 'all' );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.2.0', true );

	wp_enqueue_style( 'fontawesome-iconpicker-css', get_template_directory_uri().'/assets/css/fontawesome-iconpicker.css');


	wp_enqueue_script( 'googlemaps', 'https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places', array(), '1.0.0', true );
	wp_enqueue_script( 'geocomplete', get_template_directory_uri() . '/assets/js/jquery.geocomplete.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'fontawesome-iconpicker', get_template_directory_uri() . '/assets/js/fontawesome-iconpicker.js', array(), '1.0.0', true );
	wp_enqueue_script( 'admin', get_template_directory_uri() . '/assets/js/admin.js', array(), '1.0.0', true );
}



/* enable contributors upload */

if ( current_user_can('contributor') && !current_user_can('upload_files') )
add_action('admin_init', 'allow_contributor_uploads');

function allow_contributor_uploads() {
     $contributor = get_role('contributor');
     $contributor->add_cap('upload_files');
}


/* Add colums with thumbbnail to admin post screen */

if ( !function_exists('fb_AddThumbColumn') && function_exists('add_theme_support') ) {

	function fb_AddThumbColumn($cols) {
		$cols['thumbnail'] = __('Thumbnail');
		return $cols;
	}

	function fb_AddThumbValue($column_name, $post_id) {

			$width = (int) 35;
			$height = (int) 35;

			if ( 'thumbnail' == $column_name ) {
				// thumbnail of WP 2.9
				$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
				// image from gallery
				$attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
				if ($thumbnail_id)
					$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
				elseif ($attachments) {
					foreach ( $attachments as $attachment_id => $attachment ) {
						$thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
					}
				}
					if ( isset($thumb) && $thumb ) {
						echo $thumb;
					} else {
						echo __('None');
					}
			}
	}

	// for posts
	add_filter( 'manage_posts_columns', 'fb_AddThumbColumn' );
	add_action( 'manage_posts_custom_column', 'fb_AddThumbValue', 10, 2 );

	// for pages
	add_filter( 'manage_pages_columns', 'fb_AddThumbColumn' );
	add_action( 'manage_pages_custom_column', 'fb_AddThumbValue', 10, 2 );

	// for accommodations
	add_filter( 'manage_accommodations_columns', 'fb_AddThumbColumn' );
	add_action( 'manage_accommodations_custom_column', 'fb_AddThumbValue', 10, 2 );

}


// Hook into the 'wp_enqueue_scripts' action
add_action( 'admin_enqueue_scripts', 'custom_scripts' );


?>
