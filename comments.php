<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package bootstrapwp
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div class="post-comments">
	<?php if ( have_comments() ) : ?>

	<h5 class="post-comments-title">
		<?php
			printf( _nx( '1 comment on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'bootstrapwp' ),
				number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
		?>
	</h5>
	<ul class="custom-list comments">
		<?php
			wp_list_comments( array(
				'style'      => 'ul',
				'short_ping' => true,
			) );
		?>
	</ul>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
	<nav id="comment-nav-below" class="comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'bootstrapwp' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'bootstrapwp' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'bootstrapwp' ) ); ?></div>
	</nav><!-- #comment-nav-below -->
	<?php endif; // check for comment navigation ?>

<?php endif; // have_comments() ?>

</div>




<div class="post-addcomment">
	<h5 class="post-addcomment-title">Join This Conversation</h5>
	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'bootstrapwp' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>
</div>
</div>
