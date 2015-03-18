<?php
function webnus_parallax($attributes, $content){
	extract(
        shortcode_atts(
            array(  
                "img" => '',
				"height" => '490',
				'speed'  => 5,
				
				'class'=>'dark'
				)
    , $attributes));
ob_start();
?>
</section>
<section data-speed="<?php echo $speed; ?>" data-type="background" class="parallax-sec" style="<?php echo 'height: '. $height. 'px;'; ?>background:url('<?php echo $img; ?>')  no-repeat scroll center bottom / cover  #EEEEEE;">
    <article class="blox <?php echo $class; ?>">
      <div class="container"><?php echo do_shortcode($content); ?></div>
    </article>
  </section>
  <section class="container">
<?php
$out = ob_get_contents();
ob_end_clean();

return $out;
 }
 add_shortcode('parallax', 'webnus_parallax');
?>