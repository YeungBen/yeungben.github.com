<?php 
GLOBAL $webnus_options;

?><section class="footbot">
	<div class="container">
				<div class="eight columns">
		<!-- footer-navigation /end -->
		<?php if( 1 == $webnus_options->webnus_footer_bottom_left() ): ?>
			<div class="footer-navi">			
				<img src="<?php echo $webnus_options->webnus_footer_logo(); ?>" width="65" alt=""> 
			</div>
		<?php
		
		elseif(2 == $webnus_options->webnus_footer_bottom_left()):
		?>
		<div class="footer-navi">
		<?php
		if(has_nav_menu('footer-menu')){
			$menuParameters = array(
				'theme_location'=>'footer-menu',
				'container'       => false,
				'echo'            => false,
				'items_wrap'      => '%3$s',
				'after'      => ' | ',
				'depth'           => 0,
			);

		echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
		}
		echo '</div>';
		elseif(3 == $webnus_options->webnus_footer_bottom_left()):
		?>
		<div class="footer-navi">
		<?php
		echo $webnus_options->webnus_footer_copyright();
		echo '</div>';
		endif;
		?>
		
		</div>
		<div class="eight columns">
		<!-- footer-navigation /end -->
		<?php if( 1 == $webnus_options->webnus_footer_bottom_right() ): ?>
			<img src="<?php echo $webnus_options->webnus_footer_logo(); ?>" width="65" alt=""> 
		<?php
		
		elseif(2 == $webnus_options->webnus_footer_bottom_right()):
		?>
		<div class="footer-navi floatright">
		<?php
		if(has_nav_menu('footer-menu')){
			$menuParameters = array(
				'theme_location'=>'footer-menu',
				'container'       => false,
				'echo'            => false,
				'items_wrap'      => '%3$s',
				'after'      => ' | ',
				'depth'           => 0,
			);

		echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
		}
		echo '</div>';
		elseif(3 == $webnus_options->webnus_footer_bottom_right()):
		?>
		<div class="footer-navi floatright">
		<?php
		echo $webnus_options->webnus_footer_copyright();
		echo '</div>';
		endif;
		?>
		
		</div>
	</div>
</section>