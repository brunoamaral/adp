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
                            
                            <?php 
                                $args = array(
                                  'depth'    => 0,
                                  'container'  => false,
                                  'menu_class'   => 'nav navbar-nav',
                                  'walker'   => new BootstrapNavMenuWalker()
                                );
                         
                                wp_nav_menu($args);
                             ?>

              </div>
          </div>
        </nav>
        </div>


          <?php get_template_part( 'loop', get_post_format() ); ?>


      </div>


	<?php get_footer(); ?>


  </body>
</html>