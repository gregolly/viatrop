<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

  <meta charset=”<?php bloginfo('charset'); ?>”>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="<?php bloginfo('description'); ?>" />

  <title><?php wp_title('|', true,'right'); ?></title>

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="top-info-bar" class="... seu código da barra superior ...">
        </div>

    <div class="menu-de-idiomas-topo">
        <ul class="d-flex justify-content-center p-2 m-0 gap-3">
            <?php 
            // Verifica se a função do Polylang existe antes de chamá-la
            if ( function_exists( 'pll_the_languages' ) ) {
                pll_the_languages( array( 
                    'show_flags' => 1,      // 1 para mostrar bandeiras, 0 para ocultar
                    'show_names' => 1,      // 1 para mostrar nomes, 0 para ocultar
                    'dropdown'   => 0       // 1 para criar um dropdown, 0 para lista
                ) ); 
            }
            ?>
        </ul>
    </div>

    <header class="site-header sticky-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                
                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php 
                    // Seu código PHP para a logo...
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                    if (has_custom_logo()) {
                        echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" style="max-height: 50px; width: auto;">';
                    } else {
                        bloginfo('name');
                    }
                    ?>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainNavbar">
                    <?php
                    // Menu Principal (agora com as classes corretas do Bootstrap)
                    wp_nav_menu(array(
                        'theme_location' => 'main-menu',
                        'container'      => false,
                        'menu_class'     => 'navbar-nav mx-auto mb-lg-0', // Classe principal para o menu
                        'add_li_class'   => 'nav-item', // Adiciona 'nav-item' a cada <li>
                        'link_class'     => 'nav-link'  // Adiciona 'nav-link' a cada <a>
                    ));
                    ?>
                    
                    <div class="d-none d-lg-flex ms-lg-2">
                         <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#quoteModal">
                            Solicitar Cotação
                        </button>
                    </div>

                    <div class="d-lg-none mt-3">
                        <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#quoteModal">
                            Solicitar Cotação
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    </div>

    <?php