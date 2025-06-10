<?php
    require_once 'Conexao.php';

    $email = $_POST['emailFormulario'];
    $nome = $_POST['nomeFormulario'];

    if (!empty($email)) {
        $sql = "SELECT nome, email FROM usuarios WHERE email = :email";

        $requisicao = $conexao -> prepare($sql);

        $requisicao -> bindParam(':email', $email);

        try {
            $requisicao -> execute();

            //fetch -> Especifica como queremos o retorno da consulta no bando de dados
            //FETCH_ASSOC indica que queremos retornar um array indexado
            $usuario = $requisicao -> fetch(PDO::FETCH_ASSOC);

            if($usuario) {
                echo  "Usuário: ".$usuario['nome'] . "<br>";
                echo  "Email: ".$usuario['email'] . "<br>";
            }
                        

            else {
                echo "Usuário não Existe!";
            }
        }

        catch (PDOException $e) {
            echo "Erro ao Consultar: " . $e -> getMessage();
        }
    }

    else {
        echo "Digite um Email para Consultar um Usuário!";
    }
?>