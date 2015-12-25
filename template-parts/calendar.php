<!-- Responsive calendar - START -->
          <div class="responsive-calendar">
            <h5 class="widget-title"><?php _e('Availability','bookingwp'); ?></h5>

            <div class="controls">
                <a class="pull-left" data-go="prev"><div class="">Prev</div></a>
                <h4><span data-head-year></span> <span data-head-month></span></h4>
                <a class="pull-right" data-go="next"><div class="">Next</div></a>
            </div><hr/>
            <div class="day-headers">
              <div class="day header">Mon</div>
              <div class="day header">Tue</div>
              <div class="day header">Wed</div>
              <div class="day header">Thu</div>
              <div class="day header">Fri</div>
              <div class="day header">Sat</div>
              <div class="day header">Sun</div>
            </div>
            <div class="days" data-group="days">

            </div>
          </div>
          <!-- Responsive calendar - END -->


      <?php $occupancy = get_occupancy($post->ID); ?>

  <script type="text/javascript">
        jQuery(document).ready(function () {
          jQuery(".responsive-calendar").responsiveCalendar({
            time: '2015-12',
            events: {
              <?php foreach($occupancy as $daybooked) { ?>
              "<?php echo $daybooked; ?>": {"badgeClass": "badge-error"},
              <?php  } ?>}
          });
        });
  </script>
