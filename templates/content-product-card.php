<?php
/**
 * Template Part: Content Product Card
 *
 * Displays a single product card.
 */
?>
<div class="col-sm-6 col-lg-4 product-card-item">
    <div class="card h-100">
        <?php if (has_post_thumbnail()) : ?>
            <img src="<?php the_post_thumbnail_url('medium_large'); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
        <?php else : ?>
            <img src="https://placehold.co/600x400/006461/FFFFFF?text=Produto" class="card-img-top" alt="<?php the_title_attribute(); ?>">
        <?php endif; ?>

        <div class="card-body d-flex flex-column">

            <?php
            // Busca os termos da taxonomia 'tipo_produto' para o post atual
            $tipos_produto = get_the_terms( get_the_ID(), 'tipo_produto' );

            // Verifica se o produto tem algum tipo associado
            if ( $tipos_produto && ! is_wp_error( $tipos_produto ) ) {
                
                echo '<div class="card-badges mb-2">'; // Container para as badges

                // Loop para exibir cada tipo como uma badge
                foreach ( $tipos_produto as $tipo ) {
                    // A classe 'tipo-[slug]' permite customizar a cor de cada badge via CSS
                    echo '<span class="badge me-1 tipo-' . esc_attr( $tipo->slug ) . '">' . esc_html( $tipo->name ) . '</span>';
                }

                echo '</div>';
            }
            ?>
            <h5 class="card-title"><?php the_title(); ?></h5>
            
            <div class="card-text mb-3"><?php the_excerpt(); ?></div>
            
            <!-- <button type="button" class="btn btn-success mt-auto" style="background-color: #BDCE00; border-color: #BDCE00;" data-bs-toggle="modal" data-bs-target="#quoteModal">
                Solicitar Cotação
            </button> -->
        </div>
    </div>
</div>