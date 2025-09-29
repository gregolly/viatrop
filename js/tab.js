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