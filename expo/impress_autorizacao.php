<!DOCTYPE html>
<html lang="pt">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/painelAdmStyle.css">

    <link rel="stylesheet" href="../css/table.css">

    <style>

body{ font-family:"Trebuchet MS", Arial, Helvetica, sans-serif }

/* " Para o input */
.input-search{
    border:1px solid #CCC;
    padding:5px 14px;
    font-size:12px;
    margin:10px 0;

    -webkit-border-radius:15px;
       -moz-border-radius:15px;
        -ms-border-radius:15px;
         -o-border-radius:15px;
            border-radius:15px;
}
    .input-search::-webkit-input-placeholder{ font-style:italic }
    .input-search:-moz-placeholder          { font-style:italic }
    .input-search:-ms-input-placeholder     { font-style:italic }

/* " Para a tabela */
table.lista-clientes{
    border-collapse:collapse;
    font-size:14px;
    font-family:Tahoma, Geneva, sans-serif;
}
    table.lista-clientes th{
        padding:5px;
        background:#EEE;
        border:1px solid #CCC;
    }
    table.lista-clientes td{
        padding:3px;
        border:1px solid #CCC;
    }


    h4, h5, tr, td{
        text-align: center;
    }
    </style>
     

</head>

<body id="body-pd">





            <h4>SISPLAG</h4>
    <h5>AUTORIZAÇÃO DE CADASTRO</h5>
    

    <?php
        include ('../config/painel.php');

        $consulta = Conexao::conectar()->prepare("SELECT I.id_instituicao, I.nome_instituicao, T.nome_inst, S.sigla, D.distritoAdm 
                                        FROM instituicao I
                                        INNER JOIN  tipoinstituicao T
                                            ON T.id_inst = I.fk_tipoInstituicao
                                        INNER JOIN siglainstituicao S
                                            ON S.id_sigla = I.fk_sigla
                                        INNER JOIN distritoadm D 
                                            ON D.id_distrito=I.fk_distrito
                                        WHERE status_inst = 'Não'");
        $consulta->execute();
        $consulta = $consulta->fetchAll();

    

    ?>

    <div class=schoolForm>
        
        
            <!--Criação da Tabela-->
            <table id="example" class="lista-clientes" style="width:100%">
                <thead>
                    <tr>
                        <th>Ordem</th>
                        <th>Escola</th>
                        <th>Tipo da Escola</th>
                        <th>Sigla da Escola</th>
                        <th>Distrito Adm</th>
                        
                    </tr>
                </thead>
                <tbody id="myTable">

                    <?php 
                    $id_instituicao = 0;
                    foreach($consulta as $consulta){
                        $id_instituicao = $consulta['id_instituicao']
                        ?>
                    <tr>
                        <td><?php echo $consulta ['id_instituicao'];?></td>
                        <td><?php echo $consulta ['nome_instituicao'];?></td>
                        <td><?php echo $consulta ['nome_inst'];?></td>
                        <td><?php echo $consulta ['sigla'];?></td>
                        <td><?php echo $consulta ['distritoAdm'];?></td>
                        
                    </tr>
                    <?php }?>
                </tbody>   
                
                
            </table>    
        
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/painelAdmConfig.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>

</body>

</script>
</html><?php ob_end_flush(); ?>