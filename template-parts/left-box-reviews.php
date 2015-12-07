 <?php $comments = get_comments( array('status' => 'approve')); ?>
    <!-- Testimonials -->
    <section class="testimonials mt100">
      <div class="col-md-6">
        <h2 class="lined-heading bounceInLeft appear" data-start="0"><span><?php _e('Tripadvisor reviews','wpbooking'); ?></span></h2>
        <div id="owl-reviews" class="owl-carousel">
		<div class="item">
			
		<?php foreach($comments as $comment) : ?> 
            <div class="row">
              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><p><?php echo $comment->comment_author; ?></p></div>
              <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                <div class="text-balloon"><?php echo $comment->comment_content; ?></span> </div>
              </div>
            </div>
        <?php endforeach; ?> 
            </div>
          </div>
		</div>
    </section>