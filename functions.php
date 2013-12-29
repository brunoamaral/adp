<?php

// configure theme
add_theme_support( 'post-thumbnails' ); 
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'social-links', array(
    'facebook', 'twitter', 'linkedin', 'tumblr', 'pocket', 'google-plus', 'email'
) );
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

if ( ! isset( $content_width ) ) $content_width = 590;

add_filter( 'embed_defaults', 'adp_embed_size' );

function adp_embed_size()
{
    // adjust these pixel values to your needs
    return array( 'width' => 590, 'height' => 480 );
}

add_image_size( 'featured-image', 700, 'auto', false ); 


add_action('wp_enqueue_script','register_scripts');

function register_my_scripts(){
	wp_enqueue_script('jquery');
}

function adp_scripts(){
wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array(), '3.0', true );
wp_enqueue_script('respond', get_stylesheet_directory_uri() . '/assets/js/respond.min.js', array(), '', true );
}
add_action( 'wp_enqueue_scripts', 'adp_scripts' );

function tweakjp_custom_twitter_site( $og_tags ) {
	$og_tags['twitter:site'] = '@brunoamaral';
	return $og_tags;
}
add_filter( 'jetpack_open_graph_tags', 'tweakjp_custom_twitter_site', 11 );


// navigation menu
function search_trigger(){
	?><a class="trigger_search" href="#"><i class="icon-search"></i> Search</a><?php
}


register_nav_menu( 'primary', 'Primary Menu' );

/**
 * Extended Walker class for use with the
 * Twitter Bootstrap toolkit Dropdown menus in Wordpress.
 * Edited to support n-levels submenu.
 * @author johnmegahan https://gist.github.com/1597994, Emanuele 'Tex' Tessore https://gist.github.com/3765640
 */
class BootstrapNavMenuWalker extends Walker_Nav_Menu {


	function start_lvl( &$output, $depth ) {

		$indent = str_repeat( "\t", $depth );
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output	   .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";

	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {


		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$li_attributes = '';
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		// managing divider: add divider class to an element to get a divider before it.
		$divider_class_position = array_search('divider', $classes);
		if($divider_class_position !== false){
			$output .= "<li class=\"divider\"></li>\n";
			unset($classes[$divider_class_position]);
		}
		
		$classes[] = ($args->has_children) ? 'dropdown' : '';
		$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
		$classes[] = 'menu-item-' . $item->ID;
		if($depth && $args->has_children){
			$classes[] = 'dropdown-submenu';
		}


		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ($args->has_children) 	    ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ($depth == 0 && $args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
		$item_output .= $args->after;


		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	

	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		//v($element);
		if ( !$element )
			return;

		$id_field = $this->db_fields['id'];

		//display this element
		if ( is_array( $args[0] ) )
			$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
		else if ( is_object( $args[0] ) )
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'start_el'), $cb_args);

		$id = $element->$id_field;

		// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

			foreach( $children_elements[ $id ] as $child ){

				if ( !isset($newlevel) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
			unset( $children_elements[ $id ] );
		}

		if ( isset($newlevel) && $newlevel ){
			//end the child delimiter
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
		}

		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'end_el'), $cb_args);

	}

}

function adp_header(){
	?>

    	<header id="logo" class="col-md-16">
        	<h1 class="text-center"><a href="<?php bloginfo('wpurl'); ?>">Technology and Strategic Communication</a></h1>
		</header>

	<?php
}

function adp_navigation(){
	?>
	<div class="row">
	        <nav class="navbar navbarborder col-md-12 col-md-offset-2 navbar_fixheight" role="navigation">

       	 	<div class="visible-xs col-xs-4 mobilesearch"><?php search_trigger(); ?></div>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <i class="icon-reorder icon-large"></i>
            </button>
            	<div class="collapse navbar-collapse navbar-ex1-collapse">
              		<div class="col-sm-8 col-sm-offset-4">

                            <?php 
                                $args = array(
                                  'depth'      => 0,
                                  'container'  => false,
                                  'menu_class' => 'nav nav-justified',
                                  'walker'     => new BootstrapNavMenuWalker()
                                );
                         
                                wp_nav_menu($args);
                             ?>

          			</div>
     			</div>
        	</nav>
	</div>
        <?php
}

// COMMENTS

