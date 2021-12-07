<?php

    $Nome = $_POST['Nome'];
    $CPF = $_POST['CPF'];
    $CEP = $_POST['CEP'];
    $NomeCidade = $_POST['Endereco'];
    $NumeroEndereco = $_POST['NumeroEndereco'];
    $Endereco = $_POST['Endereco'];
    $Bairro = $_POST['Bairro'];
    $Telefone = $_POST['Telefone'];
    $Cidade = $_POST['Cidade'];
    $Estado = $_POST['Estado'];
    $Email = $_POST['Email'];
    $Senha = $_POST['Senha'];
    $tipoCadastro = $_POST['tipoCadastro'];

    require_once "conexao.php";

    $conn->beginTransaction();

    try {
        $sql = "INSERT INTO tbcidade (NomeCidade, Rua, Bairro, Numero, CEP ) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$NomeCidade, PDO::PARAM_STR);
        $stmt->bindParam(2,$Rua, PDO::PARAM_STR);
        $stmt->bindParam(3,$Bairro, PDO::PARAM_STR);
        $stmt->bindParam(4,$NumeroEndereco, PDO::PARAM_STR);
        $stmt->bindParam(5,$CEP, PDO::PARAM_STR);
    
        $stmt->execute();

        $CodCidade = $conn->lastInsertId();

        $sql = "INSERT INTO tbpessoa (Nome, CPF, Telefone, Email, Senha, CodCidade ) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$Nome, PDO::PARAM_STR);
        $stmt->bindParam(2,$CPF, PDO::PARAM_STR);
        $stmt->bindParam(3,$Telefone, PDO::PARAM_STR);
        $stmt->bindParam(4,$Email, PDO::PARAM_STR);
        $stmt->bindParam(5,$Senha, PDO::PARAM_STR);
        $stmt->bindParam(6,$CodCidade, PDO::PARAM_STR);
    
        $stmt->execute();

        $CodPessoa = $conn->lastInsertId();
    
        switch ($tipoCadastro) {
            case '1': // Cliente
                $sql = "INSERT INTO tbcliente (CodPessoa) VALUES (?)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(1, $CodPessoa, PDO::PARAM_STR);
                $stmt->execute();
                break;
            case '2': // Colaborador
                $sql = "INSERT INTO tbcolaborador (CodPessoa) VALUES (?)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(1, $CodPessoa, PDO::PARAM_STR);
                $stmt->execute();
                break;
        }

        $conn->commit();
        
        header("Location: ../index.html");
    } catch (\Exception $ex) {
        $conn->rollBack();
        echo "<div class='text-center' style='color: red'>Não foi possível realizar o cadastro. Verifique seus dados e tente novamente.</div>";
    }
