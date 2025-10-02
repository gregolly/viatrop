<?php
// Função para buscar os tipos válidos de uma categoria
function get_valid_product_types_ajax_handler() {
    if ( !isset($_POST['category_slug']) || empty($_POST['category_slug']) ) {
        wp_send_json_error('Categoria não informada.');
    }

    $category_slug = sanitize_text_field($_POST['category_slug']);
    $category_term = get_term_by('slug', $category_slug, 'categoria_produto');

    if (!$category_term) {
        wp_send_json_error('Categoria não encontrada.');
    }

    // Usando a função get_field() do ACF para buscar os termos relacionados
    $valid_type_terms = get_field('tipos_validos', 'categoria_produto_' . $category_term->term_id);

    $types_data = [];
    if ($valid_type_terms) {
        foreach ($valid_type_terms as $term) {
            $types_data[] = [
                'name' => $term->name,
                'slug' => $term->slug,
            ];
        }
    }
    
    wp_send_json_success($types_data);
}
add_action('wp_ajax_get_valid_types', 'get_valid_product_types_ajax_handler');
add_action('wp_ajax_nopriv_get_valid_types', 'get_valid_product_types_ajax_handler');