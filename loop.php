<?php
/**
 * The template for displaying standard post formats.
 * 
 * @package adp
 * @since 	3.0
 * @version	3.1
 */
?>

<div class="row">
     <?php if (have_posts()) : 
              // set the "paged" parameter (use 'page' if the query is on a static front page)
              $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
              while (have_posts()) : the_post(); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class( 'post format-standard' ); ?>>
          <header class="col-sm-12 col-sm-offset-2 post-header" >
            <h1 class="text-center post-title entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          </header>
          
            <?php the_post_thumbnail('full', array('class' => 'img-responsive col-sm-14 col-sm-offset-1 col-xs-15')); ?>
          

          <div id="content-<?php the_ID(); ?>" class="col-sm-10 col-sm-offset-3 col-md-10 col-md-offset-3 col-xs-15 entry-content">
            <?php the_content(); ?>
          </div>

          <div class="clearfix"></div>
          <div class="row">
          <footer class="col-sm-12 col-sm-offset-2 post-meta">
            <div class="col-sm-9 col-xs-8 meta-date-cat"><?php the_time('F j'); ?><sup><?php the_time('S'); ?></sup> <?php the_time('Y'); ?> / in <?php the_category(' '); ?></div>
            <div class="col-sm-7 col-xs-6 text-right pull-right">

              <a class="action" href="<?php the_permalink(); ?>">
                <i class="icon-comment"></i> <?php comments_number('0'); ?>
              </a>  
                
              <a type="button" class="dropdown-toggle action like" data-toggle="dropdown">
                   <i class="icon-heart"></i> Like 
              </a>
                
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">wordpress</a></li>
                <li><a href="#">facebook</a></li>
                <li><a href="#">google+</a></li>
              </ul>

              <a type="button" class="dropdown-toggle action share" data-toggle="dropdown">
                <i class="icon-share-alt"></i> Share
              </a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">twitter</a></li>
                <li><a href="#">facebook</a></li>
                <li><a href="#">google+</a></li>
              </ul>
            

                <?php
                if ( function_exists( 'sharing_display' ) ) {
                    sharing_display( '', true );
                }
                 
                if ( class_exists( 'Jetpack_Likes' ) ) {
                    $custom_likes = new Jetpack_Likes;
                    echo $custom_likes->post_likes( '' );
                }
                ?>


              </div>
            </footer>
            </div>
        </article>

        <?php
           endwhile;
           
          // usage with max_num_pages
          next_posts_link( 'Older Entries', $the_query->max_num_pages );
          previous_posts_link( 'Newer Entries' );

          // clean up after our query
          wp_reset_postdata(); 
          else:  ?>
          <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
</div>
