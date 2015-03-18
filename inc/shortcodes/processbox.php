<?php

function  processbox_shortcode($attributes, $content)
{

	extract(shortcode_atts(array(
	"class" => '',
	"title" => 'How We Do',
	"subtitle" => 'Do you like our Services?',
	"link"=> '#',
	"link_text"=>"Order Now"
			), $attributes));
			$out = ' <!-- Our-Process-star -->
			<div class="sixteen columns our-process">
			<hr>
			<h1 class="reklam2">'. $title .'</h1>
		<div class="clear"></div>';
			$out .= do_shortcode($content);
			$out .= '<div class="clear"></div>
			<div><img src="'. get_template_directory_uri() .'/images/process-bot-row1.png" alt=""></div>
			<h3>'. $subtitle .'<a href="'. $link .'" class="magicmore"><strong>'. $link_text .'</strong></a></h3>
					<div class="vertical-space2"></div>
					</div><!-- Our-Process-end -->';
			return $out;
}
add_shortcode("processbox", 'processbox_shortcode');

function  process_shortcode($attributes, $content)
{

	extract(shortcode_atts(array(
	"class" => '',
	"title" => 'How We Do',
	"img" => 'Do you like our Services?',

	), $attributes));

	$out = '<div class="process-box">
			<div class="process-icon-box">
			<div class="process-icon"><img src="'. $img .'" alt="process"></div>
						</div>
						<div class="process-content">
						<h5><strong>'. $title .'</strong></h5>
				<p> '. $content .'</p>
				</div>
				</div>';

	return $out;
}
add_shortcode("process", 'process_shortcode');


?>