<?php $price = get_post_meta($post->ID, 'min_price', true);
	$cols = is_page() ? 'col-md-12' : 'col-md-4';

$checkin = (isset($_GET['checkin'])) ? $_GET['checkin'] : date('d/m/Y');
$checkout = (isset($_GET['checkout'])) ? $_GET['checkout'] : date('d/m/Y');
$people = (isset($_GET['people'])) ? $_GET['people'] : 2;
$room_number = (isset($_GET['room_number'])) ? $_GET['room_number'] : 1;

$people = ($people>2) ? ($people/$room_number) : $people;

$allotment = (isset($_GET['room'])) ? $_GET['room'] : default_allotment($term->slug,$people);

?>

<div class="sidebar-widget reservation">
	<h5 class="widget-title"><?php _e('Book now','bookingwp'); ?></h5>
	<aside class="widget-content">
		<form action="#" class="default-form">
			<span class="name">
				<input type="text" name="name" id="name" placeholder="Your name">
				<i class="fa fa-user"></i>
			</span>
			<span class="email">
				<input type="text" name="email" id="email" placeholder="Your email">
				<i class="fa fa-envelope"></i>
			</span>
			<span class="arrival calendar">
				<input type="text" name="checkin" id="checkin" placeholder="Arrival" data-dateformat="d/m/y" value="<?php echo $checkin; ?>">
				<i class="fa fa-calendar"></i>
			</span>
			<span class="departure calendar">
				<input type="text" name="checkout" id="checkout" placeholder="Departure" data-dateformat="d/m/y" value="<?php echo $checkout; ?>">
				<i class="fa fa-calendar"></i>
			</span>
			<span class="adults select-box">
				<select name="adults" id="adults" data-placeholder="People">
					<option>People</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>
			</span>
			<span class="room select-box">
				<select name="room" id="room_select" data-placeholder="Roomtype">
					<option>Choose</option>
					<?php global $post; get_roomtypes();
						if ( have_posts() ) : while ( have_posts() ) : the_post();
					?>
					<option value="<?php echo get_the_ID(); ?>"><?php the_title(); ?></option>
						<?php $i++; endwhile; else: ?>
							<option value="0">No room</option>
						<?php endif; wp_reset_query(); ?>
				</select>
			</span>
			<span class="room_number select-box">
				<select name="room_number" id="room_number" data-placeholder="Roomtype">
					<option selected="selected" disabled="disabled"><?php _e('How many rooms','bookingwp'); ?></option>
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


			<h5>Booking Cost: <span>$0.00</span></h5>
			<button class="btn btn-transparent-gray" id="book-single-button">Make reservation</button>
		</form>
		<div id="message"></div><!-- Error message display -->

	</aside>
</div>
