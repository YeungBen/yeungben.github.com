<?php


if ( ! defined( 'ABSPATH' ) )
	die( "Can't load this file directly" );

class MyGallery
{
	function __construct() {
		add_action( 'admin_init', array( $this, 'action_admin_init' ) );
	}
	
	function action_admin_init() {
		// only hook up these filters if we're in the admin panel, and the current user has permission
		// to edit posts and pages
		if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
			add_filter( 'mce_buttons_3', array( $this, 'filter_mce_button3' ) );
                        add_filter( 'mce_buttons_4', array( $this, 'filter_mce_button4' ) );
                        
			add_filter( 'mce_external_plugins', array( $this, 'filter_mce_plugin' ) );
		}
	}
	
	function filter_mce_button3( $buttons ) {
		// add a separation before our button, here our button's id is "mygallery_button"
		array_push( $buttons
                        ,'row'
                        ,'one_half'
                        ,'one_third'
                        ,'two_third'
                        ,'one_fourth'
                        ,'one_fifth'
						,'columns'
                        ,'iconbox'
						
                        ,'button'
                        ,'alert'
                        ,'tooltip'
                        ,'highlight'
                        ,'dropcap'
                        ,'list'
                        ,'clear'
                        ,'line'
						,'tline'
                        ,'homerecentworks'
                        ,'latestblog'
                        ,'progressbar'
						,'progresspie'
                        ,'pricing_table2'
                       ,'flex'
                       
                        
                        );
		return $buttons;
	}
	function filter_mce_button4( $buttons ) {
		// add a separation before our button, here our button's id is "mygallery_button"
		array_push( $buttons
                       
                        ,'blox'
                        ,'bloxdark'
						,'parallax'
                        ,'faq'
                        
                        ,'tab'
                        ,'lefttab'
                        ,'accordion'
                        ,'ourclients'
                        ,'clients'
                        ,'distance'
                        
                        ,'link1'
                        ,'boxlink'
                        ,'paragraph'
                        ,'title'
                        ,'subtitle'
						 ,'bigtitle2'
						,'bigtitle1'
                       
                        ,'ourteam'
                        
                        ,'callout'
                        ,'testimonial'
                        ,'retinaicon'
						,'doublepromo'
						,'quote'
						
						);
		return $buttons;
	}
       
	function filter_mce_plugin( $plugins ) {
		// this plugin file will work the magic of our button
		        $plugins['alert'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['iconbox'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
				
                $plugins['button'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['tooltip'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['highlight'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['dropcap'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['list'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['clear'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['line'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
				$plugins['tline'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['tab'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['lefttab'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['accordion'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['ourclients'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['homerecentworks'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['latestblog'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['progressbar'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
				$plugins['progresspie'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['pricing_table2'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
				$plugins['flex'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['title'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['ourteam'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                
                $plugins['callout'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['testimonial'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['one_third'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['two_third'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['one_half'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['one_fourth'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['one_fifth'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
				$plugins['columns'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['row'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['blox'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['bloxdark'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
				$plugins['parallax'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['faq'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                
                $plugins['bigtitle1'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['bigtitle2'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['boxlink'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['distance'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['link1'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['paragraph'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
                $plugins['subtitle'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
				$plugins['retinaicon'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
				$plugins['doublepromo'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
				$plugins['quote'] = get_template_directory_uri() . '/inc/editor/nc-sc.js';
		return $plugins;
	}
}

$mygallery = new MyGallery();
