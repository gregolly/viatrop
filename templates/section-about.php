<section id="sobre" class="py-5" style="background: linear-gradient(to bottom right, #f7fee7, #f3f4f6);">
    <div class="container">
        <div class="row align-items-center gy-5">
            
            <div class="col-lg-6">
                <h2 class="display-4 fw-bold mb-4" style="color: #115e59;">
                    <?php echo esc_html( get_theme_mod( 'sobre_titulo_principal', 'Conectando o Campo à Indústria' ) ); ?>
                </h2>
                <p class="fs-5 text-muted mb-4">
                    <?php echo wp_kses_post( get_theme_mod( 'sobre_paragrafo_principal', 'A ViaTrop nasceu da paixão pelas frutas e do desejo de criar pontes estratégicas entre produtores e mercado, sempre garantindo o melhor produto.' ) ); ?>
                </p>
                
                <div>
                    <div class="d-flex align-items-start mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 mt-1 me-3" style="color: #84cc16;">
                            <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                        </svg>
                        <div>
                            <h4 class="fw-semibold" style="color: #115e59;"><?php echo esc_html( get_theme_mod( 'sobre_diferencial_1_titulo', 'Nossa História, Sua Vantagem' ) ); ?></h4>
                            <p class="text-muted mb-0"><?php echo wp_kses_post( get_theme_mod( 'sobre_diferencial_1_texto', 'Com mais de 30 anos de networking, a ViaTrop foi fundada em 2015 para revolucionar o fornecimento de matérias-primas.' ) ); ?></p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 mt-1 me-3" style="color: #84cc16;">
                            <circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle>
                        </svg>
                        <div>
                            <h4 class="fw-semibold" style="color: #115e59;"><?php echo esc_html( get_theme_mod( 'sobre_diferencial_2_titulo', 'Foco no Cliente' ) ); ?></h4>
                            <p class="text-muted mb-0"><?php echo wp_kses_post( get_theme_mod( 'sobre_diferencial_2_texto', 'Facilitamos negociações otimizando qualidade, logística e custos para atender demandas específicas de cada cliente.' ) ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="row g-4">
                    <div class="col-6">
                        <div class="bg-white p-4 rounded shadow-sm text-center h-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-4" style="width: 3rem; height: 3rem; color: #0d9488;">
                                <path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path><circle cx="12" cy="8" r="6"></circle>
                            </svg>
                            <h3 class="h2 fw-bold mb-2" style="color: #115e59;"><?php echo esc_html( get_theme_mod( 'sobre_estatistica_1_numero', '30+' ) ); ?></h3>
                            <p class="text-muted mb-0"><?php echo esc_html( get_theme_mod( 'sobre_estatistica_1_texto', 'Anos de Experiência' ) ); ?></p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bg-white p-4 rounded shadow-sm text-center h-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-4" style="width: 3rem; height: 3rem; color: #0d9488;">
                                <path d="m11 17 2 2a1 1 0 1 0 3-3"></path><path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"></path><path d="m21 3 1 11h-2"></path><path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3"></path><path d="M3 4h8"></path>
                            </svg>
                            <h3 class="h2 fw-bold mb-2" style="color: #115e59;"><?php echo esc_html( get_theme_mod( 'sobre_estatistica_2_numero', '100+' ) ); ?></h3>
                            <p class="text-muted mb-0"><?php echo esc_html( get_theme_mod( 'sobre_estatistica_2_texto', 'Parcerias Ativas' ) ); ?></p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="bg-white p-4 rounded shadow-sm text-center">
                            <div class="d-flex align-items-center justify-content-center mb-3">
                                <div class="rounded-circle me-2" style="width: 0.75rem; height: 0.75rem; background-color: #84cc16;"></div>
                                <div class="rounded-circle me-2" style="width: 0.75rem; height: 0.75rem; background-color: #0d9488;"></div>
                                <div class="rounded-circle" style="width: 0.75rem; height: 0.75rem; background-color: #84cc16;"></div>
                            </div>
                            <h3 class="h5 fw-semibold mb-2" style="color: #115e59;"><?php echo esc_html( get_theme_mod( 'sobre_tripe_titulo', 'Qualidade, Logística e Custos' ) ); ?></h3>
                            <p class="text-muted mb-0"><?php echo esc_html( get_theme_mod( 'sobre_tripe_texto', 'Nosso tripé de excelência em cada projeto' ) ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row g-5 mt-4">
            <div class="col-md-4 text-center">
                <div class="mx-auto mb-4 d-flex align-items-center justify-content-center rounded-circle" style="width: 4rem; height: 4rem; background-color: #ccfbf1;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 2rem; height: 2rem; color: #0d9488;">
                        <path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path><circle cx="12" cy="8" r="6"></circle>
                    </svg>
                </div>
                <h3 class="h4 fw-semibold mb-2" style="color: #115e59;"><?php echo esc_html( get_theme_mod( 'sobre_vantagem_1_titulo', 'Qualidade Superior' ) ); ?></h3>
                <p class="text-muted"><?php echo wp_kses_post( get_theme_mod( 'sobre_vantagem_1_texto', 'Visitamos os pomares e selecionamos as melhores fontes para garantir a mais alta qualidade em sucos, polpas e concentrados.' ) ); ?></p>
            </div>
            <div class="col-md-4 text-center">
                <div class="mx-auto mb-4 d-flex align-items-center justify-content-center rounded-circle" style="width: 4rem; height: 4rem; background-color: #f0fdf4;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 2rem; height: 2rem; color: #65a30d;">
                        <path d="m11 17 2 2a1 1 0 1 0 3-3"></path><path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"></path><path d="m21 3 1 11h-2"></path><path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3"></path><path d="M3 4h8"></path>
                    </svg>
                </div>
                <h3 class="h4 fw-semibold mb-2" style="color: #115e59;"><?php echo esc_html( get_theme_mod( 'sobre_vantagem_2_titulo', 'Parcerias Sólidas' ) ); ?></h3>
                <p class="text-muted"><?php echo wp_kses_post( get_theme_mod( 'sobre_vantagem_2_texto', 'Construímos relacionamentos de longo prazo baseados em confiança e lealdade com produtores e processadores.' ) ); ?></p>
            </div>
            <div class="col-md-4 text-center">
                <div class="mx-auto mb-4 d-flex align-items-center justify-content-center rounded-circle" style="width: 4rem; height: 4rem; background-color: #ccfbf1;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 2rem; height: 2rem; color: #0d9488;">
                        <circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle>
                    </svg>
                </div>
                <h3 class="h4 fw-semibold mb-2" style="color: #115e59;"><?php echo esc_html( get_theme_mod( 'sobre_vantagem_3_titulo', 'Foco no Cliente' ) ); ?></h3>
                <p class="text-muted"><?php echo wp_kses_post( get_theme_mod( 'sobre_vantagem_3_texto', 'Facilitamos negociações otimizando qualidade, logística e custos para atender às demandas específicas de cada cliente.' ) ); ?></p>
            </div>
        </div>
    </div>
</section>