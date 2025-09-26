<?php
function viatrop_setup() {

  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');

  register_nav_menu('main-menu', 'Main Menu');
  register_nav_menu('footer-menu', 'Footer Menu');

}

add_action('after_setup_theme', 'viatrop_setup');

remove_action('wp_head', 'wp_generator');