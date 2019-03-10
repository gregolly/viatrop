<?php get_header(); 
//Template name: Home
?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<section class="slide">
  <div class="item-slide">
    <img src="<?= get_template_directory_uri() ?>/img/img2.jpg" alt="" class="item-slide-img">
    <div class="absolute">
      <h2 class="item-slide-title">titulo</h2>
      <p class="item-slide-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
    </div>
  </div>
</section>

<main class="main">
  <div class="container">
    <div class="row">
      <div class="description">
        <h1 class="title_description">titulo</h1>
        <h3 class="subtitle_description">subtitulo</h3>
        <p class="text_description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </div>

      <div class="main_images">
        <img class="main_item_images" src="<?= get_template_directory_uri() ?>/img/plants.jpg" alt="">
        <img class="main_item_images -item-absolute" src="<?= get_template_directory_uri() ?>/img/plants.jpg" alt="">
      </div>
    </div>
  </div>
</main>

<section class="address">
  <div class="container">
    <div class="row around">
      <li class="item-address"><i class="fas fa-map-marker-alt"></i>Endereço, n 52 - n, bairro - centro</li>
      <li class="item-address"><i class="fas fa-phone"></i><span>(31)</span> 3326-1209 - 9999-000</li>
      <li class="item-address"><i class="far fa-envelope"></i>gregollyff@hotmail.com</li>
    </div>
  </div>
</section>

<section class="stuff">
  <div class="container">
    <header>qualidades</header>
    <div class="row">
      <div class="stuff-item">
        <img class="stuff-item-img" src="<?= get_template_directory_uri() ?>/img/carrying.png" alt="">
        <h4 class="stuff-item-subtitle">titulo</h4>
        <p class="stuff-item-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </div>

      <div class="stuff-item">
        <img class="stuff-item-img" src="<?= get_template_directory_uri() ?>/img/target.png" alt="">
        <h4 class="stuff-item-subtitle">titulo</h4>
        <p class="stuff-item-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </div>

      <div class="stuff-item">
        <img class="stuff-item-img" src="<?= get_template_directory_uri() ?>/img/idea.png" alt="">
        <h4 class="stuff-item-subtitle">titulo</h4>
        <p class="stuff-item-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </div>
    </div>
  </div>
</section>

<section class="banner">
  <div class="overlay"></div>
  <blockquote>"Todos os seus sonhos podem se tornar realidade  se você tem coragem para persegui-los"</blockquote>
  <cite>walt disney</cite>
</section>

<section class="doubt">
  <div class="container">
    <h5>Perguntas Frequentes!</h5>
    <div class="item-doubt">
      <a href="">Qual a melhor de forma de fazer uma importação?</a>
      <div class="item-ask">
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </div>
    </div>
  </div>
</section>

<section class="map">
 
    <img width="100%" height="500px" src="<?= get_template_directory_uri(); ?>/img/google.png" alt="Google Map of Albany, NY">

</section>

<section class="contact">
  <div class="contact-container">
    <?php the_content(); ?>
  </div>
</section>



<?php endwhile; else: endif; ?>
<?php get_footer(); ?>