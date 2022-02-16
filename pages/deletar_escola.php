<?php
session_start();

    if (!isset($_SESSION['login']))
    {
        header("Location:../index.php");
    }
    
?>

    <?php
        require_once('../config/painel.php');

        $id_instituicao = (!empty($_GET['id_instituicao']) ? $_GET['id_instituicao'] : '');

        $consulta = Conexao::conectar()->prepare("DELETE FROM INSTITUICAO WHERE id_instituicao=$id_instituicao;");
        $consulta->execute();
        $consulta = $consulta->fetchAll();

        Painel::alert('sucesso',' cadastro deletado com sucesso!');
        header("Location: main.php");
        

    ?>
