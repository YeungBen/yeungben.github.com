<?php

function ourteam1_shortcode ($atts, $content = null) {
	extract(shortcode_atts(array(
	'img'=>'',
	'name' => '',
	'title' =>'',
	'text'=>'',
	), $atts));
	
	
$out  = '<figure class="our-team"> <img src="'. $img .'" alt="">';
$out .= '<figcaption><h4><strong>'. $name .'<br>';
$out .= '<small>'. $title .'</small></strong></h4>';
$out .= '<p>'. $text .'</p>';
$out .= '<div class="socailfollow">'. do_shortcode($content) .'</div></figcaption>';
$out .= '</figure>';

return $out;
}
add_shortcode('ourteam','ourteam1_shortcode');


?>