<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
<?php
GLOBAL $webnus_options;
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

?>

<br>
<?php if(  $webnus_options->webnus_blog_posttitle_enable() ):?>
<h3><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
<?php endif; ?>
<?php if(  $webnus_options->webnus_blog_author_enable() ):?> 
<div class="postmetadata">
  <h6 class="blog-author"><?php the_time('d M Y') ?> - <strong> by</strong> <?php the_author(); ?> </h6>
  <h6 class="blog-cat"><strong>in</strong> <?php the_category(', ') ?> </h6>
</div>
<?php endif; ?>
<p> <?php 
if( 0 == $webnus_options->webnus_blog_excerptfull_enable() )
the_excerpt(); 
else
the_content();

?></p>

<hr class="vertical-space1">
</article>