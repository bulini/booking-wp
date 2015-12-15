<!-- Start Testimonials -->
<section class="testimonials">

  <!-- Start Video Background -->
  <div id="video_testimonials" data-vide-bg="<?php echo get_template_directory_uri(); ?>/video/roma" data-vide-options="position: 0% 50%"></div>
  <div class="video_gradient"></div>
  <!-- End Video Background -->

  <div class="container">
    <div class="row">


      <div class="col-md-12">
        <div id="owl-testimonials" class="owl-carousel owl-theme">
          <?php get_testimonials();
          if ( have_posts() ) : while ( have_posts() ) : the_post();
          ?>
          <!-- Start Container Item -->
          <div class="item">
            <div class="col-lg-12">
              <blockquote class="quote">
                <cite><?php the_title(); ?></cite>
                <p class="stars">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </p>
                <?php the_content(); ?>
              </blockquote>
            </div>
          </div>
          <!-- End Container Item -->
          <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Testimonials -->
