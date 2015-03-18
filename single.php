 <?php
/******************/
/**  Single Post
/******************/

get_header();
 ?>
 <section class="container page-content" >
    <hr class="vertical-space2">
    <?php 
	if( 'left' == $webnus_options->webnus_blog_singlepost_sidebar() ): 
		get_sidebar('left');
	endif;
	?>
	<section class="eleven columns">
      <article class="blog-single-post">
		<?php
			GLOBAL $webnus_options;
			if(  $webnus_options->webnus_blog_sinlge_featuredimage_enable() )
			{
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
			
		?>

	  <?php 
		  if( have_posts() ): while( have_posts() ): the_post(); ?>
        <div <?php post_class('post'); ?>>
          <div class="postmetadata">
            <h6 class="blog-author"><?php the_time('d M Y') ?> / <strong>by</strong> <?php the_author(); ?> / <strong>in</strong> <?php the_category(', ') ?> </h6>
          </div>
          <h1><?php the_title() ?></h1>
		
			<?php the_content(); ?>
		 
          <br class="clear">
			<div class="post-tags">
			   <i class="icomoon-tags"></i> : &nbsp; <?php the_tags(); ?>
			</div><!-- End Tags -->
			 
			 <div class="next-prev-posts">
			 <?php $args = array(
					'before'           => '',
					'after'            => '',
					'link_before'      => '',
					'link_after'       => '',
					'next_or_number'   => 'next',
					'nextpagelink'     => __('Next Post'),
					'previouspagelink' => __('Previous Post'),
					'pagelink'         => '%',
					'echo'             => 1
				); 
				
				 wp_link_pages($args);
				 
				?>
			  
			 </div><!-- End next-prev post -->
		  <hr class="boldbx">
         
        </div>
		<?php 
		 endwhile;
		 endif;
		  ?>
		
      </article>
      <?php comments_template(); ?>
    </section>
    <!-- end-main-conten -->
    <?php 
	if( 'right' == $webnus_options->webnus_blog_singlepost_sidebar() ): 
		get_sidebar('right');
	endif;
	?>
    <!-- end-sidebar-->
    <div class="white-space"></div>
  </section>
  <?php 
  get_footer();
  ?>