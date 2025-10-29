<?php get_header(); ?>

<div class="container my-5">
    <div class="row g-4 g-lg-5"> <main class="col-lg-8">
            
            <?php while ( have_posts() ) : the_post(); ?>

                <h1 class="display-5 fw-bold pb-2 mb-4 border-bottom"><?php the_title(); ?></h1>

                <div class="produto-galeria mb-4">
                    <?php 
                    if ( has_post_thumbnail() ) {
                        // Adiciona classes do Bootstrap diretamente à imagem
                        the_post_thumbnail('medium', ['class' => 'img-fluid rounded shadow-sm']); 
                    } 
                    ?>
                    </div>

                <div class="produto-conteudo lead mb-4">
                    <?php the_content(); ?>
                </div>

                <div class="produto-tabs mt-5">
    <!-- Tabs -->
    <!-- <ul class="nav nav-tabs" id="produtoTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="espec-tab" data-bs-toggle="tab" data-bs-target="#tab-especificacoes" type="button" role="tab" aria-controls="tab-especificacoes" aria-selected="true">Especificações</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="app-tab" data-bs-toggle="tab" data-bs-target="#tab-aplicacoes" type="button" role="tab" aria-controls="tab-aplicacoes" aria-selected="false">Aplicações</button>
        </li>
    </ul>

    
    <div class="tab-content border border-top-0 p-4 rounded-bottom" id="produtoTabsContent">
        
            <div class="tab-pane fade show active" id="tab-especificacoes" role="tabpanel" aria-labelledby="espec-tab">
                <h4 class="h5">Especificações Técnicas</h4>
                
                <ul class="list-unstyled">
                    <li><strong>Modelo:</strong> <?php the_field('modelo_do_produto'); ?></li>
                    <li><strong>Material:</strong> <?php the_field('material'); ?></li>
                    <li><strong>Tensão:</strong> <?php the_field('tensao_operacao'); ?></li>
                </ul>
            </div>

            <div class="tab-pane fade" id="tab-aplicacoes" role="tabpanel" aria-labelledby="app-tab">
                <h4 class="h5">Aplicações Comuns</h4>
                <p>Descreva onde este produto é geralmente utilizado.</p>
                
                <div class="text-content">
                    <?php the_field('aplicacoes_do_produto'); ?>
                </div>
            </div>
            
            </div>
    </div> -->

            <?php endwhile; // Fim do loop ?>

        </main>

        <aside class="col-lg-4">
            
            <div class="card mb-4">
                <div class="card-body p-4">
                    <h3 class="card-title h4">Precisa de Ajuda?</h3>
                    <p class="card-text">Nossa equipe está pronta para encontrar a solução ideal para sua necessidade.</p>
                    <div class="d-grid">
                        <a href="https://wa.link/ft4chy" class="btn btn-success btn-lg">Fale Conosco</a>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body p-4">
                    <h3 class="card-title h4">Solicite um Orçamento</h3>
                    <p class="card-text mb-3">Interessado neste produto? Preencha o formulário abaixo e nossa equipe entrará em contato.</p>
                    
                    <?php
                    echo do_shortcode('[contact-form-7 id="b9a959c" title="Sidebar form"]'); 
                    ?>

                </div>
            </div>

            

            <div class="card mb-4">
                <div class="card-body p-4">
                    <h3 class="card-title h4">Nossos Produtos</h3>
                    <ul class="list-unstyled mb-0 product-list-sidebar">
                        <?php
                        wp_list_categories( array(
                            'taxonomy'   => 'tipo_produto',
                            'title_li'   => '', // Remove o título "Categorias",
                            'style'      => 'list',
                            'show_count' => 0, // Opcional: esconde a contagem de posts,
                        ) );
                        ?>
                    </ul>
                </div>
            </div>

        </aside>

    </div> </div> <?php get_footer(); ?>