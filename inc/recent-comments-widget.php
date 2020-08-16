<?php
/**
 * Widget API: WP_Widget_Recent_Comments class
 *
 * @package Deejay
 */

/**
 * Register our custom recent comment widget.
 */
function deejay_recent_comments_widget() {
	register_widget( 'Deejay_Recent_Comments_Widget' );
}
add_action( 'widgets_init', 'deejay_recent_comments_widget' );


/**
 * Core class used to implement a Recent Comments widget.
 */
class Deejay_Recent_Comments_Widget extends WP_Widget {

	/**
	 * Sets up a new Recent Comments widget instance.
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'deejay-recent-comments',
			'description'                 => __( 'Your site&#8217;s most recent comments.', 'deejay' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'deejay-recent-comments', __( 'Deejay: Recent Comments', 'deejay' ), $widget_ops );
		$this->alt_option_name = 'deejay_recent_comments';

		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
			add_action( 'wp_head', array( $this, 'deejay_recent_comments_style' ) );
		}
	}

	/**
	 * Outputs the default styles for the Recent Comments widget.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function deejay_recent_comments_style() {
		/**
		 * Filters the Recent Comments default widget styles.
		 *
		 * @param bool   $active  Whether the widget is active. Default true.
		 * @param string $id_base The widget ID.
		 */
		// Temp hack #14876.
		if ( ! current_theme_supports( 'widgets' ) || ! apply_filters( 'show_recent_comments_widget_style', true, $this->id_base ) ) {
			return;
		}
		?>
			<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
		<?php
	}

	/**
	 * Outputs the content for the current Recent Comments widget instance.
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Comments widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$output = '';

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Comments', 'deejay' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}

		/**
		 * Filters the arguments for the Recent Comments widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Comment_Query::query() for information on accepted arguments.
		 *
		 * @param array $comment_args An array of arguments used to retrieve the recent comments.
		 */
		$comments = get_comments(
			apply_filters(
				'widget_comments_args',
				array(
					'number'      => $number,
					'status'      => 'approve',
					'post_status' => 'publish',
				)
			)
		);

		$output .= $args['before_widget'];
		if ( $title ) {
			$output .= $args['before_title'] . $title . $args['after_title'];
		}

		$output .= '<ul id="recentcomments">';
		if ( is_array( $comments ) && $comments ) {
			// Prime cache for associated posts (Prime post term cache if we need it for permalinks.).
			$post_ids = array_unique( wp_list_pluck( $comments, 'comment_post_ID' ) );
			_prime_post_caches( $post_ids, strpos( get_option( 'permalink_structure' ), '%category%' ), false );

			foreach ( (array) $comments as $comment ) {
				$output .= '<li class="recentcomments">';
				if ( ! post_password_required( $comment->comment_post_ID ) ) {
					$output .= deejay_get_svg( array( 'icon' => 'quote-right' ) );
					$output .= '<span class="comment-content">' . get_comment_excerpt( $comment->comment_ID ) . '</span>';
				}

				$output .= sprintf(
					/* translators: comments widget: 1: comment author, 2: post link */
					_x( '%1$s on %2$s', 'widgets', 'deejay' ),
					'<span class="deejay-recent-comments-meta"><span class="comment-author-link">' . 
					get_comment_author_link( $comment ) . '</span>',
					'<a class="comment-post-link" href="' . esc_url( get_comment_link( $comment ) ) . '">' .
					get_the_title( $comment->comment_post_ID )
					. '</a></span>'
				);
				$output .= '</li>';
			}
		}
		$output .= '</ul>';
		$output .= $args['after_widget'];

		echo $output;
	}

	/**
	 * Handles updating settings for the current Recent Comments widget instance.
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance           = $old_instance;
		$instance['title']  = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = absint( $new_instance['number'] );
		return $instance;
	}

	/**
	 * Outputs the settings form for the Recent Comments widget.
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title  = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'deejay' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" 
		value="<?php echo esc_attr( $title ); ?>" /></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of comments to show:', 'deejay' ); ?></label>
		<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" 
		step="1" min="1" value="<?php echo esc_attr( $number ); ?>" size="3" /></p>
		<?php
	}

	/**
	 * Flushes the Recent Comments widget cache.
	 *
	 * @deprecated 4.4.0 Fragment caching was removed in favor of split queries.
	 */
	public function flush_widget_cache() {
		_deprecated_function( __METHOD__, '4.4.0' );
	}
}
