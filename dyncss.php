<?php
header('Content-type: text/css');

define ( 'THEME_ABS_PATH', str_replace("\\", "/", dirname(__FILE__)));

require( '../../../wp-load.php' );

include_once  THEME_ABS_PATH. '/inc/init.php';


$o  = new webnus_options();


/*
 *
*Top  Menu Hover Color
*/

?>
<?php 

/*
 * Google Font For P,H Tags
*/
$thm_options = get_option('webnus_options');


if(isset($thm_options['webnus_p_font']) && $thm_options['webnus_p_font']!='')
{
	echo "p { font-family: {$thm_options['webnus_p_font']}}\n";
}
if(isset($thm_options['webnus_heading_font']) && $thm_options['webnus_heading_font']!='')
{
	echo "h1, h2, h3, h4, h5, h6 { font-family: {$thm_options['webnus_heading_font']}}\n";
}
if(isset($thm_options['webnus_menu_font']) && $thm_options['webnus_menu_font']!='')
{
	echo "ul#nav * { font-family: {$thm_options['webnus_menu_font']}}\n";
}
if(isset($thm_options['webnus_body_font']) && $thm_options['webnus_body_font']!='')
{
	echo "body { font-family: {$thm_options['webnus_body_font']}}\n";
}
/*
if(isset($thm_options['webnus_h2_font']) && $thm_options['webnus_h2_font']!='')
{
	echo "h2 { font-family: {$thm_options['webnus_h2_font']}}\n";
}
if(isset($thm_options['webnus_h3_font']) && $thm_options['webnus_h3_font']!='')
{
	echo "h3 { font-family: {$thm_options['webnus_h3_font']}}\n";
}
if(isset($thm_options['webnus_h4_font']) &&  $thm_options['webnus_h4_font']!='')
{
	echo "h4 { font-family: {$thm_options['webnus_h4_font']}}\n";
}
if(isset($thm_options['webnus_h5_font']) && $thm_options['webnus_h5_font']!='')
{
	echo "h5 { font-family: {$thm_options['webnus_h5_font']}}\n";
}
if(isset($thm_options['webnus_h6_font']) && $thm_options['webnus_h6_font']!='')
{
	echo "h6 { font-family: {$thm_options['webnus_h6_font']}}\n";
}
*/
if(isset($thm_options['webnus_topnav_font_size']) &&  !empty($thm_options['webnus_topnav_font_size']))
{
	echo "ul#nav * { font-size: {$thm_options['webnus_topnav_font_size']}px;}\n";
}
if(isset($thm_options['webnus_body_font_size']) &&  !empty($thm_options['webnus_body_font_size']))
{
	echo "p { font-size: {$thm_options['webnus_body_font_size']}px;}\n";
}
if(isset($thm_options['webnus_p_font_size']) &&  !empty($thm_options['webnus_p_font_size']))
{
	echo "p { font-size: {$thm_options['webnus_p_font_size']}px;}\n";
}
if(isset($thm_options['webnus_h1_font_size']) &&  !empty($thm_options['webnus_h1_font_size']))
{
	echo "h1 { font-size: {$thm_options['webnus_h1_font_size']}px;}\n";
}
if(isset($thm_options['webnus_h2_font_size']) &&  !empty($thm_options['webnus_h2_font_size']))
{
	echo "h2 { font-size: {$thm_options['webnus_h2_font_size']}px;}\n";
}
if(isset($thm_options['webnus_h3_font_size']) &&  !empty($thm_options['webnus_h3_font_size']))
{
	echo "h3 { font-size: {$thm_options['webnus_h3_font_size']}px;}\n";
}
if(isset($thm_options['webnus_h4_font_size']) &&   !empty($thm_options['webnus_h4_font_size']))
{
	echo "h4 { font-size: {$thm_options['webnus_h4_font_size']}px;}\n";
}
if(isset($thm_options['webnus_h5_font_size']) &&  !empty($thm_options['webnus_h5_font_size']))
{
	echo "h5 { font-size: {$thm_options['webnus_h5_font_size']}px;}\n";
}
if(isset($thm_options['webnus_h6_font_size']) && !empty($thm_options['webnus_h6_font_size']))
{
	echo "h6 { font-size: {$thm_options['webnus_h6_font_size']}px;}\n";
}



