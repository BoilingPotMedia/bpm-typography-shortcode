<?php
/**
 * Plugin Name: Typography Shortcode
 * Plugin URI: http://boilingpotmedia.com
 * Description: Wrap text in span containers with CSS classes.
 * Version: 2.0.1
 * Author: James Valeii
 * Author URI: http://jamesvaleii.com/
 * Text Domain: typography
 *
 * @package typography
 */


/**
 * TODO: Ensure naming conventions follow PHCPS? Stadnards
 */
class Inline__Typography {

	public function __construct() {
		$this->Inline__Typography__Callback();
	}

	public function Inline__Typography__Callback() {
		add_shortcode( 'f', array( $this, 'bpm__content__f_shortcode_callback' ) );
	}

	/** bpm__content__f_shortcode_callback
	 *
	 * Usage
	 * [f &params ]
	 *
	 * Params
	 *
	 * @ e            - (optional) element - pass any valid HTML elm. Default: span
	 * @ c            - (optional) class - pass any CSS classes as string. EG: c="tag green"
	 * @ i            - (optional) inline-css - pass any CSS styles as string. EG: i="font-size:20px;color:red;"
	 */
	public function bpm__content__f_shortcode_callback( $atts, $content = null ) {

		$a = shortcode_atts( array(
			'e' => '',
			'c' => '',
			'i' => '',
		), $atts );

		$element = $a['e'] ?? 'span';
		$classes = $a['c'] ?? '';
		$inlines = $a['i'] ?? '';
		ob_start();
		?>

		<?php echo '<' . esc_attr( $element ) . ' class="' . esc_attr( $classes ) . '" style="' . esc_attr( $inlines ) . '" >'; ?>
		<?php echo do_shortcode( force_balance_tags( wp_kses_post( $content ) ) ); ?>
		<?php echo '</' . esc_attr( $element ) . '>'; ?>

		<?php return ob_get_clean(); ?>
		<?php
	}
}

/**
 * Call the Inline__Typography() Class to activate shortcode
 */

add_action( 'wp_head', 'activate_f_shortcode' );
function activate_f_shortcode() {

	new Inline__Typography();

}
