<?php
/*

Template Name: DarkHalf Page

*/

get_header('dark');

GLOBAL $webnus_options;

$last_time = get_the_time(' F Y');
GLOBAL $webnus_options;

global $homedark_options_meta;

$meta = $homedark_options_meta->the_meta();

$title = '';
$subtitle = '';

if(isset($meta) && !empty($meta)){
	
	$title= $meta['webnus_homedark_options'][0]['title'];
	$subtitle= $meta['webnus_homedark_options'][0]['subtitle'];
	
}



?>
<section class="container" >
      <hr class="vertical-space1">
      <div class="nine columns slogan">
        <h1><?php echo $title; ?></h1>
		<h4><strong><?php echo $subtitle; ?></strong></h4>
      </div>
    </section>
</div>
<section class="container" >
<!-- Start Page Content -->
<?php 
		  if( have_posts() ): while( have_posts() ): the_post();
			the_content(); 
		  endwhile;
		  endif;
?>	
</section><!-- container -->
<?php get_footer(); ?>