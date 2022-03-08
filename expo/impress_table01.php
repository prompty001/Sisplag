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





<h5 style="line-height: 0em;">PREFEITURA DE BELÉM</h5>
    <h5 style="line-height: 0em;">CONSELHO MUNICIPAL DE EDUCAÇÃO</h5>
    <h5 style="line-height: 0em;">SISTEMA DE PLANEJAMENTO E GESTÃO</h5>
    <hr>
    <h6 style="text-align: center; line-height: 0em;">QUANTIDADE TOTAL DE ESCOLAS - POR DISTRITO E TIPO DE INSTITUIÇÃO</h6>
    <hr>    

    <?php
        include ('../config/painel.php');

        $consulta = Conexao::conectar()->prepare("SELECT count(I.nome_instituicao) AS qtd, T.nome_inst, D.distritoadm 
                                                    FROM instituicao I 
                                                    INNER JOIN tipoinstituicao T 
                                                    ON T.id_inst = I.fk_tipoInstituicao 
                                                    INNER JOIN distritoadm D 
                                                    ON D.id_distrito = I.fk_distrito 
                                                    WHERE status_inst = 'Sim' 
                                                    GROUP BY (nome_inst);");
        $consulta->execute();
        $consulta = $consulta->fetchAll();

        $qtdTotal = Conexao::conectar()->prepare("SELECT count(I.nome_instituicao) AS qtdTot
                                                    FROM instituicao I 
                                                    WHERE status_inst = 'Sim'");
        $qtdTotal->execute();
        $qtdTotal = $qtdTotal->fetchAll();


    ?>

    <div class=schoolForm>
        
        
        </div>    
        <!--Criação da Tabela-->
            <table id="example" class="lista-clientes" style="width:100%">
                <thead>
                    <tr>
                    
                        <th>Tipo Instituição</th>
                        <th>Distrito</th>
                        <th>Quantidade</th>

                    </tr>
                </thead>
                <tbody id="myTable">

                    <?php 
                   
                    foreach($consulta as $consulta){
                   
                        ?>
                    <tr>
                        <td><?php echo $consulta ['nome_inst'];?></td>
                        <td><?php echo $consulta ['distritoadm'];?></td>
                        <td><?php echo $consulta ['qtd'];?></td>
                    </tr>
                    <?php }?>
                </tbody>   
                
                
            </table>   
            
            <?php
        foreach($qtdTotal as $qtdTotal){
        ?>               
        <a><btton type='button' class='btn btn-outline-primary' >Total: <?php echo $qtdTotal ['qtdTot'];?></button><i class="bi bi-printer"></i></a>
        <?php }?>
        
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/painelAdmConfig.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>

</body>

</script>
</html><?php ob_end_flush(); ?>