<?php
//procedure e chiamate ajax de dio
add_action('wp_head','ajaxurl');

function ajaxurl() {
?>
<script type="text/javascript">
var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>
<?php
}

add_action('wp_ajax_home_booking', 'home_booking');
add_action('wp_ajax_nopriv_home_booking', 'home_booking');

function home_booking()
{
	if(!$_POST)


	if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

	$name    = $_POST['name'];
	$email    = $_POST['email'];
	$phone    = $_POST['phone'];
	$checkin    = $_POST['checkin'];
	$checkout    = $_POST['checkout'];
	$room_id    = $_POST['room_id'];
	$room    = $_POST['room'];
	$adults    = $_POST['adults'];
	$children    = $_POST['children'];
	$room_number = $_POST['room_number'];
	$message    = $_POST['message'];
	$lang    = $_POST['current_lang'];
	//if availability


	if(!check_availability($room_id,$checkin,$checkout)) {
		echo '<div class="alert alert-danger alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>La camera richiesta risulta occupata nelle date richieste!</div>';
		exit();

	}

	 if(trim($email) == '') {
		echo '<div class="alert alert-danger alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Attention! Please enter a valid email address.</div>';
		exit();

	} else if(trim($room) == '') {
		echo '<div class="alert alert-danger alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Attention! Please enter what kind of room.</div>';
		exit();

		} else if(trim($checkin) == '') {
	echo '<div class="alert alert-danger alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Attention! Please enter your check-in date.</div>';
	exit();

		} else if(trim($checkout) == '') {
	echo '<div class="alert alert-danger alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Attention! Please enter your check-out date.</div>';
	exit();

	} else if(!isEmail($email)) {
		echo '<div class="alert alert-danger alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Attention! You have enter an invalid e-mail address, try again.</div>';
		exit();
	}

	if(get_magic_quotes_gpc()) {
		$comments = stripslashes($comments);
	}

		//titolo stanza composto da nome hotel + stanza x evitare duplicati...
		$main_name='booking ';
		$camera = get_the_title($room);

		// ADD THE FORM INPUT TO $new_post ARRAY

		$new_booking = array(
		'post_title'	=>	$main_name.' - '.$camera,
		'post_type'	=>	'bookings',  //'post',page' or use a custom post type if you want to
		'post_status' => 'waiting'
		);

		//SAVE THE POST

		$bid = wp_insert_post($new_booking);

		$price = check_price($checkin,$checkout,$room,$room_number);
		$token = uniqid();

		$request_page = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

		$manager_url = get_bloginfo('siteurl').'/reservations-system/?token='.$token;
		update_post_meta($bid, 'name', $name);
		update_post_meta($bid, 'email', $email);
		update_post_meta($bid, 'phone', $phone);
		update_post_meta($bid, 'room', $room);
		update_post_meta($bid, 'token', $token);
		update_post_meta($bid, 'manager_url', $manager_url);
		update_post_meta($bid, 'checkin', convert_date_to_timestamp($checkin));
		update_post_meta($bid, 'checkout', convert_date_to_timestamp($checkout));
		update_post_meta($bid, 'adults', $adults);
		update_post_meta($bid, 'children', $children);
		update_post_meta($bid, 'room_number', $room_number);
		update_post_meta($bid, 'message', $message);
		update_post_meta($bid, 'lang', $lang);

		if($price){
		update_post_meta($bid, 'price', $price);
		}

		$room_type = get_the_title($room);

		//$address = "example@themeforest.net";
		$address = mytheme_get_option('email');
		$from = mytheme_get_option('place_name').' <'.$address.'>';
		$email_bcc = get_bloginfo('admin_email');


		// Configuration option.
		$e_subject = 'Booking n # '.$bid.' da ' . $email;
		$e_body = "Richiesta di prenotazione da <b>: $name $email tel. $phone</b>



		Richiesta prenotazione per le seguenti date<br />
		Checkin: <b>: $checkin </b><br />
		Check-out <b>: $checkout </b><br />
		messaggio <b>: $message </b><br />


		La richiesta &egrave; di n, <b>$room_number</b>  <b>$room_type</b> per <b>$adults Adulti</b> e <b>$children bambini</b>.<br />
		Il prezzo proposto dal sistema in base alle tue impostazioni &egrave; di &euro; <b>$price</b> .<br />
		Ricevuta da: $request_page.<br />
		in lingua: $lang.<br />
		<hr />
		<a href='$manager_url'>Gestisci</a>". PHP_EOL . PHP_EOL;




		$e_reply = "<br />You can contact the customer via email, $email or hit 'reply' in your email browser to make the reservation complete.";

		$msg = wordwrap( $e_body . $e_reply, 70 );

		$headers[] = "From: $from" . PHP_EOL;
		$headers[] = "Bcc: $email_bcc" . PHP_EOL;

	//if(mail($address, $e_subject, $msg, $headers)) {
	  if(wp_mail( $address, $e_subject, $e_body, $headers)) {
		//email to customer


		// Reset content-type to avoid conflicts -- http://core.trac.wordpress.org/ticket/23578
		remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

		$price = check_price($checkin,$checkout,$room);


		// Email has sent successfully, echo a success page.

		echo '<fieldset>';
		echo '<div id="success_page" class="alert alert-success">';

		if($price){
			//stop mostra prezzo per ora..
			echo '<b>'._e('Price for your reservation is &euro;','bookingwp').' '.$price.'</b><br />';
		}

		echo '<p>'._e('Your reservation has been submitted to us and well contact you as quickly as possible to complete your booking. Thank you','bookingwp').'</p>';
		echo '</div>';
		echo '</fieldset>';
		exit();
	} else {

		echo 'ERROR!';

	}
}



add_action('wp_ajax_send_ajax', 'send_ajax');
add_action('wp_ajax_nopriv_send_ajax', 'send_ajax');

?>
