<?php
if(isset($_POST['login'])){
    $Nome = $_POST['Nome'];
    $CPF = $_POST['CPF'];
    $CEP = $_POST['CEP'];
    $NumeroEndereco = $_POST['NumeroEndereco'];
    $Endereco = $_POST['Endereco'];
    $Bairro = $_POST['Bairro'];
    $Telefone = $_POST['Telefone'];
    $Cidade = $_POST['Cidade'];
    $Estado = $_POST['Estado'];
    $Email = $_POST['Email'];
    $Senha = $_POST['Senha'];
   
    
   // $profissao = $_POST['profissao'];
    require_once "conexao.php";

    //$sql = "Select * from usuarios where email='$email' and senha='$senha'";
    //echo $sql;

    $sql = "INSERT INTO tbpessoa (Nome, CPF, Telefone, Email, Senha ) VALUES (?,?,?,'1')";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1,$Nome, PDO::PARAM_STR);
    $stmt->bindParam(2,$CPF, PDO::PARAM_STR);
    $stmt->bindParam(1,$Telefone, PDO::PARAM_STR);
    $stmt->bindParam(2,$Email, PDO::PARAM_STR);
    $stmt->bindParam(3,$Senha, PDO::PARAM_STR);

    $sql = "INSERT INTO tbcidade (NomeCidade, Rua, Bairro, Numero, CEP ) VALUES (?,?,?,'1')";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(3,$NomeCidade, PDO::PARAM_STR);
    $stmt->bindParam(1,$Rua, PDO::PARAM_STR);
    $stmt->bindParam(2,$Bairro, PDO::PARAM_STR);
    $stmt->bindParam(3,$Numero, PDO::PARAM_STR);
    $stmt->bindParam(2,$CEP, PDO::PARAM_STR);

    $sql = "INSERT INTO tbcidade (NomeCidade, Rua, Bairro, Numero, CEP ) VALUES (?,?,?,'1')";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(3,$NomeCidade, PDO::PARAM_STR);
    $stmt->bindParam(1,$Rua, PDO::PARAM_STR);
    $stmt->bindParam(2,$Bairro, PDO::PARAM_STR);

    // session_start();
        header("/location:cadastro.php");
        exit;
    }
    ?>
    