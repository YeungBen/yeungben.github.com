<?php

 function webnus_latestfromblog( $attributes, $content = null ) {
 	
	extract(shortcode_atts(array(
	"title" => '',
	
	
		), $attributes));
	
	$wpbp = new WP_Query(array( 'post_type' => 'post', 'posts_per_page' => 3));
	
	$i=0;
	
	ob_start();
		
?>
	 <div class="latest-f-blog">
      <h4 class="subtitle"><?php echo $title; ?></h4>
      <?php
	  $temp_out = '<div class="twelve columns omega recent-works-items">';
	if ($wpbp->have_posts()) : while ($wpbp->have_posts()) : $wpbp->the_post();
	  ?>
	  <article class="one-third column <?php
		
		switch($i){
			case 0: echo 'alpha'; break;
			case 1: echo ''; break;
			case 2: echo 'omega'; break;
		}

	  ?> blog-post"> <a href="<?php the_permalink(); ?>" ><?php 
	  
		global $featured_video;

		$meta_video = $featured_video->the_meta();

		
		
		global $slider_meta;

		$meta_slider = $slider_meta->the_meta();

		

		$slides =isset($meta_slider['docs'])?$meta_slider['docs']:null ;
		$sliders_out = '';
		if(is_array($slides))
		{
		
			$sliders_out = '<div class="flexslider"><ul class="slides">';
			foreach($slides as $slide)
			{
				$sliders_out .= '<li><img src="'.$slide['slide_image'].'" /></li>';
			}
			$sliders_out .= '</ul></div>';
		}
		
		
		if( (!empty( $meta_video )) && (!empty($meta_video['the_post_video'])) )
		{
			echo $meta_video['the_post_video'];
		}elseif(!empty( $sliders_out ))
		{
		
			echo do_shortcode($sliders_out);
		
		}else
			get_the_image( array( 'meta_key' => array( 'Full', 'Full' ), 'size' => 'home_lfb' ) ); 
	  
	  
	  
	  ?></a>
        <h5><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h5>
        <p><?php the_time('d M y'); ?></p>
      </article>
      <?php
	  ++$i;
	  endwhile; endif;
	  ?>
      
    </div>
	<?php
	$out = ob_get_contents();
	ob_end_clean();
	
	wp_reset_query();
	return $out;
 }
 add_shortcode('latestblog', 'webnus_latestfromblog');
?>