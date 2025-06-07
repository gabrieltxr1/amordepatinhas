<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/index.css?v=1.1">
    <link rel="shortcut icon" href="assets/img/icon.png">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <title>Página Inicial</title>
</head>
<body>
<header>
    <nav id="navbar">
        <i class="fa-solid fa-cat" id="nav_logo"> Amor de Patinhas</i>

        <ul id="nav_list">
            <li class="nav-item active">
                <a href="#home">Início</a>
            </li>
            <li class="nav-item">
                <a href="#menu">Produtos</a>
            </li>
            <li class="nav-item">
                <a href="#testimonials">Avaliações</a>
            </li>

            <li class="nav-item">
            <a href="login.php" class="btn-login">Login</a>
            </li>
        </ul>

        <button id="mobile_btn">
            <i class="fa-solid fa-bars"></i>
        </button>
    </nav>

    <div id="mobile_menu">
        <ul id="mobile_nav_list">
            <li class="nav-item">
                <a href="#home">Início</a>
            </li>
            <li class="nav-item">
                <a href="#menu">Produtos</a>
            </li>
            <li class="nav-item">
                <a href="#testimonials">Avaliações</a>
            </li>

            <li class="nav-item">
            <a href="login.php" class="btn-login">Login</a>
            </li>
        </ul>

        <button class="btn-default">
            Peça aqui
        </button>
    </div>
</header>


    <main id="content">
        <section id="home">
            <div class="shape"></div>
            <div id="cta">
                <h1 class="title">
                    A melhor opção para cuidar do seu melhor
                    <span>amigo!</span>
                </h1>

                <p class="description">
                Seu pet merece o melhor! No Amor de Patinhas, cada produto é puro carinho, conforto e diversão. 
                Tudo para deixar rabinhos abanando e corações felizes!


                </p>

                <div id="cta_buttons">
                    <a href="#" class="btn-default">
                        Ver promoções
                    </a>

                    <a href="tel:+55555555555" id="phone_button">
                        <button class="btn-default">
                            <i class="fa-solid fa-phone"></i>
                        </button>
                        (88) 98180-7655
                    </a>
                </div>

                <div class="social-media-buttons">
                    <a href="">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>

                    <a href="">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                </div>
            </div>

            <div id="banner">
                <img src="assets/img/cat.png" alt="">
            </div>
        </section>

        <section id="menu">
            <h2 class="section-title">Produtos</h2>
            <h3 class="section-subtitle">Nossos produtos especiais</h3>

            <div id="dishes">
                <div class="dish">
                    <div class="dish-heart">
                        <i class="fa-solid fa-heart"></i>
                    </div>

                    <img src="assets/img/tigela_animal.png" class="dish-image" alt="">

                    <h3 class="dish-title">
                        Tigelas
                    </h3>

                    <span class="dish-description">
                        Nada como comer com estilo! Nossas tigelas são práticas, fofas e feitas para deixar a hora da refeição ainda mais gostosa.
                    </span>

                    <div class="dish-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <span>(500+)</span>
                    </div>

                    <div class="dish-price">
                        <h4>R$15,00</h4>
                        <button class="btn-default">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </button>
                    </div>
                </div>

                <div class="dish">
                    <div class="dish-heart">
                        <i class="fa-solid fa-heart"></i>
                    </div>

                    <img src="assets/img/osso.png" class="dish-image" alt="">

                    <h3 class="dish-title">
                        Brinquedos variados
                    </h3>

                    <span class="dish-description">
                        Diversão garantida! Brinquedos que estimulam, distraem e enchem o dia do seu pet de alegria — porque brincar também é amar.
                    </span>

                    <div class="dish-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <span>(500+)</span>
                    </div>

                    <div class="dish-price">
                        <h4>R$20,00</h4>
                        <button class="btn-default">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </button>
                    </div>
                </div>

                <div class="dish">
                    <div class="dish-heart">
                        <i class="fa-solid fa-heart"></i>
                    </div>

                    <img src="assets/img/caminha.png" class="dish-image" alt="">

                    <h3 class="dish-title">
                        Caminhas
                    </h3>

                    <span class="dish-description">
                        Todo pet merece um cantinho só dele! Caminhas macias e aconchegantes para noites tranquilas e sonecas cheias de conforto.
                    </span>

                    <div class="dish-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <span>(500+)</span>
                    </div>

                    <div class="dish-price">
                        <h4>R$85,00</h4>
                        <button class="btn-default">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </button>
                    </div>
                </div>

                <div class="dish">
                    <div class="dish-heart">
                        <i class="fa-solid fa-heart"></i>
                    </div>

                    <img src="assets/img/ração.png" class="dish-image" alt="">

                    <h3 class="dish-title">
                        Rações
                    </h3>

                    <span class="dish-description">
                        Saúde começa pela comida! Rações saborosas e equilibradas, escolhidas com carinho para cuidar do seu melhor amigo de dentro pra fora.
                    </span>

                    <div class="dish-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <span>(500+)</span>
                    </div>

                    <div class="dish-price">
                        <h4>R$35,00</h4>
                        <button class="btn-default">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section id="testimonials">
           

            <div id="testimonials_content">
                <h2 class="section-title">
                    Depoimentos
                </h2>
                <h3 class="section-subtitle">
                    O que os clientes falam sobre nós?
                </h3>

                <div id="feedbacks">
                    <div class="feedback">
                        <img src="assets/img/avatar.png" class="feedback-avatar" alt="">

                        <div class="feedback-content">
                            <p>
                                Valéria Moreira
                                <span>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                            </p>
                            <p>
                            "Achei o site por acaso e foi a melhor surpresa!
                            Comprei uma tigela linda e ração pro meu doguinho, e fiquei encantada com o carinho em cada detalhe.
                            A entrega foi super rápida e veio tudo certinho. Dá pra sentir que a loja realmente se importa com nossos pets.
                            Já estou de olho em uma caminha pra próxima compra!"


                        </div>
                    </div>

                    <div class="feedback">
                        <img src="assets/img/avatar2.png" class="feedback-avatar" alt="">
                     <div class="feedback-content">
                            <p>
                                Cláudio Matias
                                <span>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                            </p>
                            <p>
                            "O atendimento é tão atencioso que parece que a gente tá falando com um amigo. 
                            Comprei uma caminha e uns brinquedinhos pro meu gato Tom, e ele não desgruda mais!
                            Ele ficou tão feliz que me emocionei. A loja tem um jeitinho especial que faz a gente confiar.
                            Com certeza vou indicar pra todos os meus amigos que têm pets."
                            </p>
                        </div>
                    </div>
                </div>

                <button class="btn-default">
                    Ver mais avaliações
                </button>
            </div>
        </section>
    </main>

    <footer>
        <img src="assets/img/wave.svg" alt="">

        <div id="footer_items">
            <span id="copyright">
                &copy 2025 EEEP Antônio Rodrigues de Oliveira
            </span>

            <div class="social-media-buttons">
                <a href="">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>

                <a href="">
                    <i class="fa-brands fa-instagram"></i>
                </a>

                <a href="">
                    <i class="fa-brands fa-facebook"></i>
                </a>
            </div>
        </div>
    </footer>
    <script src="assets/js/script.js"></script>
</body>
</html>