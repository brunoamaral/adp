<!DOCTYPE html>
<html lang="en-GB">

  <head>
  	<meta name="description" content="<?php bloginfo('description');?>">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">
	<?php wp_head(); ?>
  </head>

