<?php
/*
Template Name: Room Calendar
*/
/**
 * The header for our user logged theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package bookingwp
 */
get_template_part('management-templates/header-user');
$occupancy = get_bookings($_GET['room_id']);
//print_r($occupancy);
?>
<script>
jQuery(document).ready(function() {
    jQuery('#room-calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      editable: true,
      eventSources: [

      // your event source
      {
          events: [ // put the array in the `events` property
            <?php foreach($occupancy as $daybooked) {
              //echo $daybooked->ID;
              $checkin = get_post_meta($daybooked->ID,'checkin',true);
              $checkout = get_post_meta($daybooked->ID,'checkout',true);
              $checkin = date_parse_from_format("Y-m-d", $checkin);
              $checkout = date_parse_from_format("Y-m-d", $checkout);

              ?>
              {
                  title  : '<?php echo $daybooked->post_title; ?>',
                  start  : '<?php echo date("Y-m-d",get_post_meta($daybooked->ID,'checkin',true)); ?>',
                  end    : '<?php echo date("Y-m-d",get_post_meta($daybooked->ID,'checkout',true)); ?>',
                  textColor: 'white',
              },
            <?php } ?>
          ],
          color: 'red',     // an option!
          textColor: 'red' // an option!
      }

      // any other event sources...

  ]

});
});
</script>

<div class="container manager">
  <div class="row">
    <div class="col-md-12">
      <div id="room-calendar">
      </div>
    </div>
  </div>
</div> <!-- /container -->
<?php get_template_part('management-templates/footer-user'); ?>
