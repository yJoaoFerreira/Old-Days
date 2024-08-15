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

$email=$_POST["email"];
$password=$_POST["password"];

$sql = 'SELECT email, senha FROM conta';

$pdo->exec("USE days_db");
$result = $pdo->query($sql);
while($row = $result->fetch(PDO::FETCH_ASSOC)){
    $emailN = $row['email'];
    $senhaN = $row['senha'];
    if($email == $emailN && $password == $senhaN){
        session_start();
        $_SESSION['email'] = $emailN;
        header("Location: /index.php?entrou=1");
    }
}

echo "<script>alert('Falha ao fazer login');window.history.go(-1);</script>";
?>