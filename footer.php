<footer class="footer" data-anime="scroll">
  <div class="container">
    <div class="row">
      <div class="item-rodape">
        <h5 class="title-footer"><?php the_field('title_about', 7); ?></h5>
        <p class="text-footer"><?php the_field('text_about', 7); ?></p>
      </div>

      <div class="item-rodape">
      <?php
        if(has_nav_menu('footer')){
          wp_nav_menu([
            'theme_location' => 'footer',
            'container' => 'nav',
            'container_class' => 'navigation',
            'fallback_cb' => false
          ]);
        }
      ?>
      </div>

      <div class="item-rodape">
        <?php if( have_rows('address-item', 7) ): while ( have_rows('address-item', 7) ) : the_row(); ?>
          <li class="item-address"><i class="<?= get_sub_field('font-awesome', 7); ?>"></i><?= get_sub_field('address-text', 7); ?></li>
        <?php  endwhile; else : endif; ?>
      </div>

      <div class="item-rodape">
        <img src="<?php the_field('logo-viatrop', 7); ?>" alt="<?php the_field('logo-viatrop-alt', 7); ?>">
      </div>
    </div>
    <p class="copy">&#169; Todos os direitos reservados viatrop. 2019</p>
  </div>
</footer>
  <?php wp_footer(); ?>
</body>
</html>