<?php
    ob_start();
    session_start();
        if (!isset($_SESSION['login']))
        {
            header("Location:../index.php");
        }       
?>



    <?php
        require_once('../config/painel.php');

        $id_instituicao = (!empty($_GET['id_instituicao']) ? $_GET['id_instituicao'] : '');
            
        
        $status_inst = "Sim";
    
    
        $sql = Conexao::conectar()->prepare("UPDATE INSTITUICAO SET status_inst = ? WHERE id_instituicao=$id_instituicao");
        
        $sql->execute(array($status_inst));
        
        Painel::alert('sucesso','Item atualizado com sucesso!');
        header("Location: autorizacaoCadastro.php");
        
    ?>
<?php ob_end_flush(); ?>