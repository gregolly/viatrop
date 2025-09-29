<?php
/*
Template Name: Página de Arquivo de Produtos
*/
$tab_todos = get_theme_mod('produto_texto_aba_todos', 'Todos');
get_header(); ?>

<section id="produtos" class="py-5">
    <div class="container">
        <?php get_template_part('templates/product', 'title'); ?>

        <div class="row mb-4">
            <div class="col-md-8 mb-3 mb-md-0">
                <?php
                // Busca todas as categorias de produto que têm posts associados.
                $product_categories = get_terms(array(
                    'taxonomy'   => 'categoria_produto',
                    'hide_empty' => true,
                ));
                ?>
                <?php if (!empty($product_categories) && !is_wp_error($product_categories)) : ?>
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <?php if ($tab_todos) : ?>
                        <li class="nav-item" role="presentation">
                            <button class="btn btn-outline-primary active" id="pills-todos-tab" data-bs-toggle="pill" data-bs-target="#pills-todos" type="button" role="tab" aria-controls="pills-todos" aria-selected="true">
                                <?php echo esc_html( $tab_todos ); ?>
                            </button>
                        </li>
                        <?php endif; ?>
                        <?php foreach ($product_categories as $category) : ?>
                            <li class="nav-item" role="presentation">
                                <button class="btn btn-outline-primary ms-2" id="pills-<?php echo esc_attr($category->slug); ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo esc_attr($category->slug); ?>" type="button" role="tab" aria-controls="pills-<?php echo esc_attr($category->slug); ?>" aria-selected="false"><?php echo esc_html($category->name); ?></button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
                    </span>
                    <input type="text" id="product-search-input" class="form-control" placeholder="Buscar produtos...">
                </div>
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <!-- Aba "Todos" com Paginação -->
            <div class="tab-pane fade show active" id="pills-todos" role="tabpanel" aria-labelledby="pills-todos-tab">
                <div class="row gy-4">
                    <?php
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    $all_products_query = new WP_Query(array(
                        'post_type'      => 'product',
                        'posts_per_page' => 9, // Produtos por página
                        'paged'          => $paged,
                    ));

                    if ($all_products_query->have_posts()) :
                        while ($all_products_query->have_posts()) : $all_products_query->the_post();
                            get_template_part('templates/content', 'product-card');
                        endwhile;
                    else :
                        echo '<div class="col"><p class="text-center">Nenhum produto encontrado.</p></div>';
                    endif;
                    ?>
                </div>

                <!-- Controles de Paginação -->
                <div class="row mt-5">
                    <div class="col text-center">
                        <nav aria-label="Navegação de produtos">
                            <?php
                            $big = 999999999; // Número improvável
                            echo paginate_links( array(
                                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                'format' => '?paged=%#%',
                                'current' => max( 1, get_query_var('paged') ),
                                'total' => $all_products_query->max_num_pages,
                                'prev_text' => __('&laquo; Anterior'),
                                'next_text' => __('Próximo &raquo;'),
                                'type' => 'list',
                            ) );
                            ?>
                        </nav>
                    </div>
                </div>
                <?php wp_reset_postdata(); ?>

            </div>

            <!-- Abas por Categoria (sem paginação) -->
            <?php if (!empty($product_categories) && !is_wp_error($product_categories)) : ?>
                <?php foreach ($product_categories as $category) : ?>
                    <div class="tab-pane fade" id="pills-<?php echo esc_attr($category->slug); ?>" role="tabpanel" aria-labelledby="pills-<?php echo esc_attr($category->slug); ?>-tab">
                        <div class="row gy-4">
                            <?php
                            $category_query = new WP_Query(array(
                                'post_type'      => 'product',
                                'posts_per_page' => -1, // Mostra todos os produtos da categoria
                                'tax_query'      => array(
                                    array(
                                        'taxonomy' => 'categoria_produto',
                                        'field'    => 'slug',
                                        'terms'    => $category->slug,
                                    ),
                                ),
                            ));

                            if ($category_query->have_posts()) :
                                while ($category_query->have_posts()) : $category_query->the_post();
                                     get_template_part('templates/content', 'product-card');
                                endwhile;
                                wp_reset_postdata();
                            else :
                                echo '<div class="col"><p class="text-center">Nenhum produto encontrado nesta categoria.</p></div>';
                            endif;
                            ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>

