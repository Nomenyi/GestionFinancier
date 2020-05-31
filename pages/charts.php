<?php

include "_dbconnect.php";

$selFand = $conn->prepare("SELECT SUM(FandVola) AS vola, 
YEAR(FandDate) AS taona 
FROM FANDANIANA GROUP BY YEAR(FandDate)");
$selFand->execute();


?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Taona', 'Vola lany'],
          
<?php

while ($fandSel = $selFand->fetch()) {

    // echo "['".$fandSel['vola']."',".$fandSel['volana']."],";

    echo "['".$fandSel['taona']."',".$fandSel['vola']."],";

}

?>

        ]);

        var options = {
          title: "KISARIN'NY FANDANIANA ISAN-TAONA"
        };

        var chart = new google.visualization.PieChart(document.getElementById('piecharts'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piecharts" style="width: 900px; height: 500px;"></div>
  </body>
</html>

