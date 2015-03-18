<?php

 function webnus_paragraph ($atts, $content = null) {
	extract(shortcode_atts(array(
		'class'      => ''
	), $atts));
 	return '<p class="'. $class .'">' . do_shortcode($content) . '</p>';
 }
 add_shortcode('p','webnus_paragraph');
 
 
 // Link (magicmore)
function  magiclink_shortcode($attributes, $content = null)
{

	extract(shortcode_atts(array(
	"url" => '#',
		), $attributes));

	return '<a class="magicmore" href="'. $url .'">'. do_shortcode($content) . '</a>';
}
add_shortcode("link", 'magiclink_shortcode');

 // BoxLink (magiclink)
function  boxlink_shortcode($attributes, $content = null)
{

	extract(shortcode_atts(array(
	"url" => '#',
		), $attributes));

	return '<div class="magic-link"><a href="'. $url .'">'. do_shortcode($content) . '</a></div>';
}
add_shortcode("boxlink", 'boxlink_shortcode');



 // Lists (ul li)
 function webnus_ul( $atts, $content = null ) {
 	extract(shortcode_atts(array(
 	'type'      => '',

 	), $atts));
 	return '<ul class="'. $type . '" >' . do_shortcode($content) . '</ul>';
 }
 add_shortcode('list-ul', 'webnus_ul');

 function webnus_li( $atts, $content = null ) {
 	extract(shortcode_atts(array(
 	'type'      => '',

 	), $atts));
	return '<li class="'. $type .'">' . do_shortcode($content) . '</li>';
 }
 add_shortcode('li-row', 'webnus_li');

 



 // Row
 function webnus_row( $atts, $content = null ) {
 	return '<div class="row">' . do_shortcode($content) . '</div>';
 }
 add_shortcode('row', 'webnus_row');


 // Horizonal line
 function webnus_hr( $atts, $content = null ) {
 	return '<hr>';
 }
 add_shortcode('line', 'webnus_hr');

// Horizonal line1
 function webnus_hr1( $atts, $content = null ) {
 	return '<hr class="vertical-space1">';
 }
 add_shortcode('line1', 'webnus_hr1');
 
// Horizonal line2
 function webnus_hr2( $atts, $content = null ) {
 	return '<hr class="vertical-space2">';
 }
 add_shortcode('line2', 'webnus_hr2');
 // Clear
 function webnus_clear( $atts, $content = null ) {
 	return '<div class="clear"></div>';
 }
 add_shortcode('clear', 'webnus_clear');


 
 
 
 // Horizonal line
 function webnus_thickline( $atts, $content = null ) {
 	return '<hr class="boldbx">';
 }
 add_shortcode('tline', 'webnus_thickline');
 
 
 
  // Subtitle
 function webnus_subtitle ($atts, $content = null) {
 	extract(shortcode_atts(array(
 	'title'      => ''
						), $atts));

 	$out = '<h4 class="subtitle">';
 	$out .= do_shortcode($content);
 	$out .= '</h4>';
 	return $out;
 }
 add_shortcode('subtitle','webnus_subtitle');

 // distance (horizonal-space)
 function webnus_distance1 ($atts, $content = null) {

 	return '<hr class="vertical-space1">';
 }
 add_shortcode('distance1','webnus_distance1');
 
 function webnus_distance2 ($atts, $content = null) {

 	return '<hr class="vertical-space2">';
 }
 add_shortcode('distance2','webnus_distance2');
 
  function webnus_distance3 ($atts, $content = null) {

 	return '<hr class="vertical-space3">';
 }
 add_shortcode('distance3','webnus_distance3');

  function webnus_distance4 ($atts, $content = null) {

 	return '<hr class="vertical-space4">';
 }
 add_shortcode('distance4','webnus_distance4');
?>