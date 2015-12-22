<?php
	/*
	Template Name: Reservation Handler
	*/



	if ( is_user_logged_in() ) {
?>
	<?php get_template_part('header'); ?>
	<section class="header-section listing" style="background:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>'); background-size:cover;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="title-section pull-left">
						<?php the_title(); ?>
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



	<!-- Start News -->
	<section class="news">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<form class="form-horizontal" role="form" method="post">

		<?php
			wp_reset_query();

			$booking = new WP_Query( array('post_type' => 'bookings','meta_key' => 'token', 'meta_value' => $_GET["token"]) );
			while ($booking->have_posts()) : $booking->the_post();

			$name = get_post_meta(get_the_id(),'name',true);
			$email = get_post_meta(get_the_id(),'email',true);
			$phone = get_post_meta(get_the_id(),'phone',true);
			$checkin = get_post_meta(get_the_id(),'checkin',true);
			$checkout = get_post_meta(get_the_id(),'checkout',true);
			$price = get_post_meta(get_the_id(),'price',true);
			$room = get_post_meta(get_the_id(),'room',true);
			$room_number = get_post_meta(get_the_id(),'room_number',true);
			$adults = get_post_meta(get_the_id(),'adults',true);
			$children = get_post_meta(get_the_id(),'children',true);
			$message = get_post_meta(get_the_id(),'message',true);
			$lang = get_post_meta(get_the_id(),'lang',true);
			?>

		    <p class="lead">Richiesta #n <?php echo get_the_id(); ?> - lingua: <?php echo $lang; ?> procedura: <?php the_time('d/m/Y H:i:s'); ?></p>
				<address>
						<strong><?php echo $name; ?></strong>
						<br>
						<?php echo $email; ?>
						<br>
						<?php echo $phone; ?>
						<br>
						<abbr title="Phone">Phone:</abbr> <?php echo $phone; ?>
				</address>
				<div class="well">
						<div class="text-center">
								<h4>Booking Details</h4>
						</div>
						</span>

				<table class="table table-hover">
					<thead>
							<tr>
									<th>Room</th>
									<th class="text-center">#</th>
									<th class="text-center">Price</th>
									<th class="text-center">Total</th>
							</tr>
					</thead>
					<tbody>
							<tr>
									<td class="col-md-8"><em><?php echo get_the_title($room); ?></em> - <?php echo date('d/m/Y',$checkin); ?> - <?php echo date('d/m/Y',$checkout); ?></h4></td>
									<td class="col-md-1" style="text-align: center"> <?php echo $room_number; ?> </td>
									<td class="col-md-2 text-center"><?= number_format($price,2, '.', ' ') ?></td>
									<td class="col-md-1 text-center"><?= number_format($price,2, '.', ' ') ?></td>
							</tr>

							<tr>
									<td>   </td>
									<td>   </td>
									<td class="text-right">
									<p>
											<strong>Subtotal: </strong>
									</p>
									<p>
											<strong>Tax: </strong>
									</p></td>
									<td class="text-right">
									<p>
											<strong><?= number_format($price,2, '.', ' ') ?></strong>
									</p>
									<p>
											<strong>3.50</strong>
									</p></td>
							</tr>

					</tbody>
			</table>
			<h4>Message</h4>
			<?php echo $message; ?>
			</div>




			<?php endwhile; ?>
		</div>
	   <div class="col-md-6">

		   <p class="lead">Gestione <?php echo date('d/m/Y H:i:s'); ?></p>
		   <legend>Lavorazione richiesta</legend>
			 <div class="well">
			 <fieldset>
		      <div class="form-group">
		        <label class="col-sm-3 control-label" for="card-holder-name">Stato</label>
		        <div class="col-sm-9">
					<span class="label label-default"><?php echo get_post_status(); ?></span>
		        </div>
		      </div>
			  <?php //$statuses = array_slice(get_post_stati(), -3, 3, true); ?>
			  <?php $statuses = array_slice(get_post_stati(),-5,5,true); ?>
		      <div class="form-group">
		        <label class="col-sm-3 control-label" for="status">Stato</label>
		        <div class="col-sm-9">
		          <select name="status" id="status" class="form-control">
			          <?php foreach($statuses as $status) :
										$selected=get_post_status()==$status ? 'selected' : '';
									?>
			          	<option value="<?php echo $status; ?>" <?php echo $selected; ?>><?php _e($status,'wpbooking'); ?></option>
					  <?php endforeach; ?>
		          </select>
		        </div>
		      </div>


		      <div class="form-group">
		        <label class="col-sm-3 control-label" for="owner_message">Messaggio</label>
		        <div class="col-sm-9">
							<textarea name="owner_message" id="owner_message" class="form-control"></textarea>
		        </div>
		      </div>

		      <div class="form-group">
		        <label class="col-sm-3 control-label" for="owner_price">Prezzo &euro; </label>
		        <div class="col-sm-9">
		          <input type="text" class="form-control" name="owner_price" id="owner_price" value="<?php echo $price; ?>">
		        </div>
		      </div>

					<div class="form-group">
		        <label class="col-sm-3 control-label" for="owner_price">Extra &euro; </label>
		        <div class="col-sm-3">
		          <input type="text" class="form-control" name="owner_price" id="extra_price" value="<?php echo $price; ?>">
		        </div>
						<div class="col-sm-6">
		          <input type="text" class="form-control" name="extra_price_description" id="extra_price_description" value="<?php echo $price; ?>">
							<input type="hidden" value="<?php echo get_the_id(); ?>" id="booking_id" name="booking_id" />
						</div>


		      </div>




		      <div class="form-group">
		        <label class="col-sm-3 control-label" for="link_cc">Invia link per Carta</label>
		        <div class="col-sm-9">
					SI<input type="radio" class="form-control" name="link_cc" id="link_cc" value="y" checked />
					NO<input type="radio" class="form-control" name="link_cc" id="link_cc" value="n"  />
		        </div>
		      </div>



		      <div class="form-group">
		        <div class="col-sm-offset-3 col-sm-9">
		          <button type="button" id="send-offer" class="btn btn-success">Invia</button>
		        </div>
		      </div>
		    </fieldset>


			<div id="response">

			</div>

		</div>
	  </div>
	 </form>
 	</div>
	</div>
</div>
</section>

	<?php get_footer(); ?>


<?php } else { ?>
	<a href="<?php echo wp_login_url( get_permalink().'?token='.$_GET['token'] ); ?>" title="Login">Login</a>
<?php } ?>
