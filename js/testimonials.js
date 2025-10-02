document.addEventListener('DOMContentLoaded', function() {
    const testimonialSelectors = document.querySelectorAll('.testimonial-selector');
    const testimonialText = document.getElementById('testimonial-text');
    const testimonialAvatar = document.getElementById('testimonial-avatar');
    const testimonialAuthor = document.getElementById('testimonial-author');
    const testimonialRole = document.getElementById('testimonial-role');

    // Supondo que 'depoimentosData' foi definido no PHP antes do script
    if (typeof depoimentosData === 'undefined' || depoimentosData.length === 0) {
        console.warn('depoimentosData não encontrado ou está vazio. Verifique a saída PHP.');
        return;
    }

    testimonialSelectors.forEach(selector => {
        selector.addEventListener('click', function() {
            // Remove a classe 'active' de todos os seletores
            testimonialSelectors.forEach(btn => btn.classList.remove('active'));
            // Adiciona a classe 'active' ao seletor clicado
            this.classList.add('active');

            const depoimento = JSON.parse(this.dataset.content);

            // Adiciona classe de animação para saída
            testimonialText.classList.remove('fade-in');
            testimonialAvatar.classList.remove('fade-in');
            testimonialAuthor.classList.remove('fade-in');
            testimonialRole.classList.remove('fade-in');

            // Timeout para permitir a animação de saída antes de atualizar o conteúdo
            setTimeout(() => {
                testimonialText.innerHTML = depoimento.content;
                if (testimonialAvatar && depoimento.avatar) {
                    testimonialAvatar.src = depoimento.avatar;
                    testimonialAvatar.alt = depoimento.author;
                    testimonialAvatar.style.display = 'block'; // Garante que o avatar seja exibido
                } else if (testimonialAvatar) {
                    testimonialAvatar.style.display = 'none'; // Esconde se não houver avatar
                }
                testimonialAuthor.innerHTML = depoimento.author;
                testimonialRole.innerHTML = depoimento.role;

                // Adiciona classe de animação para entrada
                testimonialText.classList.add('fade-in');
                testimonialAvatar.classList.add('fade-in');
                testimonialAuthor.classList.add('fade-in');
                testimonialRole.classList.add('fade-in');
            }, 150); // Ajuste este tempo para corresponder à duração da sua animação
        });
    });
});