/*
 * Page Title Background Color **************************
* **********************************************
*/


if(isset($thm_options['webnus_heading_color']) && !empty($thm_options['webnus_heading_color']))
{
	echo ".title h3,.title h4, h1, h2, h3, h4, h5, h6 { color: {$thm_options['webnus_heading_color']}; }\n";
}

if(isset($thm_options['webnus_paragraph_color']) && !empty($thm_options['webnus_paragraph_color']))
{
	echo "p {color: {$thm_options['webnus_paragraph_color']};}\n";
}

if(isset($thm_options['webnus_a_color']) && !empty($thm_options['webnus_a_color']))
{
	echo "a:link {color: {$thm_options['webnus_a_color']};}\n";
}

if(isset($thm_options['webnus_a_visited_color']) && !empty($thm_options['webnus_a_visited_color']))
{
	echo "a:visited {color: {$thm_options['webnus_a_visited_color']};}\n";
}

if(isset($thm_options['webnus_a_active_color']) && !empty($thm_options['webnus_a_active_color']))
{
	echo "a:active {color: {$thm_options['webnus_a_active_color']};}\n";
}

if(isset($thm_options['webnus_a_hover_color']) && !empty($thm_options['webnus_a_hover_color']))
{
	echo "a:hover {color: {$thm_options['webnus_a_hover_color']};}\n";
}

if(isset($thm_options['webnus_custom_color_skin_enable'])==1)
{

?>
/*
Color skin Generator
*/

/* #Color Skins
================================================== */

/* == Color Skin 1 #(Blue)#
=================================== */

/* == Backgrounds
----------------- */
.colorskin-11 .jcarousel-next:hover, .colorskin-11 .jcarousel-next:active,
.colorskin-11 .jcarousel-prev:hover, .colorskin-11 .jcarousel-prev:active , .colorskin-11 nav.primary ul li a:active, .colorskin-11 nav.primary ul li a.selected, .colorskin-11 #headline2, .colorskin-11 .callout, .colorskin-11 .servobx, .colorskin-11 #menu-icon:hover, .colorskin-11 #scroll-top a:hover, .colorskin-11 .bloxcirc.portx, .colorskin-11 ul#main-ibox li.active9, .colorskin-11 a.readmore { background-color:<?php echo $thm_options['webnus_custom_color_skin']; ?>; }
/* == TextColors
---------------- */
.colorskin-11 .callout a.callurl, .colorskin-11 .blog-date-sp h3, .colorskin-11 .acc-trigger a:hover, .colorskin-11 .acc-trigger.active a, .colorskin-11 .acc-trigger.active a:hover, .colorskin-11 #nav a:hover,  .colorskin-11 .nav-wrap2 #nav a:hover, .colorskin-11 #nav li:hover > a, .colorskin-11 #nav li.current a, .colorskin-11 #nav li.current ul li a:hover, .colorskin-11 .ls-layer h3, .colorskin-11 .ls-layer h4, .colorskin-11 h6.blog-cat { color:<?php echo $thm_options['webnus_custom_color_skin']; ?>; } 
/* == BorderColors
------------------ */
.colorskin-11 #nav li:hover > a, .colorskin-11 #nav li.current a, .colorskin-11 #nav ul, .colorskin-11 .port-page-title, .colorskin-11 .port-page-title, .colorskin-11 .portfolio-item img, .colorskin-11 #footer, .colorskin-11 .process-icon { border-color:<?php echo $thm_options['webnus_custom_color_skin']; ?>; }
/* == Buttons
------------------ */
/* == Fix Colors#
=================================== */
.colorskin-11 #nav li.current ul li a, .colorskin-11 #nav li.current ul li a, .colorskin-11 #nav li.current ul li a, .colorskin-11 #nav li.current ul li a, .colorskin-11 #nav li.current ul li a, .colorskin-11 #nav li.current ul li a, .colorskin-11 #nav li.current ul li a, .colorskin-11 #nav li.current ul li a, .colorskin-11 #nav li.current ul li a, .colorskin-11 #nav li.current ul li a { color:#999;}
<?php } ?>