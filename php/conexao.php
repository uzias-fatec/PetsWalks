<?php
$servername = "127.0.0.1:3306"; // troque a porta caso nao consiga conectar
$username = "root";
$password = "";
$bd="bdpetswalks";
try {
  $conn = new PDO("mysql:host=$servername;dbname=$bd", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Conectado";
} catch(PDOException $e) {
  echo "Erro: " . $e->getMessage();
}
?>