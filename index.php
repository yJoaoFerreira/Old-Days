<?php
$host = "localhost";
$username = "root";
$password = "";
try {
$pdo = new PDO("mysql:host=$host;", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec("CREATE DATABASE IF NOT EXISTS days_db");
$pdo->exec("USE days_db");
$pdo->exec("CREATE TABLE IF NOT EXISTS jogos (
    id INT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    console VARCHAR(50) NOT NULL,
    preco VARCHAR(50) NOT NULL,
    desconto VARCHAR(50) NOT NULL,
    parcelado VARCHAR(75) NOT NULL
)");
$pdo->exec("CREATE TABLE IF NOT EXISTS conta (
    email VARCHAR(100) PRIMARY KEY,
    telefone VARCHAR(15) NOT NULL,
    senha VARCHAR(75) NOT NULL
)");
$pdo->exec("DELETE FROM jogos WHERE 1");
$pdo->exec("INSERT INTO jogos (id, nome, console, preco, desconto, parcelado)
VALUES
    (1, 'Pokémon Yellow Version: Special Pikachu Edition - GAMEBOY', 'Gameboy', 'R$150,00', 'R$100,00 🔥', 'ou 12x de R$8,40'),

    (2, 'Pokémon Red Version - GAMEBOY', 'Gameboy', 'R$120,00', 'R$90,00 🔥', 'ou 12x de R$7,50'),

    (3, 'Pokémon Blue Version - GAMEBOY', 'Gameboy', 'R$138,00', 'R$88,00 🔥', 'ou 12x de R$7,40'),

    (4, 'Pokémon Fire Red Version - GAMEBOY ADVANCE', 'Gameboy', 'R$250,00', 'R$200,00 🔥', 'ou 12x de R$16,70'),

    (5, 'Pokémon Leaf Green Version - GAMEBOY ADVANCE', 'Gameboy', 'R$240,00', 'R$190,00 🔥', 'ou 12x de R$15,90'),

    (6, 'Pokémon Gold Version - GAMEBOY COLOR', 'Gameboy', 'R$270,00', 'R$235,00 🔥', 'ou 12x de R$19,60'),

    (7, 'Pokémon Silver Version - GAMEBOY COLOR', 'Gameboy', 'R$260,00', 'R$225,00 🔥', 'ou 12x de R$18,75'),

    (8, 'Pokémon Crystal Version - GAMEBOY COLOR', 'Gameboy', 'R$290,00', 'R$245,00 🔥', 'ou 12x de R$20,50'),

    (9, 'Pokémon Emerald Version - GAMEBOY ADVANCE', 'Gameboy', 'R$320,00', 'R$290,00 🔥', 'ou 12x de R$24,20'),

    (10, 'Pokémon Ruby Version - GAMEBOY ADVANCE', 'Gameboy', 'R$300,00', 'R$250,00 🔥', 'ou 12x de R$20,85'),

    (11, 'Pokémon Sapphire Version - GAMEBOY ADVANCE', 'Gameboy', 'R$290,00', 'R$240,00 🔥', 'ou 12x de R$20,00'),

    (12, 'Pokémon HeartGold Version - NINTENDO DS', 'Nintendo DS', 'R$350,00', 'R$300,00 🔥', 'ou 12x de R$25,00'),

    (13, 'Resident Evil - PLAYSTATION', 'PlayStation', 'R$135,00', 'R$ 77,50 🔥', 'ou 12x de R$6,50'),

    (14, 'Dragon Ball Budokai Tenkaichi 3 - PLAYSTATION 2', 'PlayStation 2', 'R$140,30', 'R$50,00 🔥', 'ou 12x de R$4,20'),

    (15, 'Grand Theft Auto V - XBOX 360', 'Xbox 360', 'R$120,90', 'R$20,90 🔥', 'ou 12x de R$1,80'),

    (16, 'Ace Attorney: Phoenix Wright - NINTENDO DS', 'Nintendo DS', 'R$80,00', 'R$10,00 🔥', 'ou 12x de R$0,90'),

    (17, 'Tetris - GAMEBOY', 'Gameboy', 'R$150,00', 'R$97,00 🔥', 'ou 12x de 8,10'),

    (18, 'Sonic Adventure 2 - DREAMCAST', 'Dreamcast', 'R$160,90', 'R$109,00 🔥', 'ou 12x de R$9,10'),

    (19, 'Crash Bandicoot - PLAYSTATION', 'PlayStation', 'R$140,00', 'R$69,00 🔥', 'ou 12x de R$5,75'),
    
    (20, 'God Of War - PLAYSTATION 2', 'PlayStation 2', 'R$177,90', 'R$88,90 🔥', 'ou 12x de R$7,40'),
    
    (21, 'Red Dead Redemption - XBOX 360', 'Xbox 360', 'R$199,99', 'R$120,00 🔥', 'ou 12x de R$10,00'),
    
    (22, 'Mario Kart DS - NINTENDO DS', 'Nintendo DS', 'R$130,00', 'R$60,00 🔥', 'ou 12x de R$5,00'),
    
    (23, 'Super Mario Land - GAMEBOY', 'GameBoy', 'R$180,90', 'R$100,00 🔥', 'ou 12x de R$8,40'),
    
    (24, 'Biohazard 2 Value Plus - DREAMCAST','Dreamcast','R$200,00','R$150,99 🔥','ou 12x de R$12,60'),

    (25, 'YU-GI-OH: Forbidden Memories - PLAYSTATION', 'PlayStation', 'R$130,00', 'R$100,90 🔥', 'ou 12x de R$8,40'),

    (26, 'Grand Theft Auto: San Andreas - PLAYSTATION 2', 'PlayStation 2', 'R$110,90', 'R$85,99 🔥', 'ou 12x de R$7,20'),

    (27, 'Naruto Shippuden: Ultimate Ninja Storm 2 - XBOX 360 ', 'Xbox 360', 'R$150,00', 'R$99,90 🔥', 'ou 12x de R$8,35'),

    (28, 'Chrono Trigger - NINTENDO DS', 'Nintendo DS', 'R$210,00', 'R$119,00 🔥', 'ou 12x de R$9,95'),

    (29, 'The Legend of Zelda: Links Awakening - GAMEBOY', 'GameBoy', 'R$120,90', 'R$55,00 🔥', 'ou 12x de R$4,60'),

    (30, 'Resident Evil: Code Veronica - DREAMCAST', 'Dreamcast', 'R$167,00', 'R$102,00 🔥', 'ou 12x de R$8,50'),

    (31, 'Resident Evil 2 - PLAYSTATION', 'PlayStation', 'R$119,00', 'R$40,90 🔥', 'ou 12x de R$3,40'),

    (32, 'Shadow Of The Colossus - PLAYSTATION 2', 'PlayStation 2', 'R$180,90', 'R$120,50 🔥', 'ou 12x de R$10,05'),

    (33, 'Sonic Unleashed - XBOX 360', 'Xbox 360', 'R$120,99', 'R$88,00 🔥', 'ou 12x de R$7,35'),

    (34, 'Resident Evil: Deadly Silence - NINTENDO DS', 'Nintendo DS', 'R$50,00', 'R$20,00 🔥', 'ou 12x de R$1,70'),
    
    (35, 'Sonic Adventure - DREAMCAST', 'Dreamcast', 'R$150,00', 'R$99,00', 'ou 12x de R$8,25');");
} catch (PDOException $e) {
die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
session_start();
if((!isset ($_SESSION['email']) == true))
{
    unset($_SESSION['email']);
    $email = null;
}else{
    $email = $_SESSION['email'];
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/import.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Old Days</title>
</head>
<body>
    <div class="announcement">
        <strong>Dia 11 vem ai...</strong>
        <strong id="countdown"></strong>
        <strong>Mais uma promoção pra conta!</strong>
    </div>
    
    <header>
        <div class="header-bar" id="header-content">
            <ul>
                <form class="header-form" id="header-search">
                    <input type="text" name="search" placeholder="Pesquisar..." class="search-bar">
                </form>
            </ul>

            <ul>
                <a href="index.php" class="header-link" id="header-home">
                    <img src="assets/img/logo.png" alt="Logo" class="logo">
                </a>
            </ul>

            <ul>
                <a href="account/login.html" class="header-link" id="header-account">
                    <i class="bi bi-person-fill"></i>
                    <a href="account/login.html">
                        <h6 class="header-account-text">Entrar</h6>
                    </a>

                    <a href="account/logout.php">
                        <h6 class="header-account-text">Sair</h6>
                    </a>
                </a>
            </ul>
        </div>
    </header>

    <br>

    <nav>
        <div class="nav-bar" id="nav-content">
            <ul>
                <a href="products.php?console=*&page=1" id="nav-products" class="nav-link"> <strong>Produtos</strong> </a>
            </ul>
            
            <p>•</p>

            <ul>
                <a href="news.html" id="nav-news" class="nav-link"> <strong>Novidades</strong> </a>
            </ul>

            <p>•</p>

            <ul>
                <a href="about-us.html" id="nav-about" class="nav-link"> <strong>Sobre Nós</strong> </a>
            </ul>
        </div>
    </nav>

    <div class="slideshow">
        <div class="promo-content fade">
            <img src="assets/img/descontos/img1.png" alt="Promoção" class="promo-img-1">
        </div>

        <div class="promo-content fade">
            <img src="assets/img/descontos/img2.png" alt="Promoção" class="promo-img-2">
        </div>

        <div class="promo-content fade">
            <img src="assets/img/descontos/img3.png" alt="Promoção" class="promo-img-3">
        </div>
    </div>

    <br>

    <div class="promo-circles">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    <br>

    <h4 class="home-page-title">Coleções</h4>
    <h1 class="home-page-sub-title">Old Days</h1>

    <div class="collection-div">
        <div class="collection-card" id="collection-card-1">
            <a href="products.php?console=Gameboy&page=1">
                <img src="assets/img/consoles/2.png" alt="Console Gameboy">
            </a>
        </div>

        <div class="collection-card" id="collection-card-2">
            <a href="products.php?console=Xbox 360&page=1">
                <img src="assets/img/consoles/6.png" alt="Console Xbox 360">
            </a>
        </div>

        <div class="collection-card" id="collection-card-3">
            <a href="products.php?console=Dreamcast&page=1">
                <img src="assets/img/consoles/1.png" alt="Dreamcast">
            </a>
        </div>

        <div class="collection-card" id="collection-card-4">
            <a href="products.php?console=Nintendo DS&page=1">
                <img src="assets/img/consoles/3.png" alt="Nintendo DS">
            </a>
        </div>

        <div class="collection-card" id="collection-card-5">
            <a href="products.php?console=PlayStation&page=1">
                <img src="assets/img/consoles/5.png" alt="PlayStation 1">
            </a>
        </div>

        <div class="collection-card" id="collection-card-6">
            <a href="products.php?console=PlayStation 2&page=1">
                <img src="assets/img/consoles/4.png" alt="PlayStation 2">
            </a>
        </div>
    </div>

    <h4 class="home-page-title">Motivos</h4>
    <h1 class="home-page-sub-title">Para Amar</h1>

    <div class="reason-div">
        <div class="reason-card" id="reason-card-1">
            <img src="assets/img/descontos/img1.png" alt="a">

            <h4 class="home-page-title">Feitos Para Representar 💖</h4>

            <p>A Old Days representa uma geração inteira de gamers que passaram grande parte de sua infância ou adolescência em frente a uma telinha jogando, e estamos aqui para trazer essa sensação inexequível e tão boa de volta!</p>
        </div>

        <div class="reason-card" id="reason-card-2">
            <img src="assets/img/descontos/img1.png" alt="b">

            <h4 class="home-page-title">Preços Justos & Promoções + do que Especiais!</h4>

            <p>Você enconomiza mas sem abrir a mão da qualidade! Nós da Old Days priorizamos sempre o preço mais justo possível mediante os jogos, além de oferecer diversas promoções para os nosso produtos.</p>
        </div>

        <div class="reason-card" id="reason-card-3">
            <img src="assets/img/descontos/img1.png" alt="c">

            <h4 class="home-page-title">Descomplicado Pelo Digital 🤳</h4>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda illo saepe at vel excepturi iste molestiae eos numquam cum! Omnis, commodi quam. Totam, quibusdam similique doloribus odio saepe perspiciatis inventore?</p>
        </div>
    </div>

    <main></main>
    <footer>
        <div id="footer-content">
            <div id="footer-contacts">
                <ul class="footer-list">
                    <li> <h3>Institucional</h3> </li>
                    <li> <a href="about-us.html" class="footer-link">Sobre a Empresa</a> </li>
                </ul>

                <div id="footer-social-media">
                    <a href="https://www.instagram.com/iferreira.joao_/" class="footer-link" id="instagram">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="https://www.whatsapp.com/?lang=pt_BR" class="footer-link" id="whatsapp">
                        <i class="bi bi-whatsapp"></i>
                    </a>

                    <a href="https://discord.com/app" class="footer-link" id="discord">
                        <i class="bi bi-discord"></i>
                    </a>
                </div>
            </div>

            <ul class="footer-list">
                <li> <h3>Dúvidas</h3> </li>

                <li> <a href="help.html" class="footer-link">Ajuda</a> </li>

                <li> <a href="privacy.html" class="footer-link">Privacidade</a> </li>

                <li> <a href="exchange-warranty.html" class="footer-link">Trocas e Garantia</a> </li>

                <li> <a href="payment-shipping.html" class="footer-link">Pagamento e Envio</a> </li>
            </ul>

            <ul class="footer-list">
                <li> <h3>Contato</h3> </li>

                <li> <a href="assistance.html" class="footer-link">Atendimento</a> </li>

                <li> <a href="doubts.html" class="footer-link">Dúvidas?</a> </li>

                <li> <a href="contact-us.html" class="footer-link">Fale Conosco</a> </li>
            </ul>

            <div id="footer-subscribe">
                <h3>Receba novidades</h3>
                <p>Assine e receba novidades sempre em primeira mão da loja Old Days:</p>

                <div id="input-group">
                    <input type="email" id="email" placeholder="Digite seu e-mail">
                    <button> <i class="bi bi-envelope-fill"></i> </button>
                </div>
            </div>
        </div>

        <div id="footer-copyright">&#169 2023 all rights reserved</div>
    </footer>

    <button onclick="topFunction()" id="topBtn" title="Vá para o topo">Ir pro Topo</button>

    <script src="assets/js/countdown.js"></script>
    <script src="assets/js/topBtn.js"></script>
    <script src="assets/js/slides.js"></script>
</body>
</html>