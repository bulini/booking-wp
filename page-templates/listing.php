<?php
/*
Template Name: Listing
*/
 get_header();
 ?>

 <!-- Start Header-Section -->
 <section class="header-section listing" style="background:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>');">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <h3 class="title-section pull-left">
           <?php the_title(); ?>
         </h3>
         <ul class="breadcrumbs custom-list list-inline pull-right">
           <li><a href="<?php bloginfo('siteurl'); ?>">Home</a></li>
           <li><a href="#"><?php the_title(); ?></a></li>
         </ul>
       </div>
     </div>
   </div>
 </section>
 <!-- End Header-Section -->

 <section id="listing">
   <div class="container">
     <div class="row">
       <div class="sidebar col-md-3">
          <?php get_template_part('template-parts/left-sidebar-listing')?>
       </div>

       <div class="listing-content col-md-9">
         <div class="listing-pagination">
           <h5 class="title pull-left"><?php _e( 'Available Rooms', 'bookingwp' ); ?></h5>
         </div>
         <?php
           wp_reset_query();
           get_accommodations();
           if ( have_posts() ) : while ( have_posts() ) : the_post();
             $price = get_post_meta($post->ID, 'min_price', true);
         ?>
         <!-- room list -->
         <div class="listing-room-list">
           <?php $attachments=OneGallery($post->ID);
           if(count($attachments>1)) :
           ?>
           <div class="thumbnail">
             <div class="thumbnail-slider">
               <?php
               foreach ($attachments as $attachment) { $img=wp_get_attachment_image_src($attachment->ID, 'thumbnail', false); ?>
               <img src="<?php echo $img[0]; ?>" alt="" class="img-responsive">
               <?php } ?>
             </div>
           </div>
         <?php else : ?>
           <div class="thumbnail">
              <?php the_post_thumbnail('thumbnail', array('class'=>'img-responsive')); ?>
           </div>
         <?php endif; ?>

           <div class="listing-room-content">
             <div class="row">
               <div class="col-md-12">
                 <header>
                   <div class="pull-left">
                     <h5 class="title">
                       <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                     </h5>
                     <ul class="tags custom-list list-inline pull-left">
                       <li><a href="#"><?php echo get_post_meta($post->ID,'beds', true); ?> <i class="fa fa-bed"></i></a></li>
                       <li><a href="#"><?php echo get_post_meta($post->ID,'max_people', true); ?> <i class="fa fa-user"></i></a></li>
                       <li><a href="#"><?php echo mytheme_get_option('city_name'); ?></a></li>
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

                   </div>
                 </header>
                 <div class="listing-facitilities">
                   <div class="row">
                     <div class="col-md-3 col-sm-12">
                       <ul class="facilities-list custom-list">
                        <?php $amenities = wp_get_object_terms( $post->ID,  'amenities' );
                         if ( ! empty( $amenities ) ) {
                          $counter=1;
                         	if ( ! is_wp_error( $amenities ) ) {

                              foreach( $amenities as $term ) {
                                $idt=$term->term_id;
                                $icon = get_option("taxonomy_term_".$idt,true);
                         				echo '<li><i class="fa '.$icon['fa-icon'].'"></i><span>' . esc_html( $term->name ) . '</span></li>';

                                if ($counter % 3 == 0) {
                                  echo '</ul></div><div class="col-md-3 col-sm-12">
                                  <ul class="facilities-list custom-list">';

                                }
                                $counter++;

                              }
                         	}
                        } ?>
                      </ul>
                    </div>

                     <div class="col-md-3 col-sm-3 pull-right">
                       <?php
                       $checkin = (isset($_GET['checkin'])) ? $_GET['checkin'] : '';
                       if(isset($_GET['checkin'])) {
                         $booking_url = '?checkin='.$checkin.'&checkout='.$checkout.'&people='.$people.'&room_number='.$room_number;
                       }
                       ?>
                       <a href="<?php the_permalink(); ?><?php echo $booking_url; ?>" class="btn btn-transparent-gray">
                         <?php _e('Book now','bookingwp'); ?>
                       </a>
                     </div>

                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <!-- listing end -->
         <?php $i++;
          endwhile; else: ?>
           <div class="col-sm-12"><?php _e('Sorry, no posts matched your criteria.'); ?></div>
        <?php endif;  ?>
         <div class="listing-pagination footer">
           <?php bookingwp_paging_nav(); wp_reset_query();?>
         </div>


       </div>
     </div>
   </div>
 </section>
<?php get_footer(); ?>
