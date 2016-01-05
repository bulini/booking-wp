<!-- Start Banner-Search -->
<div class="banner-search">
  <div class="container">
      <div id="hero-tabs" class="banner-search-inner">
        <ul class="custom-list tab-title-list clearfix">
          <li class="tab-title active"><a href="#"><?php _e('Book now','bookingwp'); ?></a></li>
        </ul>
        <ul class="custom-list tab-content-list">

          <!-- Start Hotel -->
          <li class="tab-content active">
            <form class="default-form" method="get" action="<?php bloginfo('siteurl');?>/search-rooms">
              <span class="arrival calendar">
                <input type="text" name="checkin" id="checkin" placeholder="<?php _e('Checkin','bookingwp'); ?>" data-dateformat="dd/mm/yy">
                <i class="fa fa-calendar"></i>
              </span>
              <span class="departure calendar">
                <input type="text" name="checkout" id="checkout" placeholder="<?php _e('Checkout','bookingwp'); ?>" data-dateformat="dd/mm/yy">
                <i class="fa fa-calendar"></i>
              </span>
              <span class="adults select-box">
                <?php $rooms = get_roomtypes(); ?>
                <select name="people" data-placeholder="<?php _e('Room','bookingwp'); ?>">
                <?php foreach($rooms as $room): ?>
                  <?php $people = get_post_meta($room->ID,'people',true)?>
                  <option value="<?php echo $people; ?>"><?php echo apply_filters('the_title',$room->post_title); ?> - <?php echo $people; ?></option>
                <?php endforeach; ?>
                </select>
              </span>
              <span class="room_number select-box">
        				<select name="room_number" id="room_number" data-placeholder="<?php _e('Q.ty','bookingwp'); ?>">
        									  <?php global $post; get_roomtypes();
        										  $i=1;
        										  if ( have_posts() ) : while ( have_posts() ) : the_post();
        									   ?>
        					                  <option value="<?php echo $i; ?>"><?php echo $i; ?> <?php _e('Rooms','bookingwp'); ?></option>
        									<?php $i++; endwhile; else: ?>
        										<option value="0">No room</option>
        									<?php endif; wp_reset_query(); ?>

        				</select>
        			</span>
              <span class="submit-btn">
                <button class="btn btn-transparent" id="book-singles-button"><?php _e('Book now','bookingwp'); ?></button>
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
