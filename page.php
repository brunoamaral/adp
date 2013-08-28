<?php
/**
 * The template for displaying pages.
 * 
 * @package adp
 * @since 	3.0
 * @version	3.1
 */
?>
<?Php get_header(); ?>

  <body <?php body_class(); ?>>

    <div class="container">

        <?php adp_header(); ?>

        <?php adp_navigation(); ?>

<div class="row">
     <?php if (have_posts()) : ?>
               <?php while (have_posts()) : the_post(); ?>    
          <article id="post-<?php the_ID(); ?>" <?php post_class( 'post format-standard' ); ?>>
          <header class="col-sm-12 col-sm-offset-2 post-header" >
            <h1 class="text-center post-title entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          </header>
          
          <div class="row">
          <div id="content-<?php the_ID(); ?>" class="col-sm-10 col-sm-offset-3 entry-content">
            <?php the_content(); ?>
          </div>
          </div>

          <footer class="col-md-12 col-md-offset-2 row post-meta">

            </footer>

        </article>
            <?php endwhile; ?>
        <?php endif; ?>
</div>

    
    </div>

    <?php get_footer(); ?>

  </body>
</html>