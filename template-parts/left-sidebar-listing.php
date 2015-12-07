<?php
$checkin = (isset($_GET['checkin'])) ? $_GET['checkin'] : date('d/m/Y');
$checkout = (isset($_GET['checkout'])) ? $_GET['checkout'] : date('d/m/Y');
$people = (isset($_GET['people'])) ? $_GET['people'] : 2;
$room_number = (isset($_GET['room_number'])) ? $_GET['room_number'] : 1;

$people = ($people>2) ? ($people/$room_number) : $people;

$allotment = (isset($_GET['room'])) ? $_GET['room'] : default_allotment($term->slug,$people);

?>
<div class="fleets-filters toggle-container">
  <h5 class="toggle-title">Filtra</h5>
  <aside class="toggle-content">
    <div class="search">
      <form action="#" class="default-form">
        <input type="text" placeholder="Search">
        <i class="fa fa-search"></i>
      </form>
    </div>
    <div class="general">
      <h5 class="title">General</h5>
      <form action="#" class="default-form">
        <span class="arrival calendar">
          <input type="text" name="checkin" id="checkin" value="<?php echo $checkin; ?>" placeholder="Arrival" data-dateformat="m/d/y">
          <i class="fa fa-calendar"></i>
        </span>
        <span class="departure calendar">
          <input type="text" name="checkout" id="checkout" value="<?php echo $checkout; ?>" placeholder="Departure" data-dateformat="m/d/y">
          <i class="fa fa-calendar"></i>
        </span>
        <span class="adults select-box">
          <select name="people">
            <option value="1" <?php if($people==1) { echo 'selected="selected"';}?>>1 (single use)</option>
            <option value="2" <?php if($people==2) { echo 'selected="selected"';}?>>2 (double)</option>

          </select>
        </span>
        <span class="room_number select-box">
          <select name="room_number" id="room_number">
                      <?php global $post; get_roomtypes();
                        $i=1;
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                       ?>
                              <option value="<?php echo $i; ?>" <?php if($i==$room_number) { echo 'selected="selected"'; }?>><?php echo $i; ?> Room</option>
                    <?php $i++; endwhile; else: ?>
                      <option value="0">No room</option>
                    <?php endif; wp_reset_query(); ?>

          </select>
        </span>

      </form>
      <h5 class="title">Price</h5>
      <div class="slider-range-container box-row">
        <div class="slider-range" data-min="2000" data-max="100000" data-step="2000" data-default-min="2000" data-default-max="50000" data-currency="$">
        </div>
        <div class="clearfix">
          <input type="text" class="range-from" value="$2000">
          <input type="text" class="range-to" value="$50000">
        </div>
      </div>
      <h5 class="title">Amenities</h5>
      <ul class="custom-list additional-filter-list clearfix">
        <li>
          <span class="checkbox-input">
            <input id="additional-filter-ac" checked="checked" type="checkbox">
            <label for="additional-filter-ac">AC</label>
          </span>
        </li>
        <li>
          <span class="checkbox-input">
            <input id="additional-filter-hotbath" checked="checked" type="checkbox">
            <label for="additional-filter-hotbath">Hotbath</label>
          </span>
        </li>
        <li>
          <span class="checkbox-input">
            <input id="additional-filter-parking" type="checkbox">
            <label for="additional-filter-parking">Parking</label>
          </span>
        </li>
        <li>
          <span class="checkbox-input">
            <input id="additional-filter-room-service" type="checkbox">
            <label for="additional-filter-room-service">Room Service</label>
          </span>
        </li>
        <li>
          <span class="checkbox-input">
            <input id="additional-filter-safe" checked="checked" type="checkbox">
            <label for="additional-filter-safe">Safe</label>
          </span>
        </li>
        <li>
          <span class="checkbox-input">
            <input id="additional-filter-tv" checked="checked" type="checkbox">
            <label for="additional-filter-tv">TV</label>
          </span>
        </li>
        <li>
          <span class="checkbox-input active">
            <input id="additional-filter-wifi" checked="checked" type="checkbox">
            <label for="additional-filter-wifi">Wifi</label>
          </span>
        </li>
      </ul>
    </div>
    <div class="buttons">
      <button class="btn btn-transparent-gray pull-left">
        Filter
      </button>
      <button class="btn btn-transparent-gray pull-right">
        Reset
      </button>
    </div>
  </aside>
</div>
<!--
<div class="special-offers sidebar">
  <h5 class="title-section">Special Offers</h5>
  <div class="offers-content">
    <ul class="custom-list">
      <li>
        <div class="thumbnail"><img src="img/listing-1.jpg" alt="" class="img-responsive"></div>
        <h5 class="title"><a href="#">King Suite</a></h5>
        <span class="price">from $99/day</span>
      </li>
      <li>
        <div class="thumbnail"><img src="img/listing-1.jpg" alt="" class="img-responsive"></div>
        <h5 class="title"><a href="">King Suite</a></h5>
        <span class="price">from $99/day</span>
      </li>
      <li>
        <div class="thumbnail"><img src="img/listing-1.jpg" alt="" class="img-responsive"></div>
        <h5 class="title"><a href="">King Suite</a></h5>
        <span class="price">from $99/day</span>
      </li>
    </ul>
  </div>
</div>
-->
