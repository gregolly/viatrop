document.addEventListener("DOMContentLoaded", function() {

    // --- SCRIPT 1: EFEITO DE SCROLL NO HEADER ---
    const header = document.querySelector('.site-header');
    if (header) {
        const handleScroll = () => {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        };
        handleScroll();
        document.addEventListener('scroll', handleScroll);
    }

    // --- SCRIPT 2: FECHAR O MENU MOBILE AO CLICAR EM UM LINK DE ÂNCORA ---
    const menuLinks = document.querySelectorAll('.navbar-collapse .nav-link, .navbar-collapse a');
    const menuToggler = document.querySelector('.navbar-toggler');
    const bsCollapse = new bootstrap.Collapse(document.getElementById('mainNavbar'), {
        toggle: false // Inicializa o componente sem abrir/fechar
    });

    menuLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            // Verifica se o botão "hambúrguer" está visível
            if (menuToggler.offsetParent !== null) {
                bsCollapse.hide(); // Usa a API do Bootstrap para fechar o menu
            }
        });
    });

});
