<?php
/*
Template Name: Prices
*/
get_header(); ?>
<!-- Start Header-Section -->
<?php while(have_posts()): the_post(); ?>
<section class="header-section listing" style="background:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>'); no-repeat; background-size:cover;">
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
			<div class="col-md-8">
				<?php
	 		    $allotments = get_posts( array ('post_type' => 'properties', 'post_parent' => 0, 'posts_per_page' => -1, 'order' => 'ASC'));

	 		    foreach ($allotments as $allotment): ?>
	 	   <h3><?php echo $allotment->post_title; ?></h3>
	 	   <p class="lead"><?php _e('Prices','wpbooking'); ?></p>



	 	   <?php
	 		   $html='<table class="table table-striped table-bordered">
	 	   		<tbody>';
	 		   $entries = get_post_meta( $allotment->ID, $prefix . 'prices', true );

	 		   if($entries) {
	 			foreach ( (array) $entries as $key => $entry ) {
	 				$html.='<tr>';
	 			    //$img = $title = $desc = $caption = '';

	 			    if ( isset( $entry['period_name'] ) )
	 			        $period = esc_html( $entry['period_name'] );

	 			    if ( isset( $entry['start_date'] ) )
	 			        $start = esc_html( $entry['start_date'] );

	 			    if ( isset( $entry['end_date'] ) )
	 			        $end = esc_html( $entry['end_date'] );

	 			    if ( isset( $entry['price'] ) )
	 			        $price = $entry['price'] ;

	 			    // Do something with the data
	 			    $html.='<td>'.date('d/m/Y',$start).'</td><td>'.date('d/m/Y',$end).'</td><th scope="col">'.$price.'</th>';
	 				$html.='</tr>';


	 			}
	 		   }

	 			$html.='</table>';

	 			echo $html;

	 		?>




	 	   <?php endforeach; ?>



				<?php get_template_part('content','page'); ?>
				<?php //bookingwp_post_nav(); ?>
			</div>
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>
<!-- End News -->
<?php endwhile; ?>
<!-- End Room -->
<?php get_footer(); ?>
