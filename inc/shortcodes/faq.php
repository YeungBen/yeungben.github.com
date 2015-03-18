<?php


function  faq_shortcode($attributes, $content)
{

	
	
	$wpbp = new WP_Query(array( 'post_type' => 'faq'));
	
	$temp_out = "";
	if ($wpbp->have_posts()) : while ($wpbp->have_posts()) : $wpbp->the_post();
	
	$temp_out .= "[accordion title='".get_the_title()."']". get_the_content(). "[/accordion]";
	
	endwhile; endif;
	
	wp_reset_query();
	
	$out = do_shortcode($temp_out);
	
	return $out;
	
}
add_shortcode("faq", 'faq_shortcode');
?>