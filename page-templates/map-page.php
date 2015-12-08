<?php
/*
Template Name: map
*/

/**
 * The map template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package bootstrapwp
 */
get_header(); ?>
<!-- Start Header-Section -->
<?php while(have_posts()): the_post(); ?>
	<!-- Start Header-Section -->
	<section class="header-section contact" style="background:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>');">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="title-section pull-left">
						<?php the_title(); ?>
					</h3>
					<ul class="breadcrumbs custom-list list-inline pull-right">
						<li><a href="<?php bloginfo('siteurl');?>">Home</a></li>
						<li><a href="#"><?php the_title(); ?></a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- End Header-Section -->

	<!-- Start Locations -->
  <section class="locations">

    <!-- Start Locations-Top -->
    <div class="locations-top">
      <div id="location-map"></div>
    </div>
    <!-- End Locations-Top -->

    <!-- Start Locations-Bottom -->
    <div class="locations-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="location-single">
              <div class="offices">
                <h3 class="title">
                	<?php the_title(); ?>
                </h3>
                <h5 class="sub-title">Office</h5>
                <div class="row">
                  <div class="col-lg-12 col-md-6">
										<?php the_content(); ?>
		              </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="location-single">
              <div class="offices">
                <h3 class="title">
                  Reception
                </h3>
                <h5 class="sub-title">Office</h5>
                <div class="row">
                  <div class="col-lg-6 col-md-12">
                    <ul class="location-details custom-list">
                      <li><?php echo mytheme_get_option('place_address'); ?></li>
                      <li><?php echo mytheme_get_option('cuty'); ?></li>
                    </ul>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <ul class="location-details custom-list">
                      <li>Phone 1: <?php echo mytheme_get_option('phone'); ?></li>
                    </ul>
                  </div>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- End Locations-Bottom -->

  </section>
  <!-- End Locations -->

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




<?php endwhile; ?>
<!-- End Room -->
<?php get_footer(); ?>
