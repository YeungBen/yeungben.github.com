<?php

/*
 *
 * Require the framework class before doing anything else, so we can use the defined urls and dirs
 * Also if running on windows you may have url problems, which can be fixed by defining the framework url first
 *
 */
//define('NHP_OPTIONS_URL', site_url('path the options folder'));
if (!class_exists('NHP_Options')) {
    require_once( dirname(__FILE__) . '/options/noptions.php' );
}

defined('WEBNUS_TEXT_DOMAIN') or define('WEBNUS_TEXT_DOMAIN', 'WEBNUS_TEXT_DOMAIN');


/*
 *
 * Custom function for filtering the sections array given by theme, good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 *
 * NOTE: the defined constansts for urls, and dir will NOT be available at this point in a child theme, so you must use
 * get_template_directory_uri() if you want to use any of the built in icons
 *
 */

function add_another_section($sections) {

    //$sections = array();
    $sections[] = array(
        'title' => __('A Section added by hook', WEBNUS_TEXT_DOMAIN),
        'desc' => __('<p class="description">This is a section created by adding a filter to the sections array, great to allow child themes, to add/remove sections from the options.</p>', WEBNUS_TEXT_DOMAIN),
        //all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
        //You dont have to though, leave it blank for default.
        'icon' => trailingslashit(get_template_directory_uri()) . 'options/img/glyphicons/glyphicons_062_attach.png',
        //Lets leave this as a blank section, no options just some intro text set above.
        'fields' => array()
    );

    return $sections;
}

//function
//add_filter('nhp-opts-sections-twenty_eleven', 'add_another_section');


/*
 *
 * Custom function for filtering the args array given by theme, good for child themes to override or add to the args array.
 *
 */

function change_framework_args($args) {

    //$args['dev_mode'] = false;

    return $args;
}

//function
//add_filter('nhp-opts-args-twenty_eleven', 'change_framework_args');









/*
 * This is the meat of creating the optons page
 *
 * Override some of the default values, uncomment the args and change the values
 * - no $args are required, but there there to be over ridden if needed.
 *
 *
 */

