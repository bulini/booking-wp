<!-- Gallery -->
<section class="gallery-slider mt100">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="lined-heading"><span>Gallery</span></h2>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div id="owl-gallery" class="owl-carousel">
          <?php
          $attachments = get_posts('post_type=attachment&orderby=post_date&order=DESC&posts_per_page=9');
          foreach ($attachments as $attachment) {
          if(wp_attachment_is_image($attachment->ID)) {
          $img_small=wp_get_attachment_image_src($attachment->ID, 'homepage-thumb', false);
      	$img=wp_get_attachment_image_src($attachment->ID, 'gallery', false);
      	?>

          <div class="item"><a href="<?php echo $img[0]; ?>" data-rel="prettyPhoto[gallery1]"><img src="<?php echo $img_small[0]; ?>" alt="Image 1"><i class="fa fa-search"></i></a></div>
          <?php }
      	    }
          ?>
        </div>
        <div class="col-md-4">
          
        </div>

        </div>
  </div>
</section>
