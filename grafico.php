<?php
    include("php/conexao.php");
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['País', 'Quantidade'],
          <?php 

            $sql = "select count(fk_IdPais) as qtdPais, nomePais 
                    from cidade as c 
                    inner join pais as p on c.fk_IdPais = p.IdPais 
                    group by IdPais;";

            $query = mysqli_query($conexao, $sql);
            while($p = mysqli_fetch_array($query)){
                $qtd = $p['qtdPais'];
                $pais = $p['nomePais'];
          ?>

          ['<?php echo($pais) ?>', <?php echo($qtd) ?>],

          <?php } ?>
        ]);

        var options = {
          title: 'Quantidade de cidades'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Avião", "Média", { role: "style" } ],
          
          <?php 

            $sqlP = "select avg(fk_IdCargo) as qtd, fk_IdAviao
                    from funcionario as f 
                    inner join cargo as c 
                    on f.fk_IdCargo = c.IdCargo
                    
                    inner join aviao as a 
                    on f.fk_IdAviao = a.IdAviao
                    
                    group by IdAviao;";
            
            $queryP = mysqli_query($conexao, $sqlP);
            while($p = mysqli_fetch_array($queryP)){
                echo("['Avião ".$p['fk_IdAviao']."', ".$p['qtd'].", 'blue'],");
            }
          
          ?>
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
                        { calc: "stringify",
                          sourceColumn: 1,
                          type: "string",
                          role: "annotation" },
                        2]);

        var options = {
          title: "Média de funcionários por avião",
          width: 600,
          height: 400,
          bar: {groupWidth: "95%"},
          legend: { position: "none" },
        };
        var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
        chart.draw(view, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Companhia aérea", "Quantidade", { role: "style" } ],
          <?php 

            $sqlComp = "select count(fk_IdCompanhia) as qtdCompanhia, nomeCompanhia
                        from voo as v
                        right join companhia_aerea as ca 
                        on v.fk_IdCompanhia = ca.IdCompanhia
                        group by IdCompanhia
                        ";

            $queryComp = mysqli_query($conexao, $sqlComp);
            while($c = mysqli_fetch_array($queryComp)){
              $comp = $c['nomeCompanhia'];
              $qtd = $c['qtdCompanhia'];
          ?>

          ["<?php echo($comp) ?>", <?php echo($qtd) ?>, "#87CEFA"],

          <?php } ?>
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
                        { calc: "stringify",
                          sourceColumn: 1,
                          type: "string",
                          role: "annotation" },
                        2]);

        var options = {
          title: "Quantidade de voos por companhia aérea",
          width: 600,
          height: 400,
          bar: {groupWidth: "95%"},
          legend: { position: "none" },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Bagagem', 'Quantidade de bagagens'],
          <?php 
              $sqlV = "select count(bg.fk_IdTipoBagagem) as qtdBagagem, nomeBagagem
                      from bagagem as bg 
                      left join tipo_bagagem as tb 
                      on bg.fk_IdTipoBagagem = tb.IdTipoBagagem
                      group by IdTipoBagagem;";
              $queryVoo = mysqli_query($conexao, $sqlV);

              while($v = mysqli_fetch_array($queryVoo)){
                  $bagagem = $v['nomeBagagem'];
                  $qtd = $v['qtdBagagem'];
          ?>

          ['<?php echo($bagagem); ?>', <?php echo($qtd); ?>],

          <?php } ?>
        ]);

        var options = {
          title: 'Quantidade de bagagens por tipo',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart2'));

        chart.draw(data, options);
      }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col">
          <div id="piechart" style="width: 600px; height: 500px;"></div>
        </div>
        <div class="col">
          <div id="barchart_values" style="width: 500px; height: 500px;"></div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col">
          <div id="columnchart_values" style="width: 500px; height: 300px;"></div>
        </div>
        <div class="col">
          <div id="curve_chart2" style="width: 700px; height: 500px"></div>
        </div>
      </div>
    </div>
  </body>
</html>
