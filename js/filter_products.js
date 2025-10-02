jQuery(function($) {
    // Variáveis para guardar o estado atual dos filtros
    let currentCategory = 'todos';
    let currentType = 'todos';
    let currentSearch = '';
    let currentPage = 1; // Para a paginação do "Carregar Mais"

    // Função principal que busca os produtos via AJAX
    function fetchProducts(replace = true) {
        const resultsContainer = $('#product-results');
        const loadMoreContainer = $('#load-more-container');

        // Se for uma nova busca (replace=true), mostra um feedback de carregamento
        if (replace) {
            resultsContainer.html('<div class="col-12 text-center"><p>Carregando...</p></div>');
            currentPage = 1; // Reseta a página para 1
        }
        
        loadMoreContainer.hide(); // Esconde o botão enquanto carrega

        $.ajax({
            url: '/wp-admin/admin-ajax.php', // URL padrão do AJAX no WordPress
            type: 'POST',
            data: {
                action: 'filtrar_produtos', // Nossa função no functions.php
                pagination_type: 'load_more',
                categoria: currentCategory,
                tipo: currentType,
                busca: currentSearch,
                pagina: currentPage
            },
            success: function(response) {
                if (response.success) {
                    if (replace) {
                        resultsContainer.html(response.data.html); // Substitui o conteúdo
                    } else {
                        resultsContainer.append(response.data.html); // Adiciona mais conteúdo
                    }

                    // Se o servidor indicar que há mais posts, mostra o botão
                    if (response.data.has_more_posts) {
                        loadMoreContainer.show();
                    }
                } else {
                    // Se não houver sucesso e for a primeira página, mostra "nenhum produto"
                    if (replace) {
                        resultsContainer.html('<div class="col-12 text-center"><p>Nenhum produto encontrado.</p></div>');
                    }
                }
            },
            error: function() {
                if (replace) {
                    resultsContainer.html('<div class="col-12 text-center"><p>Ocorreu um erro ao carregar os produtos.</p></div>');
                }
            }
        });
    }

    // Ação ao clicar nos filtros de CATEGORIA
    $('.filters-main .btn').on('click', function() {
        $('.filters-main .btn').removeClass('active');
        $(this).addClass('active');
        currentCategory = $(this).data('category-slug');
        fetchProducts(); // Busca os produtos com o novo filtro
    });

    // Ação ao clicar nos filtros de TIPO
    $('.filters-sub .btn').on('click', function() {
        $('.filters-sub .btn').removeClass('active');
        $(this).addClass('active');
        currentType = $(this).data('type-slug');
        fetchProducts(); // Busca os produtos com o novo filtro
    });

    // Ação ao digitar no campo de BUSCA (com um pequeno delay para não sobrecarregar)
    let searchTimeout;
    $('#product-search-input').on('keyup', function() {
        clearTimeout(searchTimeout);
        currentSearch = $(this).val();
        searchTimeout = setTimeout(function() {
            fetchProducts();
        }, 500); // Espera 500ms após o usuário parar de digitar
    });

    // Ação ao clicar no botão "CARREGAR MAIS"
    $('#load-more-btn').on('click', function() {
        currentPage++; // Incrementa o número da página
        fetchProducts(false); // Busca mais produtos, sem substituir os existentes
    });

    // Carga inicial dos produtos ao carregar a página
    fetchProducts();
});