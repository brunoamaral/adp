<?Php get_header(); ?>

  	<div class="container">

        <?php adp_header(); ?>

        <?php adp_navigation(); ?>

        <?php get_template_part( 'loop', get_post_format() ); ?>
      
    </div>

<?php get_footer(); ?>