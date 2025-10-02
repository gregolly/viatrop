<?php
// Busca os termos da taxonomia 'tipo_produto' para o post atual
$tipos_produto = get_the_terms( get_the_ID(), 'tipo_produto' );

// Verifica se existem termos e se não ocorreu nenhum erro
if ( $tipos_produto && ! is_wp_error( $tipos_produto ) ) {
    
    // Cria um container para as badges para facilitar a estilização
    echo '<div class="card-badges mb-2">'; 

    // Loop para exibir cada tipo como uma badge
    foreach ( $tipos_produto as $tipo ) {
        // Usamos as classes de 'badge' do Bootstrap para o estilo
        echo '<span class="badge bg-secondary me-1">' . esc_html( $tipo->name ) . '</span>';
    }

    echo '</div>';
}