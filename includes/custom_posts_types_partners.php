<?php
/**
 * Registrar o Custom Post Type para Parceiros
 */
function criar_cpt_parceiros() {
    $labels = array(
        'name'               => _x( 'Parceiros', 'post type general name', 'seu-tema' ),
        'singular_name'      => _x( 'Parceiro', 'post type singular name', 'seu-tema' ),
        'menu_name'          => _x( 'Parceiros', 'admin menu', 'seu-tema' ),
        'name_admin_bar'     => _x( 'Parceiro', 'add new on admin bar', 'seu-tema' ),
        'add_new'            => _x( 'Adicionar Novo', 'parceiro', 'seu-tema' ),
        'add_new_item'       => __( 'Adicionar Novo Parceiro', 'seu-tema' ),
        'new_item'           => __( 'Novo Parceiro', 'seu-tema' ),
        'edit_item'          => __( 'Editar Parceiro', 'seu-tema' ),
        'view_item'          => __( 'Ver Parceiro', 'seu-tema' ),
        'all_items'          => __( 'Todos os Parceiros', 'seu-tema' ),
        'search_items'       => __( 'Procurar Parceiros', 'seu-tema' ),
        'parent_item_colon'  => __( 'Parceiro Pai:', 'seu-tema' ),
        'not_found'          => __( 'Nenhum parceiro encontrado.', 'seu-tema' ),
        'not_found_in_trash' => __( 'Nenhum parceiro encontrado na lixeira.', 'seu-tema' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'parceiro' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5, // Abaixo de "Posts"
        'menu_icon'          => 'dashicons-groups', // Ícone no menu do admin
        'supports'           => array( 'title', 'thumbnail' ) // Suporte para Título e Imagem Destacada (o logo!)
    );

    register_post_type( 'parceiros', $args );
}
add_action( 'init', 'criar_cpt_parceiros' );