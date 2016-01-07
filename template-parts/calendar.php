<!-- Responsive calendar - START -->
<h5 class="widget-title"><i class="fa fa-calendar"></i> <?php _e('Availability','bookingwp'); ?></h5>

          <div class="responsive-calendar">
            <div class="controls">
                <a class="pull-left" data-go="prev"><div class=""><<</div></a>
                <h4><span data-head-year></span> <span data-head-month></span></h4>
                <a class="pull-right" data-go="next"><div class="">>></div></a>
            </div><hr/>
            <div class="day-headers">
              <div class="day header"><?php _e('Mon','bookingwp'); ?></div>
              <div class="day header"><?php _e('Tue','bookingwp'); ?></div>
              <div class="day header"><?php _e('Wed','bookingwp'); ?></div>
              <div class="day header"><?php _e('Thu','bookingwp'); ?></div>
              <div class="day header"><?php _e('Fri','bookingwp'); ?></div>
              <div class="day header"><?php _e('Sat','bookingwp'); ?></div>
              <div class="day header"><?php _e('Sun','bookingwp'); ?></div>
            </div>
            <div class="days" data-group="days">

            </div>
          </div>
          <!-- Responsive calendar - END -->


      <?php $occupancy = get_occupancy($post->ID); ?>

  <script type="text/javascript">
        jQuery(document).ready(function () {
          jQuery(".responsive-calendar").responsiveCalendar({
            time: '<?php echo date('Y'); ?>-<?php echo date('m');?>',
            events: {
              <?php foreach($occupancy as $daybooked) { ?>
              "<?php echo $daybooked; ?>": {"badgeClass": "badge-error"},
              <?php  } ?>}
          });
        });
  </script>
