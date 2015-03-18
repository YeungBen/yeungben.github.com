<?php 

GLOBAL $webnus_options; 

/***************************************/
/*			×·¸ñÍø www.zhuige.com
/***************************************/		
if(!is_404()){
if( 'product' == get_post_type( $post->ID ))
{
echo '</section>';
}
}

?>
<footer id="footer" <?php if( 2 == $webnus_options->webnus_footer_color() ) echo 'class="litex"';?>>
	<section class="container footer-in">
	  <?php 
		
/***************************************/
/*			Loading footer type 1,2,3,4,5
/*			Each footer has it's own behaviour
/***************************************/		
		
		$footer_type = $webnus_options->webnus_footer_type();
	  
		get_template_part('parts/footer',$footer_type);
			  
	  ?>
	  </section>
    <!-- end-footer-in -->
   <?php 
	if( $webnus_options->webnus_footer_bottom_enable() )
		get_template_part('parts/footer','bottom'); 
   
   ?>
    <!-- end-footbot -->
</footer>
<!-- end-footer -->
<span id="scroll-top"><a class="scrollup"><i class="icomoon-arrow-up"></i></a></span> </div>
<!-- end-wrap -->
<!-- End Document
================================================== -->
<?php

	echo $webnus_options->webnus_space_before_body();
	wp_footer(); 
	
?>
</body>
</html>