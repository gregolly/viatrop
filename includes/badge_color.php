<?php
/**
 * 1. Enfileira o script de seletor de cores do WordPress
 */
function vtp_enqueue_color_picker( $hook_suffix ) {
    // Verifica se estamos na página de edição de termos (taxonomias)
    if ( 'term.php' === $hook_suffix || 'edit-tags.php' === $hook_suffix ) {
        $screen = get_current_screen();
        
        // Verifica se é uma das suas taxonomias
        if ( $screen && in_array( $screen->taxonomy, array( 'tipo_produto', 'categoria_produto' ) ) ) {
            // Carrega os estilos do seletor de cores
            wp_enqueue_style( 'wp-color-picker' );
            
            // Adiciona o script inline para inicializar o seletor
            // O script 'wp-color-picker' já é uma dependência, então podemos adicionar inline
            wp_add_inline_script( 'wp-color-picker', '(function($){ $(function(){ $(".vtp-color-field").wpColorPicker(); }); })(jQuery);' );
        }
    }
}
add_action( 'admin_enqueue_scripts', 'vtp_enqueue_color_picker' );


/**
 * 2. Adiciona o campo de cor na tela de "Adicionar Novo Termo"
 */
function vtp_add_taxonomy_color_field( $taxonomy_slug ) {
    ?>
    <div class="form-field term-color-wrap">
        <label for="term-meta-cor-badge">Cor do Badge</label>
        <input name="term_meta[cor_do_badge]" class="vtp-color-field" type="text" value="" id="term-meta-cor-badge" />
        <p class="description">Escolha uma cor para o badge desta categoria/tipo.</p>
    </div>
    <?php
}
// Adiciona o campo para AMBAS as taxonomias
add_action( 'tipo_produto_add_form_fields', 'vtp_add_taxonomy_color_field', 10, 1 );
add_action( 'categoria_produto_add_form_fields', 'vtp_add_taxonomy_color_field', 10, 1 );


/**
 * 3. Adiciona o campo de cor na tela de "Editar Termo"
 */
function vtp_edit_taxonomy_color_field( $term ) {
    // Busca o valor salvo no banco de dados
    $color = get_term_meta( $term->term_id, 'cor_do_badge', true );
    $color = $color ? $color : ''; // Garante que temos um valor
    ?>
    <tr class="form-field term-color-wrap">
        <th scope="row">
            <label for="term-meta-cor-badge">Cor do Badge</label>
        </th>
        <td>
            <input name="term_meta[cor_do_badge]" class="vtp-color-field" type="text" value="<?php echo esc_attr( $color ); ?>" id="term-meta-cor-badge" />
            <p class="description">Escolha uma cor para o badge desta categoria/tipo.</p>
        </td>
    </tr>
    <?php
}
// Adiciona o campo para AMBAS as taxonomias
add_action( 'tipo_produto_edit_form_fields', 'vtp_edit_taxonomy_color_field', 10, 1 );
add_action( 'categoria_produto_edit_form_fields', 'vtp_edit_taxonomy_color_field', 10, 1 );


/**
 * 4. Salva o valor do campo de cor
 */
function vtp_save_taxonomy_color_meta( $term_id ) {
    // Verifica se o nosso campo foi enviado
    if ( isset( $_POST['term_meta'] ) && isset( $_POST['term_meta']['cor_do_badge'] ) ) {
        
        // Limpa e sanitiza o valor da cor (importante!)
        $color = sanitize_hex_color( $_POST['term_meta']['cor_do_badge'] );
        
        if ( $color ) {
            // Salva o valor
            update_term_meta( $term_id, 'cor_do_badge', $color );
        } else {
            // Se o campo estiver vazio, remove o meta
            delete_term_meta( $term_id, 'cor_do_badge' );
        }
    }
}
// Adiciona a ação de salvar para AMBAS as taxonomias (na criação e na edição)
add_action( 'created_tipo_produto', 'vtp_save_taxonomy_color_meta', 10, 1 );
add_action( 'edited_tipo_produto', 'vtp_save_taxonomy_color_meta', 10, 1 );
add_action( 'created_categoria_produto', 'vtp_save_taxonomy_color_meta', 10, 1 );
add_action( 'edited_categoria_produto', 'vtp_save_taxonomy_color_meta', 10, 1 );


/**
 * 5. (ESSENCIAL) Adiciona a função de contraste de cor que seu template está usando
 * * Seu arquivo content-product-card.php chama vtp_get_contrasting_text_color().
 * Esta função é necessária para ele funcionar.
 */
if ( ! function_exists('vtp_get_contrasting_text_color') ) {
    function vtp_get_contrasting_text_color( $hex_color ) {
        // Remove '#' se presente
        $hex_color = ltrim( $hex_color, '#' );

        // Converte hex para RGB
        if ( strlen( $hex_color ) == 3 ) {
            $r = hexdec( substr( $hex_color, 0, 1 ) . substr( $hex_color, 0, 1 ) );
            $g = hexdec( substr( $hex_color, 1, 1 ) . substr( $hex_color, 1, 1 ) );
            $b = hexdec( substr( $hex_color, 2, 1 ) . substr( $hex_color, 2, 1 ) );
        } else {
            $r = hexdec( substr( $hex_color, 0, 2 ) );
            $g = hexdec( substr( $hex_color, 2, 2 ) );
            $b = hexdec( substr( $hex_color, 4, 2 ) );
        }

        // Calcula o brilho (fórmula YIQ)
        $yiq = ( ( $r * 299 ) + ( $g * 587 ) + ( $b * 114 ) ) / 1000;
        
        // Retorna preto (#000000) para cores claras e branco (#ffffff) para cores escuras
        return ( $yiq >= 128 ) ? '#000000' : '#ffffff';
    }
}