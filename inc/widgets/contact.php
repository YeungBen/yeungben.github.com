<?php

include_once str_replace("\\","/",get_template_directory()). '/inc/helpers/woptions.php';

class YContact extends WP_Widget{

	var $y ;
	
	function __construct(){

		$params = array(
		'description'=> 'Footer Contact Information Widget',
		'name'=> 'Webnus-Contact Information'
		);
		
		$this->y = new webnus_options();
		
		parent::__construct('YContact', '', $params);

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
		<label for="<?php echo $this->get_field_id('address') ?>">Address:</label>
		<input
		type="text"
		class="widefat"
		id="<?php echo $this->get_field_id('address') ?>"
		name="<?php echo $this->get_field_name('address') ?>"
		value="<?php if( isset($address) )  echo esc_attr($address); 
		else 
		echo $this->y->webnus_contact_address();
		?>"
		/>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('phone') ?>">Phone:</label>
		<input
		type="text"
		class="widefat"
		id="<?php echo $this->get_field_id('phone') ?>"
		name="<?php echo $this->get_field_name('phone') ?>"
		value="<?php if( isset($phone) )  echo esc_attr($phone); 
		else
		echo $this->y->webnus_contact_phone();
		?>"
		/>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('email') ?>">Email:</label>
		<input
		type="text"
		class="widefat"
		id="<?php echo $this->get_field_id('email') ?>"
		name="<?php echo $this->get_field_name('email') ?>"
		value="<?php if( isset($email) )  echo esc_attr($email); 
		else
		echo $this->y->webnus_contact_email();
		?>"
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
		<p>
		<label for="<?php echo $this->get_field_id('facebook') ?>">Facebook Link:</label>
		<input
		type="text"
		class="widefat"
		id="<?php echo $this->get_field_id('facebook') ?>"
		name="<?php echo $this->get_field_name('facebook') ?>"
		value="<?php if( isset($facebook) )  echo esc_attr($facebook); ?>"
		/>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('dribbble') ?>">Dribbble Link:</label>
		<input
		type="text"
		class="widefat"
		id="<?php echo $this->get_field_id('dribbble') ?>"
		name="<?php echo $this->get_field_name('dribbble') ?>"
		value="<?php if( isset($dribbble) )  echo esc_attr($dribbble); ?>"
		/>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('pinterest') ?>">Pinterest Link:</label>
		<input
		type="text"
		class="widefat"
		id="<?php echo $this->get_field_id('pinterest') ?>"
		name="<?php echo $this->get_field_name('pinterest') ?>"
		value="<?php if( isset($pinterest) )  echo esc_attr($pinterest); ?>"
		/>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('vimeo') ?>">Vimeo Link:</label>
		<input
		type="text"
		class="widefat"
		id="<?php echo $this->get_field_id('vimeo') ?>"
		name="<?php echo $this->get_field_name('vimeo') ?>"
		value="<?php if( isset($vimeo) )  echo esc_attr($vimeo); ?>"
		/>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('youtube') ?>">Youtube Link:</label>
		<input
		type="text"
		class="widefat"
		id="<?php echo $this->get_field_id('youtube') ?>"
		name="<?php echo $this->get_field_name('youtube') ?>"
		value="<?php if( isset($youtube) )  echo esc_attr($youtube); ?>"
		/>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('google') ?>">Google Plus Link:</label>
		<input
		type="text"
		class="widefat"
		id="<?php echo $this->get_field_id('google') ?>"
		name="<?php echo $this->get_field_name('google') ?>"
		value="<?php if( isset($google) )  echo esc_attr($google); ?>"
		/>
		</p>
		
		<?php 
	}
	
	
	public function widget($args, $instance){
		//36587311
		extract($args);
		extract($instance);
		?>
		<?php echo $before_widget; ?>
		<div class="contact-inf">
		<?php echo $before_title.$title.$after_title; ?>
			<br />
			<p>&nbsp;<strong>Address:</strong>
			
			<?php echo $address; ?></p>
			
			<p>&nbsp;<strong>Phone:</strong>
			
			<?php echo $phone; ?><br />
			</p>
			
			<p>&nbsp;<strong>Email:</strong>
			
			<?php echo $email; ?><br />
			</p> 
			<h4 class="subtitle">Stay Connected</h4>
		  <div class="socailfollow">
				<?php if(!empty($facebook)) { ?>
				<a href="<?php echo $facebook ?>" class="facebook"><i class="icomoon-facebook"></i></a>
				<?php } ?>
				<?php if(!empty($twitter)) { ?>
				<a href="<?php echo $twitter ?>" class="twitter"><i class="icomoon-twitter"></i></a>
				<?php } ?>
				<?php if(!empty($dribbble)) { ?>
				<a href="<?php echo $dribbble ?>" class="dribble"><i class="icomoon-dribbble"></i></a>
				<?php } ?>
				<?php if(!empty($pinterest)) { ?>
				<a href="<?php echo $pinterest ?>" class="pinterest"><i class="icomoon-pinterest-2"></i></a>
				<?php } ?>
				<?php if(!empty($vimeo)) { ?>
				<a href="<?php echo $vimeo ?>" class="vimeo"><i class="icomoon-vimeo"></i></a>
				<?php } ?>
				<?php if(!empty($youtube)) { ?>
				<a href="<?php echo $youtube ?>" class="youtube"><i class="icomoon-youtube"></i></a>
				<?php } ?>
				<?php if(!empty($google)) { ?>
				<a href="<?php echo $google ?>" class="google"><i class="icomoon-google"></i></a>
				<?php } ?>
				</div>
		  </div>
		  <?php echo $after_widget; ?>
		  
		<?php 
	} 
}

add_action('widgets_init', 'register_ycontact');

function register_ycontact(){
	
	register_widget('YContact');
	
}

