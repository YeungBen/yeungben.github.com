<?php

/***************************************/
/*			×·¸ñÍø www.zhuige.com
/***************************************/


GLOBAL $webnus_options;


?><!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
<meta charset="<?php bloginfo('charset');?>">
<title><?php
	
	/***************************************/
	/*			Title Generation Process
	/***************************************/

	global $page, $paged;
	
	wp_title( '|', true, 'right' );
	
	bloginfo( 'name' );
	
	$site_description = get_bloginfo( 'description', 'display' );
	
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s' ,WEBNUS_TEXT_DOMAIN), max( $paged, $page ) );

		/***************************************/
	/*			End Title Generation Process
	/***************************************/
		
		
?></title>
<meta name="description" content="<?php
	/***************************************/
	/*			Description Meta Tag Generator
	/***************************************/
		
		
		global $page_seo_meta;
		
		$seo_meta = !empty($page_seo_meta)?$page_seo_meta->the_meta():null;

		if( !empty( $seo_meta ) && !empty( $seo_meta['webnus_seo_options'][0]['seo_desc'] ) )
		{
				
			echo($seo_meta['webnus_seo_options'][0]['seo_desc']);
			
		}else{
		
		
			if ( is_single() ) {
			
				single_post_title('', true); 
				
			} else {
			
				bloginfo('name'); echo " - "; bloginfo('description');
				
			}
			
			
		}
		
/***************************************/
/*			End Description Meta Tag Generator
/***************************************/

?>" />
<meta name="keywords" content="<?php

/***************************************/
/*			Keywords Meta Tag Generator
/***************************************/

	global $page_seo_meta;
	
	$seo_meta = !empty($page_seo_meta)?$page_seo_meta->the_meta():null;
	
	if( !empty($seo_meta) && !empty($seo_meta['webnus_seo_options'][0]['seo_keyword']) )
	{
	
		echo($seo_meta['webnus_seo_options'][0]['seo_keyword']);
		
	}

/***************************************/
/*			End Keywords Meta Tag Generator
/***************************************/


?>" />
<meta name="author" content="<?php echo get_bloginfo('name'); ?>">

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- JS
================================================== -->
<?php wp_enqueue_script("jquery"); ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.11889.js" type="text/javascript"></script>
<![endif]-->
<!-- HTML5 Shiv events (end)-->

<!-- Favicons  ================================================== -->
<?php if($webnus_options->webnus_fav_icon()): ?>
<link rel="shortcut icon" href="<?php echo $webnus_options->webnus_fav_icon(); ?>">
<?php else: ?>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
<?php endif; ?>
<?php 

/***************************************/
/*			Apple Device Icons
/***************************************/

	$iphone_icon = $webnus_options->webnus_apple_iphone_icon();
	$ipad_icon = $webnus_options->webnus_apple_ipad_icon();
	
?>
<?php if(!empty($iphone_icon)) { ?>
<link rel="apple-touch-icon-precomposed" href="<?php echo $iphone_icon ?>"/>
<?php } ?>
<?php if(!empty($ipad_icon)) { ?>
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $ipad_icon; ?>">
<?php }

/***************************************/
/*			End Apple Device Icons
/***************************************/


/***************************************
		All function that change the page appearance is located in function.php
		webnus_wphead_action hook wp_head action and attach codes to that
		Particular Page Background, Theme option page background and so on...
/***************************************/

/***********************************************************************************/
/*		wp_head() CALL to load default initialization of wordpress
/***********************************************************************************/

wp_head(); 
	?>
	
</head>
	
	
<body <?php body_class('default-header'); ?>>

	<!-- Primary Page Layout
	================================================== -->

<div id="<?php echo $webnus_options->webnus_get_layout(); ?>" class="colorskin-<?php echo $webnus_options->webnus_color_skin(); ?>">
<?php
 /******************/
 /**  Load Topbar Template
 /******************/
 get_template_part('parts/topbar'); 
 /******************/
 /**  End Load Topbar Template
 /******************/
 
 $menu_type = $webnus_options->webnus_header_menu_type();
 
 switch($menu_type)
 {
	case 1:
		get_template_part('parts/header1');
	break;
	case 2:
	case 3:
	case 4:
	case 5:
		get_template_part('parts/header2');
	break;
	default:
		get_template_part('parts/header1');
	break;
 }

/***************************************/
/*			If woocommerce available add page headline section.
/***************************************/

if( 'product' == get_post_type( $post->ID ))
{
?>
<section id="headline">
    <div class="container">
      <h3><?php 
	  
	  if( function_exists('is_product') ){
	  
	  if( is_product() )
		echo $webnus_options->webnus_woo_product_title() ;
	  else
		echo $webnus_options->webnus_woo_shop_title() ;
	  
	  }
	  
	  ?></h3>
    </div>
</section><?php
/***************************************/
/*			End woocommerce section
/***************************************/
?>
<section class="container" >
<!-- Start Page Content -->
<hr class="vertical-space">
<?php
}
?>