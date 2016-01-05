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
<div class="container manager">
  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h2><i class="fa fa-calendar"></i> Visual Calendar <small>Availability management</small></h2>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <div class="thumbnail">
        <?php echo get_the_post_thumbnail($_GET['room_id'],'homepage-thumb'); ?>
        <div class="caption">
                <h3><?php echo get_the_title($_GET['room_id']); ?></h3>
                <p>Calendario</p>
        </div>
      </div>
      <div class="list-group">
        <a href="#" class="list-group-item">
          <i class="fa fa-calendar"></i> Calendar
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-bookmark"></i> Hotel
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-user"></i> Ciao mirko
        </a>
      </div>
    </div>
    <div class="col-md-9">
      <div class="well">
        <div id="room-calendar">
        </div>
      </div>

    </div>
  </div>
<hr />

<?php include(locate_template('management-templates/_editbooking-modal.php')); ?>
<?php include(locate_template('management-templates/_addbooking-modal.php')); ?>

</div> <!-- /container -->
<script>
jQuery(document).ready(function() {
    jQuery('#room-calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      editable: true,
      eventClick:  function(event, jsEvent, view) {
      jQuery('#modalTitle').html(event.title);
      jQuery('#modalBody').html(event.description);
      jQuery('#eventUrl').attr('href',event.url);
      jQuery('#fullCalModal').modal();
    },
    //dayClick: function(date, jsEvent, view) {
            //alert('Clicked on: ' + date.format());
            //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
            //alert('Current view: ' + view.name);
            // change the day's background color just for fun
            //jQuery(this).css('background-color', 'blue');
  //      },
        selectable: true,
        select: function (start, end, jsEvent, view) {
            jQuery("#calendar").fullCalendar('addEventSource', [{
                start: start,
                end: end,
                rendering: 'background',
                block: true,
              },
          ]);
          alert('inizio on: ' + start.format());
          alert('fine on: ' + end.format());
          jQuery('#checkin').val(start.format("DD/MM/YYYY"));
          jQuery('#checkout').val(end.format("DD/MM/YYYY"));
          jQuery('#addbooking').modal();

          jQuery("#calendar").fullCalendar("unselect");
        },
        selectOverlap: function(event) {
            return ! event.block;
        },


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
                  title  : '<?php echo $daybooked->post_title; ?> <?php echo date("d/m/Y",get_post_meta($daybooked->ID,'checkin',true)); ?> <?php echo date("d/m/Y",get_post_meta($daybooked->ID,'checkout',true)); ?>',
                  start  : '<?php echo date("Y-m-d",get_post_meta($daybooked->ID,'checkin',true)); ?>',
                  end    : '<?php echo date("Y-m-d",get_post_meta($daybooked->ID,'checkout',true)); ?>',
                  textColor: 'white',
              },
            <?php } ?>
          ],
          color: 'red',     // an option!
          textColor: 'red' // an option!
      },
    // any other event sources...

  ]

});
});
</script>
<?php get_template_part('management-templates/footer-user'); ?>
