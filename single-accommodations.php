<?php get_header(); ?>
<!-- Start Header-Section -->
<?php while ( have_posts() ) : the_post(); ?>
<section class="header-slider room">
  <div class="background-slider">
  <?php
  $attachments=OneGallery($post->ID);
  foreach ($attachments as $attachment) { $img=wp_get_attachment_image_src($attachment->ID, 'full', false); ?>
    <img src="<?php echo $img[0]; ?>">
	<?php } ?>
  </div>
</section>
<!-- End Header-Section -->

<!-- Start Room -->
<section id="room">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="room-wrapper negative-margin">
          <div class="room-content col-md-9">
            <div class="room-general">
              <header>
                <div class="pull-left">
                  <h5 class="title">
                    <?php the_title(); ?>
                  </h5>
                  <ul class="tags pt-0 custom-list list-inline pull-left">
                    <li><a href="#">1 Bed</a></li>
                    <li><a href="#">2 People</a></li>
                    <li><a href="#">Sea View</a></li>
                  </ul>
                </div>
                <div class="pull-right">
                  <span class="price">
                    <?php
                     //procedurizzare
                     $range_id = get_post_meta($post->ID,'type',true);
                     $term = get_term( $range_id[0], 'types');
                     $checkin = (isset($_GET['checkin'])) ? $_GET['checkin'] : date('d/m/Y');
                     $checkout = (isset($_GET['checkout'])) ? $_GET['checkout'] : date('d/m/Y');
                     $people = (isset($_GET['people'])) ? $_GET['people'] : 2;
                     $room_number = (isset($_GET['room_number'])) ? $_GET['room_number'] : 1;

                     $people = ($people>2) ? ($people/$room_number) : $people;

                     $allotment = (isset($_GET['room'])) ? $_GET['room'] : default_allotment($term->slug,$people);



                   if ( ! is_wp_error( $term ) ) { ?>
                    &euro; <?php echo check_price($checkin, $checkout,$allotment,$room_number);
                     } ?>
                  </span>
                  </span>
                </div>
              </header>
            </div>
            <div class="room-about">
              <h5 class="title-section">Dettagli</h5>
              <?php the_content(); ?>
            </div>
            <div class="room-tabs">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#amenities">Servizi</a></li>
                <li><a data-toggle="tab" href="#prices">Prezzi</a></li>
                <li><a data-toggle="tab" href="#images">Galleria</a></li>
                <li><a data-toggle="tab" href="#reviews">Recensioni</a></li>
              </ul>

              <div class="tab-content">
                <div id="amenities" class="tab-pane fade in active">
                  <div class="listing-facitilities">
                    <div class="row">
                      <div class="col-md-4 col-sm-4">
                        <ul class="facilities-list custom-list">
                         <?php $product_terms = wp_get_object_terms( get_the_ID(),  'amenities' );
                          if ( ! empty( $product_terms ) ) {
                           $counter=1;
                           if ( ! is_wp_error( $product_terms ) ) {

                               foreach( $product_terms as $term ) {
                                 $idt=$term->term_id;
                                 $icon = get_option("taxonomy_term_".$idt,true);
                                 echo '<li><i class="fa '.$icon['fa-icon'].'"></i><span>' . esc_html( $term->name ) . '</span></li>';

                                 if ($counter % 3 == 0) {
                                   echo '</ul></div><div class="col-md-4 col-sm-12">
                                   <ul class="facilities-list custom-list">';

                                 }
                                 $counter++;

                               }
                           }
                         } ?>
                       </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="prices" class="tab-pane fade">
                  <?php
                      $range_id = get_post_meta($post->ID,'type',true);
                      $term = get_term( $range_id[0], 'types');
                      $allotments = get_posts( array ('post_type' => 'properties', 'post_parent' => 0, 'posts_per_page' => -1, 'order' => 'ASC', 'types' => $term->slug));

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



                </div>

                <div id="images" class="tab-pane fade">
                  <div class="images-gallery">
                    <div class="row">
                    <?php foreach($attachments as $attachment) { $img=wp_get_attachment_image_src($attachment->ID, 'thumbnail', false); ?>
                      <div class="img-single col-md-3">
                        <img src="<?php echo $img[0]; ?>" class="img-responsive img-thumbnail">
                      </div>
                    <?php } ?>
                    </div>
                  </div>
                </div>

                <div id="reviews" class="tab-pane fade">
                  <ul class="reviews-list custom-list">
                    <li>
                      <div class="thumbnail">
                        <img src="img/avatar.jpg" alt="">
                      </div>
                      <div class="review-content">
                        <header>
                          <h5>John Doe</h5>
                          <ul class="stars custom-list list-inline">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                          </ul>
                        </header>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis quam nihil commodi aperiam quibusdam debitis, fugit reiciendis dolore totam unde. Quod vitae porro dignissimos debitis quibusdam possimus, molestias repudiandae assumenda.</p>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>


            <div class="room-related">
              <h5 class="title-section">Related Offers</h5>
              <div class="row">
              <?php
              	wp_reset_query();
              	get_accommodations();
              	  if ( have_posts() ) : while ( have_posts() ) : the_post();
              	  $price = get_post_meta($post->ID, 'min_price', true);
              ?>
              <div class="col-md-6">
                <div class="listing-room-grid">
                  <div class="overlay">
                    <?php the_post_thumbnail('homepage-thumb', array('class'=>'img-responsive')); ?>

                    <div class="overlay-shadow">
                      <div class="overlay-content">
                        <a href="<?php the_permalink(); ?>" class="btn btn-transparent-white">Read More</a>
                      </div>
                    </div>
                  </div>
                  <div class="listing-room-content">
                    <div class="row">
                      <div class="col-md-12">
                        <header>
                          <h5 class="title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                          </h5>
                          <ul class="tags custom-list list-inline">
                            <li><a href="#">1 Bed</a></li>
                            <li><a href="#">2 People</a></li>
                            <li><a href="#">Sea View</a></li>
                          </ul>
                        </header>
                        <span class="price">
                          from $99/day
                        </span>
                        <button class="btn btn-transparent-gray">
                          Read More
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- End room -->
             <?php $i++;
              endwhile; else: ?>
             	<div class="col-sm-4"><?php _e('Sorry, no posts matched your criteria.'); ?></div>
            <?php endif; wp_reset_query(); ?>
            </div>
            </div>
          </div>
          <div class="sidebar col-md-3">
            <div id="map"></div>

            <?php get_template_part('template-parts/single-reservation-form'); ?>



            <div class="sidebar-widget offers">
              <h5 class="widget-title">Special Offers</h5>

            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endwhile; ?>
<!-- End Room -->
<?php get_footer(); ?>
