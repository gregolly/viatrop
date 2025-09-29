<?php
/**
 * Template Part: Section Products
 *
 * This component displays products from the 'product' CPT with a category filter.
 * It is designed to be reusable on the homepage and the product archive page.
 * This version includes messages for when no products are found.
 */
?>
<section id="produtos" class="py-5">
    <div class="container">
        <?php get_template_part('templates/product', 'title'); ?>

        <div class="row mb-4">
            <div class="col-md-8 mb-3 mb-md-0">
                <?php
                // Busca todas as categorias de produto que têm posts associados.
                $product_categories = get_terms(array(
                    'taxonomy'   => 'categoria_produto',
                    'hide_empty' => true,
                ));
                ?>
                <?php if (!empty($product_categories) && !is_wp_error($product_categories)) : ?>
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="btn btn-outline-primary active" id="pills-todos-tab" data-bs-toggle="pill" data-bs-target="#pills-todos" type="button" role="tab" aria-controls="pills-todos" aria-selected="true">Todos</button>
                        </li>
                        <?php foreach ($product_categories as $category) : ?>
                            <li class="nav-item" role="presentation">
                                <button class="btn btn-outline-primary ms-2" id="pills-<?php echo esc_attr($category->slug); ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo esc_attr($category->slug); ?>" type="button" role="tab" aria-controls="pills-<?php echo esc_attr($category->slug); ?>" aria-selected="false"><?php echo esc_html($category->name); ?></button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
                    </span>
                    <input type="text" id="product-search-input" class="form-control" placeholder="Buscar produtos...">
                </div>
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <!-- Aba "Todos" -->
            <div class="tab-pane fade show active" id="pills-todos" role="tabpanel" aria-labelledby="pills-todos-tab">
                <div class="row gy-4">
                    <?php
                    $all_products_query = new WP_Query(array(
                        'post_type'      => 'product',
                        'posts_per_page' => 6,
                    ));

                    if ($all_products_query->have_posts()) :
                        while ($all_products_query->have_posts()) : $all_products_query->the_post();
                            // CORREÇÃO APLICADA AQUI: Chamada correta para o template part.
                            get_template_part('templates/content', 'product-card');
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<div class="col"><p class="text-center">Nenhum produto encontrado.</p></div>';
                    endif;
                    ?>
                </div>
            </div>

            <!-- Abas por Categoria -->
            <?php if (!empty($product_categories) && !is_wp_error($product_categories)) : ?>
                <?php foreach ($product_categories as $category) : ?>
                    <div class="tab-pane fade" id="pills-<?php echo esc_attr($category->slug); ?>" role="tabpanel" aria-labelledby="pills-<?php echo esc_attr($category->slug); ?>-tab">
                        <div class="row gy-4">
                            <?php
                            $category_query = new WP_Query(array(
                                'post_type'      => 'product',
                                'posts_per_page' => 6,
                                'tax_query'      => array(
                                    array(
                                        'taxonomy' => 'categoria_produto',
                                        'field'    => 'slug',
                                        'terms'    => $category->slug,
                                    ),
                                ),
                            ));

                            if ($category_query->have_posts()) :
                                while ($category_query->have_posts()) : $category_query->the_post();
                                     // CORREÇÃO: Chamada correta para o template part.
                                     get_template_part('templates/content', 'product-card');
                                endwhile;
                                wp_reset_postdata();
                            else :
                                echo '<div class="col"><p class="text-center">Nenhum produto encontrado nesta categoria.</p></div>';
                            endif;
                            ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Adicione este JavaScript no seu arquivo JS principal ou no footer.php -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('product-search-input');
    if (searchInput) {
        searchInput.addEventListener('keyup', function () {
            const filter = searchInput.value.toLowerCase();
            const activeTabPane = document.querySelector('.tab-pane.active');
            if (!activeTabPane) return;

            const productCards = activeTabPane.querySelectorAll('.product-card-item');

            productCards.forEach(function(card) {
                const title = card.querySelector('.card-title').textContent.toLowerCase();
                if (title.includes(filter)) {
                    // O próprio 'card' é a coluna (col-sm-6...), então podemos modificar o seu display.
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }
});
</script>

