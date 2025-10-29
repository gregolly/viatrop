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
            <a href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url('medium_large'); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
            </a>
        <?php else : ?>
            <a href="<?php the_permalink(); ?>">
                <img src="https://placehold.co/600x400/006461/FFFFFF?text=Produto" class="card-img-top" alt="<?php the_title_attribute(); ?>">
            </a>
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
                    
                    // PASSO 1: Busca a cor customizada (NATIVA) do TERMO da taxonomia
                    // Substituímos get_field() por get_term_meta()
                    $cor_fundo = get_term_meta( $tipo->term_id, 'cor_do_badge', true );
                    
                    $estilo_inline = ''; // Inicia a variável de estilo
                    
                    if ($cor_fundo) {
                        // PASSO 2: Tenta adivinhar a cor do texto (preto ou branco)
                        $cor_texto = '#ffffff'; // Padrão branco
                        if ( function_exists('vtp_get_contrasting_text_color') ) {
                            $cor_texto = vtp_get_contrasting_text_color($cor_fundo);
                        }
                        
                        // PASSO 3: Monta o estilo inline
                        $estilo_inline = 'style="background-color:' . esc_attr($cor_fundo) . '; color:' . esc_attr($cor_texto) . '; border-color:' . esc_attr($cor_fundo) . ';"';
                    
                    } else {
                        // Cor padrão (cinza do Bootstrap) se nenhuma cor for definida
                        $estilo_inline = 'style="background-color: #6c757d; color: #fff;"';
                    }

                    // PASSO 4: Imprime o badge com o estilo inline
                    echo '<span class="badge me-1" ' . $estilo_inline . '>' . esc_html( $tipo->name ) . '</span>';
                }

                echo '</div>';
            }
            ?>
            <a href="<?php the_permalink(); ?>" class="text-dark">
                <h5 class="card-title text-uppercase"><?php the_title(); ?></h5>
            </a>
            
            <div class="card-text mb-3"><?php the_excerpt(); ?></div>
            
            <!-- <button type="button" class="btn btn-success mt-auto" style="background-color: #BDCE00; border-color: #BDCE00;" data-bs-toggle="modal" data-bs-target="#quoteModal">
                Solicitar Cotação
            </button> -->
        </div>
    </div>
</div>