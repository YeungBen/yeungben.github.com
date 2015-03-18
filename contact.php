<?php

/*

Template Name: Contact Page

*/
get_header();

GLOBAL $webnus_options;

$last_time = get_the_time(' F Y');


GLOBAL $page_options_meta;

$meta = $page_options_meta->the_meta();

$show_titlebar =  isset($meta['webnus_page_options'][0]['show_page_title_bar'])?$meta['webnus_page_options'][0]['show_page_title_bar']:null;
$titlebar_bg =  isset($meta['webnus_page_options'][0]['title_background_color'])?$meta['webnus_page_options'][0]['title_background_color']:null;
$titlebar_fg =  isset($meta['webnus_page_options'][0]['title_text_color'])?$meta['webnus_page_options'][0]['title_text_color']:null;
$sidebar_pos =  isset($meta['webnus_page_options'][0]['sidebar_position'])?$meta['webnus_page_options'][0]['sidebar_position']:'right';

if($show_titlebar && ( 'show' == $show_titlebar)):
?>
<section id="headline" style="<?php

/// To change the title bar background color
if(!empty($titlebar_bg)) echo ' background-color:'.$titlebar_bg.';'; 
 
/// To change the title bar text color 


 ?>">
    <div class="container">
      <h3 style="<?php /* TEXT COLOR OF TITLE */ if(!empty($titlebar_fg)) echo ' color:'.$titlebar_fg.';';  ?>"><?php the_title(); ?></h3>
    </div>
</section>
<?php
endif;
?>
<section class="container" >
<!-- Start Page Content -->
<hr class="vertical-space">
<section class="container page-content" >

<hr class="vertical-space3">
<div class="seven columns contact-inf">
<h4>Contact Information:</h4>
<br />
<p><strong>Address:</strong></p>
<p>
<?php echo $webnus_options->webnus_contact_address(); ?></p>
<br />
<p><strong>Phone:</strong></p>
<p>
<?php echo $webnus_options->webnus_contact_phone(); ?><br />
</p>
<br />
<p><strong>Email:</strong></p>
<p>
<?php echo $webnus_options->webnus_contact_email(); ?><br />
</p>
<br />
<hr class="boldbx">
<?php 
		  if( have_posts() ): while( have_posts() ): the_post();
			the_content(); 
		  endwhile;
		  endif;
?>
</div>

<div class="eight columns offset-by-one">
<div class="contact-form">
<div class="clr"></div><br />
<form action="#" method="post" id="frmContact">
<h5>Whats your Name?</h5>
<input name="txtName" type="text" class="txbx" value="Name" /><br />
<h5>Whats your Email?</h5>
<input type="hidden" name="emailto" value="<?php echo $webnus_options->webnus_contact_email(); ?>" />
<input name="txtEmail" type="text" class="txbx" value="Email" /><br />
<h5>Email Subject?</h5>
<input name="txtSubject" type="text" class="txbx" value="Subject" /><br />
<div class="erabox">
<h5>Message to us</h5>
<textarea name="txtText" class="txbx era" ></textarea><br />
<input name="" type="button" class="sendbtn" value="Send Message" id="btnSend"/>

<div id="spanMessage">
</div>
</div>
</form>
</div><!-- end-contact-form  -->
<script type="text/javascript" >
jQuery(function(){

jQuery("#btnSend").click(function(){
jQuery.ajax({type:'POST', url: '<?php echo get_template_directory_uri(); ?>/inc/contactus/contact2.php', data:jQuery('#frmContact').serialize(), success: function(response) {
jQuery("#spanMessage").html('Please Wait...');

	 if(parseInt(response)>0)
	   {
		 jQuery("#spanMessage").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Your message has been sent.</div>');
	   }
	   else{
		 
		 jQuery("#spanMessage").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error! </strong> Somthing Wrong</div>');
	   }   
		 
}});
});
});
</script>
</div>
<div class="white-space"></div>
</section><!-- container -->
<section class="full-width">
<div id="contact-map">
<?php 
echo $webnus_options->webnus_google_map();
?>

<!-- END-Google Map -->
</div><!-- END-contact Map -->
</section><!-- END-Google Map Section -->

<hr class="vertical-space3">
</section><!-- container -->
<?php get_footer(); ?>