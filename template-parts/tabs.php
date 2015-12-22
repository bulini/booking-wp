<!-- Start Supertabs -->
<section class="supertabs">
  <div class="container">
    <div class="row">

      <!-- Start Tab-Navigation -->
      <div class="col-md-4 tab-navigation">
        <ul class="custom-list">
          <?php  wp_reset_query();
            get_tabs(); $i=0;
              if ( have_posts() ) : while ( have_posts() ) : the_post(); $css=($i==0) ? ' active' : '';
          ?>
          <li class="<?php echo $css; ?>">
            <a data-toggle="tab" href="#tab-<?php echo $i; ?>">
              <h5 class="title"><?php the_title(); ?></h5>
              <!--<h6 class="subtitle">No compromises</h6>-->
            </a>
          </li>
          <?php $i++; endwhile; endif; ?>
        </ul>
      </div>
      <!-- End Tab-Navigation -->

      <!-- Start Tab-Content -->
      <div class="col-md-8 tab-content">
        <?php get_tabs(); $i=0;
            if ( have_posts() ) : while ( have_posts() ) : the_post(); $css=($i==0) ? ' active' : '';
        ?>

        <div id="tab-<?php echo $i; ?>" class="tab-pane fade in <?php echo $css; ?>">
          <?php the_post_thumbnail('homepage-thumb', array('class'=>'img-responsive')); ?>
          <header>
            <h5 class="title"><?php the_title(); ?></h5>
            <!--<h6 class="subtitle">We are available</h6>-->
          </header>
          <?php the_content(); ?>
        </div>
        <?php $i++; endwhile; endif; ?>
      </div>
      <!-- End Tab-Content -->

    </div>
  </div>
</section>
<!-- End Supertabs -->
