<?php
	/*
	Template Name: Confirm Reservation
	*/
	get_header();
?>
<section class="header-section listing" style="background:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>'); background-size:cover;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="title-section pull-left">
					<i class="fa fa-bolt"></i> <?php the_title(); ?>
				</h3>
				<ul class="breadcrumbs custom-list list-inline pull-right">
					<li><a href="#">Home</a></li>
					<li><a href="#"><?php the_title(); ?></a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- End Header-Section -->
			<?php
				wp_reset_query();

				$booking = new WP_Query( array('post_type' => 'bookings','meta_key' => 'token', 'meta_value' => $_GET["token"],'posts_per_page' => 1));
				if(!isset($_GET['token']) || $_GET['token']=='') { die('<div class="alert alert-danger">Opsss there is something wrong!!! Fuck...</div>');}
				while ($booking->have_posts()) : $booking->the_post();
?>
<!-- Start News -->
<section class="news">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
			<?php
			$name = get_post_meta(get_the_id(),'name',true);
			$email = get_post_meta(get_the_id(),'email',true);
			$phone = get_post_meta(get_the_id(),'phone',true);
			$checkin = get_post_meta(get_the_id(),'checkin',true);
			$checkout = get_post_meta(get_the_id(),'checkout',true);
			$price = get_post_meta(get_the_id(),'price',true);
			$room = get_post_meta(get_the_id(),'room',true);
			$room_id = get_post_meta(get_the_id(),'room_id',true);
			$adults = get_post_meta(get_the_id(),'adults',true);
			$children = get_post_meta(get_the_id(),'children',true);
			$message = get_post_meta(get_the_id(),'message',true);
			$token = get_post_meta(get_the_id(),'token',true);
		?>
				<div class="well">
					<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
									<address>
											<strong><?php echo $name; ?></strong>
											<br>
											<?php echo $email; ?>
											<br>
											<?php echo $phone; ?>
											<br>
											<abbr title="Phone">Phone:</abbr> <?php echo $phone; ?>
									</address>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6 text-right">
									<p>
											<em>Date: <?php echo date('d/m/Y');?></em>
									</p>
									<p>
											<em>Booking id#: <?php echo $token; ?></em>
									</p>
							</div>
					</div>
					<div class="row">
							<div class="text-center">
									<h3>Booking Details</h3>
							</div>
							</span>

					<table class="table table-hover">
						<thead>
								<tr>
										<th>Room</th>
										<th>#</th>
										<th class="text-center">Price</th>
										<th class="text-center">Total</th>
								</tr>
						</thead>
						<tbody>
								<tr>
										<td class="col-md-9"><em><?php echo get_the_title($room); ?> - <?php echo get_the_title($room_id); ?></em> - <?php echo date('d/m/Y',$checkin); ?> - <?php echo date('d/m/Y',$checkout); ?></h4></td>
										<td class="col-md-1" style="text-align: center"> 2 </td>
										<td class="col-md-1 text-right"><?php echo $price ?></td>
										<td class="col-md-1 text-right"><?= number_format($price,2, '.', ' ') ?></td>
								</tr>

								<tr>
										<td>   </td>
										<td>   </td>
										<td class="text-right"></td>
										<td class="text-right">
										<p>
												<strong><?= number_format($price,2, '.', ' ') ?></strong>
										</p>
									</td>
								</tr>

						</tbody>
				</table>

				<div class="room-tabs">
				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#paypal" aria-controls="paypal" role="tab" data-toggle="tab"><i class="fa fa-cc-paypal"></i> <?php  _e('Pay with Paypal','bookingwp');?></a></li>
				    <li role="presentation"><a href="#card" aria-controls="card" role="tab" data-toggle="tab"><i class="fa fa-lock"></i> <?php  _e('Credit card','bookingwp');?></a></li>
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">
				    <div role="tabpanel" class="tab-pane active" id="paypal">
							<?php include(locate_template('template-parts/paypal-form.php')); ?>
						</div>
				    <div role="tabpanel" class="tab-pane" id="card">
							<?php include(locate_template('template-parts/cc-form.php')); ?>
						</div>
				  </div>
				</div>
		</div>

		</div>
	</div>
	   		<div class="col-md-4" id="sidebar-wrapper">
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>
	<?php get_footer(); ?>
