<?php
$host = "localhost";
$username = "root";
$password = "";
try {
$pdo = new PDO("mysql:host=$host;", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

$password=$_POST["password"];
$passconfirm=$_POST["confirm-password"];

$email=$_POST['email'];
$pdo->exec("USE days_db");
$inserir=$pdo->prepare("UPDATE conta SET senha = '$password' WHERE email = '$email'");
$inserir->execute();


header("Location: /index.php");
?>