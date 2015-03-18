<?php
include_once str_replace("\\","/",get_template_directory()).'/inc/init.php';

class Webnus_LatestPosts extends WP_Widget{

	function __construct(){

		$params = array(
		'description'=> 'Display Latest Posts',
		'name'=> 'Webnus-Latest Posts'
		);

		parent::__construct('Webnus_LatestPosts', '', $params);

	}

	public function form($instance){

		$o = new webnus_options();
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
		<label for="<?php echo $this->get_field_id('numberOfPosts') ?>">Number of Posts:</label>
		<input
		type="text"
		class="widefat"
		id="<?php echo $this->get_field_id('numberOfPosts') ?>"
		name="<?php echo $this->get_field_name('numberOfPosts') ?>"
		value="<?php if( isset($numberOfPosts) )  echo esc_attr($numberOfPosts); ?>"
		/>
		</p>
		
		
		<?php 
	}
	
	
	public function widget($args, $instance){
		
		extract($args);
		extract($instance);
		if(!isset($title)) $title='';
		if(!isset($numberOfPosts)) $numberOfPosts=5;
		?>
		<?php echo $before_widget; ?>
		<?php echo $before_title.$title.$after_title; ?>
		<div class="side-list"><ul>
		<?php
		
		$wpbp = new WP_Query(array( 'post_type' => 'post', 'paged'=>1, 'posts_per_page'=>$numberOfPosts, 'order' => 'DESC'));
		
		$temp_out = "";
		if ($wpbp->have_posts()) : while ($wpbp->have_posts()) : $wpbp->the_post();
		?>
		  <li>
		  <a href="<?php the_permalink(); ?>"><?php get_the_image( array( 'meta_key' => array( 'Full', 'Full' ), 'size' => 'blog2_thumb' ) );  ?></a>
		  <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		  <p><?php the_time('M d Y') ?></p>
		  </li>
		<?php
		endwhile; endif;
		
		wp_reset_query();
		?>
		
        
         
        </ul></div>
		
		 
		<?php echo $after_widget; ?><!-- Disclaimer -->
		<?php 
	} 
}

add_action('widgets_init', 'register_webnus_LatestPosts');
function register_webnus_LatestPosts(){
	
	register_widget('Webnus_LatestPosts');
	
}