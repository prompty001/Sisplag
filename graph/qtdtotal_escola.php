<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../lib/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.css">


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Tipo de Instituição', 'Quantidade'],
          <?php
                include ('../config/painel.php');

                $consulta = Conexao::conectar()->prepare("SELECT count(I.nome_instituicao) AS qtd, S.sigla AS nome
                                                            FROM instituicao I 
                                                            INNER JOIN siglainstituicao S 
                                                            ON S.id_sigla = I.fk_sigla 
                                                            WHERE status_inst = 'Sim'
                                                            GROUP BY (S.sigla);");
                $consulta->execute();
                $result = $consulta->fetchAll();
                foreach($result as $dados){
                    $qtd = $dados['qtd'];
                    $sigla = $dados['nome'];?>

          ['<?php echo $sigla?>', <?php echo $qtd?>],
                
        <?php } ?>
        ]);

        var options = {
          chart: {
            title: 'Conselho Municipal de Educação',
            subtitle: 'Quantidade Total de Escolas - Por Instituição',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
</head>
<body>

  <div id="columnchart_material" style="width: 800px; height: 500px; padding: 5em 5em 0em 10em;"></div>
  <div style="margin-left: 10em;">
    <a href='../pages/tab_graph.php'><button type='button' class='btn btn-secondary'>Voltar</button></a>
  </div>
</body>
</html>

