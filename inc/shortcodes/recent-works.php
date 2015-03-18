<?php
function  recentworks_shortcode($attributes, $content)
{
	
	extract(shortcode_atts(array(
	'title'			=>	'',
	'text'      	=>	'',
	'link_text'    =>	'',
	'link_url'			=>	'#',
	'show_text'			=>	'true',
	'show_category'			=>	'true',
	'show_archive'			=>	'true',

	), $attributes));
	
	ob_start();
	
	
	
	?>
	
	<div class="three columns sidebar leftside">
      <?php if( 'true' == $show_text ): ?>
	  <h3><strong><?php echo $title; ?></strong></h3>
      <p><?php echo $text; ?></p>
      <a href="<?php echo $link_url; ?>" class="magicmore"><?php echo $link_text; ?></a>
      <hr>
	  <?php endif; ?>
      <h5><strong>Categories</strong></h5>
      <div class="listbox1">
        <ul><?php
          
		  // Get the portfolio categories
		  
		  $terms = get_terms("filter");
		  
		  if( is_array($terms) )
		  {
			foreach( $terms as $term )
			{
				echo '<li><a href="'.get_term_link($term, 'filter'). '">'. $term->name . '</a></li>';
			}
		  }
        ?></ul>
      </div>

    </div>
	
	
	<?php
	$sidebar = ob_get_contents();
	ob_end_clean();
	
	
	$wpbp = new WP_Query(array( 'post_type' => 'portfolio', 'posts_per_page'=>4,'paged'=>1));
	
	
	$i=0;
	$temp_out = '<div class="twelve columns omega recent-works-items">';
	if ($wpbp->have_posts()) : while ($wpbp->have_posts()) : $wpbp->the_post();
	ob_start();
	?>
 
  <figure class="six columns <?php echo ( ($i % 2)==0 ) ? 'alpha' : 'omega'; ?>"> <a href="<?php the_permalink(); ?>"><?php get_the_image( array( 'meta_key' => array( 'Full', 'Full' ), 'size' => 'portfolio_full' ) ); ?></a>
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
 
	
	
	<?php
	++$i;
	
	
		$temp_out .= ob_get_contents();
	ob_end_clean();
	
	endwhile; endif;

	$temp_out .='</div>';
	
	
	$out = do_shortcode($sidebar . $temp_out);
	wp_reset_query();
	return $out;
	
}
add_shortcode("recentworks", 'recentworks_shortcode');
?>