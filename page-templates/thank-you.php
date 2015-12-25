<?php
	/*
	Template Name: Thank you Reservation
	*/
	$bid = $_POST['bid'];
	if(!$_POST['bid']) {
		wp_redirect( home_url() ); exit; //evitiamo spam]
	}
	get_header();
	$encrypted = @openssl_encrypt($_POST['cc-number'],  'AES-128-CBC', 'maria12345');
	// $encrypted;

	$booking = array(
      'ID'           => $bid,
      'post_title'   => 'Booking #'.$bid.' Confirmed',
      'post_content' => 'Operation time '.date("d/m/Y h:i:s").' changing status to confirmed',
			'post_status' 	 =>	'booked',
	);

// Update the post into the database
  wp_update_post( $booking );
	// se non aggiorna... dio porco
	update_post_meta($bid, 'encrypted_card', $encrypted);
	update_post_meta($bid, 'cc-exp', $_POST['cc-exp']);
	update_post_meta($bid, 'cc-cvv', $_POST['cc-cvv']);
	update_post_meta($bid, 'name_on_card', $_POST['name-oncard']);
?>
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
<!-- Start News -->
<section class="news">
	<div class="container">
		<div class="row">
			<div class="col-md12">
			<div class="alert alert-success" role="alert">
				<?php  _e('Congratulations, your booking is confirmed. No fees will be applied, you will pay at your arrival!','wpbooking');?>
			</div>

		<?php
			wp_reset_query();

			$booking = new WP_Query( array('post_type' => 'bookings','meta_key' => 'token', 'meta_value' => $_GET["token"]) );
			while ($booking->have_posts()) : $booking->the_post();

			$name = get_post_meta($bid,'name',true);
			$email = get_post_meta($bid,'email',true);
			$phone = get_post_meta($bid,'phone',true);
			$checkin = get_post_meta($bid,'checkin',true);
			$checkout = get_post_meta($bid,'checkout',true);
			$price = get_post_meta($bid,'price',true);
			$room = get_post_meta($bid,'room',true);
			$adults = get_post_meta($bid,'adults',true);
			$children = get_post_meta($bid,'children',true);
			$message = get_post_meta($bid,'message',true);
			$token = get_post_meta($bid,'token',true);
  		$lang = get_post_meta($bid,'lang',true);

			$address = get_post_meta($bid,'email',true);
			$from = mytheme_get_option('place_name').' <'.$address.'>';
			$email_bcc = get_bloginfo('admin_email');
			$e_subject = sprintf(pll_translate_string(booking_get_option('wpbooking_confirmed_email_subject'),$lang),$name);
			// Configuration option.
			$request_language=$lang;
			$intro_text = sprintf(pll_translate_string(booking_get_option('wpbooking_confirmed_email'),$request_language),$name);
			$reservation_details = booking_details($bid);
			$cancellation_policy = sprintf(pll_translate_string(booking_get_option('wpbooking_cancellation_policy'),$request_language),$name);

			$email_content = $intro_text;
			$email_content.= $reservation_details;

			$email_content.="<hr/>". PHP_EOL . PHP_EOL;
			$email_content.="<h5>Cancellation Policy</h5><small>".$cancellation_policy."</small>";
			$msg = wordwrap( $e_body, 70 );
			$e_body = build_email($email_content);
			$headers[] = "From: $from" . PHP_EOL;
			$headers[] = "Bcc: $email_bcc" . PHP_EOL;
			//customer voucher
			wp_mail( $address, $e_subject, $e_body, $headers);

			//admin card
			$owner_subject = __('Conferma Prenotazione #','wpbooking').$bid;
			$owner_address = mytheme_get_option('email');
			$from = mytheme_get_option('place_name').' <'.$address.'>';

			$email_content_owner="<b>Card:</b> $encrypted<br />";
			$email_content_owner.="<b>Exp Card:</b>".$_POST['cc-exp'].'<br />';
			$email_content_owner.="<b>CVV Card:</b>".$_POST['cc-cvv'].'<br />';
			$email_content_owner.="<b>Name on card:</b> ".$_POST['name-oncard']."<br />";

			$email_content_owner.= $reservation_details;
			$e_body = build_email($email_content_owner);
			$headers[] = "From: $from" . PHP_EOL;
			$headers[] = "Bcc: $email_bcc" . PHP_EOL;
			//customer voucher
			wp_mail( $owner_address, $owner_subject, $e_body, $headers);

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
							<abbr title="Phone">P:</abbr> <?php echo $phone; ?>
					</address>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 text-right">
					<p>
							<em>Date: <?php echo date('d/m/Y');?></em>
					</p>
					<p>
							<em>Receipt #: <?php echo $token; ?></em>
							<em>Status #: <span class="label label-success"><?php echo get_post_status(); ?></span></em>

					</p>
			</div>
	</div>
	<div class="row">
			<div class="text-center">
					<h1><?php  _e('Voucher','wpbooking');?></h1>
			</div>
			</span>

	<table class="table table-hover">
		<thead>
				<tr>
						<th>Booking</th>
						<th>#</th>
						<th class="text-center"><?php  _e('Price','wpbooking');?></th>
						<th class="text-center"><?php  _e('Total','wpbooking');?></th>
				</tr>
		</thead>
		<tbody>
				<tr>
						<td class="col-md-9"><em><?php echo get_the_title($room); ?></em> - <?php echo date('d/m/Y',$checkin); ?> - <?php echo date('d/m/Y',$checkout); ?></h4></td>
						<td class="col-md-1" style="text-align: center"> 2 </td>
						<td class="col-md-1 text-center"><?php echo $price ?></td>
						<td class="col-md-1 text-center"><?php echo $price ?></td>
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
						<td class="text-center">
						<p>
								<strong><?= $price ?></strong>
						</p>
						<p>
								<strong><?= $price ?></strong>
						</p></td>
				</tr>

		</tbody>
</table>
</div>

</div>




			<?php endwhile; ?>
		</div>
	</div>
</section>


	<?php get_footer(); ?>
