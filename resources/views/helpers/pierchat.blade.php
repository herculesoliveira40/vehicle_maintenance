<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Categoria Nome', 'Quantidade Manutencoes Status'],
          <?= $charData; ?>
        ]);

      var options = {
        title: 'Manutencoes Status:',
        legend: 'true',
        pieSliceText: 'value',    
        is3D: false,
        pieStartAngle: 100,
        
      };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div class="row" id="piechart" style="min-height: 480px; min-width: 360px;">
    </div>
  </body>
</html>