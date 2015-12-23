<?php

add_action( 'init', 'prefix_disable_post_page_analysis' );

function my_manage_columns( $columns ) {
  unset($columns['column_simplemasonry']);
  unset($columns['thumbnail']);
	return $columns;
}

function my_column_init() {
  add_filter( 'manage_bookings_posts_columns' , 'my_manage_columns' );
}
add_action( 'admin_init' , 'my_column_init' );


function prefix_is_edit_screen( $post_types = '' ) {
	if ( ! is_admin() || ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
		return false;
	}
	global $pagenow;
	// Return true if we're on any admin edit screen.
	if ( ! $post_types && 'edit.php' === $pagenow ) {
		return true;
	}
	elseif ( $post_types ) {
		// Grab the current post type from the query string and set 'post' as a fallback.
		$current_type = isset( $_REQUEST['post_type'] ) ? $_REQUEST['post_type'] : 'post';
		foreach ( $post_types as $post_type ) {
			// Return true if we're on the edit screen of any user-defined post types.
			if ( 'edit.php' === $pagenow && $post_type === sanitize_key( $current_type ) ) {
				return true;
			}
		}
	}
	return false;
}

function prefix_disable_post_page_analysis() {
	if ( ! prefix_is_edit_screen( array( 'bookings', 'properties' ) ) ) {
		return;
	}
	// Disable Yoast admin columns.
	add_filter( 'wpseo_use_page_analysis', '__return_false' );
}


add_filter('manage_bookings_posts_columns', 'bookings_columns');

function bookings_columns($defaults) {
    $defaults['name'] = 'name';
    $defaults['email'] = 'email';
    $defaults['checkin'] = 'checkin';
    $defaults['checkout'] = 'checkout';
    $defaults['adults'] = 'adults';
    $defaults['children'] = 'children';
    $defaults['price'] = 'price';
    $defaults['room'] = 'room';

    return $defaults;

}

add_action('manage_bookings_posts_custom_column','column_page_template',10,2);

function column_page_template($column_name, $post_ID) {

		if ($column_name == 'name') {
				$name = get_post_meta($post_ID,'name',true);
				if (!empty($name)) {
						echo '<p>'.$name.' </p>';
				}
		}

    if ($column_name == 'email') {
        $email = get_post_meta($post_ID,'email',true);
        if (!empty($email)) {
            echo '<p>'.$email.' </p>';
        }
    }

		if ($column_name == 'checkin') {
        $checkin = get_post_meta($post_ID,'checkin',true);
        if (!empty($checkin)) {
            echo '<p>'.date('d/m/Y',$checkin).' </p>';
        }
    }

		if ($column_name == 'checkout') {
        $checkout = get_post_meta($post_ID,'checkout',true);
        if (!empty($checkout)) {
            echo '<p>'.date('d/m/Y',$checkout).' </p>';
        }
    }

		if ($column_name == 'adults') {
        $adults = get_post_meta($post_ID,'adults',true);
        if (!empty($adults)) {
            echo '<p>'.$adults.' </p>';
        }
    }

		if ($column_name == 'children') {
        $children = get_post_meta($post_ID,'children',true);
        if (!empty($children)) {
            echo '<p>'.$children.' </p>';
        }
    }

		if ($column_name == 'price') {
        $price = get_post_meta($post_ID,'price',true);
        if (!empty($price)) {
            echo '<p>'.$price.' </p>';
        }
    }

		if ($column_name == 'room') {
        $room = get_post_meta($post_ID,'room',true);
        if (!empty($room)) {
            echo '<p>'.get_the_title($room).' </p>';
        }
    }


}

add_filter( 'wp_mail_content_type', 'set_html_content_type' );

function set_html_content_type() {
	return 'text/html';
}



// Email address verification, do not edit.
function isEmail($email) {
		return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
}


function convert_date_to_timestamp($date,$format='d/m/Y')
{
	$date = date_parse_from_format($format, $date);
	$timestamp = mktime(0, 0, 0, $date['month'], $date['day'], $date['year']);
	return $timestamp;
}

function default_allotment($term,$people)
{
  //term =
  $args=array(
  'types' => $term,
  'post_type' => 'properties',
  'post_status' => 'publish',
  'meta_key' =>'people',
  'meta_value' => $people,
  //'meta_query' => array('key' => 'people', 'value'=>$people),
  'posts_per_page' => 1,
  'caller_get_posts'=> 1
);

  $allotment = get_posts($args);
  return $allotment[0]->ID;
  wp_reset_query();
}


