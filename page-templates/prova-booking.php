<?php
/* Template Name: Prova bookings */

global $wpdb;
$checkin_date = date_parse_from_format('d/m/Y', $_GET['checkin']);
$checkin = mktime(0, 0, 0, $checkin_date['month'], $checkin_date['day'], $checkin_date['year']);


$checkout_date = date_parse_from_format('d/m/Y', $_GET['checkout']);
$checkout = mktime(0, 0, 0, $checkout_date['month'], $checkout_date['day'], $checkout_date['year']);


$numDays = abs($checkin - $checkout)/60/60/24;


for ($i = 0; $i < $numDays; $i++) {
  $jobdate = date('d/m/Y', strtotime("+{$i} day", $checkin));
	echo '<b>'.$jobdate.'</b>---';

  $entries = get_post_meta(245, $prefix . 'occupancy', true );
  if($entries) {
    foreach ( (array) $entries as $key => $entry ) {
      if(date('d/m/Y',$entry['start_date']>=$jobdate) || date('d/m/Y',$entry['end_date'])<=$jobdate) {
        echo esc_html($entry['period_name']).'<br />';
      } else { 'libero<br />'; }
    }
  }
}
?>
