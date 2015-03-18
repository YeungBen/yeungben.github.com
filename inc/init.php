<?php

include_once ( 'helpers/get-the-image.php' );
include_once ( 'helpers/wp-pagenavi/wp-pagenavi.php' );
include_once ( 'nc-options/nc-options.php' );
include_once ( 'helpers/woptions.php' );
include_once ( 'other/cpt.php' );
include_once ( 'shortcodes/shortcode.php' );
include_once ( 'sidebars/general-sidebars.php' );
//include_once ( 'plugins/post-type-archives.php' );

include_once ( 'plugins/woocommerce/index.php' );


/*
METABOXES
*/
include_once  get_template_directory().'/inc/metaboxes/setup.php';
include_once  get_template_directory().'/inc/metaboxes/featured-video-init.php';
include_once  get_template_directory().'/inc/metaboxes/page_title_meta.php';
include_once  get_template_directory().'/inc/metaboxes/slider-meta-init.php';
include_once  get_template_directory().'/inc/metaboxes/seo.php';
include_once  get_template_directory().'/inc/metaboxes/homedark-init.php';


/*

Widgets

*/

include_once  get_template_directory().'/inc/widgets/widgets-init.php';


include_once ( 'editor/nc-sc.php' );