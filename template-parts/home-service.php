    <!-- Testimonials -->
    <section class="mt100">
      <div class="col-md-6">
	      <h2 class="lined-heading bounceInLeft appear" data-start="600"><span><?php bloginfo('name'); ?></span></h2>
           <table class="table table-striped mt30">
              <tbody>
			  	<?php $lang=pll_current_language(); ?>
                  <?php echo service_list($lang); ?>
              </tbody>
            </table>	  	
      </div>
    </section>