<?php
/**
 * The template for displaying a single post and its related content as well as author boxes. Uses
 * get_post_format to render the appropriate template based on the post's format.
 *
 * @package adp
 * @since 	3.0
 * @version	3.1
 */
?>
<?php get_header(); ?>

  	  	<?php adp_header(); ?>

        <?php adp_navigation(); ?>

        <?php get_template_part( 'loop', get_post_format() ); ?>

      	<div class="col-md-10 col-md-offset-3">
      		<?php 
            $args = array('id_submit' => 'custom_submit' );
            comment_form($args); 
          ?>
        </div>

       	 <?php comments_template( '', true ); ?>	
      
<?php get_footer(); ?>