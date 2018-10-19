<?php 
$array = array();
$amostras = [1, 10,50,100,150,200,250,300,350,400,450,500,550,600,650,700,750,800,850,900,950,1000,1500,2000,2500,3000,4500,5000,10000];
$x = 0;
	foreach ($amostras as $key => $amostra) {
		for ($i=0; $i < $amostra; $i++) { 
			if (isset($array[$x])) {
				$array[$x] = $array[$x] + rand(0,100);
			}
			else{
				$array[$x] = rand(0,100);
			}
		}	
	$array[$x] = ($array[$x] / $amostra	);
	$x++;
	}
	$resultado = [$amostras , $array];
	$count = count($amostras) -1 ;
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        	
          ['Amostra', 'Rond', 'Média'],
          
          <?php for ($i = 0; $i <= $count; $i++)  :?>
          <?php if ($i == $count) :?>
            [<?=$resultado[0][$i]?>,  <?=$resultado[1][$i]?>, 50]
          
          <?php else:?>
              [<?=$resultado[0][$i]?>,  <?=$resultado[1][$i]?>, 50],
          <?php endif ?>
          

          <?php endfor; ?>
        ]);

        var options = {
          title: 'Probabilidade com Rond',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>