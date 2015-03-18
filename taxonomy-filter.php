<?php

get_header();

GLOBAL $webnus_options;
?>
<section id="headline">
<div class="container">
  <h3><?php _e('Portfolio Archive','WEBNUS_TEXT_DOMAIN') ?></h3>
</div>
</section>
<section class="container page-content" >
<hr class="vertical-space1">

<div class="portfolio">
<?php

if (have_posts()) : while (have_posts()) : the_post();

?>
  <figure class="portfolio-item <?php
        
        if($webnus_options->webnus_portfolio_columns()==3) echo 'one-third column';
        if($webnus_options->webnus_portfolio_columns()==4) echo 'four columns';
        if($webnus_options->webnus_portfolio_columns()==2) echo 'eight columns';
        
        ?> entry <?php foreach ($terms as $term) { echo strtolower(preg_replace('/\s+/', '-', $term->slug)). ' '; } ?> -item">
	<div class="img-item"> <a href="<?php $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' ); 
					$large_image = $large_image[0]; echo $large_image; ?>" class="prettyPhoto" > <?php get_the_image( array( 'meta_key' => array( 'Full', 'Full' ), 'size' => 'portfolio_full' ) ); ?><span class="zoomex">&nbsp;</span></a> </div>
	<figcaption><h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h4>
	<p><?php echo get_the_date('d M Y');?> - <?php $terms = get_the_terms(get_the_id(), 'filter' );
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

<hr class="vertical-space2">
<script src="<?php echo get_template_directory_uri();?>/isotope/isotope.js"></script>
<script src="<?php echo get_template_directory_uri();?>/isotope/isotope-custom.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

</section>
  <!-- container -->

 <?php 
get_footer();
?>