<?php
    require_once 'Conexao.php';

    $requisicao = $_POST['requisicao'];

    switch ($requisicao) {
        case 'Cadastrar':
            include 'CadastroUsuario.php';
            break;

        case 'Consultar':
            include 'ConsultaUsuario.php';
            break;

        case 'Atualizar':
            include 'AtualizaUsuario.php';
            break;
        
        case 'Remover':
            include 'RemoveUsuario.php';
            break;

        default:
            echo "Ação9 Inválida, por gentileza selecionar uma opção válida!";
            break;
    }
?>