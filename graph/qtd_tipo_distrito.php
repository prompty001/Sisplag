<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Tipo de Instituição/Distrito', 'Quantidade'],
          <?php
                include ('../config/painel.php');

                $consulta = Conexao::conectar()->prepare("SELECT count(I.nome_instituicao) AS qtd, T.nome_inst AS nome, D.distritoadm AS distrito 
                                                            FROM instituicao I 
                                                            INNER JOIN tipoinstituicao T 
                                                            ON T.id_inst = I.fk_tipoInstituicao 
                                                            INNER JOIN distritoadm D 
                                                            ON D.id_distrito = I.fk_distrito 
                                                            WHERE status_inst = 'Sim' 
                                                            GROUP BY (distritoadm);");
                $consulta->execute();
                $result = $consulta->fetchAll();
                foreach($result as $dados){
                    $qtd = $dados['qtd'];
                    $sigla = $dados['nome'];
                    $distrito = $dados['distrito'];
            ?>
                    

          ['<?php echo $sigla ,' | ', $distrito?>', <?php echo $qtd?>],
                
        <?php } ?>
        ]);

        var options = {
          chart: {
            title: 'Conselho Municipal de Educação',
            subtitle: 'Quantidade de Escolas - Por Tipo de Instituição e Distrito',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
</head>
<body>

  <div id="columnchart_material" style="width: 800px; height: 500px; padding: 5em 5em 0em 10em;"></
</div>
</body>
</html>

