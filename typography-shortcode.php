<?php
/*
Plugin Name: Typography Shortcode
Description: Wrap text in span containers with CSS classes.
Author: Boiling Pot Media
Version: 2.0
License: 
*/

class Inline__Typography {


    public function __construct() {
    	$this->Inline__Typography__Callback();
    }   
		

    public function Inline__Typography__Callback(){
        add_shortcode( 'f' , array( $this, 'bpm__content__f_shortcode_callback'));    
    }
    

 	/* bpm__content__f_shortcode_callback
	 *
	 * Usage
	 * [f &params ]
	 *
	 * Params
	 *
	 * @ e			- (optional) element - pass any valid HTML elm. Default: span
	 * @ c			- (optional) class - pass any CSS classes as string. EG: c="tag green"
	 * @ i			- (optional) inline-css - pass any CSS styles as string. EG: i="font-size:20px;color:red;"
	 */	
	public function bpm__content__f_shortcode_callback( $atts, $content = NULL ) {

		$a = shortcode_atts( array(
			'e' => '',
			'c' => '',
			'i' => '',
		), $atts );		

		$id = bpm_make_id(5);
		
		$element = $atts['e'] ?? 'span';		
		$classes = $atts['c'] ?? '';
		$inline = $atts['i'] ?? '';		
		
		ob_start();
		?>
		
		<?php echo '<'.$element.' class="'. $classes .'" style="'. $inline .'" >'; ?>
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

add_action('wp_head','activate_f_shortcode');
function activate_f_shortcode(){

	new Inline__Typography();

}










/* the cold, final swig of coffee */ ?>
