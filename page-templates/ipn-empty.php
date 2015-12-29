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

  $booking = get_posts(array('post_type' => 'bookings','meta_key' => 'token', 'meta_value' => $result['item_number'],'posts_per_page' => 1));

  $id_booking = $booking[0]->ID;

  $message='reservation id = '. $id_booking.' code '.$result['item_number']. "\r\n";
  $message.='payment status = '.$result['payment_status']. "\r\n";
  $message.='details = '.$result['item_name']. "\r\n";
  $subject = 'Conferma pagamento Paypal #'.$result['item_number'];
  $headers = 'From: IPN Notification <info@mirkobeb.com>' . "\r\n";
  mail('pinobulini@gmail.com', $subject, $message,$headers);

} else {

  die();
}
?>
