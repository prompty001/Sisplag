<?php
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

    

    <script src="../lib/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="../js/script_main.js" defer></script>
    <link rel="stylesheet" href="../css/style_main.css">
    <link rel="stylesheet" href="../css/table.css">


    <link rel="stylesheet" href="../lib/icons/css/icons.css">


    <!--
        Grafico de Pizza
-->
   
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>





</head>

<body id="body-pd">

    <header class="header" id="header">
        <div class="header_toggle" id="header-toggle"><i class="gg-menu" id="bt-menu"></i></div>
        <button class="btn btn-dark"><a  href="main.php" id="navbarDropdown">
                Usuário: 
               <?php echo $_SESSION['login_usuario']; ?>
        </a></button>

    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
               <a href="../pages/main.php" class="nav_logo">
                    <img src="../assets/new_sisplag.png" style="width: 38%" class="bx bx-layer nav_logo-icon">
                    <span class="nav_logo-name" ></span>
                </a>

                <div class=" nav_list">



                        <a href="cadastro_usuario.php" class="nav_link" id="cadastro">
                            <div class="grid-icon">
                                <i class="bi bi-person-plus"></i>
                                <span class="nav_name">Cadastrar Usuários</span>
                            </div>
                        </a>

                        <a href="cadastro_escola.php" class="nav_link" id="emprestimo">
                            <div class="grid-icon">
                                <i class="bi bi-house"></i>
                                <span class="nav_name">Cadastro de Escolas</span>
                            </div>
                        </a>

                        <a href="consulta_escola.php" class="nav_link" id="ativos">
                            <div class="grid-icon">
                                <i class="bi bi-search"></i>
                                <span class="nav_name">Consulta de Escolas</span>
                            </div>
                        </a>

                        <a href="tab_graph.php" class="nav_link">
                            <div class="grid-icon">
                                <i class="bi bi-file-bar-graph"></i>
                                <span class="nav_name">Tabelas e Gráficos</span>
                            </div>
                        </a>

                        <a href="logout.php" class="nav_link">
                            <div class="grid-icon">
                                <i class="bi bi-x-square"></i>
                                <span class="nav_name">Logout</span>
                            </div>
                        </a>
            </div>
        </div>

    </nav>
    </div>
    
    </div>

            <h1>SISPLAG</h1>
    <h2>QUANTIDADE TOTAL DE ESCOLAS</h2>
    

    <?php
        include ('../config/painel.php');

        $consulta = Conexao::conectar()->prepare("SELECT count(I.nome_instituicao) AS qtd, S.sigla,  D.distritoadm
        FROM instituicao I 
                                                    INNER JOIN siglainstituicao S 
                                                    ON S.id_sigla = I.fk_sigla 
                                                    INNER JOIN distritoadm D 
                                                    ON D.id_distrito = I.fk_distrito 
                                                    WHERE status_inst = 'Sim' 
                                                    GROUP BY (distritoadm);");
        $consulta->execute();
        $consulta = $consulta->fetchAll();

        $qtdTotal = Conexao::conectar()->prepare("SELECT count(I.nome_instituicao) AS qtdTot
                                                    FROM instituicao I 
                                                    WHERE status_inst = 'Sim'");
        $qtdTotal->execute();
        $qtdTotal = $qtdTotal->fetchAll();


    ?>

    <div class=schoolForm>
        
        <hr>
        <div class="d-flex justify-content-between">
        <input type="text" class="input-search" alt="lista-clientes" placeholder="Buscar nesta lista" /> 
        <a href='#' target="_black"><button type='button' class='btn btn-outline-info' >Imprimir</button><i class="bi bi-printer"></i></a>
        </div>    
        <!--Criação da Tabela-->
            <table id="example" class="lista-clientes" style="width:100%">
                <thead>
                    <tr>
                    
                        <th>Sigla</th>
                        <th>Distrito</th>
                        <th>Quantidade</th>

                    </tr>
                </thead>
                <tbody id="myTable">

                    <?php 
                   
                    foreach($consulta as $consulta){
                   
                        ?>
                    <tr>
                        <td><?php echo $consulta ['sigla'];?></td>
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

   <!-- <div id="piechart" style="width: 900px; height: 500px;"></div> -->



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/painelAdmConfig.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>

</body>

</script>
</html><?php ob_end_flush(); ?>