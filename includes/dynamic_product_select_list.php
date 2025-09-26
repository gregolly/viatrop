<?php
// functions.php

/**
 * Popula dinamicamente um campo select do Contact Form 7 com os produtos do CPT 'product'.
 * A função é acionada pelo nome do campo 'product-options'.
 */
function cf7_dynamic_product_select_list( $tag, $unused ) {

    // Verifica se o nome do campo é o que queremos popular
    if ( $tag['name'] != 'product-options' ) {
        return $tag;
    }

    // Argumentos para buscar todos os produtos do catálogo
    $args = array(
        'post_type'      => 'product', // O nome do seu CPT do catálogo
        'posts_per_page' => -1,        // -1 busca todos os produtos
        'orderby'        => 'title',
        'order'          => 'ASC',
    );

    $products_query = new WP_Query( $args );

    // Se não encontrar produtos, não faz nada
    if ( ! $products_query->have_posts() ) {
        return $tag;
    }

    // Adiciona as classes de estilização ao campo <select> gerado
    $tag['options'][] = 'class:form-select'; // Classe padrão do Bootstrap para selects

    // Loop para adicionar cada produto como uma opção no dropdown
    while ( $products_query->have_posts() ) {
        $products_query->the_post();
        $tag['values'][] = get_the_title();
    }

    wp_reset_postdata();

    return $tag;
}
add_filter( 'wpcf7_form_tag', 'cf7_dynamic_product_select_list', 10, 2 );