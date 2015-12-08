<?php get_header(); ?>
<!-- Start Header-Section -->
<?php while(have_posts()): the_post(); ?>
<section class="header-section listing" style="background:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>');">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="title-section pull-left">
					<?php the_title(); ?>
				</h3>
				<ul class="breadcrumbs custom-list list-inline pull-right">
					<li><a href="#">Home</a></li>
					<li><a href="#"><?php the_title(); ?></a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- End Header-Section -->

<!-- Start Room -->
<section id="room">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="room-wrapper negative-margin">
          <div class="room-content col-md-9">
            <div class="room-general">
              <header>
                <div class="pull-left">
                  <h5 class="title">
                    <?php the_title(); ?>
                  </h5>
                </div>
                <div class="pull-right">

                </div>
              </header>
            </div>
            <div class="room-about">
              <?php the_content(); ?>
            </div>
          </div>
          </div>
        </div>
        <div class="sidebar col-md-3">

        </div>
      </div>
    </div>
  </div>
</section>
<?php endwhile; ?>
<!-- End Room -->
<?php get_footer(); ?>
