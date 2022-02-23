

<?php
    ob_start();
    session_start();
        if (!isset($_SESSION['login']))
        {
            header("Location:../index.php");
        }       
?>

<!DOCTYPE html>
<html lang="pt">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/painelAdmStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="../lib/mask/script_mask.js" defer></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Empréstimo de Maletas</title>

    <script src="../lib/jquery/jquery.js" defer></script>

    <script src="../lib/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="../js/script_main.js" defer></script>
    <link rel="stylesheet" href="../css/style_main.css">

    <script src="../lib/mask/script_mask.js" defer></script>

    <link rel="stylesheet" href="../lib/icons/css/icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

     

</head>

<body id="body-pd">


            <h1>SISPLAG</h1>
            <h3>Verificação de Cadastro da Escola</h3>


    <?php
        require_once('../config/painel.php');

        $id_instituicao = (!empty($_GET['id_instituicao']) ? $_GET['id_instituicao'] : '');

        $consulta = Conexao::conectar()->prepare("SELECT * FROM documento
                                                    INNER JOIN  instituicao
                                                        ON fk_instituicao = id_instituicao
                                                    WHERE fk_instituicao=$id_instituicao;");
        $consulta->execute();
        $consulta = $consulta->fetchAll();

    ?>

    <div class=schoolForm >
        <div class=formPersonalData>
            
            <hr>
            <!--Cadastro da escola - Dados de identificação | Parte 1/4-->
            
            <form method="POST" class="row g-3">
            
            <?php foreach ($consulta as $consulta) { ?>
                <div class="col-md-2">
                    <label for="validationCustom01" class="form-label">Token Escola</label>
                    <input type="text" class="form-control" id="validationCustom01" name="id_filial" value="<?php echo $consulta['id_doc']; ?>" disabled>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Requerimento</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_filial" value="<a target='_blank' href='<?php echo $consulta ['requerimento'];?>'></a>">
                    
                </div>

                

            </div>
                <?php } ?>
                <div>

                <hr>

                <button type='button' class='btn btn-outline-info' value="imprimir" onclick="funcao_pdf()"><i class="bi bi-printer"> Imprimir</button></i></a>
            


            </form>


        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/painelAdmConfig.js"></script>
</body>


</html><?php ob_end_flush(); ?>