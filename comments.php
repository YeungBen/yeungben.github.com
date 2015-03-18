<?php 
GLOBAL $webnus_options;
include_once (dirname(__FILE__) . '//commentsfunc.php');
?><div class="columns">
<div class="commentbox">
<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>
         <div class="post-bottom-section">
<div class="right">
<?php if ( have_comments() ) : ?>
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
	<ol class="commentlist">
	<?php wp_list_comments('callback=webnus_comments'); ?>
	</ol>
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>
	<?php if ( $webnus_options->webnus_allow_comments_on_page() == 1) : ?>
	 <?php else : // comments are closed ?>
		<p class="nocomments">Comments are closed.</p>
	<?php 
	
	
	endif; ?>
<?php endif; ?>
</div>
</div>
<?php
if ( $webnus_options->webnus_allow_comments_on_page() == 1)
comment_form(); ?>
</div>
</div>