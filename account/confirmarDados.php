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

$sql = 'SELECT email, telefone FROM conta';

$pdo->exec("USE days_db");
$result = $pdo->query($sql);
while($row = $result->fetch(PDO::FETCH_ASSOC)) {
  $emailN = $row['email'];
  $telefoneN = $row['telefone'];
  if($email == $emailN && $tel == $telefoneN){
    header("Location: change-password.php?email=$email");
  }
}
echo "<script>alert('Dados errados');window.history.go(-1);</script>";
?>