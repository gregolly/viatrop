<?php get_header(); ?>

<div class="container my-5">
    <div class="row g-4 g-lg-5"> <main class="col-lg-8">
            
            <h1 class="display-5 fw-bold pb-2 mb-4 border-bottom">
                <?php single_term_title(); // Exibe o nome do termo (ex: "Sensores") ?>
            </h1>

            <?php
            $term_description = term_description();
            if ( ! empty( $term_description ) ) :
                ?>
                <div class="lead mb-4"><?php echo $term_description; ?></div>
            <?php endif; ?>

            
            <?php if ( have_posts() ) : ?>

                <div class="row row-cols-1 row-cols-md-2 g-4">

                    <?php while ( have_posts() ) : the_post(); ?>
                        
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); // 'medium' é um bom tamanho para cards ?>
                                    </a>
                                <?php endif; ?>
                                
                                <div class="card-body">
                                    <h3 class="card-title h5">
                                        <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    
                                    <p class="card-text">
                                        <?php the_excerpt(); // Mostra um breve resumo ?>
                                    </p>
                                </div>
                                
                                <div class="card-footer bg-transparent border-top-0 pb-3">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-success btn-sm">
                                        Ver Produto
                                    </a>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>

                </div> <div class="mt-5">
                    <?php
                    // Paginação com classes do Bootstrap
                    the_posts_pagination( array(
                        'mid_size'  => 2,
                        'prev_text' => '&laquo; Anterior',
                        'next_text' => 'Próximo &raquo;',
                        'screen_reader_text' => ' ', // Esconde o "Posts navigation"
                        'type'      => 'list',
                        'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                        'format'    => '?paged=%#%',
                        'current'   => max( 1, get_query_var('paged') ),
                        'total'     => $wp_query->max_num_pages,
                        'list_class' => 'pagination justify-content-center', // Classes da UL
                        'item_class' => 'page-item', // Classes da LI
                        'link_class' => 'page-link', // Classes do A
                        'active_class' => 'active', // Classe da LI ativa
                    ) );
                    ?>
                </div>


            <?php else : ?>
                <div class="alert alert-info" role="alert">
                    Nenhum produto encontrado nesta categoria.
                </div>
            <?php endif; ?>

        </main>

        <aside class="col-lg-4">
            
            <div class="card shadow-sm mb-4">
                <div class="card-body p-4">
                    <h3 class="card-title h4">Solicite um Orçamento</h3>
                    <p class="card-text mb-3">Preencha o formulário abaixo e nossa equipe entrará em contato.</p>
                    
                    <?php
                    echo do_shortcode('[contact-form-7 id="b9a959c" title="Sidebar form"]'); 
                    ?>

                </div>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-body p-4">
                    <h3 class="card-title h4">Nossos Produtos</h3>
                    <ul class="list-unstyled mb-0 product-list-sidebar">
                        <?php
                        // ATENÇÃO: Mude 'sua_taxonomia_produto' para o slug da sua taxonomia
                        wp_list_categories( array(
                            'taxonomy'   => 'tipo_produto', 
                            'title_li'   => '',
                            'style'      => 'list',
                            'show_count' => 0,
                        ) );
                        ?>
                    </ul>
                </div>
            </div>

        </aside>

    </div> 
</div> 
<?php get_footer(); ?>