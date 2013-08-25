<?php
/**
 * The template for displaying comments, pings, and trackbacks on posts, pages, and attachments.
 * 
 * @package adp
 * @since 	3.1
 * @version	3.0
 */
?>
<?php 
	if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
		die ( __( 'This file cannot be loaded directly.', 'standard' ) );
	} // end if
?>
<div class="col-md-12 col-md-offset-2">
<?php if ( post_password_required() ) { ?>
	<div id="comments">
		<h3 class="nopassword">This post is password protected. Enter the password to view comments.</h3>
	</div><!-- #comments -->
	<?php return; ?>
<?php } // end if	?>

<?php if ( have_comments() ) { ?>

	<?php if ( ! empty( $comments_by_type['comment'] ) ) { ?>
		<div id="comments" class="">
			<h3><?php comments_number( 'No coments', 'One comment', '% comments' );?> to <em><?php the_title(); ?></em></h3>
			<ol class="commentlist">
				<?php wp_list_comments( 'avatar_size=50&callback=adp_custom_comment&type=comment' ); ?>
			</ol>    
			<div class="comment-navigation ">
				<div class="comment-prev-nav">
					<?php previous_comments_link( '<i class="icon-chevron-left"></i>' . 'Previous Comments' ); ?>
				</div>
				<div class="comment-next-nav">
					<?php next_comments_link( 'Next Comments' . '<i class="icon-chevron-right"></i>'); ?>
				</div>
			</div>
		</div><!-- /#comments -->
	<?php } // end if ?>

	<?php if ( ! empty( $comments_by_type['pings'] ) ) { ?>
		<div id="pings">
			<h3> Trackbacks and Pingbacks: </h3>
			<ol class="pinglist">
				<?php wp_list_comments( 'type=pings&callback=list_pings&per_page=-1' ); ?>
			</ol>
		</div><!-- /#pings -->
	<?php } // end if ?>	
	
<?php } else { ?>

	<?php if( comments_open() ) { ?>
		<div id="no-comments" class="">
			<p class="title">No Comments</p>
			<p>Be the first to start the conversation.</p>
		</div><!-- /#no-comments -->
	<?php } // end if ?>
	
<?php } // end if ?>
</div>