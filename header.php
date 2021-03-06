<!DOCTYPE html>
<html lang="en-GB">

  <head>
  	<meta name="description" content="<?php bloginfo('description');?>">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="twitter:account_id" content="1486070040" />

	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

	
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">
	<?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>

<div class="container">
    <div class="col-md-12 col-md-offset-2 search-form">
      <?php get_search_form(); ?>
    </div>
</div>

<div class="container opacity">

        <?php adp_header(); ?>

        <?php adp_navigation(); ?>
