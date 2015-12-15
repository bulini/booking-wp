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

  <!-- testimonials -->
  <?php get_template_part('template-parts/testimonials'); ?>
  <!-- tabs -->
  <?php get_template_part('template-parts/tabs'); ?>
  <!-- carousel -->
  <?php get_template_part('template-parts/carousel');?>

<!-- Footer -->
<?php get_footer(); ?>
