<?php
include_once str_replace("\\","/",get_template_directory()).'/inc/init.php';
class YStayConnected extends WP_Widget{

	function __construct(){

		$params = array(
		'description'=> 'Footer Stay Connected Widget',
		'name'=> 'Webnus-Stay Connected'
		);

		parent::__construct('YStayConnected', '', $params);

	}

	public function form($instance){


		extract($instance);
		?>

		<p>
		<label for="<?php echo $this->get_field_id('title') ?>">Title:</label>
		<input
		type="text"
		class="widefat"
		id="<?php echo $this->get_field_id('title') ?>"
		name="<?php echo $this->get_field_name('title') ?>"
		value="<?php if( isset($title) )  echo esc_attr($title); ?>"
		/>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('twitterid') ?>">Twitter ID:</label>
		<input
		type="text"
		class="widefat"
		id="<?php echo $this->get_field_id('twitterid') ?>"
		name="<?php echo $this->get_field_name('twitterid') ?>"
		value="<?php if( isset($twitterid) )  echo esc_attr($twitterid); ?>"
		/>
		</p>
		
		<?php 
	}
	
	
	public function widget($args, $instance){
		
		extract($args);
		extract($instance);
		?>
	
			<?php echo $before_widget; ?>
			<?php echo $before_title.$title.$after_title; ?>
			
			<script type="text/javascript">
				
function tz_format_twitter(twitters) {
  var statusHTML = [];
     
    var status = twitters.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {
      return '<a href="'+url+'">'+url+'</a>';
    }).replace(/\B#([_a-z0-9]+)/ig, function(reply) {
      return  reply.charAt(0)+'<a href="http://twitter.com/'+reply.substring(1)+'">'+reply.substring(1)+'</a>';
    });
    statusHTML.push('<span>'+status+'</span>');
  
  return statusHTML.join('');
}

jQuery(document).ready(function(){
 
 jQuery.ajax({url:"<?php echo get_stylesheet_directory_uri() ?>/inc/twitter/twitter.php",success:function(result){
	
	jQuery("#twitter").html(tz_format_twitter(result));
}});
});

			</script>
			
			<br />
			<div class="lts-tweets"><i class="icomoon-twitter"></i>
			  <div >
			  <h3><a href="https://twitter.com/<?php echo $twitterid; ?>">@<?php echo $twitterid; ?></a></h3>
			  <h5 id="twitter"></h5>
			  </div>
			</div>
			<?php 
				$o = new webnus_options();
				
			?>
			
				
			<?php echo $after_widget; ?><!-- end-follow2 -->

		<?php 
	} 
}

add_action('widgets_init', 'register_ystayconnect'); 
function register_ystayconnect(){
	
	register_widget('YStayConnected');
	
}