function adp_custom_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>

	<li <?php comment_class( 'clearfix' ); ?> id="li-comment-<?php comment_ID(); ?>">

		<div class="comment-container clearfix">

			<?php if ( "comment" == get_comment_type() ) { ?>
				<div class="avatar-holder">
					<?php echo get_avatar( get_comment_author_email(), '50' ); ?>
				</div><!-- /.avatar-holder -->
			<?php } // end if ?>

			<div class="comment-entry"	id="comment-<?php comment_ID(); ?>">

				<div class="comment-head">
					<span class="name">
						<?php if( '' == get_comment_author_url() ) { ?>
							<?php comment_author(); ?>
						<?php } else { ?>
							<a href="<?php comment_author_url(); ?>" target="_blank"><?php comment_author(); ?></a>
						<?php } // end if/else ?>
					</span>
					<?php if ( get_comment_type() == "comment" ) { ?>
						<span class="date"><a href="<?php echo get_comment_link(); ?>" title="<?php esc_attr_e( 'Permalink', 'standard'); ?>"><?php printf( __( '%1$s at %2$s', '_s' ), get_comment_date( get_option( 'date_format' ) ), get_comment_time( get_option( 'time_format' ) ) ); ?></a></span>
						<span class="edit"><?php edit_comment_link( __( 'Edit', 'standard' ), '', '' ); ?></span>
					<?php } // end if ?>
				</div><!-- /.comment-head -->

				<?php if ( '0' == $comment->comment_approved ) { ?>
					<span class='unapproved label warning'>
						Your comment will appear after being approved.
					</span>
				<?php } // end if ?>

				<div class="comment-text">
					<?php comment_text(); ?>
				</div><!-- /.comment-text -->

				<div class="reply clearfix">
					<?php
						comment_reply_link(
							array_merge(
								$args,
								array(
									'depth' 		=> $depth,
									'max_depth' 	=> $args['max_depth'],
									'reply_text' 	=> __( 'Reply', 'standard')
								)
							)
						);
						?>
				</div><!-- /.reply -->

			</div><!-- /.comment-entry -->
		</div><!-- /comment-container -->
<?php } // end adp_custom_comment


function list_pings( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
	<li id="comment-<?php comment_ID(); ?>">
		<span class="author">
			<?php comment_author_link(); ?>
		</span> -
		<span class="date">
			<?php echo get_comment_date( get_option( 'date_format' ) ); ?>
		</span>
		<span class="pingcontent">
			<?php comment_text(); ?>
		</span>
	</li>
<?php } // end list_pings

// add google analytics
function adp_google_analytics(){
	?>
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-10997142-1']);
		_gaq.push(['_trackPageview']);
	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  	})();
	</script>
	<?php
}
add_action('wp_footer', 'adp_google_analytics');

// Social links powered by jetpack plugin
// reference : http://jetpack.me/2013/06/10/moving-sharing-icons/ 

function jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display',19 );
    remove_filter( 'the_excerpt', 'sharing_display',19 );

    if (class_exists('Jetpack_Likes') ) {
    remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
	}
}

add_action( 'loop_start', 'jptweak_remove_share' );

add_filter('previous_posts_link_attributes', 'sdac_next_posts_likn_attributes');
add_filter('next_posts_link_attributes', 'sdac_next_posts_likn_attributes');
function sdac_next_posts_likn_attributes(){
	return 'class="btn btn-default"';
}

function blog_navigation(){
	?>
        	<div class="pull-right"><?php previous_posts_link('Newer <i class="icon-chevron-right"></i>') ?></div>
        	<div class="pull-left"><?php next_posts_link('<i class="icon-chevron-left"></i> Older','') ?></div>
	<?php
}

// add featured image to rss feed

function featured_image_in_feed( $content ) {
    global $post;
    if( is_feed() ) {
        if ( has_post_thumbnail( $post->ID ) ){
            $output = get_the_post_thumbnail( $post->ID, 'featured-image');
            $content = $output . $content;
        }
    }
    return $content;
}
add_filter( 'the_content_feed', 'featured_image_in_feed' );

function article_footer(){
	global $post;
	?>

        <footer class="col-md-12 col-md-offset-2 col-xs-16 post-meta">

            <div class="col-md-8 col-md-offset-1 col-xs-8 meta-date-cat"><?php the_time('F j'); ?><sup><?php the_time('S'); ?></sup> <?php the_time('Y'); ?> / in <?php the_category(' '); ?></div>
            <div class="col-md-6 col-md-offset-0 col-xs-6 text-right article_actions">
 			<?php 
          		$meta_type = 'post';
                $object_id = $post->ID;
                $meta_key = 'sharing_disabled';
                $sharing_disabled = get_metadata($meta_type, $object_id, $meta_key, $single);
                if ($sharing_disabled[0] != 1) {
            ?> 
              <a class="action" href="<?php the_permalink(); ?>#comments">
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
			<?php } ?>

            </div>
        </footer>
            <?php

}

?>
