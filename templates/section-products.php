<section id="produtos" class="py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col">
                <h2 class="display-5 fw-bold">Nossos Produtos</h2>
                <p class="lead">Explore nossa variedade de produtos de alta qualidade.</p>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-8 mb-3 mb-md-0">
                <?php
                // Busca todas as categorias de produto que têm produtos
                $product_categories = get_terms( array(
                    'taxonomy'   => 'categoria_produto',
                    'hide_empty' => true,
                ) );
                ?>
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="btn btn-outline-primary active" id="pills-todos-tab" data-bs-toggle="pill" data-bs-target="#pills-todos" type="button" role="tab" aria-controls="pills-todos" aria-selected="true">Todos</button>
                    </li>
                    <?php if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) : ?>
                        <?php foreach ( $product_categories as $category ) : ?>
                            <li class="nav-item" role="presentation">
                                <button class="btn btn-outline-primary ms-2" id="pills-<?php echo esc_attr( $category->slug ); ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo esc_attr( $category->slug ); ?>" type="button" role="tab" aria-controls="pills-<?php echo esc_attr( $category->slug ); ?>" aria-selected="false"><?php echo esc_html( $category->name ); ?></button>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="col-md-4 d-none">
                <div class="input-group">
                    <span class="input-group-text">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
                    </span>
                    <input type="text" class="form-control" placeholder="Buscar produtos...">
                </div>
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-todos" role="tabpanel" aria-labelledby="pills-todos-tab">
                <div class="row gy-4">
                    <?php
                    // Query para buscar TODOS os produtos
                    $todos_produtos_query = new WP_Query( array(
                        'post_type'      => 'produto',
                        'posts_per_page' => -1, // -1 para buscar todos
                    ) );

                    if ( $todos_produtos_query->have_posts() ) :
                        while ( $todos_produtos_query->have_posts() ) : $todos_produtos_query->the_post();
                    ?>
                        <div class="col-sm-6 col-lg-4">
                            <div class="card h-100">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <img src="<?php the_post_thumbnail_url( 'medium_large' ); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><?php the_title(); ?></h5>
                                    <div class="card-text mb-3"><?php the_excerpt(); ?></div>
                                    
                                    <button type="button" class="btn btn-success btn-primary mt-auto" data-bs-toggle="modal" data-bs-target="#quoteModal">
                                        Solicitar Cotação
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php
                        endwhile;
                        wp_reset_postdata(); // Importante: reseta a query
                    endif;
                    ?>
                </div>
            </div>

            <?php if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) : ?>
                <?php foreach ( $product_categories as $category ) : ?>
                    <div class="tab-pane fade" id="pills-<?php echo esc_attr( $category->slug ); ?>" role="tabpanel" aria-labelledby="pills-<?php echo esc_attr( $category->slug ); ?>-tab">
                        <div class="row gy-4">
                            <?php
                            // Query para buscar produtos DESTA categoria específica
                            $categoria_query = new WP_Query( array(
                                'post_type'      => 'produto',
                                'posts_per_page' => -1,
                                'tax_query'      => array(
                                    array(
                                        'taxonomy' => 'categoria_produto',
                                        'field'    => 'slug',
                                        'terms'    => $category->slug,
                                    ),
                                ),
                            ) );

                            if ( $categoria_query->have_posts() ) :
                                while ( $categoria_query->have_posts() ) : $categoria_query->the_post();
                            ?>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="card h-100">
                                       <?php if ( has_post_thumbnail() ) : ?>
                                            <img src="<?php the_post_thumbnail_url( 'medium_large' ); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
                                        <?php endif; ?>
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title"><?php the_title(); ?></h5>
                                            <div class="card-text mb-3"><?php the_excerpt(); ?></div>
                                            <button type="button" class="btn btn-success btn-primary mt-auto" data-bs-toggle="modal" data-bs-target="#quoteModal">
                                                Solicitar Cotação
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>