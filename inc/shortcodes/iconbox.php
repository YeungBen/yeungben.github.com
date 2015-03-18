<?php

function webnus_iconbox( $attributes, $content = null ) {
 	
	extract(shortcode_atts(array(
	"type"=>'1',
	
		), $attributes));
ob_start();		
switch($type){
	case 1:
	echo '<article class="icon-box">';
	break;
	case 2:
	echo '<article class="icon-box2">';
	break;
	case 3:
	echo '<article class="icon-box3">';
	break;
	case 4:
	echo '<article class="icon-box4">';
	break;
	case 5:
	echo '<article class="icon-box5">';
	break;
	case 6:
	echo '<article class="icon-box6">';
	break;
	case 7:
	echo '<article class="icon-box7">';
	break;
}

?>
      <?php echo do_shortcode($content); ?>
      </article> 
<?php	
$out = ob_get_contents();
ob_end_clean();

	
	return $out;
 }
 add_shortcode('iconbox', 'webnus_iconbox');
 
 

 
?>