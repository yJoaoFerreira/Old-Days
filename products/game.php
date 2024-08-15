<?php
session_start();
if((!isset ($_SESSION['email']) == true))
{
    unset($_SESSION['email']);
    $email = null;
}else{
    $email = $_SESSION['email'];
}

$id=$_GET['id'];

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

    <link rel="stylesheet" href="/assets/css/import.css">
    <link rel="stylesheet" href="/assets/css/reset.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <link rel="stylesheet" href="/assets/css/style.css">

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
                <a href="/account/login.html" class="header-link" id="header-account">
                    <i class="bi bi-person-fill"></i>
                    <a href="/account/login.html">
                        <h6 class="header-account-text">Entrar</h6>
                    </a>

                    <a href="/account/logout.php">
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
                <a href="/products.php?console=*&page=1" id="nav-products" class="nav-link"> <strong>Produtos</strong> </a>
            </ul>

            <p>•</p>

            <ul>
                <a href="/news.html" id="nav-news" class="nav-link"> <strong>Novidades</strong> </a>
            </ul>

            <p>•</p>

            <ul>
                <a href="/about-us.html" id="nav-about" class="nav-link"> <strong>Sobre Nós</strong> </a>
            </ul>
        </div>
    </nav>

    <?php
        $sql = "SELECT * FROM jogos WHERE id = '$id'";

        $pdo->exec("USE days_db");
        $result = $pdo->query($sql);
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $idN = $row['id'];
            $nomeN = $row['nome'];
            $consoleN = $row['console'];
            $precoN = $row['preco'];
            $descontoN = $row['desconto'];
            $parceladoN = $row['parcelado'];

            echo "
    <div class='product-sell-card'>
        <div class='product-sell-content'>
            <img src='/assets/img/produtos/jogos/$idN.png' alt='$nomeN' id='product-image'>

            <div class='img-modal' id='img-modal'>
                <span class='close'>&times;</span>
                <img class='modal-content' id='img01'>
                <div id='caption'></div>
            </div>

            <div class='product-sell-title'>
                <h1 class='sell-title'>$nomeN</h1>
            </div>

            <div class='product-sell-price'>
                <span class='product-card-true-price' id='product-sell-true-price'><strong>$precoN</strong></span>
                <span class='product-card-discount-price' id='product-sell-discount-price'><strong>$descontoN</strong></span>

                <br><br>

                <h5><strong class='product-card-installment' id='product-sell-installment'>$parceladoN</strong></h5>
            </div>
        </div>

        <div class='rating'>
            <ul class='avaliacao'>
                <li class='star-icon ativo' data-avaliacao='1'></li>
                <li class='star-icon' data-avaliacao='2'></li>
                <li class='star-icon' data-avaliacao='3'></li>
                <li class='star-icon' data-avaliacao='4'></li>
                <li class='star-icon' data-avaliacao='5'></li>
            </ul>
        </div>

        <div class='product-sell-button'>
            <button id='sell-product'"; if($email == null) { echo "onclick='loginWarn()'"; } else { echo "onclick='loginBuy()'"; } echo ">
                <h3>Comprar</h3>
            </button>
        </div>

    </div>";
        }
    ?>

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

                <li> <a href="/help.html" class="footer-link">Ajuda</a> </li>

                <li> <a href="/privacy.html" class="footer-link">Privacidade</a> </li>

                <li> <a href="/exchange-warranty.html" class="footer-link">Trocas e Garantia</a> </li>

                <li> <a href="/payment-shipping.html" class="footer-link">Pagamento e Envio</a> </li>
            </ul>

            <ul class="footer-list">
                <li> <h3>Contato</h3> </li>

                <li> <a href="/assistance.html" class="footer-link">Atendimento</a> </li>

                <li> <a href="/doubts.html" class="footer-link">Dúvidas?</a> </li>

                <li> <a href="/contact-us.html" class="footer-link">Fale Conosco</a> </li>
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

    <script src="/assets/js/countdown.js"></script>
    <script src="/assets/js/img-modal.js"></script>
    <script src="/assets/js/login-warn.js"></script>
    <script src="/assets/js/login-buy.js"></script>
    <script src="/assets/js/rating.js"></script>
    <script src="/assets/js/topBtn.js"></script>
</body>
</html>