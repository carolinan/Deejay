<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Deejay
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

<div id="comments" class="comments-area">
	<?php
	if ( have_comments() || comments_open() ) {
		?>
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( esc_html__( 'One Reply to &ldquo;%s&rdquo;', 'deejay' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'deejay'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
			?>
		</h2>
		<?php deejay_comments_pagination(); ?>
		<ol class="comment-list">
			<?php
			function deejay_comment( $comment, $args, $depth ) {
				?>
				<li <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
					<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
						<?php echo get_avatar( $comment, '50' ); ?>
						<div class="comment-content">
							<div class="comment-author vcard"><?php echo esc_html( comment_author_link() ); ?></div>
								<?php
								if ( $comment->comment_approved == '0' ) {
									?>
									<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'deejay' ); ?></em><br />
									<?php
								}
								?>
								<div class="comment-meta commentmetadata">
									<?php printf( esc_html( '%1$s at %2$s', 'deejay' ), get_comment_date(), get_comment_time() ); ?>
								</div>
								<?php
								comment_text();

								if ( comments_open() ) {
									comment_reply_link(
										array_merge(
											$args,
											array(
												'add_below' => 'div-comment',
												'depth'     => $depth,
												'max_depth' => $args['max_depth'],
											)
										)
									);
								}
								?>
						</div><!-- .comment-content -->
					</article>
				<?php
			}
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
					'callback'   => 'deejay_comment',
				)
			);
		?>
		</ol><!-- .comment-list -->

		<?php
		deejay_comments_pagination();

	} // End if().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed', 'deejay' ); ?></p>
		<?php
	}

	comment_form();
	?>
</div><!-- #comments -->
