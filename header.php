<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <?php wp_head();  ?>
</head>

<body>

<header class="header">
  <div class="container">
    <div class="row justify">
      <div class="logo animated slideInDown">
        <a href="">
          <img src="<?php the_field('logo-viatrop'); ?>" alt="<?php the_field('logo-viatrop-alt'); ?>">
        </a>
      </div>
   
        <i class="fas fa-bars bar-menu"></i>
     
      <?php
        if(has_nav_menu('primary')){
          wp_nav_menu([
            'theme_location' => 'primary',
            'container' => 'nav',
            'container_class' => 'navigation animated slideInDown',
            'fallback_cb' => false
          ]);
        }
      ?>
    </div> 
  </div>  
</header>
  