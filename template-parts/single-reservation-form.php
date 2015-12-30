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
	<h5 class="widget-title"><i class="fa fa-bolt"></i> <?php _e('Book now','bookingwp'); ?></h5>
	<aside class="widget-content">
		<form action="#" class="default-form">
			<input type="hidden" value="<?php echo pll_current_language(); ?>" name="current_lang" id="current_lang" />
			<input type="hidden" value="<?php echo $post->ID;?>" name="room_id" id="room_id" />
			<span class="name">
				<input type="text" name="name" id="name" placeholder="<?php _e('Your Name','bookingwp'); ?>">
				<i class="fa fa-user"></i>
			</span>
			<span class="email">
				<input type="text" name="email" id="email" placeholder="<?php _e('Your email','bookingwp'); ?>">
				<i class="fa fa-envelope"></i>
			</span>
			<span class="arrival calendar">
				<input type="text" name="checkin" id="checkin" placeholder="<?php _e('Checkin','bookingwp'); ?>" data-dateformat="dd/mm/yy" value="<?php echo $checkin; ?>">
				<i class="fa fa-calendar"></i>
			</span>
			<span class="departure calendar">
				<input type="text" name="checkout" id="checkout" placeholder="<?php _e('Checkout','bookingwp'); ?>" data-dateformat="dd/mm/yy" value="<?php echo $checkout; ?>">
				<i class="fa fa-calendar"></i>
			</span>
			<span class="adults">
				<input type="text" name="adults" id="adults" placeholder="<?php _e('People','bookingwp'); ?>" value="<?php echo $people; ?>">
				<i class="fa fa-user"></i>
			</span>
			<span class="room select-box">
				<select name="room" id="room_select" data-placeholder="<?php _e('Allotment','bookingwp'); ?>">
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
				<select name="room_number" id="room_number">
									  <?php global $post; get_roomtypes();
										  $i=1;
										  if ( have_posts() ) : while ( have_posts() ) : the_post();
									   ?>
					                  <option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?> <?php _e('room','bookingwp'); ?></option>
									<?php $i++; endwhile; else: ?>
										<option value="0">No room</option>
									<?php endif; wp_reset_query(); ?>

				</select>
			</span>

			<?php if($_GET['checkin']) : ?>
				<h5><?php _e('Price','bookingwp'); ?> <span> &euro; <?php echo check_price($_GET['checkin'],$_GET['checkout'], default_allotment('superior',$people),1); ?></span></h5>
			<?php endif; ?>
			<button class="btn btn-transparent-gray" id="book-single-button" data-toggle="modal" data-target="#myModal"><?php _e('Book now','bookingwp'); ?></button>
		</form>


	</aside>
</div>
