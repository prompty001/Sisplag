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

        
         if(isset($_FILES['arquivo']) && ($_FILES['arquivo2'])){
            $arquivo = $_FILES['arquivo'];
            $arquivo2 = $_FILES['arquivo2'];
            if($arquivo['error'] || $arquivo2['error']){
                die("Falha ao enviar Arquivo");
            }
            if($arquivo['size'] > 3097152 || $arquivo2['size'] > 3097152){
                 die("Arquivo grande! Max: 3MB");
             }
             var_dump($_FILES['arquivo']);

             $pasta = "arquivos/";
             $nomeArquivo = $arquivo['name'];
             $novoNome = uniqid();
             $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

             $nomeArquivo2 = $arquivo2['name'];
             $novoNome2 = uniqid();
             $extensao2 = strtolower(pathinfo($nomeArquivo2, PATHINFO_EXTENSION));

             if($extensao != "pdf" || $extensao2 != "pdf"){
                 die ("Arquivo nao aceito");
             }
             $path = $pasta . $novoNome.".".$extensao;
             $certo = move_uploaded_file($arquivo["tmp_name"], $path);

             $path2 = $pasta . $novoNome2.".".$extensao2;
             $certo2 = move_uploaded_file($arquivo2["tmp_name"], $path2);
             
             

            if($certo){
                $inseriDoc = Conexao::conectar()->prepare("INSERT INTO documento (nome, path) VALUES ('$path', '$path2')");
                $inseriDoc->execute();

                echo "<p>Envio sucesso. </p>";
            }else{
                echo "<p>Falha ao enviar! </p>";
            }
        }

        $selectDoc = Conexao::conectar()->prepare("SELECT * FROM documento");
        $selectDoc->execute();

    ?>



    <div class=schoolForm>
        <div class=formPersonalData>
            <hr>
            <hr>
            <!--Cadastro da escola - Dados de identificação | Parte 1/4-->
        <form method="POST" class="row g-3" enctype="multipart/form-data" action="">

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Requerimento</label>
                <input name="arquivo" type="file" class="form-control" id="inputGroupFile01">
                
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Requerimento Escolar</label>
                <input name="arquivo2" type="file" class="form-control" id="inputGroupFile01">
                
            </div>
            
            <hr>
            
            <div>
                <button type="submit" class="btn btn-primary" type="button" name="upload">Enviar</button>
        </form>


        <table id="example" class="lista-clientes" style="width:100%">
                <thead>
                    <tr>
                        <th>Ordem</th>
                        <th>Nome</th>
                        <th>Path</th>
                        <th>Data/Hora</th>
                        
                    </tr>
                </thead>
                <tbody id="myTable">

                    <?php 
                    
                    foreach($selectDoc as $selectDoc){
                        
                        ?>
                    <tr>
                        <td><?php echo $selectDoc ['id_doc'];?></td>
                        <td><a target="_blank" href="<?php echo $selectDoc ['nome'];?>"><?php echo $selectDoc ['nome'];?></a></td>
                        <td><a target="_blank" href="<?php echo $selectDoc ['path'];?>"><?php echo $selectDoc ['path'];?></a></td>
                        <td><?php echo date("d/m/Y H:i", strtotime($selectDoc ['data_upload']));?></td>
                        
                    </tr>
                    <?php }?>
                </tbody>   
                
                
            </table>    

            

        

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/painelAdmConfig.js"></script>
</body>
</html>