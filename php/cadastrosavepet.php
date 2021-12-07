<?php

    $Nome = $_POST['Nome'];
    $Cor = $_POST['Cor'];
    $Sexo = $_POST['Sexo'];
    $Porte = $_POST['Porte'];
    $Raca = $_POST['Raca'];
    
    require_once "conexao.php";

    $conn->beginTransaction();

    try {
        
        $sql = "INSERT INTO tbpet (Nome, Cor, Sexo, Porte, Raca) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$Nome, PDO::PARAM_STR);
        $stmt->bindParam(2,$Cor, PDO::PARAM_STR);
        $stmt->bindParam(3,$Sexo, PDO::PARAM_STR);
        $stmt->bindParam(4,$Porte, PDO::PARAM_STR);
        $stmt->bindParam(5,$Raca, PDO::PARAM_STR);
            
        $stmt->execute();

        $CodPessoa = $conn->lastInsertId();
    
        $conn->commit();
        
        header("Location: ../index.html");
    } catch (\Exception $ex) {
        $conn->rollBack();
        echo "<div class='text-center' style='color: red'>Não foi possível realizar o cadastro. Verifique seus dados e tente novamente.</div>";
    }
