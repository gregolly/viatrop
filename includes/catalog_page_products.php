<?php
// functions.php

function criar_post_type_catalogo_produtos() {
    $labels = array(
        'name'               => 'Produtos do Catálogo',
        'singular_name'      => 'Produto',
        'menu_name'          => 'Catálogo de Produtos',
        'name_admin_bar'     => 'Produto do Catálogo',
        'add_new_item'       => 'Adicionar Novo Produto',
        'all_items'          => 'Todos os Produtos',
        // ... labels completos ...
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'produtos' ), // A URL será /produtos/
        'capability_type'    => 'post',
        'has_archive'        => true, // ESSENCIAL: Ativa a página de arquivo
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_icon'          => 'dashicons-cart',
    );
    register_post_type( 'product', $args ); // Nome do CPT: 'product'
}
add_action( 'init', 'criar_post_type_catalogo_produtos' );

// Registra a Taxonomia e associa aos DOIS post types
function criar_taxonomia_geral_de_produtos() {
    // ... código dos labels da taxonomia aqui ...
    $labels_taxonomy = array(
        'name' => 'Categorias de Produto',
        // ... resto dos labels
    );
    
    register_taxonomy( 'categoria_produto', array( 'product', 'destaque_home' ), array( // Associado aos dois CPTs
        'hierarchical'      => true,
        'labels'            => $labels_taxonomy,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'categoria-produto' ),
    ));
}
add_action( 'init', 'criar_taxonomia_geral_de_produtos' );

function registrar_taxonomia_tipo_produto() {
    $labels = array(
        'name'              => _x( 'Tipos de Produto', 'taxonomy general name' ),
        'singular_name'     => _x( 'Tipo de Produto', 'taxonomy singular name' ),
        'search_items'      => __( 'Procurar Tipos' ),
        'all_items'         => __( 'Todos os Tipos' ),
        'parent_item'       => __( 'Tipo Pai' ),
        'parent_item_colon' => __( 'Tipo Pai:' ),
        'edit_item'         => __( 'Editar Tipo' ),
        'update_item'       => __( 'Atualizar Tipo' ),
        'add_new_item'      => __( 'Adicionar Novo Tipo' ),
        'new_item_name'     => __( 'Novo Nome do Tipo' ),
        'menu_name'         => __( 'Tipos de Produto' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'tipo' ),
    );

    // Associando a nova taxonomia 'tipo_produto' ao seu CPT 'product'
    register_taxonomy( 'tipo_produto', array( 'product' ), $args ); 
}
add_action( 'init', 'registrar_taxonomia_tipo_produto', 0 );