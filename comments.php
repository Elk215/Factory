<?php

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
	<div class="section-title">
		<h2 class="section-title">
			<span>
			<?php
				$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				echo '1 Comment';
			} else {	
				echo $comments_number . ' Comments';
			}
			?>
			</span>
		</h2>
	</div>
		<ul class="comment-list">
			<?php
				wp_list_comments(
					array(
						'style'       => 'ul',
						'short_ping'  => true,
                        'avatar_size' => 100,
                        'reply_text'  => 'Ответить',
                        'callback'    => 'mytheme_comment',

					)
				);
			?>
		</ul><!-- .comment-list -->

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'twentysixteen' ); ?></p>
	<?php endif; ?>

    <?php
		comment_form(
			array(
				'class_form' => 'reply-box',
			)
		);
	?>

</div><!-- .comments-area -->
