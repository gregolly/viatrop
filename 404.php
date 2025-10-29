<?php 
get_header();
?>
<body>
    <div class="error-container">
        <div class="error-content">
            <!-- Mensagem de erro -->
            <div class="error-message">
                <h1 class="error-code">404</h1>
                <h2 class="error-title">Página Não Encontrada</h2>
                <p class="error-description">
                    Ops! Parece que a página que você está procurando não existe ou foi movida.
                </p>
            </div>

            <!-- Ações -->
            <div class="error-actions">
                <a href="/" class="btn btn-primary">
                    <span class="btn-icon">←</span>
                    Voltar para Home
                </a>
                <button onclick="window.location.reload()" class="btn btn-outline">
                    <span class="btn-icon">↻</span>
                    Recarregar Página
                </button>
            </div>

            <!-- Busca -->
            <!-- <div class="search-section">
                <p>Ou tente buscar o que procura:</p>
                <form class="search-form" action="/search" method="GET">
                    <input type="text" name="q" placeholder="Digite sua busca..." class="search-input">
                    <button type="submit" class="search-btn">
                        <span class="search-icon">🔍</span>
                    </button>
                </form>
            </div> -->
        </div>
    </div>

    <script>
        <?php include '404.js'; ?>
    </script>
</body>

<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.error-container {
    max-width: 800px;
    width: 90%;
    margin: 2rem auto;
    padding: 2rem;
}

.error-content {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    padding: 3rem 2rem;
    text-align: center;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

/* Mensagem de Erro */
.error-code {
    font-size: 6rem;
    font-weight: 900;
    color: #115e59;
    margin-bottom: 1rem;
    text-shadow: 3px 3px 0 rgba(0, 0, 0, 0.1);
}

.error-title {
    font-size: 2rem;
    margin-bottom: 1rem;
    color: #333;
}

.error-description {
    font-size: 1.1rem;
    color: #666;
    line-height: 1.6;
    margin-bottom: 2rem;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}

/* Botões */
.error-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
    margin-bottom: 2rem;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    cursor: pointer;
    font-size: 0.9rem;
}

.btn-primary {
    background: #115e59;
    color: white;
}

.btn-primary:hover {
    background: #115e59;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
}

.btn-secondary {
    background: #e9ecef;
    color: #333;
}

.btn-secondary:hover {
    background: #dee2e6;
    transform: translateY(-2px);
}

.btn-outline {
    background: transparent;
    color: #115e59;
    border: 2px solid #115e59;
}

.btn-outline:hover {
    background: #115e59;
    color: white;
    transform: translateY(-2px);
}

.btn-icon {
    font-size: 1.1rem;
}

/* Busca */
.search-section {
    margin-bottom: 2rem;
}

.search-section p {
    margin-bottom: 1rem;
    color: #666;
}

.search-form {
    display: flex;
    max-width: 400px;
    margin: 0 auto;
    border-radius: 50px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.search-input {
    flex: 1;
    padding: 0.75rem 1.5rem;
    border: none;
    outline: none;
    font-size: 1rem;
}

.search-btn {
    padding: 0.75rem 1.5rem;
    background: #115e59;
    border: none;
    color: white;
    cursor: pointer;
    transition: background 0.3s ease;
}

.search-btn:hover {
    background: #5a6fd8;
}

/* Links Úteis */
.useful-links {
    border-top: 1px solid #e9ecef;
    padding-top: 2rem;
}

.useful-links h3 {
    margin-bottom: 1rem;
    color: #333;
}

.links-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 1rem;
    max-width: 400px;
    margin: 0 auto;
}

.links-grid a {
    color: #667eea;
    text-decoration: none;
    padding: 0.5rem 1rem;
    border: 1px solid #667eea;
    border-radius: 25px;
    transition: all 0.3s ease;
}

.links-grid a:hover {
    background: #667eea;
    color: white;
    transform: translateY(-2px);
}

/* Responsividade */
@media (max-width: 768px) {
    .error-container {
        padding: 1rem;
    }
    
    .error-content {
        padding: 2rem 1rem;
    }
    
    .error-code {
        font-size: 4rem;
    }
    
    .error-title {
        font-size: 1.5rem;
    }
    
    .error-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .btn {
        width: 200px;
        justify-content: center;
    }
    
    .search-form {
        flex-direction: column;
        border-radius: 10px;
    }
    
    .search-input {
        border-radius: 10px 10px 0 0;
    }
    
    .search-btn {
        border-radius: 0 0 10px 10px;
    }
}
</style>

<script>
    // Efeitos interativos para a página 404
document.addEventListener('DOMContentLoaded', function() {
    // Efeito de digitação no título
    const errorTitle = document.querySelector('.error-title');
    const originalText = errorTitle.textContent;
    errorTitle.textContent = '';
    
    let i = 0;
    const typeWriter = () => {
        if (i < originalText.length) {
            errorTitle.textContent += originalText.charAt(i);
            i++;
            setTimeout(typeWriter, 100);
        }
    };
    
    // Iniciar efeito de digitação após um breve delay
    setTimeout(typeWriter, 1000);
    
    // Efeito de parallax suave no fundo
    document.addEventListener('mousemove', (e) => {
        const moveX = (e.clientX - window.innerWidth / 2) * 0.01;
        const moveY = (e.clientY - window.innerHeight / 2) * 0.01;
        
        const stars = document.querySelector('.stars');
        stars.style.transform = `translate(${moveX}px, ${moveY}px)`;
    });
    
    // Animação de pulso no código de erro
    const errorCode = document.querySelector('.error-code');
    setInterval(() => {
        errorCode.style.transform = 'scale(1.05)';
        setTimeout(() => {
            errorCode.style.transform = 'scale(1)';
        }, 300);
    }, 3000);
    
    // Feedback visual nos botões
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            // Efeito de clique
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    });
    
    // Efeito de foco no campo de busca
    const searchInput = document.querySelector('.search-input');
    searchInput.addEventListener('focus', function() {
        this.parentElement.style.transform = 'scale(1.02)';
        this.parentElement.style.boxShadow = '0 10px 25px rgba(102, 126, 234, 0.3)';
    });
    
    searchInput.addEventListener('blur', function() {
        this.parentElement.style.transform = 'scale(1)';
        this.parentElement.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.1)';
    });
});
</script>
<?php 
get_footer();
?>