<?php

/**
 * Enfileira todos os scripts e estilos do tema.
 * Esta é a única função "handler" para o hook 'wp_enqueue_scripts'.
 */
function viatrop_enqueue_assets() {
    
    // --- ESTILOS (CSS) ---
    
    // Seu CSS principal - NUNCA adie este, ele é o CSS crítico.
    wp_enqueue_style( 
        'main-style', 
        get_stylesheet_uri() 
    );
    
    // Bootstrap CSS (da CDN)
    wp_enqueue_style( 
        'bootstrap-css', 
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css', 
        array(), 
        '5.3.8', 
        'print',
    );

    // --- SCRIPTS (JS) ---
    // Nota: Você já está fazendo certo ao colocar 'true' no final ($in_footer)
    // Isso já move os scripts para o rodapé, o que é ótimo!
    
    // Bootstrap JS (da CDN)
    wp_enqueue_script( 
        'bootstrap-js', 
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js', 
        array(), // Não depende de jQuery
        null, 
        true,
        'print'
    );
    
    // Script para encolher o menu
    wp_enqueue_script( 
        'shrink-menu', 
        get_template_directory_uri() . '/js/shrink.js', 
        array(), // Não depende de jQuery
        null, 
        true 
    );
    
    // Script de filtro de busca
    wp_enqueue_script( 
        'search-filter', 
        get_template_directory_uri() . '/js/product-search-input.js', 
        array('jquery'), // Depende de jQuery
        null, 
        true 
    );
    
    // Script de Abas (Tabs)
    wp_enqueue_script( 
        'tab-filter', 
        get_template_directory_uri() . '/js/tab.js', 
        array('jquery'), // Depende de jQuery
        null, 
        true 
    );
    
    // Script de Filtro de Produto
    wp_enqueue_script( 
        'filter_product', 
        get_template_directory_uri() . '/js/filter_products.js', 
        array('jquery'), // Depende de jQuery
        null, 
        true 
    );
    
    // Script de Depoimentos (Testimonials)
    wp_enqueue_script( 
        'testimonial-script', 
        get_template_directory_uri() . '/js/testimonials.js', 
        array( 'jquery' ), 
        '1.0.0', 
        true 
    );
}

// Adiciona a função handler unificada ao hook
add_action( 'wp_enqueue_scripts', 'viatrop_enqueue_assets' );

?>