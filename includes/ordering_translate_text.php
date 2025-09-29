<?php
add_action( 'init', function() {
    // Verifica se a função do Polylang existe antes de usá-la.
    if ( function_exists( 'pll_register_string' ) ) {

        // --- Grupo: Hero Principal ---
        // O terceiro parâmetro 'Hero Principal' é o nome do grupo que você quer criar.
        pll_register_string( 
            'home_hero_titulo_linha1', // Nome (key) da string
            get_theme_mod( 'home_hero_titulo_linha1', 'Ingredientes para Bebidas' ), // O valor a ser traduzido
            'Hero Principal', // Nome do Grupo
            false // É multilinha? (false para texto, true para textarea)
        );
        pll_register_string( 
            'home_hero_titulo_linha2', 
            get_theme_mod( 'home_hero_titulo_linha2', 'e Alimentos' ), 
            'Hero Principal', 
            false
        );
        pll_register_string( 
            'home_hero_subtitulo', 
            get_theme_mod( 'home_hero_subtitulo', 'Este é um subtítulo...' ), 
            'Hero Principal', 
            false
        );
        pll_register_string( 
            'home_hero_botao_texto', 
            get_theme_mod( 'home_hero_botao_texto', 'Ver Produtos' ), 
            'Hero Principal', 
            false 
        );
        pll_register_string( 
            'home_hero_botao2_texto', 
            get_theme_mod( 'home_hero_botao2_texto', 'Solicitar Cotação' ), 
            'Hero Principal', 
            false 
        );

        // --- Você pode criar outros grupos para outras seções ---
        /*
        pll_register_string(
            'footer_copyright_text',
            get_theme_mod('footer_copyright_text', '© 2025 Viatrop'),
            'Rodapé',
            false
        );
        */
    }
});