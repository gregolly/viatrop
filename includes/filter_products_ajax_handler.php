<?php
function filtrar_produtos_ajax_handler() {
    $categoria_slug = sanitize_text_field($_POST['categoria']);
    $tipo_slug      = sanitize_text_field($_POST['tipo']);
    $search_query   = sanitize_text_field($_POST['busca']);
    $paged          = isset($_POST['pagina']) ? intval($_POST['pagina']) : 1;
    $posts_per_page = 6; // Seu limite de produtos por página

    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => $posts_per_page,
        'paged'          => $paged,
        's'              => $search_query, // Parâmetro para busca por palavra-chave
        'tax_query'      => array(
            'relation' => 'AND',
        ),
    );

    if (!empty($categoria_slug) && $categoria_slug !== 'todos') {
        $args['tax_query'][] = array(
            'taxonomy' => 'categoria_produto',
            'field'    => 'slug',
            'terms'    => $categoria_slug,
        );
    }

    if (!empty($tipo_slug) && $tipo_slug !== 'todos') {
        $args['tax_query'][] = array(
            'taxonomy' => 'tipo_produto',
            'field'    => 'slug',
            'terms'    => $tipo_slug,
        );
    }

    $query = new WP_Query($args);

    ob_start();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('templates/content', 'product-card'); // Usa seu card de produto
        }
    }
    $html = ob_get_clean();

    // Verifica se há mais posts para carregar na próxima página
    $has_more_posts = ($query->max_num_pages > $paged);

    wp_reset_postdata();

    // Envia os dados como JSON
    wp_send_json_success(array(
        'html'           => $html,
        'has_more_posts' => $has_more_posts
    ));
}

add_action('wp_ajax_filtrar_produtos', 'filtrar_produtos_ajax_handler');
add_action('wp_ajax_nopriv_filtrar_produtos', 'filtrar_produtos_ajax_handler');