function check_price($checkin,$checkout,$allotment,$qty=1)
{
  //echo $checkin;
  //echo $checkout;
	$checkin_date = date_parse_from_format('d/m/Y', $checkin);
	$checkin = mktime(0, 0, 0, $checkin_date['month'], $checkin_date['day'], $checkin_date['year']);

	$checkout_date = date_parse_from_format('d/m/Y', $checkout);
	$checkout = mktime(0, 0, 0, $checkout_date['month'], $checkout_date['day'], $checkout_date['year']);

	$numDays = abs($checkin - $checkout)/60/60/24;
  //echo $numDays;
  //default price per notte
  $numDays = ($numDays<1) ? 1 : $numDays;

	$price= 0;
	for ($i = 0; $i < $numDays; $i++) {

	    $jobdate = date('d/m/Y', strtotime("+{$i} day", $checkin));
		//echo $jobdate.' - ';

		$entries = get_post_meta( $allotment, $prefix . 'prices', true );

		if($entries) {
			foreach ( (array) $entries as $key => $entry ) {
				if((convert_date_to_timestamp($jobdate)>=$entry['start_date']) && (convert_date_to_timestamp($jobdate)<=$entry['end_date'])) {
					//echo $entry['price'].' - '.$entry['period_name'].'<br />';
					 $price+=$entry['price'];
				}
			}
		}

	}


  return $price*$qty;
}


function check_availability($room_id,$checkin,$checkout)
{
  $checkin_date = date_parse_from_format('d/m/Y', $checkin);
  $checkin = mktime(0, 0, 0, $checkin_date['month'], $checkin_date['day'], $checkin_date['year']);

  $checkout_date = date_parse_from_format('d/m/Y', $checkout);
  $checkout = mktime(0, 0, 0, $checkout_date['month'], $checkout_date['day'], $checkout_date['year']);

  $entries = get_post_meta($room_id, $prefix . 'occupancy', true );
  //print_r($entries);
  $BookedDates[]='';
  if($entries) {
    foreach ( (array) $entries as $key => $entry ) {
    $numBookedDays = abs($entry['start_date'] - $entry['end_date'])/60/60/24;
    for ($i = 0; $i < $numBookedDays; $i++) {
      $BookedDates[] = date('d/m/Y', strtotime("+{$i} day", $entry['start_date']));
    	//echo '<b> Booked: '.$BookedDate[$i].'</b>---';
      }
    }
  }

  //print_r($BookedDates);
  $numDays = abs($checkin - $checkout)/60/60/24;


  for ($i = 0; $i < $numDays; $i++) {
      $jobdate[] = date('d/m/Y', strtotime("+{$i} day", $checkin));
      if(in_array($jobdate[$i],$BookedDates)){
        return false; die();
        //echo $jobdate[$i].' is booked<br />';
      } else {
        return true; //torna true altrimenti va in die() col false
          //echo $jobdate[$i].' is free<br />';
      }
    //echo '<b>'.$jobdate[$i].'</b>---';

    }

}


