<?Php get_header(); ?>



        <?php adp_header(); ?>

        <?php adp_navigation(); ?>

        <?php get_template_part( 'loop', get_post_format() ); ?>
      


<?php get_footer(); ?>