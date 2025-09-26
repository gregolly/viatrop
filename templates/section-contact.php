<section id="contato" class="py-5 bg-white">
    <div class="container">
        
        <div class="text-center mb-5">
            <h2 class="display-4 fw-bold mb-4" style="color: #115e59;">
                <?php echo esc_html( get_theme_mod( 'contato_titulo', 'Entre em Contato' ) ); ?>
            </h2>
            <p class="fs-5 text-muted mx-auto" style="max-width: 42rem;">
                <?php echo wp_kses_post( get_theme_mod( 'contato_subtitulo', 'Estamos prontos para atender suas necessidades. Fale conosco!' ) ); ?>
            </p>
        </div>
        
        <div class="row gy-5">
            
            <div class="col-lg-6">
                <div class="d-flex align-items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-3 flex-shrink-0" style="color: #0d9488;">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                    <div>
                        <h3 class="h5 fw-semibold text-dark mb-1">Telefone</h3>
                        <p class="text-muted mb-0"><?php echo esc_html( get_theme_mod( 'contato_telefone', '+55 34 99339-2111' ) ); ?></p>
                    </div>
                </div>
                
                <div class="d-flex align-items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-3 flex-shrink-0" style="color: #0d9488;">
                        <rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                    </svg>
                    <div>
                        <h3 class="h5 fw-semibold text-dark mb-1">Email</h3>
                        <p class="text-muted mb-0"><?php echo esc_html( get_theme_mod( 'contato_email', 'contato@empresa.com' ) ); ?></p>
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-3 flex-shrink-0" style="color: #0d9488;">
                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <div>
                        <h3 class="h5 fw-semibold text-dark mb-1">Endereço</h3>
                        <p class="text-muted mb-0"><?php echo esc_html( get_theme_mod( 'contato_endereco', 'Minas Gerais, Brasil' ) ); ?></p>
                    </div>
                </div>
                
                <a href="<?php echo esc_url( get_theme_mod( 'contato_whatsapp_link', '#' ) ); ?>" class="btn btn-lg w-100 mt-5 d-inline-flex align-items-center justify-content-center gap-2 whatsapp" style="background-color: #16a34a; color: white;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 1.25rem; height: 1.25rem;">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                    <?php echo esc_html( get_theme_mod( 'contato_whatsapp_texto', 'Falar com Especialista no WhatsApp' ) ); ?>
                </a>
            </div>
            
            <div class="col-lg-6">
                <?php 
                    $shortcode = get_theme_mod( 'contato_form_shortcode', '[contact-form-7 id="be70753" title="Formulário de contato"]' );
                    if ( ! empty( $shortcode ) ) {
                        echo do_shortcode( $shortcode );
                    }
                ?>
            </div>

        </div>
    </div>
</section>