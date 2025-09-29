<?php
function viatrop_enqueue_styles() {
  wp_enqueue_style('main-style', get_stylesheet_uri());
  wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css', array(), '5.3.8', 'all' );
}

add_action('wp_enqueue_scripts', 'viatrop_enqueue_styles');

function viatrop_enqueue_scripts() {
  wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js', array(), null, true );
  wp_enqueue_script( 'shrink-menu', get_template_directory_uri() . '/js/shrink.js', array(), null, true );
  wp_enqueue_script( 'search-filter', get_template_directory_uri() . '/js/product-search-input.js', array('jquery'), null, true );
  wp_enqueue_script( 'tab-filter', get_template_directory_uri() . '/js/tab.js', array('jquery'), null, true );
}

add_action( 'wp_enqueue_scripts', 'viatrop_enqueue_scripts' );