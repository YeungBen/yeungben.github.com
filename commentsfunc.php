<?php

function webnus_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
<div class="comment-info">	
<?php echo get_avatar( $comment, 40 ); ?>
								<cite>
<?php comment_author_link() ?> Says: 
<span class="comment-data"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F j, Y'); ?> at <?php comment_time('g:i a'); ?></a><?php edit_comment_link('Edit',' | ',''); ?></span>
								</cite>
							</div>
							<div class="comment-text">
				<?php if ($comment->comment_approved == '0') : ?>
					<p><em>Your comment is awaiting moderation.</em></p>
				<?php endif; ?>
				<?php comment_text() ?>
								<div class="reply">
		<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
		 						</div>	
							</div>
<?php
        }?>