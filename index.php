<?Php

get_header(); 

?>

  <body <?php body_class(); ?>>

  	  <div class="container">

        <div class="col-md-6 col-md-offset-5">
        <header id="logo" class="">
          <h1 class="text-center">Technology and Strategic Communication</h1>
        </header>
        </div>

        <div class="col-md-12 col-md-offset-2">
        <nav class="navbar navbarborder" role="navigation">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <div class="container">
                <div class="col-md-8 col-md-offset-5 col-sm-8 col-sm-offset-5">
                <ul class="nav navbar-nav">
                  <li><a href="#">About</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Communication</a></li>
                        <li><a href="#">Web</a></li>
                        <li><a href="#">Business</a></li>
                        <li><a href="#">Geek</a></li>
                      </ul>
                  </li>
                  <li><a href="#">Contact</a></li>
                </ul>
              </div>
          </div>
        </nav>
        </div>


     <?php if (have_posts()) : ?>
               <?php while (have_posts()) : the_post(); ?>    
          <article class="col-md-12 col-md-offset-2 ">
          <header>
            <h1 class="text-center"><?php the_title(); ?></h1>
          </header>
          <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
          <div class="col-sm-14 col-sm-offset-1 col-xs-16">
            <?php the_content(); ?>
          </div>

          <div class="clearfix"></div>
            <footer class="col-sm-16">
            <div class="col-sm-12"><?php the_time('F jS'); ?> <?php the_time('Y'); ?> / in <a href="#"><?php the_category(' '); ?></a></div>
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


	<?php get_footer(); ?>


  </body>
</html>