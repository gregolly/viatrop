<?php get_header(); ?>

<div class="container py-5 mt-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold" style="color: #0f766e;">Nossos Produtos</h1>
        <p class="fs-5 text-muted">Ingredientes de alta qualidade para bebidas e alimentos</p>
    </div>

    <div class="row g-3 mb-5 justify-content-between">
        <div class="col-md-6 col-lg-5">
            <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-end-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search text-muted" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                    </span>
                    <input type="search" id="product-search-input" class="form-control border-start-0" placeholder="Buscar produtos..." value="<?php echo get_search_query(); ?>" name="s">
                    <input type="hidden" name="post_type" value="product" />
                </div>
            </form>
        </div>
        
        <div class="col-md-5 col-lg-4">
            <?php
            $terms = get_terms( array(
                'taxonomy'   => 'product_category',
                'hide_empty' => true,
            ) );
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
            ?>
            <div class="input-group">
                <span class="input-group-text bg-transparent border-end-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter text-muted" viewBox="0 0 16 16"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                </span>
                <select class="form-select border-start-0" onchange="location = this.value;">
                    <option value="<?php echo get_post_type_archive_link('product'); ?>">Todas as categorias</option>
                    <?php 
                    $current_term = get_queried_object();
                    foreach ( $terms as $term ) {
                        printf(
                            '<option value="%s" %s>%s</option>',
                            esc_url( get_term_link( $term ) ),
                            selected( $current_term->term_id, $term->term_id, false ),
                            esc_html( $term->name )
                        );
                    }
                    ?>
                </select>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="col">
                    <div class="card h-100 shadow-sm border-light-subtle hover-shadow">
                        <?php if(has_post_thumbnail()): ?>
                        
                        <?php the_post_thumbnail('medium_large', ['class' => 'card-img-top']); ?>
                        
                        <?php endif; ?>

                        <div class="card-body d-flex flex-column">
                            <div class="mb-2">
                                <?php 
                                $term_list = get_the_term_list( get_the_ID(), 'product_category', '', ', ', '' );
                                if ( $term_list && ! is_wp_error( $term_list ) ) {
                                    $term_list = str_replace( '<a href=', '<a class="badge rounded-pill text-bg-secondary text-decoration-none" href=', $term_list );
                                    echo $term_list;
                                }
                                ?>
                            </div>
                            <h3 class="card-title fs-5 fw-semibold mb-2" style="color: #0f766e;">
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none" style="color: inherit;"><?php the_title(); ?></a>
                            </h3>
                            <p class="card-text text-muted small flex-grow-1"><?php echo get_the_excerpt(); ?></p>
                            <button class="btn btn-success w-100 mt-3 text-white" data-bs-toggle="modal" data-bs-target="#quoteModal">Solicitar Cotação</button>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <div class="col-12">
                <p class="text-center">Nenhum produto encontrado. Tente uma busca ou filtro diferente.</p>
            </div>
        <?php endif; ?>
    </div>

    <div class="mt-5">
        <?php
            the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => __( 'Anterior', 'textdomain' ),
                'next_text' => __( 'Próximo', 'textdomain' ),
                'screen_reader_text' => ' ',
            ) );
        ?>
    </div>

</div>

<style>
.hover-shadow {
    transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
}
.hover-shadow:hover {
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15) !important;
    transform: translateY(-5px);
}
.card-img-container {
    aspect-ratio: 1 / 1;
    overflow: hidden;
}
.card-img-top {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease-in-out;
}
.card:hover .card-img-top {
    transform: scale(1.05);
}
.pagination .page-link { color: #10b981; }
.pagination .page-item.active .page-link { background-color: #0f766e; border-color: #0f766e; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('product-search-input');

    if (searchInput) {
        // O evento 'search' é acionado quando o usuário clica no 'x' do campo de busca.
        searchInput.addEventListener('search', function() {
            // Se o campo estiver vazio, significa que a busca foi limpa.
            if (this.value === '') {
                // Redireciona para a página de arquivo de produtos, mostrando todos.
                window.location.href = '<?php echo esc_url( get_post_type_archive_link("product") ); ?>';
            }
        });
    }
});
</script>

<?php get_footer(); ?>