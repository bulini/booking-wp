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

    $message='reservation id = '. get_the_id().' code '.$result['item_number']. "\r\n";
    $message.='payment status = '.$result['payment_status']. "\r\n";
    $message.='details = '.$result['item_name']. "\r\n";
    $subject = 'Conferma pagamento Paypal #'.$result['item_number'];
    $headers = 'From: IPN Notification <info@mirkobeb.com>' . "\r\n";
    mail('pinobulini@gmail.com', $subject, $message,$headers);
  endwhile;

} else {
  die();
}
?>
