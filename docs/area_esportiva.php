<!DOCTYPE html>
<html lang="pt">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/painelAdmStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Cadastro de Escolas</title>
    <script src="../lib/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.css">
    <script src="../lib/mask/script_mask.js" defer></script>


    <style>
        h4 {
            text-align: center;
            font-size: 20px;
            color: black;
        }
    </style>
</head>

<body id="body-pd">


            <h1>SISPLAG</h1>
    <h2>ENVIO DE DOCUMENTOS</h2>


    <?php
         require_once('../config/painel.php');

        
         if(isset($_FILES['arquivo'])){
             //VERIFICAÇÃO DOS ARQUIVOS ANEXADOS
             //DECLARAÇÃO DOS ARQUIVOS
            $arquivo = $_FILES['arquivo'];
            

            //FALHA AO ENVIAR O ARQUIVO
            if($arquivo['error']){
                die("Falha ao enviar Arquivo");
            }

            //VERIFICANDO O TAMANHO
            if($arquivo['size'] > 3097152){
                 die("Arquivo grande! Max: 3MB");
             }
             //var_dump($_FILES['arquivo']);

             $pasta = "arquivos/";
             $nomeArquivo = $arquivo['name'];
             $novoNome = uniqid();
             $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

             

             if($extensao != "pdf"){
                 die ("Arquivo nao aceito");
             }

             $path = $pasta . $novoNome.".".$extensao;
             $certo = move_uploaded_file($arquivo["tmp_name"], $path);

             
             if($certo){
                $fk_instituicao	 = $_POST['fk_instituicao'];
                $inseriDoc = Conexao::conectar()->prepare("UPDATE DOCUMENTO SET area_esportiva = ? WHERE fk_instituicao=$fk_instituicao");
                $inseriDoc->execute(array($path));
                Painel::alert('sucesso','Item atualizado com sucesso!');
                header("Location: documentos.php");

                echo "<p>Envio sucesso. </p>";
            }else{
                echo "<p>Falha ao enviar! </p>";
            }
        }
    ?>

    <div class=schoolForm>
        <div class=formPersonalData>
            <hr>
            <h4>O SISPLAG solicita o envio dos seguintes documentos por parte das escolas, 
                continuando o ato de Cadastro.<br>Obs.: Se algum estiver faltando, ainda assim 
                enviar todos os outros que estiverem disponíveis.
            </h4>  
            <hr>
            <!--Cadastro da escola - Dados de identificação | Parte 1/4-->
        <form method="POST" class="row g-3" enctype="multipart/form-data" action="">

        <div>
            <label>Instituição</label>
            <select class="form-control" id="school-acronym" style="flex-grow: 1" name="fk_instituicao">
                <option>-Instituição-</Instituição></option>
                    <!-- Consulta no banco - Instituição--->
                    <?php
                        $consultaInst = Conexao::conectar()->prepare('SELECT * FROM instituicao');
                        $consultaInst->execute();
                        $consultaInst = $consultaInst->fetchAll();
                        foreach ($consultaInst as $consultaInst) {
                        ?>
                            <option value="<?php echo $consultaInst['id_instituicao']; ?>">
                                <?php echo $consultaInst['nome_instituicao']; ?>
                            </option>
                        <?php } ?>
                    ?>
                </select><br>

            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Área Esportiva</label>
                <input name="arquivo" type="file" class="form-control" id="inputGroupFile01">
            </div>
    


            <hr>
            
            <div>
                <button type="submit" class="btn btn-primary" type="button" name="upload">Enviar</button>
        </form>

            

        

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/painelAdmConfig.js"></script>
</body>
</html>