function no_check_availability($room_id,$checkin,$checkout){
	$checkin_date = date_parse_from_format('d/m/Y', $checkin);
	$checkin = mktime(0, 0, 0, $checkin_date['month'], $checkin_date['day'], $checkin_date['year']);
	$checkout_date = date_parse_from_format('d/m/Y', $checkout);
	$checkout = mktime(0, 0, 0, $checkout_date['month'], $checkout_date['day'], $checkout_date['year']);
	$numDays = abs($checkin - $checkout)/60/60/24;

	for ($i = 0; $i < $numDays; $i++) {
	    $jobdate = date('d/m/Y', strtotime("+{$i} day", $checkin));
		//date comprese
		$args= array(
			'post_type' => 'bookings',
			'meta_key' => 'room',
			'meta_value' => $room_id,
			'post_status' => 'publish',
			'relation' => 'AND',

			'meta_query' => array(
				//checkin checkout compreso
				array(
					'key' => 'checkin',
					'value' => convert_date_to_timestamp($jobdate), //'$checkin' <= checkin
					'compare' => '<=',
					'type' => 'numeric'
				),

				array(
					'key' => 'checkout',
					'value' => (convert_date_to_timestamp($jobdate)+86400), //checkin< '$checkout'
					'compare' => '>=',
					'type' => 'numeric'
				)

			)
		);

		$bookings = get_posts($args);

		if(!empty($bookings)) {
			//echo 'caso 1 orco dio';
			return false;
			die();
		}

		wp_reset_query();
		wp_reset_postdata();
		//date superiori o inferiori a checkin e checkout (credo)

		$args= array(
			'post_type' => 'bookings',
			'meta_key' => 'room',
			'meta_value' => $room_id,
			'post_status' => 'draft',
			'relation' => 'OR',

			'meta_query' => array(
				//checkin checkout compreso
				array(
					'key' => 'checkin',
					'value' => convert_date_to_timestamp($jobdate), //'$checkin' <= checkin
					'compare' => '>='

				),

				array(
					'key' => 'checkin',
					'value' => (convert_date_to_timestamp($jobdate)+86400), //checkin< '$checkout'
					'compare' => '<='
				)

			)
		);

		$bookings = get_posts($args);
		if(!empty($bookings)) {
			return false;
			//echo 'caso 2 orco dio';
			die();
		}

		wp_reset_query();
		wp_reset_postdata();
		//date superiori o inferiori a checkin e checkout (credo)

		$args= array(
			'post_type' => 'bookings',
			'meta_key' => 'room',
			'meta_value' => $room_id,
			'post_status' => 'draft',
			'relation' => 'OR',

			'meta_query' => array(
				//checkin checkout compreso
				array(
					'key' => 'checkout',
					'value' => convert_date_to_timestamp($jobdate), //'$checkin' <= checkin
					'compare' => '='

				),

				array(
					'key' => 'checkin',
					'value' => (convert_date_to_timestamp($jobdate)), //checkin< '$checkout'
					'compare' => '='
				)

			)
		);

		$bookings = get_posts($args);
		if(!empty($bookings)) {
			echo 'caso 3 orco dio';
			return false;
			die();
		}



		//torna true in caso non si blocca prima..
		return true;


	}



}

function is_available($room_id,$checkin,$checkout)
{
	if(check_availability($room_id,$checkin,$checkout)):
		return true;
	else:
		return false;
	endif;
}


