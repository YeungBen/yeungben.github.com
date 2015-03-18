<?php
/**
 * ืทธ๑อ๘ www.zhuige.com
 */


GLOBAL $webnus_options;
$blogType =  $webnus_options->webnus_blog_template();

switch( $blogType ){
case 1:
get_template_part('blog','default');
break;
case 3:
get_template_part('blog','timeline');
break;

default:
get_template_part('blog','default');
}




?>