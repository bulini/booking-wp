<?php get_homeboxes(); $i=0;
    if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
<div class="col-md-3 col-sm-6 feature text-center">
  <div class="overlay">
    <?php the_post_thumbnail('homepage-thumb', array('class'=>'img-responsive')); ?>

    <div class="overlay-shadow">
      <div class="overlay-content">
        <a href="#" class="btn btn-transparent-white">Read More</a>
      </div>
    </div>
  </div>
  <h4><?php the_title(); ?></h4>
  <?php the_content(); ?>
</div>
<?php $i=$i+400; endwhile; endif; ?>
