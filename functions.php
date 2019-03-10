<?php
add_action('wp_enqueue_scripts', 'viatrop_tema_css');

function viatrop_tema_css() {
  wp_enqueue_style('normalize-viatrop-tema', get_stylesheet_directory_uri() . '/css/normalize.css');
  wp_enqueue_style('reset-viatrop-tema', get_stylesheet_directory_uri() . '/css/reset.css');
  wp_enqueue_style('css-viatrop-tema', get_stylesheet_directory_uri() . '/style.css');
}

//registrar menu
add_action('init', 'viatrop_menu_tema_init');

function viatrop_menu_tema_init()
{
	register_nav_menu('menu-viatrop-main', 'Menu Principal');
	//register_nav_menu('twmenu-terzi', 'Menu footer');
}

add_theme_support( 'post-formats', [ 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'] );