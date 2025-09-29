<?php
// product title
$titulo_principal = get_theme_mod('produto_titulo_principal', 'Nossos Produtos');
$subtitulo_principal = get_theme_mod('produto_subtitulo_principal', 'Explore nossa variedade de produtos de alta qualidade.');
?>

<div class="row text-center mb-5">
    <div class="col">
        <h2 class="display-5 fw-bold"><?php echo esc_html( $titulo_principal ) ?></h2>
        <p class="lead"><?php echo esc_html( $subtitulo_principal ) ?></p>
    </div>
</div>