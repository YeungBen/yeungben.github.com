<?php
include_once str_replace("\\","/",get_template_directory()).'/inc/init.php';
class YFlickr extends WP_Widget{

	function __construct(){

		$params = array(
		'description'=> 'Footer Flickr Widget',
		'name'=> 'Webnus-Flickr'
		);

		parent::__construct('YFlickr', '', $params);

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
		<label for="<?php echo $this->get_field_id('flickr') ?>">Flickr Script:</label>
		<textarea
		
		class="widefat"
		id="<?php echo $this->get_field_id('flickr') ?>"
		name="<?php echo $this->get_field_name('flickr') ?>"
		
		><?php if( isset($flickr) )  echo esc_attr($flickr); ?></textarea>
		</p>
		
		<?php 
	}
	
	
	public function widget($args, $instance){
		//36587311
		extract($args);
		extract($instance);
		?>
		<?php echo $before_widget; ?>
		<?php echo $before_title.$title.$after_title; ?>
			<div class="flickr-feed">
			<?php echo $flickr ?>
			<div class="clear"></div>
			</div>	 
		  <?php echo $after_widget; ?><!-- Disclaimer -->
		<?php 
	} 
}

add_action('widgets_init','register_yflicker'); 
function register_yflicker(){
	
	register_widget('YFlickr');
	
}

