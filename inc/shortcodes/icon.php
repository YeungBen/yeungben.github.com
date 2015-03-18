<?php
function webnus_icon ($atts, $content = null) {
	extract(shortcode_atts(array(
	'name'			=>	'facebook',
	'link'      	=>	'',
	'link_class'    =>	'',
	'size'			=>	'',
	'color'			=>	''

	), $atts));

	$style = 'style="';
	if(!empty($size))  $style .= ' font-size:' . $size. ';';
	if(!empty($color)) $style .= ' color:' . $color. ';';
	$style .= '"';			
				
	if(!empty($link)){
	 $out = '<a href="'. $link .'" class="'. $link_class .'"><i class="icomoon-'. $name .'" '.$style.'></i></a>';
	}
	else{
	 $out = '<i class="icomoon-'. $name .'" '.$style.'></i>';
	}
	return $out;
}
add_shortcode('icon','webnus_icon');
?>