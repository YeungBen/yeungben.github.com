<?php

/*
 * latest-projects
 */

function related_works_shortcode($attributes)
{

	$count = 7;
	
	extract(shortcode_atts(array(
	"title" => 'Recent Works',
	"count" => 7,
	""
	), $attributes));


	$terms = get_the_terms( get_the_ID(), 'filter' );
	if(is_array($terms))
	{
		$category_filter = array();
		foreach($terms as $term)
		{
			$category_filter[] = $term->slug;
		}
		
		//$category_filter = substr($category_filter,1,strlen($category_filter));
		
		
		
	}else $category_filter=array();
	
		
	
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;

	// Query Out Database
	$wpbp = new WP_Query(array( 'post_type' => 'portfolio', 'posts_per_page' =>$count, 'paged' => $paged) );
	?>

<?php
/* Begin The Loop


$out .= get_the_title() .' <br />';


*/
ob_start();
?>


<div class="vertical-space1"></div>
</section>
<section class="related-works">
	<div class="container">
		<div class="clear"></div>
		<div class="sixteen columns">
			<h4 class="subtitle">
				<?php echo $title ?>
			</h4>
		</div>
		<div class="clear"></div>
		<div class="jcarousel-container">
			<div class="jcarousel-clip">

				<ul id="latest-projects" class="jcarousel-list">
					<?php 
					if ($wpbp->have_posts()) : while ($wpbp->have_posts()) : $wpbp->the_post();
					?>
					<li class="portfolio-item four columns jcarousel-item">
						
							<a href="<?php the_permalink(); ?>"> <?php get_the_image( array( 'meta_key' => array( 'Full', 'Full' ), 'size' => 'portfolio_full' ) ); ?>
								<h5><strong>
									<?php the_title(); ?>
								</strong></h5></a> <p><?php echo get_the_date('d M Y');?> - <?php
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
?>
							</p>						
						
					</li>
					<?php 
					endwhile; endif;
					wp_reset_query(); // Reset the Query Loop
					?>
				</ul>
			</div>
		</div>
	</div>
	
</section>
<!-- home-portfolio -->
<section class="container">
	<div class="vertical-space2"></div>
	<!-- Latest Projects -->


	<?php

	$out = ob_get_contents();

	ob_end_clean();
	return $out;
}
add_shortcode("related_works", 'related_works_shortcode');

?>