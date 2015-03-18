<?php

function  bloxdark_shortcode($attributes, $content)
{


    extract(
            shortcode_atts(
                    array(  
                        "img" => '',
                        "height" => '',
                        'nomargin'  => null,
						'fixed' =>'false',
						'bgcover'=>'true',
						'repeat'=>'false',
						'class'=>''
                         )
            , $attributes));
	
	
    if($nomargin==='true') $nomargin = 'nopad'; else $nomargin='';
	
	if($fixed == 'true') $fixed = 'fixed center top' . ( ( 'true'==$bgcover )?'/ cover':'' ); else $fixed= 'center';
	if( 'true'==$repeat ) $repeat = 'repeat'; else $repeat = 'no-repeat';
	
    $bg_height = !empty($height)?$height:'380';
    $bg_img = !empty($img)?" style='background: url({$img}) {$repeat} {$fixed};min-height:{$bg_height}px'":'';
    $out = '</section><div class="blox dark '. $nomargin .' '.$class .'"'.$bg_img.'><div class="container">';
    $out .= do_shortcode($content); 
    $out .= '</div></div><section class="container">';
	
    return $out;
}
add_shortcode("bloxdark", 'bloxdark_shortcode');




function  blox_shortcode($attributes, $content)
{


    extract(
            shortcode_atts(
                    array(  
                        "img" => '',
                        "height" => '',
                        'nomargin'  => null,
						'fixed' =>'false',
						'bgcover'=>'true',
						'repeat'=>'false',
						'class'=>''
                         )
            , $attributes));
    $bg_height = !empty($height)?$height:'380';
	
	
	
	
    if($nomargin==='true') $nomargin = 'nopad'; else $nomargin='';
	
	if($fixed == 'true') $fixed = 'fixed center top' . ( ( 'true'==$bgcover )?'/ cover':'' ); else $fixed= 'center';
	
    if( 'true'==$repeat ) $repeat = 'repeat'; else $repeat = 'no-repeat';
	
	$bg_img = !empty($img)?" style='background: url({$img}) {$repeat} {$fixed};min-height:{$bg_height}px'":'';
    $out = '</section><div class="blox  '. $nomargin.' '.$class .'"'.$bg_img.'><div class="container">';
    $out .= do_shortcode($content); 
    $out .= '</div></div><section class="container">';
	
    return $out;
}
add_shortcode("blox", 'blox_shortcode');