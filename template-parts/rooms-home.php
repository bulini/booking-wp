<!-- Start Partners -->
<section id="room" class="partners">
  <div class="container">
    <div class="preamble col-md-12">
      <h3>Our Rooms</h3>
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
              <a href="<?php the_permalink(); ?>" class="btn btn-transparent-white">Prenota</a>
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
                  <li><a href="#"><i class="fa fa-bed"></i> 1</a> </li>
                  <li><a href="#"><i class="fa fa-user"></i> 2</a></li>
                  <li><a href="#"><i class="fa fa-map-marker"></i> Roma</a></li>
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
    <div class="col-sm-4"><?php _e('Sorry, no posts matched your criteria.'); ?></div>
  <?php endif; wp_reset_query(); ?>
  </div>
  </div>
</div>
</div>
</section>
