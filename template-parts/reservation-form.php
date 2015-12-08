<!-- Start Banner-Search -->
<div class="banner-search">
  <div class="container">
      <div id="hero-tabs" class="banner-search-inner">
        <ul class="custom-list tab-title-list clearfix">
          <li class="tab-title active"><a href="#yachts">Book now</a></li>
        </ul>
        <ul class="custom-list tab-content-list">

          <!-- Start Hotel -->
          <li class="tab-content active">
            <form class="default-form" method="get" action="<?php bloginfo('siteurl');?>/rooms">
              <span class="arrival calendar">
                <input type="text" name="checkin" id="checkin" placeholder="Arrival" data-dateformat="d/m/y">
                <i class="fa fa-calendar"></i>
              </span>
              <span class="departure calendar">
                <input type="text" name="checkout" id="checkout" placeholder="Departure" data-dateformat="d/m/y">
                <i class="fa fa-calendar"></i>
              </span>
              <span class="adults select-box">
                <select name="people" data-placeholder="Camera">
                  <option>Room</option>
                  <option value="1">1 people (single use)</option>
                  <option value="2">2 people (double)</option>
                </select>
              </span>
              <span class="room_number select-box">
        				<select name="room_number" id="room_number" data-placeholder="Rooms">
        					<option selected="selected" disabled="disabled"><?php _e('How many rooms','wpbooking'); ?></option>
        									  <?php global $post; get_roomtypes();
        										  $i=1;
        										  if ( have_posts() ) : while ( have_posts() ) : the_post();
        									   ?>
        					                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        									<?php $i++; endwhile; else: ?>
        										<option value="0">No room</option>
        									<?php endif; wp_reset_query(); ?>

        				</select>
        			</span>
              <span class="submit-btn">
                <button class="btn btn-transparent" id="book-singles-button">Book Now</button>
                <!--<a href="#" class="advanced">Advanced Search</a>-->
              </span>
            </form>
            <div id="message"></div><!-- Error/success message display -->
          </li>
          <!-- End Hotel -->


        </ul>
    </div>
  </div>
</div>
<!-- End Banner-Search -->
