<?php get_header(); ?>
<!-- Start Header-Section -->
<?php while(have_posts()): the_post(); ?>
<section class="header-section listing" style="background:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>'); no-repeat; background-size:cover;">
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

<!-- Start News -->
<section class="news">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php get_template_part('content','page'); ?>
				<?php //bookingwp_post_nav(); ?>
			</div>
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>
<!-- End News -->
<?php endwhile; ?>
<!-- End Room -->
<?php get_footer(); ?>
