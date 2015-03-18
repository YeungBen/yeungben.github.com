<?php

/******************************/
/*
/*		Register Widgets
/*
/******************************/


function webnus_sidebar_init() {
	register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'WEBNUS_TEXTDOMAIN' ),
		'id'            => 'left-sidebar',
		'description'   => __( 'Appears in left side in the blog page.', 'WEBNUS_TEXTDOMAIN' ),
		'before_widget' => '<div class="listbox1">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="subtitle">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'WEBNUS_TEXTDOMAIN' ),
		'id'            => 'right-sidebar',
		'description'   => __( 'Appears in right side in the blog page.', 'WEBNUS_TEXTDOMAIN' ),
		'before_widget' => '<div class="listbox1">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="subtitle">',
		'after_title'   => '</h4>',
	) );
		
	register_sidebar(array(
    'name' => 'Home Slider',
    'before_widget' => '',
    'after_widget' => '',
	));

	
	
	register_sidebar( array(
		'name'          => __( 'Footer Section 1', 'WEBNUS_TEXTDOMAIN' ),
		'id'            => 'footer-section-1',
		'description'   => __( 'Appears in footer section 1', 'WEBNUS_TEXTDOMAIN' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h4 class="subtitle">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Section 2', 'WEBNUS_TEXTDOMAIN' ),
		'id'            => 'footer-section-2',
		'description'   => __( 'Appears in footer section 2', 'WEBNUS_TEXTDOMAIN' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h4 class="subtitle">',
		'after_title'   => '</h4>',
	) );

	
	register_sidebar( array(
		'name'          => __( 'Footer Section 3', 'WEBNUS_TEXTDOMAIN' ),
		'id'            => 'footer-section-3',
		'description'   => __( 'Appears in footer section 3', 'WEBNUS_TEXTDOMAIN' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h4 class="subtitle">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Section 4', 'WEBNUS_TEXTDOMAIN' ),
		'id'            => 'footer-section-4',
		'description'   => __( 'Appears in footer section 4', 'WEBNUS_TEXTDOMAIN' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h4 class="subtitle">',
		'after_title'   => '</h4>',
	) );



	  register_sidebar( array(
		'name' => __( 'WooCommerce Page Sidebar', 'WEBNUS_TEXTDOMAIN' ),
		'id' => 'shop-widget-area',
		'description' => __( 'Product page widget area', 'WEBNUS_TEXTDOMAIN' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3><div class="sidebar-line"><span></span></div>',
	) );
}
add_action( 'widgets_init', 'webnus_sidebar_init' );

?>