<!-- Start Partners -->
<section id="room" class="partners">

  <div class="container">
    <div class="row">
      <div class="preamble col-md-12">
        <h3><?php _e( 'Our rooms', 'bookingwp' ); ?></h3>
      </div>
    </div>

    <div class="row">
    <?php
      wp_reset_query();
      get_accommodations();
        if ( have_posts() ) : while ( have_posts() ) : the_post();
        $price = get_post_meta($post->ID, 'min_price', true);
    ?>
    <div class="col-md-3">
      <div class="listing-room-grid">
        <div class="overlay">
          <?php the_post_thumbnail('homepage-thumb', array('class'=>'img-responsive')); ?>

          <div class="overlay-shadow">
            <div class="overlay-content">
              <a href="<?php the_permalink(); ?>" class="btn btn-transparent-white"><?php _e('Book now','bookingwp'); ?></a>
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
                  <li><a href="#"><i class="fa fa-bed"></i> <?php echo get_post_meta($post->ID,'beds', true); ?></a> </li>
                  <li><a href="#"><i class="fa fa-user"></i> <?php echo get_post_meta($post->ID,'max_people', true); ?></a></li>
                  <li><a href="#"><i class="fa fa-map-marker"></i> <?php echo mytheme_get_option('city_name'); ?></a></li>
                </ul>
              </header>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- End room -->
   <?php $i++;
    endwhile; else: ?>
    <div class="col-sm-12"><?php _e('Sorry, no posts matched your criteria.'); ?></div>
  <?php endif; wp_reset_query(); ?>
  </div>
  </div>
</div>
</div>
</section>
