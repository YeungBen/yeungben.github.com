<?php
$page_options_meta = new WPAlchemy_MetaBox(array
(
	'id' => '_page_title_meta',
	'title' => 'Page Options',
	'types' => array('page'),
	
	'template' => get_template_directory() . '/inc/metaboxes/page_metabox.php',
		
));


