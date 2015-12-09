<?php
/**
 * @package bootstrapwp
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="post">
	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div>
	<div class="post-content">
		<header class="post-header">
				<?php the_title( '<h1 class="pull-left title">', '</h1>' ); ?>
			<span class="pull-right date"><?php bootstrapwp_posted_on(); ?></span>
		</header>
		<div class="post-meta">
			<?php
				/* translators: used between list items, there is a space after the comma */
				$category_list = get_the_category_list( __( ', ', 'bootstrapwp' ) );

				/* translators: used between list items, there is a space after the comma */
				$tag_list = get_the_tag_list( '', __( ', ', 'bootstrapwp' ) );

				if ( ! bootstrapwp_categorized_blog() ) {
					// This blog only has 1 category so we just need to worry about tags in the meta text
					if ( '' != $tag_list ) {
						$meta_text = __( '<span class="category"><i class="fa fa-tags"></i> %2$s</span>', 'bootstrapwp' );
					} else {
					//	$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'bootstrapwp' );
					}

				} else {
					// But this blog has loads of categories so we should probably display them here
					if ( '' != $tag_list ) {
						$meta_text = __( '<span class="category"><i class="fa fa-tags"></i></span> %1$s', 'bootstrapwp' );
					} else {
					//	$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'bootstrapwp' );
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
				'before' => '<div class="page-links">' . __( 'Pages:', 'bootstrapwp' ),
				'after'  => '</div>',
			) );
		?>
		<ul class="custom-list tags-list list-inline">
			<li><a href="#">Lifestyle</a></li>
			<li><a href="#">Luxury</a></li>
			<li><a href="#">Money</a></li>
		</ul>
		<div class="post-share">
			<p class="pull-left">Share this story</p>
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
