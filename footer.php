<footer class="text-white" style="background-color: #115e59;">
  <div class="container py-5">
    <div class="row">
      
      <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
        <?php
            $logo_id = get_theme_mod('footer_logo');
            $default_logo_url = 'https://d64gsuwffb70l.cloudfront.net/68cbee07cba8a527b3a2be01_1758196186301_e038ff4e.png';
            $logo_url = $logo_id ? wp_get_attachment_image_url($logo_id, 'full') : $default_logo_url;
            if ($logo_url) :
        ?>
            <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="mb-4" style="height: 3rem;">
        <?php endif; ?>

        <p class="text-white mb-4" style="max-width: 28rem;">
            <?php echo wp_kses_post(get_theme_mod('footer_descricao', 'Conectando as melhores agroindústrias às suas necessidades com expertise em frutas, sucos e polpas de qualidade superior.')); ?>
        </p>
        <div class="d-flex">
            <a href="<?php echo esc_url(get_theme_mod('footer_linkedin_url', '#')); ?>" class="social-link me-3 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 1.25rem; height: 1.25rem;"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect width="4" height="12" x="2" y="9"></rect><circle cx="4" cy="4" r="2"></circle></svg>
            </a>
            <a href="<?php echo esc_url(get_theme_mod('footer_instagram_url', '#')); ?>" class="social-link me-3 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 1.25rem; height: 1.25rem;"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line></svg>
            </a>
            <a href="<?php echo esc_url(get_theme_mod('footer_facebook_url', '#')); ?>" class="social-link text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 1.25rem; height: 1.25rem;"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
            </a>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h3 class="h5 fw-semibold mb-4">Links Rápidos</h3>
        <?php wp_nav_menu(array(
            'theme_location' => 'footer-menu',
            'menu_class'     => 'list-unstyled',
            'container'      => false,
            'link_before'    => '<small class="text-white">',
            'link_after'     => '</small>',
            'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
            'fallback_cb'    => false, // Para não mostrar nada se o menu não existir
        )); ?>
      </div>
      
      <div class="col-lg-3 col-md-6">
        <h3 class="h5 fw-semibold mb-4">Contato</h3>
        <ul class="list-unstyled">
            <li class="d-flex align-items-center mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2 flex-shrink-0" style="width: 1rem; height: 1rem;"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                <small class="text-white"><?php echo esc_html(get_theme_mod('footer_contato_telefone', '+55 34 9 9339-2111 / +55 34 9 9158-6658')); ?></small>
            </li>
            <li class="d-flex align-items-center mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2 flex-shrink-0" style="width: 1rem; height: 1rem;"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>
                <small class="text-white"><?php echo esc_html(get_theme_mod('footer_contato_email', 'viatrop@viatrop.com.br')); ?></small>
            </li>
            <li class="d-flex align-items-start">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2 mt-1 flex-shrink-0" style="width: 1rem; height: 1rem;"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg>
                <small class="text-white"><?php echo wp_kses_post(get_theme_mod('footer_contato_endereco', 'Praça Prefeito Elmiro Barbosa, 188, Sala 13<br>Araguari, MG')); ?></small>
            </li>
        </ul>
      </div>
    </div>
    
    <div class="border-top mt-5 pt-4" style="border-color: #134e4a !important;">
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
        <small class="text-white mb-3 mb-md-0"><?php echo esc_html(get_theme_mod('footer_copyright', '© 2024 Viatrop. Todos os direitos reservados.')); ?></small>
        <div class="d-flex flex-wrap justify-content-center mb-3 mb-md-0">
            <a href="<?php echo esc_url(get_theme_mod('footer_privacidade_url', '#')); ?>" class="footer-link me-4 text-white"><small><?php echo esc_html(get_theme_mod('footer_privacidade_texto', 'Política de Privacidade')); ?></small></a>
            <a href="<?php echo esc_url(get_theme_mod('footer_termos_url', '#')); ?>" class="footer-link text-white"><small><?php echo esc_html(get_theme_mod('footer_termos_texto', 'Termos de Uso')); ?></small></a>
        </div>
        <small class="text-white"><?php echo esc_html(get_theme_mod('footer_cnpj', 'CNPJ: 22.318.499/0001-12')); ?></small>
      </div>
    </div>
    
  </div>
</footer>

<div class="modal fade" id="quoteModal" tabindex="-1" aria-labelledby="quoteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="quoteModalLabel">Solicitar Cotação</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo do_shortcode('[contact-form-7 id="fbe04f2" title="Solicitar cotação formulário"]'); ?>
      </div>
    </div>
  </div>
</div>

  <?php wp_footer(); ?>

</body>

</html>