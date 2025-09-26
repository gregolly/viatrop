<?php
// Verifica se a seção de serviços deve ser exibida
$secao_servicos_visivel = get_theme_mod('servico_secao_visivel', true);

if ( $secao_servicos_visivel ) :
?>
<section id="servicos" class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <?php
            $titulo_principal = get_theme_mod('servico_titulo_principal', 'Nossas Soluções');
            $subtitulo_principal = get_theme_mod('servico_subtitulo_principal', 'Oferecemos um portfólio completo de serviços para otimizar sua cadeia de suprimentos e impulsionar seu negócio de bebidas e alimentos.');
            if ( ! empty($titulo_principal)) : ?>
            <h2 class="display-5 fw-bold text-dark"><?php echo esc_html($titulo_principal); ?></h2>
            <p class="lead text-muted">
                <?php echo esc_html($subtitulo_principal); ?>
            </p>
            <?php endif; ?>
        </div>

        <div class="row gy-4 justify-content-center">
            <?php
            // Loop para exibir os 6 serviços do Personalizador
            for ( $i = 1; $i <= 6; $i++ ) :
                // Busca os dados de cada serviço
                $icone = get_theme_mod('servico_icone_' . $i);
                $titulo = get_theme_mod('servico_titulo_' . $i);
                $descricao = get_theme_mod('servico_descricao_' . $i);

                // Só exibe o card se o título tiver sido preenchido
                if ( ! empty($titulo) ) :
            ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body p-4">
                            <?php if ( ! empty($icone) ) : ?>
                                <div class="mb-3 text-primary">
                                    <?php echo $icone; // Exibimos o SVG diretamente. Não use esc_html() aqui. ?>
                                </div>
                            <?php endif; ?>

                            <?php if ( ! empty($titulo) ) : ?>
                                <h3 class="h5 fw-bold text-dark mb-3"><?php echo esc_html($titulo); ?></h3>
                            <?php endif; ?>

                            <?php if ( ! empty($descricao) ) : ?>
                                <p class="text-muted">
                                    <?php echo nl2br(esc_html($descricao)); // nl2br para permitir quebras de linha ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php
                endif;
            endfor;
            ?>
        </div>
    </div>
</section>
<?php endif; 