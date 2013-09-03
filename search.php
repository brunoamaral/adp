<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage adp
 * @since 
 */

get_header(); ?>


        <?php adp_header(); ?>

        <?php adp_navigation(); ?>

        <div class="row">

		<?php if ( have_posts() ) : ?>

			<header class="col-sm-12 col-sm-offset-2 page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'adp' ), get_search_query() ); ?></h1>
			</header>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

		          <article id="post-<?php the_ID(); ?>" <?php post_class( 'post format-standard' ); ?>>
		          <header class="col-sm-12 col-sm-offset-2 post-header" >
		            <h1 class="text-center post-title entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		          </header>
		          
		          <?php if ( has_post_thumbnail() ){
						the_post_thumbnail('thumbnail', array('class' => 'img-responsive col-sm-4 col-sm-offset-2 col-xs-15'));
					}else{
					?>
					<img src="http://placekitten.com/300/300" class="img-responsive col-sm-4 col-sm-offset-2 col-xs-15">
					<?php
				}
				?>
		          
		          <div id="content-<?php the_ID(); ?>" class="col-sm-8 col-md-8 col-xs-15 entry-content">
		            <?php the_excerpt(); ?>
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
			<div class="col-md-12 col-sm-offset-2">
            	<?php blog_navigation(); ?>
            </div>

		<?php else : ?>

			<header class="col-sm-10 col-sm-offset-3 page-header">
				<h1 class="page-title"><?php printf( __( 'Nothing found for: %s', 'adp' ), get_search_query() ); ?></h1>
			</header>

			<div class="col-md-10 col-md-offset-3">
				<p class="lead">I am sorry, I couldn't find what you are looking for.</p>
				<p class="lead">You can try two things now. One is to search again, the other is to send me a tweet and I will try to help.</p>
				<a href="https://twitter.com/intent/tweet?screen_name=brunoamaral" class="twitter-mention-button" data-size="large" data-related="brunoamaral,SHiFTconf">Tweet to @brunoamaral</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			</div>
		<?php endif; ?>
	</div>
<?php get_footer(); ?>