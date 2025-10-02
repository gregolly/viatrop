<?php
/**
 * Registrar o Custom Post Type para Depoimentos
 */
function criar_cpt_depoimentos() {
    $labels = array(
        'name'                  => _x( 'Depoimentos', 'Post Type General Name', 'seu-tema' ),
        'singular_name'         => _x( 'Depoimento', 'Post Type Singular Name', 'seu-tema' ),
        'menu_name'             => __( 'Depoimentos', 'seu-tema' ),
        'name_admin_bar'        => __( 'Depoimento', 'seu-tema' ),
        'archives'              => __( 'Arquivos de Depoimentos', 'seu-tema' ),
        'attributes'            => __( 'Atributos do Depoimento', 'seu-tema' ),
        'parent_item_colon'     => __( 'Depoimento Pai:', 'seu-tema' ),
        'all_items'             => __( 'Todos os Depoimentos', 'seu-tema' ),
        'add_new_item'          => __( 'Adicionar Novo Depoimento', 'seu-tema' ),
        'add_new'               => __( 'Adicionar Novo', 'seu-tema' ),
        'new_item'              => __( 'Novo Depoimento', 'seu-tema' ),
        'edit_item'             => __( 'Editar Depoimento', 'seu-tema' ),
        'update_item'           => __( 'Atualizar Depoimento', 'seu-tema' ),
        'view_item'             => __( 'Ver Depoimento', 'seu-tema' ),
        'view_items'            => __( 'Ver Depoimentos', 'seu-tema' ),
        'search_items'          => __( 'Buscar Depoimento', 'seu-tema' ),
        'not_found'             => __( 'Nenhum depoimento encontrado', 'seu-tema' ),
        'not_found_in_trash'    => __( 'Nenhum depoimento encontrado na lixeira', 'seu-tema' ),
        'featured_image'        => __( 'Avatar do Depoente', 'seu-tema' ), // Usaremos como avatar
        'set_featured_image'    => __( 'Definir avatar', 'seu-tema' ),
        'remove_featured_image' => __( 'Remover avatar', 'seu-tema' ),
        'use_featured_image'    => __( 'Usar como avatar', 'seu-tema' ),
        'insert_into_item'      => __( 'Inserir no depoimento', 'seu-tema' ),
        'uploaded_to_this_item' => __( 'Carregado para este depoimento', 'seu-tema' ),
        'items_list'            => __( 'Lista de Depoimentos', 'seu-tema' ),
        'items_list_navigation' => __( 'Navegação da lista de depoimentos', 'seu-tema' ),
        'filter_items_list'     => __( 'Filtrar lista de depoimentos', 'seu-tema' ),
    );
    $args = array(
        'label'                 => __( 'Depoimento', 'seu-tema' ),
        'description'           => __( 'Depoimentos de clientes e parceiros', 'seu-tema' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ), // Título (Nome), Editor (Depoimento), Imagem Destacada (Avatar)
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6, // Abaixo de "Parceiros" ou onde preferir
        'menu_icon'             => 'dashicons-format-quote', // Ícone de aspas
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'rewrite'               => array('slug' => 'depoimento'),
    );
    register_post_type( 'depoimento', $args );
}
add_action( 'init', 'criar_cpt_depoimentos', 0 );

/**
 * Adicionar campo customizado para Cargo/Empresa do depoente
 */
function adicionar_meta_box_depoimento() {
    add_meta_box(
        'depoimento_info_meta_box', // ID do meta box
        __( 'Informações do Depoente', 'seu-tema' ), // Título do meta box
        'render_meta_box_depoimento', // Callback para exibir o conteúdo
        'depoimento', // Para qual CPT este meta box será exibido
        'normal', // Contexto (onde ele aparece na tela de edição)
        'high' // Prioridade
    );
}
add_action( 'add_meta_boxes', 'adicionar_meta_box_depoimento' );

/**
 * Renderiza o conteúdo do meta box
 */
function render_meta_box_depoimento( $post ) {
    // Adicionar um nonce para segurança
    wp_nonce_field( 'salvar_depoimento_info', 'depoimento_info_nonce' );

    // Obter o valor atual do campo (se existir)
    $cargo_empresa = get_post_meta( $post->ID, '_depoimento_cargo_empresa', true );
    ?>
    <p>
        <label for="depoimento_cargo_empresa"><?php _e( 'Cargo e Empresa do Depoente:', 'seu-tema' ); ?></label>
        <br>
        <input type="text" id="depoimento_cargo_empresa" name="depoimento_cargo_empresa" value="<?php echo esc_attr( $cargo_empresa ); ?>" style="width: 100%;" />
    </p>
    <?php
}

/**
 * Salva os dados do meta box quando o post é salvo
 */
function salvar_meta_box_depoimento( $post_id ) {
    // Verificar se o nonce está presente e é válido
    if ( ! isset( $_POST['depoimento_info_nonce'] ) || ! wp_verify_nonce( $_POST['depoimento_info_nonce'], 'salvar_depoimento_info' ) ) {
        return $post_id;
    }

    // Verificar se o usuário tem permissão para editar posts
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }

    // Verificar se é um autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    // Verificar se é o CPT 'depoimento'
    if ( 'depoimento' !== $_POST['post_type'] ) {
        return $post_id;
    }

    // Salvar o campo 'cargo_empresa'
    if ( isset( $_POST['depoimento_cargo_empresa'] ) ) {
        $novo_cargo_empresa = sanitize_text_field( $_POST['depoimento_cargo_empresa'] );
        update_post_meta( $post_id, '_depoimento_cargo_empresa', $novo_cargo_empresa );
    }
}
add_action( 'save_post', 'salvar_meta_box_depoimento' );