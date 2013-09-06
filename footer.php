</div>

  <footer id="main" class="">
 <div class="container">

      <div class="row">

      <div class="col-md-9">

          <span class="sprite"><i class="icon-facebook icon-large"></i><a href="https://www.facebook.com/brunoamaral">&nbsp;&nbsp;&nbsp;Facebook</a></span>
          <span class="sprite"><i class="icon-twitter icon-large"></i><a href="https://twitter.com/brunoamaral">&nbsp;&nbsp;&nbsp;Twitter</a></span>  
          <span class="sprite"><i class="icon-google-plus icon-large"></i><a href="https://plus.google.com/103340868014863467719/posts">&nbsp;&nbsp;&nbsp;Google+</a></span>
          <span class="sprite"><i class="icon-linkedin icon-large"></i><a href="http://linkedin.com/in/brunoamaral">&nbsp;&nbsp;&nbsp;Linkedin</a></span>
          <span class="sprite"><i class="icon-rss icon-large"></i><a href="http://www.brunoamaral.eu/feed">&nbsp;&nbsp;&nbsp;RSS Feed</a></span>
      
      </div>
      
        <div class="col-md-7 text-right">
          <p class="muted">&copy; 2013 A Different Perspective</p>
        </div>
      </div>
  </footer>
  </div>
  
    <?php wp_footer(); ?> 

    <script type="text/javascript">
    // fade in and fade out the search form
    jQuery("a.trigger_search").toggle(function () {
      jQuery("form.search-form").fadeIn(400)
      jQuery('input.search-field').focus();
      jQuery(".opacity").fadeTo("slow", 0.4);
      jQuery("header#logo").fadeTo("slow", 0.1);
      
      jQuery(document).click( function(){
        jQuery("form.search-form").fadeOut(400);
        jQuery(".opacity").fadeTo("slow", 1);
        jQuery("header#logo").fadeTo("slow", 1);
      }
        );
    },
    function(){
      jQuery("form.search-form").fadeOut(400);
      jQuery(".opacity").fadeTo("slow", 1);
      jQuery("header#logo").fadeTo("slow", 1);
    }
    );
    </script>

    <?php 
    if ( is_single() ){ ?>
    <script type="text/javascript">
    jQuery("iframe#jetpack_remote_comment").contents().find("head")
      .append($("<link/>",
                { rel: "stylesheet", href: "<?php echo get_stylesheet_directory_uri(); ?>/assets/css/iframe.css", type: "text/css" }));
    </script>
    <?php
    }
    ?>


  </body>
</html>