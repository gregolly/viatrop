<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="item-rodape">
        <h5 class="title-footer">Sobre</h5>
        <p class="text-footer">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
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
      <li class="item-address"><i class="fas fa-map-marker-alt"></i>Endereço, n 52 - n, bairro - centro</li>
      <li class="item-address"><i class="fas fa-phone"></i><span>(31)</span> 3326-1209 - 9999-000</li>
      <li class="item-address"><i class="far fa-envelope"></i>gregollyff@hotmail.com</li>
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