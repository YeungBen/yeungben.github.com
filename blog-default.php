<?php

get_header();
GLOBAL $webnus_options;
?>
 <section id="headline">
    <div class="container">
      <h3><?php
					if ( is_day() ) :
						printf( __( '<small>Daily Archives:</small> %s', 'WEBNUS_TEXT_DOMAIN' ), get_the_date() );
					elseif ( is_month() ) :
						printf( __( '<small>Monthly Archives:</small> %s', 'WEBNUS_TEXT_DOMAIN' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'WEBNUS_TEXT_DOMAIN' ) ) );
					elseif ( is_year() ) :
						printf( __( '<small>Yearly Archives:</small> %s', 'WEBNUS_TEXT_DOMAIN' ), get_the_date( _x( 'Y', 'yearly archives date format', 'WEBNUS_TEXT_DOMAIN' ) ) );
						
					elseif ( is_category() ):
						printf( __( '<small>Category Archives:</small> %s', 'WEBNUS_TEXT_DOMAIN' ), single_cat_title( '', false ) );
					else :
						echo $webnus_options->webnus_blog_page_title();
					endif;
				?></h3>
    </div>
  </section>


    <section class="container page-content" >
    <hr class="vertical-space2">
	<?php 
	if( 'left' == $webnus_options->webnus_blog_sidebar() || 'both' == $webnus_options->webnus_blog_sidebar() ): 
		get_sidebar('left');
	endif;
	?>
	<!-- begin-main-content -->
    <section class="<?php echo ( 'both' == $webnus_options->webnus_blog_sidebar() )? 'six' : ' eleven'?> columns">
     <?php
	 if(have_posts()):
		while( have_posts() ): the_post();
			
			if( 'both' == $webnus_options->webnus_blog_sidebar() )
			{
				get_template_part('parts/blogloop','bothsidebar');
			}
			else{
				switch( $webnus_options->webnus_blog_template() )
				{
					case 1:
						get_template_part('parts/blogloop');
						break;
					case 2:
						get_template_part('parts/blogloop','type2');
						break;
					default:
						get_template_part('parts/blogloop');
						break;
					
					
				}
			}
		endwhile;
	 else:
		get_template_part('blogloop-none');
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
    <!-- end-main-content -->
	<?php 
	if( 'right' == $webnus_options->webnus_blog_sidebar() || 'both' == $webnus_options->webnus_blog_sidebar() ): 
		get_sidebar('right');
	endif;
	?>
    <br class="clear">
  </section>
  </section>
  <?php 
  get_footer();
  ?>