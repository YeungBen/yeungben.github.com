<?php
 function webnus_buttons( $atts, $content = null ) {
 	extract(shortcode_atts(array(
 	'url'      => '#',
 	'target'      => '_self',
 	'color'      => '',
 	'size'      => '',

 	), $atts));
 	$out = '<a href="'. $url . '" class="button '. $color . '  '. $size . ' " target="'. $target . '">' . do_shortcode($content) . '</a>';
 	return $out;
 }
 add_shortcode('button', 'webnus_buttons');
?>