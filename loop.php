<?php
/**
 * The template for displaying standard post formats.
 * 
 * @package Standard
 * @since 	3.0
 * @version	3.1
 */
?>

<div class="row">
     <?php if (have_posts()) : ?>
               <?php while (have_posts()) : the_post(); ?>    
          <article id="post-<?php the_ID(); ?>" <?php post_class( 'post format-standard' ); ?>>
          <header class="col-sm-12 col-sm-offset-2 post-header" >
            <h1 class="text-center post-title entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          </header>
          <div class="row">
          <?php the_post_thumbnail('full', array('class' => 'img-responsive col-md-12 col-md-offset-2')); ?>
          </div>
          <div class="row">
          <div id="content-<?php the_ID(); ?>" class="col-sm-10 col-sm-offset-3 col-xs-16 entry-content">
            <?php the_content(); ?>
          </div>
          </div>
          <div class="clearfix"></div>
            <footer class="col-sm-12 col-md-offset-2 post-meta">
            <div class="col-sm-12 meta-date-cat"><?php the_time('F j'); ?><sup><?php the_time('S'); ?></sup> <?php the_time('Y'); ?> / in <a href="#"><?php the_category(' '); ?></a></div>
            <div class="col-sm-4 text-right">

                <a type="button" class="dropdown-toggle action like" data-toggle="dropdown">
                   <i class="icon-heart"></i> Like
                </a>
                &nbsp; &nbsp; &nbsp;
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
              </div>

                </footer>
        </article>
            <?php endwhile; ?>
                 <?php endif; ?>
</div>