<?php
/**
 * Pro customizer section.
 *
 * @since  1.0.0
 * @access public
 */
class Deejay_Customize_Section_Pro extends WP_Customize_Section {

	/**
	 * The type of customize section being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'deejay_support';

	/**
	 * Custom button text to output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $pro_text = '';
	public $pro_text2 = '';

	/**
	 * Custom pro button URL.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $pro_url = '';
	public $pro_url2 = '';

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function json() {
		$json = parent::json();

		$json['pro_text'] = $this->pro_text;
		$json['pro_url']  = esc_url( $this->pro_url );

		$json['pro_text2'] = $this->pro_text2;
		$json['pro_url2']  = esc_url( $this->pro_url2 );

		return $json;
	}

	/**
	 * Outputs the Underscore.js template.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	protected function render_template() {
		?>

		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3 class="accordion-section-title">
				<# if ( data.pro_text2 && data.pro_url2 ) { #>
					<a href="{{ data.pro_url2 }}" class="button button-secondary">{{ data.pro_text2 }}</a>
				<# } #>
				&nbsp;
				<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{ data.pro_url }}" class="button button-secondary">{{ data.pro_text }}</a>
				<# } #>
			</h3>
		</li>
		<?php
	}
}
