<div class="banner-bg">
  <?php get_slides(); if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php $picture = wp_get_attachment_image_src( get_post_thumbnail_id(), 'homepage-slider' ); ?>
  <div class="banner-bg-item"><img src="<?php echo $picture[0]; ?>" alt=""></div>
<?php endwhile; else :  ?>
  <div class="banner-bg-item"><img src="<?php echo get_template_directory_uri(); ?>/homepage_v1/img/M_M_0002.jpg" alt=""></div>
<?php endif; ?>
</div>
