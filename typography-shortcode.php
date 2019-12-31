<?php
/*
Plugin Name: Typography Shortcode
Description: Wrap text in span containers with CSS classes.
Author: Boiling Pot Media
Version: 1.0
License: 
*/

add_shortcode( 't', 'bpm_typography_shortcode' );
function bpm_typography_shortcode($atts, $content = null) {

    $a = shortcode_atts( array( 
      's' => '',
    ), $atts );
		
    // Class
    $classes='type ';
    if($atts['s'] != '') {
      $classes .= $atts['s'];
    }
	
    return '<span class="'.$classes.'">'.do_shortcode($content).'</span>';

}

?>
