<?php
session_start();
if((!isset ($_SESSION['email']) == true))
{
    unset($_SESSION['email']);
    $email = null;
}else{
    $email = $_SESSION['email'];
}

$console=$_GET['console'];
$page=$_GET['page'];

$host = "localhost";
$username = "root";
$password = "";
try {
$pdo = new PDO("mysql:host=$host;", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
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

    <title>Old Days - Produtos</title>
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
                <a href="/index.php" class="header-link" id="header-home">
                    <img src="/assets/img/logo.png" alt="Logo" class="logo">
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

    <div class="slideshow-products">
        <div class="promo-content-products fade">
            <img src="assets/img/descontos/img1.png" alt="Promoção" class="promo-img-1">
        </div>

        <div class="promo-content-products fade">
            <img src="assets/img/descontos/img2.png" alt="Promoção" class="promo-img-2">
        </div>

        <div class="promo-content-products fade">
            <img src="assets/img/descontos/img3.png" alt="Promoção" class="promo-img-3">
        </div>
    </div>

    <br>

    <div class="promo-circles-products">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    <ul class="breadcrumb">
        <li><a href="index.php">Início</a></li>
        <li>Produtos</li>
    </ul>

    <h3 class="product-table-title">Filtros</h3>
    <div class="product-table">
        <ul class="product-table-list">
            <h3>Consoles</h3>

            <a href="products.php?console=Gameboy&page=1">Jogos Gameboy</a>
            <a href="products.php?console=Xbox 360&page=1">Jogos Xbox 360</a>
            <a href="products.php?console=Dreamcast&page=1">Jogos Dreamcast</a>
            <a href="products.php?console=Nintendo DS&page=1">Jogos Nintendo DS</a>
            <a href="products.php?console=PlayStation&page=1">Jogos PlayStation</a>
            <a href="products.php?console=PlayStation 2&page=1">Jogos PlayStation 2</a>
        </ul>
    </div>

    <div class="product-div-list">
        <div class="products-cards">

        <?php 
            $sql = "SELECT * FROM jogos WHERE console = '$console'";
            if($console == "*"){
                $sql = 'SELECT * FROM jogos';
            }

            $c = 1;
            $limite2 = $page*9;
            $limite1 = $limite2-8;
            $c2 = 1;
            $pdo->exec("USE days_db");
            $result = $pdo->query($sql);
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                if($c >= $limite1 && $c <= $limite2){
                    $idN = $row['id'];
                    $nomeN = $row['nome'];
                    $consoleN = $row['console'];
                    $precoN = $row['preco'];
                    $descontoN = $row['desconto'];
                    $parceladoN = $row['parcelado'];      
                    
                    echo "
            <div class='product-card' id='product-card-$c2'>
                <div class='product-content'>
                    <a href='products/game.php?id=$idN'>
                        <img src='assets/img/produtos/jogos/$idN.png' alt='$nomeN' class='product-img'>
                    </a>
                </div>

                <div class='product-card-description'>
                    <a href='products/game.php?id=$idN'>
                        <h4 class='product-title'>$nomeN</h4>

                        <br>

                        <span class='product-card-true-price'><strong>$precoN</strong></span>
                        <span class='product-card-discount-price'><strong>$descontoN</strong></span>

                        <br><br>

                        <h5><strong class='product-card-installment'>$parceladoN</strong></h5>
                    </a>
                </div>
            </div>";
            $c2 = $c2 + 1;
                }
            $c = $c + 1;
            }
            $max = $c-1;
            $maxpages = $max/9;
            $maxpages = intval($maxpages);
            if($max%9 != 0){
                $maxpages = $maxpages + 1;
                }
        ?>

        </div>
    </div>

    <br>
    
    <main></main>
    <nav class="nav-pages">
        <?php
        $anterior = $page - 1;
        $proximo = $page + 1;
              if($page != 1){
                echo "<a href='products.php?console=$console&page=$anterior' class='next'>
                    <div class='preview-next'><i class='fa-solid fa-chevron-left'></i> Anterior</div>
                </a>";
              }
                for ($i = 1; $i <= $maxpages; $i++) {
                  echo "<a href='products.php?console=$console&page=$i'>";
                  if($page == $i){
                    echo "<div class='current-page'>";
                  }else{
                    echo "<div class='page'>";
                  }
                  echo "$i</div></a>";
                }
              if($page != $maxpages){
                echo "<a href='products.php?console=$console&page=$proximo' class='next'>
                    <div class='preview-next'>Próximo <i class='fa-solid fa-chevron-right'></i></div>
                </a>";
              }
        ?>
    </nav>
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
    <script src="assets/js/products-slides.js"></script>
</body>
</html>