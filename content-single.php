<?php
/**
 * @package bookingwp
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="post">
	<div class="post-thumbnail">
		<?php the_post_thumbnail('slider-single', array('class'=>'img-responsive')); ?>
	</div>
	<div class="post-content">
		<header class="post-header">
				<?php the_title( '<h2 class="pull-left title">', '</h2>' ); ?>
			<span class="pull-right date"><?php bookingwp_posted_on(); ?></span>
		</header>
		<div class="post-meta">
			<?php
				/* translators: used between list items, there is a space after the comma */
				$category_list = get_the_category_list( __( ', ', 'bookingwp' ) );

				/* translators: used between list items, there is a space after the comma */
				$tag_list = get_the_tag_list( '', __( ', ', 'bookingwp' ) );

				if ( ! bookingwp_categorized_blog() ) {
					// This blog only has 1 category so we just need to worry about tags in the meta text
					if ( '' != $tag_list ) {
						$meta_text = __( '<span class="category"><i class="fa fa-tags"></i> %2$s</span>', 'bookingwp' );
					} else {
					//	$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'bookingwp' );
					}

				} else {
					// But this blog has loads of categories so we should probably display them here
					if ( '' != $tag_list ) {
						$meta_text = __( '<span class="category"><i class="fa fa-tags"></i></span> %1$s', 'bookingwp' );
					} else {
					//	$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'bookingwp' );
					}

				} // end check for categories on this blog

				printf(
					$meta_text,
					$category_list,
					$tag_list,
					get_permalink()
				);
			?>

			<span class="author">
				<i class="fa fa-user"></i>
				<a href="#"><?php the_author(); ?></a>
			</span>
			<span class="comments">
				<i class="fa fa-comment"></i>
				<a href="#">2 Comments</a>
			</span>
		</div>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'bookingwp' ),
				'after'  => '</div>',
			) );
		?>
		<div class="post-share">
			<p class="pull-left">Condividi</p>
			<ul class="custom-list social list-inline pull-right">
				<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
				<li><a href="#"><i class="fa fa-git-square"></i></a></li>
			</ul>
		</div>
		<?php
		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;
		?>
	</div>
</article>
