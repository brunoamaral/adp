<?php

// navigation menu
register_nav_menu( 'primary', 'Primary Menu' );

$config_navigation = array(
	'theme_location'  => '',
	'menu'            => '',
	'container'       => 'ul',
	'container_class' => 'nav navbar-nav',
	'container_id'    => '',
	'menu_class'      => 'menu',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<li>"%1$s" class="%2$s">%3$s</li>',
	'depth'           => 0,
	'walker'          => '');


?>