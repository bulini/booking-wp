<?php
/*
Template Name: Json Room Calendar
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
                <div class="alert alert-warning" role="alert">
                  <h4><i class="fa fa-lightbulb-o"></i> Tips</h4>
                  Per aggiungere un booking e bloccare la disponibilit&agrave;
                  basta trascinare con il mouse sui giorni da bloccare, si aprir&agrave; una finestra modale con la form per bloccare la stanza
                </div>
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
          <i class="fa fa-user"></i> Ciao
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
    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
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

        selectable: true,
        select: function (start, end, jsEvent, view) {
            jQuery("#calendar").fullCalendar('addEventSource', [{
                start: start,
                end: end,
                rendering: 'background',
                block: true,
              },
          ]);
          //alert('inizio on: ' + start.format());
          //alert('fine on: ' + end.format());
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
            url: ajaxurl,
            type: 'GET',
            data: {
                action: 'get_booked_days',
                room_id: '<?php echo $_GET['room_id']; ?>'
            },
            error: function() {
                alert('there was an error while fetching events!');
            },
            color: 'red',   // a non-ajax option
            textColor: 'white' // a non-ajax option
        }

        // any other sources...

    ]

});
});
</script>
<?php get_template_part('management-templates/footer-user'); ?>
