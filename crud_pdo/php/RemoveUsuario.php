<?php
    require_once 'Conexao.php'; //Conecta com o Banco

    $email = $_POST['emailFormulario'];

    if (!empty($email)) {
        $sql = "DELETE FROM usuarios WHERE email = :email";

        //Preparar a remoção de dados do Banco
        $requisicao = $conexao -> prepare ($sql);

        //Vamos pegar o email digitado pelo Form e passar pro Parametro
        //Isso fará que a consulta use o $email o que irá evitar que ocorra
        //o SQLInjection com o bindParam, sendo uma proteção da aplicação
        $requisicao -> bindParam (':email', $email);

        try {
            $requisicao -> execute();

            if ($requisicao -> rowCount() > 0) {
                echo "Usuário removido com Sucesso!";
            }

            else {
                echo "Usuário não existe!";
            }
        }

        catch (PDOException $e) {
            echo "Erro ao Remover: ". $e -> getMessage();
        }
    }

    else {
        echo "Digite um Email para remover um usuário!!";
    }
?>