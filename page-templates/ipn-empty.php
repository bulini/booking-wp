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

  //mail('pinobulini@gmail.com', $result['item_number'], print_r($result));
  $message='code = '.$result['item_number'];
  $message.='<br />status = '.$result['payment_status'];
  $message.= '<br />order = '.$result['item_name'];
  $subject = 'Conferma pagamento numero '.$result['item_number'];
  $headers = 'From: IPN Notification <info@mirkobeb.com>' . "\r\n";
  mail('pinobulini@gmail.com', $result['item_number'], $message,$headers);
} else {

  die();
}
?>
