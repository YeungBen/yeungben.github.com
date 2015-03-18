<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://www.zhuige.com
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
 <section id="headline">
    <div class="container">
      <h3><?php printf( __( '<small>Search Results for:</small> %s', 'twentythirteen' ), get_search_query() ); ?></h3>
    </div>
  </section>


    <section class="container page-content" >
    <hr class="vertical-space2">
	
	<!-- begin-main-content -->
    <section class="eleven columns">
     <?php
	 if(have_posts()):
		while( have_posts() ): the_post();
			get_template_part('parts/blogloop');
		endwhile;
	 else:
		get_template_part('parts/blogloop-none');
	 endif;
	 ?>
       
      <br class="clear">
      <?php 
		if(function_exists('wp_pagenavi'))
		{
			wp_pagenavi();
		}
	  ?>
      <div class="white-space"></div>
    </section>
	<?php get_sidebar('right'); ?>
    <!-- end-main-content -->
	<?php //get_sidebar('right'); ?>
    <br class="clear">
  </section>
<?php get_footer(); ?>