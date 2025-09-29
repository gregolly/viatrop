<?php 
/*
Template Name: Minha Página Principal Personalizada
*/
get_header();

// --- Lógica PHP no topo do arquivo ---
$imagem_url = get_theme_mod('home_hero_imagem');
$linha1 = get_theme_mod('home_hero_titulo_linha1', 'Ingredientes para Bebidas');
$linha2 = get_theme_mod('home_hero_titulo_linha2', 'e Alimentos');
$cor_linha2 = get_theme_mod('home_hero_titulo_cor', '#a3e635');

// Define a imagem padrão (fallback)
if (empty($imagem_url)) {
    // Verifique se o caminho para sua imagem padrão está correto
    $imagem_url = get_template_directory_uri() . '/assets/images/background.webp';
}
?>
<main class="main-home position-relative py-5 text-white" 
      style="background-image: linear-gradient(rgba(0, 100, 97, 0.7), rgba(0, 100, 97, 0.7)), url('<?php echo esc_url($imagem_url); ?>');
       background-repeat: no-repeat; background-position: center; background-size: cover;">
    
    <div class="container text-center">
        <?php if ($linha1) : ?>
            <h1 class="display-3 fw-bold mb-4 lh-1">
                <?php echo esc_html($linha1); ?>
                <?php if ($linha2) : ?>
                    <span class="d-block" style="color: <?php echo esc_attr($cor_linha2); ?>;">
                        <?php echo esc_html($linha2); ?>
                    </span>
                <?php endif; ?>
            </h1>
        <?php endif; ?>

        <?php
        $subtitulo = get_theme_mod('home_hero_subtitulo');
        if ($subtitulo) :
        ?>
            <div class="row justify-content-center">
                <div class="col-lg-9 col-xl-8">
                    <p class="fs-4 mb-5" style="opacity: 0.9;"><?php echo esc_html($subtitulo); ?></p>
                </div>
            </div>
        <?php endif; ?>
 
        <?php
        $texto_botao1 = get_theme_mod('home_hero_botao_texto');
        $link_botao1 = get_theme_mod('home_hero_botao_link');
        $texto_botao2 = get_theme_mod('home_hero_botao2_texto');

        // Container dos botões usando o sistema de Grid para garantir larguras iguais
        if (($texto_botao1 && $link_botao1) || ($texto_botao2)) :
        ?>
            <div class="row justify-content-center gx-3 gy-3 gy-sm-0 mb-5">

                <?php if ($texto_botao1 && $link_botao1) : ?>
                    <div class="col-sm-6 col-md-5 col-lg-4">
                        <a href="<?php echo esc_url($link_botao1); ?>" class="btn-hover btn btn-lg w-100 d-inline-flex align-items-center justify-content-center gap-2 icon-link icon-link-hover" style="background-color: #BDCE00; border-color: #BDCE00; color: white;">
                            <?php echo esc_html($texto_botao1); ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/></svg>
                        </a>
                    </div>
                <?php endif; ?>

                <?php if ($texto_botao2) : ?>
                    <div class="col-sm-6 col-md-5 col-lg-4">
                        <button type="button" class="btn btn-outline-light btn-lg w-100" data-bs-toggle="modal" data-bs-target="#quoteModal">
                            <?php echo esc_html($texto_botao2); ?>
                        </button>
                    </div>
                <?php endif; ?>

            </div>
        <?php endif; ?>

        <div class="container my-5">
    <div class="row text-center gy-4">

        <?php
        for ( $i = 0; $i < 3; $i++ ) :
            $icone = get_theme_mod('home_hero_destaque_icone_' . $i);
            $titulo = get_theme_mod('home_hero_destaque_texto_' . $i);
            if ( ! empty($titulo) && !empty($icone) ) :
        ?>
        <div class="col-12 col-md-4">
            <div class="d-inline-flex align-items-center justify-content-center">
                <?php echo $icone; // Exibimos o SVG diretamente. Não use esc_html() aqui. ?>
                <span class="fs-5"><?php echo esc_html($titulo) ?></span>
            </div>
        </div>
        <?php
            endif;
        endfor;  ?>
    </div>
</div>

        <?php 
        // Loop do WordPress apenas para o conteúdo do editor, sem o título
        if (have_posts()) :
            while (have_posts()) : the_post();
                // O conteúdo do editor aparecerá aqui
                the_content();
            endwhile;
        endif;
        ?>
    </div>
</main>

<?php get_template_part('templates/section-products'); ?>
<?php get_template_part('templates/section-services'); ?>
<?php get_template_part('templates/section-about'); ?>
<?php get_template_part('templates/section-contact'); ?>

<?php
get_footer();
?>