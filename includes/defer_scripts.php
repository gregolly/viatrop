<?php

/**
 * Adiciona o atributo 'defer' aos scripts enfileirados.
 * Isso resolve o problema de "Renderizar solicitações de bloqueio" para JS.
 */
function viatrop_add_defer_to_scripts( $tag, $handle, $src ) {
    
    // Lista de handles de scripts que queremos adiar (defer)
    $defer_scripts = array(
        'bootstrap-js',
        'shrink-menu',
        'search-filter',
        'tab-filter',
        'filter_product',
        'testimonial-script',
        'jquery-core' // Handle do WordPress para o jQuery. ESSENCIAL!
    );

    if ( in_array( $handle, $defer_scripts ) ) {
        // Retorna a tag do script com o atributo defer
        return '<script src="' . esc_url( $src ) . '" defer="defer" id="' . $handle . '-js"></script>' . "\n";
    }

    // Retorna a tag original se não for um script da nossa lista
    return $tag;
}
add_filter( 'script_loader_tag', 'viatrop_add_defer_to_scripts', 10, 3 );

/**
 * Adia o carregamento de arquivos CSS não-críticos.
 * Isso resolve o "Renderizar solicitações de bloqueio" para CSS.
 */
function viatrop_add_defer_to_styles( $tag, $handle, $href, $media ) {
    
    // Lista de handles de CSS para adiar
    // NUNCA COLOQUE 'main-style' AQUI!
    $defer_styles = array(
        'bootstrap-css' 
    );

    if ( in_array( $handle, $defer_styles ) ) {
        // Modifica a tag para carregar de forma não-bloqueante
        $tag = '<link rel="stylesheet" href="' . esc_url( $href ) . '" id="' . $handle . '-css" media="print" onload="this.media=\'all\'" />' . "\n";
        
        // Fallback para navegadores sem JS
        $tag .= '<noscript><link rel="stylesheet" href="' . esc_url( $href ) . '" id="' . $handle . '-css-noscript" media="all" /></noscript>' . "\n";
    }

    return $tag;
}
add_filter( 'style_loader_tag', 'viatrop_add_defer_to_styles', 10, 4 );