function setup_framework_options() {
    $args = array();



    $theme_dir = get_template_directory_uri() . '/';
    $theme_img_dir = $theme_dir . 'images/';
    $theme_img_bg_dir = $theme_img_dir . 'bgs/';

    //Set it to dev mode to view the class settings/info in the form - default is false
    $args['dev_mode'] = false;

    //google api key MUST BE DEFINED IF YOU WANT TO USE GOOGLE WEBFONTS
    //$args['google_api_key'] = '***';
    //Remove the default stylesheet? make sure you enqueue another one all the page will look whack!
    //$args['stylesheet_override'] = true;
    //Add HTML before the form
    $args['intro_text'] = __('<p>webnus theme options. all about theme option which can be edited is here.</p>', WEBNUS_TEXT_DOMAIN);

    //Setup custom links in the footer for share icons
    $args['share_icons']['twitter'] = null;

    /* array(
      'link' => 'http://twitter.com/webnus',
      'title' => 'Folow me on Twitter',
      'img' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_322_twitter.png'
      ); */
    $args['share_icons']['linked_in'] = null;

    /* array(
      'link' => 'http://facebook.com/webnus',
      'title' => 'Find me on LinkedIn',
      'img' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_320_facebook.png'
      ); */

    //Choose to disable the import/export feature
    $args['show_import_export'] = true;

    //Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
    $args['opt_name'] = 'webnus_options';

    //Custom menu icon
    //$args['menu_icon'] = '';
    //Custom menu title for options page - default is "Options"
    $args['menu_title'] = __('Theme Options', WEBNUS_TEXT_DOMAIN);

    //Custom Page Title for options page - default is "Options"
    $args['page_title'] = __('Theme Options', WEBNUS_TEXT_DOMAIN);

    //Custom page slug for options page (wp-admin/themes.php?page=***) - default is "nhp_theme_options"
    $args['page_slug'] = 'webnus_theme_options';

    //Custom page capability - default is set to "manage_options"
    //$args['page_cap'] = 'manage_options';
    //page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"
    //$args['page_type'] = 'submenu';
    //parent menu - default is set to "themes.php" (Appearance)
    //the list of available parent menus is available here: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    //$args['page_parent'] = 'themes.php';
    //custom page location - default 100 - must be unique or will override other items
    $args['page_position'] = 27;

    //Custom page icon class (used to override the page icon next to heading)
    //$args['page_icon'] = 'icon-themes';
    //Want to disable the sections showing as a submenu in the admin? uncomment this line
    //$args['allow_sub_menu'] = false;
    //Set ANY custom page help tabs - displayed using the new help tab API, show in order of definition
    /* $args['help_tabs'][] = array(
      'id' => 'nhp-opts-1',
      'title' => __('Theme Information 1', WEBNUS_TEXT_DOMAIN),
      'content' => __('<p>This is the tab content, HTML is allowed.</p>', WEBNUS_TEXT_DOMAIN)
      );
      $args['help_tabs'][] = array(
      'id' => 'nhp-opts-2',
      'title' => __('Theme Information 2', WEBNUS_TEXT_DOMAIN),
      'content' => __('<p>This is the tab content, HTML is allowed.</p>', WEBNUS_TEXT_DOMAIN)
      );
     */
    //Set the Help Sidebar for the options page - no sidebar by default
    //$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', WEBNUS_TEXT_DOMAIN);


    $args['show_theme_info'] = false;

    $sections = array();

    /*
      $sections[] = array(
      'title' => __('General Options', WEBNUS_TEXT_DOMAIN),
      'desc' => __('<p class="description">General Option</p>', WEBNUS_TEXT_DOMAIN),

      'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_062_attach.png',

      'fields'=>array(
      array(
      'id' => 'webnus_responsive_enable',
      'type' => 'checkbox',
      'title' => __('Responsive Enable', WEBNUS_TEXT_DOMAIN),
      'sub_desc' => __('', WEBNUS_TEXT_DOMAIN),
      'desc' => __('', WEBNUS_TEXT_DOMAIN),

      ),

      array(
      'id' => 'webnus_latestproject_enable',
      'type' => 'checkbox',
      'title' => __('Latest Projects On First Page Enable', WEBNUS_TEXT_DOMAIN),
      'sub_desc' => __('', WEBNUS_TEXT_DOMAIN),
      'desc' => __('', WEBNUS_TEXT_DOMAIN),

      ),

      )
      ); */
    $sections[] = array(
        'title' => __('General', WEBNUS_TEXT_DOMAIN),
        'desc' => __('<p class="description">Setup the general options of theme.</p>', WEBNUS_TEXT_DOMAIN),
        'icon' => NHP_OPTIONS_URL . 'img/admin-general.png',
        'fields' => array(
             array(
                'id' => 'webnus_one_click',
                'title' => __('One Click Import Data', WEBNUS_TEXT_DOMAIN),
				'type' => 'oneclick',
                'std' => '1'
            ),
            array(
                'id' => 'webnus_background_layout',
                'type' => 'button_set',
                'title' => __('Layout', WEBNUS_TEXT_DOMAIN),
                'desc' => 'Boxed or wide layout?',
                'options' => array('wrap' => 'Wide', 'boxed-wrap' => 'Boxed'),
                'std' => 'wrap'
            ),
            array(
                'id' => 'webnus_favicon',
                'type' => 'upload',
                'title' => __('Custom Favicon', WEBNUS_TEXT_DOMAIN),
                'desc' => __('An ico image that will represent your website\'s favicon (16px x 16px)', WEBNUS_TEXT_DOMAIN),
            ),
            array(
                'id' => 'webnus_apple_iphone_icon',
                'type' => 'upload',
                'title' => __('Apple iPhone Icon', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Icon for Apple iPhone (57px x 57px)', WEBNUS_TEXT_DOMAIN),
            ),
            array(
                'id' => 'webnus_apple_ipad_icon',
                'type' => 'upload',
                'title' => __('Apple iPad Icon', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Icon for Apple iPad (72px x 72px)', WEBNUS_TEXT_DOMAIN),
            ),
            array(
                'id' => 'webnus_tracking_code',
                'type' => 'textarea',
                'title' => __('Tracking Code', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', WEBNUS_TEXT_DOMAIN),
                'sub_desc' => __('Google Analytics', WEBNUS_TEXT_DOMAIN)
            ),
            array(
                'id' => 'webnus_allow_comments_on_page',
                'type' => 'checkbox',
                'title' => __('Allow Comments On Pages', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Allow comments on regular pages.', WEBNUS_TEXT_DOMAIN),
                'std' => '1'
            ),
            array(
                'id' => 'webnus_space_before_head',
                'type' => 'textarea',
                'title' => __('Space Before &lt;/heade&gt;', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Add code before the &lt;/head&gt; tag.', WEBNUS_TEXT_DOMAIN),
            ),
            array(
                'id' => 'webnus_space_before_body',
                'type' => 'textarea',
                'title' => __('Space Before &lt;/body&gt;', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Add code before the &lt;/body&gt; tag.', WEBNUS_TEXT_DOMAIN),
            ),
            array(
                'id' => 'webnus_slogan',
                'type' => 'textarea',
                'title' => __('Slogan', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Slogan Text', WEBNUS_TEXT_DOMAIN),
            ),
            array(
                'id' => 'webnus_contact_address',
                'type' => 'seperator',
                'desc' => __('Contact Information', WEBNUS_TEXT_DOMAIN),
            ),
            array(
                'id' => 'webnus_contact_address',
                'type' => 'text',
                'title' => __('Address', WEBNUS_TEXT_DOMAIN),
            ),
            array(
                'id' => 'webnus_contact_phone',
                'type' => 'text',
                'title' => __('Phone', WEBNUS_TEXT_DOMAIN),
            ),
            array(
                'id' => 'webnus_contact_email',
                'type' => 'text',
                'title' => __('Email Address', WEBNUS_TEXT_DOMAIN),
            ),
            array(
                'id' => 'webnus_google_map',
                'type' => 'textarea',
                'title' => __('Google Map Embed Source', WEBNUS_TEXT_DOMAIN),
            ),
           array(
                'id' => 'webnus_admin_login_logo',
                'type' => 'upload',
                'title' => __('Admin Login Logo', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Please choose an image file for admin login page logo.', WEBNUS_TEXT_DOMAIN),
            ),
        )
    );

    $sections[] = array(
        'icon' => NHP_OPTIONS_URL . 'img/admin-header.png',
        'title' => __('Header Options', WEBNUS_TEXT_DOMAIN),
        'fields' => array(
            array(
                'id' => 'webnus_logo',
                'type' => 'upload',
                'title' => __('Logo', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Please choose an image file for your logo.<br/> For Retina displays please add Image in large size and set custom width.', WEBNUS_TEXT_DOMAIN),
            ),
			 array(
                'id' => 'webnus_logo_width',
                'type' => 'text',
                'title' => __('Logo Width', WEBNUS_TEXT_DOMAIN),
                'std' => '120'
            ),
			
            array(
                'id' => 'webnus_logo_sep',
                'type' => 'seperator',
                'desc' => __('Topbar Options', WEBNUS_TEXT_DOMAIN),
            ),
            array(
                'id' => 'webnus_header_topbar_enable',
                'type' => 'button_set',
                'title' => __('Show/Hide TopBar', WEBNUS_TEXT_DOMAIN),
                'options' => array('0' => __('Hide', WEBNUS_TEXT_DOMAIN), '1' => __('Show', WEBNUS_TEXT_DOMAIN)),
                'std' => '1'
            ),
            array(
                'id' => 'webnus_header_topbar_leftcontent',
                'type' => 'select',
                'title' => __('Topbar Left side', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Select Topbar left side content, you can select one of Topbar Menu or Contact Information or Social Icons',WEBNUS_TEXT_DOMAIN),
                'options' => array(1 => 'Menu', 2 => 'Contact Information', 3 => 'Social Icons', 4=>'TagLine'),
                'std' => '1'
            ),
            array(
                'id' => 'webnus_header_topbar_rightcontent',
                'type' => 'select',
                'title' => __('Topbar Right side', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Select Topbar right side content, you can select one of Topbar Menu/Contact Information/Social Icons',WEBNUS_TEXT_DOMAIN),
                'options' => array(1 => 'Menu', 2 => 'Contact Information', 3 => 'Social Icons', 4=>'TagLine'),
                'std' => '3'
            ),
         
            array(
                'id' => 'webnus_header_phone',
                'type' => 'text',
                'title' => __('Header Phone Number', WEBNUS_TEXT_DOMAIN),
                'std' => '+1 234 56789'
            ),
            array(
                'id' => 'webnus_header_email',
                'type' => 'text',
                'title' => __('Header Email Address', WEBNUS_TEXT_DOMAIN),
                'std' => 'info@yourdomain.com'
            ),
            array(
                'id' => 'webnus_top_left_tagline',
                'type' => 'text',
                'title' => __('Topbar Left side tag line', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Insert Any Headline Or Link You Want Here', WEBNUS_TEXT_DOMAIN),
                'std' => ''
            ),
            array(
                'id' => 'webnus_top_right_tagline',
                'type' => 'text',
                'title' => __('Topbar Right side tag line', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Insert Any Headline Or Link You Want Here', WEBNUS_TEXT_DOMAIN),
                'std' => ''
            ),
          
            array(
                'id' => 'webnus_top_social_icons_sep',
                'type' => 'seperator',
                'desc' => __('TopBar Social Icons', WEBNUS_TEXT_DOMAIN),
				'sub_desc' => ' &nbsp; ',
            ),
            array(
                'id' => 'webnus_top_social_icons_facebook',
                'type' => 'button_set',
                'title' => __('Show/Hide Facebook Icon', WEBNUS_TEXT_DOMAIN),
                'options' => array('0' => __('Hide', WEBNUS_TEXT_DOMAIN), '1' => __('Show', WEBNUS_TEXT_DOMAIN)),
                'std' => '1'
            ),
            array(
                'id' => 'webnus_top_social_icons_twitter',
                'type' => 'button_set',
                'title' => __('Show/Hide Twitter Icon', WEBNUS_TEXT_DOMAIN),
                'options' => array('0' => __('Hide', WEBNUS_TEXT_DOMAIN), '1' => __('Show', WEBNUS_TEXT_DOMAIN)),
                'std' => '1'
            ),
            array(
                'id' => 'webnus_top_social_icons_dribbble',
                'type' => 'button_set',
                'title' => __('Show/Hide Dribbble Icon', WEBNUS_TEXT_DOMAIN),
                'options' => array('0' => __('Hide', WEBNUS_TEXT_DOMAIN), '1' => __('Show', WEBNUS_TEXT_DOMAIN)),
                'std' => '1'
            ),
            array(
                'id' => 'webnus_top_social_icons_pinterest',
                'type' => 'button_set',
                'title' => __('Show/Hide Pinterest Icon', WEBNUS_TEXT_DOMAIN),
                'options' => array('0' => __('Hide', WEBNUS_TEXT_DOMAIN), '1' => __('Show', WEBNUS_TEXT_DOMAIN)),
                'std' => '1'
            ),
            array(
                'id' => 'webnus_top_social_icons_vimeo',
                'type' => 'button_set',
                'title' => __('Show/Hide Vimeo Icon', WEBNUS_TEXT_DOMAIN),
                'options' => array('0' => __('Hide', WEBNUS_TEXT_DOMAIN), '1' => __('Show', WEBNUS_TEXT_DOMAIN)),
                'std' => '1'
            ),
            array(
                'id' => 'webnus_top_social_icons_youtube',
                'type' => 'button_set',
                'title' => __('Show/Hide Youtube Icon', WEBNUS_TEXT_DOMAIN),
                'options' => array('0' => __('Hide', WEBNUS_TEXT_DOMAIN), '1' => __('Show', WEBNUS_TEXT_DOMAIN)),
                'std' => '1'
            ),
             array(
                'id' => 'webnus_top_social_icons_google',
                'type' => 'button_set',
                'title' => __('Show/Hide Google+ Icon', WEBNUS_TEXT_DOMAIN),
                'options' => array('0' => __('Hide', WEBNUS_TEXT_DOMAIN), '1' => __('Show', WEBNUS_TEXT_DOMAIN)),
                'std' => '1'
            ),
             array(
                'id' => 'webnus_top_social_icons_linkedin',
                'type' => 'button_set',
                'title' => __('Show/Hide LinkedIn Icon', WEBNUS_TEXT_DOMAIN),
                'options' => array('0' => __('Hide', WEBNUS_TEXT_DOMAIN), '1' => __('Show', WEBNUS_TEXT_DOMAIN)),
                'std' => '1'
            ),
            array(
                'id' => 'webnus_top_social_icons_rss',
                'type' => 'button_set',
                'title' => __('Show/Hide RSS Icon', WEBNUS_TEXT_DOMAIN),
                'options' => array('0' => __('Hide', WEBNUS_TEXT_DOMAIN), '1' => __('Show', WEBNUS_TEXT_DOMAIN)),
                'std' => '1'
            ),
            array(
                'id' => 'webnus_page_menu_sp',
                'type' => 'seperator',
                'desc' => __('Header Menu', WEBNUS_TEXT_DOMAIN),
            ),
			array(
                'id' => 'webnus_header_sticky',
                'type' => 'button_set',
                'title' => __('Enable/Disable Sticky Menu', WEBNUS_TEXT_DOMAIN),
                'options' => array('0' => __('Disable', WEBNUS_TEXT_DOMAIN), '1' => __('Enable', WEBNUS_TEXT_DOMAIN)),
                'std' => '0'
            ),
			  array(
                'id' => 'webnus_header_logo_rightside',
                'type' => 'select',
                'title' => __('Logo Right side', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Select Content of logo right side. you can select Searchbox or Contact Information',WEBNUS_TEXT_DOMAIN),
                'options' => array(0 => __('None',WEBNUS_TEXT_DOMAIN), 1 => __('Search Box',WEBNUS_TEXT_DOMAIN), 2 => __('Contact Information',WEBNUS_TEXT_DOMAIN)),
                'std' => '1'
            ),
            array(
                'id' => 'webnus_header_menu_type',
                'type' => 'radio_img',
                'title' => __('Select Menu Layout', WEBNUS_TEXT_DOMAIN),
                'options' => array('1' => array('title' => __('Menu Layout 1', WEBNUS_TEXT_DOMAIN), 'img' => $theme_img_dir . 'menutype/menu1.png'),
                    '2' => array('title' => __('Menu Layout 2', WEBNUS_TEXT_DOMAIN), 'img' => $theme_img_dir . 'menutype/menu2.png'),
                    '3' => array('title' => __('Menu Layout 3', WEBNUS_TEXT_DOMAIN), 'img' => $theme_img_dir . 'menutype/menu3.png'),
                    '4' => array('title' => __('Menu Layout 4', WEBNUS_TEXT_DOMAIN), 'img' => $theme_img_dir . 'menutype/menu4.png'),
                    '5' => array('title' => __('Menu Layout 5', WEBNUS_TEXT_DOMAIN), 'img' => $theme_img_dir . 'menutype/menu5.png'),
                ),
                'std' => '1'
            ),
         
          
		
    ));

  

    //background options

    $sections[] = array(
        'icon' => NHP_OPTIONS_URL . 'img/admin-background.png',
        'title' => __('Background', WEBNUS_TEXT_DOMAIN),
        'fields' => array(
            /*
             *
             * Enable Disable Header Social
             *
             */

            array(
                'id' => 'webnus_background',
                'type' => 'upload',
                'title' => __('Background Image', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Please choose an image or insert an image url to use for the backgroud.', WEBNUS_TEXT_DOMAIN),
            ),
            array(
                'id' => 'webnus_background_100',
                'type' => 'checkbox',
                'title' => __('100% Background Image', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Have background image always at 100% in width and height and scale according to the browser size', WEBNUS_TEXT_DOMAIN),
                'std' => '0'
            ),
            array(
                'id' => 'webnus_background_repeat',
                'type' => 'select',
                'title' => __('Background Repeat', WEBNUS_TEXT_DOMAIN),
                'options' => array('1' => __('repeat', WEBNUS_TEXT_DOMAIN), '2' => __('repeat-x', WEBNUS_TEXT_DOMAIN), '3' => __('repeat-y', WEBNUS_TEXT_DOMAIN), '0' => __('no-repeat', WEBNUS_TEXT_DOMAIN)),
                'std' => '1'
            ),
            array(
                'id' => 'webnus_background_color',
                'type' => 'color',
                'title' => __('Background Color', WEBNUS_TEXT_DOMAIN),
                'sub_desc' => __('Pick a background color', WEBNUS_TEXT_DOMAIN),
                'std' => ''
            ),
            array(
                'id' => 'webnus_background_pattern', //must be unique
                'type' => 'radio_img', //the field type
                'title' => __('Background Pattern', WEBNUS_TEXT_DOMAIN),
                'options' => array('none' => array('title' => __('None', WEBNUS_TEXT_DOMAIN), 'img' => $theme_img_bg_dir . 'bg-pattern/none.jpg'),
                    $theme_img_dir . 'bdbg1.png' => array('title' => __('Default BG', WEBNUS_TEXT_DOMAIN), 'img' => $theme_img_bg_dir . 'bg-pattern/bdbg1.png'), $theme_img_bg_dir . 'gray-jean.png' => array('title' => __('Gray Jean', WEBNUS_TEXT_DOMAIN), 'img' => $theme_img_bg_dir . 'bg-pattern/gray-jean.png'), $theme_img_bg_dir . 'light-wool.png' => array('title' => __('Light Wool', WEBNUS_TEXT_DOMAIN), 'img' => $theme_img_bg_dir . 'bg-pattern/light-wool.png'),
                    $theme_img_bg_dir . 'subtle_freckles.png' => array('title' => __('Subtle Freckles', WEBNUS_TEXT_DOMAIN), 'img' => $theme_img_bg_dir . 'bg-pattern/subtle_freckles.png'),
                    $theme_img_bg_dir . 'subtle_freckles2.png' => array('title' => __('Subtle Freckles 2', WEBNUS_TEXT_DOMAIN), 'img' => $theme_img_bg_dir . 'bg-pattern/subtle_freckles2.png'),
                    $theme_img_bg_dir . 'green-fibers.png' => array('title' => __('Green Fibers', WEBNUS_TEXT_DOMAIN), 'img' => $theme_img_bg_dir . 'bg-pattern/green-fibers.png'),
					$theme_img_bg_dir . 'dust.png' => array('title' => __('Dust', WEBNUS_TEXT_DOMAIN), 'img' => $theme_img_bg_dir . 'bg-pattern/dust.png')),
                'std' => $theme_img_bg_dir . 'gray-jean.png'//this should be the key as defined above
            )
    ));


    /*
     *
     * Analytics and maps
     */
    include_once dirname(__FILE__) . '/gfonts/gfonts.php';
    $sections[] = array(
        'icon' => NHP_OPTIONS_URL . 'img/admin-typography.png',
        'title' => __('Typography', WEBNUS_TEXT_DOMAIN),
        'fields' => array(
            array(
                'id' => 'webnus_body_font',
                'type' => 'select',
                'title' => __('Select Body Font Family', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Select a font family for body text', WEBNUS_TEXT_DOMAIN),
                'options' => $fontArray
            ),
            array(
                'id' => 'webnus_menu_font',
                'type' => 'select',
                'title' => __('Select Menu Font Family', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Select a font family for navigation', WEBNUS_TEXT_DOMAIN),
                'options' => $fontArray
            ),
            array(
                'id' => 'webnus_heading_font',
                'type' => 'select',
                'title' => __('Select Headings Font', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Select a font family for headings', WEBNUS_TEXT_DOMAIN),
                'options' => $fontArray
            ),
            array(
                'id' => 'webnus_p_font',
                'type' => 'select',
                'title' => __('Select Paragraph Font', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Select a font family for paragraphs, &lt;P&gt; Tags ', WEBNUS_TEXT_DOMAIN),
                'options' => $fontArray
            ),
            array(
                'id' => 'sep1',
                'type' => 'seperator',
                'desc' => 'Font Size',
            ),
            array(
                'id' => 'webnus_body_font_size',
                'type' => 'select',
                'title' => __('Body Font Size (px)', WEBNUS_TEXT_DOMAIN),
                'options' => $fontsize,
            ),
            array(
                'id' => 'webnus_topnav_font_size',
                'type' => 'select',
                'title' => __('Top Nav Font Size (px)', WEBNUS_TEXT_DOMAIN),
                'options' => $fontsize,
            ),
          
            array(
                'id' => 'webnus_h1_font_size',
                'type' => 'select',
                'title' => __('Font Size For &lt;H1&gt; Tag', WEBNUS_TEXT_DOMAIN),
                'options' => $fontsize
            ),
            array(
                'id' => 'webnus_h2_font_size',
                'type' => 'select',
                'title' => __('Font Size For &lt;H2&gt; Tag', WEBNUS_TEXT_DOMAIN),
                'options' => $fontsize
            ),
            array(
                'id' => 'webnus_h3_font_size',
                'type' => 'select',
                'title' => __('Font Size For &lt;H3&gt; Tag', WEBNUS_TEXT_DOMAIN),
                'options' => $fontsize
            ),
            array(
                'id' => 'webnus_h4_font_size',
                'type' => 'select',
                'title' => __('Font Size For &lt;H4&gt; Tag', WEBNUS_TEXT_DOMAIN),
                'options' => $fontsize
            ),
            array(
                'id' => 'webnus_h5_font_size',
                'type' => 'select',
                'title' => __('Font Size For &lt;H5&gt; Tag', WEBNUS_TEXT_DOMAIN),
                'options' => $fontsize
            ),
            array(
                'id' => 'webnus_h6_font_size',
                'type' => 'select',
                'title' => __('Font Size For &lt;H6&gt; Tag', WEBNUS_TEXT_DOMAIN),
                'options' => $fontsize
            ),
        )
    );



    $sections[] = array(
        'icon' => NHP_OPTIONS_URL . 'img/admin-style.png',
        'title' => __('Styling Options', WEBNUS_TEXT_DOMAIN),
        'fields' => array(
            array(
                'id' => 'webnus_color_skin', //must be unique
                'type' => 'radio_img', //the field type
                'title' => __('Predefined Color Skin', WEBNUS_TEXT_DOMAIN),
                'options' => array('1' => array('title' => __('Default: Blue&nbsp;&nbsp;&nbsp;&nbsp;', WEBNUS_TEXT_DOMAIN), 'img' => NHP_OPTIONS_URL . 'img/color1-ss.png'), '2' => array('title' => __('Color 2: Cherry', WEBNUS_TEXT_DOMAIN), 'img' => NHP_OPTIONS_URL . 'img/color2-ss.png'),
                    '3' => array('title' => __('Color 3: Teal&nbsp;&nbsp;&nbsp;', WEBNUS_TEXT_DOMAIN), 'img' => NHP_OPTIONS_URL . 'img/color3-ss.png'), '4' => array('title' => __('Color 4: Red', WEBNUS_TEXT_DOMAIN), 'img' => NHP_OPTIONS_URL . 'img/color4-ss.png')
                    , '5' => array('title' => __('Color 5: Pink&nbsp;&nbsp;&nbsp;&nbsp;', WEBNUS_TEXT_DOMAIN), 'img' => NHP_OPTIONS_URL . 'img/color5-ss.png')
                    , '6' => array('title' => __('Color 6: Green', WEBNUS_TEXT_DOMAIN), 'img' => NHP_OPTIONS_URL . 'img/color6-ss.png')
                    , '7' => array('title' => __('Color 7: Orchid', WEBNUS_TEXT_DOMAIN), 'img' => NHP_OPTIONS_URL . 'img/color7-ss.png')
                    , '8' => array('title' => __('Color 8: Jade&nbsp;', WEBNUS_TEXT_DOMAIN), 'img' => NHP_OPTIONS_URL . 'img/color8-ss.png')
                    , '9' => array('title' => __('Color 9:SkyBlue', WEBNUS_TEXT_DOMAIN), 'img' => NHP_OPTIONS_URL . 'img/color9-ss.png')
                    , '10' => array('title' => __('Color 10: Orange', WEBNUS_TEXT_DOMAIN), 'img' => NHP_OPTIONS_URL . 'img/color10-ss.png')
                ),
                'std' => ''//this should be the key as defined above
            ),
            array(
                'id' => 'webnus_custom_color_sep',
                'type' => 'seperator',
                'desc' => __('Custom Color Skin', WEBNUS_TEXT_DOMAIN),
            ),
            array(
                'id' => 'webnus_custom_color_skin_enable',
                'type' => 'button_set',
                'title' => __('Custom Color Skin Enable/Disable', WEBNUS_TEXT_DOMAIN),
                'options' => array(1 => __('Enable',WEBNUS_TEXT_DOMAIN), 0 => __('Disable',WEBNUS_TEXT_DOMAIN)),
                'desc' => __('Enable or Disable Custom Color Skin', WEBNUS_TEXT_DOMAIN),
                'std' => '0'
            ),
            array(
                'id' => 'webnus_custom_color_skin',
                'type' => 'color',
                'title' => __('Custom Color Skin', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Choose custom color for color skin', WEBNUS_TEXT_DOMAIN),
                'std' => ''
            ),
            array(
                'id' => 'webnus_custom_color_sep2',
                'type' => 'seperator',
                'desc' => __('Other Colors', WEBNUS_TEXT_DOMAIN),
            ),
           

            array(
                'id' => 'webnus_heading_color',
                'type' => 'color',
                'title' => __('Headings Font Color', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Choose colors for headings(h1,h2,h3,...)', WEBNUS_TEXT_DOMAIN),
                'std' => ''
            ),
            array(
                'id' => 'webnus_paragraph_color',
                'type' => 'color',
                'title' => __('Paragraph Color', WEBNUS_TEXT_DOMAIN),
                'desc' => __('This is the color of the Paragraphs', WEBNUS_TEXT_DOMAIN),
                'std' => ''
            ),
            array(
                'id' => 'webnus_a_color',
                'type' => 'color',
                'title' => __('Link Color', WEBNUS_TEXT_DOMAIN),
                'desc' => __('This is the color of the Links', WEBNUS_TEXT_DOMAIN),
                'std' => ''
            ),
            array(
                'id' => 'webnus_a_visited_color',
                'type' => 'color',
                'title' => __('Visited Link Color', WEBNUS_TEXT_DOMAIN),
                'desc' => __('This is the color of the Visted Links', WEBNUS_TEXT_DOMAIN),
                'std' => ''
            ),
            array(
                'id' => 'webnus_a_active_color',
                'type' => 'color',
                'title' => __('Actived Link Color', WEBNUS_TEXT_DOMAIN),
                'desc' => __('This is the color of the Actived Links', WEBNUS_TEXT_DOMAIN),
                'std' => ''
            ),
            array(
                'id' => 'webnus_a_hover_color',
                'type' => 'color',
                'title' => __('Link Hover Color', WEBNUS_TEXT_DOMAIN),
                'desc' => __('This is the color of the Links Hover', WEBNUS_TEXT_DOMAIN),
                'std' => ''
            ),
        )
    );






    /*
     *
     *
     * BLOG Options
     *
     *
     */


    $sections[] = array(
        'icon' => NHP_OPTIONS_URL . 'img/admin-blog.png',
        'title' => __('Blog Options', WEBNUS_TEXT_DOMAIN),
        'desc' => __('<p class="description">Customize Blogs</p>', WEBNUS_TEXT_DOMAIN),
        'fields' => array(
           
             array(
                'id' => 'webnus_blog_template',
                'type' => 'select',
                'title' => __('BlogTemplate', WEBNUS_TEXT_DOMAIN),
                'options' => array('1' => __('Blog 1(Full Width Image)', WEBNUS_TEXT_DOMAIN), '2' => __('Blog 2(Thmbnail Image)', WEBNUS_TEXT_DOMAIN), '3' => __('Timeline', WEBNUS_TEXT_DOMAIN)),
                'std' => '1'
            ),
			 array(
                'id' => 'webnus_blog_page_title',
                'type' => 'text',
                'title' => __('Blog Page Title', WEBNUS_TEXT_DOMAIN),
                'std' => 'Blog',
            ),
			array(
                'id' => 'webnus_blog_featuredimage_enable',
                'type' => 'button_set',
                'title' => __('Featured Image', WEBNUS_TEXT_DOMAIN),
                'options' => array('0' => __('Off', WEBNUS_TEXT_DOMAIN), '1' => __('On', WEBNUS_TEXT_DOMAIN)),
                'std' => '1'
            ),
            array(
                'id' => 'webnus_blog_sinlge_featuredimage_enable',
                'type' => 'button_set',
                'title' => __('Featured Image on Single Post Page', WEBNUS_TEXT_DOMAIN),
                'options' => array('0' => __('Off', WEBNUS_TEXT_DOMAIN), '1' => __('On', WEBNUS_TEXT_DOMAIN)),
                'std' => '1'
            ),
            array(
                'id' => 'webnus_blog_posttitle_enable',
                'type' => 'button_set',
                'title' => __('Post Title', WEBNUS_TEXT_DOMAIN),
                'options' => array('0' => __('Off', WEBNUS_TEXT_DOMAIN), '1' => __('On', WEBNUS_TEXT_DOMAIN)),
                'std' => '1'
            ),
            array(
                'id' => 'webnus_blog_author_enable',
                'type' => 'button_set',
                'title' => __('Author Box', WEBNUS_TEXT_DOMAIN),
                'options' => array('0' => __('Off', WEBNUS_TEXT_DOMAIN), '1' => __('On', WEBNUS_TEXT_DOMAIN)),
                'std' => '1'
            ),
            array(
                'id' => 'webnus_blog_excerptfull_enable',
                'type' => 'button_set',
                'title' => __('Excerpt Or Full Blog Content', WEBNUS_TEXT_DOMAIN),
                'sub_desc' => __('Show excerpt or Full Blog Content On Blog Pages', WEBNUS_TEXT_DOMAIN),
                'options' => array('0' => __('Excerpt', WEBNUS_TEXT_DOMAIN), '1' => __('&nbsp;&nbsp;&nbsp;Full&nbsp;&nbsp;&nbsp;', WEBNUS_TEXT_DOMAIN)),
                'std' => '0'
            ),
            array(
                'id' => 'webnus_blog_excerpt_len',
                'type' => 'text',
                'title' => __('Excerpt Length', WEBNUS_TEXT_DOMAIN),
                'std' => '65',
            ),
            array(
                'id' => 'webnus_blog_readmore_text',
                'type' => 'text',
                'title' => __('Read More Text', WEBNUS_TEXT_DOMAIN),
                'std' => 'Readm More',
            ),
			array(
                'id' => 'webnus_blog_sidebar',
                'type' => 'button_set',
                'title' => __('Blog Sidebar Position', WEBNUS_TEXT_DOMAIN),
                'options' => array('left' => 'Left', 'right' => 'Right', 'both' => 'Both'),
                'std' => 'right',
            ),
            array(
                'id' => 'webnus_blog_singlepost_sidebar',
                'type' => 'button_set',
                'title' => __('Single Post Sidebar Position', WEBNUS_TEXT_DOMAIN),
                'options' => array('left' => 'Left', 'right' => 'Right'),
                'std' => 'right',
            ),
			
       
        )
    );



    /*
     *
     * Portfolio
     *
     */

    $sections[] = array(
        'icon' => NHP_OPTIONS_URL . 'img/admin-portfolio.png',
        'title' => __('Portfolio Options', WEBNUS_TEXT_DOMAIN),
        'fields' => array(
            array(
                'id' => 'webnus_portfolio_slug',
                'type' => 'text',
                'title' => __('Portfolio Slug', WEBNUS_TEXT_DOMAIN),
                'std' => 'portfolio-items'
            ),
            array(
                'id' => 'webnus_portfolio_count',
                'type' => 'text',
                'title' => __('Number of Portfolio Items Per Page', WEBNUS_TEXT_DOMAIN),
                'std' => '10'
            ),
            array(
                'id' => 'webnus_portfolio_columns',
                'type' => 'radio',
                'title' => __('Select Portfolio Columns', WEBNUS_TEXT_DOMAIN),
                'options' => array('2' => '2 Columns', '3' => '3 Columns', '4' => '4 Columns'),
                'std' => '4'
            ),
            /*array(
                'id' => 'webnus_portfolio_topimage_enable',
                'type' => 'button_set',
                'title' => __('Show/Hide Portfolio Top Transparent Images', WEBNUS_TEXT_DOMAIN),
                'options' => array('0' => __('Hide', WEBNUS_TEXT_DOMAIN), '1' => __('Show', WEBNUS_TEXT_DOMAIN)),
                'std' => '1'
            ),*/
            array(
                'id' => 'webnus_portfolio_isotope_enable',
                'type' => 'button_set',
                'title' => __('Enable/Disable Portfolio Isotope Effect', WEBNUS_TEXT_DOMAIN),
                'options' => array('0' => __('Disable', WEBNUS_TEXT_DOMAIN), '1' => __('Enable', WEBNUS_TEXT_DOMAIN)),
                'std' => '1'
            ),
        
            array(
            'id' => 'webnus_portfolio_image_width',
            'type' => 'text',
            'title' => __('Portfolio Image Width in(px)', WEBNUS_TEXT_DOMAIN),
            'std'=>'460'

            ),
            array(
            'id' => 'webnus_portfolio_image_height',
            'type' => 'text',
            'title' => __('Portfolio Image Height in(px)', WEBNUS_TEXT_DOMAIN),
            'std'=>'345'

            ),
			
			array(
                'id' => 'webnus_portfolio_recentworks_enable',
                'type' => 'button_set',
                'title' => __('Enable/Disable Recent Works In Single Portfolio Item', WEBNUS_TEXT_DOMAIN),
                'options' => array('0' => __('Disable', WEBNUS_TEXT_DOMAIN), '1' => __('Enable', WEBNUS_TEXT_DOMAIN)),
                'std' => '1'
            ),
     
        )
    );

   
    //Social Network Accounts
    $sections[] = array(
        'icon' => NHP_OPTIONS_URL . 'img/admin-social.png',
        'title' => __('Social Networks', WEBNUS_TEXT_DOMAIN),
        'desc' => __('<p class="description">Customize The Social Network Accounts</p>', WEBNUS_TEXT_DOMAIN),
        'fields' => array(
            array(
                'id' => 'webnus_twitter_ID',
                'type' => 'text',
                'title' => __('Twitter ID', WEBNUS_TEXT_DOMAIN),
                'sub_desc' => __('Example: mytwitterid', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Enter the Twitter ID', WEBNUS_TEXT_DOMAIN),
                'std' => '#'
            ),
            array(
                'id' => 'webnus_facebook_ID',
                'type' => 'text',
                'title' => __('Facebook Link', WEBNUS_TEXT_DOMAIN),
                'sub_desc' => __('Example: http://facebook.com/myfacebook', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Enter the Facebook ID', WEBNUS_TEXT_DOMAIN),
                'std' => '#'
            ),
            array(
                'id' => 'webnus_youtube_ID',
                'type' => 'text',
                'title' => __('Youtube Link', WEBNUS_TEXT_DOMAIN),
                'sub_desc' => __('Example: http://youtube.com/account', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Enter the Youtube Link', WEBNUS_TEXT_DOMAIN),
                'std' => '#'
            ),
            array(
                'id' => 'webnus_linkedin_ID',
                'type' => 'text',
                'title' => __('Linkedin Link', WEBNUS_TEXT_DOMAIN),
                'sub_desc' => __('Example: http://linkedin/linkedinid', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Enter the Linkedin Link', WEBNUS_TEXT_DOMAIN),
                'std' => '#'
            ),
            array(
                'id' => 'webnus_dribbble_ID',
                'type' => 'text',
                'title' => __('Dribbble Link', WEBNUS_TEXT_DOMAIN),
                'sub_desc' => __('Example: http://dribbble.com/dribbbleid', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Enter the Dribbble Link', WEBNUS_TEXT_DOMAIN),
                'std' => '#'
            ),
            array(
                'id' => 'webnus_pinterest_ID',
                'type' => 'text',
                'title' => __('Pinterest Link', WEBNUS_TEXT_DOMAIN),
                'sub_desc' => __('Example: http://pinterest/pinterestid', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Enter the Pinterest Link', WEBNUS_TEXT_DOMAIN),
                'std' => '#'
            ),
            array(
                'id' => 'webnus_vimeo_ID',
                'type' => 'text',
                'title' => __('Vimeo Link', WEBNUS_TEXT_DOMAIN),
                'sub_desc' => __('Example: http://vimeo.com/', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Enter the viemo Link', WEBNUS_TEXT_DOMAIN),
                'std' => '#'
            ),
             array(
                'id' => 'webnus_google_ID',
                'type' => 'text',
                'title' => __('Google+ Link', WEBNUS_TEXT_DOMAIN),
                'sub_desc' => __('Example: http://plus.google.com/', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Enter the google+ Link', WEBNUS_TEXT_DOMAIN),
                'std' => '#'
            ),
            array(
                'id' => 'webnus_rss_ID',
                'type' => 'text',
                'title' => __('RSS Link', WEBNUS_TEXT_DOMAIN),
                'sub_desc' => __('Example: http://exaple.com/rss', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Enter the RSS Link', WEBNUS_TEXT_DOMAIN),
                'std' => '#'
            ),
        )
    );

   /*
     * Footer
     */
    $sections[] = array(
        'icon' => NHP_OPTIONS_URL . 'img/admin-footer.png',
        'title' => __('Footer Options', WEBNUS_TEXT_DOMAIN),
        'desc' => __('<p class="description">Customize Footer</p>', WEBNUS_TEXT_DOMAIN),
        'fields' => array(

			array(
                'id' => 'webnus_footer_bottom_enable',
                'type' => 'button_set',
                'title' => __('Footer Bottom Show/Hide', WEBNUS_TEXT_DOMAIN),
                'options' => array('0' => __('Hide', WEBNUS_TEXT_DOMAIN), '1' => __('Show', WEBNUS_TEXT_DOMAIN)),
                'std' => '1'
            ),		


		   array(
                'id' => 'webnus_footer_color',
                'type' => 'button_set',
                'title' => __('Footer Color Style', WEBNUS_TEXT_DOMAIN),
                'options' => array('1' => __('Dark', WEBNUS_TEXT_DOMAIN), '2' => __('Light', WEBNUS_TEXT_DOMAIN)),
                'std' => '1'
            ),
			array(
                'id' => 'webnus_footer_bottom_left',
                'type' => 'select',
                'title' => __('Footer Bottom Left Content', WEBNUS_TEXT_DOMAIN),
                'options' => array('1' => __('Logo', WEBNUS_TEXT_DOMAIN), '2' => __('Menu', WEBNUS_TEXT_DOMAIN),'3' => __('Copyright', WEBNUS_TEXT_DOMAIN)),
                'std' => '3'
            ),
			array(
                'id' => 'webnus_footer_bottom_right',
                'type' => 'select',
                'title' => __('Footer Bottom Right Content', WEBNUS_TEXT_DOMAIN),
                'options' => array('1' => __('Logo', WEBNUS_TEXT_DOMAIN), '2' => __('Menu', WEBNUS_TEXT_DOMAIN),'3' => __('Copyright', WEBNUS_TEXT_DOMAIN)),
                'std' => '1'
            ),
			
           
			array(
                'id' => 'webnus_footer_logo',
                'type' => 'upload',
                'title' => __('Footer Logo', WEBNUS_TEXT_DOMAIN),
                'desc' => __('Please choose an image file for footer logo.', WEBNUS_TEXT_DOMAIN),
            ),
			array(
                'id' => 'webnus_footer_copyright',
                'type' => 'text',
                'title' => __('Footer Copyright Text', WEBNUS_TEXT_DOMAIN),
                
            ),
			 array(
                'id' => 'webnus_footer_type',
                'type' => 'radio_img',
                'title' => __('Footer Type', WEBNUS_TEXT_DOMAIN),
                'options' => array('1' => array('title' => __('Footer Layout 1', WEBNUS_TEXT_DOMAIN), 'img' => $theme_img_dir . 'footertype/footer1.png'),
                    '2' => array('title' => __('Footer Layout 2', WEBNUS_TEXT_DOMAIN), 'img' => $theme_img_dir . 'footertype/footer2.png'),
                    '3' => array('title' => __('Footer Layout 3', WEBNUS_TEXT_DOMAIN), 'img' => $theme_img_dir . 'footertype/footer3.png'),
                    '4' => array('title' => __('Footer Layout 4', WEBNUS_TEXT_DOMAIN), 'img' => $theme_img_dir . 'footertype/footer4.png'),
                    '5' => array('title' => __('Footer Layout 5', WEBNUS_TEXT_DOMAIN), 'img' => $theme_img_dir . 'footertype/footer5.png'),
                ),
                'std' => '1'
            ),
			
 
    ));
  
      /*
     * 404 PAGE
     */
    $sections[] = array(
        'icon' => NHP_OPTIONS_URL . 'img/admin-404.png',
        'title' => __('404 Page', WEBNUS_TEXT_DOMAIN),
        'desc' => __('<p class="description">Customize Default 404 Page(Page Not Found)</p>', WEBNUS_TEXT_DOMAIN),
        'fields' => array(
            array(
                'id' => 'webnus_404_text',
                'type' => 'textarea',
                'title' => __('Text To Display', WEBNUS_TEXT_DOMAIN),
                'std' => '<h3>Looking for a Professional and Modern Responsive Design?</h3><p>webnus is a Modern multi-purpose HTML5-CSS3 template with many different options, and is fully responsive. Its 1280px skeleton grid based and looks perfect on large screens.</p>'
            ),/*
            array(
                'id' => 'webnus_404_link_text',
                'type' => 'text',
                'title' => __('Anchor Text', WEBNUS_TEXT_DOMAIN),
                'std' => 'HOME PAGE'
            ),
            array(
                'id' => 'webnus_404_link_link',
                'type' => 'text',
                'title' => __('Anchor Link', WEBNUS_TEXT_DOMAIN),
                'std' => site_url()
            ),*/
    ));


/*
		Custom css
*/

    $sections[] = array(
        'icon' => NHP_OPTIONS_URL . 'img/admin-css.png',
        'title' => __('Custom CSS', WEBNUS_TEXT_DOMAIN),
        'fields' => array(
            array(
                'id' => 'webnus_custom_css_sep1',
                'type' => 'seperator',
                'desc' => __('Paste your css code.', WEBNUS_TEXT_DOMAIN),
                'sub_desc' => __('Do not include tags or any html tag in this field<br />', WEBNUS_TEXT_DOMAIN),
            ),
            array(
                'id' => 'webnus_custom_css',
                'type' => 'textarea',
                'title' => __('CSS Code', WEBNUS_TEXT_DOMAIN),
                'desc' => 'Any custom CSS from the user should go in this field, it will override the theme CSS.<br/><strong>Please use &lt;style&gt;&lt;/style&gt; to write CSS.</strong>'
            ),
        )
    );

	
	
	/*
		Woocommerce 
*/

    $sections[] = array(
        'icon' => NHP_OPTIONS_URL . 'img/admin-woo.png',
        'title' => __('Woocommerce', WEBNUS_TEXT_DOMAIN),
        'fields' => array(
            array(
                'id' => 'webnus_woo_shop_title',
                'type' => 'text',
                'title' => __('Shop page title', WEBNUS_TEXT_DOMAIN),
                'std'=>'Shop'
            ),
            array(
                'id' => 'webnus_woo_product_title',
                'type' => 'text',
                'title' => __('Product page title', WEBNUS_TEXT_DOMAIN),
                'std'=>'Product'
            ),
        )
    );


    $tabs = array();

    if (function_exists('wp_get_theme')) {
        $theme_data = wp_get_theme();
        $theme_uri = $theme_data->get('ThemeURI');
        $description = $theme_data->get('Description');
        $author = $theme_data->get('Author');
        $version = $theme_data->get('Version');
        $tags = $theme_data->get('Tags');
    } else {
        $theme_data = wp_get_theme(get_template_directory());
        $theme_uri = $theme_data['URI'];
        $description = $theme_data['Description'];
        $author = $theme_data['Author'];
        $version = $theme_data['Version'];
        $tags = $theme_data['Tags'];
    }

    $theme_info = '<div class="nhp-opts-section-desc">';
    $theme_info .= '<p class="nhp-opts-theme-data description theme-uri">' . __('<strong>Theme URL:</strong> ', WEBNUS_TEXT_DOMAIN) . '<a href="' . $theme_uri . '" target="_blank">' . $theme_uri . '</a></p>';
    $theme_info .= '<p class="nhp-opts-theme-data description theme-author">' . __('<strong>Author:</strong> ', WEBNUS_TEXT_DOMAIN) . $author . '</p>';
    $theme_info .= '<p class="nhp-opts-theme-data description theme-version">' . __('<strong>Version:</strong> ', WEBNUS_TEXT_DOMAIN) . $version . '</p>';
    $theme_info .= '<p class="nhp-opts-theme-data description theme-description">' . $description . '</p>';
    $theme_info .= '<p class="nhp-opts-theme-data description theme-tags">' . __('<strong>Tags:</strong> ', WEBNUS_TEXT_DOMAIN) . implode(', ', $tags) . '</p>';
    $theme_info .= '</div>';



    $tabs['theme_info'] = array(
        'icon' => NHP_OPTIONS_URL . 'img/admin-info.png',
        'title' => __('Theme Information', WEBNUS_TEXT_DOMAIN),
        'content' => $theme_info
    );



    global $NHP_Options;
    $NHP_Options = new NHP_Options($sections, $args, $tabs);
}

//function
add_action('init', 'setup_framework_options', 0);

/*
 *
 * Custom function for the callback referenced above
 *
 */

function my_custom_field($field, $value) {
    print_r($field);
    print_r($value);
}

//function

/*
 *
 * Custom function for the callback validation referenced above
 *
 */

function validate_callback_function($field, $value, $existing_value) {

    $error = false;
    $value = 'just testing';
    /*
      do your validation

      if(something){
      $value = $value;
      }elseif(somthing else){
      $error = true;
      $value = $existing_value;
      $field['msg'] = 'your custom error message';
      }
     */

    $return['value'] = $value;
    if ($error == true) {
        $return['error'] = $field;
    }
    return $return;
}

//function
?>