<?php

/**
 * Enfileira todos os scripts e estilos do tema.
*/
function viatrop_enqueue_assets() {
 // --- ESTILOS (CSS) ---
 wp_enqueue_style( 
 'main-style', 
 get_stylesheet_uri() 
 );
 wp_enqueue_style( 
 'bootstrap-css', 
 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css', 
 array(), 
 '5.3.8'
 );

 // --- SCRIPTS (JS) ---
 wp_enqueue_script( 
 'bootstrap-js', 
 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js', 
 array(), // Não depende de jQuery
 '5.3.8',
 true
 );
 
 // Script para encolher o menu (Não depende de jQuery)
 wp_enqueue_script( 
 'shrink-menu', 
 get_template_directory_uri() . '/js/shrink.js', 
 array(), // Removida dependência desnecessária
 '1.0.0', 
 true 
 );
 
 // SCRIPT DE FILTRO AJAX (Este é o único script de filtro que deve ser carregado)
 wp_enqueue_script( 
 'filter_product', 
 get_template_directory_uri() . '/js/filter_products.js', 
 array('jquery'), // Depende de jQuery
 '1.0.0', 
 true 
 );
 
 // Script de Depoimentos (Não depende de jQuery)
 wp_enqueue_script( 
 'testimonial-script', 
 get_template_directory_uri() . '/js/testimonials.js', 
 array(), // Removida dependência desnecessária
 '1.0.0', 
 true 
 );

    /* SCRIPTS REMOVIDOS POR CONFLITO:
     * - 'search-filter' (product-search-input.js)
     * - 'tab-filter' (tab.js)
     * Eles tentam controlar o mesmo campo de busca que o 'filter_product'.
     */
}
add_action( 'wp_enqueue_scripts', 'viatrop_enqueue_assets' );

?>