<?php
function viatrop_setup() {

  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');

  register_nav_menu('main-menu', 'Main Menu');
  register_nav_menu('footer-menu', 'Footer Menu');

  load_theme_textdomain( 'viatrop', get_template_directory() . '/languages' );

}

add_action('after_setup_theme', 'viatrop_setup');

remove_action('wp_head', 'wp_generator');