<?php
require_once "header.php";
session_start();
if(!empty($_SESSION['usuariologado'])){
    echo "<p>Bem vindo(a) ". $_SESSION['registro']['nome'] . "</p>";
    echo "<a href='PetsWalks_V2.0.php'>Cadastrar Cliente</a><br>";
    if($_SESSION['tipousuario']==1) { //administrador
        echo "<a href='cadastro.php'>Cadastrar Cliente</a><br>";
        echo "<a href='cadastropet.php'>Cadastrar Pet</a><br>";
    }
} else {
    echo "<p>Você precisa fazer login para ter acesso a este conteúdo.</p>";
}
require_once "footer.php";
?>