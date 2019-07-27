<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Deejay_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self();
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param object $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( trailingslashit( get_template_directory() ) . 'inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Deejay_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Deejay_Customize_Section_Pro(
				$manager,
				'deejay_support',
				array(
					'pro_text'  => esc_html__( 'Rate this theme', 'deejay' ),
					'pro_url'   => 'https://wordpress.org/support/theme/deejay/reviews/#new-post',
					'pro_text2' => esc_html__( 'Visit the support forum', 'deejay' ),
					'pro_url2'  => 'https://wordpress.org/support/theme/deejay',
					'priority'  => '300',
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {
		wp_enqueue_script( 'deejay-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );
	}
}

// Doing this customizer thang!
Deejay_Customize::get_instance();
