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
$tel=$_POST["tel"];
$password=$_POST["password"];
$passconfirm=$_POST["confirm-password"];

$sql = 'SELECT email FROM conta';

$pdo->exec("USE days_db");
$result = $pdo->query($sql);
while($row = $result->fetch(PDO::FETCH_ASSOC)){
  $emailN = $row['email'];
  if($email == $emailN){
    echo "<script>alert('Email já utilizado');window.history.go(-1);</script>";
  }
}

$inserir=$pdo->prepare("INSERT INTO conta(email, telefone, senha) VALUES ('$email', '$tel', '$password')");
$inserir->execute();

header("Location: login.html");
?>