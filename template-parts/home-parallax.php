<?php wp_reset_query();?>
<script type="text/javascript">jQuery(document).ready(function(){jQuery('#parallax-image').parallax("-30%", -0.25);});</script>

<section class="parallax-effect mt100">
  <div id="parallax-image" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>);">
    <div class="color-overlay fadeIn appear" data-start="600">
      <div class="container">
        <div class="content">
          <h3 class="text-center"><i class="fa fa fa-star-o"></i><?php bloginfo('name');?></h3>
          <p class="text-center"><?php bloginfo('description');?>
		  <br>
        </div>
      </div>
    </div>
  </div>
</section>