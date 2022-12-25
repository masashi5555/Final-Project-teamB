<?php include './header.php'; ?>
<?php include './config.php'; ?>
<?php 
  $con = mysqli_connect($dbConfig[0],$dbConfig[1],$dbConfig[2],$dbConfig[3]);
  if($con){ //set connection
    echo "connected";
  }
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['year', 'sales', 'expenses', 'profit'],
          
          <?php 
            $sql = "SELECT * FROM sales_perfomance"; //Which table
            $fire = mysqli_query($con,$sql); //Performs a query on data base            
            while ($result = mysqli_fetch_assoc($fire)){ //Fetch a result row as an associative array                
              echo "['".$result["year"]."',".$result["sales"].",".$result["expenses"].",".$result["profit"]."],";
            }
            
          ?>
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>
