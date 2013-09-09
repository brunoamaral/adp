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
          <header class="col-md-12 col-md-offset-2 post-header" >
            <h1 class="text-center post-title entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          </header>
          
            <?php the_post_thumbnail('featured-image', array('class' => 'img-responsive col-sm-16 col-md-12 col-md-offset-2 wp-post-image')); ?>
          

          <div id="content-<?php the_ID(); ?>" class="col-sm-offset-2 col-sm-12 col-md-10 col-md-offset-3 entry-content">
            <?php the_content(); ?>
          </div>

          <div class="clearfix"></div>
          <div class="row">
              <?php article_footer(); ?>
            </div>
        </article>

        <?php endwhile; ?>
      
      <div class="row">
           
      <?php
        if (is_front_page()){
          ?>
              <div class="col-md-12 col-md-offset-2">
                <?php blog_navigation(); ?>
              </div>
      <?php
        }else{
            ?>
              <div class="col-md-12 col-md-offset-2 blog_navigation">
                <?php
                $prev_post = get_adjacent_post(false, '', true);
                if(!empty($prev_post)) {
                ?> 
                <div class="col-md-7 col-md-offset-1 previous_article">
                  <?php
                  echo '<a class="btn btn-default btn-black" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '"><i class="icon-chevron-left"></i> Older' . '</a>'; }
                  ?>
                </div> 
                <?php
                $next_post = get_adjacent_post(false, '', false);
                if(!empty($next_post)) {
                 ?> 
                <div class="col-md-7 text-right next_article">
                  <?php
                  echo '<a class="btn btn-default btn-black" href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '">Newer <i class="icon-chevron-right"></i>' . '</a>'; 
                  ?>
                </div>
                <?php
                }
                ?>
              </div>
          <?php
          }
          ?>

      </div>
          
          <?php
          // clean up after our query
          wp_reset_postdata(); 
          else:  ?>
          <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
</div>
