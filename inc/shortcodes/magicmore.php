<?php

 function webnus_magicmore( $attributes, $content = null ) {
 	
	extract(shortcode_atts(array(
	
	"title" =>'',
	"link" =>'#',	
	), $attributes));
?>
<a href="<?php echo $link; ?>" class="magicmore"><?php echo $title; ?></a> 
<?php	
	return $out;
 }
 add_shortcode('magicmore', 'webnus_magicmore');
?>