<?php
function criar_post_type_produtos_home() {
    // Labels para o Post Type 'Produtos'
    $labels = array(
        'name'               => _x( 'Produtos', 'post type general name', 'viatrop' ),
        'singular_name'      => _x( 'Produto', 'post type singular name', 'viatrop' ),
        'menu_name'          => _x( 'Produtos home', 'admin menu', 'viatrop' ),
        'name_admin_bar'     => _x( 'Produto', 'add new on admin bar', 'viatrop' ),
        'add_new'            => _x( 'Adicionar Novo', 'produto', 'viatrop' ),
        'add_new_item'       => __( 'Adicionar Novo Produto', 'viatrop' ),
        'new_item'           => __( 'Novo Produto', 'viatrop' ),
        'edit_item'          => __( 'Editar Produto', 'viatrop' ),
        'view_item'          => __( 'Ver Produto', 'viatrop' ),
        'all_items'          => __( 'Todos os Produtos', 'viatrop' ),
        'search_items'       => __( 'Buscar Produtos', 'viatrop' ),
        'parent_item_colon'  => __( 'Produto Pai:', 'viatrop' ),
        'not_found'          => __( 'Nenhum produto encontrado.', 'viatrop' ),
        'not_found_in_trash' => __( 'Nenhum produto encontrado na lixeira.', 'viatrop' )
    );

    // Argumentos para o Post Type 'Produtos'
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'destaque produto home' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5, // Abaixo de 'Posts'
        'supports'           => array( 'title', 'editor', 'thumbnail' ), // Título, editor de conteúdo e imagem destacada
        'menu_icon'          => 'dashicons-cart', // Ícone
    );

    register_post_type( 'produto', $args );

    // Labels para a Taxonomia 'Categorias de Produto'
    $labels_taxonomy = array(
        'name'              => _x( 'Categorias de Produto', 'taxonomy general name', 'viatrop' ),
        'singular_name'     => _x( 'Categoria de Produto', 'taxonomy singular name', 'viatrop' ),
        'search_items'      => __( 'Buscar Categorias', 'viatrop' ),
        'all_items'         => __( 'Todas as Categorias', 'viatrop' ),
        'parent_item'       => __( 'Categoria Pai', 'viatrop' ),
        'parent_item_colon' => __( 'Categoria Pai:', 'viatrop' ),
        'edit_item'         => __( 'Editar Categoria', 'viatrop' ),
        'update_item'       => __( 'Atualizar Categoria', 'viatrop' ),
        'add_new_item'      => __( 'Adicionar Nova Categoria', 'viatrop' ),
        'new_item_name'     => __( 'Nova Categoria', 'viatrop' ),
        'menu_name'         => __( 'Categorias', 'viatrop' ),
    );

    // Registra a Taxonomia, associando-a ao post type 'produto'
    register_taxonomy( 'categoria_produto', array( 'produto' ), array(
        'hierarchical'      => true,
        'labels'            => $labels_taxonomy,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'categoria-produto' ),
    ));
}
add_action( 'init', 'criar_post_type_produtos_home' );