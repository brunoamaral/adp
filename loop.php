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
          
            <?php the_post_thumbnail('full', array('class' => 'img-responsive col-md-12 col-md-offset-2 col-xs-15')); ?>
          

          <div id="content-<?php the_ID(); ?>" class="col-sm-11 col-sm-offset-2 col-md-10 col-md-offset-3 col-xs-15 entry-content">
            <?php the_content(); ?>
          </div>

          <div class="clearfix"></div>
          <div class="row">
          <footer class="col-sm-12 col-sm-offset-2 post-meta">

            <div class="col-sm-8 col-sm-offset-1 col-xs-8 meta-date-cat"><?php the_time('F j'); ?><sup><?php the_time('S'); ?></sup> <?php the_time('Y'); ?> / in <?php the_category(' '); ?></div>
            <div class="col-sm-6 col-sm-offset-0 col-xs-6 text-right article_actions">

              <a class="action" href="<?php the_permalink(); ?>">
                <i class="icon-comment"></i> <?php comments_number('0', '1', '%'); ?>
              </a>  
                
              <a type="button" class="dropdown-toggle action like" data-toggle="dropdown">
                   <i class="icon-heart"></i> Like 
              </a>

              <a type="button" class="dropdown-toggle action share" data-toggle="dropdown">
                <i class="icon-share-alt"></i> Share
              </a>

              <div class="dropdown-menu" role="menu">
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

              </div>
            </footer>
            </div>
        </article>

        <?php endwhile; ?>
      
      <div class="row">
           
      <?php
        if (is_front_page()){
      ?> 

                <div class="col-md-12 col-sm-offset-2 blog_navigation">
                  <div class="pull-right"><?php previous_posts_link('Newer &raquo;') ?></div>
                  <div class="pull-left"><?php next_posts_link('&laquo; Older','') ?></div>
                </div>
              
          <?php
          }else{
            ?>
              <div class="col-sm-12 col-sm-offset-2">
                <?php
                $prev_post = get_adjacent_post(false, '', true);
                if(!empty($prev_post)) {
                ?> 
                <div class="col-md-7 col-md-offset-1 previous_article">
                  <?php
                  echo '<a class="btn btn-success" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '">Older' . '</a>'; }
                  ?>
                </div> 
                <?php
                $next_post = get_adjacent_post(false, '', false);
                if(!empty($next_post)) {
                 ?> 
                <div class="col-md-7 text-right next_article">
                  <?php
                  echo '<a class="btn btn-success" href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '">Newer' . '</a>'; 
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
