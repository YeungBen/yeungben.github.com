<?php

/*

Template Name: Portfolio

*/


get_header();

GLOBAL $webnus_options;
?>
<section id="headline">
<div class="container">
  <h3>Portfolio</h3>
</div>
</section>
<section class="container page-content" >
<hr class="vertical-space1">
<?php 
if( 1 == $webnus_options->webnus_portfolio_isotope_enable() ){
?>
<nav class="primary clearfix">
  <ul>
	<li><a href="#" class="selected" data-filter="*">All</a></li>
<?php
						// Get the taxonomy
						$terms = get_terms("filter");
						if(!is_array($terms)) $terms=array();
						
						$count = count($terms); 
						
						$i=0;
						
						if ($count > 0) {
						$term_list = '';
							
							
							foreach ($terms as $term) {
								
								$i++;
								
								$term_list .= '<li><a href="#" class="" data-filter=".' . strtolower(preg_replace('/\s+/', '-', $term->slug)) . '">' . $term->name . '</a></li>';
								
								if ($count != $i)
								{
									$term_list .= '';
								}
								else 
								{
									$term_list .= '';
								}
							}
							
							
							echo $term_list;
						}
					?>  </ul>
</nav>
<?php } ?>
<div class="portfolio">
<?php
			$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				   'orderby'=>'date',
				   'order'=>'desc',
				   'post_type'=>'portfolio',
				   'paged' => $page,
				   'posts_per_page'=>100
			); 
			query_posts($args);
			 
			if (have_posts()) : while (have_posts()) : the_post();
$terms = get_the_terms( get_the_ID(), 'filter' );
if(!is_array($terms)) $terms=array();
?>
  <figure class="portfolio-item <?php
        
        if($webnus_options->webnus_portfolio_columns()==3) echo 'one-third column';
        if($webnus_options->webnus_portfolio_columns()==4) echo 'four columns';
        if($webnus_options->webnus_portfolio_columns()==2) echo 'eight columns';
        
        ?> entry <?php foreach ($terms as $term) { echo strtolower(preg_replace('/\s+/', '-', $term->slug)). ' '; } ?> -item">
	<div class="img-item tooltips"> <?php get_the_image( array( 'meta_key' => array( 'Full', 'Full' ), 'size' => 'portfolio_full' ) ); ?><span class="zoomex2"><h6><?php the_title(); ?></h6><a href="<?php $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' ); 
					$large_image = $large_image[0]; echo $large_image; ?>"  rel="help" title="Zoom" class="prettyPhoto zoomlink1" ><i class="icomoon-plus"></i></a><a href="<?php the_permalink(); ?>" rel="help" title="Go to Page" class="zoomlink2" ><i class="icomoon-arrow-right-5"></i></a></span> </div>
	<figcaption><h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h4>
	<p><?php echo get_the_date('d M Y');?> - <?php 

	$terms = get_the_terms(get_the_id(), 'filter' );
	$terms_slug_str = '';
	//var_dump($terms);
	if ($terms && ! is_wp_error($terms)) :
		$term_slugs_arr = array();
		foreach ($terms as $term) {
			$term_slugs_arr[] = '<a href="'. get_term_link($term, 'filter') .'">' . $term->name . '</a>';
		}
		$terms_slug_str = join( ", ", $term_slugs_arr);
	endif;
	echo $terms_slug_str;

	?></p></figcaption>
  </figure>
  <!-- end-portfolio-item-->
<?php
			endwhile;
			endif;

?>
</div>
<!-- end-portfolio -->
<div class="sixteen columns">
   <?php 
		if(function_exists('wp_pagenavi'))
		{
			wp_pagenavi();
			
		}
	  ?>
</div>
<hr class="vertical-space2">

</section>
  <!-- container -->

 <?php wp_reset_query(); // Reset the Query Loop 
get_footer();
?>