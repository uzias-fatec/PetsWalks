<?php

    require_once '../php/conexao.php';

    $LoginUsuario = $_POST['LoginUsuario'];
    $Senha = $_POST['Senha'];

    try {
        $sql = "SELECT count(1) valor from tbpessoa p where p.Email = ? and p.Senha = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $LoginUsuario, PDO::PARAM_STR);
        $stmt->bindParam(2, $Senha, PDO::PARAM_STR);
        $stmt->execute();
        
        $resultado = $stmt->fetchAll()[0];
        
        $isLoginValido = (int) $resultado['valor'];
        if (!$isLoginValido > 0) {
            throw new Exception();
        }

        echo "<div class='text-center' style='color: green'>Login realizado com sucesso.</div>";
        // header("Location: ../index.html");
    } catch (\Throwable $th) {
        echo "<div class='text-center' style='color: red'>Credenciais inválidas.</div>";
    }
