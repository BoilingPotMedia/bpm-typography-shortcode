<?php
/*
Plugin Name: Typography Shortcode
Description: Wrap text in span containers with CSS classes.
Author: Boiling Pot Media
Version: 1.0
License: 
*/

class Inline__Typography {


	public function __construct() {
    	$this->Inline__Typography__Callback();
	}   
		

    public function Inline__Typography__Callback(){
        add_shortcode( 't' , array( $this, 'bpm__content__t_shortcode_callback'));    
    }
    

 	/* bpm__content__hr_shortcode_callback
	 *
	 * Usage
	 * [t &params ]
	 *
	 * Params
	 *
	 * @ s			- (optional) shorthand for style - pass any CSS classes
	 * @ elm		- (optional) defaults to 'span', pass any valid HTML elm
	 */	
	public function bpm__content__t_shortcode_callback( $atts, $content = NULL ) {

		$a = shortcode_atts( array(
			's' => '',
			'elm' => '',
		), $atts );		

		$id = bpm_make_id(5);
		
		$classes = 'type ';
		$classes = $atts['s'] ?? '';
		
		$element = $atts['elm'] ?? 'span';
  		
		ob_start();
		?>
		
		<?php echo '<'.$element.' class="'. $classes .'" >'; ?>
			<?php echo do_shortcode($content); ?>
		<?php echo '</'.$element.'>'; ?>
		
		<?php return ob_get_clean(); ?>
	<?php
	}
}



/* Call the Inline__Typography() Class to activate shortcode
 *
 *  
 */	

add_action('wp_head','activate_t_shortcode');
function activate_t_shortcode(){

	new Inline__Typography();

}










/* the cold, final swig of coffee */ ?>
