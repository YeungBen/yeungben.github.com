<?php

function webnus_onethird( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	'last'  => null,
 	), $attributes));
	
 	if($last==='true') $last = 'column-last'; else $last='';
	$out = '<div class="one_third '. $last .'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('one_third', 'webnus_onethird');
 
 
function webnus_onehalf( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	'last'  => null,
 	), $attributes));
	
 	if($last==='true') $last = 'column-last'; else $last='';
	$out = '<div class="one_half '. $last .'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('one_half', 'webnus_onehalf');

 
 
function webnus_twothird( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	'last'  => null,
 	), $attributes));
	
 	if($last==='true') $last = 'column-last'; else $last='';
	$out = '<div class="two_third '. $last .'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('two_third', 'webnus_twothird');
 
 
 
 
function webnus_onefourth( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	'last'  => null,
 	), $attributes));
	
 	if($last==='true') $last = 'column-last'; else $last='';
	$out = '<div class="one_fourth '. $last .'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('one_fourth', 'webnus_onefourth');
 
 
 
function webnus_onefifth( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	'last'  => null,
 	), $attributes));
	
 	if($last==='true') $last = 'column-last'; else $last='';
	$out = '<div class="one_fifth '. $last .'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('one_fifth', 'webnus_onefifth');
 
 function webnus_column1( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	 'class'  => ''
 	), $attributes));
	
 	
	$out = '<div class="one column '. $class .'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('column1', 'webnus_column1');
 
 
 
 function webnus_column2( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	 'class'  => ''
 	), $attributes));
	
 	
	$out = '<div class="two columns '. $class .'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('column2', 'webnus_column2');
 
 
 
 function webnus_column3( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	 'class'  => ''
 	), $attributes));
	
 	
	$out = '<div class="three columns '. $class .'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('column3', 'webnus_column3');
 
 
 
 
 
 function webnus_column4( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	 'class'  => ''
 	), $attributes));
	
 	
	$out = '<div class="four columns '. $class .'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('column4', 'webnus_column4');
 
 
 
 
 function webnus_column5( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	 'class'  => ''
 	), $attributes));
	
 	
	$out = '<div class="five columns '. $class .'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('column5', 'webnus_column5');
 
 
 
 
 function webnus_column6( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	 'class'  => ''
 	), $attributes));
	
 	
	$out = '<div class="six columns '. $class .'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('column6', 'webnus_column6');
 
 
 
 
 function webnus_column7( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	 'class'  => ''
 	), $attributes));
	
 	
	$out = '<div class="seven columns '. $class .'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('column7', 'webnus_column7');
 
 
 
 
 function webnus_column8( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	 'class'  => ''
 	), $attributes));
	
 	
	$out = '<div class="eight columns '. $class .'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('column8', 'webnus_column8');
 
 
 
 
 function webnus_column9( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	 'class'  => ''
 	), $attributes));
	
 	
	$out = '<div class="nine columns '. $class .'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('column9', 'webnus_column9');
 
 
 
 
 function webnus_column10( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	 'class'  => ''
 	), $attributes));
	
 	
	$out = '<div class="ten columns '. $class .'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('column10', 'webnus_column10');
 
 
 
 
 function webnus_column11( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	 'class'  => ''
 	), $attributes));
	
 	
	$out = '<div class="eleven columns '. $class .'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('column11', 'webnus_column11');
 
 
 
 
 function webnus_column12( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	 'class'  => ''
 	), $attributes));
	
 	
	$out = '<div class="twelve columns '. $class .'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('column12', 'webnus_column12');
 
 
 
 function webnus_column13( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	 'class'  => ''
 	), $attributes));
	
 	
	$out = '<div class="thirteen columns '. $class .'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('column13', 'webnus_column13');
 
 
 
 function webnus_column14( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	 'class'  => ''
 	), $attributes));
	
 	
	$out = '<div class="fourteen columns '. $class .'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('column14', 'webnus_column14');
 
 
 function webnus_column15( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	 'class'  => ''
 	), $attributes));
	
 	
	$out = '<div class="fifteen columns '. $class .'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('column15', 'webnus_column15');
 
 
 
 function webnus_column16( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	 'class'  => ''
 	), $attributes));
	
 	
	$out = '<div class="sixteen columns '. $class .'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('column16', 'webnus_column16');
?>