<?php

include "_dbconnect.php";

$selFand = $conn->prepare("SELECT SUM(FandVola) AS vola, 
CASE MONTH(FandDate) 
WHEN 1 THEN 'Janoary'
WHEN 2 THEN 'Febroary'
WHEN 3 THEN 'Marsa'
WHEN 4 THEN 'Aprily'
WHEN 5 THEN 'Mey'
WHEN 6 THEN 'Jona'
WHEN 7 THEN 'Jolay'
WHEN 8 THEN 'Aogositra'
WHEN 9 THEN 'Septambra'
WHEN 10 THEN 'Oktobra'
WHEN 11 THEN 'Novambra'
ELSE 'Decembra'
END AS volana 
FROM FANDANIANA  WHERE YEAR(FandDate)=? GROUP BY MONTH(FandDate)");
$selFand->execute(array(DATE('Y')));


?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Volana', 'Vola lany'],
          
<?php

while ($fandSel = $selFand->fetch()) {

    // echo "['".$fandSel['vola']."',".$fandSel['volana']."],";

    echo "['".$fandSel['volana']."',".$fandSel['vola']."],";

}

?>

        ]);

        var options = {
          title: "KISARIN'NY FANDANIANA ISAM-BOLANA"
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>

