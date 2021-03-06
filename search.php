<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage adp
 * @since 
 */

get_header(); ?>


        <div class="row">

		<?php if ( have_posts() ) : ?>

			<header class="col-md-12 col-md-offset-2 page-header">
				<h1 class="page-title text-center"><?php printf( __( 'Search Results for: %s', 'adp' ), get_search_query() ); ?></h1>
			</header>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

		          <article id="post-<?php the_ID(); ?>" <?php post_class( 'post format-standard' ); ?>>
				
					<div class="row">

		          		<header class="post-header col-md-7 col-md-push-6" >
		            		<h1 class="text-center post-title entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		          		</header>

		          	<div id="content-<?php the_ID(); ?>" class="entry-content entry-content col-md-3 col-md-offset-2 col-md-pull-6">
			          <?php if ( has_post_thumbnail() ){
							the_post_thumbnail('thumbnail', array('class' => 'img-responsive'));
						}else{
						
						$category = get_the_category(); 
						?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/category/<?php echo $category[0]->slug; ?>.png" class="img-responsive" width="150" >
						<?php
					}
					?>
			          </div>
		          </div>

		          <div class="clearfix"></div>
		          <div class="row">
		          		<?php article_footer(); ?>
		            </div>
		        </article>

			<?php endwhile; ?>
			<div class="col-md-12 col-sm-offset-2">
            	<?php blog_navigation(); ?>
            </div>

		<?php else : ?>

			<div class="col-md-10 col-md-offset-3">
				<p class="lead">I am sorry, I couldn't find what you are looking for.</p>
				<p class="lead">You can try two things now. One is to search again, the other is to send me a tweet and I will try to help.</p>
				<a href="https://twitter.com/intent/tweet?screen_name=brunoamaral" class="twitter-mention-button" data-size="large" data-related="brunoamaral,SHiFTconf">Tweet to @brunoamaral</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			</div>
		<?php endif; ?>
	</div>
<?php get_footer(); ?>
