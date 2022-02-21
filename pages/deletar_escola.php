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

        $delete01 = Conexao::conectar()->prepare("DELETE FROM filial WHERE fk_instituicao = $id_instituicao;");
        $delete01->execute();
        $delete01 = $delete01->fetchAll();

        $delete02 = Conexao::conectar()->prepare("DELETE FROM INSTITUICAO WHERE id_instituicao=$id_instituicao;");
        $delete02->execute();
        $delete02 = $delete02->fetchAll();

        Painel::alert('sucesso',' cadastro deletado com sucesso!');
        header("Location: autorizacaoCadastro.php");
        

    ?>

<?php ob_end_flush(); ?>
