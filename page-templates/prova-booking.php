<?php
/* Template Name: Prova bookings */

$checkin_date = date_parse_from_format('d/m/Y', $_GET['checkin']);
$checkin = mktime(0, 0, 0, $checkin_date['month'], $checkin_date['day'], $checkin_date['year']);

$checkout_date = date_parse_from_format('d/m/Y', $_GET['checkout']);
$checkout = mktime(0, 0, 0, $checkout_date['month'], $checkout_date['day'], $checkout_date['year']);

$entries = get_post_meta(83, $prefix . 'occupancy', true );
//print_r($entries);
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
      echo $jobdate[$i].' is booked<br />'; exit();
    } else
    {
        echo $jobdate[$i].' is free<br />';
    }
  //echo '<b>'.$jobdate[$i].'</b>---';

  }

echo '<br />';
//print_r($jobdate);

//$result = array_diff($BookedDate, $jobdate);

//print_r($result);
?>
