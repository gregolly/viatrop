<?php get_header(); 
//Template name: Home
?>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<section class="slide">
<?php if( have_rows('slide') ): while ( have_rows('slide') ) : the_row(); ?>
  <div class="item-slide">
      <img src="<?php the_sub_field('slide-img'); ?>" alt="<?php the_sub_field('slide-img-alt'); ?>" class="item-slide-img">
    <div class="absolute">
      <h2 class="item-slide-title"><?php the_sub_field('title_slide'); ?></h2>
      <p class="item-slide-text"><?php the_sub_field('text_slide'); ?></p>
    </div>
  </div>
<?php  endwhile; else : endif; ?>  
</section>

<main class="main" id="sobre">
  <div class="container">
    <div class="row">
      <div class="description">
        <h1 class="title_description"><?php the_field('title_description'); ?></h1>
        <h2 class="subtitle_description"><?php the_field('subtitle_description'); ?></h2>
        <p class="text_description"><?php the_field('text_description'); ?></p>
      </div>

      <div class="main_images">
        <img class="main_item_images" src="<?php the_field('img-main'); ?>" alt="<?php the_field('img-main-alt'); ?>">
        <img class="main_item_images -item-absolute" src="<?php the_field('img-main-absolute'); ?>" alt="<?php the_field('img-main-absolute-alt'); ?>">
      </div>
    </div>
  </div>
</main>

<section class="address">
  <div class="container">
    <div class="row around">
  <?php if( have_rows('address-item') ): while ( have_rows('address-item') ) : the_row(); ?>
      <li class="item-address"><i class="<?php the_sub_field('font-awesome'); ?>"></i><?php the_sub_field('address-text'); ?></li>
  <?php  endwhile; else : endif; ?>
    </div>
  </div>
</section>

<section class="stuff">
  <div class="container">
    <header><?php the_field('title_quality'); ?></header>
    <div class="row">
    <?php if( have_rows('stuffs') ): while ( have_rows('stuffs') ) : the_row(); ?>
      <div class="stuff-item">
        <img class="stuff-item-img" src="<?php the_sub_field('img-stuff'); ?>" alt="<?php the_sub_field('img-stuff-alt'); ?>">
        <h4 class="stuff-item-subtitle"><?php the_sub_field('title-stuff'); ?></h4>
        <p class="stuff-item-text"><?php the_sub_field('text-stuff'); ?></p>
      </div>
    <?php  endwhile; else : endif; ?>  
    </div>
  </div>
</section>

<style>
.banner{
  background-image: url("<?php the_field('background-parallax'); ?>");
  background-attachment: fixed;
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 350px;
  color: #fff;
  position: relative;
}
</style>
<section class="banner">
  <div class="overlay"></div>
  <blockquote><?php the_field('quote'); ?></blockquote>
  <cite><?php the_field('cite'); ?></cite>
</section>

<section class="doubt">
  <div class="container">
    <h5><?php the_field('title_quotes'); ?></h5>
    <div class="item-doubt">
    <?php if( have_rows('doubt') ): while ( have_rows('doubt') ) : the_row(); ?>
      <a href="#"><?php the_sub_field('doubt_title'); ?></a>
      <div class="item-ask">
        <p><?php the_sub_field('doubt_content'); ?></p>
      </div>
    <?php  endwhile; else : endif; ?>    
    </div>
  </div>
  <a class="btn-action" href="#contato"><?php the_field('doubt_contato'); ?></a>
</section>

<section class="map">
  <a href="<?php the_field('map-url'); ?>">
    <img width="100%" height="500px" src="<?php the_field('map'); ?>" alt="<?php the_field('map-alt'); ?>">
  </a>
</section>

<section class="contact" id="contato">
  <div class="contact-container">
    <?php the_content(); ?>
  </div>
</section>



<?php endwhile; else: endif; ?>
<?php get_footer(); ?>