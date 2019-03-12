<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="item-rodape">
        <h5 class="title-footer"><?php the_field('title_about'); ?></h5>
        <p class="text-footer"><?php the_field('text_about'); ?></p>
      </div>

      <div class="item-rodape">
        <nav class="navigation">
          <ul class="navbar">
            <li class="item-navbar"><a class="link-navbar" href="">home</a></li>
            <li class="item-navbar"><a class="link-navbar" href="">sobre</a></li>
            <li class="item-navbar"><a class="link-navbar" href="">produtos</a></li>
            <li class="item-navbar"><a class="link-navbar" href="">contato</a></li>
            <li class="item-navbar"><a class="link-navbar" href="">blog</a></li>
          </ul>
        </nav>
      </div>

      <div class="item-rodape">
        <?php if( have_rows('address-item') ): while ( have_rows('address-item') ) : the_row(); ?>
          <li class="item-address"><i class="<?php the_sub_field('font-awesome'); ?>"></i><?php the_sub_field('address-text'); ?></li>
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