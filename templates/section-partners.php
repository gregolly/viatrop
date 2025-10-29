<?php 
/**
 * Template Part: Section Partners
 */
?>
<div class="container py-5 d-none">
    <div class="row text-center">
        <div class="col-12">
            <h2 class="mb-4 display-5 fw-bold text-dark">Nossos Parceiros</h2>
            <p class="lead mb-5 text-muted">Temos a confiança de grandes empresas do mercado.</p>
        </div>
    </div>
    
    <div class="row g-4 g-lg-5 justify-content-center align-items-center">
        <?php
            // Argumentos da consulta para buscar os parceiros
            $args = array(
                'post_type'      => 'parceiros',
                'posts_per_page' => -1, // -1 para buscar todos
                'orderby'        => 'title',
                'order'          => 'ASC'
            );

            // A consulta
            $parceiros_query = new WP_Query( $args );

            // O Loop
            if ( $parceiros_query->have_posts() ) :
                while ( $parceiros_query->have_posts() ) : $parceiros_query->the_post();
                    if ( has_post_thumbnail() ) :
        ?>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="partner-logo-box text-center">
                    <?php 
                        // Exibe a imagem destacada (o logo)
                        the_post_thumbnail('medium', array(
                            'class' => 'img-fluid',
                            'alt'   => get_the_title() // Usa o título do post como alt text para SEO
                        )); 
                    ?>
                </div>
            </div>
        <?php
                    endif;
                endwhile;
                wp_reset_postdata(); // Restaura os dados do post original
            else :
                // Nenhuma mensagem aqui, para não poluir o layout se não houver parceiros
            endif;
        ?>
    </div>
</div>