function send_ajax()
{

	$bid = $_POST['booking_id'];
	$status = $_POST['status'];
	$owner_price = $_POST['owner_price'];
	$owner_message = $_POST['owner_message'];
	$ask_payment = $_POST['link_cc'];

  $request_language = get_post_meta($bid, 'lang',true);

	$payment_url = get_bloginfo('siteurl').'/confirm-reservation/?token='.get_post_meta($bid,'token',true);

  $booking = array(
      'ID'           => $bid,
      'post_title'   => 'Richiesta #'.$bid.' processata',
      'post_content' => 'Operation time '.date("d/m/Y h:i:s").' changing status to '.$status,
			'post_status' 	 =>	$status,
	);

// Update the post into the database
  wp_update_post( $booking );
	// se non aggiorna... dio porco
	update_post_meta($bid, 'payment_url', $payment_url);
	update_post_meta($bid, 'owner_price', $owner_price);
	update_post_meta($bid, 'owner_message', $owner_message);

  $name = get_post_meta($bid,'name',true);
  $email = get_post_meta($bid,'email',true);
  $phone = get_post_meta($bid,'phone',true);
  $checkin = get_post_meta($bid,'checkin',true);
  $checkout = get_post_meta($bid,'checkout',true);
  $price = get_post_meta($bid,'price',true);
  $room = get_post_meta($bid,'room',true);
  $room_number = get_post_meta($bid,'room_number',true);
  $adults = get_post_meta($bid,'adults',true);
  $children = get_post_meta($bid,'children',true);
  $message = get_post_meta($bid,'message',true);
  $lang = get_post_meta($bid,'lang',true);
  $request_language = $lang;

  //$address = "example@themeforest.net";

  $address = get_post_meta($bid,'email',true);
  $from = mytheme_get_option('place_name').' <'.mytheme_get_option('email').'>';
  $email_bcc = get_bloginfo('admin_email');

  //$reservation_details='<br />'.$room_number.' '.get_the_title($room).' - '.date('d/m/Y',$checkin).' - '.date('d/m/Y',$checkout).'<br />';
  //$reservation_details.='Price &euro;'.$price.'<br />';



  switch ($status) {

      case "quoted":
        $e_subject = __('Your reservation: ','bookingwp').$bid.' - ' . $status;
        // Configuration option.

        //$intro_text = pll_translate_string(sprintf(booking_get_option('bookingwp_quoted_email'),$name,$payment_url), $request_language);

        $intro_text = sprintf(pll_translate_string(booking_get_option('bookingwp_quoted_email'),$request_language),$name,$payment_url);


        $confirm_button = pll_translate_string(booking_get_option('bookingwp_confirm_button'), $request_language);
        $reservation_details = booking_details($bid);

        $email_content = "Booking<b>: $status</b><br />
        $intro_text<hr />
        $reservation_details<br />
      	$owner_message<hr/>
      	<a href='$payment_url'>$confirm_button</a>". PHP_EOL . PHP_EOL;

        $e_body = build_email($email_content);

      break;

      case "refused":
        $e_subject = __('Your reservation: ','bookingwp').$bid.' - ' . $status;
        // Configuration option.
        $intro_text = sprintf(pll_translate_string(booking_get_option('bookingwp_refused_email'),$request_language),$name,$payment_url);

        $email_content = "$intro_text<b>: $status</b><br />
        $owner_message<hr/>". PHP_EOL . PHP_EOL;

        $e_body = build_email($email_content);
      break;

      case "green":
          echo "Your favorite color is green!";
          break;

      default:
      $e_subject = __('Your reservation: ','bookingwp').$bid.' - ' . $status;
      // Configuration option.
      $e_body = "Richiesta &grave; stata <b>: $status</b><br />
      $owner_message<hr/>
      <a href='$payment_url'>conferma la tua prenotazione</a>". PHP_EOL . PHP_EOL;
  }

$e_reply = "<br />You can contact the customer via email, $email or hit 'reply' in your email browser to make the reservation complete.";

$msg = wordwrap( $e_body . $e_reply, 70 );

$headers[] = "From: $from" . PHP_EOL;
$headers[] = "Bcc: $email_bcc" . PHP_EOL;



//if(mail($address, $e_subject, $msg, $headers)) {
	if(wp_mail( $address, $e_subject, $e_body, $headers)) {
	//email to customer


	// Reset content-type to avoid conflicts -- http://core.trac.wordpress.org/ticket/23578
	remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

	//$price = check_price($checkin,$checkout,$room);


	// Email has sent successfully, echo a success page.

	echo '<fieldset>';
	echo '<div id="success_page" class="alert alert-success">';

	echo '<p>'._e('Offer sent correctly','bookingwp').'</p>';
	echo '</div>';
	echo '</fieldset>';
	exit();
} else {

	echo 'ERROR!';

}
	die();
}



function booking_details($bid,$message='')
{
  $name = get_post_meta($bid,'name',true);
  $email = get_post_meta($bid,'email',true);
  $phone = get_post_meta($bid,'phone',true);
  $checkin = get_post_meta($bid,'checkin',true);
  $checkout = get_post_meta($bid,'checkout',true);
  $price = get_post_meta($bid,'price',true);
  $room = get_post_meta($bid,'room',true);
  $room_number = get_post_meta($bid,'room_number',true);
  $adults = get_post_meta($bid,'adults',true);
  $children = get_post_meta($bid,'children',true);
  $message = get_post_meta($bid,'message',true);
  $lang = get_post_meta($bid,'lang',true);

  $html='
<table class="table table-hover" width="100%" style="padding:3px;">
  <thead>
      <tr>
          <th style="border:1px solid #efefef; background:#f9f9f9; padding:3px;">Room</th>
          <th style="border:1px solid #efefef; background:#f9f9f9; padding:3px;">People</th>
          <th style="border:1px solid #efefef; background:#f9f9f9; padding:3px;" class="text-center">Price</th>
          <th style="border:1px solid #efefef; background:#f9f9f9; padding:3px;" class="text-center">Total</th>
      </tr>
  </thead>
  <tbody>
      <tr>
          <td style="border:1px solid #efefef; background:#ffffff; padding:3px;" class="col-md-9"><em>'.get_the_title($room).'</em> - '.date("d/m/Y",$checkin).' - '.date("d/m/Y",$checkout).'</h4></td>
          <td style="border:1px solid #efefef; background:#ffffff; padding:3px;" class="col-md-1" style="text-align: center"> 2 </td>
          <td style="border:1px solid #efefef; background:#ffffff; padding:3px;" class="col-md-1 text-right">'.$price.'</td>
          <td style="border:1px solid #efefef; background:#ffffff; padding:3px;" class="col-md-1 text-right">'.$price.'</td>
      </tr>

      <tr>
          <td style="border:1px solid #efefef; background:#ffffff; padding:3px;">   </td>
          <td style="border:1px solid #efefef; background:#ffffff; padding:3px;">   </td>
          <td style="border:1px solid #efefef; background:#ffffff; padding:3px;" class="text-right">
          <p>
              <strong>Total: </strong>
          </p>
          </td>
          <td style="border:1px solid #efefef; background:#ffffff; padding:3px;" class="text-right">
          <p>
              <strong>'.$price.'</strong>
          </p>
          </td>
      </tr>

  </tbody>
</table>';

  return $html;
}

