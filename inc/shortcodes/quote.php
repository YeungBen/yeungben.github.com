<?php

function webnus_quote( $attributes, $content = null ) {
 	
	extract(shortcode_atts(array(
	"title" => '',
	"text" => '',
	"name" =>'',
	"name_sub" =>'#',
	
	
		), $attributes));
	$out = '<div class="qot-week">';
    $out .= '<div class="qot-pic"></div>';
    $out .='<h6 class="qot-title">'. $title .'</h6>';
    $out .='<blockquote>';
    $out .='<h3>'. $text .'</h3>';
    $out .='<cite title="">'. $name .' <small> - '. $name_sub .'</small></cite></blockquote>';
    $out .='</div>';
	return $out;
}

add_shortcode('quote', 'webnus_quote');		
?>