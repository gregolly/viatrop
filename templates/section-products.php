<?php
/**
 * Template Part: Section Products (AJAX Version)
 *
 * Displays products dynamically using AJAX filters for categories and types.
 */
?>
<section id="produtos" class="py-5">
    <div class="container">
        <?php get_template_part('templates/product', 'title'); ?>

        <div class="row mb-3">
            <div class="col-md-8 mb-3 mb-md-0">
                <?php
                $product_categories = get_terms(array(
                    'taxonomy'   => 'categoria_produto',
                    'hide_empty' => true,
                ));
                ?>
                <?php if (!empty($product_categories) && !is_wp_error($product_categories)) : ?>
                    <div class="filters-main nav nav-pills">
                        <button class="btn btn-outline-primary active" data-category-slug="todos">Todos</button>
                        <?php foreach ($product_categories as $category) : ?>
                            <button class="btn btn-outline-primary ms-2" data-category-slug="<?php echo esc_attr($category->slug); ?>">
                                <?php echo esc_html($category->name); ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
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

        <div class="row mb-4 d-none">
            <div class="col-12">
                 <?php
                $product_types = get_terms(array(
                    'taxonomy'   => 'tipo_produto', // Slug da nossa nova taxonomia
                    'hide_empty' => true,
                ));
                ?>
                <?php if (!empty($product_types) && !is_wp_error($product_types)) : ?>
                    <div class="filters-sub nav nav-pills">
                        <small class="me-3 align-self-center">Filtrar por tipo:</small>
                        <button class="btn btn-sm btn-light active" data-type-slug="todos">Todos</button>
                        <?php foreach ($product_types as $type) : ?>
                            <button class="btn btn-sm btn-light ms-2" data-type-slug="<?php echo esc_attr($type->slug); ?>">
                                <?php echo esc_html($type->name); ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div id="product-results" class="row gy-4">
            <div class="col-12 text-center">
                <p>Carregando produtos...</p>
            </div>
        </div>

        <div id="load-more-container" class="text-center mt-5" style="display: none;">
            <button id="load-more-btn" class="btn btn-success">Carregar Mais Produtos</button>
        </div>

    </div>
</section>