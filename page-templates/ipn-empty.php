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
  wp_reset_query();
  $booking = new WP_Query( array('post_type' => 'bookings','meta_key' => 'token', 'meta_value' => $result['item_number'],'posts_per_page' => 1));
    while ($booking->have_posts()) : $booking->the_post();
      $bid = get_the_id();
      /*
      $status = 'booked';
      $booking_data = array(
        'ID'           => $bid,
        'post_title'   => 'Instant Booking #'.$bid.' processata',
        'post_content' => 'Operation time '.date("d/m/Y h:i:s").' changing status to '.$status,
        'post_status' 	 =>	$status,
      );
        // Update the post into the database
        wp_update_post( $booking_data );
        // se non aggiorna... dio porco
        update_post_meta($bid, 'payment_method', 'Paypal');
        //update_post_meta($bid, 'owner_price', $owner_price);
        //update_post_meta($bid, 'owner_message', $owner_message);
        */
        $message='reservation id = '. get_the_id().' code '.$result['item_number']. "\r\n";
        $message.='payment status = '.$result['payment_status']. "\r\n";
        $message.='details = '.$result['item_name']. "\r\n";
        $subject ='Conferma pagamento Paypal #'$bid.'-'.$result['item_number'];
        $headers ='From: IPN Notification <info@mirkobeb.com>' . "\r\n";
        mail('pinobulini@gmail.com', $subject, $message,$headers);
    endwhile;

} else {
  die();
}
?>
