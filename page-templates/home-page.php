<?php
/*
	Template Name: Home
*/
$options = load_theme_options();
global $options;
?>
<?php get_header(); ?>
<!-- slider -->

  <!-- Start Banner -->
  <section id="banner">

	<?php get_template_part('template-parts/home-slider'); ?>

    <div class="css-table">
      <div class="css-table-cell">

        <!-- Start Banner-Search -->
        <?php get_template_part('template-parts/reservation-form'); ?>
        <!-- End Banner-Search -->

      </div>
    </div>
  </section>
  <!-- End Banner -->

  <!-- Start About -->
  <section class="about">
    <div class="container">
      <div class="row">
        <div class="preamble col-md-12">
          <h3><?php echo $options['jumbotron_h1']; ?></h3>
          <p><?php echo $options['jumbotron_text']; ?></p>
        </div>

        <?php get_template_part('template-parts/home-boxes'); ?>

    </div>
  </section>
  <!-- End About -->

  <!-- Start Testimonials -->
  <section class="testimonials">

    <!-- Start Video Background -->
    <div id="video_testimonials" data-vide-bg="video/ocean" data-vide-options="position: 0% 50%"></div>
    <div class="video_gradient"></div>
    <!-- End Video Background -->

    <div class="container">
      <div class="row">
        <div class="preamble light col-md-12">
          <h3>Testimonials</h3>
        </div>

        <div class="col-md-12">
          <div id="owl-testimonials" class="owl-carousel owl-theme">

            <!-- Start Container Item -->
            <div class="item">
              <div class="col-lg-12">
                <blockquote class="quote">
                  <cite>John Doe<span class="job">CEO - UOUapps</span></cite>
                  <p class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam. Quisque semper justo at risus. Donec venenatis, turpis vel hendrerit interdum, dui ligula ultricies purus, sed posuere libero dui.
                </blockquote>
              </div>
            </div>
            <!-- End Container Item -->

            <!-- Start Container Item -->
            <div class="item">
              <div class="col-lg-12">
                <blockquote class="quote">
                  <cite>John Kowalski<span class="job">CEO - UOUapps</span></cite>
                  <p class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam. Quisque semper justo at risus. Donec venenatis, turpis vel hendrerit interdum, dui ligula ultricies purus, sed posuere libero dui.
                </blockquote>
              </div>
            </div>
            <!-- End Container Item -->

            <!-- Start Container Item -->
            <div class="item">
              <div class="col-lg-12">
                <blockquote class="quote">
                  <cite>John Doe<span class="job">CEO - UOUapps</span></cite>
                  <p class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam. Quisque semper justo at risus. Donec venenatis, turpis vel hendrerit interdum, dui ligula ultricies purus, sed posuere libero dui.
                </blockquote>
              </div>
            </div>
            <!-- End Container Item -->

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Testimonials -->

  <?php get_template_part('template-parts/tabs'); ?>

  <!-- Start Partners -->
  <section class="partners">
    <div class="container">
      <div class="row">
        <div class="preamble col-md-12">
          <h3>Our Partners</h3>
        </div>
        <div class="col-md-12">
          <div id="clients-slider" class="owl-carousel">
            <img src="<?php echo get_template_directory_uri(); ?>/homepage_v1/img/company1.png" alt="" class="img-responsive">
            <img src="<?php echo get_template_directory_uri(); ?>/homepage_v1/img/company2.png" alt="" class="img-responsive">
            <img src="<?php echo get_template_directory_uri(); ?>/homepage_v1/img/company3.png" alt="" class="img-responsive">
            <img src="<?php echo get_template_directory_uri(); ?>/homepage_v1/img/company1.png" alt="" class="img-responsive">
            <img src="<?php echo get_template_directory_uri(); ?>/homepage_v1/img/company2.png" alt="" class="img-responsive">
            <img src="<?php echo get_template_directory_uri(); ?>/homepage_v1/img/company3.png" alt="" class="img-responsive">
            <img src="<?php echo get_template_directory_uri(); ?>/homepage_v1/img/company1.png" alt="" class="img-responsive">
            <img src="<?php echo get_template_directory_uri(); ?>/homepage_v1/img/company2.png" alt="" class="img-responsive">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Partners -->

<!-- Footer -->
<?php get_footer(); ?>
