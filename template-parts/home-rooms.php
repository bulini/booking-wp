<section class="rooms mt150">
  <div class="container">

    <div class="row text-center">
      <div class="col-sm-12">
        <h2 class="lined-heading"><span><?php _e('Our Rooms','bookingwp'); ?></span></h2>
      </div>
    </div>
<?php
	wp_reset_query();
	get_accommodations();
  $col = (count(get_accommodations()) % 3 == 0) ? '4' : '6';
?>
<div class="row">
<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();
	  $price = get_post_meta($post->ID, 'min_price', true);
?>
      <!-- Room -->
      <div class="col-md-<?php echo $col; ?>">
        <!-- normal -->
            <div class="ih-item square effect6 from_top_and_bottom"><a href="<?php the_permalink(); ?>">
                <div class="img"><?php the_post_thumbnail('slider-single',array('class'=>'img-responsive')); ?></div>
                <div class="info">
                  <h3><?php the_title(); ?></h3>
                  <p>Description goes here</p>
                </div>
              </div>
            <!-- end normal -->

      </div>
      <?php $counter++;$i++;
                  if ($counter % 2 == 0) {
                  echo '</div><div class="row mt20">';
                }
              endwhile; else: ?>
          </div><!-- /row -->
      <!-- End room -->

	<div class="col-sm-12"><?php _e('Sorry, no posts matched your criteria.'); ?></div></div>
<?php endif; ?>


  </div>
</section>
