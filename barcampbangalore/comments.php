<link rel="alternate" type="application/rss+xml" title="Comment Feed for this post" href="<?php echo get_permalink( $post->ID ); ?>/feed" />
<?php // Do not delete these lines

	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))

		die ('Please do not load this page directly. Thanks!');



	if (!empty($post->post_password)) { // if there's a password

		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie

			?>



			<p class="nocomments">This post is password protected. Enter the password to view comments.<p>



			<?php

			return;

		}

	}



	/* This variable is for alternating comment background */

	$oddcomment = 'alt';

?>



<!-- You can start editing here. -->



<div id="commentblock">

<?php if ($comments) : ?>

	<p id="comments"><b><?php comments_number('No comments', '1 comment', '% comments' );?> to &#8220;<?php the_title(); ?>&#8221;</b></p>



	<ol class="commentlist">

<?php // print_r($comments); ?>

	<?php foreach ($comments as $comment) : ?>



		<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">

<?php twittar("45", "", "", "myimg", 1, "R"); ?>			

 <!-- <?php echo get_avatar( get_comment_author_email(), '16' ); ?> --> <?php echo t_authlink($comment->comment_author); ?>

<?php //comment_author_link() ?> on

			<?php if ($comment->comment_approved == '0') : ?>

			<em>Your comment is awaiting moderation.</em>

			<?php endif; ?>

			<?php comment_date('F jS, Y') ?> <?php comment_time() ?> <?php edit_comment_link('Edit','',''); ?>



			<div class="commenttext">

			<?php comment_text() ?>

			</div>



		</li>



	<?php /* Changes every other comment to a different class */

		if ('alt' == $oddcomment) $oddcomment = '';

		else $oddcomment = 'alt';

	?>



	<?php endforeach; /* end for each comment */ ?>



	</ol>



 <?php else : // this is displayed if there are no comments so far ?>



	<?php if ('open' == $post->comment_status) : ?>

		<!-- If comments are open, but there are no comments. -->



	 <?php else : // comments are closed ?>

		<!-- If comments are closed. -->

		<p class="nocomments">Comments are closed.</p></div>



	<?php endif; ?>

<?php endif; ?>





<?php if ('open' == $post->comment_status) : ?>



<p id="respond"><b>Leave a Comment</b></p>



<?php if ( get_option('comment_registration') && !$user_ID ) : ?>

<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p></div>

<?php else : ?>



<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">



<?php if ( $user_ID ) : ?>



<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. (<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout</a>)</p>



<?php else : ?>



<p><label for="author">Name <?php if ($req) echo "(required)"; ?></label><br />

<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="40" tabindex="1" /></p>



<p><label for="email">Email Address<?php if ($req) echo "(required)"; ?></label><br />

<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="40" tabindex="2" /></p>



<p><label for="url">Website</label><br />

<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="40" tabindex="3" /></p>



<?php endif; ?>



<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->



<p><textarea name="comment" id="comment" cols="50" rows="10" tabindex="4"></textarea></p>



<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />

<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>



<?php do_action('comment_form', $post->ID); ?>



</form>

</div>



<?php endif; // If registration required and not logged in ?>



<?php endif; // if you delete this the sky will fall on your head ?>

