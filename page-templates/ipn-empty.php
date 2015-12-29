<?php
/*
Template Name: Ipn response
*/

/**
 * The map template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package bookingwp
 */
$result = Ipn();

if($result) {
/*
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

*/
  //mail('pinobulini@gmail.com', $result['item_number'], print_r($result));
  $message = 'code = '.$result['item_number'];
  $message.= '<br />status = '.$result['payment_status'];
  $message.= '<br />order = '.$result['item_name'];
  $subject = 'Conferma pagamento numero '.$result['item_number']
  wp_mail('pinobulini@gmail.com', $subject, $message);
} else {

  die();
}
?>
