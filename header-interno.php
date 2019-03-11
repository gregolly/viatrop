<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Viatrop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
  <link rel="stylesheet" type="text/css" media="screen" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" media="screen" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <?php wp_head();  ?>
</head>

<body>

<header class="header -interno">
  <div class="container">
    <div class="row justify">
      <div class="logo">
        <a href="">
          <img src="<?php the_field('logo-viatrop', 15); ?>" alt="<?php the_field('logo-viatrop-alt'); ?>">
        </a>
      </div>

      <nav class="navigation">
        <ul class="navbar">
          <li class="item-navbar"><a class="link-navbar" href="">home</a></li>
          <li class="item-navbar"><a class="link-navbar" href="">sobre</a></li>
          <li class="item-navbar"><a class="link-navbar" href="">produtos</a></li>
          <li class="item-navbar"><a class="link-navbar" href="">contato</a></li>
          <li class="item-navbar"><a class="link-navbar" href="">blog</a></li>
        </ul>
        <?php echo do_shortcode('[gtranslate]'); ?>
      </nav>
    </div> 
  </div>  
</header>
  