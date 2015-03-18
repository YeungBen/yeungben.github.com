<?php
function webnus_tooltips ($atts, $content = null) {
 	extract(shortcode_atts(array(
 	'tooltiptext'      => ''
			), $atts));

 	$out = '<span class="tooltips"><a href="#" rel="help" title="' .$tooltiptext. '">';

 	$out .= do_shortcode($content);
 	$out .= '</a></span>';
 	return $out;
 }
 add_shortcode('tooltip','webnus_tooltips');

?>