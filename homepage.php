<?php

/*

Template Name: Home

*/
get_header();

GLOBAL $webnus_options;

$last_time = get_the_time(' F Y');


GLOBAL $page_options_meta;

$meta = $page_options_meta->the_meta();

$show_titlebar =  isset($meta['webnus_page_options'][0]['show_page_title_bar'])?$meta['webnus_page_options'][0]['show_page_title_bar']:null;
$titlebar_bg =  isset($meta['webnus_page_options'][0]['title_background_color'])?$meta['webnus_page_options'][0]['title_background_color']:null;
$titlebar_fg =  isset($meta['webnus_page_options'][0]['title_text_color'])?$meta['webnus_page_options'][0]['title_text_color']:null;
$sidebar_pos =  isset($meta['webnus_page_options'][0]['sidebar_position'])?$meta['webnus_page_options'][0]['sidebar_position']:'right';
$have_sidebar = !( 'none' == $sidebar_pos )? true : false;
if($show_titlebar && ( 'show' == $show_titlebar)):
?>

<?php
endif;
?>
<section id="hero" class="tbg1">

<?php dynamic_sidebar('Home Slider'); ?>


</section><!-- end-hero-->
<section class="container" >
<!-- Start Page Content -->
<?php
/*
	RIGHT SIDEBAR
*/

if( ('left' == $sidebar_pos) || ('both' == $sidebar_pos ) ) get_sidebar('left');
if( $have_sidebar ) {
?>
<section class="<?php  echo('both' == $sidebar_pos )?'six':'eleven'; ?> columns">
	<article>
	
<?php 
}
		  if( have_posts() ): while( have_posts() ): the_post();
			the_content(); 
		  endwhile;
		  endif;
		  if( $have_sidebar ) {
?>
	</article>
</section>	
<?php
}
/*
	LEFT SIDEBAR
*/

if( ('right' == $sidebar_pos) || ('both' == $sidebar_pos) ) get_sidebar('right');

?>
</section><!-- container -->
<?php get_footer(); ?>