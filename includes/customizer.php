<?php

function viatrop_customizer_hero( $wp_customize ) {
// 1. CRIAR O PAINEL PRINCIPAL (opcional, mas organiza melhor)
    // Um painel é como uma pasta de nível superior para agrupar seções.
    $wp_customize->add_panel( 'home_panel', array(
        'title'       => __( 'Opções da Seção Hero', 'viatrop' ),
        'priority'    => 30,
        'description' => __( 'Gerencie o conteúdo da página inicial aqui.', 'viatrop' ),
    ) );

    // 2. CRIAR A SEÇÃO DENTRO DO PAINEL
    // A seção é onde os campos (controles) realmente aparecem.
    $wp_customize->add_section( 'home_hero_section', array(
        'title'    => __( 'Seção Principal (Topo)', 'viatrop' ),
        'panel'    => 'home_panel', // Vincula esta seção ao painel que criamos acima.
        'priority' => 10,
    ) );

    // 3. ADICIONAR OS CAMPOS (CONFIGURAÇÃO + CONTROLE)
    // Para cada campo, precisamos de uma 'setting' (que salva no banco de dados)
    // e um 'control' (que é o campo visual que o usuário vê).

    // --- Campo: Título Principal ---
    $wp_customize->add_setting( 'home_hero_titulo_linha1', array(
    'default'   => 'Ingredientes para Bebidas',
    'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'home_hero_titulo_linha1_control', array(
        'label'    => __( 'Título (Primeira Linha)', 'viatrop' ),
        'section'  => 'home_hero_section',
        'settings' => 'home_hero_titulo_linha1',
        'type'     => 'text',
    ) );

    // --- NOVO: Campo Título (Linha 2) ---
    $wp_customize->add_setting( 'home_hero_titulo_linha2', array(
        'default'   => 'e Alimentos',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'home_hero_titulo_linha2_control', array(
        'label'    => __( 'Título (Segunda Linha - Colorida)', 'viatrop' ),
        'section'  => 'home_hero_section',
        'settings' => 'home_hero_titulo_linha2',
        'type'     => 'text',
    ) );

    // --- NOVO: Campo Seletor de Cor ---
    $wp_customize->add_setting( 'home_hero_titulo_cor', array(
        'default'   => '#a3e635', // Cor padrão (lime-400)
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_hero_titulo_cor_control', array(
        'label'    => __( 'Cor da Segunda Linha', 'viatrop' ),
        'section'  => 'home_hero_section',
        'settings' => 'home_hero_titulo_cor',
    ) ) );

    // --- Campo: Subtítulo ---
    $wp_customize->add_setting( 'home_hero_subtitulo', array(
        'default'   => 'Este é um subtítulo que pode ser editado no personalizador.',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'home_hero_subtitulo_control', array(
        'label'    => __( 'Subtítulo', 'viatrop' ),
        'section'  => 'home_hero_section',
        'settings' => 'home_hero_subtitulo',
        'type'     => 'textarea',
    ));

    // --- Campo: Texto do Botão ---
    $wp_customize->add_setting( 'home_hero_botao_texto', array(
        'default'   => 'Ver Produtos',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'home_hero_botao_texto_control', array(
        'label'    => __( 'Texto do Botão', 'viatrop' ),
        'section'  => 'home_hero_section',
        'settings' => 'home_hero_botao_texto',
        'type'     => 'text',
    ));

    // --- Campo: Link do Botão ---
    $wp_customize->add_setting( 'home_hero_botao_link', array(
        'default'   => '#',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'home_hero_botao_link_control', array(
        'label'    => __( 'Link do Botão', 'viatrop' ),
        'section'  => 'home_hero_section',
        'settings' => 'home_hero_botao_link',
        'type'     => 'url',
    ));

    // --- Campo: Texto do Botão 2 ---
    $wp_customize->add_setting( 'home_hero_botao2_texto', array('default' => 'Solicitar Cotação'));
    $wp_customize->add_control( 'home_hero_botao2_texto_control', array(
        'label'    => __( 'Texto do Botão 2', 'viatrop' ),
        'section'  => 'home_hero_section',
        'settings' => 'home_hero_botao2_texto',
        'type'     => 'text',
    ));

    // --- Campo: Imagem de Fundo ---
    $wp_customize->add_setting( 'home_hero_imagem', array(
        'default'   => '', // Pode ser uma URL padrão ou vazio.
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_hero_imagem_control', array(
        'label'    => __( 'Imagem de Fundo', 'viatrop' ),
        'section'  => 'home_hero_section',
        'settings' => 'home_hero_imagem',
    )));

    // --- Campo: Destaques ---
    $numero_de_destaques = 3;

    for($i = 0; $i < $numero_de_destaques; $i++) {
        // --- Campo: Ícone do Destaque ---
        $wp_customize->add_setting( 'home_hero_destaque_icone_' . $i, array('default' => ''));
        $wp_customize->add_control( 'home_hero_destaque_icone_control_' . $i, array(
            'label'    => __( 'Ícone do Destaque ' . ($i + 1) . ' (código SVG)', 'viatrop' ),
            'section'  => 'home_hero_section',
            'settings' => 'home_hero_destaque_icone_' . $i,
            'type'     => 'textarea',
            'description' => __( 'Cole o código SVG completo do ícone aqui.', 'viatrop' ),
        ) );

        // --- Campo: Texto do Destaque ---
        $wp_customize->add_setting( 'home_hero_destaque_texto_' . $i, array('default' => 'Texto do destaque ' . ($i + 1)));
        $wp_customize->add_control( 'home_hero_destaque_texto_control_' . $i, array(
            'label'    => __( 'Texto do Destaque ' . ($i + 1), 'viatrop' ),
            'section'  => 'home_hero_section',
            'settings' => 'home_hero_destaque_texto_' . $i,
            'type'     => 'text',
        ) );
    }

}

add_action( 'customize_register', 'viatrop_customizer_hero' );

function viatrop_customizer_servicos( $wp_customize ) {
    // Criar um painel para a seção de serviços (opcional, mas ajuda na organização)
    $wp_customize->add_panel( 'servicos_panel', array(
        'title'       => __( 'Opções da Seção Serviços', 'viatrop' ),
        'priority'    => 40, // Define a ordem no menu principal do Customizer
        'description' => __( 'Gerencie o conteúdo da seção de serviços aqui.', 'viatrop' ),
    ) );
    // 1. ADICIONAR A SEÇÃO DE SERVIÇOS
    $wp_customize->add_section( 'home_servicos_section', array(
        'title'    => __( 'Seção de Serviços', 'viatrop' ),
        'panel'    => 'servicos_panel', // Vincula ao painel "Opções da Página Inicial" que já existe
        'priority' => 40,
    ) );
    
    // 2. CONTROLE PARA MOSTRAR/ESCONDER A SEÇÃO INTEIRA
    $wp_customize->add_setting( 'servico_secao_visivel', array(
        'default'   => true,
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'servico_secao_visivel_control', array(
        'label'    => __( 'Mostrar esta seção?', 'viatrop' ),
        'section'  => 'home_servicos_section',
        'settings' => 'servico_secao_visivel',
        'type'     => 'checkbox',
    ) );

    // --- Campo: Titulo principal servicos ---
    $wp_customize->add_setting( 'servico_titulo_principal', array(
        'default'   => 'Nossas Soluções',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'servico_titulo_principal_control', array(
        'label'    => __( 'Título Principal da Seção de Serviços', 'viatrop' ),
        'section'  => 'home_servicos_section',
        'settings' => 'servico_titulo_principal',
        'type'     => 'text',
    ) );

    // --- Campo: Subtítulo principal servicos ---
    $wp_customize->add_setting( 'servico_subtitulo_principal', array(
        'default'   => 'Oferecemos um portfólio completo de serviços para otimizar sua cadeia de suprimentos e impulsionar seu negócio de bebidas e alimentos.',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'servico_subtitulo_principal_control', array(
        'label'    => __( 'Subtítulo da Seção de Serviços', 'viatrop' ),
        'section'  => 'home_servicos_section',
        'settings' => 'servico_subtitulo_principal',
        'type'     => 'textarea',
    ) );

    // 3. ADICIONAR CAMPOS PARA CADA SERVIÇO USANDO UM LOOP
    $numero_de_servicos = 6;

    for ( $i = 1; $i <= $numero_de_servicos; $i++ ) {
        // --- Separador para organização ---
        $wp_customize->add_setting( 'servico_hr_' . $i, array('sanitize_callback' => 'esc_attr') );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'servico_hr_' . $i, array(
            'section'  => 'home_servicos_section',
            'type'     => 'hidden',
            'description' => '<hr><h4>Serviço ' . $i . '</h4>',
        )));

        // --- Campo: Ícone (SVG) ---
        $wp_customize->add_setting( 'servico_icone_' . $i, array('default' => ''));
        $wp_customize->add_control( 'servico_icone_control_' . $i, array(
            'label'    => __( 'Ícone (código SVG)', 'viatrop' ),
            'section'  => 'home_servicos_section',
            'settings' => 'servico_icone_' . $i,
            'type'     => 'textarea',
            'description' => __( 'Cole o código SVG completo do ícone aqui.', 'viatrop' ),
        ) );

        // --- Campo: Título ---
        $wp_customize->add_setting( 'servico_titulo_' . $i, array('default' => 'Título do Serviço ' . $i));
        $wp_customize->add_control( 'servico_titulo_control_' . $i, array(
            'label'    => __( 'Título', 'viatrop' ),
            'section'  => 'home_servicos_section',
            'settings' => 'servico_titulo_' . $i,
            'type'     => 'text',
        ) );

        // --- Campo: Descrição ---
        $wp_customize->add_setting( 'servico_descricao_' . $i, array('default' => 'Descrição do serviço...'));
        $wp_customize->add_control( 'servico_descricao_control_' . $i, array(
            'label'    => __( 'Descrição', 'viatrop' ),
            'section'  => 'home_servicos_section',
            'settings' => 'servico_descricao_' . $i,
            'type'     => 'textarea',
        ) );
    }
}
add_action( 'customize_register', 'viatrop_customizer_servicos' );

function viatrop_customizer_sobre( $wp_customize ) {

    // 1. ADICIONA O PAINEL PRINCIPAL
    $wp_customize->add_panel( 'sobre_panel', array(
        'title'       => __( 'Opções da Seção Sobre', 'viotrop-theme' ),
        'priority'    => 50,
        'description' => __( 'Personalize o conteúdo da seção "Sobre" da sua página inicial.', 'viotrop-theme' ),
    ) );

    // =================================================================
    // SEÇÃO: CONTEÚDO PRINCIPAL (COLUNA ESQUERDA)
    // =================================================================
    $wp_customize->add_section( 'sobre_conteudo_principal_section', array(
        'title'    => __( 'Conteúdo Principal (Esquerda)', 'viotrop-theme' ),
        'panel'    => 'sobre_panel',
        'priority' => 10,
    ) );

    // Título Principal
    $wp_customize->add_setting( 'sobre_titulo_principal', array(
        'default'   => 'Conectando o Campo à Indústria',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'sobre_titulo_principal', array(
        'label'    => __( 'Título Principal', 'viotrop-theme' ),
        'section'  => 'sobre_conteudo_principal_section',
        'type'     => 'text',
    ) );

    // Parágrafo Principal
    $wp_customize->add_setting( 'sobre_paragrafo_principal', array(
        'default'   => 'A ViaTrop nasceu da paixão pelas frutas e do desejo de criar pontes estratégicas entre produtores e mercado, sempre garantindo o melhor produto.',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'sobre_paragrafo_principal', array(
        'label'    => __( 'Parágrafo Principal', 'viotrop-theme' ),
        'section'  => 'sobre_conteudo_principal_section',
        'type'     => 'textarea',
    ) );
    
    // Título Diferencial 1
    $wp_customize->add_setting( 'sobre_diferencial_1_titulo', array(
        'default'   => 'Nossa História, Sua Vantagem',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'sobre_diferencial_1_titulo', array(
        'label'    => __( 'Título do 1º Diferencial', 'viotrop-theme' ),
        'section'  => 'sobre_conteudo_principal_section',
        'type'     => 'text',
    ) );

    // Texto Diferencial 1
    $wp_customize->add_setting( 'sobre_diferencial_1_texto', array(
        'default'   => 'Com mais de 30 anos de networking, a ViaTrop foi fundada em 2015 para revolucionar o fornecimento de matérias-primas.',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'sobre_diferencial_1_texto', array(
        'label'    => __( 'Texto do 1º Diferencial', 'viotrop-theme' ),
        'section'  => 'sobre_conteudo_principal_section',
        'type'     => 'textarea',
    ) );

    // Título Diferencial 2
    $wp_customize->add_setting( 'sobre_diferencial_2_titulo', array(
        'default'   => 'Foco no Cliente',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'sobre_diferencial_2_titulo', array(
        'label'    => __( 'Título do 2º Diferencial', 'viotrop-theme' ),
        'section'  => 'sobre_conteudo_principal_section',
        'type'     => 'text',
    ) );

    // Texto Diferencial 2
    $wp_customize->add_setting( 'sobre_diferencial_2_texto', array(
        'default'   => 'Facilitamos negociações otimizando qualidade, logística e custos para atender demandas específicas de cada cliente.',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'sobre_diferencial_2_texto', array(
        'label'    => __( 'Texto do 2º Diferencial', 'viotrop-theme' ),
        'section'  => 'sobre_conteudo_principal_section',
        'type'     => 'textarea',
    ) );

    // =================================================================
    // SEÇÃO: ESTATÍSTICAS (COLUNA DIREITA)
    // =================================================================
    $wp_customize->add_section( 'sobre_estatisticas_section', array(
        'title'    => __( 'Estatísticas (Direita)', 'viotrop-theme' ),
        'panel'    => 'sobre_panel',
        'priority' => 20,
    ) );
    
    // Número Estatística 1
    $wp_customize->add_setting( 'sobre_estatistica_1_numero', array( 'default' => '30+', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'sobre_estatistica_1_numero', array( 'label' => __( 'Número (Ex: 30+)', 'viotrop-theme' ), 'section' => 'sobre_estatisticas_section', 'type' => 'text' ) );
    
    // Texto Estatística 1
    $wp_customize->add_setting( 'sobre_estatistica_1_texto', array( 'default' => 'Anos de Experiência', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'sobre_estatistica_1_texto', array( 'label' => __( 'Texto da 1ª Estatística', 'viotrop-theme' ), 'section' => 'sobre_estatisticas_section', 'type' => 'text' ) );
    
    // Número Estatística 2
    $wp_customize->add_setting( 'sobre_estatistica_2_numero', array( 'default' => '100+', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'sobre_estatistica_2_numero', array( 'label' => __( 'Número (Ex: 100+)', 'viotrop-theme' ), 'section' => 'sobre_estatisticas_section', 'type' => 'text' ) );

    // Texto Estatística 2
    $wp_customize->add_setting( 'sobre_estatistica_2_texto', array( 'default' => 'Parcerias Ativas', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'sobre_estatistica_2_texto', array( 'label' => __( 'Texto da 2ª Estatística', 'viotrop-theme' ), 'section' => 'sobre_estatisticas_section', 'type' => 'text' ) );

    // Título do Tripé
    $wp_customize->add_setting( 'sobre_tripe_titulo', array( 'default' => 'Qualidade, Logística e Custos', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'sobre_tripe_titulo', array( 'label' => __( 'Título do Tripé de Excelência', 'viotrop-theme' ), 'section' => 'sobre_estatisticas_section', 'type' => 'text' ) );

    // Texto do Tripé
    $wp_customize->add_setting( 'sobre_tripe_texto', array( 'default' => 'Nosso tripé de excelência em cada projeto', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'sobre_tripe_texto', array( 'label' => __( 'Texto do Tripé de Excelência', 'viotrop-theme' ), 'section' => 'sobre_estatisticas_section', 'type' => 'text' ) );


    // =================================================================
    // SEÇÃO: BLOCOS DE VANTAGENS (INFERIOR)
    // =================================================================
    $wp_customize->add_section( 'sobre_vantagens_section', array(
        'title'    => __( 'Blocos de Vantagens (Inferior)', 'viotrop-theme' ),
        'panel'    => 'sobre_panel',
        'priority' => 30,
    ) );

    // Vantagem 1
    $wp_customize->add_setting( 'sobre_vantagem_1_titulo', array( 'default' => 'Qualidade Superior', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'sobre_vantagem_1_titulo', array( 'label' => __( 'Título Vantagem 1', 'viotrop-theme' ), 'section' => 'sobre_vantagens_section', 'type' => 'text' ) );
    $wp_customize->add_setting( 'sobre_vantagem_1_texto', array( 'default' => 'Visitamos os pomares e selecionamos as melhores fontes para garantir a mais alta qualidade em sucos, polpas e concentrados.', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'sobre_vantagem_1_texto', array( 'label' => __( 'Texto Vantagem 1', 'viotrop-theme' ), 'section' => 'sobre_vantagens_section', 'type' => 'textarea' ) );

    // Vantagem 2
    $wp_customize->add_setting( 'sobre_vantagem_2_titulo', array( 'default' => 'Parcerias Sólidas', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'sobre_vantagem_2_titulo', array( 'label' => __( 'Título Vantagem 2', 'viotrop-theme' ), 'section' => 'sobre_vantagens_section', 'type' => 'text' ) );
    $wp_customize->add_setting( 'sobre_vantagem_2_texto', array( 'default' => 'Construímos relacionamentos de longo prazo baseados em confiança e lealdade com produtores e processadores.', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'sobre_vantagem_2_texto', array( 'label' => __( 'Texto Vantagem 2', 'viotrop-theme' ), 'section' => 'sobre_vantagens_section', 'type' => 'textarea' ) );

    // Vantagem 3
    $wp_customize->add_setting( 'sobre_vantagem_3_titulo', array( 'default' => 'Foco no Cliente', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'sobre_vantagem_3_titulo', array( 'label' => __( 'Título Vantagem 3', 'viotrop-theme' ), 'section' => 'sobre_vantagens_section', 'type' => 'text' ) );
    $wp_customize->add_setting( 'sobre_vantagem_3_texto', array( 'default' => 'Facilitamos negociações otimizando qualidade, logística e custos para atender às demandas específicas de cada cliente.', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'sobre_vantagem_3_texto', array( 'label' => __( 'Texto Vantagem 3', 'viotrop-theme' ), 'section' => 'sobre_vantagens_section', 'type' => 'textarea' ) );

}
add_action( 'customize_register', 'viatrop_customizer_sobre' );

function viatrop_personalizador_contato( $wp_customize ) {
    // 1. CRIAR O PAINEL PRINCIPAL
    $wp_customize->add_panel( 'contato_panel', array(
        'title'       => __( 'Opções da Seção de Contato', 'viatrop' ),
        'priority'    => 60,
        'description' => __( 'Gerencie o conteúdo da seção de Contato aqui.', 'viatrop' ),
    ) );

    // 2. CRIAR A SEÇÃO DE CONTEÚDO
    $wp_customize->add_section( 'contato_conteudo_section', array(
        'title' => __( 'Conteúdo Principal', 'viatrop' ),
        'panel' => 'contato_panel',
    ) );

    // --- Campo: Título Principal ---
    $wp_customize->add_setting( 'contato_titulo', array(
        'default'   => 'Entre em Contato',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'contato_titulo_control', array(
        'label'    => __( 'Título Principal', 'viatrop' ),
        'section'  => 'contato_conteudo_section',
        'settings' => 'contato_titulo',
        'type'     => 'text',
    ) );

    // --- Campo: Subtítulo ---
    $wp_customize->add_setting( 'contato_subtitulo', array(
        'default'   => 'Estamos prontos para atender suas necessidades. Fale conosco!',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'contato_subtitulo_control', array(
        'label'    => __( 'Subtítulo', 'viatrop' ),
        'section'  => 'contato_conteudo_section',
        'settings' => 'contato_subtitulo',
        'type'     => 'textarea',
    ) );

    // --- Campo: Telefone ---
    $wp_customize->add_setting( 'contato_telefone', array(
        'default'   => '+55 34 99339-2111',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'contato_telefone_control', array(
        'label'    => __( 'Telefone', 'viatrop' ),
        'section'  => 'contato_conteudo_section',
        'settings' => 'contato_telefone',
        'type'     => 'text',
    ) );
    
    // --- Campo: Email ---
    $wp_customize->add_setting( 'contato_email', array(
        'default'   => 'contato@empresa.com',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'contato_email_control', array(
        'label'    => __( 'Email', 'viatrop' ),
        'section'  => 'contato_conteudo_section',
        'settings' => 'contato_email',
        'type'     => 'email',
    ) );

    // --- Campo: Endereço ---
    $wp_customize->add_setting( 'contato_endereco', array(
        'default'   => 'Minas Gerais, Brasil',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'contato_endereco_control', array(
        'label'    => __( 'Endereço', 'viatrop' ),
        'section'  => 'contato_conteudo_section',
        'settings' => 'contato_endereco',
        'type'     => 'text',
    ) );
    
    // --- Campo: Texto do Botão WhatsApp ---
    $wp_customize->add_setting( 'contato_whatsapp_texto', array(
        'default'   => 'Falar com Especialista no WhatsApp',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'contato_whatsapp_texto_control', array(
        'label'    => __( 'Texto do Botão WhatsApp', 'viatrop' ),
        'section'  => 'contato_conteudo_section',
        'settings' => 'contato_whatsapp_texto',
        'type'     => 'text',
    ) );

    // --- Campo: Link do Botão WhatsApp ---
    $wp_customize->add_setting( 'contato_whatsapp_link', array(
        'default'   => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'contato_whatsapp_link_control', array(
        'label'    => __( 'Link do Botão WhatsApp', 'viatrop' ),
        'section'  => 'contato_conteudo_section',
        'settings' => 'contato_whatsapp_link',
        'type'     => 'url',
    ) );

    // --- Campo: Shortcode do Formulário ---
    $wp_customize->add_setting( 'contato_form_shortcode', array(
        'default'   => '[contact-form-7 id="be70753" title="Formulário de contato"]',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'contato_form_shortcode_control', array(
        'label'       => __( 'Shortcode do Formulário', 'viatrop' ),
        'description' => __( 'Cole aqui o shortcode do seu formulário de contato (ex: do Contact Form 7).', 'viatrop' ),
        'section'     => 'contato_conteudo_section',
        'settings'    => 'contato_form_shortcode',
        'type'        => 'text',
    ) );
}
add_action( 'customize_register', 'viatrop_personalizador_contato' );

function viatrop_personalizador_footer( $wp_customize ) {
    // 1. CRIAR O PAINEL DO RODAPÉ
    $wp_customize->add_panel( 'footer_panel', array(
        'title'       => __( 'Opções do Rodapé', 'viatrop' ),
        'priority'    => 70,
        'description' => __( 'Gerencie todo o conteúdo do rodapé aqui.', 'viatrop' ),
    ) );

    // 2. SEÇÃO DE IDENTIDADE E REDES SOCIAIS (COLUNA ESQUERDA)
    $wp_customize->add_section( 'footer_identidade_section', array(
        'title' => __( 'Identidade e Redes Sociais', 'viatrop' ),
        'panel' => 'footer_panel',
    ) );

    // --- Campo: Logo do Rodapé ---
    $wp_customize->add_setting( 'footer_logo', array('default' => '') );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo_control', array(
        'label'    => __( 'Logo do Rodapé', 'viatrop' ),
        'section'  => 'footer_identidade_section',
        'settings' => 'footer_logo',
    )));

    // --- Campo: Descrição Curta ---
    $wp_customize->add_setting( 'footer_descricao', array(
        'default'   => 'Conectando as melhores agroindústrias às suas necessidades com expertise em frutas, sucos e polpas de qualidade superior.',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'footer_descricao_control', array(
        'label'    => __( 'Descrição Curta', 'viatrop' ),
        'section'  => 'footer_identidade_section',
        'settings' => 'footer_descricao',
        'type'     => 'textarea',
    ) );

    // --- Campos: Links das Redes Sociais ---
    $wp_customize->add_setting( 'footer_linkedin_url', array('default' => '#', 'sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'footer_linkedin_url_control', array('label' => 'Link do LinkedIn', 'section' => 'footer_identidade_section', 'settings' => 'footer_linkedin_url', 'type' => 'url') );

    $wp_customize->add_setting( 'footer_instagram_url', array('default' => '#', 'sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'footer_instagram_url_control', array('label' => 'Link do Instagram', 'section' => 'footer_identidade_section', 'settings' => 'footer_instagram_url', 'type' => 'url') );
    
    $wp_customize->add_setting( 'footer_facebook_url', array('default' => '#', 'sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'footer_facebook_url_control', array('label' => 'Link do Facebook', 'section' => 'footer_identidade_section', 'settings' => 'footer_facebook_url', 'type' => 'url') );

    // 3. SEÇÃO DE INFORMAÇÕES DE CONTATO (COLUNA DIREITA)
    $wp_customize->add_section( 'footer_contato_section', array(
        'title' => __( 'Informações de Contato', 'viatrop' ),
        'panel' => 'footer_panel',
    ) );

    $wp_customize->add_setting( 'footer_contato_telefone', array('default' => '+55 34 9 9339-2111 / +55 34 9 9158-6658', 'sanitize_callback' => 'sanitize_text_field') );
    $wp_customize->add_control( 'footer_contato_telefone_control', array('label' => 'Telefones de Contato', 'section' => 'footer_contato_section', 'settings' => 'footer_contato_telefone', 'type' => 'text') );

    $wp_customize->add_setting( 'footer_contato_email', array('default' => 'viatrop@viatrop.com.br', 'sanitize_callback' => 'sanitize_email') );
    $wp_customize->add_control( 'footer_contato_email_control', array('label' => 'Email de Contato', 'section' => 'footer_contato_section', 'settings' => 'footer_contato_email', 'type' => 'email') );
    
    $wp_customize->add_setting( 'footer_contato_endereco', array('default' => 'Praça Prefeito Elmiro Barbosa, 188, Sala 13<br>Araguari, MG', 'sanitize_callback' => 'wp_kses_post') );
    $wp_customize->add_control( 'footer_contato_endereco_control', array('label' => 'Endereço', 'section' => 'footer_contato_section', 'settings' => 'footer_contato_endereco', 'type' => 'textarea') );

    // 4. SEÇÃO DA BARRA INFERIOR (COPYRIGHT, LINKS)
    $wp_customize->add_section( 'footer_barra_inferior_section', array(
        'title' => __( 'Barra Inferior', 'viatrop' ),
        'panel' => 'footer_panel',
    ) );
    
    $wp_customize->add_setting( 'footer_copyright', array('default' => '© 2024 Viatrop. Todos os direitos reservados.', 'sanitize_callback' => 'sanitize_text_field') );
    $wp_customize->add_control( 'footer_copyright_control', array('label' => 'Texto de Copyright', 'section' => 'footer_barra_inferior_section', 'settings' => 'footer_copyright', 'type' => 'text') );

    $wp_customize->add_setting( 'footer_privacidade_texto', array('default' => 'Política de Privacidade', 'sanitize_callback' => 'sanitize_text_field') );
    $wp_customize->add_control( 'footer_privacidade_texto_control', array('label' => 'Texto do Link de Privacidade', 'section' => 'footer_barra_inferior_section', 'settings' => 'footer_privacidade_texto', 'type' => 'text') );
    $wp_customize->add_setting( 'footer_privacidade_url', array('default' => '#', 'sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'footer_privacidade_url_control', array('label' => 'Link da Política de Privacidade', 'section' => 'footer_barra_inferior_section', 'settings' => 'footer_privacidade_url', 'type' => 'url') );
    
    $wp_customize->add_setting( 'footer_termos_texto', array('default' => 'Termos de Uso', 'sanitize_callback' => 'sanitize_text_field') );
    $wp_customize->add_control( 'footer_termos_texto_control', array('label' => 'Texto do Link de Termos', 'section' => 'footer_barra_inferior_section', 'settings' => 'footer_termos_texto', 'type' => 'text') );
    $wp_customize->add_setting( 'footer_termos_url', array('default' => '#', 'sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'footer_termos_url_control', array('label' => 'Link dos Termos de Uso', 'section' => 'footer_barra_inferior_section', 'settings' => 'footer_termos_url', 'type' => 'url') );

    $wp_customize->add_setting( 'footer_cnpj', array('default' => 'CNPJ: 22.318.499/0001-12', 'sanitize_callback' => 'sanitize_text_field') );
    $wp_customize->add_control( 'footer_cnpj_control', array('label' => 'CNPJ', 'section' => 'footer_barra_inferior_section', 'settings' => 'footer_cnpj', 'type' => 'text') );
}
add_action( 'customize_register', 'viatrop_personalizador_footer' );