<?php

/*

Template Name: Timeline Posts

*/
get_header();

GLOBAL $webnus_options;

$last_time = get_the_time(' F Y');


?>
  <section id="main-timeline">
    <div class="container">
      <div id="tline-content">
        
        <?php
			$i=1;
			//$wpbp = new WP_Query(array( 'post_type' => 'post',  'orderby'=>'date' ) ); 
			$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				   'orderby'=>'date',
				   'order'=>'desc',
				   
				   'paged' => $page,
			); 
			query_posts($args);
			 
			if (have_posts()) : while (have_posts()) : the_post();
			
			if(($last_time != date(' F Y',strtotime($post->post_date)) ) || $i==1) //&& $i < $post_per_page
			{
				$last_time = date(' F Y',strtotime($post->post_date));
				echo '<div class="tline-topdate">'.  date(' F Y',strtotime($post->post_date)) .'</div>';
			}
		?>
		<article id="post-<?php the_ID(); ?>"  class="tline-box <?php if(($i%2)==0) echo ' rgtline'; ?>"> <span class="tline-row-<?php if(($i%2)==0) echo 'r'; else echo 'l'; ?>"></span> <?php
		if(  $webnus_options->webnus_blog_featuredimage_enable() ){
	
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
		}
		elseif(!empty( $sliders_out ))
		{
		
			echo do_shortcode($sliders_out);
		
		}else
			get_the_image( array( 'meta_key' => array( 'Full', 'Full' ), 'size' => 'Full' ) ); 
	}
		
		?> <br>
          <div class="tline-ecxt">
            <h4><a href="<?php the_permalink(); ?>"><?php if(  $webnus_options->webnus_blog_posttitle_enable() ) the_title(); ?></a></h4>
            <?php if(  $webnus_options->webnus_blog_author_enable() ):?>
			<h6 class="blog-author">at <?php the_category(', ') ?> - by <?php the_author(); ?></h6>
			<?php endif; ?>
          </div><p>
          <?php 
		  add_filter( 'excerpt_more', '__return_false' );
		  echo get_the_excerpt(''); ?>
		  </p>
          <div class="blog-date-sp">
            <h3><?php the_time('d') ?></h3>
            <span><?php the_time('M') ?><br>
            <?php the_time('Y') ?></span></div>
          <div class="blog-com-sp"> <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div>
        </article>
		<?php 
			$i++;
			endwhile;
			endif;
			
		?>
        <hr class="vertical-space1">
        <div class="tline-topdate enddte"><?php the_time(' F Y') ?></div>
      </div>
      <!-- end-pin-content -->
      <hr class="vertical-space2">
    </div>
    <section class="container aligncenter">
      <?php 
		if(function_exists('wp_pagenavi'))
		{
			wp_pagenavi();
			
		}
	  ?>
      <hr class="vertical-space2">
    </section>
    <!-- container -->
  </section>
  <?php wp_reset_query(); // Reset the Query Loop ?>
  <!-- end-main-content-pin -->
  <?php get_footer(); ?>