function build_email($message)
{
  $html='<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- So that mobile will display zoomed in -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- enable media queries for windows phone 8 -->
  <meta name="format-detection" content="telephone=no"> <!-- disable auto telephone linking in iOS -->
  <title>Single Column</title>

  <style type="text/css">
body {
  margin: 0;
  padding: 0;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
}
table {
  border-spacing: 0;
}
table td {
  border-collapse: collapse;
}
.ExternalClass {
  width: 100%;
}
.ExternalClass,
.ExternalClass p,
.ExternalClass span,
.ExternalClass font,
.ExternalClass td,
.ExternalClass div {
  line-height: 100%;
}
.ReadMsgBody {
  width: 100%;
  background-color: #ebebeb;
}
table {
  mso-table-lspace: 0pt;
  mso-table-rspace: 0pt;
}
img {
  -ms-interpolation-mode: bicubic;
}
.yshortcuts a {
  border-bottom: none !important;
}
@media screen and (max-width: 599px) {
  .force-row,
  .container {
    width: 100% !important;
    max-width: 100% !important;
  }
}
@media screen and (max-width: 400px) {
  .container-padding {
    padding-left: 12px !important;
    padding-right: 12px !important;
  }
}
.ios-footer a {
  color: #aaaaaa !important;
  text-decoration: underline;
}
</style>
</head>

<body style="margin:0; padding:0;" bgcolor="#F0F0F0" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<!-- 100% background wrapper (grey background) -->
<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#F0F0F0">
  <tr>
    <td align="center" valign="top" bgcolor="#F0F0F0" style="background-color: #F0F0F0;">

      <br>

      <!-- 600px container (white background) -->
      <table border="0" width="600" cellpadding="0" cellspacing="0" class="container" style="width:600px;max-width:600px">
        <tr>
          <td class="container-padding header" align="left" style="font-family:Helvetica, Arial, sans-serif;font-size:24px;font-weight:bold;padding-bottom:12px;color:#DF4726;padding-left:24px;padding-right:24px">
            '.mytheme_get_option('place_name').'
          </td>
        </tr>
        <tr>
          <td class="container-padding content" align="left" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff">
            <br>

<div class="title" style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:600;color:#374550">Booking</div>
<br>

      <div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#333333">';
$html.=$message;
$html.='</div>

          </td>
        </tr>
        <tr>
          <td class="container-padding footer-text" align="left" style="font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:16px;color:#aaaaaa;padding-left:24px;padding-right:24px">
            <br><br>
            © 2015
            <strong>'.mytheme_get_option('place_name').'</strong><br>
            <span class="ios-footer">
              '.mytheme_get_option('place_address').'<br>
            </span>
            <span class="ios-footer">
              '.mytheme_get_option('phone').'<br>
            </span>
            <a href="'.get_bloginfo('siteurl').'" style="color:#aaaaaa">'.get_bloginfo('siteurl').'</a><br>

            <br><br>

          </td>
        </tr>
      </table>
<!--/600px container -->


    </td>
  </tr>
</table>
<!--/100% background wrapper-->

</body>
</html>';

  return $html;
}

?>
