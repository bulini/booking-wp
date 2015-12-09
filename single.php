<?php
/**
 * The template for displaying all single posts.
 *
 * @package bootstrapwp
 */

get_header(); ?>


		<?php while ( have_posts() ) : the_post(); ?>

			<!-- Start Header-Section -->
			<section class="header-section contact" style="background:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>') no-repeat; background-size:cover;">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h3 class="title-section pull-left">
								<?php the_title(); ?>
							</h3>
							<ul class="breadcrumbs custom-list list-inline pull-right">
								<li><a href="index.html">Home</a></li>
								<li><a href="news.html">News</a></li>
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
							<?php get_template_part('content','single'); ?>
						</div>
						<div class="col-md-4">
							<?php get_sidebar(); ?>
						</div>
					</div>
				</div>
			</section>
			<!-- End News -->


			<?php //get_template_part( 'content', 'single' ); ?>

			<?php bootstrapwp_post_nav(); ?>



		<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
