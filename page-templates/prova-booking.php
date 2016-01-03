<?php
/* Template Name: Prova bookings */

function check_entries($checkin,$checkout,$room){
  $checkin_date = date_parse_from_format('d/m/Y', $checkin);
  $checkin = mktime(0, 0, 0, $checkin_date['month'], $checkin_date['day'], $checkin_date['year']);

  $checkout_date = date_parse_from_format('d/m/Y', $checkout);
  $checkout = mktime(0, 0, 0, $checkout_date['month'], $checkout_date['day'], $checkout_date['year']);

  $entries = get_post_meta($room, $prefix . 'occupancy', true );
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
        //return false; //die();
        echo $jobdate[$i].' is booked<br />';
      } else {
        //return true; //torna true altrimenti va in die() col false
        echo $jobdate[$i].' is free<br />';
      }
    //echo '<b>'.$jobdate[$i].'</b>---';

    }

}


function check_aval($checkin,$checkout,$room){
  $checkin_date = date_parse_from_format('d/m/Y', $_GET['checkin']);
  $checkin = mktime(0, 0, 0, $checkin_date['month'], $checkin_date['day'], $checkin_date['year']);

  $checkout_date = date_parse_from_format('d/m/Y', $_GET['checkout']);
  $checkout = mktime(0, 0, 0, $checkout_date['month'], $checkout_date['day'], $checkout_date['year']);
  //$entries = get_post_meta($room_id, $prefix . 'occupancy', true );
  $args = array(
	'meta_key'         => 'room_id',
	'meta_value'       => $room,
	'post_type'        => 'bookings',
  'post_status' => array( 'publish', 'booked'),
);

  $entries = get_posts($args);
  //print_r($entries);
  $BookedDates[]='';

  if($entries) {
    foreach ($entries as $entry) {
    //echo $entry->ID;
    $start =  get_post_meta($entry->ID, 'checkin',true);
    $end = get_post_meta($entry->ID, 'checkout',true);
    $numBookedDays = abs($start - $end)/60/60/24;
    for ($i = 0; $i < $numBookedDays; $i++) {
      $BookedDates[] = date('d/m/Y', strtotime("+{$i} day", $start));
    	//echo '<b> Booked: '.$BookedDate[$i].'</b>---';
      }
    }
  }

  //print_r($BookedDates);
  $numDays = abs($checkin - $checkout)/60/60/24;

  $occupancy_day=0;
  for ($i = 0; $i < $numDays; $i++) {
      $jobdate[] = date('d/m/Y', strtotime("+{$i} day", $checkin));

      if(in_array($jobdate[$i],$BookedDates)){
        $occupancy_day++;
        //$result = false; die();
        echo $jobdate[$i].' is booked<br />'; //die();
      } else {
        //$result = true;//torna true altrimenti va in die() col false
        echo $jobdate[$i].' is free<br />';
        //return true;
      }
  //  echo '<b>'.$jobdate[$i].'</b>---';

    }
    echo $occupancy_day;
  }
  echo check_aval($_GET['checkin'],$_GET['checkout'],$_GET['room']);
  //if(check_aval($_GET['checkin'],$_GET['checkout'],$_GET['room'])) {echo 1; };
  //check_entries($_GET['checkin'],$_GET['checkout']);
?>
