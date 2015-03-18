<?php


function ourclients_shortcode($attributes, $content){


	extract(shortcode_atts(array(
	"title" => 'Our Clients',

	), $attributes));
$out = '<h4 class="subtitle">'. $title .'</h4>';
$out .='<ul id="our-clients" class="our-clients">';
$out .= do_shortcode($content);
$out .='</ul>';
	
	return $out;
}
add_shortcode("ourclients", "ourclients_shortcode");


function webnus_client($attributes, $content){
	extract(shortcode_atts(array(
		"img" => '',
		"img_alt" => '',
	), $attributes));

return '<li><img src="'.$img.'" alt="'.$img_alt.'"></li>';

}
add_shortcode("client", "webnus_client");
?>